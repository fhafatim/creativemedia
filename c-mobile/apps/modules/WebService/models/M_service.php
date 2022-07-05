<?php
class M_service extends CI_Model{
	
	public function login($data) {
	   
		$this->db->select('*');
		$this->db->from('tbl_login');
		$this->db->where('username', $data['username']);
		$this->db->where('password', $data['password']);
		
		$this->db->limit(1);
		 
		$query = $this->db->get();
		if($query->num_rows() == 1) { 
			return $query->result();
		} else {
			return false;
		}
	}
	
	public function kode(){
		  $this->db->select('RIGHT(pendaftaran.no_registrasi,2) as no_registrasi', FALSE);
		  $this->db->order_by('no_registrasi','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('pendaftaran');  //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
			   //cek kode jika telah tersedia    
			   $data = $query->row();      
			   $kode = intval($data->no_registrasi) + 1; 
		  }
		  else{      
			   $kode = 1;  //cek jika kode belum terdapat pada table
		  } 
			  $bulan=date('m');
			  $tahun=date('Y');
			  $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
			  $kodetampil = "CM".$bulan.$tahun.$batas;  //format kode
			  return $kodetampil;  
		 }
	
	function selek_studi()
	{
		$data = $this->db->get('bidang_studi');
		return $data->result();
	}
	
	function selek_galeri()
	{
		$data = $this->db->get('gallery');
		return $data->result();
	}
	
