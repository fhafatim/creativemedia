<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_inventaris extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    function get_data()
	{
		$sql = "SELECT * FROM tbl_barang ORDER BY id_barang DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	function selek_barang($id)
	{
		$sql = "SELECT * FROM tbl_barang WHERE id_barang = '$id'";

		$data = $this->db->query($sql);
		return $data->row();
	}
	
}