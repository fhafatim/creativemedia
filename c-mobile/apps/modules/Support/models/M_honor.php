<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_honor extends CI_Model 
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
	
	public function get_tentor() {
		
		$sql = " select * from tbl_tentor";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function export_data2($id_tentor,$status_honor) {
		
		 if($status_honor == ""){
			 $status_honor = "pending";
		 }
		
		 if($id_tentor == ""){
			 $id_tentor = "all";
			 
		 } 
		
		if($id_tentor == "all"){
			$query = $this->db->query("select * from tbl_kelas a, tbl_tentor b, tbl_siswa c, tbl_pendaftaran d, tbl_bidang_studi e WHERE a.id_tentor = b.id_tentor AND a.id_siswa = c.id_siswa AND a.id_pendaftaran = d.id_pendaftaran AND d.id_bidang_studi = e.id_bidang_studi AND a.status_honor = '$status_honor'");
		} else {
			$query = $this->db->query("select * from tbl_kelas a, tbl_tentor b, tbl_siswa c, tbl_pendaftaran d, tbl_bidang_studi e WHERE a.id_tentor = b.id_tentor AND a.id_siswa = c.id_siswa AND a.id_pendaftaran = d.id_pendaftaran AND d.id_bidang_studi = e.id_bidang_studi AND a.id_tentor = '$id_tentor' AND a.status_honor = '$status_honor'");
		}

	     
        if ($query->num_rows() > 0) {
           return $query->result();
        }
	}
	
	
	
	 
	
	
	
	
	
	
}

