<?php $this->load->view('_heading/_headerContent') ?>

<style>.select-width {width:310px;}</style>


	<section class="content">
		<!-- style loading -->
		<div class="loading2"></div>
		<!-- -->
		
		<div class="box">
        <div class="row">
        <div class="col-md-9">
       
        <div class="box-header with-border">
        <h3 class="box-title">Add Menu</h3>
        </div>
			
            <!-- form start -->
             <form class="form-horizontal" id="form-tambah" method="POST">
			<input type="hidden" name="created_by" value="<?php echo $userdata->nama; ?>">
              <div class="box-body">
			  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Menu</label>
                  <div class="col-sm-5">
                  <input type="text" class="form-control" placeholder="nama menu" name="nama_menu" aria-describedby="sizing-addon2">
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Icon</label>
                  <div class="col-sm-5">
                  <input type="text" class="form-control" placeholder="icon menu" name="icon" aria-describedby="sizing-addon2">
                  <p style='color: red; font-size: 14px;'> *example fa fa-home</p>
				  </div>
				  
				 <div class="col-md-1">
				 <a href='icon.html' target="_blank" class="btn default btn-primary "><i class='fa fa-edit'></i> Icon List </a>
				 </div>
				 
				 </div>
				
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Link Menu</label>
                  <div class="col-sm-5">
                  <input type="text" class="form-control" placeholder="link menu" name="link" aria-describedby="sizing-addon2">
                  </div>
                </div>
				
				<div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Kode Menu</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="kode menu" name="kode_menu" aria-describedby="sizing-addon2">
                </div>
                </div>
				
				
				<div class="form-group">
                <label class="col-sm-2 control-label">Jenis Menu</label>
                <div class="col-sm-5">
				<select name="parent" id="type" class="form-control select-menu" aria-describedby="sizing-addon2">
				<option></option>
				<option value="0">Menu Utama</option>
                <option value="sub-menu">Sub Menu</option>
				</select> 
                </div>
                </div>
				
				<div class="menu-show">
				<div class="form-group">
                <label class="col-sm-2 control-label">Sub Menu</label>
                <div class="col-sm-5">
                <select name="parent" class="form-control select2-menu select-width">
				</select>
                </div>
                </div>
				</div>
				
				
				<div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Urutan</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="urutan" name="urutan" aria-describedby="sizing-addon2">
                </div>
                </div>
			
			
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Menu Available</label>
				<div class="col-xs-3">
				<input type='checkbox' name='menu_file[]' value="view" />&nbsp; View<br>
				<input type='checkbox' name='menu_file[]' value="add" />&nbsp; Add<br>
				<input type='checkbox' name='menu_file[]' value="edit" />&nbsp; Edit<br>
				<input type='checkbox' name='menu_file[]' value="del" />&nbsp; Delete<br>										
				</div>
				</div>
				
              </div>
              <div class="box-footer">
              <button name="simpan" type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
              <button type="reset" class="btn btn-sm btn-warning "><i class="fa fa-retweet"></i> Cancel</button>
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
		url: '<?php echo site_url('Setting/Menu/prosesTambah'); ?>',
		data: data,	
		})
		.done(function(data) {
			var result = jQuery.parseJSON(data);
			if (result.status == 'berhasil')
				
			{
				document.getElementById("form-tambah").reset();
				$(".loading2").hide();
				$(".loading2").modal('hide');
				setTimeout(location.reload.bind(location), 500);
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
		

	$(function() {
    $('.menu-show').hide(); 
    $('#type').change(function(){
        if($('#type').val() == 'sub-menu') {
            $('.menu-show').show(); 
        } else {
            $('.menu-show').hide(); 
        } 
    });
});


	// untuk select2 ajak pilih menu
		$(function () 
		{
		$(".select-menu").select2({
        placeholder: " -- Pilih Jenis Menu -- "
        });
		});


// ----------------- load data menu ------------- //	

	$(document).ready(function(){
    $('.select2-menu').select2({
    placeholder: 'Pilih Sub Menu',
    allowClear: true,
    ajax:{
    url: "<?php echo base_url('Setting/Menu/menu_ajak') ?>",
    dataType: "json",
    delay: 250,
    data: function(params){
    return {
         cari: params.term
     };
     },
     processResults: function(data){
     var results = [];

     $.each(data, function(index, item){
     results.push({
     id: item.id_menu,
     text: item.nama_menu
     });
     });
     return{
      results: results
      };
      }
     }
    });
  });		
			
</script>	
		
		