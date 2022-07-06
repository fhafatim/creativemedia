<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_inventaris');
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
		$data['page'] 		= "Data Barang";
		$data['judul'] 		= "Data Barang";
		
		$this->loadkonten('v_inventaris/home',$data);
	}

	public function ajax_list()
	{
		$list = $this->M_inventaris->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $master) {
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $master->kode_barang;
			$row[] = $master->nama_barang;
			$row[] = $master->kategori_barang;
			//add html for action
			$row[] =  anchor('edit-inventaris/'.$master->id_barang, ' <span class="fa fa-edit"></span> ',' class="btn btn-sm btn-primary ajaxify klik " ').' '.
			'<button class="btn btn-sm btn-danger hapus-barang data-toggle="tooltip" data-placement="top" title="Hapus"" id_barang="id_barang"  data-id='." '".$master->id_barang."' ".'><i class="glyphicon glyphicon-trash"></i></button>';
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
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('add','daftar');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Barang";
			$data['judul'] 		= "Data Barang";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
		$data['page'] 				= "Data Barang";
		$data['judul'] 				= "Data Barang";	
		$this->loadkonten('v_inventaris/tambah',$data);
      }
	
	}

	public function prosesTambahBarang() {
		
				$data = array(
					'kode_barang'		=> $this->input->post('kode_barang'),
					'nama_barang'		=> $this->input->post('nama_barang'),
					'kategori_barang' 	=> $this->input->post('kategori_barang'),
					'created_date' 		=> date('Y-m-d H:i:s'),
					'updated_date' 		=> date('Y-m-d H:i:s')
				);
				$result = $this->db->insert('tbl_barang',$data);

				if ($result > 0) {
					$out['status'] = 'berhasil';
				} else {
					$out['status'] = 'gagal';
				}

		echo json_encode($out);
	}

    public function edit($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('add','daftar');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Barang";
			$data['judul'] 		= "Data Barang";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
		$data['page'] 				= "Data Barang";
		$data['judul'] 				= "Data Barang";  
        $data['datamaster'] = $id;	
		$data['inventaris'] = $this->M_inventaris->selek_barang($id);
		$this->loadkonten('v_inventaris/update',$data);
      }
	
	}

	public function prosesUpdateBarang() {
		
		$data = array(
			'kode_barang'		=> $this->input->post('kode_barang'),
			'nama_barang'		=> $this->input->post('nama_barang'),
			'kategori_barang' 	=> $this->input->post('kategori_barang'),
			'updated_date' 		=> date('Y-m-d H:i:s')
		);

		$where = array(
			'id_barang'		=> $this->input->post('id_barang')
		);

		$result = $this->db->update('tbl_barang',$data,$where);

		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}

		echo json_encode($out);
	}

	public function hapus_barang(){
		
		$id_barang = $this->input->post('id_barang');

		$barang_query = $this->db->query("DELETE FROM tbl_barang WHERE id_barang = '$id_barang'");

		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
		echo json_encode($out);
	}

	public function jumlah()
	{
		$data['userdata'] 	= $this->userdata; 
		$data['page'] 		= "Data Barang";
		$data['judul'] 		= "Data Barang";
		
		$this->loadkonten('v_inventaris/jumlah',$data);
	}

	public function ajax_jumlah()
	{
		$list = $this->M_inventaris->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $master) {

			$masuk_tubanan = $this->db->query("SELECT SUM(jumlah) as jumlah_masuk FROM tbl_barang_masuk WHERE lokasi = 'tubanan' AND id_barang = '$master->id_barang'");
			$data_masuk_tubanan = $masuk_tubanan->row();

			$keluar_tubanan = $this->db->query("SELECT SUM(jumlah) as jumlah_keluar FROM tbl_barang_keluar WHERE lokasi = 'tubanan' AND id_barang = '$master->id_barang'");
			$data_keluar_tubanan = $keluar_tubanan->row();

			$total_tubanan = $data_masuk_tubanan->jumlah_masuk - $data_keluar_tubanan->jumlah_keluar;

			$masuk_nginden = $this->db->query("SELECT SUM(jumlah) as jumlah_masuk FROM tbl_barang_masuk WHERE lokasi = 'nginden' AND id_barang = '$master->id_barang'");
			$data_masuk_nginden = $masuk_nginden->row();

			$keluar_nginden = $this->db->query("SELECT SUM(jumlah) as jumlah_keluar FROM tbl_barang_keluar WHERE lokasi = 'nginden' AND id_barang = '$master->id_barang'");
			$data_keluar_nginden = $keluar_nginden->row();

			$total_nginden = $data_masuk_nginden->jumlah_masuk - $data_keluar_nginden->jumlah_keluar;

			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $master->kode_barang;
			$row[] = $master->nama_barang;
			$row[] = $total_tubanan;
			$row[] = $total_nginden;
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