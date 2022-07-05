<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Studi extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_studi');
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
		$data['page'] 		= "Data Bidang Studi";
		$data['judul'] 		= "Data Bidang Studi";
		
		$this->loadkonten('v_studi/home',$data);
	}

	public function ajax_list()
	{
		$list = $this->M_studi->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $studi) {
			$limit=word_limiter($studi->deskripsi, 35);
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = '<a href="'.base_url().''.$studi->gambar.'" target="_blank"><img class="img-thumbnail" src="'.base_url().''.$studi->gambar.'"   width="100" /></a>';    
			$row[] = $studi->nama_bidang_studi;
			$row[] = $limit;
			//add html for action
			$row[] =  anchor('edit-studi/'.$studi->id_bidang_studi, ' <span class="fa fa-edit"></span> ', ' class="btn btn-sm btn-primary ajaxify klik " '). 
				      '  <button class="btn btn-sm btn-danger hapus-studi" data-id='."'".$studi->id_bidang_studi."'".'><i class="glyphicon glyphicon-trash"></i></button>';
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
		$access = $this->M_sidebar->access('add','studi');
		if ($access->menuview == 0){
			$data['page'] 		= " Bidang Studi";
			$data['judul'] 		= " Bidang Studi";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
		$data['page'] 		= " Bidang Studi";
		$data['judul'] 		= " Bidang Studi";	
		$this->loadkonten('v_studi/tambah',$data);
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
		'nama_bidang_studi'	   => $this->input->post('nama_bidang_studi'),
		'deskripsi' 		   => $this->input->post('deskripsi'),
		// 'harga' 		       => $this->input->post('harga'),
		'gambar'               => $path['link'] . ''. $image_data['file_name'],
		// 'created_by' 		   => $this->input->post('created_by'),
		'created_date'	       => date('Y-m-d H:i:s'),
		'updated_date'	       => date('Y-m-d H:i:s')
		);
		$result = $this->M_studi->simpan_data($data);
			
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		
		} 
		
		else {
		$data = array( 
		'nama_bidang_studi'    => $this->input->post('nama_bidang_studi'),
		'deskripsi' 		   => $this->input->post('deskripsi'),
		// 'harga' 		       => $this->input->post('harga'),
		'gambar'               => 'upload/gambar/no-image.png',
		//'created_by' 		   => $this->input->post('created_by'),
		'created_date'	       => date('Y-m-d H:i:s'),
		'updated_date'	       => date('Y-m-d H:i:s')						 
					);  
	    $result = $this->M_studi->simpan_data($data);
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
		$access = $this->M_sidebar->access('edit','studi');
		if ($access->menuview == 0){
			$data['page'] 		= " Bidang Studi";
			$data['judul'] 		= " Bidang Studi";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
		$where=array('id_bidang_studi' => $id);
		$data['datastudi']  = $this->M_studi->select_by_id($id);

		$data['page'] 		= " Bidang Studi";
		$data['judul'] 		= " Bidang Studi";
	    $this->loadkonten('v_studi/update',$data);
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
		'id_bidang_studi' 		   => $this->input->post('id_bidang_studi')
		);	
		
		$data = array(
		'nama_bidang_studi' 		   => $this->input->post('nama_bidang_studi'),
		'deskripsi' 		   => $this->input->post('deskripsi'),
		// 'harga' 		       => $this->input->post('harga'),
		'gambar'               => $path['link'] . ''. $image_data['file_name'],
		//'updated_by' 		   => $this->input->post('updated_by'),
		'updated_date'	       => date('Y-m-d H:i:s'),
		);
		
		$result = $this->M_studi->update($data,$where);
			
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		} 
		
		else {
			
		$where = array(
		'id_bidang_studi' 		   => $this->input->post('id_bidang_studi')
		);
		
		$data = array( 
		'nama_bidang_studi' 		   => $this->input->post('nama_bidang_studi'),
		'deskripsi' 		   => $this->input->post('deskripsi'),
		// 'harga' 		       => $this->input->post('harga'),
		//'updated_by' 		   => $this->input->post('updated_by'),
		'updated_date'	       => date('Y-m-d H:i:s')						 
					);  
	    $result = $this->M_studi->update($data,$where);
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		}

		echo json_encode($out);
	}
	
	public function hapus() {
		
	$token = $this->input->post('id_bidang_studi');
	$gambar=$this->db->get_where('tbl_bidang_studi',array('id_bidang_studi'=>$token));
	if($gambar->num_rows()>0){
	$hasil=$gambar->row();
	$judul=$hasil->gambar;
	//hapus unlink foto
	if(file_exists($file=$judul)){
	unlink($file);
	}
	$this->db->delete('tbl_bidang_studi',array('id_bidang_studi'=>$token));
	}
	echo "{}";
	
	}
	
	
	
	
	
	
}
