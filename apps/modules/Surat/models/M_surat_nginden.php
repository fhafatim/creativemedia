<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_surat_nginden extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_data()
	{
		$sql = "SELECT * FROM tbl_surat_nginden ORDER BY nomor_surat DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	function get_data_export($limit)
	{
		$sql = "SELECT * FROM tbl_surat_nginden ORDER BY nomor_surat ASC LIMIT $limit";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	function get_nomor()
	{
		$tahun_sekarang = date('Y');
		$sql = $this->db->query("SELECT MAX(tahun) as tahun FROM tbl_surat_nginden");
		$LAST_YEAR = $sql->row();

		if ($tahun_sekarang != $LAST_YEAR->tahun) {
			$NEW_NO = 1;
		} else {
			$sql = $this->db->query("SELECT MAX(nomor_surat) as nomor FROM tbl_surat_nginden");
			$LAST_NO = $sql->row();
			$NEW_NO = $LAST_NO->nomor + 1;
		}

		return $NEW_NO;
	}

	function selek_surat($id)
	{
		$sql = "SELECT * FROM tbl_surat_nginden WHERE id_surat = '$id'";

		$data = $this->db->query($sql);
		return $data->row();
	}

	function get_surat_nginden($id)
	{
		$sql = "SELECT * FROM tbl_surat_nginden WHERE id_surat = '$id'";

		$data = $this->db->query($sql);
		return $data->row();
	}
}
