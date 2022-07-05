<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pembayaran');
		$this->load->model('M_sidebar');
		$this->load->library('Pdf');
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
		$data['page'] 		= "Data Pembayaran";
		$data['judul'] 		= "Data Pembayaran";
		
		
		$this->loadkonten('v_pembayaran/home',$data);
	}
	function ambil_data()
	{

		$modul=$this->input->post('modul');
		$id=$this->input->post('id_invoice');
	

		if($modul=="jumlah_tagihan"){
		echo $this->M_pembayaran->selek_data($id);
		}

		else if($modul=="id_invoice"){
		echo $this->M_pembayaran->selek_nama($id);
		}
		
	}

	public function ajax_list()
	{
		$dari = $this->input->post('tanggal');
		$sampai = $this->input->post('tanggal2');
		$tempat = $this->input->post('tempat_pembayaran');
		$list = $this->M_pembayaran->get_data($dari,$sampai,$tempat);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $master) {
			
			$id_invoice = $master->id_invoice;
			$pendaftaran = $this->db->query("SELECT * FROM tbl_invoice a, tbl_pendaftaran b, tbl_siswa c, tbl_bidang_studi d, tbl_level_kelas e WHERE a.id_pendaftaran = b.id_pendaftaran AND b.id_siswa = c.id_siswa AND b.id_bidang_studi = d.id_bidang_studi AND b.id_level_kelas = e.id_level_kelas AND a.id_invoice = '$id_invoice'");
			$datapendaftaran = $pendaftaran->row();
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = date('d-m-Y',strtotime($master->tanggal_pembayaran));
			$row[] = $master->kode_pembayaran;
			$row[] = $datapendaftaran->no_pendaftaran;
			$row[] = $datapendaftaran->nama_siswa;
			if ($datapendaftaran->id_bidang_studi == 16) {
				$nama_studi = $datapendaftaran->keterangan.' [Custom]';
			}else{
				$nama_studi = $datapendaftaran->nama_bidang_studi;
			}
			$row[] = $nama_studi;
			$row[] = $datapendaftaran->nama_level_kelas;
			$row[] = $master->kategori_pembayaran;
			$row[] = nominal($master->nominal);
			$row[] = $master->tempat_pembayaran;
			
			if ($master->status_pembayaran == 'pending') {
				$StatusPembayaran = '<small class="label pull-center bg-yellow">Pending</small>';
			} else {
				$StatusPembayaran = '<small class="label pull-center bg-green">Diterima</small>';
			} 
			$row[] = $StatusPembayaran;
			//add html for action
			if ($master->tempat_pembayaran == 'tubanan') {
			$row[] =  anchor('edit-pembayaran/'.$master->id_pembayaran, ' <span class="fa fa-edit"></span> ', ' class="btn btn-sm btn-primary ajaxify klik " ').			
				      '  <button class="btn btn-sm btn-danger hapus-master" id_invoice="id_invoice" data-id='."'".$master->id_pembayaran."'".'><i class="glyphicon glyphicon-trash"></i></button>'.' '.
					  anchor('download-kwitansi-tubanan/'.$master->id_pembayaran, ' <span class="fa fa-download"></span> ', ' class="btn btn-sm btn-success" target="_blank" ').' '.anchor('print-kwitansi-tubanan/'.$master->id_pembayaran, ' <span class="fa fa-print"></span> ', ' class="btn btn-sm btn-info" target="_blank" ');
			} else {
				$row[] =  anchor('edit-pembayaran/'.$master->id_pembayaran, ' <span class="fa fa-edit"></span> ', ' class="btn btn-sm btn-primary ajaxify klik " ').			
				      '  <button class="btn btn-sm btn-danger hapus-master" id_invoice="id_invoice" data-id='."'".$master->id_pembayaran."'".'><i class="glyphicon glyphicon-trash"></i></button>'.' '.
					  anchor('download-kwitansi-nginden/'.$master->id_pembayaran, ' <span class="fa fa-download"></span> ', ' class="btn btn-sm btn-success" target="_blank" ').' '.anchor('print-kwitansi-nginden/'.$master->id_pembayaran, ' <span class="fa fa-print"></span> ', ' class="btn btn-sm btn-info" target="_blank" ');
			
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
	
	
	public function Add() {
		// 'tbl_invoice'=> $this->M_pembayaran->get_data($id_invoice);
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		
		$access = $this->M_sidebar->access('add','pembayaran');
		if ($access->menuview == 0){
			$data['page'] 		= "Pembayaran";
			$data['judul'] 		= "Pembayaran";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
			// 'pembayaran' = $this->M_pembayaran->get_data()
			$nama = $this->session->userdata('nama');
			$data['page'] 				= "Pembayaran";
			$data['judul'] 				= "Pembayaran";
			//$data['pendaftaran']		= $this->M_pembayaran->select_pendaftaran();
			$data['pembayaran']		    = $this->M_pembayaran->getdatabayar($nama);
			$data['bayar']		    	= $this->M_pembayaran->get_all_data();
			$data['bank'] 				= $this->M_pembayaran->data_bank();
			$data['kode_nginden']		= $this->M_pembayaran->kode_nginden();
			$data['kode_tubanan']		= $this->M_pembayaran->kode_tubanan();
			$this->loadkonten('v_pembayaran/tambah',$data);
		}
	 
	}

	public function tes() {
	    $data['userdata'] = $this->userdata;
		
		$access = $this->M_sidebar->access('add','pembayaran');
		if ($access->menuview == 0){
			$data['page'] 		= "Pembayaran";
			$data['judul'] 		= "Pembayaran";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
			// 'pembayaran' = $this->M_pembayaran->get_data()
			$nama = $this->session->userdata('nama');
			$data['page'] 				= "Pembayaran";
			$data['judul'] 				= "Pembayaran";
			$data['pendaftaran']		= $this->M_pembayaran->select_pendaftaran();
			$data['pembayaran']		    = $this->M_pembayaran->getdatabayar($nama);
			$this->loadkonten('v_pembayaran/coba',$data);
		}
	}
	public function get_harga_kursus()
	{
		$id_pendaftaran = $this->input->post('id_pendaftaran');
		//$harga_kursus = $this->db->get_where("tbl_pendaftaran", ['id_pendaftaran' => $id_pendaftaran])->row_array();
		
		$pendaftaran = $this->db->query("SELECT * FROM tbl_pendaftaran WHERE id_pendaftaran = '$id_pendaftaran'");
		$harga = $pendaftaran->row()->harga_kursus;
		
		$pembayaran = $this->db->query("SELECT SUM(a.nominal) as nominal FROM tbl_pembayaran a, tbl_invoice b WHERE a.id_invoice = b.id_invoice AND b.id_pendaftaran = '$id_pendaftaran'");
		$bayar = $pembayaran->row()->nominal;
		
		$sisa = $harga - $bayar;
		
		$out = array('harga_kursus' => ''.$harga, 'sisa' => ''.$sisa);
		echo json_encode($out);
	}
	
	public function prosesTambah() {

	$kode_pembayaran = $this->M_pembayaran->kode_pembayaran();
	$id_pendaftaran = $this->input->post("pendaftaran_kursus");
	
	$invoice = $this->db->get_where("tbl_invoice", ['id_pendaftaran' => $id_pendaftaran])->row_array();
	$pendaftaran = $this->db->get_where("tbl_pendaftaran", ['id_pendaftaran' => $id_pendaftaran])->row_array();

	//UPDATE TABEL PEDAFTARAN
	$bidangStudi = $this->db->query("SELECT * FROM tbl_pendaftaran a, tbl_bidang_studi b WHERE a.id_bidang_studi = b.id_bidang_studi AND a.id_pendaftaran = '$id_pendaftaran'");
	$databidangStudi = $bidangStudi->row();

	$data2 = array(
		'nama_bidang_studi' => $databidangStudi->nama_bidang_studi,
		'status_pendaftaran' => 'selesai'
	); 

	$where = array(
		'id_pendaftaran' => $id_pendaftaran
	);

	$this->db->update('tbl_pendaftaran',$data2,$where);

	//UPDATE TABEL SISWA
	$this->db->update("tbl_siswa", ['status_siswa' => 'aktif'], ['id_siswa' => $pendaftaran['id_siswa']]);
	
	if($this->input->post('kategori_pembayaran') == "pelunasan"){
		$this->db->update("tbl_invoice", ['status_invoice' => 'lunas'] , ['id_pendaftaran' => $id_pendaftaran]);
	}
	
	$data = array( 

		'kode_pembayaran' 		 => $this->input->post('kode_pembayaran'),
	    'id_invoice' 			 => $invoice['id_invoice'],
		'tanggal_pembayaran'     => $this->input->post('tanggal_pembayaran'),
		'jenis_pembayaran'    	 => $this->input->post('jenis_pembayaran'),
		'kategori_pembayaran'	 => $this->input->post('kategori_pembayaran'),
		'sisa_tagihan'		 	 => $this->input->post('sisa_tagihan'),
		'bank'		 	 		 => $this->input->post('bank'),
		'nomor_rekening'		 => $this->input->post('nomor_rekening'),
		'atas_nama'		 	 	 => $this->input->post('atas_nama'),
		'tempat_pembayaran'		 => $this->input->post('tempat_pembayaran'),
		'status_pembayaran'      => 'diterima',
		'nominal'				 => preg_replace('/[Rp. ]/','',$this->input->post('nominal')),
		'created_date' 		     => date('Y-m-d H:i:s'),
		'updated_date' 		     => date('Y-m-d H:i:s')						 
		);
		$result=  $this->db->insert('tbl_pembayaran', $data);
		
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
		$access = $this->M_sidebar->access('edit','pembayaran');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Pembayaran";
			$data['judul'] 		= "Data Pembayaran";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
		$where = array('id_pembayaran' => $id);
		$data['datamaster']  = $this->M_pembayaran->select_by_id($id);
		$data['page'] 		= "Data Pembayaran";
		$data['judul'] 		= "Data Pembayaran";
		$data['bank'] 				= $this->M_pembayaran->data_bank();
	    $this->loadkonten('v_pembayaran/update',$data);
	}
	}
	
    public function prosesUpdate() {
		$where = array(
			'id_pembayaran'      => $this->input->post('id_pembayaran')
		);	
		
		$data = array(
			'tanggal_pembayaran'	=> $this->input->post('tanggal_pembayaran'),
			'jenis_pembayaran'		=> $this->input->post('jenis_pembayaran'),
			'bank'					=> $this->input->post('bank'),
			'nomor_rekening'		=> $this->input->post('nomor_rekening'),
			'atas_nama'				=> $this->input->post('atas_nama'),
			'nominal'				=> $this->input->post('nominal'),
			'kategori_pembayaran'	=> $this->input->post('kategori_pembayaran'),
			'tempat_pembayaran'		=> $this->input->post('tempat_pembayaran'),
			'updated_date' 		    => date('Y-m-d H:i:s')			
		);
		
		if($this->input->post('kategori_pembayaran') == 'pelunasan')
		{
			$where2 = array(
				'id_invoice'      => $this->input->post('id_invoice')
			);
			
			$data2 = array(
				'status_invoice'		=> 'lunas',
				'updated_date' 		    => date('Y-m-d H:i:s')			
			);
			
			$this->db->update('tbl_invoice',$data2,$where2);
		} 
		
		$result = $this->M_pembayaran->update($data,$where);
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		echo json_encode($out);
	}
	
    public function hapus() {
		
	$id_pembayaran = $this->input->post('id_pembayaran');
	
	$queryInvoice = $this->db->query("SELECT * FROM tbl_invoice a, tbl_pembayaran b WHERE a.id_invoice = b.id_invoice AND b.id_pembayaran = '$id_pembayaran'");
	$invoice = $queryInvoice->row();
	
	if($invoice->status_invoice == 'lunas')
	{
		$where = array(
			'id_invoice'      => $invoice->id_invoice
		);
		
		$data = array(
			'status_invoice'		=> 'pending',
			'updated_date' 		    => date('Y-m-d H:i:s')			
		);
		
		$this->db->update('tbl_invoice',$data,$where);
	}
	
	$result = $this->M_pembayaran->hapus($id_pembayaran);
	if ($result > 0) {
		$out['status'] = 'berhasil';
	} else {
		$out['status'] = 'gagal';
	}
	
	}
	
	public function bukti($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('edit','daftar');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Pembayaran";
			$data['judul'] 		= "Data Pembayaran";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
			// $where=array('id_pembayaran' => $id);
			// $data['datamaster']  = $id;
			$data['datamaster']  = $this->M_pembayaran->cetak_bukti($id);
			// var_dump($data['datamaster']);
			// die;
			// $data['jumlah_tagihan']  = $this->M_daftar->jumlah_tagihan($id);

			$data['page'] 		= "Data Pembayaran";
			$data['judul'] 		= "Data Pembayaran";	
			$this->loadkonten('v_pembayaran/kwitansipembayaran',$data);
		}
	}
	
	public function download_kwitansi_tubanan($id){
		$data  = $this->M_pembayaran->cetak_bukti($id);
		$pdf = new FPDF('L','mm',array(210,150));
		$pdf->AddPage();
		if($data->kategori_pembayaran == 'pelunasan'){
			$pdf->image('assets/bg-kwitansi-lunas.jpg',0,0,210,148);
		} else {
			$pdf->image('assets/bg-kwitansi.jpg',0,0,210,148);
		}
		
		$pdf->SetFont('Arial','',10);
		$pdf->SetMargins(0.5,0.5,0.5,0.5);
		$pdf->text(88, 13, 'a. Jl. Tubanan Baru 10/Blok K-15 Surabaya 60188, East Java - Indonesia.', 0, 0, 'L');
		$pdf->text(120, 18, 't. (031) 7328540, (031) 99020730| m. 085733301090', 0, 0, 'L');
		$pdf->text(121, 23, 'e. care@creativemedia.id | w. www.creativemedia.id', 0, 0, 'L');
		$pdf->text(90, 38, 'No : '.$data->kode_pembayaran, 0, 0, 'L');
		$pdf->text(46, 46, ''.$data->nama_siswa, 0, 0, 'L');
		$pdf->text(46, 61, ''.terbilang($data->nominal).' Rupiah', 0, 0, 'L');
		$pdf->text(46, 82, 'Pembayaran '.$data->kategori_pembayaran.' Bidang Studi '.$data->nama_bidang_studi, 0, 0, 'L');
		$pdf->text(46, 87, ''.$data->nama_kategori_kelas.' a.n '.$data->nama_siswa, 0, 0, 'L');
		$pdf->text(46, 87, '', 0, 0, 'L');
		$pdf->SetFont('Arial','',15);
		$pdf->SetMargins(0.5,0.5,0.5,0.5);
		$pdf->text(15, 113, 'Rp', 0, 0, 'L');
		$pdf->text(25, 113, ''.nominal($data->nominal), 0, 0, 'L');
		$pdf->SetFont('Arial','',10);
		$pdf->SetMargins(0.5,0.5,0.5,0.5);
		$pdf->text(172, 111, ''.date('d-m-Y',strtotime($data->tanggal_pembayaran)), 0, 0, 'L');
		$pdf->Output();
	}

	public function download_kwitansi_nginden($id){

		$data  = $this->M_pembayaran->cetak_bukti($id);
		$pdf = new FPDF('L','mm',array(210,150));
		$pdf->AddPage();
		if($data->kategori_pembayaran == 'pelunasan'){
			$pdf->image('assets/kwitansi-lunas-nginden.jpg',0,0,210,148);
		} else {
			$pdf->image('assets/kwitansi-nginden.jpg',0,0,210,148);
		}
		
		$pdf->SetFont('Arial','',10);
		$pdf->SetMargins(0.5,0.5,0.5,0.5);
		$pdf->text(85, 13, 'a. Jl. Nginden Intan Timur 18/A3-10 Surabaya 60118, East Java - Indonesia.', 0, 0, 'L');
		$pdf->text(118, 18, 't. (031) 59173739, (031) 99020730 | m. 082131310210', 0, 0, 'L');
		$pdf->text(121, 23, 'e. care@creativemedia.id | w. www.creativemedia.id', 0, 0, 'L');
		$pdf->text(90, 38, 'No : '.$data->kode_pembayaran, 0, 0, 'L');
		$pdf->text(46, 46, ''.$data->nama_siswa, 0, 0, 'L');
		$pdf->text(46, 61, ''.terbilang($data->nominal).' Rupiah', 0, 0, 'L');
		$pdf->text(46, 82, 'Pembayaran '.$data->kategori_pembayaran.' Bidang Studi '.$data->nama_bidang_studi, 0, 0, 'L');
		$pdf->text(46, 87, ''.$data->nama_kategori_kelas.' a.n '.$data->nama_siswa, 0, 0, 'L');
		$pdf->text(46, 87, '', 0, 0, 'L');
		$pdf->SetFont('Arial','',15);
		$pdf->SetMargins(0.5,0.5,0.5,0.5);
		$pdf->text(15, 113, 'Rp', 0, 0, 'L');
		$pdf->text(25, 113, ''.nominal($data->nominal), 0, 0, 'L');
		$pdf->SetFont('Arial','',10);
		$pdf->SetMargins(0.5,0.5,0.5,0.5);
		$pdf->text(172, 111, ''.date('d-m-Y',strtotime($data->tanggal_pembayaran)), 0, 0, 'L');
		$pdf->Output();
	}
	
	public function print_kwitansi_tubanan($id){
		$data  = $this->M_pembayaran->cetak_bukti($id);
		$pdf = new FPDF('P','mm',array(210,297));
		$pdf->AddPage();
		$pdf->image('assets/kwitansi-tubanan-print.jpg',0,0,210,148);
		$pdf->SetFont('Arial','',10);
		$pdf->SetMargins(0.5,0.5,0.5,0.5);
		$pdf->text(88, 13, 'a. Jl. Tubanan Baru 10/Blok K-15 Surabaya 60188, East Java - Indonesia.', 0, 0, 'L');
		$pdf->text(120, 18, 't. (031) 7328540, (031) 99020730| m. 085733301090', 0, 0, 'L');
		$pdf->text(121, 23, 'e. care@creativemedia.id | w. www.creativemedia.id', 0, 0, 'L');
		$pdf->text(90, 38, 'No : '.$data->kode_pembayaran, 0, 0, 'L');
		$pdf->text(46, 46, ''.$data->nama_siswa, 0, 0, 'L');
		$pdf->text(46, 61, ''.terbilang($data->nominal).' Rupiah', 0, 0, 'L');
		if ($data->id_bidang_studi == 16) {
				$nama_studi = $datapendaftaran->keterangan.' [Custom]';
				$pdf->text(46, 82, 'Pembayaran '.$data->kategori_pembayaran.' Bidang Studi '.$data->keterangan. ' [Custom]', 0, 0, 'L');
		}else{
				$pdf->text(46, 82, 'Pembayaran '.$data->kategori_pembayaran.' Bidang Studi '.$data->nama_bidang_studi, 0, 0, 'L');
		}
		
		$pdf->text(46, 87, ''.$data->nama_kategori_kelas.' a.n '.$data->nama_siswa, 0, 0, 'L');
		$pdf->text(46, 87, '', 0, 0, 'L');
		$pdf->SetFont('Arial','',15);
		$pdf->SetMargins(0.5,0.5,0.5,0.5);
		$pdf->text(15, 113, 'Rp', 0, 0, 'L');
		$pdf->text(25, 113, ''.nominal($data->nominal), 0, 0, 'L');
		$pdf->SetFont('Arial','',10);
		$pdf->SetMargins(0.5,0.5,0.5,0.5);
		$pdf->text(172, 111, ''.date('d-m-Y',strtotime($data->tanggal_pembayaran)), 0, 0, 'L');
		$pdf->Output();
	}

	public function print_kwitansi_nginden($id){

		$data  = $this->M_pembayaran->cetak_bukti($id);
		$pdf = new FPDF('P','mm',array(210,297));
		$pdf->AddPage();
		$pdf->image('assets/kwitansi-nginden-print.jpg',0,0,210,148);
		
		$pdf->SetFont('Arial','',10);
		$pdf->SetMargins(0.5,0.5,0.5,0.5);
		$pdf->text(85, 13, 'a. Jl. Nginden Intan Timur 18/A3-10 Surabaya 60118, East Java - Indonesia.', 0, 0, 'L');
		$pdf->text(118, 18, 't. (031) 59173739, (031) 99020730 | m. 082131310210', 0, 0, 'L');
		$pdf->text(121, 23, 'e. care@creativemedia.id | w. www.creativemedia.id', 0, 0, 'L');
		$pdf->text(90, 38, 'No : '.$data->kode_pembayaran, 0, 0, 'L');
		$pdf->text(46, 46, ''.$data->nama_siswa, 0, 0, 'L');
		$pdf->text(46, 61, ''.terbilang($data->nominal).' Rupiah', 0, 0, 'L');
		if ($data->id_bidang_studi == 16) {
				$nama_studi = $datapendaftaran->keterangan.' [Custom]';
				$pdf->text(46, 82, 'Pembayaran '.$data->kategori_pembayaran.' Bidang Studi '.$data->keterangan. ' [Custom]', 0, 0, 'L');
		}else{
				$pdf->text(46, 82, 'Pembayaran '.$data->kategori_pembayaran.' Bidang Studi '.$data->nama_bidang_studi, 0, 0, 'L');
		}
		$pdf->text(46, 87, ''.$data->nama_kategori_kelas.' a.n '.$data->nama_siswa, 0, 0, 'L');
		$pdf->text(46, 87, '', 0, 0, 'L');
		$pdf->SetFont('Arial','',15);
		$pdf->SetMargins(0.5,0.5,0.5,0.5);
		$pdf->text(15, 113, 'Rp', 0, 0, 'L');
		$pdf->text(25, 113, ''.nominal($data->nominal), 0, 0, 'L');
		$pdf->SetFont('Arial','',10);
		$pdf->SetMargins(0.5,0.5,0.5,0.5);
		$pdf->text(172, 111, ''.date('d-m-Y',strtotime($data->tanggal_pembayaran)), 0, 0, 'L');
		$pdf->Output();
	}
	
	
}