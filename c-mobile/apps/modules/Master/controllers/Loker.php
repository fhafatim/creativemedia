<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loker extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_loker');
		$this->load->model('M_sidebar');
	}
	
	public function loadkonten($page, $data) {
		
		$data['userdata'] 	= $this->userdata;
		$ajax = ($this->input->post('status_link') == "ajax" ? true : false);
		if (!$ajax) { 
			$this->load->view('Dashboard/layouts/header', $data);
		}
		$this->load->view($page, $data);
		if (!$ajax) $this->load->view('Dashboard/layouts/footer', $data);
	}

	public function index()
	{
		$data['userdata'] 	= $this->userdata; 
		$data['page'] 		= "Data Loker";
		$data['judul'] 		= "Data Loker";
		
		$this->loadkonten('v_loker/home',$data);
	}

	public function ajax_list()
	{
		$list = $this->M_loker->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $loker) {
			$limit=word_limiter($loker->deskripsi, 50);
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = '<a href="'.base_url().''.$loker->gambar.'" target="_blank"><img class="img-thumbnail" src="'.base_url().''.$loker->gambar.'"   width="100" /></a>';    
			$row[] = $loker->judul;
			$row[] = $limit;
			$row[] = '<small class="label pull-center bg-blue">'.$loker->status.'</small">';
			//add html for action
			$row[] =  anchor('edit-loker/'.$loker->id_loker, ' <span class="fa fa-edit"></span> ', ' class="btn btn-sm btn-primary ajaxify klik " '). 
				      '  <button class="btn btn-sm btn-danger hapus-loker" data-id='."'".$loker->id_loker."'".'><i class="glyphicon glyphicon-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	
	
	public function Add() {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('add','loker');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Loker";
			$data['judul'] 		= "Data Loker";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
		$data['page'] 		= "Data Loker";
		$data['judul'] 		= "Data Loker";
		$data['Status']   = $this->M_loker->selek_status();	
		$this->loadkonten('v_loker/tambah',$data);
	}
}

	public function prosesTambah() {
		
		$config['upload_path']="./upload/gambar/";
        $config['allowed_types']='gif|jpg|png';
		$config['max_size'] = '2048'; //maksimum besar file 2M
        $config['overwrite'] = TRUE;
		
		$this->load->library('upload',$config);
		
	    if($this->upload->do_upload("gambar"))
		{
		$image_data = $this->upload->data();
		$path['link']= "upload/gambar/";
		
		$data = array(
		'judul' 		       => $this->input->post('judul'),
		'deskripsi' 		   => $this->input->post('deskripsi'),
		'gaji' 	      		   => $this->input->post('gaji'),
		'status' 	           => $this->input->post('status'),
		'gambar'               => $path['link'] . ''. $image_data['file_name'],
		'created_by' 		   => $this->input->post('created_by'),
		'created_date'	       => date('Y-m-d H:i:s')
		);
		$result = $this->M_loker->simpan_data($data);
			
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		
		} 
		
		else {
		$data = array( 
		'judul' 		       => $this->input->post('judul'),
		'deskripsi' 		   => $this->input->post('deskripsi'),
		'gaji' 	      		   => $this->input->post('gaji'),
		'status' 	           => $this->input->post('status'),
		'gambar'               => 'upload/gambar/no-image.png',
		'created_by' 		   => $this->input->post('created_by'),
		'created_date'	       => date('Y-m-d H:i:s')						 
					);  
	    $result = $this->M_loker->simpan_data($data);
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		}

		echo json_encode($out);
	}
	
	
	public function Edit($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('edit','loker');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Loker";
			$data['judul'] 		= "Data Loker";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
		$where=array('id_loker' => $id);
		$data['loker']  = $this->M_loker->select_by_id($id);
		$data['Status'] = $this->M_loker->selek_status();	

		$data['page'] 		= "Data Loker";
		$data['judul'] 		= "Data Loker";
	    $this->loadkonten('v_loker/update',$data);
	}
	}
	
	public function prosesUpdate() {
		
		$config['upload_path']="./upload/gambar/";
        $config['allowed_types']='gif|jpg|png';
		$config['max_size'] = '2048'; //maksimum besar file 2M
        $config['overwrite'] = TRUE;
		
		$this->load->library('upload',$config);
		
	    if($this->upload->do_upload("gambar"))
		{
		$image_data = $this->upload->data();
		$path['link']= "upload/gambar/";
		
		$where = array(
		'id_loker' 		   => $this->input->post('id_loker')
		);	
		
		$data = array(
		'judul' 		       => $this->input->post('judul'),
		'deskripsi' 		   => $this->input->post('deskripsi'),
		'gaji' 	      		   => $this->input->post('gaji'),
		'status' 	           => $this->input->post('status'),
		'gambar'               => $path['link'] . ''. $image_data['file_name'],
		'updated_by' 		   => $this->input->post('updated_by'),
		'updated_date'	       => date('Y-m-d H:i:s')
		);
		
		$result = $this->M_loker->update($data,$where);
			
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		} 
		
		else {
			
		$where = array(
		'id_loker' 		   => $this->input->post('id_loker')
		);
		
		$data = array(
		'judul' 		       => $this->input->post('judul'),
		'deskripsi' 		   => $this->input->post('deskripsi'),
		'gaji' 	      		   => $this->input->post('gaji'),
		'status' 	           => $this->input->post('status'),
		'updated_by' 		   => $this->input->post('updated_by'),
		'updated_date'	       => date('Y-m-d H:i:s')
		);
		
	    $result = $this->M_loker->update($data,$where);
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		}

		echo json_encode($out);
	}
	
// 	public function hapus() {
		
// 	$token = $this->input->post('id_loker');
// 	$gambar=$this->db->get_where('loker',array('id_loker'=>$token));
// 	if($gambar->num_rows()>0){
// 	$hasil=$gambar->row();
// 	$judul=$hasil->gambar;
// 	//hapus unlink foto
// 	if(file_exists($file=$judul)){
// 	unlink($file);
// 	}
// 	$this->db->delete('loker',array('id_loker'=>$token));
// 	}
// 	echo "{}";
	
// 	}


	public function hapus() {
		$id = $_POST['id_loker'];
		$result = $this->M_loker->hapus($id);
		
		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
	}
	
	
	
	
	
	
}
