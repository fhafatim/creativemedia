<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelatihan extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pelatihan');
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
		$data['page'] 		= "Data Pelatihan";
		$data['judul'] 		= "Data Pelatihan";
		
		$this->loadkonten('v_pelatihan/home',$data);
	}

	public function ajax_list()
	{
		$list = $this->M_pelatihan->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $master) {
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = date('d-m-Y',strtotime($master->tanggal_pendaftaran));
			$row[] = $master->nama_perusahaan;
			$row[] = $master->alamat;
			$row[] = $master->nama_pic;
			$row[] = $master->telepon;
			$row[] = $master->email;
			$row[] = $master->tempat_daftar;
			//add html for action
			$row[] =  anchor('detail-pelatihan/'.$master->id_pelatihan, ' <span class="fa fa-edit"></span> ',' class="btn btn-sm btn-primary ajaxify klik " ').' '.
			'<button class="btn btn-sm btn-danger hapus-pelatihan data-toggle="tooltip" data-placement="top" title="Hapus"" id_pelatihan="id_pelatihan"  data-id='." '".$master->id_pelatihan."' ".'><i class="glyphicon glyphicon-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->M_pelatihan->count_all(),
                        "recordsFiltered" => $this->M_pelatihan->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

    public function Add() {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('add','daftar');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Pelatihan";
			$data['judul'] 		= "Data Pelatihan";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
		$data['page'] 				= "Data Pelatihan";
		$data['judul'] 				= "Data Pelatihan";	
		$this->loadkonten('v_pelatihan/tambah',$data);
      }
	
	}

    public function prosesTambahPelatihan() {		
				
				$data = array( 
					'tanggal_pendaftaran' 	 => date('Y-m-d',strtotime($this->input->post('tanggal_pendaftaran'))),
					'nama_perusahaan' 		 => $this->input->post('nama_perusahaan'),
					'alamat' 		         => $this->input->post('alamat'),
					'kota' 	                 => $this->input->post('kota'),
					'provinsi' 		         => $this->input->post('provinsi'),
					'nama_pic' 		         => $this->input->post('nama_pic'),
					'telepon' 		         => $this->input->post('telepon'),
					'email' 		         => $this->input->post('email'),
					'tempat_daftar' 		 => $this->input->post('tempat_daftar'),
					'created_date' 		     => date('Y-m-d H:i:s'),
					'updated_date' 		     => date('Y-m-d H:i:s')						 
				);
					
				$result = $this->db->insert('tbl_pelatihan', $data);
				$id_pelatihan = $this->db->insert_id();
				 
				 if ($result > 0) {
					$out = array('status' => 'berhasil', 'id_pelatihan' => $id_pelatihan);
				 $out['status'] = 'berhasil';
				 } else {
				 $out['status'] = 'gagal';
				 }

		echo json_encode($out);
	
	}

    public function detail($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('add','daftar');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Pelatihan";
			$data['judul'] 		= "Data Pelatihan";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
		$data['page'] 				= "Data Pelatihan";
		$data['judul'] 				= "Data Pelatihan";
        $data['datamaster'] = $id;	
		$this->loadkonten('v_pelatihan/detail',$data);
      }
	
	}

    public function LoadDataBidangStudi($id)
	{
		$list = $this->M_pelatihan->get_bidangstudi($id);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $master) {
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $master->nama_bidang_studi;
			$row[] = $master->level;
			$row[] = $master->nama_tentor;
			$row[] = date('d-m-Y',strtotime($master->tanggal_mulai));
			$row[] = date('d-m-Y',strtotime($master->tanggal_selesai));
			$row[] = '<button class="btn btn-sm btn-danger hapus-kelas data-toggle="tooltip" data-placement="top" title="Hapus"" id_kelas_pelatihan="id_kelas_pelatihan"  data-id='." '".$master->id_kelas_pelatihan."' ".'><i class="glyphicon glyphicon-trash"></i></button>';
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
		$list = $this->M_pelatihan->get_tagihan($id);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $master) {
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = date('d-m-Y', strtotime($master->tanggal_invoice));
			$row[] = $master->nomor_invoice;
			$row[] = nominal($master->jumlah);
			$row[] = '<button class="btn btn-sm btn-danger hapus-tagihan data-toggle="tooltip" data-placement="top" title="Hapus"" id_invoice_pelatihan="id_invoice_pelatihan"  data-id='." '".$master->id_invoice_pelatihan."' ".'><i class="glyphicon glyphicon-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
                        "draw" => $_POST['draw'],
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

    public function LoadDataPembayaran($id)
	{
		$list = $this->M_pelatihan->get_pembayaran($id);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $master) {
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = date('d-m-Y', strtotime($master->tanggal_pembayaran));
			$row[] = nominal($master->jumlah_pembayaran);
			$row[] = $master->jenis_pembayaran;
			$row[] = $master->kategori_pembayaran;
			$row[] = $master->bank;
			$row[] = $master->rekening;
			$row[] = $master->atas_nama;
            $row[] = '<button class="btn btn-sm btn-danger hapus-pembayaran data-toggle="tooltip" data-placement="top" title="Hapus"" id_pembayaran_pelatihan="id_pembayaran_pelatihan"  data-id='." '".$master->id_pembayaran_pelatihan."' ".'><i class="glyphicon glyphicon-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
                        "draw" => $_POST['draw'],
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

	public function LoadDataPeserta($id)
	{
		$list = $this->M_pelatihan->get_peserta($id);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $master) {
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $master->nama_siswa;
			$row[] = $master->alamat;
			$row[] = $master->telepon;
			$row[] = $master->nama_bidang_studi;
            $row[] = '<button class="btn btn-sm btn-danger hapus-peserta data-toggle="tooltip" data-placement="top" title="Hapus"" id_peserta_pelatihan="id_peserta_pelatihan"  data-id='." '".$master->id_peserta_pelatihan."' ".'><i class="glyphicon glyphicon-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
                        "draw" => $_POST['draw'],
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

    public function Add_study($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('add','daftar');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Pelatihan";
			$data['judul'] 		= "Data Pelatihan";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
		$data['page'] 				= "Data Pelatihan";
		$data['judul'] 				= "Data Pelatihan";	
        $data['datamaster'] = $id;
		$data['Studi'] = $this->M_pelatihan->selek_studi();
		$data['level'] = $this->M_pelatihan->selek_level();
		$data['trainer'] = $this->M_pelatihan->selek_trainer();
		$this->loadkonten('v_pelatihan/tambah_studi',$data);
      }
	
	}

	public function prosesTambahBidangStudi() {		
				
		$data = array( 
			'id_pelatihan' 	 		=> $this->input->post('id_pelatihan'),
			'nama_bidang_studi' 	=> $this->input->post('bidang_studi'),
			'level' 		        => $this->input->post('level'),
			'nama_tentor' 	        => $this->input->post('trainer'),
			'tanggal_mulai' 	    => date('Y-m-d',strtotime($this->input->post('tanggal_mulai'))),
			'tanggal_selesai' 	    => date('Y-m-d',strtotime($this->input->post('tanggal_selesai'))),
			'created_date' 		    => date('Y-m-d H:i:s')				 
		);
			
		$result = $this->db->insert('tbl_kelas_pelatihan', $data);
		
		 
		 if ($result > 0) {
		 $out['status'] = 'berhasil';
		 } else {
		 $out['status'] = 'gagal';
		 }

	echo json_encode($out);

	}

	public function hapus_kelas(){
		
		$id_kelas_pelatihan = $this->input->post('id_kelas_pelatihan');
		
		$this->db->delete('tbl_kelas_pelatihan',array('id_kelas_pelatihan' =>$id_kelas_pelatihan));

		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
		echo json_encode($out);
	}

	public function Add_invoice($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('add','daftar');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Pelatihan";
			$data['judul'] 		= "Data Pelatihan";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
		$data['page'] 				= "Data Pelatihan";
		$data['judul'] 				= "Data Pelatihan";	
        $data['datamaster'] = $id;
		$this->loadkonten('v_pelatihan/tambah_invoice',$data);
      }
	
	}

	public function prosesTambahInvoice() {		
				
		$data = array( 
			'id_pelatihan' 	 		=> $this->input->post('id_pelatihan'),
			'tanggal_invoice' 		=> date('Y-m-d',strtotime($this->input->post('tanggal_invoice'))),
			'nomor_invoice' 		=> $this->input->post('nomor_invoice'),
			'jumlah' 	        	=> preg_replace('/[Rp. ]/','',$this->input->post('jumlah_tagihan')),
			'created_date' 		    => date('Y-m-d H:i:s')				 
		);
			
		$result = $this->db->insert('tbl_invoice_pelatihan', $data);
		
		 
		 if ($result > 0) {
		 $out['status'] = 'berhasil';
		 } else {
		 $out['status'] = 'gagal';
		 }

		echo json_encode($out);

	}

	public function hapus_tagihan(){
		
		$id_invoice_pelatihan = $this->input->post('id_invoice_pelatihan');
		
		$this->db->delete('tbl_invoice_pelatihan',array('id_invoice_pelatihan' =>$id_invoice_pelatihan));

		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
		echo json_encode($out);
	}

	public function Add_pembayaran($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('add','daftar');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Pelatihan";
			$data['judul'] 		= "Data Pelatihan";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
		$data['page'] 				= "Data Pelatihan";
		$data['judul'] 				= "Data Pelatihan";	
        $data['datamaster'] = $id;
		$data['Studi'] = $this->M_pelatihan->selek_studi();
		$data['level'] = $this->M_pelatihan->selek_level();
		$data['trainer'] = $this->M_pelatihan->selek_trainer();
		$data['bank'] = $this->M_pelatihan->data_bank();
		$this->loadkonten('v_pelatihan/tambah_pembayaran',$data);
      }
	
	}

	public function prosesTambahPembayaran() {
		
		if($this->input->post('jenis_pembayaran') == 'tunai'){
			$data = array( 
				'id_pelatihan' 	 		=> $this->input->post('id_pelatihan'),
				'tanggal_pembayaran' 	=> date('Y-m-d',strtotime($this->input->post('tanggal_pembayaran'))),
				'jenis_pembayaran' 		=> $this->input->post('jenis_pembayaran'),
				'kategori_pembayaran' 	=> $this->input->post('kategori_pembayaran'),
				'jumlah_pembayaran' 	=> preg_replace('/[Rp. ]/','',$this->input->post('jumlah_pembayaran')),
				'created_date' 		    => date('Y-m-d H:i:s')				 
			);
		} else {	
			$data = array( 
				'id_pelatihan' 	 		=> $this->input->post('id_pelatihan'),
				'tanggal_pembayaran' 	=> date('Y-m-d',strtotime($this->input->post('tanggal_pembayaran'))),
				'jenis_pembayaran' 		=> $this->input->post('jenis_pembayaran'),
				'kategori_pembayaran' 	=> $this->input->post('kategori_pembayaran'),
				'bank' 					=> $this->input->post('bank'),
				'rekening' 				=> $this->input->post('nomor_rekening'),
				'atas_nama' 			=> $this->input->post('atas_nama'),
				'jumlah_pembayaran' 	=> preg_replace('/[Rp. ]/','',$this->input->post('jumlah_pembayaran')),
				'created_date' 		    => date('Y-m-d H:i:s')				 
			);
		}
			
		$result = $this->db->insert('tbl_pembayaran_pelatihan', $data);
		
		 
		 if ($result > 0) {
		 $out['status'] = 'berhasil';
		 } else {
		 $out['status'] = 'gagal';
		 }

		echo json_encode($out);

	}

	public function hapus_pembayaran(){
		
		$id_pembayaran_pelatihan = $this->input->post('id_pembayaran_pelatihan');
		
		$this->db->delete('tbl_pembayaran_pelatihan',array('id_pembayaran_pelatihan' =>$id_pembayaran_pelatihan));

		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
		echo json_encode($out);
	}

	public function Add_peserta($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('add','daftar');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Pelatihan";
			$data['judul'] 		= "Data Pelatihan";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
		$data['page'] 				= "Data Pelatihan";
		$data['judul'] 				= "Data Pelatihan";	
        $data['datamaster'] = $id;
		$data['Studi'] 		 		= $this->M_pelatihan->get_bidangstudi($id);
		$this->loadkonten('v_pelatihan/tambah_peserta',$data);
      }
	
	}

	public function prosesTambahPeserta() {		
				
		$nis 	 		 = $this->M_pelatihan->nis();
		$id_pelatihan    = $this->input->post('id_pelatihan');

		//$pelatihan_query = $this->db-query("SELECT * FROM tbl_pelatihan a, tbl_kelas_pelatihan d, tbl_bidang_studi c, tbl_tentor d WHERE a.id_pelatihan = '$id_pelatihan' AND a.id_pelatihan = b.id_pelatihan AND b.nama_bidang_studi = c.nama_bidang_studi AND b.nama_tentor = d.nama_tentor");

		$data = array(
			//data siswa
			'nis' 		 			 => $nis,
			'nama_siswa' 		 	 => $this->input->post('nama_lengkap'),
			'jenis_kelamin' 		 => $this->input->post('jenis_kelamin'),
			'nik' 		   		 	 => $this->input->post('nik'),
			'tempat_lahir' 		     => $this->input->post('tempat_lahir'),
			'tanggal_lahir' 		 => date('Y-m-d', strtotime($this->input->post('tanggal_lahir'))),
			'agama'                  => $this->input->post('agama'),
			'telepon'				 => $this->input->post('handphone'),
			'alamat'				 => $this->input->post('alamat'),
			'kota'				 	 => $this->input->post('kota'),
			'provinsi'				 => $this->input->post('provinsi'),
			'created_date' 		     => date('Y-m-d h:i:sa'),
			'status_siswa'			 => 'aktif'
		);
			
		$result = $this->db->insert('tbl_siswa', $data);
		$id_siswa = $this->db->insert_id();

		$data2 = array(
			'id_pelatihan' 		 	=> $this->input->post('id_pelatihan'),
			'id_siswa' 		 		=> $id_siswa,
			'nama_bidang_studi' 	=> $this->input->post('bidang_studi'),
			'created_date' 	 		=> date('Y-m-d h:i:sa')
		);
			
		$result = $this->db->insert('tbl_peserta_pelatihan', $data2);
/*
		$data3 = array( 
			'no_pendaftaran' 		 => $kode,
			'tanggal_pendaftaran' 	 => $this->input->post('tanggal_pendaftaran'),
			'id_siswa' 		 		 => $id_siswa,
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
		$result = $this->db->insert('tbl_pendaftaran', $data3);
		$id_pendaftaran = $this->db->insert_id();
			
		$data4 = array( 
			'id_pendaftaran' 		 => $id_pendaftaran,
			'id_siswa' 		 		 => $id_siswa,
			'id_tentor' 		 	 => 0,
			'status_kelas' 		 	 => 'selesai',
			'created_date' 		     => date('Y-m-d H:i:s'),
			'updated_date' 		     => date('Y-m-d H:i:s')						 
		);	
		$result = $this->db->insert('tbl_kelas', $data4);  
		
		$data5 = array( 
			'no_invoice' 		     => '-',
			'id_pendaftaran' 		 => $id_pendaftaran,
			'tanggal_invoice' 		 => date('Y-m-d'),
			'status_invoice' 		 => 'lunas',
			'created_date' 		     => date('Y-m-d H:i:s'),
			'updated_date' 		     => date('Y-m-d H:i:s')						 
		);	
		$result = $this->db->insert('tbl_invoice', $data5);
*/		 
		 if ($result > 0) {
		 $out['status'] = 'berhasil';
		 } else {
		 $out['status'] = 'gagal';
		 }

		echo json_encode($out);

	}

	public function hapus_peserta(){
		
		$id_peserta_pelatihan = $this->input->post('id_peserta_pelatihan');

		$peserta_query = $this->db->query("DELETE FROM tbl_siswa a, tbl_peserta_pelatihan b WHERE a.id_siswa = b.id_siswa AND b.id_peserta_pelatihan = '$id_peserta_pelatihan'");
		
		//$this->db->delete('tbl_peserta_pelatihan',array('id_peserta_pelatihan' =>$id_peserta_pelatihan));

		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
		echo json_encode($out);
	}

	public function hapus_pelatihan(){
		
		$id_pelatihan = $this->input->post('id_pelatihan');
		
		$this->db->delete('tbl_kelas_pelatihan',array('id_pelatihan' =>$id_pelatihan));
		$this->db->delete('tbl_invoice_pelatihan',array('id_pelatihan' =>$id_pelatihan));
		$this->db->delete('tbl_pembayaran_pelatihan',array('id_pelatihan' =>$id_pelatihan));
		$this->db->delete('tbl_peserta_pelatihan',array('id_pelatihan' =>$id_pelatihan));
		$this->db->delete('tbl_pelatihan',array('id_pelatihan' =>$id_pelatihan));

		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
		echo json_encode($out);
	}

}