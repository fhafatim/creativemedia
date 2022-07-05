<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_daftar');
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
		$data['page'] 		= "Data Pendaftaran";
		$data['judul'] 		= "Data Pendaftaran";
		
		$this->loadkonten('v_daftar/home',$data);
	}

	public function ajax_list()
	{
		$list = $this->M_daftar->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $master) {
			
			$id_pendaftaran = $master->id_pendaftaran;
			$pembayaran = $this->db->query("SELECT * FROM tbl_invoice WHERE id_pendaftaran = '$id_pendaftaran'");
			$datapembayaran = $pembayaran->row();
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = date('d-m-Y',strtotime($master->tanggal_pendaftaran));
			$row[] = $master->nama_siswa;
			$row[] = $master->telepon;
			if ($master->id_bidang_studi == 16) {
				$nama_studi = $master->keterangan;
			}else{
				$nama_studi = $master->nama_bidang_studi;
			}
			
			$row[] = $nama_studi;
			$row[] = $master->nama_level_kelas;
			$row[] = $master->tempat_daftar;
			
			if ($master->status_pendaftaran == 'pending') {
				$StatusPengajuan = '<small class="label pull-center bg-yellow">Pending</small>';
			} else if ($master->status_pendaftaran == 'selesai') {
				$StatusPengajuan = '<small class="label pull-center bg-green">Selesai</small>';
			} else {
				$StatusPengajuan = '<small class="label pull-center bg-red">Batal</small>';
			}
			$row[] = $StatusPengajuan;
			
			if ($datapembayaran->status_invoice == 'pending') {
				$StatusPembayaran = '<small class="label pull-center bg-yellow">Belum Lunas</small>';
			} else if ($datapembayaran->status_invoice == '') {
				$StatusPembayaran = '<small class="label pull-center bg-yellow">Belum Lunas</small>';
			} else {
				$StatusPembayaran = '<small class="label pull-center bg-green">Lunas</small>';
			}
			$row[] = $StatusPembayaran;
			//$row[] = '<a href="'.base_url().''.$master->gambar.'" target="_blank"><img class="img-thumbnail" src="'.base_url().''.$master->gambar.'"   width="90" /></a>';    
			
			//add html for action
			$row[] =  anchor('edit-daftar/'.$master->id_pendaftaran, ' <span class="fa fa-edit"></span> ',' class="btn btn-sm btn-primary ajaxify klik " ').' '.
			'<button class="btn btn-sm btn-danger hapus-master data-toggle="tooltip" data-placement="top" title="Hapus"" id_pendaftaran="id_pendaftaran"  data-id='." '".$master->id_pendaftaran."' ".'><i class="glyphicon glyphicon-trash"></i></button>'.' '.
			anchor('history-pendaftaran/'.$master->id_pendaftaran, ' <span class="fa fa-eye"></span> ', ' class="btn btn-sm btn-warning ajaxify klik " data-toggle="tooltip" data-placement="top" title="Pembayaran"').' '.anchor('view-daftar/'.$master->id_pendaftaran, ' <span class="fa fa-eye"></span> ', ' class="btn btn-sm btn-info ajaxify klik " data-toggle="tooltip" data-placement="top" title="Detail"');
			$data[] = $row;
		}

		$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->M_daftar->count_all(),
                        "recordsFiltered" => $this->M_daftar->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}
	
	//tambahbaru
	public function Add_baru() {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('add','daftar');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Pendaftar";
			$data['judul'] 		= "Data Pendaftar";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
		$data['page'] 				= "Data Pendaftar";
		$data['judul'] 				= "Data Pendaftar";
		$data['kelamin']    		= $this->M_daftar->selek_kelamin();
		$data['agama']    			= $this->M_daftar->selek_agama();
		$data['jenis_tinggal']    	= $this->M_daftar->selek_jenis_tinggal();
		$data['level']    			= $this->M_daftar->selek_level();
		$data['kategori_kelas']    	= $this->M_daftar->selek_kategori_kelas();
		$data['Studi']      		= $this->M_daftar->selek_studi();
		$data['pendidikan'] 		= $this->M_daftar->selek_pendidikan();	
		$data['gaji']       		= $this->M_daftar->selek_penghasilan();		
		$this->loadkonten('v_daftar/tambah_baru',$data);
      }
	
	}
	
	//tambahlama
	public function Add_lama() {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('add','daftar');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Pendaftar";
			$data['judul'] 		= "Data Pendaftar";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
		$data['page'] 				= "Data Pendaftar";
		$data['judul'] 				= "Data Pendaftar";
		$data['siswa']    			= $this->M_daftar->selek_siswa();
		$data['level']    			= $this->M_daftar->selek_level();
		$data['kategori_kelas']    	= $this->M_daftar->selek_kategori_kelas();
		$data['Studi']      		= $this->M_daftar->selek_studi();	
		$this->loadkonten('v_daftar/tambah_lama',$data);
      }
	
	}

	public function tes() {
	$kode 	 = $this->M_daftar->kode();
	echo $kode;
	}

	//prosestambah
	public function prosesTambah() {
		
		$kode 	 		 = $this->M_daftar->kode();
		
		$nama = $this->session->userdata('nama');
		if(preg_match("/Nginden/i", $nama)) {
		    $kode_invoice 	 = $this->M_daftar->kode_invoice_nginden();
		} else if(preg_match("/Tubanan/i", $nama)) {
		    $kode_invoice 	 = $this->M_daftar->kode_invoice_tubanan();
		} else {
		    $kode_invoice 	 = $this->M_daftar->kode_invoice_tubanan();
		}
		
		if (isset($_POST["nama_lengkap"]) && ($_POST["nik"]) && ($_POST["email"]) && ($_POST["handphone"]) && !empty($_POST["alamat"]))
		{			
			$checkuser = $this->M_daftar->checkUsername($_POST["email"]);
		
			 if(!$checkuser){
			
			$config['upload_path']="./upload/user/";
			$config['allowed_types']='gif|jpg|png';
			$config['max_size'] = '2048'; //maksimum besar file 2M
			$config['overwrite'] = TRUE;

			$this->load->library('upload',$config);

			if($this->upload->do_upload("gambar"))
			{
				//jika ada gambarnya
				$image_data = $this->upload->data();
				$path['link']= "upload/user/";

				$data = array(
					'kategori_login'        => 'siswa',
					'username' 		       	=> $_POST["email"],
					'password'              => md5($kode),
					'status_login'          => 'belum aktif',
					'created_date'		    => date('Y-m-d H:i:s'),
					'updated_date'		    => date('Y-m-d H:i:s')			
				);
				$this->db->insert('tbl_login', $data);
				$id_login = $this->db->insert_id();
				
				if($this->input->post('jenis_tinggal') == ''){
					$jenis_tinggal = $this->input->post('jenis_tempat_tinggal');
				} else {
					$jenis_tinggal = $this->input->post('jenis_tinggal');
				}
				
				$data2 = array( 
					'id_login' 		 		 => $id_login,
					'nis' 		 			 => $kode,
					'nama_siswa' 		 	 => $this->input->post('nama_lengkap'),
					'jenis_kelamin' 		 => $this->input->post('jenis_kelamin'),
					'nik' 		   		 	 => $this->input->post('nik'),
					'tempat_lahir' 		     => $this->input->post('tempat_lahir'),
					'tanggal_lahir' 		 => date('Y-m-d', strtotime($this->input->post('tanggal_lahir'))),
					'agama'                  => $this->input->post('agama'),
					'jenis_tinggal'			 => $jenis_tinggal,
					'telepon'				 => $this->input->post('handphone'),
					'email'				 	 => $this->input->post('email'),
					'alamat'				 => $this->input->post('alamat'),
					'kota'				 	 => $this->input->post('kota'),
					'kode_pos'				 => $this->input->post('kode_pos'),
					'provinsi'				 => $this->input->post('provinsi'),
					'warga_negara'			 => $this->input->post('warganegara'),
					'pendidikan_terakhir'	 => $this->input->post('pendidikan_terakhir'),
					'nama_ayah'				 => $this->input->post('nama_ayah'),
					'nama_ibu'				 => $this->input->post('nama_ibu'),
					'alamat_ayah'			 => $this->input->post('alamat_ayah'),
					'alamat_ibu'			 => $this->input->post('alamat_ibu'),
					'nik_ayah'				 => $this->input->post('nik_ayah'),
					'nik_ibu'				 => $this->input->post('nik_ibu'),
					'pekerjaan_ayah'		 => $this->input->post('pekerjaan_ayah'),
					'pekerjaan_ibu'			 => $this->input->post('pekerjaan_ibu'),
					'pendidikan_ayah'		 => $this->input->post('pendidikan_ayah'),
					'pendidikan_ibu'		 => $this->input->post('pendidikan_ibu'),
					'tempat_lahir_ayah'		 => $this->input->post('tempat_lahir_ayah'),
					'tempat_lahir_ibu'		 => $this->input->post('tempat_lahir_ibu'),
					'tanggal_lahir_ayah'	 => date('Y-m-d', strtotime($this->input->post('tggal_lahir_ayah'))),
					'tanggal_lahir_ibu'		 => date('Y-m-d', strtotime($this->input->post('tggal_lahir_ibu'))),
					'penghasilan_ayah'		 => $this->input->post('penghasilan_ayah'),
					'penghasilan_ibu'		 => $this->input->post('penghasilan_ibu'),
					'telepon_ayah'			 => $this->input->post('telpon_ayah'),
					'telepon_ibu'			 => $this->input->post('telpon_ibu'),
					'email_ayah'			 => $this->input->post('email_ayah'),
					'email_ibu'				 => $this->input->post('email_ibu'),
					'gambar'             	 => $path['link'] . ''. $image_data['file_name'],
					'created_date'		     => date('Y-m-d H:i:s'),
					'updated_date'		     => date('Y-m-d H:i:s'),
					'status_siswa'			 => 'calon'									 
				); 
				$this->db->insert('tbl_siswa', $data2);
				$id_siswa = $this->db->insert_id();

				if($this->input->post('keterangan') == ''){
					$keterangan = $this->input->post('bidang_studi');
				} else {
					$keterangan = $this->input->post('keterangan');
				}
				
				$data3 = array( 
					'no_pendaftaran' 		 => $kode,
					'tanggal_pendaftaran' 	 => $this->input->post('tanggal_pendaftaran'),
					'id_siswa' 		 		 => $id_siswa,
					'id_bidang_studi' 		 => $this->input->post('bidang_studi'),
					'keterangan'			 => $keterangan,
					'id_kategori_kelas' 	 => $this->input->post('kategori_kelas'),
					'id_level_kelas' 		 => $this->input->post('level'),
					'metode_belajar' 		 => $this->input->post('metode_belajar'),
					'harga_kursus' 		     => preg_replace('/[Rp. ]/','',$this->input->post('harga_kursus')),
					'status_pendaftaran' 	 => 'pending',
					'tempat_daftar' 		 => $this->input->post('tempat_daftar'),
					'created_date' 		     => date('Y-m-d H:i:s'),
					'updated_date' 		     => date('Y-m-d H:i:s')						 
				);	
				$result = $this->db->insert('tbl_pendaftaran', $data3);

				$id_pendaftaran = $this->db->insert_id();
				$data4 = array( 
					'no_invoice' 		 	 => $kode_invoice,
					'id_pendaftaran' 	 	 => $id_pendaftaran,
					'tanggal_invoice' 		 => date('Y-m-d'),
					'status_invoice' 		 => 'pending',
					'created_date' 		     => date('Y-m-d H:i:s'),
					'updated_date' 		     => date('Y-m-d H:i:s')						 
				);
					
				$result = $this->db->insert('tbl_invoice', $data4);
				

				$email = $_POST['email'];
				$password = $kode;
				$config['useragent'] = 'Codeigniter';
				$config['protocol'] = 'smtp';
				$config['smtp_host'] = 'smtp.gmail.com';
				$config['smtp_port'] = 465;
				$config['smtp_crypto'] = 'ssl';
				$config['smtp_user'] = 'buhori100396@gmail.com';
				$config['smtp_pass'] = 'buhori100396';
				$config['mailtype'] = 'html';
				$config['charset']   = 'utf-8';
				$config['newline'] = "\r\n";

			// Load library email dan konfigurasinya
			$this->load->library('email', $config);

			// Email dan nama pengirim
			$this->email->from('buhori100396@gmail.com', 'creativemedia.id');

			// Email penerima
			$this->email->to(''.$email); // Ganti dengan email tujuan
			// Subject email
			$this->email->subject('Aktivasi Akun');

			$message =  "
			<html>
			<head>
			<title>Verifikasi Akun</title>
			<style>
			button {
			font-family: sans-serif;
			font-size: 15px;
			background: #22a4cf;
			color: white;
			border: white 3px solid;
			border-radius: 5px;
			padding: 12px 20px;
			margin-top: 10px;
			}

			button:hover {
			opacity: 0.9;
			}
			</style>
			</head>
			<body>
			<div style='background:#f2f2f2;font-family:arial,sans-serif;'>
			<div style='width:90%;max-width:600px;margin:auto;padding:20px 0 50px 0;box-sizing:border-box;'>
			<div
			style='background:#007BFF;padding:12px;text-align:center;width:100%;border-radius:8px 8px 0 0;box-sizing:border-box;'>
			</div>
			<div style='padding:20px;background:#fff;border:1px solid #e8e8e8;width:100%;box-sizing:border-box;'>
			<b>Hallo</b><br />Terima Kasih Sudah Mendaftar di Creative Media
			<p>Berikut ini username dan password akun anda <br />
			username :'".$email."'<br />
			password :'".$password."'
			<p>
			'Silahkan Klik Aktivasi Akun anda terlebih dahulu'
			<p>
			<center><a href='".base_url('aktivasi/')."".$id_login."'>
			<button class='button'>Aktivasi Akun</button></a>
			</center>
			</p>
			</div>
			<div
			style='background:#e8e8e8;border:1px solid #e8e8e8;color:#939598;padding:16px 24px;text-align:center;width:100%;border-radius:0 0 8px 8px;box-sizing:border-box;'>
			<small>Pesan dibuat otomatis dan dikirimkan oleh sistem
			Creative Media, semua balasan yang ditujukan ke alamat email ini tidak akan kami
			respon, untuk menghubungi Admin kami silahkan kirimkan email ke <a
			href='mailto:creativemedia@gmail.com'>
			creativemedia@gmail.com
			</a>.
			<p />
			<b>Creative Media &copy;
			</b>
			</small>
			</div>
			</div>
			</div>
			</body>
			</html>
			";
			// Isi email
			$this->email->message($message);
			$this->email->send();
				
			if ($result > 0) {
			$out['status'] = 'berhasil';
		//  redirect(base_url('daftar'),'refresh');
			} else {
			$out['status'] = 'gagal';
			}
				}else{
					//jika tidak ada gambarnya
					$data = array(
						'kategori_login'        => 'siswa',
						'username' 		       	=> $_POST["email"],
						'password'              => md5($kode),
						'status_login'          => 'belum aktif',
						'created_date'		    => date('Y-m-d H:i:s'),
						'updated_date'		    => date('Y-m-d H:i:s')			
					);
					$this->db->insert('tbl_login', $data);
					$id_login = $this->db->insert_id();
					
					if($this->input->post('jenis_tinggal') == ''){
						$jenis_tinggal = $this->input->post('jenis_tempat_tinggal');
					} else {
						$jenis_tinggal = $this->input->post('jenis_tinggal');
					}
					
					$data2 = array( 
						'id_login' 		 		 => $id_login,
						'nis' 		 			 => $kode,
						'nama_siswa' 		 	 => $this->input->post('nama_lengkap'),
						'jenis_kelamin' 		 => $this->input->post('jenis_kelamin'),
						'nik' 		   		 	 => $this->input->post('nik'),
						'tempat_lahir' 		     => $this->input->post('tempat_lahir'),
						'tanggal_lahir' 		 => date('Y-m-d', strtotime($this->input->post('tanggal_lahir'))),
						'agama'                  => $this->input->post('agama'),
						'jenis_tinggal'			 => $jenis_tinggal,
						'telepon'				 => $this->input->post('handphone'),
						'email'				 	 => $this->input->post('email'),
						'alamat'				 => $this->input->post('alamat'),
						'kota'				 	 => $this->input->post('kota'),
						'kode_pos'				 => $this->input->post('kode_pos'),
						'provinsi'				 => $this->input->post('provinsi'),
						'warga_negara'			 => $this->input->post('warganegara'),
						'pendidikan_terakhir'	 => $this->input->post('pendidikan_terakhir'),
						'nama_ayah'				 => $this->input->post('nama_ayah'),
						'nama_ibu'				 => $this->input->post('nama_ibu'),
						'alamat_ayah'			 => $this->input->post('alamat_ayah'),
						'alamat_ibu'			 => $this->input->post('alamat_ibu'),
						'nik_ayah'				 => $this->input->post('nik_ayah'),
						'nik_ibu'				 => $this->input->post('nik_ibu'),
						'pekerjaan_ayah'		 => $this->input->post('pekerjaan_ayah'),
						'pekerjaan_ibu'			 => $this->input->post('pekerjaan_ibu'),
						'pendidikan_ayah'		 => $this->input->post('pendidikan_ayah'),
						'pendidikan_ibu'		 => $this->input->post('pendidikan_ibu'),
						'tempat_lahir_ayah'		 => $this->input->post('tempat_lahir_ayah'),
						'tempat_lahir_ibu'		 => $this->input->post('tempat_lahir_ibu'),
						'tanggal_lahir_ayah'	 => date('Y-m-d', strtotime($this->input->post('tggal_lahir_ayah'))),
						'tanggal_lahir_ibu'		 => date('Y-m-d', strtotime($this->input->post('tggal_lahir_ibu'))),
						'penghasilan_ayah'		 => $this->input->post('penghasilan_ayah'),
						'penghasilan_ibu'		 => $this->input->post('penghasilan_ibu'),
						'telepon_ayah'			 => $this->input->post('telpon_ayah'),
						'telepon_ibu'			 => $this->input->post('telpon_ibu'),
						'email_ayah'			 => $this->input->post('email_ayah'),
						'email_ibu'				 => $this->input->post('email_ibu'),
						'gambar'           	     => 'upload/user/avatar.png',
						'created_date'		     => date('Y-m-d H:i:s'),
						'updated_date'		     => date('Y-m-d H:i:s'),
						'status_siswa'			 => 'calon'									 
					); 
					$this->db->insert('tbl_siswa', $data2);
					$id_siswa = $this->db->insert_id();

					if($this->input->post('keterangan') == ''){
						$keterangan = $this->input->post('bidang_studi');
					} else {
						$keterangan = $this->input->post('keterangan');
					}
					
					$data3 = array( 
						'no_pendaftaran' 		 => $kode,
						'tanggal_pendaftaran' 	 => $this->input->post('tanggal_pendaftaran'),
						'id_siswa' 		 		 => $id_siswa,
						'id_bidang_studi' 		 => $this->input->post('bidang_studi'),
						'keterangan'			 => $keterangan,
						'id_kategori_kelas' 	 => $this->input->post('kategori_kelas'),
						'id_level_kelas' 		 => $this->input->post('level'),
						'metode_belajar' 		 => $this->input->post('metode_belajar'),
						'harga_kursus' 		     => preg_replace('/[Rp. ]/','',$this->input->post('harga_kursus')),
						'status_pendaftaran' 	 => 'pending',
						'tempat_daftar' 		 => $this->input->post('tempat_daftar'),
						'created_date' 		     => date('Y-m-d H:i:s'),
						'updated_date' 		     => date('Y-m-d H:i:s')						 
					);	
					$result = $this->db->insert('tbl_pendaftaran', $data3);
	
					$id_pendaftaran = $this->db->insert_id();
					$data4 = array( 
						'no_invoice' 		 	 => $kode_invoice,
						'id_pendaftaran' 	 	 => $id_pendaftaran,
						'tanggal_invoice' 		 => date('Y-m-d'),
						'status_invoice' 		 => 'pending',
						'created_date' 		     => date('Y-m-d H:i:s'),
						'updated_date' 		     => date('Y-m-d H:i:s')						 
					);
						
					$result = $this->db->insert('tbl_invoice', $data4);

					$email = $_POST['email'];
					$config['useragent'] = 'Codeigniter';
					$config['protocol'] = 'smtp';
					$config['smtp_host'] = 'smtp.gmail.com';
					$config['smtp_port'] = 465;
					$config['smtp_crypto'] = 'ssl';
					$config['smtp_user'] = 'buhori100396@gmail.com';
					$config['smtp_pass'] = 'buhori100396';
					$config['mailtype'] = 'html';
					$config['charset']   = 'utf-8';
					$config['newline'] = "\r\n";

				// Load library email dan konfigurasinya
				$this->load->library('email', $config);

				// Email dan nama pengirim
				$this->email->from('buhori100396@gmail.com', 'creativemedia.id');
	
				// Email penerima
				$this->email->to(''.$email); // Ganti dengan email tujuan
				// Subject email
				$this->email->subject('Aktivasi Akun');
	
				$message =  "
				<html>
				<head>
				<title>Verifikasi Akun</title>
				<style>
				button {
				font-family: sans-serif;
				font-size: 15px;
				background: #22a4cf;
				color: white;
				border: white 3px solid;
				border-radius: 5px;
				padding: 12px 20px;
				margin-top: 10px;
				}
	
				button:hover {
				opacity: 0.9;
				}
				</style>
				</head>
				<body>
				<div style='background:#f2f2f2;font-family:arial,sans-serif;'>
				<div style='width:90%;max-width:600px;margin:auto;padding:20px 0 50px 0;box-sizing:border-box;'>
				<div
				style='background:#007BFF;padding:12px;text-align:center;width:100%;border-radius:8px 8px 0 0;box-sizing:border-box;'>
				</div>
				<div style='padding:20px;background:#fff;border:1px solid #e8e8e8;width:100%;box-sizing:border-box;'>
				<b>Hallo</b><br />Terima Kasih Sudah Mendaftar di Creative Media
				<p>Berikut ini username dan password akun anda <br />
				username :'".$email."'<br />
				password :'".$password."'
				<p>
				'Silahkan Klik Aktivasi Akun anda terlebih dahulu'
				<p>
				<center><a href='".base_url('aktivasi/')."".$id_login."'>
				<button class='button'>Aktivasi Akun</button></a>
				</center>
				</p>
				</div>
				<div
				style='background:#e8e8e8;border:1px solid #e8e8e8;color:#939598;padding:16px 24px;text-align:center;width:100%;border-radius:0 0 8px 8px;box-sizing:border-box;'>
				<small>Pesan dibuat otomatis dan dikirimkan oleh sistem
				Creative Media, semua balasan yang ditujukan ke alamat email ini tidak akan kami
				respon, untuk menghubungi Admin kami silahkan kirimkan email ke <a
				href='mailto:creativemedia@gmail.com'>
				creativemedia@gmail.com
				</a>.
				<p />
				<b>Creative Media &copy;
				</b>
				</small>
				</div>
				</div>
				</div>
				</body>
				</html>
				";
				// Isi email
				$this->email->message($message);
				$this->email->send();
					if ($result > 0) {
					$out['status'] = 'berhasil';
					//  redirect(base_url('daftar'),'refresh');
					} else {
					$out['status'] = 'gagal';
					}
				}
				
			} else {
				
				$out = array('status' => 'Gagal', 'pesan' => 'Email Sudah Terdaftar !');
			} 

		} else {
			$out['status'] = 'gagal';
		}

		echo json_encode($out);
	
	}
	
	public function prosesTambahKelas() {
		
		$kode 	 		 = $this->M_daftar->kode();
		$kode_invoice 	 = $this->M_daftar->kode_invoice();

		if($this->input->post('keterangan') == ''){
			$keterangan = $this->input->post('bidang_studi');
		} else {
			$keterangan = $this->input->post('keterangan');
		}
		
				
				$data = array( 
					'no_pendaftaran' 		 => $kode,
					'tanggal_pendaftaran' 	 => $this->input->post('tanggal_pendaftaran'),
					'id_siswa' 		 		 => $this->input->post('siswa'),
					'id_bidang_studi' 		 => $this->input->post('bidang_studi'),
					'keterangan'			 => $keterangan,
					'id_kategori_kelas' 	 => $this->input->post('kategori_kelas'),
					'id_level_kelas' 		 => $this->input->post('level'),
					'metode_belajar' 		 => $this->input->post('metode_belajar'),
					'harga_kursus' 		     => preg_replace('/[Rp. ]/','',$this->input->post('harga_kursus')),
					'status_pendaftaran' 	 => 'pending',
					'tempat_daftar' 		 => $this->input->post('tempat_daftar'),
					'created_date' 		     => date('Y-m-d H:i:s'),
					'updated_date' 		     => date('Y-m-d H:i:s')						 
				);
					
				$this->db->insert('tbl_pendaftaran', $data);
				$id_pendaftaran = $this->db->insert_id();
				
				$data2 = array( 
					'no_invoice' 		 	 => $kode_invoice,
					'id_pendaftaran' 	 	 => $id_pendaftaran,
					'tanggal_invoice' 		 => date('Y-m-d'),
					'status_invoice' 		 => 'pending',
					'created_date' 		     => date('Y-m-d H:i:s'),
					'updated_date' 		     => date('Y-m-d H:i:s')						 
				);
					
				$result = $this->db->insert('tbl_invoice', $data2);
				 
				 if ($result > 0) {
				 $out['status'] = 'berhasil';
				 } else {
				 $out['status'] = 'gagal';
				 }

		echo json_encode($out);
	
	}
	
	
	public function Edit($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('edit','daftar');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Pendaftar";
			$data['judul'] 		= "Data Pendaftar";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		}
		 /*ini harus ada boss */
		else{
		
		$where=array('id_pendaftaran' => $id);
		$data['datamaster']  = $this->M_daftar->select_by_id($id);
		$data['level']    			= $this->M_daftar->selek_level();
		$data['kategori_kelas']    	= $this->M_daftar->selek_kategori_kelas();
		$data['Studi']      		= $this->M_daftar->selek_studi();
		$data['pendidikan'] 		= $this->M_daftar->selek_pendidikan();	
		$data['gaji']       		= $this->M_daftar->selek_penghasilan();	
		$data['kelamin']    		= $this->M_daftar->selek_kelamin();
		$data['agama']    			= $this->M_daftar->selek_agama();
		$data['jenis_tinggal']    	= $this->M_daftar->selek_jenis_tinggal();	
		$data['lainnya']    	= $this->M_daftar->selek_lainnya();		
		$data['adalainnya']    	= $this->M_daftar->selek_adalainnya();	

		$data['page'] 		= "Data Pendaftar";
		$data['judul'] 		= "Data Pendaftar";
	    $this->loadkonten('v_daftar/update',$data);
		}
	}
	
	public function View($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('edit','daftar');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Pendaftar";
			$data['judul'] 		= "Data Pendaftar";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		}
		 /*ini harus ada boss */
		else{
		
		$where=array('id_pendaftaran' => $id);
		$data['datamaster']  = $this->M_daftar->select_by_id($id);
		$data['level']    			= $this->M_daftar->selek_level();
		$data['kategori_kelas']    	= $this->M_daftar->selek_kategori_kelas();
		$data['Studi']      		= $this->M_daftar->selek_studi();
		$data['pendidikan'] 		= $this->M_daftar->selek_pendidikan();	
		$data['gaji']       		= $this->M_daftar->selek_penghasilan();	
		$data['kelamin']    		= $this->M_daftar->selek_kelamin();
		$data['agama']    			= $this->M_daftar->selek_agama();
		$data['jenis_tinggal']    	= $this->M_daftar->selek_jenis_tinggal();	
		$data['lainnya']    	= $this->M_daftar->selek_lainnya();		
		$data['adalainnya']    	= $this->M_daftar->selek_adalainnya();	

		$data['page'] 		= "Data Pendaftar";
		$data['judul'] 		= "Data Pendaftar";
	    $this->loadkonten('v_daftar/view',$data);
		}
	}
	
    public function prosesUpdate() {
		
		$config['upload_path']="./upload/user/";
        $config['allowed_types']='gif|jpg|png';
		$config['max_size'] = '2048'; //maksimum besar file 2M
        $config['overwrite'] = TRUE;
		
		$this->load->library('upload',$config);
		
	    if($this->upload->do_upload("gambar"))
		{
    		$image_data = $this->upload->data();
    		$path['link']= "upload/user/";
		
			$where = array(
				'id_siswa' 	 => $this->input->post('id_siswa')
			);			
			if($this->input->post('jenis_tinggal') == ''){
				$jenis_tinggal = $this->input->post('jenis_tempat_tinggal');
			} else  {
				$jenis_tinggal = $this->input->post('jenis_tinggal');
			}	
			
			$data = array(
				//data siswa
				'nama_siswa' 		 	 => $this->input->post('nama_lengkap'),
				'jenis_kelamin' 		 => $this->input->post('jenis_kelamin'),
				'nik' 		   		 	 => $this->input->post('nik'),
				'tempat_lahir' 		     => $this->input->post('tempat_lahir'),
				'tanggal_lahir' 		 => date('Y-m-d', strtotime($this->input->post('tanggal_lahir'))),
				'agama'                  => $this->input->post('agama'),
				'jenis_tinggal'			 => $jenis_tinggal,
				// 'jenis_tinggal'			 => $this->input->post('jenis_tinggal'),
				'telepon'				 => $this->input->post('handphone'),
				'email'				 	 => $this->input->post('email'),
				'alamat'				 => $this->input->post('alamat'),
				'kota'				 	 => $this->input->post('kota'),
				'kode_pos'				 => $this->input->post('kode_pos'),
				'provinsi'				 => $this->input->post('provinsi'),
				'warga_negara'			 => $this->input->post('warganegara'),
				'pendidikan_terakhir'	 => $this->input->post('pendidikan_terakhir'),
			
				//data ayah
				'nama_ayah' 		   	 => $this->input->post('nama_ayah'),
				'alamat_ayah' 		   	 => $this->input->post('alamat_ayah'),
				'nik_ayah' 		   	     => $this->input->post('nik_ayah'),
				'pekerjaan_ayah' 		 => $this->input->post('pekerjaan_ayah'),
				'pendidikan_ayah' 		 => $this->input->post('pendidikan_ayah'),
				'tempat_lahir_ayah'      => $this->input->post('tempat_lahir_ayah'),
				'tanggal_lahir_ayah'     => date('Y-m-d', strtotime($this->input->post('tanggal_lahir_ayah'))),
				'penghasilan_ayah' 		 => $this->input->post('penghasilan_ayah'),
				'telepon_ayah' 		     => $this->input->post('telepon_ayah'),
				'email_ayah' 		     => $this->input->post('email_ayah'),
				
				//data ibu
				'nama_ibu' 		   	     => $this->input->post('nama_ibu'),
				'alamat_ibu' 		   	 => $this->input->post('alamat_ibu'),
				'nik_ibu' 		   	     => $this->input->post('nik_ibu'),
				'pekerjaan_ibu' 		 => $this->input->post('pekerjaan_ibu'),
				'pendidikan_ibu' 		 => $this->input->post('pendidikan_ibu'),
				'tempat_lahir_ibu'       => $this->input->post('tempat_lahir_ibu'),
				'tanggal_lahir_ibu'       => date('Y-m-d', strtotime($this->input->post('tanggal_lahir_ibu'))),
				'penghasilan_ibu' 		 => $this->input->post('penghasilan_ibu'),
				'telepon_ibu' 		     => $this->input->post('telepon_ibu'),
				'email_ibu' 		     => $this->input->post('email_ibu'),
				'gambar'               => $path['link'] . ''. $image_data['file_name'],
				'updated_date'           => date('Y-m-d H:i:s')
			
			);
			
			$result = $this->M_daftar->update_siswa($data,$where);
			
			$where2 = array(
				'id_pendaftaran' 	 => $this->input->post('id_pendaftaran')
			);
			
			$data2 = array(
			
				'id_bidang_studi' 		 => $this->input->post('bidang_studi'),
				'id_kategori_kelas' 	 => $this->input->post('kategori_kelas'),
				'id_level_kelas' 		 => $this->input->post('level'),
				'harga_kursus' 		 	 => preg_replace('/[Rp. ]/','',$this->input->post('harga_kursus')),
				'tempat_daftar' 		 => $this->input->post('tempat_daftar'),
				'updated_date'           => date('Y-m-d H:i:s')
			
			);
			
			$result = $this->M_daftar->update_pendaftaran($data2,$where2);
			
			if ($result > 0) {
				$out['status'] = 'berhasil';
			} else {
				$out['status'] = 'gagal';
			}
			
		}else {
			$where = array(
				'id_siswa' 	 => $this->input->post('id_siswa')
			);			
			if($this->input->post('jenis_tinggal') == ''){
				$jenis_tinggal = $this->input->post('jenis_tempat_tinggal');
			} else  {
				$jenis_tinggal = $this->input->post('jenis_tinggal');
			}	
			
			$data = array(
				//data siswa
				'nama_siswa' 		 	 => $this->input->post('nama_lengkap'),
				'jenis_kelamin' 		 => $this->input->post('jenis_kelamin'),
				'nik' 		   		 	 => $this->input->post('nik'),
				'tempat_lahir' 		     => $this->input->post('tempat_lahir'),
				'tanggal_lahir' 		 => date('Y-m-d', strtotime($this->input->post('tanggal_lahir'))),
				'agama'                  => $this->input->post('agama'),
				'jenis_tinggal'			 => $jenis_tinggal,
				// 'jenis_tinggal'			 => $this->input->post('jenis_tinggal'),
				'telepon'				 => $this->input->post('handphone'),
				'email'				 	 => $this->input->post('email'),
				'alamat'				 => $this->input->post('alamat'),
				'kota'				 	 => $this->input->post('kota'),
				'kode_pos'				 => $this->input->post('kode_pos'),
				'provinsi'				 => $this->input->post('provinsi'),
				'warga_negara'			 => $this->input->post('warganegara'),
				'pendidikan_terakhir'	 => $this->input->post('pendidikan_terakhir'),
			
				//data ayah
				'nama_ayah' 		   	 => $this->input->post('nama_ayah'),
				'alamat_ayah' 		   	 => $this->input->post('alamat_ayah'),
				'nik_ayah' 		   	     => $this->input->post('nik_ayah'),
				'pekerjaan_ayah' 		 => $this->input->post('pekerjaan_ayah'),
				'pendidikan_ayah' 		 => $this->input->post('pendidikan_ayah'),
				'tempat_lahir_ayah'      => $this->input->post('tempat_lahir_ayah'),
				'tanggal_lahir_ayah'       => date('Y-m-d', strtotime($this->input->post('tanggal_lahir_ayah'))),
				'penghasilan_ayah' 		 => $this->input->post('penghasilan_ayah'),
				'telepon_ayah' 		     => $this->input->post('telepon_ayah'),
				'email_ayah' 		     => $this->input->post('email_ayah'),
				
				//data ibu
				'nama_ibu' 		   	     => $this->input->post('nama_ibu'),
				'alamat_ibu' 		   	 => $this->input->post('alamat_ibu'),
				'nik_ibu' 		   	     => $this->input->post('nik_ibu'),
				'pekerjaan_ibu' 		 => $this->input->post('pekerjaan_ibu'),
				'pendidikan_ibu' 		 => $this->input->post('pendidikan_ibu'),
				'tempat_lahir_ibu'       => $this->input->post('tempat_lahir_ibu'),
				'tanggal_lahir_ibu'       => date('Y-m-d', strtotime($this->input->post('tanggal_lahir_ibu'))),
				'penghasilan_ibu' 		 => $this->input->post('penghasilan_ibu'),
				'telepon_ibu' 		     => $this->input->post('telepon_ibu'),
				'email_ibu' 		     => $this->input->post('email_ibu'),
				'updated_date'           => date('Y-m-d H:i:s')
			
			);
			
			$result = $this->M_daftar->update_siswa($data,$where);
			
			$where2 = array(
				'id_pendaftaran' 	 => $this->input->post('id_pendaftaran')
			);
			
			$data2 = array(
			
				'id_bidang_studi' 		 => $this->input->post('bidang_studi'),
				'id_kategori_kelas' 	 => $this->input->post('kategori_kelas'),
				'id_level_kelas' 		 => $this->input->post('level'),
				'harga_kursus' 		 	 => preg_replace('/[Rp. ]/','',$this->input->post('harga_kursus')),
				'tempat_daftar' 		 => $this->input->post('tempat_daftar'),
				'updated_date'           => date('Y-m-d H:i:s')
			
			);
			
			$result = $this->M_daftar->update_pendaftaran($data2,$where2);
			
				
			if ($result > 0) {
				$out['status'] = 'berhasil';
			} else {
				$out['status'] = 'gagal';
			}
		}
		
		echo json_encode($out);
	}

	public function batal(){
		
		$id_pendaftaran = $this->input->post('id_pendaftaran');
		
		$siswa = $this->db->query("SELECT * FROM tbl_pendaftaran a, tbl_siswa b WHERE a.id_siswa = b.id_siswa AND id_pendaftaran = '$id_pendaftaran'");
		$dataSiswa = $siswa->row();

		if($dataSiswa->status_siswa == "calon"){
			$this->db->delete('tbl_login',array('id_login' =>$dataSiswa->id_login));

			$this->db->delete('tbl_siswa',array('id_siswa' =>$dataSiswa->id_siswa));
		}
		
// 		$sql = "DELETE a.*, b.* ,c.* FROM tbl_pendaftaran a, tbl_invoice b, tbl_pembayaran c WHERE a.id_pendaftaran = b.id_pendaftaran AND b.id_invoice = c.id_invoice AND a.id_pendaftaran = '{$id_pendaftaran}'";
// 		$this->db->query($sql);
		
// 		$sql2 = "DELETE a.*, b.* ,c.* FROM tbl_kelas a, tbl_jadwal b, tbl_detail_jadwal c WHERE a.id_kelas = b.id_kelas AND a.id_kelas = c.id_kelas AND a.id_pendaftaran = '{$id_pendaftaran}'";
// 		$this->db->query($sql2);

        $invoice = $this->db->query("SELECT * FROM tbl_invoice WHERE id_pendaftaran = '$id_pendaftaran'");
		$dataInvoice = $siswa->row();

        $result = $this->db->delete('tbl_pembayaran',array('id_invoice' =>$dataInvoice->id_invoice));
        $result = $this->db->delete('tbl_invoice',array('id_pendaftaran' =>$id_pendaftaran));
        $result = $this->db->delete('tbl_kelas',array('id_pendaftaran' =>$id_pendaftaran));
		$result = $this->db->delete('tbl_pendaftaran',array('id_pendaftaran' =>$id_pendaftaran));
		

		
		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
		echo json_encode($out);
}

	public function export(){
		
		$waktu=date("Y-m-d h:i");

		$data['title'] 		= "Data Pendaftaran";
		
		$data['excel']  = $this->M_daftar->export();
		$this->load->view('v_daftar/export',$data);
	}

	public function import() {
		$error = false;

		$this->form_validation->set_rules('excel', 'File', 'trim|required');
		if ($_FILES['excel']['name'] == '') {

		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('excel')) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$dataUpload = $this->upload->data();

				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' . $dataUpload['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

				$data = array();
				$index = 1;

				if (!$error) {
					foreach($sheetData as $row){
						$date = date('Y-m-d H:i:s');

						array_push($data, array(
							'no_pendaftaran'    	=> $row['A'],
							// 'tanggal_pendaftaran'   => $row['C'],
							// 'id_siswa'       		=> $row['D'],
							// 'id_bidang_studi'       => $row['E'],
							// 'id_kategori_kelas'     => $row['F'],
							// 'id_level_kelas'     	=> $row['G'],
							// 'harga_kursus'      	=> $row['H'],
							// 'status_pendaftaran'    => $row['I'],
							// 'created_date'         	=> $row['J'],
							// 'updated_date' 			=> $row['K'],
						));

						$index++;

					}
				}
				unlink('./assets/excel/' . $dataUpload['file_name']);

				if (!$error) {
					if (empty($data)) {
						$out = array('status' => 'awas', 'pesan' => 'Maaf, Data sudah ada dalam sistem silahkan cek kembali data import terakhir !');
						$error = true;
					}
				}

				if (!$error) {
					$result=$this->db->insert_batch('import', $data);

					if ($result > 0) {
						$out = array('status' => true, 'pesan' => ' Data berhasil di import');
					} else {
						$out = array('status' => false, 'pesan' => 'Maaf data gagal di import !');
					}
				}

			}

			echo json_encode($out);
		}
	}
	
	public function History($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('edit','daftar');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Pendaftaran";
			$data['judul'] 		= "Data Pendaftaran";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
			$where=array('id_pendaftaran' => $id);
			$data['datamaster']  = $id;
			// $data['kursus_aktif']  = $this->M_siswa_aktif->kursus_aktif($id);
			// $data['kursus_selesai']  = $this->M_siswa_aktif->kursus_selesai($id);
			$data['jumlah_tagihan']  = $this->M_daftar->jumlah_tagihan($id);

			$data['page'] 		= "Data Pendaftaran";
			$data['judul'] 		= "Data Pendaftaran";	
			$this->loadkonten('v_daftar/history',$data);
		}
	}
	
	public function LoadDataHistory($id)
	{
		$list = $this->M_daftar->get_historypembayaran($id);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $master) {
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = date('d-m-Y',strtotime($master->tanggal_pembayaran));
			$row[] = $master->kode_pembayaran;;
			$row[] = nominal($master->nominal);
			$row[] = $master->jenis_pembayaran;
			$row[] = $master->kategori_pembayaran;
			if ($master->status_pembayaran == 'pending') {
				$StatusPembayaran = '<small class="label pull-center bg-yellow">Pending</small>';
			} else {
				$StatusPembayaran = '<small class="label pull-center bg-green">Diterima</small>';
			} 
			$row[] = $StatusPembayaran;
			$data[] = $row;
		}

		$output = array(
                        "draw" => $_POST['draw'],
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

	public function LoadDataTagihan($id)
	{
		$list = $this->M_daftar->get_tagihan($id);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $master) {
			
			$pembayaran = $this->M_daftar->get_pembayaran($master->id_invoice);
			foreach ($pembayaran as $pay) {
				$terbayar = $pay->nominal;
			}
			
			$sisa = $master->harga_kursus - $terbayar;
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = date('d-m-Y',strtotime($master->tanggal_invoice));
			$row[] = $master->no_invoice;
			if ($master->id_bidang_studi == 16) {
				$nama_studi = $master->keterangan.' '.$master->nama_level_kelas;
			}else{
				$nama_studi = $master->nama_bidang_studi.' '.$master->nama_level_kelas;
			}
			$row[] = $nama_studi;
			$row[] = nominal($master->harga_kursus);
			$row[] = nominal($terbayar);
			$row[] = nominal($sisa);
			$data[] = $row;
		}

		$output = array(
                        "draw" => $_POST['draw'],
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

}