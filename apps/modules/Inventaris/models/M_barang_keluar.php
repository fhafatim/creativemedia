<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang_keluar extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    function get_data()
	{
		$sql = "SELECT * FROM tbl_barang_keluar a, tbl_barang b WHERE a.id_barang = b.id_barang ORDER BY a.tanggal DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	function get_barang()
	{
		$sql = "SELECT * FROM tbl_barang";

		$data = $this->db->query($sql);
		return $data->result();
	}

	function selek_barang($id)
	{
		$sql = "SELECT * FROM tbl_barang_keluar WHERE id_barang_keluar = '$id'";

		$data = $this->db->query($sql);
		return $data->row();
	}
	
}