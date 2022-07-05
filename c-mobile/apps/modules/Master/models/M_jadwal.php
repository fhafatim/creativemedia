<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwal extends CI_Model {

	var $table = 'jadwal';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_data()
	{
		$nama = $this->session->userdata('nama');
		if(preg_match("/Nginden/i", $nama)) {
		    
		    $sql = "SELECT tbl_kelas.*, tbl_siswa.*,
				tbl_pendaftaran.*, tbl_bidang_studi.*,
				tbl_tentor.*
				FROM tbl_kelas 
				JOIN tbl_pendaftaran ON tbl_kelas.id_pendaftaran = tbl_pendaftaran.id_pendaftaran
				JOIN tbl_siswa ON tbl_kelas.id_siswa = tbl_siswa.id_siswa
				JOIN tbl_bidang_studi ON tbl_pendaftaran.id_bidang_studi = tbl_bidang_studi.id_bidang_studi
				JOIN tbl_tentor ON tbl_kelas.id_tentor = tbl_tentor.id_tentor
				WHERE tbl_kelas.status_kelas='berjalan' AND tbl_pendaftaran.tempat_daftar = 'nginden'";
				
		} else if(preg_match("/Tubanan/i", $nama)) {
		    
		    $sql = "SELECT tbl_kelas.*, tbl_siswa.*,
				tbl_pendaftaran.*, tbl_bidang_studi.*,
				tbl_tentor.*
				FROM tbl_kelas 
				JOIN tbl_pendaftaran ON tbl_kelas.id_pendaftaran = tbl_pendaftaran.id_pendaftaran
				JOIN tbl_siswa ON tbl_kelas.id_siswa = tbl_siswa.id_siswa
				JOIN tbl_bidang_studi ON tbl_pendaftaran.id_bidang_studi = tbl_bidang_studi.id_bidang_studi
				JOIN tbl_tentor ON tbl_kelas.id_tentor = tbl_tentor.id_tentor
				WHERE tbl_kelas.status_kelas='berjalan' AND tbl_pendaftaran.tempat_daftar = 'tubanan'";
		    
		} else {
		    
		    $sql = "SELECT tbl_kelas.*, tbl_siswa.*,
				tbl_pendaftaran.*, tbl_bidang_studi.*,
				tbl_tentor.*
				FROM tbl_kelas 
				JOIN tbl_pendaftaran ON tbl_kelas.id_pendaftaran = tbl_pendaftaran.id_pendaftaran
				JOIN tbl_siswa ON tbl_kelas.id_siswa = tbl_siswa.id_siswa
				JOIN tbl_bidang_studi ON tbl_pendaftaran.id_bidang_studi = tbl_bidang_studi.id_bidang_studi
				JOIN tbl_tentor ON tbl_kelas.id_tentor = tbl_tentor.id_tentor
				WHERE tbl_kelas.status_kelas='berjalan'";
		    
		}
		
		
		
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	function get_data2()
	{
		$sql = "SELECT tbl_kelas.*, tbl_siswa.*,
				tbl_pendaftaran.*, tbl_bidang_studi.*,
				tbl_tentor.*
				FROM tbl_kelas 
				JOIN tbl_pendaftaran ON tbl_kelas.id_pendaftaran = tbl_pendaftaran.id_pendaftaran
				JOIN tbl_siswa ON tbl_kelas.id_siswa = tbl_siswa.id_siswa
				JOIN tbl_bidang_studi ON tbl_pendaftaran.id_bidang_studi = tbl_bidang_studi.id_bidang_studi
				JOIN tbl_tentor ON tbl_kelas.id_tentor = tbl_tentor.id_tentor
				WHERE tbl_kelas.status_kelas='selesai'";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	function selek_hari()
	{
		$data = $this->db->get('hari');
		return $data->result();
	}
	
	function selek_jam()
	{
		$data = $this->db->get('jam');
		return $data->result();
	}
	
	function selek_studi()
	{
		$data = $this->db->get('tbl_bidang_studi');
		return $data->result();
	}
	
	function selek_trainer()
	{
		$data = $this->db->get('tbl_tentor');
		return $data->result();
	}
	
    function selek_siswa()
	{
	    
	    $nama = $this->session->userdata('nama');
		if(preg_match("/Nginden/i", $nama)) {
		    
		    $sql = " SELECT DISTINCT a.id_pendaftaran, a.no_pendaftaran, a.id_siswa, b.nama_siswa FROM tbl_pendaftaran a JOIN tbl_siswa b ON a.id_siswa = b.id_siswa WHERE a.status_pendaftaran='selesai' AND a.tempat_daftar = 'nginden' AND NOT EXISTS(select * from tbl_kelas c where a.id_pendaftaran = c.id_pendaftaran) order by id_pendaftaran DESC";
		    
		} else if(preg_match("/Tubanan/i", $nama)) {
		    
		    $sql = " SELECT DISTINCT a.id_pendaftaran, a.no_pendaftaran, a.id_siswa, b.nama_siswa FROM tbl_pendaftaran a JOIN tbl_siswa b ON a.id_siswa = b.id_siswa WHERE a.status_pendaftaran='selesai' AND a.tempat_daftar = 'tubanan' AND NOT EXISTS(select * from tbl_kelas c where a.id_pendaftaran = c.id_pendaftaran) order by id_pendaftaran DESC";
		    
		} else {
		    
		    $sql = " SELECT DISTINCT a.id_pendaftaran, a.no_pendaftaran, a.id_siswa, b.nama_siswa FROM tbl_pendaftaran a JOIN tbl_siswa b ON a.id_siswa = b.id_siswa WHERE status_pendaftaran='selesai' AND NOT EXISTS(select * from tbl_kelas c where a.id_pendaftaran = c.id_pendaftaran) order by id_pendaftaran DESC";
		}
		
		$data = $this->db->query($sql);
		return $data->result();
	}

	function selek_siswa2()
	{
		$sql = " SELECT DISTINCT nama from siswa WHERE status='Aktif' order by id_siswa DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function selek_status() {
		
		$sql = " select * from status_grup WHERE nama in ('Sedang Berjalan','Cancel','Selesai')";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_by_id($id) {
		//$sql = "SELECT * FROM jadwal WHERE id_jadwal = '{$id}'";
		//$sql = "SELECT * FROM tbl_pendaftaran WHERE id_pendaftaran = '{$id}'";
		$sql = "SELECT tbl_kelas.*, tbl_siswa.*,
				tbl_pendaftaran.*, tbl_bidang_studi.*,
				tbl_tentor.*
				FROM tbl_kelas 
				JOIN tbl_pendaftaran ON tbl_kelas.id_pendaftaran = tbl_pendaftaran.id_pendaftaran
				JOIN tbl_siswa ON tbl_kelas.id_siswa = tbl_siswa.id_siswa
				JOIN tbl_bidang_studi ON tbl_pendaftaran.id_bidang_studi = tbl_bidang_studi.id_bidang_studi
				JOIN tbl_tentor ON tbl_kelas.id_tentor = tbl_tentor.id_tentor
				
				WHERE tbl_kelas.id_kelas='{$id}'";
		$data = $this->db->query($sql);
		return $data->row();
	}

	function simpan_data($data){
		$result= $this->db->insert('tbl_kelas',$data);
	    return $result;
	}
	
	public function update($data,$where) {
		$result= $this->db->update('tbl_kelas',$data,$where);
	    return $result;
	}

	public function get_jadwal_selesai($id)
	{
		// $query = $this->db->query("SELECT COUNT(a.status_jadwal) AS jml_jadwal, b.* FROM tbl_jadwal a JOIN tbl_kelas b ON a.id_kelas=b.id_kelas WHERE a.status_jadwal='selesai' AND a.id_kelas=8");
		// $query = "SELECT * FROM tbl_jadwal WHERE status_jadwal='selesai' AND id_kelas={$id}";
		// if($query->num_rows() > 0){
        //     foreach($query->result() as $data){
        //         $hasil[] = $data;
        //     }
        //     return $hasil;
        // }
		$this->db->select('*');
		$this->db->from('tbl_jadwal');
		$this->db->join('tbl_kelas', 'tbl_jadwal.id_kelas=tbl_kelas.id_kelas');
		$this->db->where('tbl_jadwal.id_kelas', $id);
		$this->db->where('tbl_jadwal.status_jadwal','selesai');
		return $this->db->get()->num_rows();

	}
	
	public function update2($where) {
		
			$sql = " UPDATE jadwal SET status = 'Sedang Berjalan'
                     WHERE timestamp_demo > DATE_ADD(NOW(), INTERVAL -1 SECOND)
                     AND id_jadwal = '1'";
		$data = $this->db->query($sql);
		return $data;
	}
	
	public function update3($where) {
		
	$curr = date('Y-m-d H:i:s');
    $last_min = date('Y-m-d H:i:s', strtotime('-1 minutes'));

    $this->db->update();
    $this->db->from('jadwal');
    $this->db->where('to', $someid);
    $this->db->where('status', 1);
    $this->db->where('dbtime >=', $last_min);
    $this->db->where('dbtime <=', $curr);
    $this->db->order_by('dbtime', 'asc');
    $result = $this->db->get();
    if ($result->num_rows() > 0) {
        return 1;
    } else {
        return 0;
    }
	}
	
	
	public function hapus($id) {
		// $sql = "DELETE FROM tbl_kelas WHERE id_kelas='" .$id ."'";
		$sql = "DELETE tbl_kelas, tbl_jadwal FROM tbl_kelas JOIN tbl_jadwal ON tbl_kelas.id_kelas=tbl_jadwal.id_kelas WHERE tbl_kelas.id_kelas='" .$id ."'";
		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	
	
	public function selek_data($id){
	$this->db->select('tbl_pendaftaran.*, tbl_siswa.nama_siswa, tbl_siswa.id_siswa, tbl_bidang_studi.nama_bidang_studi');
	// $this->db->form('tbl_pendaftaran');
	//join tabel
	$this->db->join('tbl_siswa','tbl_pendaftaran.id_siswa = tbl_siswa.id_siswa','left');
	$this->db->join('tbl_bidang_studi','tbl_pendaftaran.id_bidang_studi = tbl_bidang_studi.id_bidang_studi','left');
	//end join tabel
	
	$this->db->order_by('id_pendaftaran','ASC');
	$this->db->where('status_pendaftaran','selesai');
	$hasil= $this->db->get_where('tbl_pendaftaran',array('id_pendaftaran'=>$id));

	foreach ($hasil->result_array() as $data ){
		if ($data['id_bidang_studi']==16) {
			$kabupaten.= "<option value='$data[id_bidang_studi]'>$data[keterangan]</option>";
		}else{
			$kabupaten.= "<option value='$data[id_bidang_studi]'>$data[nama_bidang_studi]</option>";
		}
		//$kabupaten.= "<option value='$data[id_bidang_studi]'>$data[nama_bidang_studi]</option>";
	}

	return $kabupaten;

	}


	public function selek_nama($id){
//kode asli
	// $this->db->order_by('id_siswa','ASC');
	// $this->db->where('status','Aktif');
	// $hasil= $this->db->get_where('siswa',array('id_siswa'=>$id));

	// foreach ($hasil->result_array() as $data ){
	// $res.= "<option value='$data[nama]'>$data[nama]</option>";
	// }

	// return $res;

//kode baru
	$this->db->select('tbl_pendaftaran.*, tbl_siswa.nama_siswa, tbl_siswa.id_siswa, tbl_bidang_studi.nama_bidang_studi');
	// $this->db->form('tbl_pendaftaran');
	//join tabel
	$this->db->join('tbl_siswa','tbl_pendaftaran.id_siswa = tbl_siswa.id_siswa','left');
	$this->db->join('tbl_bidang_studi','tbl_pendaftaran.id_bidang_studi = tbl_bidang_studi.id_bidang_studi','left');
	//end join tabel

	$this->db->order_by('id_pendaftaran','ASC');
	$this->db->where('status_pendaftaran','selesai');
	$hasil= $this->db->get_where('tbl_pendaftaran',array('id_pendaftaran'=>$id));

	foreach ($hasil->result_array() as $data ){
	$id_siswa.= "<option value='$data[id_siswa]'>$data[id_siswa]</option>";
	}

	return $id_siswa;
	}
	
	
}
