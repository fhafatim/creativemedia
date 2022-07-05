<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembayaran extends CI_Model {

	var $table = 'tbl_pembayaran';
	var $column_order = array(null, 'nama_depan','nama_belakang','jenis_kelamin','handphone','email','alamat','kota','kode_pos','provinsi','warganegara','pendidikan_terakhir','bidang_studi','tanggal'); //set column field database for datatable orderable
    var $column_search = array('nama_depan','','nama_belakang','email','handphone','alamat','kota','bidang_studi','tanggal'); //set column field database for datatable searchable 
    var $order = array('id_pendaftaran' => 'desc'); // default order 


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function get_data($dari,$sampai,$tempat)
	{
		
		$nama = $this->session->userdata('nama');
		if(preg_match("/Nginden/i", $nama)) {
		    
    		$sql = "SELECT * FROM tbl_pembayaran WHERE tempat_pembayaran = 'nginden' ORDER BY tanggal_pembayaran DESC";
    		
		} else if(preg_match("/Tubanan/i", $nama)) {
		    
		    $sql = "SELECT * FROM tbl_pembayaran WHERE tempat_pembayaran = 'tubanan' ORDER BY tanggal_pembayaran DESC";
		    
		} else {
		    
		    $sql = "SELECT * FROM tbl_pembayaran WHERE 1 ";
    
    		if($dari != ""){
    			if($sampai != ""){
    				$sql .= "AND tanggal_pembayaran BETWEEN '$dari' AND '$sampai'";
    			} else {
    				$sql .= "AND tanggal_pembayaran = '$dari'";
    			}	
    		}
    
    		if($tempat != ""){
    			$sql .= "AND tempat_pembayaran = '$tempat'";
    		}
    		
    		$sql .= "ORDER BY tanggal_pembayaran DESC";
		    
		}

		$data = $this->db->query($sql);
		return $data->result();
	}
	
	function data_bank()
	{
		
		$sql = "SELECT * FROM tbl_bank";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
		 public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_pembayaran');
        $this->db->join('tbl_invoice','tbl_invoice.id_invoice = tbl_pembayaran.id_invoice','left');
        $this->db->order_by('id_pembayaran', 'desc');
        return $this->db->get()->result();   
        
    
	}
	// public function get_all_data()
    // {
    //     $this->db->select('*');
    //     $this->db->from('produk');
    //     $this->db->join('kategori','kategori.id_kategori= produk.id_kategori','left');
    //     $this->db->order_by('id_produk', 'desc');
    //     return $this->db->get()->result();   
        
    // }

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
    
	function getdatabayar($login){
		
		
		if(preg_match("/Nginden/i", $login)) {
		    
          $query=$this->db->query("SELECT * FROM tbl_invoice a, tbl_pendaftaran b, tbl_bidang_studi c, tbl_siswa d, tbl_level_kelas e WHERE a.id_pendaftaran = b.id_pendaftaran AND b.id_bidang_studi = c.id_bidang_studi AND b.id_siswa = d.id_siswa AND b.id_level_kelas = e.id_level_kelas AND status_invoice = 'pending' AND b.tempat_daftar = 'nginden'");
          
		} else if(preg_match("/Tubanan/i", $login)) {
		    
		    $query=$this->db->query("SELECT * FROM tbl_invoice a, tbl_pendaftaran b, tbl_bidang_studi c, tbl_siswa d, tbl_level_kelas e WHERE a.id_pendaftaran = b.id_pendaftaran AND b.id_bidang_studi = c.id_bidang_studi AND b.id_siswa = d.id_siswa AND b.id_level_kelas = e.id_level_kelas AND status_invoice = 'pending' AND b.tempat_daftar = 'tubanan'");
		    
        } else {
            
          $query=$this->db->query("SELECT * FROM tbl_invoice a, tbl_pendaftaran b, tbl_bidang_studi c, tbl_siswa d, tbl_level_kelas e WHERE a.id_pendaftaran = b.id_pendaftaran AND b.id_bidang_studi = c.id_bidang_studi AND b.id_siswa = d.id_siswa AND b.id_level_kelas = e.id_level_kelas AND status_invoice = 'pending'");
        }
		
	
		if($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}$query->free_result();
	}

	public function select_by_id($id) {
		/*
		$sql = "SELECT a.*, b.* ,c.* , d.* ,e.*,f.*, g.* FROM tbl_invoice a 
		JOIN tbl_pendaftaran b ON a.id_pendaftaran=b.id_pendaftaran 
		JOIN tbl_siswa c ON b.id_siswa=c.id_siswa 
		join tbl_bidang_studi d ON b.id_bidang_studi=d.id_bidang_studi 
		JOIN tbl_level_kelas e ON b.id_level_kelas=e.id_level_kelas 
		JOIN tbl_pembayaran f ON f.id_invoice=a.id_invoice 
		JOIN tbl_kategori_kelas g ON b.id_kategori_kelas=g.id_kategori_kelas WHERE a.id_invoice = '{$id}'"; */
		$sql = "SELECT * FROM tbl_pembayaran WHERE id_pembayaran = '$id'";
		
		$data = $this->db->query($sql);
		return $data->row();
	}

	public function update($data,$where)
    { 
		$result= $this->db->update('tbl_pembayaran',$data,$where);
		return $result;
    
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
	public function kode_pembayaran(){
		$this->db->select('kode_pembayaran', FALSE);
		$this->db->order_by('kode_pembayaran','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('tbl_pembayaran');  //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
			 //cek kode jika telah tersedia    
			 $data = $query->row();      
			 $kode = $data->kode_pembayaran;
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
			$kodetampil = "BYR".$bulan.$tahun.$batas;
			return $kodetampil;  
  	}
  
	function updatetabelKelas($id){
		$this->db->set("status_kelas","berjalan");
		$this->db->from("tbl_kelas");
		$this->db->where("id_pendaftaran",$id);
		}

	public function hapus($id_pembayaran) {
		$sql = "DELETE FROM tbl_pembayaran WHERE id_pembayaran='$id_pembayaran'";

		$this->db->query($sql);
		return $this->db->affected_rows();
	}
	
	public function cetak_bukti($id){
		$sql = "SELECT * FROM tbl_pembayaran a join tbl_invoice b on  a.id_invoice=b.id_invoice join tbl_pendaftaran c on b.id_pendaftaran=c.id_pendaftaran join tbl_siswa d on c.id_siswa=d.id_siswa join tbl_bidang_studi e on c.id_bidang_studi=e.id_bidang_studi join tbl_level_kelas f on c.id_level_kelas=f.id_level_kelas join tbl_kategori_kelas g on c.id_kategori_kelas=g.id_kategori_kelas WHERE a.id_pembayaran = '$id'";
		$data = $this->db->query($sql);
		return $data->row();

	}
	
	public function select_pendaftaran() {
		
		$sql = " select * from tbl_pendaftaran a, tbl_siswa b, tbl_bidang_studi c, tbl_level_kelas d, tbl_invoice e WHERE a.id_siswa = b.id_siswa AND a.id_bidang_studi = c.id_bidang_studi AND a.id_level_kelas = d.id_level_kelas";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function kode_nginden(){
		$pembayaran = $this->db->query("SELECT * FROM tbl_pembayaran WHERE tempat_pembayaran = 'nginden' ORDER BY id_pembayaran DESC LIMIT 1");
		$data_pembayaran = $pembayaran->row();
		$kode = $data_pembayaran->kode_pembayaran;
		$tag = substr($kode,-15);
		$tahun = substr($kode,-4);
		$tahun_skrg = date('Y');
		$increament = str_replace("".$tag,"","".$kode);
		if($tahun == $tahun_skrg){
			$new_increament = $increament+1;
			$kode = $new_increament."".$tag;
		} else {
			$kode = "1/KP/NGD/CM/".$tahun_skrg;
		}
		return $kode;
	}

	public function kode_tubanan(){
		$pembayaran = $this->db->query("SELECT * FROM tbl_pembayaran WHERE tempat_pembayaran = 'tubanan' ORDER BY id_pembayaran DESC LIMIT 1");
		$data_pembayaran = $pembayaran->row();
		$kode = $data_pembayaran->kode_pembayaran;
		$tag = substr($kode,-15);
		$tahun = substr($kode,-4);
		$tahun_skrg = date('Y');
		$increament = str_replace("".$tag,"","".$kode);
		if($tahun == $tahun_skrg){
			$new_increament = $increament+1;
			$kode = $new_increament."".$tag;
		} else {
			$kode = "1/KP/TBN/CM/".$tahun_skrg;
		}

		return $kode;
	}
	
	
}