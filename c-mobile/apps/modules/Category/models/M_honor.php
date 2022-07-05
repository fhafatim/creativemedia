<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_honor extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function get_data()
	{		
	    
		$nama = $this->session->userdata('nama');
		if(preg_match("/Nginden/i", $nama)) {
		
		    $sql = "SELECT * FROM tbl_honor WHERE tempat_pembayaran = 'nginden'";
		
		} else if(preg_match("/Tubanan/i", $nama)) {
		    
		    $sql = "SELECT * FROM tbl_honor WHERE tempat_pembayaran = 'tubanan'";
		    
		} else {
		    
		    $sql = "SELECT * FROM tbl_honor";
		    
		}
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	function get_kursus()
	{		
	    $nama = $this->session->userdata('nama');
		if(preg_match("/Nginden/i", $nama)) {
		    
		    $sql = "SELECT * FROM tbl_kelas a, tbl_siswa b, tbl_tentor c, tbl_pendaftaran d WHERE a.id_siswa = b.id_siswa AND a.id_tentor = c.id_tentor AND a.id_pendaftaran = d.id_pendaftaran AND a.status_honor = 'pending' AND d.tempat_daftar = 'nginden'";
		    
		} else if(preg_match("/Tubanan/i", $nama)) {
		    
		    $sql = "SELECT * FROM tbl_kelas a, tbl_siswa b, tbl_tentor c, tbl_pendaftaran d WHERE a.id_siswa = b.id_siswa AND a.id_tentor = c.id_tentor AND a.id_pendaftaran = d.id_pendaftaran AND a.status_honor = 'pending' AND d.tempat_daftar = 'tubanan'";
		    
		} else {
		    
		    $sql = "SELECT * FROM tbl_kelas a, tbl_siswa b, tbl_tentor c, tbl_pendaftaran d WHERE a.id_siswa = b.id_siswa AND a.id_tentor = c.id_tentor AND a.id_pendaftaran = d.id_pendaftaran AND a.status_honor = 'pending'";
		}
		    
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	function get_kursus_all()
	{		
		$sql = "SELECT * FROM tbl_kelas a, tbl_siswa b, tbl_tentor c, tbl_pendaftaran d WHERE a.id_siswa = b.id_siswa AND a.id_tentor = c.id_tentor AND a.id_pendaftaran = d.id_pendaftaran";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	function get_bank()
	{		
		$sql = "SELECT * FROM tbl_bank";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function hapus($id_honor) {
		$sql = "DELETE FROM tbl_honor WHERE id_honor='$id_honor'";

		$this->db->query($sql);
		return $this->db->affected_rows();
	}
	
	public function select_by_id($id) {
		
		$sql = "SELECT * FROM tbl_honor WHERE id_honor = '$id'";
		
		$data = $this->db->query($sql);
		return $data->row();
	}
	
	public function update($data,$where)
    { 
		$result= $this->db->update('tbl_honor',$data,$where);
		return $result;
    
    }
}
