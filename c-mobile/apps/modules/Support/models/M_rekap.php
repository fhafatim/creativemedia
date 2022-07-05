<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rekap extends CI_Model 
{
	public function export_data($tanggal_awal,$tanggal_akhir,$id_bidang_studi,$id_level_kelas,$tempat_daftar) {
	    
	    $query = "select * from tbl_pendaftaran a, tbl_siswa b, tbl_bidang_studi c, tbl_level_kelas d WHERE a.id_siswa = b.id_siswa AND a.id_bidang_studi = c.id_bidang_studi AND a.id_level_kelas = d.id_level_kelas AND a.status_pendaftaran = 'selesai'";
	    
	    if($id_bidang_studi != ""){
	         $query .= " AND a.id_bidang_studi = '$id_bidang_studi'";
	     }
	     
	     if($id_level_kelas != ""){
	         $query .= " AND a.id_level_kelas = '$id_level_kelas'";
	     }
	     
	     if($tempat_daftar != ""){
	         $query .= " AND a.tempat_daftar = '$tempat_daftar'";
	     }
	
		if($tanggal_awal == ""){
			 $tanggal_awal = "2015-01-01";
		 }
		 
		 if($tanggal_akhir == ""){
			 $tanggal_akhir = "2100-01-01";
		 }
		 
	     $query .= " AND a.tanggal_pendaftaran BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
	     
	     
	     $data = $this->db->query($query);
        if ($data->num_rows() > 0) {
           return $data->result();
        }
	}
	
	public function selek_status() {
		
		$sql = " select * from status_grup WHERE nama in ('Aktif','Selesai')";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	function selek_studi()
	{
		$data = $this->db->get('tbl_bidang_studi');
		return $data->result();
	}
	
	public function selek_level() {
		
		$sql = " select * from tbl_level_kelas";
		$data = $this->db->query($sql);
		return $data->result();
	} 
	
	public function export_data2($tanggal_awal,$tanggal_akhir) {
		 if($tanggal_awal == ""){
			 $tanggal_awal = "2015-01-01";
		 }
		 
		 if($tanggal_akhir == ""){
			 $tanggal_akhir = "2100-01-01";
		 }
	     $query = $this->db->query("select * from tbl_pendaftaran a, tbl_siswa b, tbl_bidang_studi c WHERE a.id_siswa = b.id_siswa AND a.id_bidang_studi = c.id_bidang_studi AND a.tanggal_pendaftaran BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        if ($query->num_rows() > 0) {
           return $query->result();
        }
	}
	
	
	
	 
	
	
	
	
	
	
}

