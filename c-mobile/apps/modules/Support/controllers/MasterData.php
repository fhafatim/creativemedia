<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterData extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_master');
		$this->load->model('M_sidebar');
	}
	
	public function loadkonten($page, $data) {
		
		$data['userdata'] 	= $this->userdata;
		$ajax = ($this->input->post('status_link') == "ajax" ? true : false);
		if (!$ajax) { 
			$this->load->view('Dashboard/layouts/header', $data);
		}
		$this->load->view($page, $data);
		if (!$ajax) $this->load->view('Dashboard/layouts/footer', $data);
	}

	public function index()
	{
		$data['userdata'] 	= $this->userdata; 
		$data['page'] 		= "Data Master";
		$data['judul'] 		= "Data Master";
		$data['kategori']   = $this->M_master->select_kategori();
		
		$this->loadkonten('v_master/home',$data);
	}

	public function ajax_list()
	{
		$list = $this->M_master->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $master) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $master->nama;
			$row[] = $master->jkel;
			$row[] = $master->alamat;
			$row[] = $master->kota;
			$row[] = $master->kategori;
			$row[] = date('d-m-Y',strtotime($master->tanggal));
			
			//add html for action
			$row[] =  anchor('edit-master-data/'.$master->id_master, ' <span class="fa fa-edit"></span> ', ' class="btn btn-sm btn-primary ajaxify klik " ').
                   ' '.anchor('preview-data/'.$master->id_master,'<span class=" fa fa-print btn btn-success btn-sm btn-icon "></span>',array('target' => '_blank')).			
				      '  <button class="btn btn-sm btn-danger hapus-master" data-id='."'".$master->id_master."'".'><i class="glyphicon glyphicon-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->M_master->count_all(),
                        "recordsFiltered" => $this->M_master->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}
	
	
	public function Add() {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('add','kategori');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Master";
			$data['judul'] 		= "Data Master";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
		$data['page'] 		= "Data Master";
		$data['judul'] 		= "Data Master";	
		$data['kategori']   = $this->M_master->select_kategori();
		$data['kelamin']    = $this->M_master->select_kelamin();
		$data['kerja']      = $this->M_master->select_pekerjaan();
		$data['kota']       = $this->M_master->select_kota();
		$data['bulan']      = $this->M_master->select_bulan();
		$data['tahun']      = $this->M_master->select_tahun();
		$this->loadkonten('v_master/tambah',$data);
	}
}

	public function prosesTambah() {
		if (isset($_POST["nama"]) && ($_POST["alamat"]) && ($_POST["pekerjaan"]) && ($_POST["jkel"]) && !empty($_POST["kategori"]))
		{
		$data = array(
		'nama' 		   	       => $this->input->post('nama'),
		'tempat' 		   	   => $this->input->post('tempat'),
		'tgl_lahir' 		   => $this->input->post('tgl_lahir'),
		'alamat' 		   	   => $this->input->post('alamat'),
		'kota' 		   	       => $this->input->post('kota'),
		'jkel' 		   	       => $this->input->post('jkel'),
		'pekerjaan' 		   => $this->input->post('pekerjaan'),
		'kategori' 		       => $this->input->post('kategori'),
		'sket1' 		       => $this->input->post('sket1'),
		'sket2' 		       => $this->input->post('sket2'),
		'sket3' 		       => $this->input->post('sket3'),
		'created_by' 		   => $this->input->post('created_by'),
		'created_date'	       => date('Y-m-d H:i:s'),
		'tanggal'	       	   => date('Y-m-d H'),
		);
		$result = $this->M_master->simpan_data($data);
			
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		
		} else {
			$out['status'] = 'gagal';
		}

		echo json_encode($out);
	}
	
	
	public function Edit($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('edit','kategori');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Master";
			$data['judul'] 		= "Data Master";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
		$where=array('id_master' => $id);
		$data['datamaster']  = $this->M_master->select_by_id($id);

		$data['page'] 		= "Data Master";
		$data['judul'] 		= "Data Master";
		$data['kategori']   = $this->M_master->select_kategori();
		$data['kelamin']    = $this->M_master->select_kelamin();
		$data['kerja']      = $this->M_master->select_pekerjaan();
		$data['kota']       = $this->M_master->select_kota();
		$data['bulan']      = $this->M_master->select_bulan();
		$data['tahun']      = $this->M_master->select_tahun();
	    $this->loadkonten('v_master/update',$data);
	}
	}
	
	
	public function Preview($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('edit','kategori');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Master";
			$data['judul'] 		= "Data Master";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		$where=array('id_master' => $id);
		$data['datamaster'] = $this->M_master->select_by_id($id);
		$data['kategori']   = $this->M_master->select_kategori();
		$data['kelamin']    = $this->M_master->select_kelamin();
		$data['kerja']      = $this->M_master->select_pekerjaan();
		$data['kota']       = $this->M_master->select_kota();
	    $this->load->view('v_master/preview',$data);
	}
	}
	
	public function prosesUpdate() {
		
		if (isset($_POST["nama"]) && ($_POST["alamat"]) && ($_POST["pekerjaan"]) && ($_POST["jkel"]) && !empty($_POST["kategori"]))
		{
			
		$where = array(
		'id_master' 		   => $this->input->post('id_master')
		);	
			
		$data = array(
		'nama' 		   	       => $this->input->post('nama'),
		'tempat' 		   	   => $this->input->post('tempat'),
		'tgl_lahir' 		   => $this->input->post('tgl_lahir'),
		'alamat' 		   	   => $this->input->post('alamat'),
		'kota' 		   	       => $this->input->post('kota'),
		'jkel' 		   	       => $this->input->post('jkel'),
		'pekerjaan' 		   => $this->input->post('pekerjaan'),
		'kategori' 		       => $this->input->post('kategori'),
		'sket1' 		       => $this->input->post('sket1'),
		'sket2' 		       => $this->input->post('sket2'),
		'sket3' 		       => $this->input->post('sket3'),
		'updated_by' 		   => $this->input->post('updated_by'),
		'updated_date'		   => date('Y-m-d H:i:s'),
		);
		
		$result = $this->M_master->update($data,$where);
			
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		
		} else {
			$out['status'] = 'gagal';
		}

		echo json_encode($out);
	}
	
	public function hapus() {
		$id = $_POST['id_master'];
		$result = $this->M_master->hapus($id);
		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
	}
	
	
	
	
	
	
}
