	<?php $this->load->view('_heading/_headerContent') ?>
	
	
	<section class="content">
		<!-- style loading -->
		<div class="loading2"></div>
		<!-- -->
		
		<div class="box">
		<form id="form-update" class="form-horizontal" method="POST">
        <input type="hidden" name="id_fasilitas" value="<?php echo $datafasilitas->id_fasilitas; ?>">
		<input type="hidden" name="updated_by" value="<?php echo $userdata->nama; ?>">
        <div class="row">
        <div class="col-md-8">

        <div class="box-header with-border">
        <h3 class="box-title">Update Data</h3>
        </div>
			
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
		
		 <div class="box-body">
		 
		 <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Fasilitas </label>
         <div class="col-sm-9">
         <input type="text" class="form-control" placeholder="Nama Fasilitas" name="judul" aria-describedby="sizing-addon2" value="<?php echo $datafasilitas->judul; ?>">
         </div>
         </div>
		 
		<div class="form-group">
		<div id="slider">
		<img class="img-thumbnail" src='../<?php echo $datafasilitas->gambar; ?>'>
		</div>
			
        <label for="inputFoto" class="col-sm-2 control-label">Image</label>
        <div class="col-sm-9">
        <input type="file" class="form-control" placeholder="gambar" name="gambar" id="gambar" onchange="return fileValidation()"/>
        <p style='color: red; font-size: 14px;'> *Maksimal File Foto 1 MB</p>
		</div>
		</div>
		
		<div class="form-group">
		<label class="col-sm-2 control-label">Tipe Fasilitas</label>
        <div class="col-sm-3">
        <select name="type" class="form-control selek-tipe">
		<?php foreach ($tipe as $datatipe) { ?>
		<option value="<?php echo $datatipe->nama ?>"<?php if($datatipe->nama == $datafasilitas->type){echo "selected='selected'";} ?>><?php echo $datatipe->nama; ?>
		</option>
		<?php }?>
		</select>
        </div>
        </div>
		 
		 </div>
					
        </div>
        <!-- /.box-body -->
		
		<div class="box-footer">
        <button name="simpan" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Update</button>
         <a class="klik ajaxify" href="<?php echo site_url('fasilitas'); ?>"><button class="btn btn-primary btn-flat" ><i class="fa fa-arrow-left"></i> Kembali</button></a>
        </div>
        </form>
        </div>
        <!-- /.box -->
        </div>
        <!-- /.row -->
		</div>
		
		</section>
		
		
	<script type="text/javascript">	
	
		$('#form-update').submit(function(e) {
		
		var data = $(this).serialize();
		
		$.ajax({
        beforeSend: function (){
        $(".loading2").show();
		$(".loading2").modal('show');	
        },
		url:'<?php echo base_url();?>Master/Fasilitas/prosesUpdate',
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
				$(".loading2").hide();
				$(".loading2").modal('hide');	
				save_berhasil();
				
				
			} else 
			
			{
				$(".loading2").hide();
				$(".loading2").modal('hide');	
				gagal();
			
			}
		})
		e.preventDefault();
	});
		
		
		// untuk select2 ajak pilih tipe
		$(function () 
		{
		$(".selek-tipe").select2({
        placeholder: " -- pilih tipe -- "
        });
		});
	
		
	</script>
