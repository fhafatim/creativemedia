
<?php $this->load->view('_heading/_headerContent') ?>


  <style>
	#report {
	max-width: 1200px;
	height: 330px;
	margin: 0 auto
	}	
	
	@media screen and (min-width: 600px) {
      .batas-kiri
      {
        margin-left:-100px;
      }
      
      .batas-kiri2
      {
    	margin-left:-60px; 
      }
    }
 </style>
 
 <section class="content">
			
  <div class="box">
  

  <!-- /.box-header -->
  <div class="box-body">
   
   <form method="post" action="<?php echo site_url('filter-data');?>">
   
   <div class="box-header">
              <div class="col-md-2">
              <div class="form-group">
			  <label>Tanggal Awal:</label>
              <div class="input-group date">
              <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
              </div>
              <input type="text" name="tanggal_awal" class="form-control" id="from" autocomplete="off">
              </div>
              </div>
			  </div>
			  
			  <div class="col-md-2">
			  <div class="form-group">
              <label>Tanggal Akhir:</label>
              <div class="input-group date">
              <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
              </div>
              <input type="text" name="tanggal_akhir" class="form-control" id="to" autocomplete="off">
			  </div>
              </div>
			  </div>
			  
			 
			  <div class="col-md-3">
            	 <div class="form-group">
                 <label>Bidang Studi </label>
                 <div class="input-group col-sm-7">
                 <select name="id_bidang_studi" class="form-control selek-bidang-studi">
            	 <option></option>
            	 <?php foreach ($BidangStudi as $data) { ?>
            	 <option value="<?php echo $data->id_bidang_studi; ?>">
            	 <?php echo $data->nama_bidang_studi; ?>
            	 </option>
            	 <?php } ?>
            	 </select>
            	 </div>
                 </div>
              </div>
              
              <div class="col-md-2 batas-kiri">
            	 <div class="form-group">
                 <label>Level </label>
                 <div class="input-group col-sm-7">
                 <select name="id_level_kelas" class="form-control selek-level">
            	 <option></option>
            	 <?php foreach ($Level as $datalevel) { ?>
            	 <option value="<?php echo $datalevel->id_level_kelas; ?>">
            	 <?php echo $datalevel->nama_level_kelas; ?>
            	 </option>
            	 <?php } ?>
            	 </select>
            	 </div>
                 </div>
              </div>
              
              <div class="col-md-2 batas-kiri2">
            	 <div class="form-group">
                 <label>Tempat Daftar </label>
                 <div class="input-group col-sm-7">
                 <select name="tempat_daftar" class="form-control selek-tempat">
            	 <option value="tubanan">Tubanan</option>
            	 <option value="nginden">Nginden</option>
            	 </select>
            	 </div>
                 </div>
              </div>
			  
			  <div class="col-md-1">
			  <div class="form-group">
              <label></label>
              <div class="input-group date">
              <button name="simpan" type="submit" class="btn btn-sm btn-primary batas-export klik"><i class="fa fa-refresh"></i> Filter</button>
              </div>
			  </div>
			  </div>
			  </div>
			  </form>

			</div>
			</div>


			
   
   
   
   
   
   
   
   

</section>


   <script>
   
//klik loading ajax
	
	$(document).ready(function(){
    $('.klik').click(function() {
    var url = $(this).attr('href');
	$("#loading2").show().html("<img src='../custom-admin/assets/tambahan/gambar/loader-ok.gif' height='18'> ");
	$("#loading2").modal('show');		
	$.ajax({
	complete: function(){
	$("#loading2").hide();
	$("#loading2").modal('hide');
	}
	});	
	return true;
    });
    });

   
   // untuk datetime from
    $(function () 
	{
	$("#from").datepicker({
    orientation: "left",
    autoclose: !0,
    format: 'yyyy/mm/dd'
    })
    });	
	
	// untuk datetime to
    $(function () 
	{
	$("#to").datepicker({
    orientation: "left",
    autoclose: !0,
    format: 'yyyy/mm/dd'
    })
    });
	
	// untuk select2 ajak pilih menu
		$(function () 
		{
		$(".selek-bidang-studi").select2({
        placeholder: " -- Bidang Studi  -- ",
		allowClear: true
        });
		});
		
		$(function () 
		{
		$(".selek-level").select2({
        placeholder: " -- Level  -- ",
		allowClear: true
        });
		});
		
		$(function () 
		{
		$(".selek-tempat").select2({
        placeholder: " -- Tempat Daftar  -- ",
		allowClear: true
        });
		});
	
   </script>

 


