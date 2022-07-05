<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_galeri');
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
		$data['page'] 		= "Data Galeri";
		$data['judul'] 		= "Data Galeri";
		
		$this->loadkonten('v_galeri/home',$data);
	}

	public function ajax_list()
	{
		$list = $this->M_galeri->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $galeri) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = '<a href="'.base_url().''.$galeri->gambar.'" target="_blank"><img class="img-thumbnail" src="'.base_url().''.$galeri->gambar.'"   width="100" /></a>';    
			$row[] = $galeri->judul;
			//add html for action
			$row[] =  anchor('edit-galeri/'.$galeri->id_gallery, ' <span class="fa fa-edit"></span> ', ' class="btn btn-sm btn-primary ajaxify klik " '). 
				      '  <button class="btn btn-sm btn-danger hapus-galeri" data-id='."'".$galeri->id_gallery."'".'><i class="glyphicon glyphicon-trash"></i></button>';
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
		$access = $this->M_sidebar->access('add','galeri');
		if ($access->menuview == 0){
		$data['page'] 		= "Data Galeri";
		$data['judul'] 		= "Data Galeri";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
		$data['page'] 		= "Data Galeri";
		$data['judul'] 		= "Data Galeri";
		$this->loadkonten('v_galeri/tambah',$data);
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
		'gambar'               => $path['link'] . ''. $image_data['file_name'],
		'created_by' 		   => $this->input->post('created_by'),
		'created_date'	       => date('Y-m-d H:i:s')
		);
		$result = $this->M_galeri->simpan_data($data);
			
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		
		} 
		
		else {
		$data = array( 
		'judul' 		       => $this->input->post('judul'),
		'gambar'               => 'upload/gambar/no-image.png',
		'created_by' 		   => $this->input->post('created_by'),
		'created_date'	       => date('Y-m-d H:i:s')						 
					);  
	    $result = $this->M_galeri->simpan_data($data);
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
		$access = $this->M_sidebar->access('edit','galeri');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Galeri";
			$data['judul'] 		= "Data Galeri";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
		$where=array('id_gallery' => $id);
		$data['galeri']  = $this->M_galeri->select_by_id($id);
		$data['page'] 		= "Data Galeri";
		$data['judul'] 		= "Data Galeri";
	    $this->loadkonten('v_galeri/update',$data);
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
		'id_gallery' 		   => $this->input->post('id_gallery')
		);	
		
		$data = array(
		'judul' 		       => $this->input->post('judul'),
		'gambar'               => $path['link'] . ''. $image_data['file_name'],
		'created_by' 		   => $this->input->post('created_by'),
		'created_date'	       => date('Y-m-d H:i:s')
		);
		
		$result = $this->M_galeri->update($data,$where);
			
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		} 
		
		else {
			
		$where = array(
		'id_gallery' 		   => $this->input->post('id_gallery')
		);
		
		$data = array(
		'judul' 		       => $this->input->post('judul'),
		'created_by' 		   => $this->input->post('created_by'),
		'created_date'	       => date('Y-m-d H:i:s')
		);
		
	    $result = $this->M_galeri->update($data,$where);
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		}

		echo json_encode($out);
	}
	
// 	public function hapus() {
		
// 	$token = $this->input->post('id_gallery');
// 	$gambar=$this->db->get_where('gallery',array('id_gallery'=>$token));
// 	if($gambar->num_rows()>0){
// 	$hasil=$gambar->row();
// 	$judul=$hasil->gambar;
// 	//hapus unlink foto
// 	if(file_exists($file=$judul)){
// 	unlink($file);
// 	}
// 	$this->db->delete('gallery',array('id_gallery'=>$token));
// 	}
// 	echo "{}";
	
// 	}


	public function hapus() {
		$id = $_POST['id_gallery'];
		$result = $this->M_galeri->hapus($id);
		
		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
	}
	
	
	
	
	
	
	
}
