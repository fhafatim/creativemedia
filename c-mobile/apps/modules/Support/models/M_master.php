<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_master extends CI_Model {

	var $table = 'master_data';
	var $column_order = array(null, 'nama','tgl_lahir','jkel','pekerjaan','alamat','kota','kategori','sket1','sket2','tanggal'); //set column field database for datatable orderable
    var $column_search = array('nama','tgl_lahir','jkel','pekerjaan','alamat','kota','kategori','sket1','sket2','tanggal'); //set column field database for datatable searchable 
    var $order = array('id_master' => 'desc'); // default order 


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	private function _get_datatables_query()
    {
         
        //add custom filter here
        if($this->input->post('kategori'))
        {
            $this->db->where('kategori', $this->input->post('kategori'));
        }
        if($this->input->post('tanggal'))
        {
            $this->db->like('tanggal', $this->input->post('tanggal'));
        }
        if($this->input->post('nama'))
        {
            $this->db->like('nama', $this->input->post('nama'));
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


	function get_data()
	{
		$this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
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
		$sql = "SELECT * FROM master_data WHERE id_master = '{$id}'";
		$data = $this->db->query($sql);
		return $data->row();
	}

	function simpan_data($data){
		$result= $this->db->insert('master_data',$data);
	    return $result;
	}
	
	public function update($data,$where) {
		$result= $this->db->update('master_data',$data,$where);
	    return $result;
	}
	

	public function hapus($id) {
		$sql = "DELETE FROM master_data WHERE id_master='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	
	public function select_kelamin() {
		
		$data = $this->db->get('kelamin');
		return $data->result();
	}
	
	public function select_kategori() {
		
		$data = $this->db->get('kategori');
		return $data->result();
	}
	
	public function select_pekerjaan() {
		
		$data = $this->db->get('pekerjaan');
		return $data->result();
	}
	
	public function select_kota() {
		
		$data = $this->db->get('kota');
		return $data->result();
	}
	
	public function select_bulan() {
		
		$data = $this->db->get('bulan');
		return $data->result();
	}
	
	public function select_tahun() {
		
		$data = $this->db->get('tahun');
		return $data->result();
	}
	
	
	public function select_status() {
		
		$sql = " select * from status WHERE status in ('Pesan','Mulai','Selesai')";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	
}
