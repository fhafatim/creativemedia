<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_fasilitas');
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
		$data['page'] 		= "Data Fasilitas";
		$data['judul'] 		= "Data Fasilitas";
		
		$this->loadkonten('v_fasilitas/home',$data);
	}

	public function ajax_list()
	{
		$list = $this->M_fasilitas->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $fasilitas) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = '<a href="'.base_url().''.$fasilitas->gambar.'" target="_blank"><img class="img-thumbnail" src="'.base_url().''.$fasilitas->gambar.'"   width="100" /></a>';    
			$row[] = $fasilitas->judul;
			$row[] = $fasilitas->type;
			//add html for action
			$row[] =  anchor('edit-fasilitas/'.$fasilitas->id_fasilitas, ' <span class="fa fa-edit"></span> ', ' class="btn btn-sm btn-primary ajaxify klik " '). 
				      '  <button class="btn btn-sm btn-danger hapus-fasilitas" data-id='."'".$fasilitas->id_fasilitas."'".'><i class="glyphicon glyphicon-trash"></i></button>';
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
		$access = $this->M_sidebar->access('add','fasilitas');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Fasilitas";
			$data['judul'] 		= "Data Fasilitas";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
		$data['page'] 		= "Data Fasilitas";
		$data['judul'] 		= "Data Fasilitas";
		$data['tipe']       = $this->M_fasilitas->selek_tipe();
		$this->loadkonten('v_fasilitas/tambah',$data);
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
		//Compress Image
         $config['image_library']='gd2';
         $config['source_image']='./upload/gambar/'.$image_data['file_name'];
         $config['create_thumb']= FALSE;
         $config['maintain_ratio']= FALSE;
         $config['quality']= '100%';
         $config['width']= 500;
         $config['height']= 300;
         $config['new_image']= './upload/gambar/'.$image_data['file_name'];
         $this->load->library('image_lib', $config);
         $this->image_lib->resize();
		$path['link']= "upload/gambar/";
		
		$data = array(
		'judul' 		       => $this->input->post('judul'),
		'type' 		           => $this->input->post('type'),
		'gambar'               => $path['link'] . ''. $image_data['file_name'],
		'created_by' 		   => $this->input->post('created_by'),
		'created_date'	       => date('Y-m-d H:i:s')
		);
		$result = $this->M_fasilitas->simpan_data($data);
			
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		
		} 
		
		else {
		$data = array( 
		'judul' 		       => $this->input->post('judul'),
		'type' 		           => $this->input->post('type'),
		'gambar'               => 'upload/gambar/no-image.png',
		'created_by' 		   => $this->input->post('created_by'),
		'created_date'	       => date('Y-m-d H:i:s')						 
					);  
	    $result = $this->M_fasilitas->simpan_data($data);
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
		$access = $this->M_sidebar->access('edit','fasilitas');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Fasilitas";
			$data['judul'] 		= "Data Fasilitas";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
		$where=array('id_fasilitas' => $id);
		$data['datafasilitas']  = $this->M_fasilitas->select_by_id($id);
		$data['tipe']       = $this->M_fasilitas->selek_tipe();

		$data['page'] 		= "Data Fasilitas";
		$data['judul'] 		= "Data Fasilitas";
	    $this->loadkonten('v_fasilitas/update',$data);
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
		//Compress Image
         $config['image_library']='gd2';
         $config['source_image']='./upload/gambar/'.$image_data['file_name'];
         $config['create_thumb']= FALSE;
         $config['maintain_ratio']= FALSE;
         $config['quality']= '100%';
         $config['width']= 500;
         $config['height']= 300;
         $config['new_image']= './upload/gambar/'.$image_data['file_name'];
         $this->load->library('image_lib', $config);
         $this->image_lib->resize();
		 $path['link']= "upload/gambar/";
		
		$where = array(
		'id_fasilitas' 		   => $this->input->post('id_fasilitas')
		);	
		
		$data = array(
		'judul' 		       => $this->input->post('judul'),
		'type' 		           => $this->input->post('type'),
		'gambar'               => $path['link'] . ''. $image_data['file_name'],
		'created_by' 		   => $this->input->post('created_by'),
		'created_date'	       => date('Y-m-d H:i:s')
		);
		
		$result = $this->M_fasilitas->update($data,$where);
			
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		} 
		
		else {
			
		$where = array(
		'id_fasilitas' 		   => $this->input->post('id_fasilitas')
		);
		
		$data = array(
		'judul' 		       => $this->input->post('judul'),
		'type' 		           => $this->input->post('type'),
		'created_by' 		   => $this->input->post('created_by'),
		'created_date'	       => date('Y-m-d H:i:s')
		);
		
	    $result = $this->M_fasilitas->update($data,$where);
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		}

		echo json_encode($out);
	}
	
	public function hapus() {
		
	$token = $this->input->post('id_fasilitas');
	$gambar=$this->db->get_where('fasilitas',array('id_fasilitas'=>$token));
	if($gambar->num_rows()>0){
	$hasil=$gambar->row();
	$judul=$hasil->gambar;
	//hapus unlink foto
	if(file_exists($file=$judul)){
	unlink($file);
	}
	$this->db->delete('fasilitas',array('id_fasilitas'=>$token));
	}
	echo "{}";
	
	}
	
	
	
	
	
	
}