<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Controller untuk tambah jadwal pertemuan kursus
class Sertif_karyawan extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_sertifKaryawan');
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
		$access = $this->M_sidebar->access('edit','karyawan');
		if ($access->menuview == 0){

			$data['page'] 		= "Data Sertifikat Karyawan";
			$data['judul'] 		= "Data Sertifikat Karyawan";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		}/*ini harus ada boss */
		else{
			$where=array('id_karyawan' => $id);
			$data['datamaster']  = $id;
			// var_dump($data['datamaster']);
			// die;
			

			$data['page'] 		= "Data Sertifikat Karyawan";
			$data['judul'] 		= "Data Sertifikat Karyawan";
			$this->loadkonten('v_sertif_karyawan/home',$data);
		}
	}
	

	public function ajax_list($id)
	{
		$list = $this->M_sertifKaryawan->get_data($id);
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $sertif) {
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $sertif->no_sertifikat;
            $row[] = $sertif->nama_pelatihan;	
            $row[] = $sertif->durasi;	
            //add html for action
			$row[] = ' <button class="btn btn-sm btn-danger hapus-detail-jadwal" id_detail_jadwal="id_detail_jadwal" data-id='."'".$sertif->id_sertifikat."'".'><i class="glyphicon glyphicon-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function Add($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('add','karyawan');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Sertifikat Karyawan";
			$data['judul'] 		= "Data Sertifikat Karyawan";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 
		 /*ini harus ada boss */
		 else{
		
		$where=array('id_karyawan' => $id);
		//$data['sertifikat']  = $this->M_karyawan->sertifikat($id);	
		$data['datasertif']	= $this->M_sertifKaryawan->select_by_id($id);

		$data['page'] 		= "Data Sertifikat Karyawan";
		$data['judul'] 		= "Data Sertifikat Karyawan";
	    $this->loadkonten('v_sertif_karyawan/tambah',$data);
		}
	}

	public function prosesTambah()
	{
		$config['upload_path']="./upload/gambar/";
		$config['allowed_types']='gif|jpg|png|pdf';
		$config['max_size'] = '2048'; //maksimum besar file 2M
		$config['overwrite'] = TRUE;

		$this->load->library('upload',$config);

		if ($this->upload->do_upload("gambar")) {
			$image_data = $this->upload->data();
			$path['link']= "upload/gambar/";
			
			$tgl_start 		= $this->input->post('tanggal_mulai'); 
			$tgl_mulai		= date("Y-m-d", strtotime($tgl_start));
			$tgl_end 		= $this->input->post('tanggal_selesai'); 
			$tgl_selesai	= date("Y-m-d", strtotime($tgl_end));

			$data = array(
				'id_karyawan'			=> $this->input->post('id_karyawan'),
				'no_sertifikat'			=> $this->input->post('no_sertifikat'),
				'nama_pelatihan'		=> $this->input->post('nama_pelatihan'),
				'tanggal_mulai' 		=> $tgl_mulai,
				'tanggal_selesai' 		=> $tgl_selesai,
				'durasi'				=> $tgl_selesai - $tgl_mulai,
				'gambar'            	=> $path['link'] . ''. $image_data['file_name'],
				'created_date' 			=> date('Y-m-d H:i:s'),
				'updated_date' 			=> date('Y-m-d H:i:s')
			);
			$result = $this->db->insert('tbl_sertifikat_karyawan',$data);

			if ($result > 0) {
				$out['status'] = 'berhasil';
			} else {
				$out['status'] = 'gagal';
			}
		}else{
			$tgl_start 		= $this->input->post('tanggal_mulai'); 
			$tgl_mulai		= date("Y-m-d", strtotime($tgl_start));
			$tgl_end 		= $this->input->post('tanggal_selesai'); 
			$tgl_selesai	= date("Y-m-d", strtotime($tgl_end));

			$data = array(
				'id_karyawan'			=> $this->input->post('id_karyawan'),
				'no_sertifikat'			=> $this->input->post('no_sertifikat'),
				'nama_pelatihan'		=> $this->input->post('nama_pelatihan'),
				'tanggal_mulai' 		=> $tgl_mulai,
				'tanggal_selesai' 		=> $tgl_selesai,
				'durasi'				=> $tgl_selesai - $tgl_mulai,
				//'gambar'            	=> $path['link'] . ''. $image_data['file_name'],
				'created_date' 			=> date('Y-m-d H:i:s'),
				'updated_date' 			=> date('Y-m-d H:i:s')
			);
			$result = $this->db->insert('tbl_sertifikat_karyawan',$data);

			if ($result > 0) {
				$out['status'] = 'berhasil';
			} else {
				$out['status'] = 'gagal';
			}
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
}
