<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_keluar extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_barang_keluar');
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
		$data['page'] 		= "Data Barang Keluar";
		$data['judul'] 		= "Data Barang Keluar";
		
		$this->loadkonten('v_barang_keluar/home',$data);
	}

	public function ajax_list()
	{
		$list = $this->M_barang_keluar->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $master) {
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = date('d-m-Y',strtotime($master->tanggal));
			$row[] = $master->nama_barang;
			$row[] = $master->jumlah;
            $row[] = $master->keterangan;
            $row[] = $master->lokasi;
			//add html for action
			$row[] =  anchor('edit-barang-keluar/'.$master->id_barang_keluar, ' <span class="fa fa-edit"></span> ',' class="btn btn-sm btn-primary ajaxify klik " ').' '.
			'<button class="btn btn-sm btn-danger hapus-barang-keluar data-toggle="tooltip" data-placement="top" title="Hapus"" id_barang_keluar="id_barang_keluar"  data-id='." '".$master->id_barang_keluar."' ".'><i class="glyphicon glyphicon-trash"></i></button>';
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
		$access = $this->M_sidebar->access('add','daftar');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Barang Keluar";
			$data['judul'] 		= "Data Barang Keluar";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		else{
		$data['page'] 				= "Data Barang Keluar";
		$data['judul'] 				= "Data Barang Keluar";
        $data['barang']	    = $this->M_barang_keluar->get_barang();
		$this->loadkonten('v_barang_keluar/tambah',$data);
      }
	
	}

	public function prosesTambahBarangKeluar() {
		
		$data = array(
			'id_barang'		=> $this->input->post('id_barang'),
			'tanggal'		=> date('Y-m-d',strtotime($this->input->post('tanggal'))),
			'jumlah' 	=> $this->input->post('jumlah'),
			'keterangan' 	=> $this->input->post('keterangan'),
			'lokasi' 	=> $this->input->post('lokasi'),
			'created_date' 		=> date('Y-m-d H:i:s'),
			'updated_date' 		=> date('Y-m-d H:i:s')
		);
		$result = $this->db->insert('tbl_barang_keluar',$data);

		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}

	echo json_encode($out);
	}

    public function edit($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('add','daftar');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Barang Keluar";
			$data['judul'] 		= "Data Barang Keluar";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
		$data['page'] 				= "Data Barang Keluar";
		$data['judul'] 				= "Data Barang Keluar";  
        $data['datamaster'] = $id;	
		$data['barang']	    = $this->M_barang_keluar->get_barang();
		$data['barang_keluar'] = $this->M_barang_keluar->selek_barang($id);
		$this->loadkonten('v_barang_keluar/update',$data);
      }
	
	}

	public function prosesUpdateBarangKeluar() {
		
		$data = array(
			'id_barang'		=> $this->input->post('id_barang'),
			'tanggal'		=> date('Y-m-d',strtotime($this->input->post('tanggal'))),
			'jumlah' 	=> $this->input->post('jumlah'),
			'keterangan' 	=> $this->input->post('keterangan'),
			'lokasi' 	=> $this->input->post('lokasi'),
			'created_date' 		=> date('Y-m-d H:i:s'),
			'updated_date' 		=> date('Y-m-d H:i:s')
		);

		$where = array(
			'id_barang_keluar'		=> $this->input->post('id_barang_keluar')
		);

		$result = $this->db->update('tbl_barang_keluar',$data,$where);

		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}

		echo json_encode($out);
	}

	public function hapus(){
		
		$id_barang_keluar = $this->input->post('id_barang_keluar');

		$barang_query = $this->db->query("DELETE FROM tbl_barang_keluar WHERE id_barang_keluar = '$id_barang_keluar'");

		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
		echo json_encode($out);
	}

}