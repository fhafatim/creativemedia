<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_aktif extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_siswa_aktif');
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
		$data['page'] 		= "Data Siswa";
		$data['judul'] 		= "Data Siswa";
		
		$this->loadkonten('v_siswa_aktif/home',$data);
	}

	public function ajax_list()
	{
		$list = $this->M_siswa_aktif->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $master) {
			
			$id_login = $master->id_login;
			$login = $this->db->query("SELECT * FROM tbl_login WHERE id_login = '$id_login'");
			$datalogin = $login->num_rows();
			
			$BidangStudi = $this->db->query("SELECT * FROM tbl_pendaftaran a, tbl_bidang_studi b WHERE a.id_bidang_studi = b.id_bidang_studi AND a.id_siswa = '$master->id_siswa'");
			$JumlahBidangStudi = $BidangStudi->num_rows();
			$DataBidangStudi = $BidangStudi->result();
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $master->nama_siswa;
			$row[] = $master->telepon;	
			
			if($JumlahBidangStudi > 0){
			    $i = 1;
			    foreach($DataBidangStudi as $studi){
			        if($i == 1){
			            $namastudi[$i] = $studi->nama_bidang_studi;
			        } else {
			            $namastudi[$i] = $studi->nama_bidang_studi;
			            $namastudi[$i] = $namastudi[$i-1].', '.$namastudi[$i];
			        }
			        $i++;    
			    }
			    $row[] = $namastudi[$i-1];
			} else {
			    $row[] = " ";
			}
			
			
			
			$row[] = '<small class="label pull-center bg-blue">'.$master->status_siswa.'</small">';

			if ($datalogin > 0) {
				$Status_login = anchor('edit-login/'.$master->id_login, ' Edit ', ' class="btn btn-sm btn-primary ajaxify klik " ');
			}else {
				$Status_login = anchor('tambah-login/'.$master->id_siswa, ' Tambah ', ' class="btn btn-sm btn-primary ajaxify klik " ');
			}

			$row[] = $Status_login;
			//$row[] = '<a href="'.base_url().''.$master->gambar.'" target="_blank"><img class="img-thumbnail" src="'.base_url().''.$master->gambar.'"   width="90" /></a>';
			//add html for action
			$row[] =  anchor('edit-siswa/'.$master->id_siswa, ' <span class="fa fa-edit"></span> ', ' class="btn btn-sm btn-primary ajaxify klik " ').			
				'  <button class="btn btn-sm btn-danger hapus-siswa-aktif" data-id='."'".$master->id_siswa."'".'><i class="glyphicon glyphicon-trash"></i></button>'.' '.
				anchor('history-siswa/'.$master->id_siswa, ' <span class="fa fa-eye"></span> ', ' class="btn btn-sm btn-warning ajaxify klik " ').' '.anchor('view-siswa/'.$master->id_siswa, ' <span class="fa fa-eye"></span> ', ' class="btn btn-sm btn-info ajaxify klik " ');
 			 $data[] = $row;
		}

		$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->M_siswa_aktif->count_all(),
                        "recordsFiltered" => $this->M_siswa_aktif->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

	public function Tambah() {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('edit','siswa');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Siswa";
			$data['judul'] 		= "Data Siswa";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{

			$data['page'] 		= "Data Siswa";
			$data['judul'] 		= "Data Siswa";		
			$this->loadkonten('v_siswa_aktif/tambah',$data);
		}
	}

	public function prosesTambah() {
		
		$kode 	 		 = $this->M_siswa_aktif->kode();
		
		 if (isset($_POST["nama_lengkap"]) && ($_POST["handphone"]) && !empty($_POST["alamat"]))
		 {						
		 		$config['upload_path']="./upload/user/";
		 		$config['allowed_types']='gif|jpg|png';
		 		$config['max_size'] = '2048'; //maksimum besar file 2M
		 		$config['overwrite'] = TRUE;

		 		$this->load->library('upload',$config);

				if($this->input->post('tanggal_daftar') == ''){
					$tanggal_daftar = date('Y-m-d h:i:sa');
				} else {
					$tanggal_daftar = date('Y-m-d', strtotime($this->input->post('tanggal_daftar')));
				}

		 		if($this->upload->do_upload("gambar"))
		 		{
		 			//jika ada gambarnya
		 			$image_data = $this->upload->data();
		 			$path['link']= "upload/user/";
				
		 			if($this->input->post('jenis_tinggal') == ''){
		 				$jenis_tinggal = $this->input->post('jenis_tempat_tinggal');
		 			} else {
		 				$jenis_tinggal = $this->input->post('jenis_tinggal');
		 			}
				
		 			$data2 = array( 
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
		 				'created_date'		     => $tanggal_daftar,
		 				'updated_date'		     => date('Y-m-d H:i:s'),
		 				'status_siswa'			 => 'calon'									 
		 			); 
		 			$result = $this->db->insert('tbl_siswa', $data2);	
				
		 			if ($result > 0) {
		 				$out['status'] = 'berhasil';
		 			} else {
		 				$out['status'] = 'gagal';
		 			}
		 		}else{
										
		 			if($this->input->post('jenis_tinggal') == ''){
		 				$jenis_tinggal = $this->input->post('jenis_tempat_tinggal');
		 			} else {
		 				$jenis_tinggal = $this->input->post('jenis_tinggal');
		 			}
					
		 			$data2 = array( 
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
		 				'created_date'		     => $tanggal_daftar,
		 				'updated_date'		     => date('Y-m-d H:i:s'),
		 				'status_siswa'			 => 'calon'									 
		 			); 
		 			$result = $this->db->insert('tbl_siswa', $data2);
					
		 			if ($result > 0) {
		 			$out['status'] = 'berhasil';
		 			} else {
		 			$out['status'] = 'gagal';
		 			}
		 		}

		} else {
		 	$out['status'] = 'gagal';
		}

		echo json_encode($out);
	
	}

	public function aktif_login(){
		
		$data = array(
			'status_login' => 'aktif'
		);
		
		$id_login = $_POST['id_login'];
		
		$where = array(
			'id_login' => $id_login
		);
		
		$result = $this->db->update('tbl_login',$data,$where);
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
		$access = $this->M_sidebar->access('edit','siswa');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Siswa";
			$data['judul'] 		= "Data Siswa";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
			$where=array('id_siswa' => $id);
			$data['datamaster']  = $this->M_siswa_aktif->select_by_id($id);

			$data['page'] 		= "Data Siswa";
			$data['judul'] 		= "Data Siswa";
			$data['pendidikan'] 		= $this->M_siswa_aktif->selek_pendidikan();	
			$data['gaji']       		= $this->M_siswa_aktif->selek_penghasilan();	
			$data['kelamin']    		= $this->M_siswa_aktif->selek_kelamin();
			$data['agama']    			= $this->M_siswa_aktif->selek_agama();
			$data['jenis_tinggal']    	= $this->M_siswa_aktif->selek_jenis_tinggal();	
			$data['lainnya']    	= $this->M_siswa_aktif->selek_lainnya();		
			$data['adalainnya']    	= $this->M_siswa_aktif->selek_adalainnya();		
			$this->loadkonten('v_siswa_aktif/update',$data);
		}
	}
	
	public function Tambah_login($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('edit','siswa');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Siswa";
			$data['judul'] 		= "Data Siswa";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
			$where=array('id_siswa' => $id);
			$data['datamaster']  = $this->M_siswa_aktif->select_by_id($id);

			$data['page'] 		= "Data Siswa";
			$data['judul'] 		= "Data Siswa";	
			$this->loadkonten('v_siswa_aktif/tambah-login',$data);
		}
	}
	
	public function Edit_login($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('edit','siswa');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Siswa";
			$data['judul'] 		= "Data Siswa";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
			$where=array('id_siswa' => $id);
			$data['datamaster']  = $this->M_siswa_aktif->select_login_by_id($id);

			$data['page'] 		= "Data Siswa";
			$data['judul'] 		= "Data Siswa";		
			$this->loadkonten('v_siswa_aktif/edit-login',$data);
		}
	}
	
	public function View($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('edit','siswa');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Siswa";
			$data['judul'] 		= "Data Siswa";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
			$where=array('id_siswa' => $id);
			$data['datamaster']  = $this->M_siswa_aktif->select_by_id($id);

			$data['page'] 		= "Data Siswa";
			$data['judul'] 		= "Data Siswa";
			$data['pendidikan'] 		= $this->M_siswa_aktif->selek_pendidikan();	
			$data['gaji']       		= $this->M_siswa_aktif->selek_penghasilan();	
			$data['kelamin']    		= $this->M_siswa_aktif->selek_kelamin();
			$data['agama']    			= $this->M_siswa_aktif->selek_agama();
			$data['jenis_tinggal']    	= $this->M_siswa_aktif->selek_jenis_tinggal();	
			$data['lainnya']    	= $this->M_siswa_aktif->selek_lainnya();		
			$data['adalainnya']    	= $this->M_siswa_aktif->selek_adalainnya();		
			$this->loadkonten('v_siswa_aktif/view',$data);
		}
	}

	public function History($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('edit','siswa');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Siswa";
			$data['judul'] 		= "Data Siswa";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
			$where=array('id_siswa' => $id);
			$data['datamaster']  = $id;
			$data['kursus_aktif']  = $this->M_siswa_aktif->kursus_aktif($id);
			$data['kursus_selesai']  = $this->M_siswa_aktif->kursus_selesai($id);
			$data['jumlah_tagihan']  = $this->M_siswa_aktif->jumlah_tagihan($id);

			$data['page'] 		= "Data Siswa";
			$data['judul'] 		= "Data Siswa";	
			$this->loadkonten('v_siswa_aktif/history',$data);
		}
	}
	
	public function LoadDataHistory($id)
	{
		$list = $this->M_siswa_aktif->get_kelas($id);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $master) {
			
			$tentor_query = $this->db->query("SELECT * FROM tbl_tentor WHERE id_tentor = '$master->id_tentor'");
			$tentor = $tentor_query->row();

			$tgl_mulai = "";
			$tgl_selesai = "";

			if(date('d-m-Y',strtotime($master->tanggal_mulai)) != '30-11--0001'){
				$tgl_mulai = date('d-m-Y',strtotime($master->tanggal_mulai));
			}

			if(date('d-m-Y',strtotime($master->tanggal_selesai)) != '30-11--0001'){
				$tgl_selesai = date('d-m-Y',strtotime($master->tanggal_selesai));
			}
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $master->nama_siswa;;
			$row[] = $master->nama_bidang_studi;
			$row[] = $master->nama_level_kelas;
			$row[] = $tentor->nama_tentor;
			$row[] = $tgl_mulai.' - '.$tgl_selesai;
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

	public function LoadDataTagihan($id)
	{
		$list = $this->M_siswa_aktif->get_tagihan($id);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $master) {
			
			$pembayaran = $this->M_siswa_aktif->get_pembayaran($master->id_invoice);
			foreach ($pembayaran as $pay) {
				$terbayar = $pay->nominal;
			}
			
			$sisa = $master->harga_kursus - $terbayar;
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $master->no_invoice;
			$row[] = date('d-m-Y',strtotime($master->tanggal_invoice));
			$row[] = $master->nama_bidang_studi.' '.$master->nama_level_kelas;
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
				'nama_siswa' 		 	 => $this->input->post('nama_siswa'),
				'jenis_kelamin' 		 => $this->input->post('jenis_kelamin'),
				'nik' 		   		 	 => $this->input->post('nik'),
				'tempat_lahir' 		     => $this->input->post('tempat_lahir'),
				'tanggal_lahir' 		 => date('Y-m-d', strtotime($this->input->post('tanggal_lahir'))),
				'agama'                  => $this->input->post('agama'),
				'jenis_tinggal'			 => $jenis_tinggal,
				// 'jenis_tinggal'			 => $this->input->post('jenis_tinggal'),
				'telepon'				 => $this->input->post('telepon'),
				'email'				 	 => $this->input->post('email'),
				'alamat'				 => $this->input->post('alamat'),
				'kota'				 	 => $this->input->post('kota'),
				'kode_pos'				 => $this->input->post('kode_pos'),
				'provinsi'				 => $this->input->post('provinsi'),
				'warga_negara'			 => $this->input->post('warga_negara'),
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
				'created_date' 		     => date('Y-m-d',strtotime($this->input->post('tanggal_daftar'))),
			);
			
			$result = $this->M_siswa_aktif->update_siswa($data,$where);
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
				'nama_siswa' 		 	 => $this->input->post('nama_siswa'),
				'jenis_kelamin' 		 => $this->input->post('jenis_kelamin'),
				'nik' 		   		 	 => $this->input->post('nik'),
				'tempat_lahir' 		     => $this->input->post('tempat_lahir'),
				'tanggal_lahir' 		 => date('Y-m-d', strtotime($this->input->post('tanggal_lahir'))),
				'agama'                  => $this->input->post('agama'),
				'jenis_tinggal'			 => $jenis_tinggal,
				// 'jenis_tinggal'			 => $this->input->post('jenis_tinggal'),
				'telepon'				 => $this->input->post('telepon'),
				'email'				 	 => $this->input->post('email'),
				'alamat'				 => $this->input->post('alamat'),
				'kota'				 	 => $this->input->post('kota'),
				'kode_pos'				 => $this->input->post('kode_pos'),
				'provinsi'				 => $this->input->post('provinsi'),
				'warga_negara'			 => $this->input->post('warga_negara'),
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
				'created_date' 		     => date('Y-m-d',strtotime($this->input->post('tanggal_daftar'))),
			);
			
			$result = $this->M_siswa_aktif->update_siswa($data,$where);				
			if ($result > 0) {
				$out['status'] = 'berhasil';
			} else {
				$out['status'] = 'gagal';
			}
		}
		
		echo json_encode($out);
	}
	
	public function prosesInsertLogin() {
		$date = date('Y-m-d H:i:s');
		
			$data = array(
				//data siswa
				'kategori_login' 	=> 'siswa',
				'username' 		 	=> $this->input->post('username'),
				'password' 		 	=> $this->input->post('password'),
				'status_login' 		=> $this->input->post('status_login'),
				'created_date'      => $date,
				'updated_date'      => $date,
			
			);
			
			$result = $this->db->insert('tbl_login', $data); 
			$insert_id = $this->db->insert_id();
			
			$where = array(
				'id_siswa' 	 => $this->input->post('id_siswa')
			);	
			
			$data2 = array(
				'id_login' 		 	=> $insert_id
			
			);
			
			$result = $this->db->update('tbl_siswa',$data2,$where); 				
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
	
	
	public function hapus() { 
		$id = $_POST['id_siswa'];
		$result = $this->M_siswa_aktif->hapus($id);
		
		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
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
				
				
				foreach($objPHPExcel->getWorksheetIterator() as $worksheet){
        
                    $highestRow = $worksheet->getHighestRow();
                    $highestColumn = $worksheet->getHighestColumn();
        
                    for($row=2; $row<=$highestRow; $row++){
        
                        $a = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                        $b = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $c = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                        $d = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                        $e = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                        $f = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                        $g = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                        $h = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                        $i = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                        $j = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                        $k = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                        $l = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                        $m = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                        $n = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                        $o = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                        $p = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                        $q = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                        $r = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                        $s = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
                        $t = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
                        $u = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
                        $v = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
                        $w = $worksheet->getCellByColumnAndRow(22, $row)->getValue();
                        $x = $worksheet->getCellByColumnAndRow(23, $row)->getValue();
                        $y = $worksheet->getCellByColumnAndRow(24, $row)->getValue();
                        $z = $worksheet->getCellByColumnAndRow(25, $row)->getValue();
                        $aa = $worksheet->getCellByColumnAndRow(26, $row)->getValue();
                        $ab = $worksheet->getCellByColumnAndRow(27, $row)->getValue();
                        $ac = $worksheet->getCellByColumnAndRow(28, $row)->getValue();
                        $ad = $worksheet->getCellByColumnAndRow(29, $row)->getValue();
                        $ae = $worksheet->getCellByColumnAndRow(30, $row)->getValue();
                        $af = $worksheet->getCellByColumnAndRow(31, $row)->getValue();
                        $ag = $worksheet->getCellByColumnAndRow(32, $row)->getValue();
                        $ah = $worksheet->getCellByColumnAndRow(33, $row)->getValue();
                        $ai = $worksheet->getCellByColumnAndRow(34, $row)->getValue();
                        $aj = $worksheet->getCellByColumnAndRow(35, $row)->getValue();
                        $ak = $worksheet->getCellByColumnAndRow(36, $row)->getValue();
						

						$kode 	= $this->M_siswa_aktif->kode();
						$nik = $c;
						
						//$siswa = $this->db->query("SELECT * FROM tbl_siswa WHERE nik = '$nik'");
						//$datasiswa = $siswa->num_rows();
                        //if(empty($datasiswa))
						//{
							$data[] = array(
									'nis' 		 			 => $kode,
									'nama_siswa' 		 	 => $a,
									'jenis_kelamin' 		 => $b,
									'nik' 		   		 	 => $c,
									'tempat_lahir' 		     => $d,
									'tanggal_lahir' 		 => date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($e)),
									'agama'                  => $f,
									'jenis_tinggal'			 => $g,
									'telepon'				 => $h,
									'email'				 	 => $i,
									'alamat'				 => $j,
									'provinsi'				 => $k,
									'kota'					 => $l,
									'kode_pos'				 => $m,
									'warga_negara'			 => $n,

									
									'pendidikan_terakhir'	 => $o,
									'nama_ayah'				 => $p,
									'nama_ibu'				 => $q,
									'alamat_ayah'			 => $r,
									'alamat_ibu'			 => $s,
									'nik_ayah'				 => $t,
									'nik_ibu'				 => $u,
									'pekerjaan_ayah'		 => $v,
									'pekerjaan_ibu'			 => $w,
									'pekerjaan_ibu'			 => $x,
									'pekerjaan_ibu'			 => $y,
									
									'tempat_lahir_ayah'		 => $z,
									'tempat_lahir_ibu'		 => $aa,
									'tanggal_lahir_ayah'	 => date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($ab)),
									'tanggal_lahir_ibu'		 => date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($ac)),
									'penghasilan_ayah'		 => $ad,
									'penghasilan_ibu'		 => $ae,
									'telepon_ayah'			 => $af,
									'telepon_ibu'			 => $ag,
									
									'gambar'             	 => 'upload/user/avatar.png',
									'created_date'		     => date('Y-m-d H:i:s', PHPExcel_Shared_Date::ExcelToPHP($aj)),
									'updated_date'		     => date('Y-m-d H:i:s'),
									'status_siswa'			 => 'aktif',
									'no_telepon'			 => $ak,
									// 'status_saat_ini'		 => $p,
									// 'upload_ktp'			 => $d,
									// 'upload_kk'			 	 => $e,
									// 'cap_waktu'			 	 => $a					
								);
						//}
        
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
					$result=$this->db->insert_batch('tbl_siswa', $data);

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
	
	public function Add_history_siswa() {
		
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
		$data['siswa']    			= $this->M_siswa_aktif->selek_siswa();
		$data['level']    			= $this->M_siswa_aktif->selek_level();
		$data['Studi']      		= $this->M_siswa_aktif->selek_studi();	
		$this->loadkonten('v_siswa_aktif/tambah_kelas',$data);
      }
	
	}

	public function savehistorysiswa() {
		$kode 	 		 = $this->M_siswa_aktif->kode();
		
		if($this->input->post('keterangan') == ''){
			$keterangan = $this->input->post('bidang_studi');
		} else {
			$keterangan = $this->input->post('keterangan');
		}
				
		$data = array( 
			'no_pendaftaran' 		 => $kode,
			'tanggal_pendaftaran' 	 => date('Y-m-d',strtotime($this->input->post('tanggal_pendaftaran'))),
			'id_siswa' 		 		 => $this->input->post('siswa'),
			'id_bidang_studi' 		 => $this->input->post('bidang_studi'),
			'keterangan'			 => $keterangan,
			'id_kategori_kelas' 	 => '1',
			'id_level_kelas' 		 => $this->input->post('level'),
			'metode_belajar' 		 => 'private class',
			'harga_kursus' 		     => '0',
			'status_pendaftaran' 	 => 'selesai',
			'tempat_daftar' 		 => $this->input->post('tempat_daftar'),
			'created_date' 		     => date('Y-m-d H:i:s'),
			'updated_date' 		     => date('Y-m-d H:i:s')					 
		);
		$result = $this->db->insert('tbl_pendaftaran', $data);
		$id_pendaftaran = $this->db->insert_id();
			
		$data2 = array( 
			'id_pendaftaran' 		 => $id_pendaftaran,
			'id_siswa' 		 		 => $this->input->post('siswa'),
			'id_tentor' 		 	 => 0,
			'status_kelas' 		 	 => 'selesai',
			'created_date' 		     => date('Y-m-d H:i:s'),
			'updated_date' 		     => date('Y-m-d H:i:s')						 
		);	
		$result = $this->db->insert('tbl_kelas', $data2);  
		
		$data3 = array( 
			'no_invoice' 		     => '-',
			'id_pendaftaran' 		 => $id_pendaftaran,
			'tanggal_invoice' 		 => date('Y-m-d',strtotime($this->input->post('tanggal_pendaftaran'))),
			'status_invoice' 		 => 'lunas',
			'created_date' 		     => date('Y-m-d H:i:s'),
			'updated_date' 		     => date('Y-m-d H:i:s')						 
		);	
		$result = $this->db->insert('tbl_invoice', $data3);  
				
		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
		 		

		echo json_encode($out);
	
	}
}