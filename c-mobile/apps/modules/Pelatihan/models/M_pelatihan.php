<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelatihan extends CI_Model {

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

    function get_data()
	{
		$sql = "SELECT * FROM tbl_pelatihan ORDER BY tanggal_pendaftaran DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}

    function get_bidangstudi($id)
	{
		$sql = "SELECT * FROM tbl_kelas_pelatihan WHERE id_pelatihan = '$id'";

		$data = $this->db->query($sql);
		return $data->result();
	}

    function get_tagihan($id)
	{
		$sql = "SELECT * FROM tbl_invoice_pelatihan WHERE id_pelatihan = '$id'";

		$data = $this->db->query($sql);
		return $data->result();
	}

    function get_pembayaran($id)
	{
		$sql = "SELECT * FROM tbl_pembayaran_pelatihan  WHERE id_pelatihan = '$id'";

		$data = $this->db->query($sql);
		return $data->result();
	}

    function get_peserta($id)
	{
		$sql = "SELECT * FROM tbl_peserta_pelatihan a, tbl_siswa b WHERE id_pelatihan = '$id' AND a.id_siswa = b.id_siswa";

		$data = $this->db->query($sql);
		return $data->result();
	}

    function selek_studi()
	{
		$data = $this->db->get('tbl_bidang_studi');
		return $data->result();
	}

    public function selek_level() {
		
		$sql = " select * from tbl_level_kelas";
		$data = $this->db->query($sql);
		return $data->result();
	}

    public function selek_trainer() {
		
		$sql = " select * from tbl_tentor";
		$data = $this->db->query($sql);
		return $data->result();
	}

    function data_bank()
	{
		
		$sql = "SELECT * FROM tbl_bank";
		$data = $this->db->query($sql);
		return $data->result();
	}

    public function nis(){
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
	
}