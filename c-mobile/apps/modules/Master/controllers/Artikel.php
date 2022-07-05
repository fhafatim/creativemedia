<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_artikel');
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
		$data['page'] 		= "Data Artikel";
		$data['judul'] 		= "Data Artikel";
		
		$this->loadkonten('v_artikel/home',$data);
	}

	public function ajax_list()
	{
		$list = $this->M_artikel->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $artikel) {
			$limit=word_limiter($artikel->deskripsi, 50);
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = '<a href="'.base_url().''.$artikel->gambar.'" target="_blank"><img class="img-thumbnail" src="'.base_url().''.$artikel->gambar.'"   width="100" /></a>';    
			$row[] = $artikel->judul;
			$row[] = $limit;
			$row[] = '<small class="label pull-center bg-blue">'.$artikel->status.'</small">';
			//add html for action
			$row[] =  anchor('edit-artikel/'.$artikel->id_artikel, ' <span class="fa fa-edit"></span> ', ' class="btn btn-sm btn-primary ajaxify klik " '). 
				      '  <button class="btn btn-sm btn-danger hapus-artikel" data-id='."'".$artikel->id_artikel."'".'><i class="glyphicon glyphicon-trash"></i></button>';
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
		$access = $this->M_sidebar->access('add','promo');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Artikel";
			$data['judul'] 		= "Data Artikel";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
		$data['page'] 		= "Data Artikel";
		$data['judul'] 		= "Data Artikel";
		$data['Status']   = $this->M_artikel->selek_status();	
		$this->loadkonten('v_artikel/tambah',$data);
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
		'status' 	           => $this->input->post('status'),
		'gambar'               => $path['link'] . ''. $image_data['file_name'],
		'created_by' 		   => $this->input->post('created_by'),
		'created_date'	       => date('Y-m-d H:i:s')
		);
		$result = $this->M_artikel->simpan_data($data);
			
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
		'status' 	           => $this->input->post('status'),
		'gambar'               => 'upload/gambar/no-image.png',
		'created_by' 		   => $this->input->post('created_by'),
		'created_date'	       => date('Y-m-d H:i:s')						 
					);  
	    $result = $this->M_artikel->simpan_data($data);
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
		$access = $this->M_sidebar->access('edit','kat-fasilitas');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Artikel";
			$data['judul'] 		= "Data Artikel";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
		$where=array('id_artikel' => $id);
		$data['promo']  = $this->M_artikel->select_by_id($id);
		$data['Status'] = $this->M_artikel->selek_status();	

		$data['page'] 		= "Data Artikel";
		$data['judul'] 		= "Data Artikel";
	    $this->loadkonten('v_artikel/update',$data);
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
		'id_artikel' 		   => $this->input->post('id_artikel')
		);	
		
		$data = array(
		'judul' 		       => $this->input->post('judul'),
		'deskripsi' 		   => $this->input->post('deskripsi'),
		'status' 	           => $this->input->post('status'),
		'gambar'               => $path['link'] . ''. $image_data['file_name'],
		'updated_by' 		   => $this->input->post('updated_by'),
		'updated_date'	       => date('Y-m-d H:i:s')
		);
		
		$result = $this->M_artikel->update($data,$where);
			
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		} 
		
		else {
			
		$where = array(
		'id_artikel' 		   => $this->input->post('id_artikel')
		);
		
		$data = array(
		'judul' 		       => $this->input->post('judul'),
		'deskripsi' 		   => $this->input->post('deskripsi'),
		'status' 	           => $this->input->post('status'),
		'updated_by' 		   => $this->input->post('updated_by'),
		'updated_date'	       => date('Y-m-d H:i:s')
		);
		
	    $result = $this->M_artikel->update($data,$where);
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		}

		echo json_encode($out);
	}
	
	public function hapus() {
		
	$token = $this->input->post('id_artikel');
	$gambar=$this->db->get_where('artikel',array('id_artikel'=>$token));
	if($gambar->num_rows()>0){
	$hasil=$gambar->row();
	$judul=$hasil->gambar;
	//hapus unlink foto
	if(file_exists($file=$judul)){
	unlink($file);
	}
	$this->db->delete('artikel',array('id_artikel'=>$token));
	}
	echo "{}";
	
	}
	
	
	
	
	
	
}
