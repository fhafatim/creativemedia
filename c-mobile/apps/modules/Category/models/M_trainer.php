<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_trainer extends CI_Model {

	var $table = 'trainer';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	
	public function cari_ajak_all($cari){
	$query = $this->db->query("select * from tbl_tentor WHERE (nama_tentor LIKE '%$cari%' OR bidang_studi LIKE '%$cari%')AND status_tentor='aktif' ORDER BY id_tentor ASC");
	//$query = $this->db->query("select a.nama_tentor, a.id_bidang_studi, b.nama_bidang_studi from tbl_tentor a JOIN tbl_bidang_studi b ON a.id_bidang_studi = b.id_bidang_studi WHERE (nama_tentor LIKE '%$cari%' OR a.id_bidang_studi='%$cari%')AND status_tentor='aktif' ORDER BY id_tentor ASC");
    return $query->result();
	}

	function get_data()
	{
		//$sql = "SELECT a.*, b.nama_bidang_studi FROM tbl_tentor a JOIN tbl_bidang_studi b ON a.id_bidang_studi = b.id_bidang_studi";
		$sql = "SELECT * FROM tbl_tentor";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	function selek_studi()
	{
		$data = $this->db->get('tbl_bidang_studi');
		return $data->result();
	}
	
	
	public function selek_status() {
		
		$sql = " select * from status_grup WHERE nama in ('Aktif','Belum Aktif')";
		//$sql = "SELECT * FROM tbl_login";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function selek_ajar() {
		
		$sql = " select * from status_grup WHERE nama in ('Penuh','Kosong')";
		$data = $this->db->query($sql);
		return $data->result();
	}



	public function select_by_id($id) {
		//$sql = "SELECT trainer.*, login.password FROM trainer, login WHERE trainer.nama=login.nama and id_trainer=$id";
		//$sql = "SELECT tbl_tentor.*, tbl_login.* FROM tbl_tentor JOIN tbl_login ON tbl_tentor.id_login = tbl_login.id_login WHERE tbl_tentor.id_tentor = $id";
		$sql = "SELECT * from tbl_tentor where id_tentor = {$id}";
		$data = $this->db->query($sql);
		return $data->row();
	}
	
	public function select_login_by_id($id) {
		
		$sql = "SELECT * FROM tbl_login WHERE id_login = '{$id}'";
		
		$data = $this->db->query($sql);
		return $data->row();
	}

	function simpan_data($data){
		$result= $this->db->insert('tbl_tentor',$data);
	    return $result;
	}
	
	public function simpanLogin($data2){
		$query = $this->db->insert('tbl_login', $data2);
		return $query;
	}
	
	public function update($data,$where) {
		$result= $this->db->update('tbl_tentor',$data,$where);
	    return $result;
	}
	public function updateLogin($data2,$where2) {
		$result= $this->db->update('tbl_login',$data2,$where2);
	    return $result;
	}
	
	//HAPUS BERDASARKAN ID_TENTOR
	// public function hapus($id_tentor) {
	// 	//$sql = "DELETE FROM tbl_tentor WHERE id_tentor='" .$id_tentor ."'";
	// 	$sql = "DELETE a.*, b.* FROM tbl_tentor a JOIN tbl_login b ON a.id_login = b.id_login WHERE a.id_login='".$id_tentor."' ";
	// 	$this->db->query($sql);

	// 	return $this->db->affected_rows();
	// }
	
	//HAPUS BERDASARKAN ID_LOGIN
	public function hapus($id_login) {
		//$sql = "DELETE FROM tbl_tentor WHERE id_tentor='" .$id_tentor ."'";
		$sql = "DELETE a.*, b.* FROM tbl_tentor a JOIN tbl_login b ON a.id_login = b.id_login WHERE a.id_login='".$id_login."' AND b.id_login = '".$id_login."'";
		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	
	function get_kelas($id)
	{
		$sql = "SELECT * FROM tbl_kelas a, tbl_siswa b, tbl_pendaftaran c, tbl_bidang_studi d, tbl_level_kelas e, tbl_tentor f WHERE a.id_siswa = b.id_siswa AND a.id_pendaftaran = c.id_pendaftaran AND c.id_bidang_studi = d.id_bidang_studi AND c.id_level_kelas = e.id_level_kelas AND a.id_tentor = f.id_tentor AND a.id_tentor = '$id'";

		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function kursus_aktif($id) {
		
		$data = $this->db
		->where('status_kelas=', 'berjalan')
		->where('id_tentor=', $id)
		->get('tbl_kelas');
		return $data->num_rows();
	}
	
	public function kursus_selesai($id) {
		
		$data = $this->db
		->where('status_kelas=', 'selesai')
		->where('id_tentor=', $id)
		->get('tbl_kelas');
		return $data->num_rows();
	}
	
	
}
