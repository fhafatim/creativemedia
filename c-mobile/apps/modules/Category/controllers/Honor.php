<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Honor extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_honor');
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
		$data['page'] 		= "Data Honor";
		$data['judul'] 		= "Data Honor";
		
		
		$this->loadkonten('v_honor/home',$data);
	}
	function ambil_data()
	{

		$modul=$this->input->post('modul');
		$id=$this->input->post('id_invoice');
	

		if($modul=="jumlah_tagihan"){
		echo $this->M_honor->selek_data($id);
		}

		else if($modul=="id_invoice"){
		echo $this->M_honor->selek_nama($id);
		}
		
	}

	public function ajax_list()
	{
		$list = $this->M_honor->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $master) {
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = date('d-m-Y',strtotime($master->tanggal_pembayaran));
			$row[] = $master->nama_tentor;
			$row[] = $master->nama_siswa;
			$row[] = $master->bidang_studi;
			
			$row[] = nominal($master->nominal);
			$row[] = nominal($master->jumlah_pembayaran);
			$row[] = $master->kategori_pembayaran;
			$row[] = $master->tempat_pembayaran;
			
			//add html for action
			$row[] =  anchor('edit-honor/'.$master->id_honor, ' <span class="fa fa-edit"></span> ', ' class="btn btn-sm btn-primary ajaxify klik " ').			
				      '  <button class="btn btn-sm btn-danger hapus-master" id_honor="id_honor" data-id='."'".$master->id_honor."'".'><i class="glyphicon glyphicon-trash"></i></button>';
			
			$data[] = $row;
		}

		$output = array(
                        "draw" => $_POST['draw'],

						
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}
	
	
	public function Add() {
		// 'tbl_invoice'=> $this->M_honor->get_data($id_invoice);
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		
		$access = $this->M_sidebar->access('add','honor');
		if ($access->menuview == 0){
			$data['page'] 		= "Honor";
			$data['judul'] 		= "Honor";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
			// 'pembayaran' = $this->M_honor->get_data()
			$data['page'] 				= "Honor";
			$data['judul'] 				= "Honor";
			$data['kursus']				= $this->M_honor->get_kursus();
			$data['bank']				= $this->M_honor->get_bank();
			$this->loadkonten('v_honor/tambah',$data);
		}
	
	}

	public function tes() {
	$kode 	 = $this->M_daftar->kode();
	
	echo $kode;
	}
	public function get_honor()
	{
		$id_kelas = $this->input->post('id_kelas');
		
		$honor = $this->db->query("SELECT * FROM tbl_honor WHERE id_kelas = '$id_kelas'");
		$harga = $honor->row()->nominal;
		
		$pembayaran = $this->db->query("SELECT SUM(jumlah_pembayaran) as jumlah_pembayaran FROM tbl_honor WHERE id_kelas = '$id_kelas'");
		$bayar = $pembayaran->row()->jumlah_pembayaran;
		
		$sisa = $harga - $bayar;
		
		$siswatentor = $this->db->query("SELECT * FROM tbl_kelas a, tbl_siswa b, tbl_tentor c, tbl_pendaftaran d, tbl_bidang_studi e WHERE a.id_siswa = b.id_siswa AND a.id_tentor = c.id_tentor AND a.id_pendaftaran = d.id_pendaftaran AND d.id_bidang_studi = e.id_bidang_studi AND a.id_kelas = '$id_kelas'");
		$siswa = $siswatentor->row()->nama_siswa;
		$tentor = $siswatentor->row()->nama_tentor;
		$bidang_studi = $siswatentor->row()->nama_bidang_studi;
		$pendaftaran = $siswatentor->row()->no_pendaftaran;
		$tanggal_selesai = $siswatentor->row()->tanggal_selesai;
		$id_kelas = $siswatentor->row()->id_kelas;
		
		$out = array('jumlah_honor' => ''.$harga, 'sisa' => ''.$sisa, 'siswa' => ''.$siswa,'tentor' => ''.$tentor,'bidang_studi' => ''.$bidang_studi,'pendaftaran' => ''.$pendaftaran,'tanggal_selesai' => ''.$tanggal_selesai,'id_kelas' => ''.$id_kelas);
		echo json_encode($out);
	}
	
	public function prosesTambah() {

	if($this->input->post('jenis_pembayaran') == "tunai"){
		
		if($this->input->post('jumlah_honor') == ""){
			$data = array( 

			'id_kelas' 				=> $this->input->post('id_kelas'),
			'no_pendaftaran' 		=> $this->input->post('no_pendaftaran'),
			'nama_tentor' 			=> $this->input->post('nama_tentor'),
			'nama_siswa'     		=> $this->input->post('nama_siswa'),
			'bidang_studi'    	 	=> $this->input->post('bidang_studi'),
			'tanggal_selesai'	 	=> $this->input->post('tanggal_selesai'),
			'nominal'		 	 	=> $this->input->post('jumlah_honor2'),
			'tanggal_pembayaran'	=> $this->input->post('tanggal_pembayaran'),
			'jenis_pembayaran'		=> $this->input->post('jenis_pembayaran'),
			'jumlah_pembayaran'		=> preg_replace('/[Rp. ]/','',$this->input->post('nominal')),
			'kategori_pembayaran'	=> $this->input->post('kategori_pembayaran'),
			'tempat_pembayaran'		=> $this->input->post('tempat_pembayaran'),
			'created_date' 		    => date('Y-m-d H:i:s'),
			'updated_date' 		    => date('Y-m-d H:i:s')						 
			);
		} else {
			$data = array( 

			'id_kelas' 				=> $this->input->post('id_kelas'),
			'no_pendaftaran' 		=> $this->input->post('no_pendaftaran'),
			'nama_tentor' 			=> $this->input->post('nama_tentor'),
			'nama_siswa'     		=> $this->input->post('nama_siswa'),
			'bidang_studi'    	 	=> $this->input->post('bidang_studi'),
			'tanggal_selesai'	 	=> $this->input->post('tanggal_selesai'),
			'nominal'		 	 	=> $this->input->post('jumlah_honor'),
			'tanggal_pembayaran'	=> $this->input->post('tanggal_pembayaran'),
			'jenis_pembayaran'		=> $this->input->post('jenis_pembayaran'),
			'jumlah_pembayaran'		=> preg_replace('/[Rp. ]/','',$this->input->post('nominal')),
			'kategori_pembayaran'	=> $this->input->post('kategori_pembayaran'),
			'tempat_pembayaran'		=> $this->input->post('tempat_pembayaran'),
			'created_date' 		    => date('Y-m-d H:i:s'),
			'updated_date' 		    => date('Y-m-d H:i:s')						 
			);
		}
		
	} else {
		
		if($this->input->post('jumlah_honor') == ""){
			$data = array( 
			'id_kelas' 				=> $this->input->post('id_kelas'),
			'no_pendaftaran' 		=> $this->input->post('no_pendaftaran'),
			'nama_tentor' 			=> $this->input->post('nama_tentor'),
			'nama_siswa'     		=> $this->input->post('nama_siswa'),
			'bidang_studi'    	 	=> $this->input->post('bidang_studi'),
			'tanggal_selesai'	 	=> $this->input->post('tanggal_selesai'),
			'nominal'		 	 	=> $this->input->post('jumlah_honor2'),
			'tanggal_pembayaran'	=> $this->input->post('tanggal_pembayaran'),
			'jenis_pembayaran'		=> $this->input->post('jenis_pembayaran'),
			'jumlah_pembayaran'		=> preg_replace('/[Rp. ]/','',$this->input->post('nominal')),
			'bank'		 			=> $this->input->post('bank'),
			'nomor_rekening'      	=> $this->input->post('nomor_rekening'),
			'atas_nama'				=> $this->input->post('atas_nama'),
			'kategori_pembayaran'	=> $this->input->post('kategori_pembayaran'),
			'tempat_pembayaran'		=> $this->input->post('tempat_pembayaran'),
			'created_date' 		    => date('Y-m-d H:i:s'),
			'updated_date' 		    => date('Y-m-d H:i:s')						 
			);
		} else {
			$data = array( 
			'id_kelas' 				=> $this->input->post('id_kelas'),
			'no_pendaftaran' 		=> $this->input->post('no_pendaftaran'),
			'nama_tentor' 			=> $this->input->post('nama_tentor'),
			'nama_siswa'     		=> $this->input->post('nama_siswa'),
			'bidang_studi'    	 	=> $this->input->post('bidang_studi'),
			'tanggal_selesai'	 	=> $this->input->post('tanggal_selesai'),
			'nominal'		 	 	=> $this->input->post('jumlah_honor'),
			'tanggal_pembayaran'	=> $this->input->post('tanggal_pembayaran'),
			'jenis_pembayaran'		=> $this->input->post('jenis_pembayaran'),
			'jumlah_pembayaran'		=> preg_replace('/[Rp. ]/','',$this->input->post('nominal')),
			'bank'		 			=> $this->input->post('bank'),
			'nomor_rekening'      	=> $this->input->post('nomor_rekening'),
			'atas_nama'				=> $this->input->post('atas_nama'),
			'kategori_pembayaran'	=> $this->input->post('kategori_pembayaran'),
			'tempat_pembayaran'		=> $this->input->post('tempat_pembayaran'),
			'created_date' 		    => date('Y-m-d H:i:s'),
			'updated_date' 		    => date('Y-m-d H:i:s')						 
			);
		}
	
	}
		$result=  $this->db->insert('tbl_honor', $data);
		
		if($this->input->post('kategori_pembayaran') == "semua"){
			$where2 = array(
				'id_kelas'      => $this->input->post('id_kelas')
			);
			
			$data2 = array(
				'status_honor'		=> 'lunas',
				'updated_date' 		=> date('Y-m-d H:i:s')			
			);
			
			$this->db->update('tbl_kelas',$data2,$where2);
		}

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
		$access = $this->M_sidebar->access('edit','honor');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Honor";
			$data['judul'] 		= "Data Honor";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
		$where = array('id_honor' => $id);
		$data['datamaster']  = $this->M_honor->select_by_id($id);
		$data['page'] 		= "Data Honor";
		$data['judul'] 		= "Data Honor";
		$data['kursus']		= $this->M_honor->get_kursus_all();
		$data['bank'] 		= $this->M_honor->get_bank();
	    $this->loadkonten('v_honor/update',$data);
	}
	}
	
    public function prosesUpdate() {
		$where = array(
			'id_honor'      => $this->input->post('id_honor')
		);	
		
		if($this->input->post('jenis_pembayaran') == "tunai")
		{
			$data = array(
			'tanggal_pembayaran'	=> $this->input->post('tanggal_pembayaran'),
			'jenis_pembayaran'		=> $this->input->post('jenis_pembayaran'),
			'jumlah_pembayaran'		=> $this->input->post('nominal'),
			'kategori_pembayaran'	=> $this->input->post('kategori_pembayaran'),
			'tempat_pembayaran'		=> $this->input->post('tempat_pembayaran'),
			'updated_date' 		    => date('Y-m-d H:i:s')			
			);
		}
		else
		{
			$data = array(
			'tanggal_pembayaran'	=> $this->input->post('tanggal_pembayaran'),
			'jenis_pembayaran'		=> $this->input->post('jenis_pembayaran'),
			'jumlah_pembayaran'		=> $this->input->post('nominal'),
			'bank'					=> $this->input->post('bank'),
			'nomor_rekening'		=> $this->input->post('nomor_rekening'),
			'atas_nama'				=> $this->input->post('atas_nama'),
			'kategori_pembayaran'	=> $this->input->post('kategori_pembayaran'),
			'tempat_pembayaran'		=> $this->input->post('tempat_pembayaran'),
			'updated_date' 		    => date('Y-m-d H:i:s')			
			);
		}
		
		
		if($this->input->post('kategori_pembayaran') == 'semua')
		{
			$where2 = array(
				'id_kelas'      => $this->input->post('id_kelas')
			);
			
			$data2 = array(
				'status_honor'		=> 'lunas',
				'updated_date' 		    => date('Y-m-d H:i:s')			
			);
			
			$this->db->update('tbl_kelas',$data2,$where2);
		}
		
		$result = $this->M_honor->update($data,$where);
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		echo json_encode($out);
	}
	
    public function hapus() {
		
	$id_honor = $this->input->post('id_honor');
	
	$queryHonor = $this->db->query("SELECT * FROM tbl_honor a, tbl_kelas b WHERE a.id_kelas = b.id_kelas AND a.id_honor = '$id_honor'");
	$honor = $queryHonor->row();
	
	if($honor->status_honor == 'lunas')
	{
		$where = array(
			'id_kelas'      => $honor->id_kelas
		);
		
		$data = array(
			'status_honor'		=> 'pending',
			'updated_date' 		=> date('Y-m-d H:i:s')			
		);
		
		$this->db->update('tbl_kelas',$data,$where);
	}
	
	$result = $this->M_honor->hapus($id_honor);
	if ($result > 0) {
		$out['status'] = 'berhasil';
	} else {
		$out['status'] = 'gagal';
	}
	
	}
	
	
	
	
}