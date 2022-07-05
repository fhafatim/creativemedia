<?php $this->load->view('_heading/_headerContent') ?>

		
		<section class="content">
		<!-- style loading -->
		<div class="loading2"></div>
		<!-- -->
		
		<div class="box">
        <div class="row">
        <div class="col-md-9">
       
        <div class="box-header with-border">
        <h3 class="box-title">View Data</h3>
         </div>
			
            <!-- /.box-header -->
            <!-- form start -->
			
			<form class="form-horizontal" id="form-tambah" method="POST">
			<input type="hidden" name="created_by" value="<?php echo $userdata->nama; ?>">
			
              <div class="box-body">
				
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
				<div class="col-sm-4">
				<p class="form-control-static"><?php echo $datamaster->nama_depan; ?> <?php echo $datamaster->nama_belakang; ?></p>
				</div> 
				</div>
				
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin</label>
				<div class="col-sm-10">
				<p class="form-control-static"><?php echo $datamaster->jenis_kelamin; ?></p>
				</div>
				</div>	
				
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Handphone</label>
				<div class="col-sm-6">
				<p class="form-control-static"><?php echo $datamaster->handphone; ?></p>
				</div> 
				</div>
				
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-6">
				<p class="form-control-static"><?php echo $datamaster->email; ?></p>
				</div> 
				</div>
				
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
				<div class="col-sm-6">
				<p class="form-control-static"><?php echo $datamaster->alamat; ?></p>
				</div> 
				</div>
			
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Bidang Studi</label>
				<div class="col-sm-6">
				<p class="form-control-static"><?php echo $datamaster->bidang_studi; ?></p>
				</div> 
				</div>
				
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Jenis Kursus</label>
				<div class="col-sm-6">
				<p class="form-control-static"><?php echo $datamaster->jenis_kursus; ?></p>
				</div> 
				</div>
				
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Status Siswa</label>
				<div class="col-sm-6">
				<p class="form-control-static"><?php echo $datamaster->status; ?></p>
				</div> 
				</div>
				
			   <div class="box-footer">
               <a class="klik ajaxify" href="<?php echo site_url('alumni_siswa'); ?>"><button class="btn btn-primary btn-flat" ><i class="fa fa-arrow-left"></i> Kembali</button></a>
               </div>

              </div>
            </form>
			
          </div>
          <!-- /.box -->
       
          </div>
          <!-- /.row -->
		</div>

		</section>
		