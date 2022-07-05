<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_galeri extends CI_Model {

	var $table = 'gallery';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_data()
	{
		$this->db->from('gallery');
        $this->db->order_by('id_gallery',desc);
        $data = $this->db->get();
        return $data->result();
	}
	
	function selek_tipe()
	{
		$data = $this->db->get('gallery');
		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM gallery WHERE id_gallery = '{$id}'";
		$data = $this->db->query($sql);
		return $data->row();
	}

	function simpan_data($data){
		$result= $this->db->insert('gallery',$data);
	    return $result;
	}
	
	public function update($data,$where) {
		$result= $this->db->update('gallery',$data,$where);
	    return $result;
	}
	

	public function hapus($id) {
		$sql = "DELETE FROM gallery WHERE id_gallery='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	
	
}
