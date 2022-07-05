<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_JadwalKelas extends CI_Model {

	var $table = 'tbl_jadwal';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    function get_data($id)
	{
		//$sql = "SELECT tbl_jadwal.id_jadwal, tbl_jadwal.id_kelas AS id_kelas_jadwal, tbl_kelas.id_kelas, tbl_kelas.id_siswa FROM tbl_jadwal JOIN tbl_kelas ON tbl_jadwal.id_kelas = tbl_kelas.id_kelas WHERE tbl_jadwal.id_kelas = tbl_kelas.id_kelas";
		
		$sql = "SELECT * FROM tbl_jadwal WHERE id_kelas = '$id'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function get_data_detail($id)
	{
		$sql = "SELECT * FROM tbl_detail_jadwal WHERE id_kelas = '$id'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_by_id($id_kelas) {
		$this->db->select('*');
        $this->db->from('jadwal');
        $this->db->where('id_kelas', $id_kelas);
        $this->db->order_by('id_kelas', 'desc');
        $query = $this->db->get();
		return $data->result();
	}

	function simpan_data($data){
		$result= $this->db->insert('tbl_jadwal',$data);
	    return $result;
	}

	public function simpan_detail_jadwal($data)
	{
		$result = $this->db->insert('tbl_detail_jadwal', $data);
		return $result;
	}

	public function update_jadwal($data,$where) {
		$result= $this->db->update('tbl_jadwal',$data,$where);
	    return $result;
	}

	public function hapus($id_jadwal) {
		$sql = "DELETE FROM  tbl_jadwal WHERE id_jadwal='".$id_jadwal ."' ";
		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	
	public function hapus_detail($id_detail_jadwal) {
		$sql = "DELETE FROM  tbl_detail_jadwal WHERE id_detail_jadwal='".$id_detail_jadwal ."' ";
		$this->db->query($sql);

		return $this->db->affected_rows();
	}
}