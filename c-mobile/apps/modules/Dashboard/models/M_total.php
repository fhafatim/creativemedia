<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_total extends CI_Model 
{
	public function get_studi()
	{
		$query = $this->db->query("SELECT a.id_bidang_studi, COUNT(a.id_pendaftaran) AS id_pendaftaran, b.nama_bidang_studi FROM tbl_pendaftaran a JOIN tbl_bidang_studi b ON a.id_bidang_studi=b.id_bidang_studi GROUP BY id_bidang_studi");
          
        if($query->num_rows() > 0){
			foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
	}

	public function get_jenkel()
	{
		$query = $this->db->query("SELECT jenis_kelamin,COUNT(id_siswa) AS total FROM tbl_siswa GROUP BY jenis_kelamin");
		//$query = $this->db->query("SELECT * FROM tbl_siswa");
		
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
	}
	
	public function total_daftar() {
		$data = $this->db->get('tbl_pendaftaran');
		return $data->num_rows();
	}
	
	public function total_siswa() {
		
		$data = $this->db
		->where('status_siswa=', 'aktif')
		->get('tbl_siswa');
		return $data->num_rows();
	}
	
	public function total_pengajar() {
		
		$data = $this->db
		->where('status_tentor=', 'aktif')
		->get('tbl_tentor');
		return $data->num_rows();
	}
	
	public function total_karyawan() {
		
		$data = $this->db
		->where('status_karyawan=', 'aktif')
		->get('tbl_karyawan');
		return $data->num_rows();
	}
	
	public function total_jadwal() {
		$data = $this->db
		->where('status_kelas=', 'berjalan')
		->get('tbl_kelas');
		return $data->num_rows();
	}
	
	public function total_studi() {
		$data = $this->db->get('tbl_bidang_studi');
		return $data->num_rows();
	}
	
	public function get_data_daftar(){
        $query = $this->db->query("SELECT tanggal_pendaftaran,COUNT(id_pendaftaran) AS id_pendaftaran FROM tbl_pendaftaran WHERE tanggal_pendaftaran between DATE_ADD(date(now()), INTERVAL -30 DAY) and date(now()) GROUP BY tanggal_pendaftaran");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
	
	public function get_data_jadwal_aktif(){
		$today = date('Y-m-d');
		$sevendaylater = date('Y-m-d', strtotime($today. ' + 6 days'));
		
        $query = $this->db->query("SELECT * FROM `tbl_kelas` a, tbl_siswa b, tbl_tentor c, tbl_pendaftaran d WHERE a.status_kelas = 'berjalan' AND a.id_siswa = b.id_siswa AND a.id_tentor = c.id_tentor AND a.id_pendaftaran = d.id_pendaftaran");
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

	public function get_data_ultah(){
		$day = date('d');
		$month = date('m');
		
        $query = $this->db->query("SELECT * FROM tbl_siswa WHERE day(tanggal_lahir) = '$day' AND month(tanggal_lahir) = '$month'");
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

	public function get_data_ultahkaryawan(){
		$day = date('d');
		$month = date('m');
		
        $query = $this->db->query("SELECT * FROM tbl_karyawan WHERE day(tanggal_lahir) = '$day' AND month(tanggal_lahir) = '$month'");
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

}