<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_selesai extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_jadwal');
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
		$data['page'] 		= "Data Penjadwalan Selesai";
		$data['judul'] 		= "Data Penjadwalan Selesai";
		
		$this->loadkonten('v_jadwal_selesai/home',$data);
	}

	public function ajax_list()
	{
		$list = $this->M_jadwal->get_data2();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $jadwal) {
			
		$replace1= str_replace(',', '<li>', $jadwal->jam);
		$replace3= str_replace(',', '<li>', $jadwal->hari);
		$jam= $replace1 . "-". $replace2;
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $jadwal->nama_siswa;
			if ($jadwal->id_bidang_studi == 16) {
				$nama_studi = $jadwal->keterangan.' [Custom]';
			}else{
				$nama_studi = $jadwal->nama_bidang_studi;
			}
			$row[] = $nama_studi;
			$row[] = $jadwal->jumlah_pertemuan;
			//$row[] = '<li><font size="2px">'.$replace3.'</font></li>';
			//$row[] = '<li><font size="2px">'.$replace1.'</font></li> ';
			//$row[] = $jadwal->tanggal_mulai .' s/d '. $jadwal->tanggal_selesai;
			$row[] = $jadwal->nama_tentor;
			// $row[] = 'ke- '.$jadwal->pertemuan.'';
			$row[] = '<small class="label pull-center bg-green">'.$jadwal->status_kelas.'</small">';
			//add html for action
			$row[] =  anchor('edit-jadwal/'.$jadwal->id_kelas, ' <span class="fa fa-eye"></span> ', ' class="btn btn-sm btn-primary ajaxify klik " '). 

			'  <button class="btn btn-sm btn-danger hapus-jadwal" data-id='."'".$jadwal->id_kelas."'".'><i class="glyphicon glyphicon-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	
	
	// public function Add() {
		
		// /*ini harus ada boss */
		// $data['userdata'] = $this->userdata;
		// $access = $this->M_sidebar->access('add','fasilitas');
		// if ($access->menuview == 0){
			// $data['page'] 		= "Data Penjadwalan";
			// $data['judul'] 		= "Data Penjadwalan";
			// $this->loadkonten('Dashboard/layouts/no_akses',$data);
		 // }
		
		// /*ini harus ada boss */
		
		// else{
		// $data['page'] 		= "Data Penjadwalan";
		// $data['judul'] 		= "Data Penjadwalan";
		// $data['Studi']      = $this->M_jadwal->selek_studi();
		// $data['Siswa']      = $this->M_jadwal->selek_siswa();
		// $data['Hari']       = $this->M_jadwal->selek_hari();
		// $this->loadkonten('v_jadwal/tambah',$data);
	// }
// }

	// public function prosesTambah() {
		
		// if (isset($_POST["studi"]) && ($_POST["siswa"]) && ($_POST["hari"]) && ($_POST["jam"]) && !empty($_POST["jam2"]))
		// {
		// $data = array(
		// 'studi' 		       => $this->input->post('studi'),
		// 'siswa' 		   	   => $this->input->post('siswa'),
		// 'hari' 		   	       => $this->input->post('hari'),
		// 'jam' 		   	       => $this->input->post('jam'),
		// 'jam2' 		   	       => $this->input->post('jam2'),
		// 'trainer' 		   	   => $this->input->post('trainer'),
		// 'studi' 		   	   => $this->input->post('studi'),
		// 'pertemuan' 		   => $this->input->post('pertemuan'),
		// 'created_by' 		   => $this->input->post('created_by'),
		// 'created_date'	       => date('Y-m-d H:i:s'),
		// 'tanggal'	           => date('Y-m-d H')
		// );
		// $result = $this->M_jadwal->simpan_data($data);
			
		// if ($result > 0) {
		// $out['status'] = 'berhasil';
		// } else {
		// $out['status'] = 'gagal';
		// }
		
		// } else {
			// $out['status'] = 'gagal';
		// }

		// echo json_encode($out);
	// }
	
	
	public function Edit($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('edit','jadwal-selesai');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Penjadwalan";
			$data['judul'] 		= "Data Penjadwalan";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
		$where=array('id_jadwal' => $id);
		$data['datajadwal'] = $this->M_jadwal->select_by_id($id);
		$data['Studi']      = $this->M_jadwal->selek_studi();
		$data['Siswa']      = $this->M_jadwal->selek_siswa();
		$data['Hari']       = $this->M_jadwal->selek_hari();
		$data['Trainer']    = $this->M_jadwal->selek_trainer();

		$data['page'] 		= "Data Penjadwalan";
		$data['judul'] 		= "Data Penjadwalan";
	    $this->loadkonten('v_jadwal_selesai/update',$data);
	}
	}
	
	// public function prosesUpdate() {
		
		// if (isset($_POST["studi"]) && ($_POST["siswa"]) && ($_POST["hari"]) && ($_POST["jam"]) && !empty($_POST["jam2"]))
		// {
		// $where = array(
		// 'id_jadwal' 		   => $this->input->post('id_jadwal')
		// );	
		
		// $data = array(
		// 'studi' 		       => $this->input->post('studi'),
		// 'siswa' 		   	   => $this->input->post('siswa'),
		// 'hari' 		   	       => $this->input->post('hari'),
		// 'jam' 		   	       => $this->input->post('jam'),
		// 'jam2' 		   	       => $this->input->post('jam2'),
		// 'trainer' 		   	   => $this->input->post('trainer'),
		// 'studi' 		   	   => $this->input->post('studi'),
		// 'pertemuan' 		   => $this->input->post('pertemuan'),
		// 'updated_by' 		   => $this->input->post('created_by'),
		// 'updated_date'	       => date('Y-m-d H:i:s')
		// );
		
		// $result = $this->M_jadwal->update($data,$where);
			
		// if ($result > 0) {
		// $out['status'] = 'berhasil';
		// } else {
		// $out['status'] = 'gagal';
		// }
		// } 
		
		// else {
		// $out['status'] = 'gagal';
		// }
		
		// echo json_encode($out);
	// }
	
	public function hapus() {
		$id = $_POST['id_jadwal'];
		$result = $this->M_jadwal->hapus($id);
		
		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
	}
	
	
	
	
	
	
}
