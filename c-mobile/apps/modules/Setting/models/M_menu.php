<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_menu extends CI_Model 
{
	public function get_datatables() {
		$data = $this->db->get('tbl_menu');
		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM tbl_menu WHERE id_menu = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
	
	public function pilih_menu() {
		
		$sql = " select * from tbl_menu WHERE menu_file in ('view')";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	
	function simpan_data($data){
		$result= $this->db->insert('tbl_menu',$data);
	    return $result;
	}
	

	public function update($data,$where) {
		$result= $this->db->update('tbl_menu',$data,$where);
	    return $result;
	}

	public function hapus($id) {
		$sql = "DELETE FROM tbl_menu WHERE id_menu ='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	
	public function cari_ajak($cari){
	$where = "menu_file='view'";	
    $this->db->select('*');
    $this->db->from('tbl_menu');
    $this->db->like('nama_menu', $cari);
	$this->db->where($where);
    return $this->db->get()->result_array();
	}
	


}

