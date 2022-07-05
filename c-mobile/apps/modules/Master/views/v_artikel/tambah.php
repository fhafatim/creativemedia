<?php $this->load->view('_heading/_headerContent') ?>
		
		
		<section class="content">
		<!-- style loading -->
		<div class="loading2"></div>
		<!-- -->
		
		<div class="box">
        <div class="row">
        <div class="col-md-8">
       
        <div class="box-header with-border">
        <h3 class="box-title">Tambah Data</h3>
         </div>
			
            <!-- /.box-header -->
            <!-- form start -->
			
			<form class="form-horizontal" id="form-tambah" method="POST">
			<input type="hidden" name="created_by" value="<?php echo $userdata->nama; ?>">
			
            <div class="box-body">
            <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Judul </label>
            <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="judul artikel" name="judul" aria-describedby="sizing-addon2">
            </div>
            </div>
			
			<div class="form-group">
            <label class="col-sm-2 control-label">Deskripsi</label>
            <div class="col-sm-9">
            <textarea id="summernote" name="deskripsi"></textarea>
            </div>
            </div>
			
			
			
			<div class="form-group">
			<div id="slider">
			<img class="img-thumbnail" src="<?php echo base_url();?>/assets/tambahan/gambar/tidak-ada.png" alt="your image" />
			</div>
			
            <label for="inputFoto" class="col-sm-2 control-label">Image</label>
            <div class="col-sm-8">
            <input type="file" class="form-control" name="gambar" id="gambar" onchange="return fileValidation()"/>
			<p style='color: red; font-size: 14px;'> * maksimal size 2 MB</p>
            </div>
			</div>
			
			 <div class="form-group">
             <label class="col-sm-2 control-label">Status </label>
                <div class="col-sm-3">
                <select name="status" class="form-control selek-status" aria-describedby="sizing-addon2">
				<?php
				foreach ($Status as $data) {
				?>
				<option value="<?php echo $data->nama; ?>">
				<?php echo $data->nama; ?>
				</option>
				<?php
				}
				?>
				</select>
                </div>
                </div>

            </div>
            <div class="box-footer">
            <button name="simpan" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-warning btn-flat"><i class="fa fa-retweet"></i> Cancel</button>
			 <a class="klik ajaxify" href="<?php echo site_url('artikel'); ?>"><button class="btn btn-primary btn-flat" ><i class="fa fa-arrow-left"></i> Kembali</button></a>
            </div>
            </form>
			
          </div>
          <!-- /.box -->
       
          </div>
          <!-- /.row -->
		</div>

		</section>
		
		
	<script type="text/javascript">	
	
		$('#form-tambah').submit(function(e) {
		
		var data = $(this).serialize();
		
		$.ajax({
        beforeSend: function (){
        $(".loading2").show();
		$(".loading2").modal('show');	
        },
		url:'<?php echo base_url();?>Master/Artikel/prosesTambah',
		type:"post",
		data:new FormData(this),
		processData:false,
		contentType:false,
		cache:false,	
		})
		.done(function(data) {
			var result = jQuery.parseJSON(data);
			if (result.status == 'berhasil')
			{
				document.getElementById("form-tambah").reset();
				$(".loading2").hide();
				$(".loading2").modal('hide');	
				save_berhasil();
				$("#slider").fadeOut("slow");
				setTimeout(location.reload.bind(location), 350);
				
			} else 
			
			{
				document.getElementById("form-tambah").reset();
				$(".loading2").hide();
				$(".loading2").modal('hide');	
				gagal();
				$("#slider").fadeOut("slow");
				setTimeout(location.reload.bind(location), 350);
			}
		})
		e.preventDefault();
	});
		
		
		// text editor summernote
		
		$(document).ready(function() {
        $('#summernote').summernote({
            height: 200
        });
		});
		 
		
		// untuk select2 ajak pilih tipe
		$(function () 
		{
		$(".selek-status").select2({
        placeholder: " -- pilih status -- "
        });
		});
			
		</script>
	
	
	
	
	
	
		
		

		
		