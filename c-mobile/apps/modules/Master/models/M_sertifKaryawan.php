<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sertifKaryawan extends CI_Model {

	var $table = 'tbl_sertifikat_karyawan';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    function get_data($id)
	{
		//$sql = "SELECT tbl_jadwal.id_jadwal, tbl_jadwal.id_kelas AS id_kelas_jadwal, tbl_kelas.id_kelas, tbl_kelas.id_siswa FROM tbl_jadwal JOIN tbl_kelas ON tbl_jadwal.id_kelas = tbl_kelas.id_kelas WHERE tbl_jadwal.id_kelas = tbl_kelas.id_kelas";
		
		$sql = "SELECT * FROM tbl_sertifikat_karyawan WHERE id_karyawan = '$id'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT a.*, b.* FROM tbl_karyawan a JOIN tbl_sertifikat_karyawan b ON a.id_karyawan=b.id_karyawan WHERE a.id_karyawan='{$id}'";
		$data = $this->db->query($sql);
		return $data->row();
	}

	function simpan_data($data){
		$result= $this->db->insert('tbl_sertifikat_karyawan',$data);
	    return $result;
	}

	public function update_jadwal($data,$where) {
		$result= $this->db->update('tbl_sertifikat_karyawan',$data,$where);
	    return $result;
	}

	public function hapus($id_sertifikat) {
		$sql = "DELETE FROM  tbl_sertifikat_karyawan WHERE id_sertifikat='".$id_sertifikat ."' ";
		$this->db->query($sql);

		return $this->db->affected_rows();
	}
}