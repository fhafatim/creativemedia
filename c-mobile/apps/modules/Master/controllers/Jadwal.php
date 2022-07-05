<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Controller untuk form tambah jadwal
class Jadwal extends AUTH_Controller {

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
		$data['userdata'] 		= $this->userdata; 
		$data['page'] 			= "Data Penjadwalan";
		$data['judul'] 			= "Data Penjadwalan";
		
		$this->loadkonten('v_jadwal/home',$data);
	}
	
	function ambil_data(){

		$modul=$this->input->post('modul');
		$id=$this->input->post('id_pendaftaran');
	

		if($modul=="bidang_studi"){
		echo $this->M_jadwal->selek_data($id);
		}

		else if($modul=="id_siswa"){
		echo $this->M_jadwal->selek_nama($id);
		}
		
		}

	public function ajax_list()
	{
		$list = $this->M_jadwal->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $jadwal) {
			
		
		//$replace1= str_replace(',', '<li>', $jadwal->jam_selesai - $jadwal->jam_mulai);
		//$replace3= str_replace(',', '<li>', $jadwal->hari);
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
			$row[] = $jadwal->nama_tentor;
			// $row[] = 'ke- '.$jadwal->pertemuan.'';
			$row[] = '<small class="label pull-center bg-blue">'.$jadwal->status_kelas.'</small">';
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
	
	// fungsi ADD Asli
	public function Add() {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('add','jadwal');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Penjadwalan";
			$data['judul'] 		= "Data Penjadwalan";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
		$data['page'] 		= "Data Penjadwalan";
		$data['judul'] 		= "Data Penjadwalan";
		$data['Studi']      = $this->M_jadwal->selek_studi();
		$data['Siswa']      = $this->M_jadwal->selek_siswa();
		//$data['Hari']       = $this->M_jadwal->selek_hari();
		$this->loadkonten('v_jadwal/tambah',$data);
	}
}

	public function prosesTambah() {
		
		if (isset($_POST["id_pendaftaran"]) && ($_POST["id_tentor"]))
		{
		$tgl_start 						= $this->input->post('tanggal_mulai'); 
		$tgl_mulai = date("Y-m-d", strtotime($tgl_start));
		$tgl_end 						= $this->input->post('tanggal_selesai'); 
		$tgl_selesai = date("Y-m-d", strtotime($tgl_end));
		$data = array(
		'id_pendaftaran' 		    => $this->input->post('id_pendaftaran'),
		'id_siswa' 		   	   		=> $this->input->post('id_siswa'),
		// // 'hari' 		   	       	=> implode(",",$this->input->post('hari')),
		// // 'jam' 		   	       	=> implode(",",$this->input->post('jam')),
		// // 'jam2' 		   	       	=> implode(",",$this->input->post('jam2')),
		'id_tentor' 		   	   	=> $this->input->post('id_tentor'),
		// //'studi' 		   	   		=> $this->input->post('studi'),

		'jumlah_pertemuan' 		   	=> $this->input->post('jumlah_pertemuan'),
		
		'tanggal_mulai' 		   	=> $tgl_mulai,
		'tanggal_selesai' 		   	=> $tgl_selesai,
		'status_kelas' 		   	   	=> 'berjalan',
		// //'created_by' 		   		=> $this->input->post('created_by'),
		'ruang'						=> $this->input->post('ruang'),
		'created_date'	       		=> date('Y-m-d H:i:s'),
		'updated_date'	           	=> date('Y-m-d H')
		);
		$result = $this->M_jadwal->simpan_data($data);
		$id_kelas = $this->db->insert_id();

		// $data2 = array(
		// 	'id_kelas'				=> $id_kelas,
		// 	'status_jadwal'			=> 'pending'
		// );
		// $result = $this->db->insert('tbl_jadwal',$data2);
			
		if ($result > 0) {
		//$out['status'] = 'berhasil';
		$out = array('status'=>'berhasil', 'id_kelas'=>$id_kelas);
		} else {
		$out['status'] = 'gagal';
		}
		
		} else {
			$out['status'] = 'gagal';
		}

		echo json_encode($out);
	}
	
	
	public function Edit($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('edit','jadwal');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Penjadwalan";
			$data['judul'] 		= "Data Penjadwalan";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
		$where=array('id_kelas' => $id);
		$data['datajadwal'] = $this->M_jadwal->select_by_id($id);
		$data['Studi']      = $this->M_jadwal->selek_studi();
		$data['Siswa']      = $this->M_jadwal->selek_siswa2();
		$data['Hari']       = $this->M_jadwal->selek_hari();
		$data['Trainer']    = $this->M_jadwal->selek_trainer();
		$data['Status']     = $this->M_jadwal->selek_status();
		$data['Count']		= $this->M_jadwal->get_jadwal_selesai($id);
		// var_dump($data);
		// die;		

		$data['page'] 		= "Data Penjadwalan";
		$data['judul'] 		= "Data Penjadwalan";
	    $this->loadkonten('v_jadwal/update',$data);
		}
	}
	
	public function prosesUpdate() {
		
		if (isset($_POST["id_siswa"]) && ($_POST["id_tentor"]) && ($_POST["jumlah_pertemuan"]) )
		{
		$where = array(
		'id_kelas' 		   => $this->input->post('id_kelas')
		);	
		
		$where2 = array(
		'id_kelas' 		   => $this->input->post('id_kelas')
		);
		
		$tgl_start 						= $this->input->post('tanggal_mulai'); 
		$tgl_mulai = date("Y-m-d", strtotime($tgl_start));
		$tgl_end 						= $this->input->post('tanggal_selesai'); 
		$tgl_selesai = date("Y-m-d", strtotime($tgl_end));
		 
		$data = array(
		'id_tentor' 		   => $this->input->post('id_tentor'),
		'jumlah_pertemuan' 	   => $this->input->post('jumlah_pertemuan'),
		'tanggal_mulai' 	   => $tgl_mulai,
		'tanggal_selesai' 	   => $tgl_selesai,
		'updated_date'	       => date('Y-m-d H:i:s')
		);
		
		$result = $this->M_jadwal->update($data,$where);
		// $result2 = $this->M_jadwal->update3($where);
			
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		} 
		
		else {
		$out['status'] = 'gagal';
		}
		
		echo json_encode($out);
	}

	public function selesai(){
		$where = array(
			'id_kelas' 		   => $this->input->post('id_kelas')
			);	
			$where2 = array(
			'id_kelas' 		   => $this->input->post('id_kelas')
			);	
			 
			$data = array(
			'status_kelas'	 	   => 'selesai',
			'updated_date'	       => date('Y-m-d H:i:s')
			);
			
			$result = $this->M_jadwal->update($data,$where);
			// $result2 = $this->M_jadwal->update3($where);
				
			if ($result > 0) {
			$out['status'] = 'berhasil';
			} else {
			$out['status'] = 'gagal';
			}
		echo json_encode($out);
	}

	public function selesai2(){
		$where = array(
			'id_kelas' 		   => $this->input->post('id_kelas')
			);	
			$where2 = array(
			'id_kelas' 		   => $this->input->post('id_kelas')
			);	
			 
			$data = array(
			'status_kelas'	 	   => 'berjalan',
			'updated_date'	       => date('Y-m-d H:i:s')
			);
			
			$result = $this->M_jadwal->update($data,$where);
			// $result2 = $this->M_jadwal->update3($where);
				
			if ($result > 0) {
			$out['status'] = 'berhasil';
			} else {
			$out['status'] = 'gagal';
			}
		echo json_encode($out);
	}
	
	public function hapus() {
		$id = $_POST['id_kelas'];
		$result = $this->M_jadwal->hapus($id);
		
		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
	}
	
	
	
	
	
	
}
