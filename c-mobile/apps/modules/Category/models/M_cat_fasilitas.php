<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cat_fasilitas extends CI_Model {

	var $table = 'fasilitas_tipe';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_data()
	{
		$data = $this->db->get('fasilitas_tipe');
		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM fasilitas_tipe WHERE id_tipe = '{$id}'";
		$data = $this->db->query($sql);
		return $data->row();
	}

	function simpan_data($data){
		$result= $this->db->insert('fasilitas_tipe',$data);
	    return $result;
	}
	
	public function update($data,$where) {
		$result= $this->db->update('fasilitas_tipe',$data,$where);
	    return $result;
	}
	

	public function hapus($id) {
		$sql = "DELETE FROM fasilitas_tipe WHERE id_tipe='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	
	
}
