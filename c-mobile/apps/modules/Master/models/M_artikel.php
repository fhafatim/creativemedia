<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_artikel extends CI_Model {

	var $table = 'artikel';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_data()
	{
		$this->db->from('artikel');
        $this->db->order_by('id_artikel',desc);
        $data = $this->db->get();
        return $data->result();
	}
	
	public function selek_status() {
		
		$sql = " select * from status_grup WHERE nama in ('Hidden','Publish')";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM artikel WHERE id_artikel = '{$id}'";
		$data = $this->db->query($sql);
		return $data->row();
	}

	function simpan_data($data){
		$result= $this->db->insert('artikel',$data);
	    return $result;
	}
	
	public function update($data,$where) {
		$result= $this->db->update('artikel',$data,$where);
	    return $result;
	}
	

	public function hapus($id) {
		$sql = "DELETE FROM artikel WHERE id_artikel='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	
	
}
