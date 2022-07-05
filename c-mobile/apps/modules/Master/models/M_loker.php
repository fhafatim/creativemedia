<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_loker extends CI_Model {

	var $table = 'loker';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_data()
	{
		$data = $this->db->get('loker');
		return $data->result();
	}
	
	public function selek_status() {
		
		$sql = " select * from status_grup WHERE nama in ('Hidden','Publish')";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM loker WHERE id_loker = '{$id}'";
		$data = $this->db->query($sql);
		return $data->row();
	}

	function simpan_data($data){
		$result= $this->db->insert('loker',$data);
	    return $result;
	}
	
	public function update($data,$where) {
		$result= $this->db->update('loker',$data,$where);
	    return $result;
	}
	

	public function hapus($id) {
		$sql = "DELETE FROM loker WHERE id_loker='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	
	
}
