<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends AUTH_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_promo');
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
		$data['page'] 		= "Data Promo";
		$data['judul'] 		= "Data Promo";
		
		$this->loadkonten('v_promo/home',$data);
	}

	public function ajax_list()
	{
		$list = $this->M_promo->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $promo) {
			$limit=word_limiter($promo->deskripsi, 50);
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = '<a href="'.base_url().''.$promo->gambar.'" target="_blank"><img class="img-thumbnail" src="'.base_url().''.$promo->gambar.'"   width="100" /></a>';    
			$row[] = $promo->judul;
			$row[] = $limit;
			$row[] = '<small class="label pull-center bg-blue">'.$promo->status.'</small">';
			//add html for action
			$row[] =  anchor('edit-promo/'.$promo->id_promo, ' <span class="fa fa-edit"></span> ', ' class="btn btn-sm btn-primary ajaxify klik " '). 
				      '  <button class="btn btn-sm btn-danger hapus-promo" data-id='."'".$promo->id_promo."'".'><i class="glyphicon glyphicon-trash"></i></button>';
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
			$data['page'] 		= "Data Promo";
			$data['judul'] 		= "Data Promo";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		
		/*ini harus ada boss */
		
		else{
		$data['page'] 		= "Data Promo";
		$data['judul'] 		= "Data Promo";
		$data['Status']   = $this->M_promo->selek_status();	
		$this->loadkonten('v_promo/tambah',$data);
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
         $config['width']= 1200;
         $config['height']= 630;
         $config['new_image']= './upload/gambar/'.$image_data['file_name'];
         $this->load->library('image_lib', $config);
         $this->image_lib->resize();
		 $path['link']= "upload/gambar/";
		
		$data = array(
		'judul' 		       => $this->input->post('judul'),
		'deskripsi' 		   => $this->input->post('deskripsi'),
		'priode_promo' 	       => $this->input->post('priode_promo'),
		'status' 	           => $this->input->post('status'),
		'gambar'               => $path['link'] . ''. $image_data['file_name'],
		'created_by' 		   => $this->input->post('created_by'),
		'created_date'	       => date('Y-m-d H:i:s')
		);
		$result = $this->M_promo->simpan_data($data);
			
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		
		//firebase api
		
		$API_ACCESS_KEY = "AIzaSyDqBMLh8OvDKE-4y_r2gs_5wgeG3ZXClXU";
        $url = 'https://fcm.googleapis.com/fcm/send';
        
        $fields = array (
            'to' => '/topics/all',
            'notification' => array(
                        'title' => 'C-Mobile',
                        'body' => 'Hai sobat Creative, ada promo terbaru nih silahkan di cek !!!',
                        "sound"=>"Enabled",
                        "priority"=>"High",
                        
            ),
          );
         $fields = json_encode ( $fields );
         
         $headers = array (
            'Authorization: key=' . $API_ACCESS_KEY,
            'Content-Type: application/json'
        );
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
        $result = curl_exec ( $ch );
        curl_close ( $ch );
		
		
		} 
		
		else {
		$data = array( 
		'judul' 		       => $this->input->post('judul'),
		'deskripsi' 		   => $this->input->post('deskripsi'),
		'priode_promo' 	       => $this->input->post('priode_promo'),
		'status' 	           => $this->input->post('status'),
		'gambar'               => 'upload/gambar/no-image.png',
		'created_by' 		   => $this->input->post('created_by'),
		'created_date'	       => date('Y-m-d H:i:s')						 
					);  
	    $result = $this->M_promo->simpan_data($data);
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		
		//firebase api
		
		$API_ACCESS_KEY = "AIzaSyDqBMLh8OvDKE-4y_r2gs_5wgeG3ZXClXU";
        $url = 'https://fcm.googleapis.com/fcm/send';
        
        $fields = array (
            'priority' => 'high',
            'to' => '/topics/all',
            'notification' => array(
                        'title' => 'C-Mobile',
                        'body' => 'Hai sobat Creative, ada promo terbaru nih silahkan di cek !!!',
                        "sound"=>"Enabled",
                        "priority"=>"High",
            ),
          );
         $fields = json_encode ( $fields );
         
         $headers = array (
            'Authorization: key=' . $API_ACCESS_KEY,
            'Content-Type: application/json'
        );
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
        $result = curl_exec ( $ch );
        curl_close ( $ch );
		
		
		
		
		
		}

		echo json_encode($out);
	}
	
	
	public function Edit($id) {
		
		/*ini harus ada boss */
		$data['userdata'] = $this->userdata;
		$access = $this->M_sidebar->access('edit','kat-fasilitas');
		if ($access->menuview == 0){
			$data['page'] 		= "Data Promo";
			$data['judul'] 		= "Data Promo";
			$this->loadkonten('Dashboard/layouts/no_akses',$data);
		 }
		 /*ini harus ada boss */
		 else{
		
		$where=array('id_promo' => $id);
		$data['promo']  = $this->M_promo->select_by_id($id);
		$data['Status'] = $this->M_promo->selek_status();	

		$data['page'] 		= "Data Promo";
		$data['judul'] 		= "Data Promo";
	    $this->loadkonten('v_promo/update',$data);
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
         $config['width']= 1200;
         $config['height']= 630;
         $config['new_image']= './upload/gambar/'.$image_data['file_name'];
         $this->load->library('image_lib', $config);
         $this->image_lib->resize();
		 $path['link']= "upload/gambar/";
		
		$where = array(
		'id_promo' 		   => $this->input->post('id_promo')
		);	
		
		$data = array(
		'judul' 		       => $this->input->post('judul'),
		'deskripsi' 		   => $this->input->post('deskripsi'),
		'priode_promo' 	       => $this->input->post('priode_promo'),
		'status' 	           => $this->input->post('status'),
		'gambar'               => $path['link'] . ''. $image_data['file_name'],
		'updated_by' 		   => $this->input->post('updated_by'),
		'updated_date'	       => date('Y-m-d H:i:s')
		);
		
		$result = $this->M_promo->update($data,$where);
			
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		} 
		
		else {
			
		$where = array(
		'id_promo' 		   => $this->input->post('id_promo')
		);
		
		$data = array(
		'judul' 		       => $this->input->post('judul'),
		'deskripsi' 		   => $this->input->post('deskripsi'),
		'priode_promo' 	       => $this->input->post('priode_promo'),
		'status' 	           => $this->input->post('status'),
		'updated_by' 		   => $this->input->post('updated_by'),
		'updated_date'	       => date('Y-m-d H:i:s')
		);
		
	    $result = $this->M_promo->update($data,$where);
		if ($result > 0) {
		$out['status'] = 'berhasil';
		} else {
		$out['status'] = 'gagal';
		}
		}

		echo json_encode($out);
	}
	
	public function hapus() {
		
	$token = $this->input->post('id_promo');
	$gambar=$this->db->get_where('promo',array('id_promo'=>$token));
	if($gambar->num_rows()>0){
	$hasil=$gambar->row();
	$judul=$hasil->gambar;
	//hapus unlink foto
	if(file_exists($file=$judul)){
	unlink($file);
	}
	$this->db->delete('promo',array('id_promo'=>$token));
	}
	echo "{}";
	
	}                                   
	
	
	
	
	
	
}
