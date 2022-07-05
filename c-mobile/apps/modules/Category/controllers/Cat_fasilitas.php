<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cat_fasilitas extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_cat_fasilitas');
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
		$data['page'] 		= "Kategori Fasilitas";
		$data['judul'] 		= "Kategori Fasilitas";
		
		$this->loadkonten('v_fasilitas/home',$data);
	}

	public function ajax_list()
	{
		$list = $this->M_cat_fasilitas->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $cat) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $cat->nama;
			//add html for action
			$row[] =  anchor('edit-kat-fasilitas/'.$cat->id_tipe, ' <span class="fa fa-edit"></span> ', ' class="btn btn-sm btn-primary ajaxify klik " '). 
				      '  <button class="btn btn-sm btn-danger hapus-cat-fasilitas" data-id='."'".$cat->id_tipe."'".'><i class="glyphicon glyphicon-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	
	
	public function Add() {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('add','kat-fasilitas');
		if ($access->menuview == 0){
			$data['page'] 		= "Kategori Fasilitas";
			$data['judul'] 		= "Kategori Fasilitas";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
		$data['page'] 		= "Kategori Fasilitas";
		$data['judul'] 		= "Kategori Fasilitas";	
		$this->loadkonten('v_fasilitas/tambah',$data);
	}
}

	public function prosesTambah() {
		
		if (isset($_POST["nama"]) && !empty($_POST["nama"])) 
		{
		$data = array(
		'nama' 		   	       => $this->input->post('nama'),
		'created_by' 		   => $this->input->post('created_by'),
		'created_date'	       => date('Y-m-d H:i:s')
		);
		$result = $this->M_cat_fasilitas->simpan_data($data);
			
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
		$access = $this->M_sidebar->access('edit','kat-fasilitas');
		if ($access->menuview == 0){
			$data['page'] 		= "Kategori Fasilitas";
			$data['judul'] 		= "Kategori Fasilitas";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
		$where=array('id_tipe' => $id);
		$data['datafasilitas']  = $this->M_cat_fasilitas->select_by_id($id);

		$data['page'] 		= "Kategori Fasilitas";
		$data['judul'] 		= "Kategori Fasilitas";
	    $this->loadkonten('v_fasilitas/update',$data);
	}
	}
	
	public function prosesUpdate() {
		
		if (isset($_POST["nama"]) && !empty($_POST["nama"])) 
		{
			
		$where = array(
		'id_tipe' 		   => $this->input->post('id_tipe')
		);	
			
		$data = array(
		'nama' 		   	     => $this->input->post('nama'),
		'updated_by' 		 => $this->input->post('updated_by'),
		'updated_date'		 => date('Y-m-d H:i:s')
		);
		
		$result = $this->M_cat_fasilitas->update($data,$where);
			
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
		$id = $_POST['id_tipe'];
		$result = $this->M_cat_fasilitas->hapus($id);
		
		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
	}
	
	
	
	
	
	
}
