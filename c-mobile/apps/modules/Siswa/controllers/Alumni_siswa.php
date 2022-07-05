<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni_siswa extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('M_alumni_siswa');
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
		$data['page'] 		= "Data Alumni Siswa";
		$data['judul'] 		= "Data Alumni Siswa";
		
		$this->loadkonten('v_alumni_siswa/home',$data);
	}

	public function ajax_list()
	{
		$list = $this->M_alumni_siswa->get_data();
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $master) {
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $master->nama_siswa;
			$row[] = $master->email;
			$row[] = $master->telepon;
			$row[] = $master->nama_bidang_studi;
			$row[] = date('d-m-Y',strtotime($master->tanggal_mulai))." - ".date('d-m-Y',strtotime($master->tanggal_selesai));
			$row[] = $master->nama_tentor;
			
			//add html for action
			$row[] =  anchor('edit-alumni-siswa/'.$master->id_siswa, ' <span class="fa fa-eye"></span> ', ' class="btn btn-sm btn-primary ajaxify klik " ').			
				      '  <button class="btn btn-sm btn-danger hapus-alumni" data-id='."'".$master->nama."'".'><i class="glyphicon glyphicon-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	

	public function Edit($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('edit','alumni-siswa');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Siswa";
			$data['judul'] 		= "Data Siswa";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
		$where=array('id_siswa' => $id);
		$data['datamaster']  = $this->M_alumni_siswa->select_by_id($id);

		$data['page'] 		= "Data Siswa";
		$data['judul'] 		= "Data Siswa";
		$data['Kelamin']    = $this->M_alumni_siswa->selek_kelamin();
		$data['Studi']      = $this->M_alumni_siswa->selek_studi();	
		$data['Kursus']     = $this->M_alumni_siswa->selek_kursus();	
		$data['Bayar']      = $this->M_alumni_siswa->selek_bayar();	
		$data['Status']      = $this->M_alumni_siswa->selek_status();	
	    $this->loadkonten('v_alumni_siswa/update',$data);
	}
	}
	
	
	public function hapus() {
		
	$token = $this->input->post('nama');
	$nama=$this->db->get_where('siswa',array('nama'=>$token));
	if($nama->num_rows()>0){
	// $this->db->delete('login',array('nama'=>$token));
	$this->db->delete('siswa',array('nama'=>$token));
	}
	echo "{}";
	}
	
	
}
