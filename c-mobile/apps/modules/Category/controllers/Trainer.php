<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trainer extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_trainer');
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
		$data['page'] 		= "Data Trainer";
		$data['judul'] 		= "Data Trainer";
		
		$this->loadkonten('v_trainer/home',$data);
	}

	public function ajax_list()
	{
		$list = $this->M_trainer->get_data();
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $trainer) {
			$id_login = $trainer->id_login;
			$login = $this->db->query("SELECT * FROM tbl_login WHERE id_login = '$id_login'");
			$datalogin = $login->num_rows();

			$replace= str_replace(',', '<li>', $trainer->bidang_studi);
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = '<a href="'.base_url().''.$trainer->gambar.'" target="_blank"><img class="img-thumbnail" src="'.base_url().''.$trainer->gambar.'"   width="90" /></a>';    
			$row[] = $trainer->nama_tentor;
			$row[] = '<li><font size="2px">'.$replace.'</font></li>';
			$row[] = '<small class="label pull-center bg-blue">'.$trainer->status_tentor.'</small">';
			
			if ($datalogin > 0) {
				$Status_login = anchor('edit-login-tentor/'.$trainer->id_login, ' Edit ', ' class="btn btn-sm btn-primary ajaxify klik " ');
			}else {
				$Status_login = anchor('tambah-login-tentor/'.$trainer->id_tentor, ' Tambah ', ' class="btn btn-sm btn-primary ajaxify klik " ');
			}

			$row[] = $Status_login;
			//add html for action
			$row[] =  anchor('edit-trainer/'.$trainer->id_tentor, ' <span class="fa fa-edit"></span> ', ' class="btn btn-sm btn-primary ajaxify klik " '). 
				      '  <button class="btn btn-sm btn-danger hapus-trainer" data-id='."'".$trainer->id_login."'".'><i class="glyphicon glyphicon-trash"></i></button> '.anchor('history-trainer/'.$trainer->id_tentor, ' <span class="fa fa-eye"></span> ', ' class="btn btn-sm btn-success ajaxify klik " ');
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	
	
	/*ajak search kategori */
	
	public function cari_ajak_trainer(){
            $cari = $this->input->get('q');
            $data_warna = $this->M_trainer->cari_ajak_all($cari);
            echo json_encode($data_warna);
        }
	
	public function Tambah_login_tentor($id) {
	
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('edit','trainer');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Trainer";
			$data['judul'] 		= "Data Trainer";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }

		/*ini harus ada boss */
		else{
	
			$where=array('id_tentor' => $id);
			$data['datatrainer']  = $this->M_trainer->select_by_id($id);

			$data['page'] 		= "Data Tentor";
			$data['judul'] 		= "Data Tentor";	
			$this->loadkonten('v_trainer/tambah-login-tentor',$data);
		}
	}

	public function Edit_login_tentor($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('edit','trainer');
		if ($access->menuview == 0){
			$data['page'] 		= "Edit Login Trainer";
			$data['judul'] 		= "Edit Login Trainer";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
			$where=array('id_trainer' => $id);
			$data['datatrainer']  = $this->M_trainer->select_login_by_id($id);

			$data['page'] 		= "Edit Login Trainer";
			$data['judul'] 		= "Edit Login Trainer";		
			$this->loadkonten('v_trainer/edit-login-tentor',$data);
		}
	}

	public function prosesInsertLogin() {
		$date = date('Y-m-d H:i:s');
		
			$data = array(
				//data siswa
				'kategori_login' 	=> 'tentor',
				'username' 		 	=> $this->input->post('username'),
				'password' 		 	=> $this->input->post('password'),
				'status_login' 		=> $this->input->post('status_login'),
				'created_date'      => $date,
				'updated_date'      => $date,
			
			);
			
			$result = $this->db->insert('tbl_login', $data); 
			$insert_id = $this->db->insert_id();
			
			$where = array(
				'id_tentor' 	 => $this->input->post('id_tentor')
			);	
			
			$data2 = array(
				'id_login' 		 	=> $insert_id
			
			);
			
			$result = $this->db->update('tbl_tentor',$data2,$where); 				
			if ($result > 0) {
				$out['status'] = 'berhasil';
			} else {
				$out['status'] = 'gagal';
			}
		
		echo json_encode($out);
	}
	
	public function prosesUpdateLogin() {
		$date = date('Y-m-d H:i:s');
		
			$data = array(
				//data siswa
				'username' 		 	=> $this->input->post('username'),
				'password' 		 	=> $this->input->post('password'),
				'status_login' 		=> $this->input->post('status_login'),
				'created_date'      => $date,
				'updated_date'      => $date,
			
			);
			
			$where = array(
				'id_login' 	 => $this->input->post('id_login')
			);	
			
			$result = $this->db->update('tbl_login',$data,$where); 				
			if ($result > 0) {
				$out['status'] = 'berhasil';
			} else {
				$out['status'] = 'gagal';
			}
		
		echo json_encode($out);
	}

	public function Add() {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('add','trainer');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Trainer";
			$data['judul'] 		= "Data Trainer";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
		$data['page'] 		= "Data Trainer";
		$data['judul'] 		= "Data Trainer";
		$data['Studi']     = $this->M_trainer->selek_studi();		
		$this->loadkonten('v_trainer/tambah',$data);
	}
}

	public function prosesTambah() {
		if (isset($_POST["nama_tentor"]) ) {
			
			$config['upload_path']="./upload/gambar/";
			$config['allowed_types']='gif|jpg|png';
			$config['max_size'] = '2048'; //maksimum besar file 2M
			$config['overwrite'] = TRUE;

			$this->load->library('upload',$config);

			if($this->upload->do_upload("gambar"))
			{
				$image_data = $this->upload->data();
				$path['link']= "upload/gambar/";

				// $data2 = array(
				// 	'kategori_login'		=> 'tentor',
				// 	'username'				=> $this->input->post('username'),
				// 	'password'				=>md5($this->input->post('password')),
				// 	'status_login'			=> 'belum aktif',
				// 	'created_date'			=> date('Y-m-d H:i:s'),
				// 	'updated_date'			=> date('Y-m-d H:i:s')
				// );
				// $result = $this->db->insert('tbl_login',$data2);

				$data = array(
					//'id_login'			=> $this->db->insert_id(),
					'nama_tentor'		=> $this->input->post('nama_tentor'),
					'gambar'            => $path['link'] . ''. $image_data['file_name'],
					'ktp'				=> $this->input->post('ktp'),
					'jenis_kelamin' 	=> $this->input->post('jenis_kelamin'),
					'tanggal_lahir' 	=> $this-> input->post('tanggal_lahir'),
					'tempat_lahir' 		=> $this-> input->post('tempat_lahir'),
					'alamat' 			=> $this->input->post('alamat'),
					'kota' 				=> $this->input->post('kota'),
					'provinsi' 			=> $this->input->post('provinsi'),
					'telepon' 			=> $this->input->post('telepon'),
					'telepon_alternatif'=> $this->input->post('telepon_alternatif'),
					'pendidikan' 		=> $this->input->post('pendidikan'),
					'lembaga_pendidikan'=> $this->input->post('lembaga_pendidikan'),
					'tahun_lulus' 		=> $this->input->post('tahun_lulus'),
					'tanggal_masuk' 	=> $this->input->post('tanggal_masuk'),
					'bidang_studi' 		=> implode(",", $this->input->post('bidang_studi')),
					'status_tentor' 	=> 'tidak aktif',
					'created_date' 		=> date('Y-m-d H:i:s'),
					'updated_date' 		=> date('Y-m-d H:i:s')
				);
				$result = $this->db->insert('tbl_tentor',$data);
	
				// $result = $this->M_trainer->simpan_data($data);
				// $result = $this->M_trainer->simpanLogin($data2);

				if ($result > 0) {
					$out['status'] = 'berhasil';
				} else {
					$out['status'] = 'gagal';
				}
			}else{
				// $data2 = array(
				// 	'kategori_login'		=> 'tentor',
				// 	'username'				=> $this->input->post('username'),
				// 	'password'				=> md5($this->input->post('password')),
				// 	'status_login'			=> 'belum aktif',
				// 	'created_date'			=> date('Y-m-d H:i:s'),
				// 	'updated_date'			=> date('Y-m-d H:i:s')
				// );
				// $result = $this->db->insert('tbl_login',$data2);

				$data = array(
					//'id_login'			=> $this->db->insert_id(),
					'nama_tentor'		=> $this->input->post('nama_tentor'),
					'gambar'            => 'upload/gambar/avatar.png',
					'ktp'				=> $this->input->post('ktp'),
					'jenis_kelamin' 	=> $this->input->post('jenis_kelamin'),
					'tanggal_lahir' 	=> $this-> input->post('tanggal_lahir'),
					'tempat_lahir' 		=> $this-> input->post('tempat_lahir'),
					'alamat' 			=> $this->input->post('alamat'),
					'kota' 				=> $this->input->post('kota'),
					'provinsi' 			=> $this->input->post('provinsi'),
					'telepon' 			=> $this->input->post('telepon'),
					'telepon_alternatif'=> $this->input->post('telepon_alternatif'),
					'pendidikan' 		=> $this->input->post('pendidikan'),
					'lembaga_pendidikan'=> $this->input->post('lembaga_pendidikan'),
					'tahun_lulus' 		=> $this->input->post('tahun_lulus'),
					'tanggal_masuk' 	=> $this->input->post('tanggal_masuk'),
					'bidang_studi' 		=> implode(",", $this->input->post('bidang_studi')),
					'status_tentor' 	=> 'tidak aktif',
					'created_date' 		=> date('Y-m-d H:i:s'),
					'updated_date' 		=> date('Y-m-d H:i:s')
				);
				$result = $this->db->insert('tbl_tentor',$data);
				

				// $result = $this->M_trainer->simpan_data($data);
				// $result = $this->M_trainer->simpanLogin($data2);

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
		$access = $this->M_sidebar->access('edit','trainer');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Trainer";
			$data['judul'] 		= "Data Trainer";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
		$where=array('id_tentor' => $id);
		$data['datatrainer']  = $this->M_trainer->select_by_id($id);
		$data['Status'] = $this->M_trainer->selek_status();	
		$data['Ajar'] = $this->M_trainer->selek_ajar();
		$data['Studi']     = $this->M_trainer->selek_studi();

		$data['page'] 		= "Data Trainer";
		$data['judul'] 		= "Data Trainer";
	    $this->loadkonten('v_trainer/edit',$data);
	}
	}
	
	public function History($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('edit','trainer');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Trainer";
			$data['judul'] 		= "Data Trainer";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
		$where=array('id_tentor' => $id);
		$data['datatrainer']  = $id;
		$data['kursus_aktif']  = $this->M_trainer->kursus_aktif($id);
		$data['kursus_selesai']  = $this->M_trainer->kursus_selesai($id);

		$data['page'] 		= "Data Trainer";
		$data['judul'] 		= "Data Trainer";
	    $this->loadkonten('v_trainer/history',$data);
	}
	}
	
	public function LoadDataHistory($id)
	{
		$list = $this->M_trainer->get_kelas($id);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $master) {
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $master->nama_siswa;;
			$row[] = $master->nama_bidang_studi;
			$row[] = $master->nama_level_kelas;
			$row[] = date('d-m-Y',strtotime($master->tanggal_mulai)).' - '.date('d-m-Y',strtotime($master->tanggal_selesai));
			if($master->status_kelas == 'berjalan'){
				$row[] = '<small class="label pull-center bg-blue">'.$master->status_kelas.'</small">';
			} else {
				$row[] = '<small class="label pull-center bg-green">'.$master->status_kelas.'</small">';
			}
			
			$data[] = $row;
		}

		$output = array(
                        "draw" => $_POST['draw'],
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
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
		'id_tentor' 		   => $this->input->post('id_tentor')
		);	
		
		$data = array(
		'nama_tentor' 		   => $this->input->post('nama_tentor'),
		'bidang_studi' 		   => implode(",",$this->input->post('bidang_studi')),
		'ktp'		 		   => $this->input->post('ktp'),
		'jenis_kelamin'		   => $this->input->post('jenis_kelamin'),
		'tempat_lahir'		   => $this->input->post('tempat_lahir'),
		'tanggal_lahir'		   => date('Y-m-d', strtotime($this->input->post('tanggal_lahir'))),
		'alamat'		 	   => $this->input->post('alamat'),
		'kota'			 	   => $this->input->post('kota'),
		'provinsi'		 	   => $this->input->post('provinsi'),
		'telepon'		 	   => $this->input->post('telepon'),
		'telepon_alternatif'   => $this->input->post('telepon_alternatif'),
		'pendidikan'		   => $this->input->post('pendidikan'),
		'lembaga_pendidikan'   => $this->input->post('lembaga_pendidikan'),
		'tahun_lulus'		   => $this->input->post('tahun_lulus'),
		'tanggal_masuk'		   => date('Y-m-d', strtotime($this->input->post('tanggal_masuk'))),
		'gambar'               => $path['link'] . ''. $image_data['file_name'],
		'status_tentor'        => $this->input->post('status_tentor'),
		'updated_date'	       => date('Y-m-d H:i:s')
		);
		
		// $data2=array(
		// 'username' 		       => $this->input->post('username'),
		// //'tipe'                 => 'trainer',	
		// 'status_login'         => $this->input->post('status_login'),		
		// 'password' 		   	   => md5($this->input->post('password'))
		//  );
		 
		// $where2 = array(
		// 'id_login' 		   	   => $this->input->post('id_login')
		// );
		
		$result = $this->M_trainer->update($data,$where);
		//$result = $this->M_trainer->updateLogin($data2,$where2);
			
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		} 
		
		else {
			
		$where = array(
		'id_tentor' 		   => $this->input->post('id_tentor')
		);	
		
		$data = array(
			'nama_tentor' 		   => $this->input->post('nama_tentor'),
			'bidang_studi' 		   => implode(",",$this->input->post('bidang_studi')),
			'ktp'		 		   => $this->input->post('ktp'),
			'jenis_kelamin'		   => $this->input->post('jenis_kelamin'),
			'tempat_lahir'		   => $this->input->post('tempat_lahir'),
			'tanggal_lahir'		   => date('Y-m-d', strtotime($this->input->post('tanggal_lahir'))),
			'alamat'		 	   => $this->input->post('alamat'),
			'kota'			 	   => $this->input->post('kota'),
			'provinsi'		 	   => $this->input->post('provinsi'),
			'telepon'		 	   => $this->input->post('telepon'),
			'telepon_alternatif'   => $this->input->post('telepon_alternatif'),
			'pendidikan'		   => $this->input->post('pendidikan'),
			'lembaga_pendidikan'   => $this->input->post('lembaga_pendidikan'),
			'tahun_lulus'		   => $this->input->post('tahun_lulus'),
			'tanggal_masuk'		   => date('Y-m-d', strtotime($this->input->post('tanggal_masuk'))),
			'status_tentor'        => $this->input->post('status_tentor'),
			'updated_date'	       => date('Y-m-d H:i:s')
		);
		
		// $data2=array(
		// 'username' 		       => $this->input->post('username'),
		// //'tipe'                 => 'trainer',	
		// 'status_login'         => $this->input->post('status_login'),		
		// 'password' 		   	   => $this->input->post('password')
		//  );
		 
		// $where2 = array(
		// 'id_login' 		   	   => $this->input->post('id_login')
		// );
		
		$result = $this->M_trainer->update($data,$where);
		//$result = $this->M_trainer->updateLogin($data2,$where2);
		
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		}

		echo json_encode($out);
	}
	
	public function hapus() {
		
	// $token = $this->input->post('id_tentor');
	// $gambar=$this->db->get_where('tbl_tentor',array('id_tentor'=>$token));
	// if($gambar->num_rows()>0){
	// $hasil=$gambar->row();
	// $judul=$hasil->gambar;
	// //hapus unlink foto
	// if(file_exists($file=$judul)){
	// unlink($file);
	// }
	// //$this->db->delete('tbl_login',array('nama'=>$token));
	// $this->db->delete('tbl_tentor',array('id_tentor'=>$token));
	// }
	// echo "{}";
	// }

	//hapus berdasarkan id_login
	$token = $this->input->post('id_login');
	$gambar=$this->db->get_where('tbl_tentor',array('id_login'=>$token));
	if($gambar->num_rows()>0){
	$hasil=$gambar->row();
	$judul=$hasil->gambar;
	//hapus unlink foto
	if(file_exists($file=$judul)){
	unlink($file);
	}
	$this->db->delete('tbl_login',array('id_login'=>$token));
	$this->db->delete('tbl_tentor',array('id_login'=>$token));
	}
	echo "{}";
	}
	
}