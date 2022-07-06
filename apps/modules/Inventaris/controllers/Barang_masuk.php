<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_masuk extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_barang_masuk');
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
		$data['page'] 		= "Data Barang Masuk";
		$data['judul'] 		= "Data Barang Masuk";
		
		$this->loadkonten('v_barang_masuk/home',$data);
	}

	public function ajax_list()
	{
		$list = $this->M_barang_masuk->get_data();
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
			$row[] =  anchor('edit-barang-masuk/'.$master->id_barang_masuk, ' <span class="fa fa-edit"></span> ',' class="btn btn-sm btn-primary ajaxify klik " ').' '.
			'<button class="btn btn-sm btn-danger hapus-barang-masuk data-toggle="tooltip" data-placement="top" title="Hapus"" id_barang_masuk="id_barang_masuk"  data-id='." '".$master->id_barang_masuk."' ".'><i class="glyphicon glyphicon-trash"></i></button>';
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
			$data['page'] 		= "Data Barang Masuk";
			$data['judul'] 		= "Data Barang Masuk";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		else{
		$data['page'] 				= "Data Barang Masuk";
		$data['judul'] 				= "Data Barang Masuk";
        $data['barang']	    = $this->M_barang_masuk->get_barang();
		$this->loadkonten('v_barang_masuk/tambah',$data);
      }
	
	}

	public function prosesTambahBarangMasuk() {
		
		$data = array(
			'id_barang'		=> $this->input->post('id_barang'),
			'tanggal'		=> date('Y-m-d',strtotime($this->input->post('tanggal'))),
			'jumlah' 	=> $this->input->post('jumlah'),
			'keterangan' 	=> $this->input->post('keterangan'),
			'lokasi' 	=> $this->input->post('lokasi'),
			'created_date' 		=> date('Y-m-d H:i:s'),
			'updated_date' 		=> date('Y-m-d H:i:s')
		);
		$result = $this->db->insert('tbl_barang_masuk',$data);

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
			$data['page'] 		= "Data Barang Masuk";
			$data['judul'] 		= "Data Barang Masuk";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
		$data['page'] 				= "Data Barang Masuk";
		$data['judul'] 				= "Data Barang Masuk";  
        $data['datamaster'] = $id;	
		$data['barang']	    = $this->M_barang_masuk->get_barang();
		$data['barang_masuk'] = $this->M_barang_masuk->selek_barang($id);
		$this->loadkonten('v_barang_masuk/update',$data);
      }
	
	}

	public function prosesUpdateBarangMasuk() {
		
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
			'id_barang_masuk'		=> $this->input->post('id_barang_masuk')
		);

		$result = $this->db->update('tbl_barang_masuk',$data,$where);

		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}

		echo json_encode($out);
	}

	public function hapus(){
		
		$id_barang_masuk = $this->input->post('id_barang_masuk');

		$barang_query = $this->db->query("DELETE FROM tbl_barang_masuk WHERE id_barang_masuk = '$id_barang_masuk'");

		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
		echo json_encode($out);
	}

}