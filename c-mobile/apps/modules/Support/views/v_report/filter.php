<?php $this->load->view('_heading/_headerContent') ?>

<style>
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
   
   <form method="post" id="myform" action="<?php echo site_url('filter-data');?>">
   
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
	</form>

			   
	<form method="post" id="myform" action="<?php echo site_url('Support/Report/export_excel');?>">
	<div class="col-md-1 jarak-kiri">
	<div class="form-group">
    <label></label>
    <div class="input-group date">
	<input type="hidden" name="tanggal_awal"  value="<?php echo $tanggal_awal; ?>">
	<input type="hidden" name="tanggal_akhir"  value="<?php echo $tanggal_akhir; ?>">
	<input type="hidden" name="id_bidang_studi"  value="<?php echo $bidang_studi; ?>">
	<input type="hidden" name="id_level_kelas"  value="<?php echo $id_level_kelas; ?>">
	<input type="hidden" name="tempat_daftar"  value="<?php echo $tempat_daftar; ?>">
    <button name="simpan" type="submit" class="btn btn-sm btn-primary batas-export"><i class="fa fa-download"></i> Export Excel</button>
    </div>
	</div>
	</div>
	</form><br><br><br><br>
			  	  
			  
   <table id="tableku" class=" table table-bordered table-striped">
   <thead>
   <tr>
   <th align="center">No</th>
   <th align="center">Tanggal Pendaftaran</th>
   <th align="center">Nama</th>
   <th align="center">Alamat</th>
   <th align="center">Jenis Kelamin</th>
   <th align="center">Handphone</th>
   <th align="center">Bidang Studi</th>
   <th align="center">Level</th>
   <th align="center">Tempat Daftar</th>
   </tr>
   </thead>

	<tbody>
	<?php
	if (!empty($filter)) {
	$no = 1;
	foreach ($filter as $data) { ?>
    <tr>
	<td><?php echo $no ?></td>
	<td><?php echo date('d-m-Y',strtotime($data->tanggal_pendaftaran)); ?></td>
	<td><?php echo $data->nama_siswa ?></td>
	<td><?php echo $data->alamat ?></td>
	<td><?php echo $data->jenis_kelamin ?></td>
	<td><?php echo $data->telepon ?></td>
	<td><?php echo $data->nama_bidang_studi ?></td>
	<td><?php echo $data->nama_level_kelas ?></td>
	<td><?php echo $data->tempat_daftar ?></td>
	</tr>
    <?php $no++; } ?>
	<?php } else {  ?>
	<?php } ?>
   </tbody>	
   </table>

   </div>
   </div>
   </div>
   </section>
   
  <script>
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
        placeholder: " -- Bidang Studi -- ",
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
	
	$(document).ready( function () {
    $('#tableku').DataTable();
} );
	
   </script>