	public function selek_promo() {
		
		$sql = " select * from promo WHERE status ='Publish'";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function selek_artikel() {
		
		$sql = " select * from artikel WHERE status ='Publish' order by id_artikel DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function selek_artikel_acak() {
		
		$sql = " select * from artikel WHERE status ='Publish' order by rand() LIMIT 3";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function selek_loker() {
		
		$sql = " select * from loker WHERE status ='Publish' order by id_loker DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function selek_fasilitas1() {
		
		$sql = " select * from fasilitas WHERE type ='INFRASTRUKTUR'";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function selek_fasilitas2() {
		
		$sql = " select * from fasilitas WHERE type ='STARTER KIT'";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function saveRegis($data){
		$query = $this->db->insert('pendaftaran', $data); 
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function saveSiswa($data){
		$query = $this->db->insert('calon_siswa', $data); 
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function insertLogin($data){
		$query = $this->db->insert('login', $data); 
		return $query;
	}
	
	
	public function getnotif($siswa){
		//$sql = "SELECT jadwal.*, siswa.nama, siswa.alamat, siswa.handphone FROM jadwal, siswa WHERE siswa.nama=jadwal.siswa and jadwal.status<>'Selesai' and siswa='$siswa'";
		$sql = "SELECT siswa,hari,jam,studi,pertemuan FROM jadwal WHERE jadwal.status<>'Selesai' and siswa='$siswa'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function getnotif2($trainer){
		//$sql = "SELECT jadwal.*, pelanggan.namalengkap, pelanggan.alamat, pelanggan.telp as telpdriver FROM pengiriman, pelanggan WHERE pelanggan.username=pengiriman.usernamepelanggan and pengiriman.status<>'selesai' and usernamedriver='$usernamedrive'";
		$sql = "SELECT trainer,hari,jam,studi,pertemuan FROM jadwal WHERE jadwal.status<>'Selesai' and trainer='$trainer'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function getDataUser($username) {
		$this->db->select('username, token');
		$this->db->from('driver');
		$this->db->where('username', $username);
		$this->db->limit(1);
		 
		$query = $this->db->get();
		if($query->num_rows() == 1) { 
			return $query->result();
		} else {
			return false;
		}
	}
	
		public function updateSiswa($data)
	{
		$this->db->where('username',$data['username']);
		$query=$this->db->update('login',$data); 
		return $query;
	}
	
	public function updatetoken($token, $table, $username){
		$this->db->where('username',$username); 
		$query=$this->db->update($table,array('token'=>$token)); 
		return $query;
	}
	public function getSiswa($username){
		$sql = "SELECT * FROM siswa WHERE username='$username' AND status='Aktif'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function getSiswa2($nama){
		$sql = "SELECT siswa,studi from jadwal WHERE siswa='$nama' AND status='Selesai'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function getSiswa3($id_login){
		$sql = "SELECT * from tbl_siswa WHERE id_login = '$id_login'";
		$query = $this->db->query($sql);
		return $query->row();
	}
	
	public function getTentor($id_login){
		$sql = "SELECT * from tbl_tentor WHERE id_login = '$id_login'";
		$query = $this->db->query($sql);
		return $query->row();
	}
	
	public function getJadwal($nama){
		$sql = "SELECT * FROM jadwal WHERE siswa='$nama' AND status='Sedang Berjalan'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function getHistori($nama){
		$sql = "SELECT siswa,studi from jadwal WHERE trainer='$nama' AND status='Selesai'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function getJadwal2($nama){
		$sql = "SELECT * FROM jadwal WHERE trainer='$nama' AND status='Sedang Berjalan'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function getTrainer($username){
		$sql = "SELECT * FROM trainer WHERE username='$username'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	
	public function checkUsername($data){
		$this->db->select('email');
		$this->db->from('pendaftaran');
		$this->db->where('email', $data['email']);
		$this->db->limit(1);
		 
		$query = $this->db->get();
		if($query->num_rows() == 1) { 
			return $query->result();
		} else {
			return false;
		}
	}
	
	public function selek_kursus_siswa_berjalan($id_siswa) {
		
		$sql = " select *,b.gambar as foto_tentor from tbl_kelas a, tbl_tentor b, tbl_pendaftaran c, tbl_bidang_studi d WHERE a.id_tentor = b.id_tentor AND a.id_pendaftaran = c.id_pendaftaran AND c.id_bidang_studi = d.id_bidang_studi AND a.id_siswa = '$id_siswa' AND a.status_kelas = 'berjalan'";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function selek_kursus_siswa_selesai($id_siswa) {
		
		$sql = " select *,b.gambar as foto_tentor from tbl_kelas a, tbl_tentor b, tbl_pendaftaran c, tbl_bidang_studi d WHERE a.id_tentor = b.id_tentor AND a.id_pendaftaran = c.id_pendaftaran AND c.id_bidang_studi = d.id_bidang_studi AND a.id_siswa = '$id_siswa' AND a.status_kelas = 'selesai'";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function selek_kursus_tentor_berjalan($id_tentor) {
		
		$sql = " select *,b.gambar as foto_siswa from tbl_kelas a, tbl_siswa b, tbl_pendaftaran c, tbl_bidang_studi d WHERE a.id_siswa = b.id_siswa AND a.id_pendaftaran = c.id_pendaftaran AND c.id_bidang_studi = d.id_bidang_studi AND a.id_tentor = '$id_tentor' AND a.status_kelas = 'berjalan'";
		$data = $this->db->query($sql);
		return $data->result();
	}	
	public function selek_kursus_tentor_selesai($id_tentor) {
		
		$sql = " select *,b.gambar as foto_siswa from tbl_kelas a, tbl_siswa b, tbl_pendaftaran c, tbl_bidang_studi d WHERE a.id_siswa = b.id_siswa AND a.id_pendaftaran = c.id_pendaftaran AND c.id_bidang_studi = d.id_bidang_studi AND a.id_tentor = '$id_tentor' AND a.status_kelas = 'selesai'";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function selek_jadwal_kursus($id_kelas) {
		
		$sql = " select * from tbl_detail_jadwal WHERE id_kelas = '$id_kelas'";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function selek_gbmp($id_kelas) {
		
		$sql = " select * from tbl_jadwal WHERE id_kelas = '$id_kelas'";
		$data = $this->db->query($sql);
		return $data->result();
	}
}
?>