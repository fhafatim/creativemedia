<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_rekap');
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
		$data['page'] 		= "Report Siswa";
		$data['judul'] 		= "Report Siswa";
		$data['BidangStudi']  	= $this->M_rekap->selek_studi();
		$data['Level']  	= $this->M_rekap->selek_level();
		
		$this->loadkonten('v_report/v_rekap-data',$data);
		
	}
	
	public function filter(){
		$data['userdata'] 	= $this->userdata;  
		$data['page'] 		= "Report Siswa";
		$data['judul'] 		= "Report Siswa";
		$data['BidangStudi']  	= $this->M_rekap->selek_studi();
		$data['Level']  	= $this->M_rekap->selek_level();
		
		$tanggal_awal=$this->input->post('tanggal_awal');
		$tanggal_akhir=$this->input->post('tanggal_akhir');
		$id_bidang_studi=$this->input->post('id_bidang_studi');
		$id_level_kelas=$this->input->post('id_level_kelas');
		$tempat_daftar=$this->input->post('tempat_daftar');
		
		$data['filter']  = $this->M_rekap->export_data($tanggal_awal,$tanggal_akhir,$id_bidang_studi,$id_level_kelas,$tempat_daftar);
		
		$data['tanggal_awal']=$tanggal_awal;
		$data['tanggal_akhir']=$tanggal_akhir;
		$data['bidang_studi']=$id_bidang_studi;
		$data['tempat_daftar']=$tempat_daftar;
		
	    $this->loadkonten('v_report/filter',$data);
	}
	
		public function export_excel(){
		
		$waktu=date("Y-m-d h:i");

		$data['title'] 		= "Report Data Siswa".$waktu."";
		
		$tanggal_awal=$this->input->post('tanggal_awal');
		$tanggal_akhir=$this->input->post('tanggal_akhir');
		$kat=$this->input->post('kategori');

		
		
		$data['excel']  = $this->M_rekap->export_data($tanggal_awal,$tanggal_akhir,$kat);
		$data['tanggal_awal']=$tanggal_awal;
		$data['tanggal_akhir']=$tanggal_akhir;
		$this->load->view('v_report/v_laporan_excel',$data);
	}
	
	
	
	
	
}
