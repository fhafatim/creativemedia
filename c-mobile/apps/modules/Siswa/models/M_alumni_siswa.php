<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_alumni_siswa extends CI_Model {



	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	

	public function selek_status() {
		
		$sql = " select * from status_grup WHERE nama in ('Aktif','Belum Aktif','Selesai')";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function selek_kelamin() {
		
		$sql = " select * from status_grup WHERE nama in ('laki-laki','perempuan')";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function selek_kursus() {
		
		$sql = " select * from status_grup WHERE nama in ('Privat Class','Home Privat Class')";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function selek_bayar() {
		
		$sql = " select * from status_grup WHERE nama in ('Lunas','Belum Lunas')";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	function selek_studi()
	{
		$data = $this->db->get('bidang_studi');
		return $data->result();
	}

	function get_data()
	{
		$sql = " select * from tbl_kelas a, tbl_siswa b, tbl_pendaftaran c, tbl_bidang_studi d, tbl_tentor e WHERE a.id_siswa = b.id_siswa AND a.id_pendaftaran = c.id_pendaftaran AND c.id_bidang_studi = d.id_bidang_studi AND a.id_tentor = e.id_tentor AND a.status_kelas='selesai' ";
		$data = $this->db->query($sql);
		return $data->result();
	}
	


	public function select_by_id($id) {
		$sql = "SELECT siswa.*, login.password FROM siswa, login WHERE siswa.nama=login.nama and id_siswa=$id";
		$data = $this->db->query($sql);
		return $data->row();
	}
	
	
	

	public function hapus($id) {
		$sql = "DELETE FROM pendaftaran WHERE id_registrasi='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	
	
	
}
