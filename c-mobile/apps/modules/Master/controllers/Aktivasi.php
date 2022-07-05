<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aktivasi extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_daftar');
		$this->load->model('M_sidebar');
	}
	
	public function index($id)
	{
		$data2 = array(
			'status_login' => 'aktif'
		);
		
		$id;
		
		$where = array(
			'id_login' => $id
		);
		
		$result = $this->M_daftar->update_aktivasi($data2,$where);
		if ($result > 0) {
			redirect('http://creativemedia.id/');
		} else {
			echo 'Gagal Aktivasi';
		}
	}
}