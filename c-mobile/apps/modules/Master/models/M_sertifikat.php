<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sertifikat extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function get_data()
	{		
		$sql = "SELECT * FROM tbl_list_sertifikat";
		$data = $this->db->query($sql);
		return $data->result();
	}

    function get_kelas_selesai()
	{		
		$sql = "SELECT * FROM tbl_kelas a, tbl_siswa b, tbl_bidang_studi c, tbl_pendaftaran d WHERE a.id_pendaftaran = d.id_pendaftaran AND d.id_siswa = b.id_siswa AND d.id_bidang_studi = c.id_bidang_studi AND a.status_kelas = 'selesai' AND NOT EXISTS(select * from tbl_list_sertifikat d where a.id_kelas = d.id_kelas)";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	
	public function select_by_id($id) {
		
		$sql = "SELECT * FROM tbl_list_sertifikat WHERE id_list_sertifikat = '$id'";
		
		$data = $this->db->query($sql);
		return $data->row();
	}

	public function update($data,$where)
    { 
		$result= $this->db->update('tbl_list_sertifikat',$data,$where);
		return $result;
    
    }
	
	public function hapus($id_list_sertifikat) {
		$sql = "DELETE FROM tbl_list_sertifikat WHERE id_list_sertifikat='$id_list_sertifikat'";

		$this->db->query($sql);
		return $this->db->affected_rows();
	}
	
	
}