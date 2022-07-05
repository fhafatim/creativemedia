<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sertifikat extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_sertifikat');
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
		$data['page'] 		= "Data List Sertifikat";
		$data['judul'] 		= "Data List Sertifikat";
		
		
		$this->loadkonten('v_sertifikat/home',$data);
	}

	public function ajax_list()
	{
		$list = $this->M_sertifikat->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $master) {			
			$no++;
			$row = array();
			$row[] = $no;
            $row[] = date('d-m-Y',strtotime($master->tanggal));
			$row[] = $master->nama_siswa;
			$row[] = $master->nama_bidang_studi;
			
			if ($master->status == 'pending') {
				$Status = '<small class="label pull-center bg-yellow">Pending</small>';
			} else {
				$Status = '<small class="label pull-center bg-green">Selesai</small>';
			} 
			$row[] = $Status;
			//add html for action
			$row[] =  anchor('edit-list-sertifikat/'.$master->id_list_sertifikat, ' <span class="fa fa-edit"></span> ', ' class="btn btn-sm btn-primary ajaxify klik " ').			
				      '  <button class="btn btn-sm btn-danger hapus-master" id_list_sertifikat="id_list_sertifikat" data-id='."'".$master->id_list_sertifikat."'".'><i class="glyphicon glyphicon-trash"></i></button>';
			
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
		// 'tbl_invoice'=> $this->M_pembayaran->get_data($id_invoice);
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		
		$access = $this->M_sidebar->access('add','sertifikat');
		if ($access->menuview == 0){
			$data['page'] 		= "Data List Sertifikat";
			$data['judul'] 		= "Data List Sertifikat";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
			// 'pembayaran' = $this->M_pembayaran->get_data()
			$data['page'] 				= "Data List Sertifikat";
			$data['judul'] 				= "Data List Sertifikat";
			$data['siswa']		= $this->M_sertifikat->get_kelas_selesai();
			$this->loadkonten('v_sertifikat/tambah',$data);
		}
	
	}

	public function tes() {
	$kode 	 = $this->M_daftar->kode();
	
	echo $kode;
	}
	
	public function prosesTambah() {

        $id_kelas = $this->input->post('siswa');
        $query = $this->db->query("SELECT * FROM tbl_pendaftaran a, tbl_siswa b, tbl_bidang_studi c, tbl_kelas d WHERE a.id_siswa = b.id_siswa AND a.id_bidang_studi = c.id_bidang_studi AND a.id_pendaftaran = d.id_pendaftaran AND d.id_kelas = '$id_kelas'");
        $siswa = $query->row();
        
        $data = array( 
            'id_kelas' 			     => $id_kelas,
            'tanggal' 			     => date('Y-m-d'),
            'nama_siswa' 			 => $siswa->nama_siswa,
            'nama_bidang_studi'      => $siswa->nama_bidang_studi,
            'status'                 => 'pending',
            'created_date' 		     => date('Y-m-d H:i:s'),
            'updated_date' 		     => date('Y-m-d H:i:s')						 
		);
		$result=  $this->db->insert('tbl_list_sertifikat', $data);

		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		echo json_encode($out);

	}	
		
	public function Edit($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('edit','pembayaran');
		if ($access->menuview == 0){
			$data['page'] 		= "Data List Sertifikat";
			$data['judul'] 		= "Data List Sertifikat";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
		$where = array('id_list_pembayaran' => $id);
		$data['datamaster']  = $this->M_sertifikat->select_by_id($id);
		$data['page'] 		= "Data List Sertifikat";
		$data['judul'] 		= "Data List Sertifikat";
	    $this->loadkonten('v_sertifikat/update',$data);
	}
	}
	
    public function prosesUpdate() {
		$where = array(
			'id_list_sertifikat'      => $this->input->post('id_list_sertifikat')
		);	
		
		$data = array(
			'status'	=> $this->input->post('status'),
			'updated_date' 		    => date('Y-m-d H:i:s')			
		);

		$result = $this->M_sertifikat->update($data,$where);
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		echo json_encode($out);
	}
	
    public function hapus() {
		
	$id_list_sertifikat = $this->input->post('id_list_sertifikat');
	
	$result = $this->M_sertifikat->hapus($id_list_sertifikat);
	if ($result > 0) {
		$out['status'] = 'berhasil';
	} else {
		$out['status'] = 'gagal';
	}
	
	}
	
	public function bukti($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('edit','daftar');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Pembayaran";
			$data['judul'] 		= "Data Pembayaran";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
			// $where=array('id_pembayaran' => $id);
			// $data['datamaster']  = $id;
			$data['datamaster']  = $this->M_pembayaran->cetak_bukti($id);
			// var_dump($data['datamaster']);
			// die;
			// $data['jumlah_tagihan']  = $this->M_daftar->jumlah_tagihan($id);

			$data['page'] 		= "Data List Sertifikat";
			$data['judul'] 		= "Data List Sertifikat";	
			$this->loadkonten('v_sertifikat/kwitansipembayaran',$data);
		}
	}
	
	
}