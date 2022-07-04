<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_cuti extends CI_Model
{
    var $table = 'cuti';


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function get_data()
    {
        if ($this->session->userdata('id') == "6") {
            $sql = "SELECT * FROM cuti";;
        } else if ($this->session->userdata('id') == "7") {
            $sql = "SELECT * FROM cuti WHERE nama LIKE '%" . $this->session->userdata('nama') . "%'";
        } else {
            $sql = "SELECT * FROM cuti";
        }

        $data = $this->db->query($sql);
        return $data->result();
    }

    public function get_kode()
    {
        $kode = "SIC";
        $query = "SELECT max(no_surat) as kode_auto FROM cuti";
        $data = $this->db->query($query)->row_array();
        $max_kode = $data['kode_auto'];
        $max_kode2 = (int)substr($max_kode, 4);
        $kodecount = $max_kode2 + 1;
        $kode_auto = $kode . "-" . sprintf('%04s', $kodecount);
        return $kode_auto;
    }

    function simpan_data($data)
    {
        $result = $this->db->insert('cuti', $data);
        return $result;
    }

    public function select_by_id($id)
    {
        //$sql = "SELECT trainer.*, login.password FROM trainer, login WHERE trainer.nama=login.nama and id_trainer=$id";
        //$sql = "SELECT tbl_tentor.*, tbl_login.* FROM tbl_tentor JOIN tbl_login ON tbl_tentor.id_login = tbl_login.id_login WHERE tbl_tentor.id_tentor = $id";
        $sql = "SELECT * from cuti where no_surat = '$id'";
        $data = $this->db->query($sql);
        return $data->row();
    }

    public function update($data, $where)
    {
        $result = $this->db->update('cuti', $data, $where);
        return $result;
    }
}
