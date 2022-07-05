<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calon_siswa extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_calon_siswa');
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
		$data['page'] 		= "Data Calon Siswa";
		$data['judul'] 		= "Data Calon Siswa";
		
		$this->loadkonten('v_calon_siswa/home',$data);
	}

	public function ajax_list()
	{
		$list = $this->M_calon_siswa->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $master) {
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = date('d-m-Y',strtotime($master->created_date));
			$row[] = $master->nama_siswa;;
			$row[] = $master->email;
			$row[] = $master->telepon;
			$row[] = $master->nama_bidang_studi;			
			$row[] = '<small class="label pull-center bg-blue">'.$master->status_siswa.'</small">';
			//add html for action
			$row[] ='  <button class="btn btn-sm btn-danger hapus-calon-siswa" id_siswa ="id_siswa" data-id='."'".$master->id_siswa."'".'><i class="glyphicon glyphicon-trash"></i></button>';
			$data[] = $row;
		}
		

		$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->M_calon_siswa->count_all(),
                        "recordsFiltered" => $this->M_calon_siswa->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}
	public function hapus() {
			$id = $_POST['id_siswa'];
			$result = $this->M_calon_siswa->hapus($id);
			
			if ($result > 0) {
				$out['status'] = 'berhasil';
			} else {
				$out['status'] = 'gagal';
			}
	}
}