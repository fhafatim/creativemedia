<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_fasilitas extends CI_Model {

	var $table = 'fasilitas';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

function get_data() {
        $this->db->from('fasilitas');
        $this->db->order_by('id_fasilitas',desc);
        $data = $this->db->get();
        return $data->result();
    }
	function selek_tipe()
	{
		$data = $this->db->get('fasilitas_tipe');
		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM fasilitas WHERE id_fasilitas = '{$id}'";
		$data = $this->db->query($sql);
		return $data->row();
	}

	function simpan_data($data){
		$result= $this->db->insert('fasilitas',$data);
	    return $result;
	}
	
	public function update($data,$where) {
		$result= $this->db->update('fasilitas',$data,$where);
	    return $result;
	}
	

	public function hapus($id) {
		$sql = "DELETE FROM fasilitas WHERE id_fasilitas='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	
	
}
