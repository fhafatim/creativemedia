<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_karyawan');
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
		$data['page'] 		= "Data Karyawan";
		$data['judul'] 		= "Data Karyawan";
		
		$this->loadkonten('v_karyawan/home',$data);
	}

	public function ajax_list()
	{
		$list = $this->M_karyawan->get_data();
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $karyawan) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $karyawan->nama_karyawan;
			$row[] = $karyawan->tanggal_lahir;
			if ($karyawan->jabatan == 'direktur') {
				$jabatan = 'Director';
			} elseif($karyawan->jabatan == 'manager') {
				$jabatan = 'Manager HR & GA';
			} elseif($karyawan->jabatan == 'hrd') {
				$jabatan = 'HRD & Admin';
			} elseif($karyawan->jabatan == 'admin') {
				$jabatan = 'Admin & Finance';
			} elseif($karyawan->jabatan == 'cso') {
				$jabatan = 'Customer Service Officer';
			} elseif($karyawan->jabatan == 'programmer') {
				$jabatan = 'Programmer';
			} elseif($karyawan->jabatan == 'desaingrafis') {
				$jabatan = 'Graphics Designer';
			} else {
				$jabatan = 'Trainer';
			}
			$row[] = $jabatan;
			if ($karyawan->status_karyawan == 'aktif') {
				$StatusKaryawan = '<small class="label pull-center bg-blue">Aktif</small>';
			} else {
				$StatusKaryawan = '<small class="label pull-center bg-red">Tidak Aktif</small>';
			}
			$row[] =$StatusKaryawan;
			$row[] = '<a href="'.base_url().''.$karyawan->gambar.'" target="_blank"><img class="img-thumbnail" src="'.base_url().''.$karyawan->gambar.'"   width="90" /></a>';    
			//add html for action
			$row[] =  anchor('edit-karyawan/'.$karyawan->id_karyawan, ' <span class="fa fa-edit"></span> ', ' class="btn btn-sm btn-primary ajaxify klik " '). 
				      '  <button class="btn btn-sm btn-danger hapus-karyawan" data-id='."'".$karyawan->id_karyawan."'".'><i class="glyphicon glyphicon-trash"></i></button> '.
				      anchor('list-sertifikat-karyawan/'.$karyawan->id_karyawan, ' <span class="fa fa-book"></span> ', ' class="btn btn-sm btn-primary ajaxify klik " ');
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	
	public function List_Sertif($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('edit','karyawan');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Sertifikat Karyawan";
			$data['judul'] 		= "Data Sertifikat Karyawan";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 
		 /*ini harus ada boss */
		 else{
		
		$where=array('id_karyawan' => $id);
		//$data['sertifikat']  = $this->M_karyawan->sertifikat($id);	
		$data['datasertif']	= $this->M_karyawan->select_by_id($id);

		$data['page'] 		= "Data Sertifikat Karyawan";
		$data['judul'] 		= "Data Sertifikat Karyawan";
	    $this->loadkonten('v_karyawan/sertif2',$data);
		}	
	}
	
	
	/*ajak search kategori */
	
	public function cari_ajak_karyawan(){
            $cari = $this->input->get('q');
            $data_warna = $this->M_karyawan->cari_ajak_all($cari);
            echo json_encode($data_warna);
        }
	
	
	public function Add() {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('add','karyawan');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Karyawan";
			$data['judul'] 		= "Tambah Data Karyawan";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
		$data['page'] 		= "Data Karyawan";
		$data['judul'] 		= "Tambah Data Karyawan";	
		$this->loadkonten('v_karyawan/tambah',$data);
	}
}

	public function prosesTambah() {
		if (isset($_POST["nama_karyawan"]) ) {
			
			$config['upload_path']="./upload/gambar/";
			$config['allowed_types']='gif|jpg|png';
			$config['max_size'] = '2048'; //maksimum besar file 2M
			$config['overwrite'] = TRUE;

			$this->load->library('upload',$config);

			if($this->upload->do_upload("gambar"))
			{
				$image_data = $this->upload->data();
				$path['link']= "upload/gambar/";
				$data = array(
					'nama_karyawan'		=> $this->input->post('nama_karyawan'),
					'nik'				=> $this->input->post('nik'),
					'jenis_kelamin' 	=> $this->input->post('jenis_kelamin'),
					'tanggal_lahir' 	=> date('Y-m-d', strtotime($this->input->post('tanggal_lahir'))),
					'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
					'alamat' 			=> $this->input->post('alamat'),
					'kota' 				=> $this->input->post('kota'),
					'provinsi' 			=> $this->input->post('provinsi'),
					'telepon' 			=> $this->input->post('telepon'),
					'telepon_alternatif'=> $this->input->post('telepon_alternatif'),
					'pendidikan' 		=> $this->input->post('pendidikan'),
					'lembaga_pendidikan'=> $this->input->post('lembaga_pendidikan'),
					'tahun_lulus' 		=> $this->input->post('tahun_lulus'),
					'jabatan' 			=> $this->input->post('jabatan'),
					'tanggal_masuk' 	=> date('Y-m-d', strtotime($this->input->post('tanggal_masuk'))),
					'gambar'            => $path['link'] . ''. $image_data['file_name'],
					'status_karyawan' 	=> $this->input->post('status_karyawan'),
					'created_date' 		=> date('Y-m-d H:i:s'),
					'updated_date' 		=> date('Y-m-d H:i:s')
				);
				$result = $this->db->insert('tbl_karyawan',$data);
	
				// $result = $this->M_karyawan->simpan_data($data);
				// $result = $this->M_karyawan->simpanLogin($data2);

				if ($result > 0) {
					$out['status'] = 'berhasil';
				} else {
					$out['status'] = 'gagal';
				}
			}else{
				$data = array(
					'nama_karyawan'		=> $this->input->post('nama_karyawan'),
					'nik'				=> $this->input->post('nik'),
					'jenis_kelamin' 	=> $this->input->post('jenis_kelamin'),
					'tanggal_lahir' 	=> date('Y-m-d', strtotime($this->input->post('tanggal_lahir'))),
					'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
					'alamat' 			=> $this->input->post('alamat'),
					'kota' 				=> $this->input->post('kota'),
					'provinsi' 			=> $this->input->post('provinsi'),
					'telepon' 			=> $this->input->post('telepon'),
					'telepon_alternatif'=> $this->input->post('telepon_alternatif'),
					'pendidikan' 		=> $this->input->post('pendidikan'),
					'lembaga_pendidikan'=> $this->input->post('lembaga_pendidikan'),
					'tahun_lulus' 		=> $this->input->post('tahun_lulus'),
					'jabatan' 			=> $this->input->post('jabatan'),
					'tanggal_masuk' 	=> date('Y-m-d', strtotime($this->input->post('tanggal_masuk'))),
					'gambar'           	=> 'upload/karyawan/avatar.png',
					'status_karyawan' 	=> $this->input->post('status_karyawan'),
					'created_date' 		=> date('Y-m-d H:i:s'),
					'updated_date' 		=> date('Y-m-d H:i:s')
				);
				$result = $this->db->insert('tbl_karyawan',$data);
				

				// $result = $this->M_karyawan->simpan_data($data);
				// $result = $this->M_karyawan->simpanLogin($data2);

				if ($result > 0) {
					$out['status'] = 'berhasil';
				} else {
					$out['status'] = 'gagal';
				}
			}
		}

		echo json_encode($out);
	}
	
	
	public function Edit($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('edit','karyawan');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Karyawan";
			$data['judul'] 		= "Edit Data Karyawan";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
		$where=array('id_karyawan' => $id);
		$data['datakaryawan']  = $this->M_karyawan->select_by_id($id);

		$data['page'] 		= "Data Karyawan";
		$data['judul'] 		= "Edit Data Karyawan";
	    $this->loadkonten('v_karyawan/update',$data);
	}
	}

	public function prosesUpdate() {
		
		$config['upload_path']="./upload/gambar/";
        $config['allowed_types']='gif|jpg|png';
		$config['max_size'] = '2048'; //maksimum besar file 2M
        $config['overwrite'] = TRUE;
		
		$this->load->library('upload',$config);
		
	    if($this->upload->do_upload("gambar"))
		{
		$image_data = $this->upload->data();
		$path['link']= "upload/gambar/";
		
		$where = array(
		'id_karyawan' 		   => $this->input->post('id_karyawan')
		);	
		
		$data = array(
			'nama_karyawan'		=> $this->input->post('nama_karyawan'),
			'nik'				=> $this->input->post('nik'),
			'jenis_kelamin' 	=> $this->input->post('jenis_kelamin'),
			'tanggal_lahir' 	=> date('Y-m-d', strtotime($this->input->post('tanggal_lahir'))),
			'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
			'alamat' 			=> $this->input->post('alamat'),
			'kota' 				=> $this->input->post('kota'),
			'provinsi' 			=> $this->input->post('provinsi'),
			'telepon' 			=> $this->input->post('telepon'),
			'telepon_alternatif'=> $this->input->post('telepon_alternatif'),
			'pendidikan' 		=> $this->input->post('pendidikan'),
			'lembaga_pendidikan'=> $this->input->post('lembaga_pendidikan'),
			'tahun_lulus' 		=> $this->input->post('tahun_lulus'),
			'jabatan' 			=> $this->input->post('jabatan'),
			'tanggal_masuk' 	=> date('Y-m-d', strtotime($this->input->post('tanggal_masuk'))),
			'gambar'            => $path['link'] . ''. $image_data['file_name'],
			'status_karyawan' 	=> $this->input->post('status_karyawan'),
			'created_date' 		=> date('Y-m-d H:i:s'),
			'updated_date' 		=> date('Y-m-d H:i:s')
		);
		
		$result = $this->M_karyawan->update($data,$where);
			
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		
		}else {
			
		$where = array(
		'id_karyawan' 		   => $this->input->post('id_karyawan')
		);	
		
		$data = array(
			'nama_karyawan'		=> $this->input->post('nama_karyawan'),
			'nik'				=> $this->input->post('nik'),
			'jenis_kelamin' 	=> $this->input->post('jenis_kelamin'),
			'tanggal_lahir' 	=> date('Y-m-d', strtotime($this->input->post('tanggal_lahir'))),
			'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
			'alamat' 			=> $this->input->post('alamat'),
			'kota' 				=> $this->input->post('kota'),
			'provinsi' 			=> $this->input->post('provinsi'),
			'telepon' 			=> $this->input->post('telepon'),
			'telepon_alternatif'=> $this->input->post('telepon_alternatif'),
			'pendidikan' 		=> $this->input->post('pendidikan'),
			'lembaga_pendidikan'=> $this->input->post('lembaga_pendidikan'),
			'tahun_lulus' 		=> $this->input->post('tahun_lulus'),
			'jabatan' 			=> $this->input->post('jabatan'),
			'tanggal_masuk' 	=> date('Y-m-d', strtotime($this->input->post('tanggal_masuk'))),
			'status_karyawan' 	=> $this->input->post('status_karyawan'),
			'created_date' 		=> date('Y-m-d H:i:s'),
			'updated_date' 		=> date('Y-m-d H:i:s')
		);		
		$result = $this->M_karyawan->update($data,$where);
		
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		}

		echo json_encode($out);
	}
	
	public function hapus() {

	//hapus berdasarkan id_karyawan
	$token = $this->input->post('id_karyawan');
	$gambar=$this->db->get_where('tbl_karyawan',array('id_karyawan'=>$token));
	if($gambar->num_rows()>0){
	$hasil=$gambar->row();
	$judul=$hasil->gambar;
	//hapus unlink foto
	if(file_exists($file=$judul)){
	unlink($file);
	}
	$this->db->delete('tbl_karyawan',array('id_karyawan'=>$token));
	}
	echo "{}";
	}
}