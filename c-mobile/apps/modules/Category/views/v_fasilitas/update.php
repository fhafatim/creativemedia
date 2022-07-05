	<?php $this->load->view('_heading/_headerContent') ?>
	
	
	<section class="content">
		<!-- style loading -->
		<div class="loading2"></div>
		<!-- -->
		
		<div class="box">
		<form id="form-update" class="form-horizontal" method="POST">
        <input type="hidden" name="id_tipe" value="<?php echo $datafasilitas->id_tipe; ?>">
		<input type="hidden" name="updated_by" value="<?php echo $userdata->nama; ?>">
        <div class="row">
        <div class="col-md-9">

        <div class="box-header with-border">
        <h3 class="box-title">Update Data</h3>
        </div>
			
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
		
		 <div class="box-body">
         <div class="form-group">
         <label for="inputEmail3" class="col-sm-2 control-label">Jenis Fasilitas</label>
         <div class="col-sm-6">
         <input type="text" class="form-control" placeholder="Jenis Fasilitas" name="nama" aria-describedby="sizing-addon2" value="<?php echo $datafasilitas->nama; ?>">
         </div>
         </div>
		 </div>
					
        </div>
        <!-- /.box-body -->
		
		<div class="box-footer">
        <button name="simpan" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Update</button>
         <a class="klik ajaxify" href="<?php echo site_url('cat_fasilitas'); ?>"><button class="btn btn-primary btn-flat" ><i class="fa fa-arrow-left"></i> Kembali</button></a>
        </div>
        </form>
        </div>
        <!-- /.box -->
        </div>
        <!-- /.row -->
		</div>
		
		</section>
		
		
		<script type="text/javascript">	
	
	
		//Proses Controller logic ajax
		
		$('#form-update').submit(function(e) {
		var data = $(this).serialize();
		$.ajax({
		method: 'POST',
        beforeSend: function (){
        $(".loading2").show();
		$(".loading2").modal('show');		
        },
		url: '<?php echo site_url('Category/Cat_fasilitas/prosesUpdate'); ?>',
		data: data,	
		})
		.done(function(data) {
			var result = jQuery.parseJSON(data);
			if (result.status == 'berhasil')
			{
				$(".loading2").hide();
				$(".loading2").modal('hide');	
				update_berhasil();
				
			} else 
			
			{
				$(".loading2").hide();
				$(".loading2").modal('hide');	
				gagal();
			}
		})
		
		e.preventDefault();
	});	
		
		
</script>	
