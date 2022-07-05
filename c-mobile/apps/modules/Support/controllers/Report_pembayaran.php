<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_pembayaran extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pembayaran');
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
		$data['page'] 		= "Report Pembayaran";
		$data['judul'] 		= "Report Pembayaran";
		
		$this->loadkonten('v_report_pembayaran/v_pembayaran',$data);
		
	}
	
	public function filter(){
		$data['userdata'] 	= $this->userdata;  
		$data['page'] 		= "Report Pembayaran";
		$data['judul'] 		= "Report Pembayaran";
		
		$tanggal_awal=$this->input->post('tanggal_awal');
		$tanggal_akhir=$this->input->post('tanggal_akhir');
		
		$data['filter']  = $this->M_pembayaran->export_data2($tanggal_awal,$tanggal_akhir);
		
		$data['tanggal_awal']=$tanggal_awal;
		$data['tanggal_akhir']=$tanggal_akhir;
		
		
	    $this->loadkonten('v_report_pembayaran/filter',$data);
	}
	
		public function export_excel(){
		
		$waktu=date("Y-m-d h:i");

		$data['title'] 		= "Report Data Pembayaran".$waktu."";
		
		$tanggal_awal=$this->input->post('tanggal_awal');
		$tanggal_akhir=$this->input->post('tanggal_akhir');
		
		$data['excel']  = $this->M_pembayaran->export_data2($tanggal_awal,$tanggal_akhir,$kat);
		$data['tanggal_awal']=$tanggal_awal;
		$data['tanggal_akhir']=$tanggal_akhir;
		$this->load->view('v_report_pembayaran/v_laporan_excel',$data);
	}
	
	
	
	
	
}
