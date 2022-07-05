<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_studi extends CI_Model {

	var $table = 'tbl_bidang_studi';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	function get_data()
	{
		$data = $this->db->get('tbl_bidang_studi');
		return $data->result();
	}



	public function select_by_id($id) {
		$sql = "SELECT * FROM tbl_bidang_studi WHERE id_bidang_studi = '{$id}'";
		$data = $this->db->query($sql);
		return $data->row();
	}

	function simpan_data($data){
		$result= $this->db->insert('tbl_bidang_studi',$data);
	    return $result;
	}
	
	public function update($data,$where) {
		$result= $this->db->update('tbl_bidang_studi',$data,$where);
	    return $result;
	}
	

	public function hapus($id) {
		$sql = "DELETE FROM tbl_bidang_studi WHERE id_bidang_studi='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	
	
}
