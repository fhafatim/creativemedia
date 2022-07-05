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
              <label for="inputEmail3" class="col-sm-2 control-label">Jenis Fasilitas</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Jenis Fasilitas" name="nama" aria-describedby="sizing-addon2">
              </div>
              </div>

              </div>
             <div class="box-footer">
              <button name="simpan" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>
              <button type="reset" class="btn btn-warning btn-flat"><i class="fa fa-retweet"></i> Cancel</button>
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
	
		$('#form-tambah').submit(function(e) {
		  
		var data = $(this).serialize();
		$.ajax({
		method: 'POST',
        beforeSend: function (){
        $(".loading2").show();
		$(".loading2").modal('show');	
        },
		url: '<?php echo site_url('Category/Cat_fasilitas/prosesTambah'); ?>',
		data: data,
		})
		.done(function(data) {
			
			
			var result = jQuery.parseJSON(data);
			
			if (result.status == 'berhasil')
				
			{
				document.getElementById("form-tambah").reset();
				$(".loading2").hide();
				$(".loading2").modal('hide');				
				save_berhasil();
			} else 
			
			{
				document.getElementById("form-tambah").reset();
				$(".loading2").hide();
				$(".loading2").modal('hide');	
				gagal();
			}
		})
		
		e.preventDefault();
		});
	
		
	</script>
		
		

		
		