<?php $this->load->view('_heading/_headerContent') ?>

<style>
.atas
{margin-top:-25px;}
.samping 
{margin-left:-30px;}
.samping2
{margin-left:-60px;}
.atas2
{margin-top:20px;}



</style>
		
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

			
            <div class="box-body">
				
			<div class="form-group">
			<label class="col-sm-2 control-label">Bidang Studi </label>
			<div class="col-sm-5">
			<p class="form-control-static"><?php echo $datajadwal->studi; ?></p>
			</div>
			</div>
			
			<div class="form-group">
			<label class="col-sm-2 control-label">Nama Siswa</label>
			<div class="col-sm-4">
            <p class="form-control-static"><?php echo $datajadwal->siswa; ?></p>
			</div>
			</div>
				
			
			<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Jadwal Kursus</label>
				
			<div class="col-sm-2 atas">
			<?php $replace= str_replace(',', '<li>', $datajadwal->hari); ?>
            <p class="form-control-static"><?php echo '<li>'. $replace.'</li>'; ?></p>
			</div>
				
			<div class="col-sm-2 atas samping">
			<?php $replace2= str_replace(',', '<li>', $datajadwal->jam); ?>
			<p class="form-control-static"><?php echo '<li>'. $replace2.'</li>'; ?></p>
			</div>
			<label class="col-sm-1 control-label samping2 atas2">Sampai</label>
			<div class="col-sm-2 atas">
			<?php $replace3= str_replace(',', '<li>', $datajadwal->jam2); ?>
			<p class="form-control-static"><?php echo '<li>'. $replace3.'</li>'; ?></p>
			</div> 
			</div>
				
			<div class="form-group">
            <label class="col-sm-2 control-label">Trainer</label>
            <div class="col-sm-6">
            <p class="form-control-static"><?php echo $datajadwal->trainer; ?></p>
            </div>
            </div>
				
			<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Pertemuan </label>
			<div class="col-sm-2">
			<p class="form-control-static"><?php echo $datajadwal->pertemuan; ?></p>
			</div> 
			</div>
			
			<div class="form-group">
			<label class="col-sm-2 control-label">Status Kursus</label>
			<div class="col-sm-4">
            <p class="form-control-static"><?php echo $datajadwal->status; ?></p>
			</div>
			</div>
			
			<div class="box-footer">
            <a class="klik ajaxify" href="<?php echo site_url('jadwal_selesai'); ?>"><button class="btn btn-primary btn-flat" ><i class="fa fa-arrow-left"></i> Kembali</button></a>
            </div>

             </div>
           
             </form>
			
          </div>
          <!-- /.box -->
       
          </div>
          <!-- /.row -->
		</div>

		</section>
		