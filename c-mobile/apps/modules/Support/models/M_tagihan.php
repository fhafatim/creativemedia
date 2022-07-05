<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tagihan extends CI_Model 
{
	public function export_data($tanggal_awal,$tanggal_akhir,$kat) {
	
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
	
	public function selek_status() {
		
		$sql = " select * from status_grup WHERE nama in ('Aktif','Selesai')";
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
	     $query = $this->db->query("select * from tbl_pendaftaran a, tbl_siswa b, tbl_bidang_studi c, tbl_invoice d WHERE a.id_siswa = b.id_siswa AND a.id_bidang_studi = c.id_bidang_studi AND a.id_pendaftaran = d.id_pendaftaran AND a.tanggal_pendaftaran BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        if ($query->num_rows() > 0) {
           return $query->result();
        }
	}
	
	
	
	 
	
	
	
	
	
	
}

