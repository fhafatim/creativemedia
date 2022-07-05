<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Controller untuk tambah jadwal pertemuan kursus
class JadwalKelas extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_JadwalKelas');
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

	public function index($id)
	{
		$data['userdata'] 	= $this->userdata; 
		$access = $this->M_sidebar->access('edit','daftar');
		if ($access->menuview == 0){

			$data['page'] 		= "Data Penjadwalan";
			$data['judul'] 		= "Data Penjadwalan";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		}/*ini harus ada boss */
		else{
			$where=array('id_kelas' => $id);
			$data['datamaster']  = $id;
			// var_dump($data['datamaster']);
			// die;
			

			$data['page'] 		= "Data Penjadwalan";
			$data['judul'] 		= "Data Penjadwalan";
			$this->loadkonten('v_jadwal_kelas/home',$data);
		}
	}
	

	public function ajax_list($id)
	{
		// $sql = $this->db->query("SELECT tbl_jadwal.id_jadwal, tbl_jadwal.id_kelas AS id_kelas_jadwal, tbl_kelas.id_kelas, tbl_kelas.id_siswa FROM tbl_jadwal JOIN tbl_kelas ON tbl_jadwal.id_kelas = tbl_kelas.id_kelas WHERE tbl_jadwal.id_kelas = '2'");
		$list = $this->M_JadwalKelas->get_data($id);
		$data = array();
		$no = $_POST['start'];
		$tgl 	= $this->input->post('tanggal'); 
		$tanggal = date("Y-m-d", strtotime($tgl));

		foreach ($list as $jadwalkelas) {
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = 'ke- '.$jadwalkelas->pertemuan.'';
			// $row[] = $jadwalkelas->id_kelas;
			$row[] = date('d-m-Y',strtotime($jadwalkelas->tanggal));
			$row[] = $jadwalkelas->jam_mulai;
            $row[] = $jadwalkelas->jam_selesai;	
			$row[] = $jadwalkelas->keterangan;
			if($jadwalkelas->status_jadwal == 'pending'){
				$StatusJadwal = '<small class="label pull-center bg-yellow">pending</small>';
			}else if($jadwalkelas->status_jadwal == 'selesai'){
				$StatusJadwal = '<small class="label pull-center bg-green">selesai</small>';
			}
			$row[] = $StatusJadwal;
			//add html for action
			$row[] = ' <button class="btn btn-sm btn-success edit-jadwal" id_jadwal="id_jadwal" data-id='."'".$jadwalkelas->id_jadwal."'".'><i class="glyphicon glyphicon-check"></i></button>'.

			' <button class="btn btn-sm btn-danger hapus-jadwal" id_jadwal="id_jadwal" data-id='."'".$jadwalkelas->id_jadwal."'".'><i class="glyphicon glyphicon-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_list_detail($id)
	{
		$list = $this->M_JadwalKelas->get_data_detail($id);
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $detailjadwal) {
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $detailjadwal->hari;
            $row[] = $detailjadwal->jam_mulai;	
			//add html for action
			$row[] = ' <button class="btn btn-sm btn-danger hapus-detail-jadwal" id_detail_jadwal="id_detail_jadwal" data-id='."'".$detailjadwal->id_detail_jadwal."'".'><i class="glyphicon glyphicon-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function prosesTambahDetail()
	{
		
			$data = array(
			'id_kelas'		=> $this->input->post('id_kelas'),
			'hari'			=> $this->input->post('hari'),	
			'jam_mulai'		=> $this->input->post('jam_mulai')	
			);
			$result = $this->M_JadwalKelas->simpan_detail_jadwal($data);
			
			if ($result > 0) {
				$out['status'] = 'berhasil';
			} else {
				$out['status'] = 'gagal';
			}
		
		echo json_encode($out);
	}

	public function prosesTambah() {
		
		if (isset($_POST["tanggal"]) )
		{
		$tgl 						= $this->input->post('tanggal'); 
		$tanggal = date("Y-m-d", strtotime($tgl));
		$data = array(
		//'id_kelas'					=> $this->db->insert_id(),
		'id_kelas'					=> $this->input->post('id_kelas'),
		'tanggal'		 		    => $tanggal,
		'jam_mulai'		   	   		=> $this->input->post('jam_mulai'),
		'jam_selesai'		   	   	=> $this->input->post('jam_selesai'),
		'pertemuan'					=> $this->input->post('pertemuan'),
		'keterangan'				=> $this->input->post('keterangan'),
		'status_jadwal'				=> 'pending',
		'created_date'	       		=> date('Y-m-d H:i:s'),
		'updated_date'	           	=> date('Y-m-d H')
		);
		$result = $this->M_JadwalKelas->simpan_data($data);
			
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		
		} else {
			$out['status'] = 'gagal';
		}

		echo json_encode($out);
	}

	public function selesai(){
		
		$data2 = array(
			'status_jadwal' => 'selesai'
		);
		
		$id_jadwal = $this->input->post('id_jadwal');
		
		$where = array(
			'id_jadwal' => $id_jadwal
		);
		
		$result = $this->M_JadwalKelas->update_jadwal($data2,$where);
		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
		echo json_encode($out);
	}

	public function hapus() {
		$id_jadwal = $this->input->post('id_jadwal');

		$result = $this->M_JadwalKelas->hapus($id_jadwal);
		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
		
	}
	
	public function hapus_detail_jadwal() {
		$id_detail_jadwal = $this->input->post('id_detail_jadwal');

		$result = $this->M_JadwalKelas->hapus_detail($id_detail_jadwal);
		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
		
	}
}
