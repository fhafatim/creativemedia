<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_honor extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_honor');
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
		$data['page'] 		= "Report Honor";
		$data['judul'] 		= "Report Honor";
		$data['tentor']  	= $this->M_honor->get_tentor();
		
		$this->loadkonten('v_report_honor/v_honor',$data);
		
	}
	
	public function filter(){
		$data['userdata'] 	= $this->userdata;  
		$data['page'] 		= "Report Honor";
		$data['judul'] 		= "Report Honor";
		
		$id_tentor=$this->input->post('id_tentor');
		$status_honor=$this->input->post('status_honor');
		
		$data['tentor']  	= $this->M_honor->get_tentor();
		$data['filter']  = $this->M_honor->export_data2($id_tentor,$status_honor);
		
		$data['id_tentor']=$id_tentor;
		$data['status_honor']=$status_honor;
		
		
	    $this->loadkonten('v_report_honor/filter',$data);
	}
	
		public function export_excel(){
		
		$waktu=date("Y-m-d h:i");

		$data['title'] 		= "Report Data Honor".$waktu."";
		
		$tanggal_awal=$this->input->post('tanggal_awal');
		$tanggal_akhir=$this->input->post('tanggal_akhir');
		
		$data['excel']  = $this->M_honor->export_data2($tanggal_awal,$tanggal_akhir,$kat);
		$data['tanggal_awal']=$tanggal_awal;
		$data['tanggal_akhir']=$tanggal_akhir;
		$this->load->view('v_report_honor/v_laporan_excel',$data);
	}
	
	
	
	
	
}
