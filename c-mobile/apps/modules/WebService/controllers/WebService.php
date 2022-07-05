<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');

class WebService extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_service');
	}
	
	
	// function login web service
	function checklogin(){
		
                $datainput = json_decode(file_get_contents('php://input'), true);
               
                $data=array(
                    'username'=>$datainput['username'],
                    'password'=>$datainput['password'],
                );
                $res=$this->M_service->login($data);
                if($res){
	                if($res[0]->tipe == "trainer"){
		                $this->M_service->updatetoken($datainput['token'], 'trainer', $datainput['username']);
	                	$res2=$this->M_service->getTrainer($res[0]->username);
						$res3=$this->M_service->getHistori($res[0]->nama);
						$res4=$this->M_service->getJadwal2($res[0]->nama);
		                $result = array(
		                	'status'=> 'true',
		                	'tipe'=> 'trainer',
							'Histori'=> $res3,
							'Jadwal'=> $res4,
		                	'data'=> $res2,
							'pesan'=>'hallo '.$datainput['username'].' jangan lupa ya hari ini ada jadwal mengajar, jika ada pertanyaan atau kendala silahkan hubungi Customer Service di menu kontak !!'
							
		            	);
		                echo json_encode($result);
					}
						
				    else if($res[0]->status == "Belum Aktif"){
		               
		                $result = array(
		                	'status'=> 'false',
							'pesan'=> 'Maaf akun belum aktif',
		            	);
		                echo json_encode($result);
						
	                } else {
		                $this->M_service->updatetoken($datainput['token'], 'siswa', $datainput['username']);
	                	$res2=$this->M_service->getSiswa($res[0]->username);
						$res3=$this->M_service->getSiswa2($res[0]->nama);
						$res4=$this->M_service->getJadwal($res[0]->nama);
						
		                $result = array(
		                	'status'=> 'true',
		                	'tipe'=> 'siswa',
							'Histori'=> $res3,
							'Jadwal'=> $res4,
		                	'data'=> $res2,
							'foto'=> $res[0]->photo,
							'pesan'=>'hallo '.$res[0]->nama.' jangan lupa ya hari ini ada jadwal kursus, jika ada pertanyaan atau kendala silahkan hubungi Customer Service di menu kontak !!'
							
		            	);
		                echo json_encode($result);
	                }
	            }
				
				  else{
	                $result = array(
	                	'status'=>  'false',
						'pesan'=> 'Maaf username atau password salah',
	            	);
	                echo json_encode($result);
	            }
			}
			
			
		// registrasi siswa
		public function daftar() {
		
		$string1 = $this->input->post('nama_depan');
		$string2 = $this->input->post('nama_belakang');
		$nama= $string1 . " ". $string2;
		$kode = $this->M_service->kode();
   
        $data = array( 
        'no_registrasi' 		 => $kode,
		'nama_depan' 		   	 => $this->input->post('nama_depan'),
		'nama_belakang' 		 => $this->input->post('nama_belakang'),
		'jenis_kelamin' 		 => $this->input->post('jenis_kelamin'),
		'handphone' 		     => $this->input->post('handphone'),
		'email' 		   		 => $this->input->post('email'),
		'alamat' 		         => $this->input->post('alamat'),
		'kota' 		             => $this->input->post('kota'),
		'kode_pos' 		         => $this->input->post('kode_pos'),
		'provinsi' 		         => $this->input->post('provinsi'),
		'warganegara' 		     => $this->input->post('warganegara'),
		'pendidikan_terakhir'    => $this->input->post('pendidikan_terakhir'),
		'bidang_studi' 		     => $this->input->post('bidang_studi'),
		'nama'                   => $nama,
		
// 		'nama_ayah' 		   	 => $this->input->post('nama_ayah'),
// 		'alamat_ayah' 		   	 => $this->input->post('alamat_ayah'),
// 		'ktp_ayah' 		   	     => $this->input->post('ktp_ayah'),
// 		'pekerjaan_ayah' 		 => $this->input->post('pekerjaan_ayah'),
// 		'pendidikan_ayah' 		 => $this->input->post('pendidikan_ayah'),
// 		'tempat_lahir_ayah'      => $this->input->post('tempat_lahir_ayah'),
// 		'tggal_lahir_ayah'       => $this->input->post('tggal_lahir_ayah'),
// 		'penghasilan_ayah' 		 => $this->input->post('penghasilan_ayah'),
// 		'telpon_ayah' 		     => $this->input->post('telpon_ayah'),
// 		'email_ayah' 		     => $this->input->post('email_ayah'),
		
// 		'nama_ibu' 		   	     => $this->input->post('nama_ibu'),
// 		'alamat_ibu' 		   	 => $this->input->post('alamat_ibu'),
// 		'ktp_ibu' 		   	     => $this->input->post('ktp_ibu'),
// 		'pekerjaan_ibu' 		 => $this->input->post('pekerjaan_ibu'),
// 		'pendidikan_ibu' 		 => $this->input->post('pendidikan_ibu'),
// 		'tempat_lahir_ibu'       => $this->input->post('tempat_lahir_ibu'),
// 		'tggal_lahir_ibu'        => $this->input->post('tggal_lahir_ibu'),
// 		'penghasilan_ibu' 		 => $this->input->post('penghasilan_ibu'),
// 		'telpon_ibu' 		     => $this->input->post('telpon_ibu'),
// 		'email_ibu' 		     => $this->input->post('email_ibu'),
		
		'created_date'		     => date('Y-m-d H:i:s'),
		'tanggal'		         => date('Y-m-d')									 
		); 
		
		$data2 = array( 
	    'no_registrasi' 		 => $kode,
		'nama_depan' 		   	 => $this->input->post('nama_depan'),
		'nama_belakang' 		 => $this->input->post('nama_belakang'),
		'jenis_kelamin' 		 => $this->input->post('jenis_kelamin'),
		'handphone' 		     => $this->input->post('handphone'),
		'email' 		   		 => $this->input->post('email'),
		'alamat' 		         => $this->input->post('alamat'),
		'bidang_studi' 		     => $this->input->post('bidang_studi'),
		'nama'                   => $nama,
		'status'				 => 'Belum Aktif',
		'created_date'		     => date('Y-m-d H:i:s'),
		'tanggal'		         => date('Y-m-d')									 
		); 
		
		$data3=array(
		'username' 		       => $kode,
		'nama'                 => $nama,
		'tipe'                 => 'siswa',	
		'status'               => 'Belum Aktif'		
		);
		
        
         $checkuser = $this->M_service->checkUsername($data);
	     if(!$checkuser){
		 $res=$this->M_service->saveRegis($data);
		 $res=$this->M_service->saveSiswa($data2);
		 $res=$this->M_service->insertLogin($data3);
		 $result = array(
	     'status'=>  'true',
		 'pesan'=>   'Pendaftaran berhasil, untuk dapat login di aplikasi admin kami akan melakukan verifikasi data Anda. Harap menunggu... ',
		 'data'=> $res
	      );
		 echo json_encode($result);
		 } 
		 else {
		 $result = array(
	     'status'=>  'false',
		 'pesan'=>   'Maaf registrasi gagal / email sudah terdaftar',
	      );
		 echo json_encode($result);
		 }
      }
	  
	  
	    // selek web service bidang_studi
	      public function selek_bidang_studi(){
		  $res = $this->M_service->selek_studi();
		  if($res){
		  $result = array(
          'status'=>  'true',
           'data'=> $res
           );
		   } else {
           $result = array(
           'status'=>  'false'
           );  
           } 	
            echo json_encode($result);
		}
		
		// selek web service galeri
	      public function selek_galeri(){
		  $res = $this->M_service->selek_galeri();
		  if($res){
		  $result = array(
          'status'=>  'true',
           'data'=> $res
           );
		   } else {
           $result = array(
           'status'=>  'false'
           );  
           } 	
            echo json_encode($result);
		}
		
		// selek web service fasilitas INFRASTRUKTUR
	      public function selek_fasilitas1(){
		  $res = $this->M_service->selek_fasilitas1();
		  if($res){
		  $result = array(
          'status'=>  'true',
           'data'=> $res
           );
		   } else {
           $result = array(
           'status'=>  'false'
           );  
           } 	
            echo json_encode($result);
		}
		
		// selek web service fasilitas STARTERKIT
	      public function selek_fasilitas2(){
		  $res = $this->M_service->selek_fasilitas2();
		  if($res){
		  $result = array(
          'status'=>  'true',
           'data'=> $res
           );
		   } else {
           $result = array(
           'status'=>  'false'
           );  
           } 	
            echo json_encode($result);
		}
	  
	  
	   // selek web service promo
	      public function selek_promo(){
		  $res = $this->M_service->selek_promo();
		  if($res){
		  $result = array(
          'status'=>  'true',
           'data'=> $res
           );
		   } else {
           $result = array(
           'status'=>  'false'
           );  
           } 	
            echo json_encode($result);
			}
			
			
	   // selek web service loker
	      public function selek_loker(){
		  $res = $this->M_service->selek_loker();
		  if($res){
		  $result = array(
          'status'=>  'true',
           'data'=> $res
           );
		   } else {
           $result = array(
           'status'=>  'false'
           );  
           } 	
            echo json_encode($result);
		  }
		  
		  
		  		
	   // selek web service loker
	      public function selek_artikel(){
		  $res = $this->M_service->selek_artikel();
		  if($res){
		  $result = array(
          'status'=>  'true',
           'data'=> $res
           );
		   } else {
           $result = array(
           'status'=>  'false'
           );  
           } 	
            echo json_encode($result);
		  }
		  
		  
		   // selek web service loker
	      public function selek_artikel_acak(){
		  $res = $this->M_service->selek_artikel_acak();
		  if($res){
		  $result = array(
          'status'=>  'true',
           'data'=> $res
           );
		   } else {
           $result = array(
           'status'=>  'false'
           );  
           } 	
            echo json_encode($result);
		  }
		
		
			
			 // untuk cek apakah ada order (driver )
			
				function notifikasi(){
				$datainput = json_decode(file_get_contents('php://input'), true);
				$siswa=$datainput['siswa'];
				$trainer=$datainput['trainer'];
				if ($siswa == null){
				$result = array(
                'status'=>  'false'
            	); 
				}
				
				else if ($trainer == null){
				$result = array(
                'status'=>  'false'
            	); 
				}
				
				else{
				 	$res = $this->M_service->getnotif($datainput['siswa']); 
					$res2 = $this->M_service->getnotif2($datainput['trainer']); 
				}
		
            	if($res){
				$result = array(
                	'status'=>  'true',
                	'siswa'=> $res,
					'trainer'=> $res2,
            	);
				}
            	else
            	{
            	    $result = array(
                	'status'=>  'false'
            	 );  
            	}
            	
            echo json_encode($result);
			}
			
			
			
			
			// untuk edit profile siswa foto
			function editphoto(){
				
				$config['upload_path']="./upload/gambar/";
				$config['allowed_types']='gif|jpg|png|jpeg';
				$config['max_size'] = '2048'; //maksimum besar file 2M
				$config['encrypt_name'] = TRUE;
				$config['overwrite'] = TRUE;
 
				$this->load->library('upload', $config);
				$path['link']= "upload/gambar/";
 
				$this->upload->do_upload('photo');
				$image_data = $this->upload->data();
        
			    $data=array(
				'username' 		   		 => $this->input->post('username'),
				'photo'                  => $path['link'] . ''. $image_data['file_name'],				
				);
				$res = $this->M_service->updateSiswa($data);
				
				if($res){
				$result = array(
                	'status'=>  'true',
                	'pesan' =>  'Photo berhasil di update',
            	);
				}

            	else
            	{
            	    $result = array(
                	'status'=>  'false',
					'pesan' =>  'photo gagal di update',
            	 );
            	 
            	}
				
            	echo json_encode($result);
		 
			}
			
			
			
			// untuk edit profile siswa password
			function editpassword(){

			    $data=array(
				'username' 		   		 => $this->input->post('username'),				
				'password' 		   		 => $this->input->post('password')
				);
				$res = $this->M_service->updateSiswa($data);
				
				
				if($res){
				$result = array(
                	'status'=>  'true',
                	'pesan' =>  'password berhasil di update',
            	);
				}

            	else
            	{
            	    $result = array(
                	'status'=>  'false',
					'pesan' =>  'password gagal di update',
            	 );
            	 
            	}
				
            	echo json_encode($result);
		 
			}
			
			
			
			function ceklogin(){
               
                $data=array(
                    'username'=>$this->uri->segment(3),
                    'password'=>$this->uri->segment(4),
                );
                $res=$this->M_service->login($data);
                if($res){
                    if($res[0]->kategori_login == "tentor"){
                        
                        $tentor =$this->M_service->getTentor($res[0]->id_login);
                    
    	                $result = array(
    	                	'status'=>  'true',
    						'pesan'=> 'Login Berhasil',
    						'kategori'=>  'tentor',
    						'id_tentor'=> $tentor->id_tentor,
    						'nama_tentor'=> $tentor->nama_tentor,
    						'alamat_tentor'=> $tentor->alamat,
    						'telepon_tentor'=> $tentor->telepon,
    						'foto_tentor'=> $tentor->gambar,
    	            	);
    	            	
                    } else {
                        $siswa =$this->M_service->getSiswa3($res[0]->id_login);
                    
    	                $result = array(
    	                	'status'=>  'true',
    						'pesan'=> 'Login Berhasil',
    						'kategori'=>  'siswa',
    						'id_siswa'=> $siswa->id_siswa,
    						'nama_siswa'=> $siswa->nama_siswa,
    						'alamat_siswa'=> $siswa->alamat,
    						'telepon_siswa'=> $siswa->telepon,
    						'foto_siswa'=> $siswa->gambar,
    	            	);
                    }
	                
	            }else{
	                $result = array(
	                	'status'=>  'false',
						'pesan'=> $this->input->post('username'),
	            	);
	                
	            }
	            echo json_encode($result);
			}
			
			public function selek_kursus_siswa_berjalan($id_siswa){
		        $res = $this->M_service->selek_kursus_siswa_berjalan($id_siswa);
		        if($res){
		            $result = array(
                        'status'=>  'true',
                        'data'=> $res
                    );
		        } else {
                    $result = array(
                        'status'=>  'false'
                    );  
                } 	
                echo json_encode($result);
		   }
		   
		   public function selek_kursus_siswa_selesai($id_siswa){
		        $res = $this->M_service->selek_kursus_siswa_selesai($id_siswa);
		        if($res){
		            $result = array(
                        'status'=>  'true',
                        'data'=> $res
                    );
		        } else {
                    $result = array(
                        'status'=>  'false'
                    );  
                } 	
                echo json_encode($result);
		   }
		   
		   public function selek_kursus_tentor_berjalan($id_tentor){
		        $res = $this->M_service->selek_kursus_tentor_berjalan($id_tentor);
		        if($res){
		            $result = array(
                        'status'=>  'true',
                        'data'=> $res
                    );
		        } else {
                    $result = array(
                        'status'=>  'false'
                    );  
                } 	
                echo json_encode($result);
		   }
		   
		  public function selek_kursus_tentor_selesai($id_tentor){
		        $res = $this->M_service->selek_kursus_tentor_selesai($id_tentor);
		        if($res){
		            $result = array(
                        'status'=>  'true',
                        'data'=> $res
                    );
		        } else {
                    $result = array(
                        'status'=>  'false'
                    );  
                } 	
                echo json_encode($result);
		   }
		  
		  public function selek_jadwal_kursus($id_kelas){
		        $res = $this->M_service->selek_jadwal_kursus($id_kelas);
		        if($res){
		            $result = array(
                        'status'=>  'true',
                        'data'=> $res
                    );
		        } else {
                    $result = array(
                        'status'=>  'false'
                    );  
                } 	
                echo json_encode($result);
		  }
		  
		  public function add_gbmp() {
		
		    $pertemuan = $this->input->post('pertemuan');
		    $materi = $this->input->post('materi');
		    $id_kelas = $this->input->post('id_kelas');
		    
		    $data = array( 
        	    'id_kelas' 		         => '67',
        		'tanggal' 		   	     => date('Y-m-d'),
        		'pertemuan' 		     => $pertemuan,
        		'keterangan' 		   	 => $materi,
        		'status_jadwal' 		 => 'selesai',
        		'created_date'		     => date('Y-m-d H:i:s'),
        		'updated_date'		     => date('Y-m-d H:i:s'),									 
        	); 
        	
        	$this->db->insert('tbl_jadwal',$data);
        	
        	$result = array(
    	     'status'=>  true,
    		 'result'=>   'Data Berhasil Disimpan',
    	    );
    	    
    	    echo json_encode($result);
		    
		  }
		  
		  public function add_jadwal() {
		
		    $hari = $this->input->post('hari');
		    $jam_mulai = $this->input->post('jam_mulai');
		    
		    $data = array( 
        	    'id_kelas' 		         => '67',
        		'hari' 		     => $hari,
        		'jam_mulai' 	 => $jam_mulai,								 
        	); 
        	
        	$this->db->insert('tbl_detail_jadwal',$data);
        	
        	$result = array(
    	     'status'=>  true,
    		 'result'=>   'Data Berhasil Disimpan',
    	    );
    	    
    	    echo json_encode($result);
		    
		  }
		 
			
		   public function selek_gbmp($id_kelas){
		        $res = $this->M_service->selek_gbmp($id_kelas);
		        if($res){
		            $result = array(
                        'status'=>  'true',
                        'data'=> $res
                    );
		        } else {
                    $result = array(
                        'status'=>  'false'
                    );  
                } 	
                echo json_encode($result);
		   }
			
			
}
