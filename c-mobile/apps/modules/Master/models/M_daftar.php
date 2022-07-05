<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_daftar extends CI_Model {

	var $table = 'tbl_pendaftaran';
	var $column_order = array(null, 'nama_depan','nama_belakang','jenis_kelamin','handphone','email','alamat','kota','kode_pos','provinsi','warganegara','pendidikan_terakhir','bidang_studi','tanggal'); //set column field database for datatable orderable
    var $column_search = array('nama_depan','','nama_belakang','email','handphone','alamat','kota','bidang_studi','tanggal'); //set column field database for datatable searchable 
    var $order = array('id_pendaftaran' => 'desc'); // default order 


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	private function _get_datatables_query()
    {
         
        if($this->input->post('tanggal'))
        {
            $this->db->like('tanggal', $this->input->post('tanggal'));
        }
        if($this->input->post('nama_depan'))
        {
            $this->db->like('nama_depan', $this->input->post('nama_depan'));
        }
 
        $this->db->from($this->table);
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
	
	public function kode(){
		  $this->db->select('no_pendaftaran', FALSE);
		  $this->db->order_by('no_pendaftaran','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('tbl_pendaftaran');  //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
			   //cek kode jika telah tersedia    
			   $data = $query->row();      
			   $kode = $data->no_pendaftaran;
		  }
		  else{      
			   $kode = 1;  //cek jika kode belum terdapat pada table
		  } 
		      $bulan=date('m');
			  $tahun=date('y');
			  //$batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
			  $batas = substr($kode,4);	
			  $batas = $batas+1;
			  //$kodetampil = "CM".$tahun.$bulan.$batas;  //format kode
			  $kodetampil = "CM".$tahun.$batas;
			  return $kodetampil;  
	}
	
	public function kode_invoice(){
		  $this->db->select('no_invoice', FALSE);
		  $this->db->order_by('no_invoice','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('tbl_invoice');  //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
			   //cek kode jika telah tersedia    
			   $data = $query->row();      
			   $kode = $data->no_invoice;
		  }
		  else{      
			   $kode = 1;  //cek jika kode belum terdapat pada table
		  } 
		      $bulan=date('m');
			  $tahun=date('y');
			  //$batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
			  $batas = substr($kode,7);	
			  $batas = $batas+1;
			  //$kodetampil = "CM".$tahun.$bulan.$batas;  //format kode
			  $kodetampil = "INV".$bulan.$tahun.$batas;
			  return $kodetampil;  
	}
	
	public function kode_invoice_nginden(){
		$tagihan = $this->db->query("SELECT * FROM tbl_invoice a, tbl_pendaftaran b WHERE a.id_pendaftaran = b.id_pendaftaran AND b.tempat_daftar = 'nginden' ORDER BY a.id_invoice DESC LIMIT 1");
		$data_tagihan = $tagihan->row();
		$kode = $data_tagihan->no_invoice;
		$tag = substr($kode,-16);
		$tahun = substr($kode,-4);
		$tahun_skrg = date('Y');
		$increament = str_replace("".$tag,"","".$kode);
		if($tahun == $tahun_skrg){
			$new_increament = $increament+1;
			$kode = $new_increament."".$tag;
		} else {
			$kode = "1/INV/NGD/CM/".$tahun_skrg;
		}
		return $kode;
	}
	
	public function kode_invoice_tubanan(){
		$tagihan = $this->db->query("SELECT * FROM tbl_invoice a, tbl_pendaftaran b WHERE a.id_pendaftaran = b.id_pendaftaran AND b.tempat_daftar = 'tubanan' ORDER BY a.id_invoice DESC LIMIT 1");
		$data_tagihan = $tagihan->row();
		$kode = $data_tagihan->no_invoice;
		$tag = substr($kode,-16);
		$tahun = substr($kode,-4);
		$tahun_skrg = date('Y');
		$increament = str_replace("".$tag,"","".$kode);
		if($tahun == $tahun_skrg){
			$new_increament = $increament+1;
			$kode = $new_increament."".$tag;
		} else {
			$kode = "1/INV/TBN/CM/".$tahun_skrg;
		}
		return $kode;
	}
	
	public function selek_siswa() {
		
		$sql = " select * from tbl_siswa";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function selek_agama() {
		
		$sql = " select * from agama";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function selek_jenis_tinggal() {
		
		$sql = " select * from status_grup WHERE nama in ('Bersama Orang Tua','Kos','Lainnya')";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function selek_adalainnya() {
		
		$sql = " select * from status_grup WHERE nama in ('Lainnya')";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	
	public function selek_lainnya() {
		
		$sql = " select * from tbl_siswa WHERE jenis_tinggal not in ('Bersama Orang Tua','Kos')";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function selek_level() {
		
		$sql = " select * from tbl_level_kelas";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function selek_kategori_kelas() {
		
		$sql = " select * from tbl_kategori_kelas";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function selek_kelamin() {
		
		$sql = " select * from status_grup WHERE nama in ('laki-laki','perempuan')";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	function selek_studi()
	{
		$data = $this->db->get('tbl_bidang_studi');
		return $data->result();
	}
	
	function selek_pendidikan()
	{
		$data = $this->db->get('pendidikan');
		return $data->result();
	}
	
	function selek_penghasilan()
	{
		$data = $this->db->get('tbl_penghasilan');
		return $data->result();
	}

	function get_data()
	{
		// $sql = "SELECT * FROM tbl_pendaftaran a, tbl_siswa b, tbl_bidang_studi c, tbl_level_kelas d WHERE a.id_siswa = b.id_siswa AND a.id_bidang_studi = c.id_bidang_studi AND a.id_level_kelas = d.id_level_kelas";
		$sql = "SELECT a.*, b.*, c.*, d.nama_kategori_kelas, e.nama_level_kelas FROM tbl_siswa a JOIN tbl_pendaftaran b ON a.id_siswa =b.id_siswa JOIN tbl_bidang_studi c ON b.id_bidang_studi = c.id_bidang_studi JOIN tbl_kategori_kelas d ON b.id_kategori_kelas = d.id_kategori_kelas JOIN tbl_level_kelas e ON b.id_level_kelas = e.id_level_kelas ORDER BY b.tanggal_pendaftaran DESC";

		$data = $this->db->query($sql);
		return $data->result();
	}
	
	 public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


	public function select_by_id($id) {
		$sql = "SELECT a.*, b.*, c.nama_bidang_studi, d.nama_kategori_kelas, e.nama_level_kelas FROM tbl_siswa a JOIN tbl_pendaftaran b ON a.id_siswa =b.id_siswa JOIN tbl_bidang_studi c ON b.id_bidang_studi = c.id_bidang_studi JOIN tbl_kategori_kelas d ON b.id_kategori_kelas = d.id_kategori_kelas JOIN tbl_level_kelas e ON b.id_level_kelas = e.id_level_kelas where b.id_pendaftaran = '{$id}'";
		$data = $this->db->query($sql);
		return $data->row();
	}

	public function saveRegis($data){
		$query = $this->db->insert('tbl_pendaftaran', $data); 
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function saveSiswa($data){
		$query = $this->db->insert('tbl_siswa', $data); 
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function insertLogin($data){
		$query = $this->db->insert('tbl_login', $data);
		$id_login = $this->db->insert_id();		
		return $id_login;
	}
	
	public function checkUsername($data){
		$this->db->select('username');
		$this->db->from('tbl_login');
		$this->db->where('username', $data);
		$this->db->limit(1);
		 
		$query = $this->db->get();
		if($query->num_rows() == 1) { 
			return $query->result();
		} else {
			return false;
		}
	}
	
	
	
	public function update_pendaftaran($data,$where) {
		$result= $this->db->update('tbl_pendaftaran',$data,$where);
	    return $result;
	}
	public function update_aktivasi($data,$where) {
		$result= $this->db->update('tbl_login',$data,$where);
	    return $result;
	}
	
	public function update_siswa($data,$where) {
		$result= $this->db->update('tbl_siswa',$data,$where);
	    return $result;
	}
	

	public function hapus($id_pendaftaran) {
		$sql = "DELETE FROM  tbl_pendaftaran WHERE id_pendaftaran='".$id_pendaftaran ."' ";
		// DELETE a.* , b.* , c.* FROM tbl_pendaftaran a JOIN tbl_siswa b ON a.id_siswa=b.id_siswa JOIN tbl_login c on b.id_login=c.id_login WHERE a.id_siswa='2' AND b.id_siswa='2' AND c.id_login='2'
		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	
	public function export() {
		$sql = "SELECT a.no_pendaftaran, a.tanggal_pendaftaran,b.*,
		c.nama_bidang_studi,d.nama_kategori_kelas,e.nama_level_kelas,
		a.harga_kursus,a.status_pendaftaran 
		FROM tbl_pendaftaran a 
		JOIN tbl_siswa b ON a.id_siswa=b.id_siswa 
		JOIN tbl_bidang_studi c ON a.id_bidang_studi=c.id_bidang_studi 
		JOIN tbl_kategori_kelas d ON a.id_kategori_kelas=d.id_kategori_kelas 
		JOIN tbl_level_kelas e ON a.id_level_kelas=e.id_level_kelas ";
		$data = $this->db->query($sql);
		return $data->result();
	}

	
	
	public function kursus_aktif($id) {
		
		$data = $this->db
		->where('status_kelas=', 'berjalan')
		->where('id_siswa=', $id)
		->get('tbl_kelas');
		return $data->num_rows();
	}
	
	public function kursus_selesai($id) {
		
		$data = $this->db
		->where('status_kelas=', 'selesai')
		->where('id_siswa=', $id)
		->get('tbl_kelas');
		return $data->num_rows();
	}
	
	public function jumlah_tagihan($id) {
		
		$sql = "SELECT * FROM tbl_invoice a, tbl_pendaftaran b, tbl_siswa c WHERE a.id_pendaftaran = b.id_pendaftaran AND b.id_siswa = c.id_siswa AND a.status_invoice = 'pending' AND b.id_pendaftaran = '$id'";

		$data = $this->db->query($sql);
		return $data->num_rows();
	}
	
	function get_historypembayaran($id)
	{
		$sql = "SELECT * FROM tbl_pembayaran a JOIN tbl_invoice b ON a.id_invoice=b.id_invoice JOIN tbl_pendaftaran c ON b.id_pendaftaran= c.id_pendaftaran WHERE b.id_pendaftaran = '$id'";

		$data = $this->db->query($sql);
		return $data->result();
	}
	
	function get_tagihan($id)
	{
		$sql = "SELECT * FROM tbl_invoice a, tbl_pendaftaran b, tbl_siswa c, tbl_bidang_studi d, tbl_level_kelas e WHERE a.id_pendaftaran = b.id_pendaftaran AND b.id_siswa = c.id_siswa AND b.id_bidang_studi = d.id_bidang_studi AND b.id_level_kelas = e.id_level_kelas AND b.id_pendaftaran = '$id'";

		$data = $this->db->query($sql);
		return $data->result();
	}
	
	function get_pembayaran($id)
	{
		$sql = "SELECT SUM(nominal) as nominal FROM tbl_pembayaran WHERE id_invoice = '$id'";

		$data = $this->db->query($sql);
		return $data->result();
	}
	
	
}