<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_total');
		
	}
	
	public function loadkonten($page, $data) {
		
		$data['userdata'] 	= $this->userdata;
		$ajax = ($this->input->post('status_link') == "ajax" ? true : false);
		if (!$ajax) { 
			$this->load->view('layouts/header', $data);
		}
		$this->load->view($page, $data);
		if (!$ajax) $this->load->view('layouts/footer', $data);
	}

	public function index() {
		$data['bidang_s']		= $this->M_total->get_studi();
		$data['jenkel']			= $this->M_total->get_jenkel();
		$data['daftar']         = $this->M_total->total_daftar();
		$data['siswa']          = $this->M_total->total_siswa();
		$data['pengajar']       = $this->M_total->total_pengajar();
		$data['karyawan']       = $this->M_total->total_karyawan();
		$data['jadwal']        	= $this->M_total->total_jadwal();
		$data['studi']          = $this->M_total->total_studi();
		$data['pendaftar']      = $this->M_total->get_data_daftar();
		$data['jadwal_aktif']   = $this->M_total->get_data_jadwal_aktif();
		$data['ultah']   		= $this->M_total->get_data_ultah();
		$data['ultahk']  = $this->M_total->get_data_ultahkaryawan();
		$data['userdata'] 		= $this->userdata;


		$data['page'] 			= "home";
		$data['judul'] 			= "Beranda";
		$this->loadkonten('home', $data);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */