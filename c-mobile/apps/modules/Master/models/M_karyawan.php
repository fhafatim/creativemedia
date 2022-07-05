<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan extends CI_Model {

	var $table = 'tbl_karyawan';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	
	public function cari_ajak_all($cari){
	$query = $this->db->query("select * from tbl_karyawan WHERE (nama_karyawan LIKE '%$cari%' OR bidang_studi LIKE '%$cari%')AND status_karyawan='aktif' ORDER BY id_karyawan ASC");
    return $query->result();
	}

	function get_data()
	{
		$sql = "SELECT * FROM tbl_karyawan";
		$data = $this->db->query($sql);
		return $data->result();
	}

	
	public function selek_status() {
		
		$sql = " select * from status_grup WHERE nama in ('Aktif','Belum Aktif')";
		//$sql = "SELECT * FROM tbl_login";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_by_id($id) {
		//$sql = "SELECT trainer.*, login.password FROM trainer, login WHERE trainer.nama=login.nama and id_trainer=$id";
		$sql = "SELECT * FROM tbl_karyawan WHERE id_karyawan = $id";
		$data = $this->db->query($sql);
		return $data->row();
	}

	function simpan_data($data){
		$result= $this->db->insert('tbl_karyawan',$data);
	    return $result;
	}
	
	public function update($data,$where) {
		$result= $this->db->update('tbl_karyawan',$data,$where);
	    return $result;
	}
	
	//HAPUS BERDASARKAN ID_karyawan
	public function hapus($id_karyawan) {
		$sql = "DELETE FROM tbl_karyawan WHERE id_karyawan='" .$id_karyawan ."'";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}
	
	
}