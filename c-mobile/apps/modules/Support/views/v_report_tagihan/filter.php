<?php $this->load->view('_heading/_headerContent') ?>

  <section class="content">
   <div class="box">

  <!-- /.box-header -->
  <div class="box-body">
   
   <form method="post" id="myform" action="<?php echo site_url('filter-data-tagihan');?>">
   
   <div class="box-header">
   <div class="col-md-3">
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
			  
	<div class="col-md-3">
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
		  
	<div class="col-md-1">
	<div class="form-group">
    <label></label>
    <div class="input-group date">
    <button name="simpan" type="submit" class="btn btn-sm btn-primary batas-export klik"><i class="fa fa-refresh"></i> Filter</button>
    </div>
	</div>
	</div>
	</form>
			   
	<form method="post" id="myform" action="<?php echo site_url('Support/Report_pendaftaran/export_excel');?>">
	<div class="col-md-1 jarak-kiri">
	<div class="form-group">
    <label></label>
    <div class="input-group date">
	<input type="hidden" name="tanggal_awal"  value="<?php echo $tanggal_awal; ?>">
	<input type="hidden" name="tanggal_akhir"  value="<?php echo $tanggal_akhir; ?>">
    <button name="simpan" type="submit" class="btn btn-sm btn-primary batas-export"><i class="fa fa-download"></i> Export Excel</button>
    </div>
	</div>
	</div>
	</form><br><br><br><br>
			  	  
			  
   <table id="tableku" class=" table table-bordered table-striped">
   <thead>
   <tr>
   <th align="center">No</th>
   <th align="center">Nama Siswa</th>
   <th align="center">Telepon</th>
   <th align="center">Bidang Studi</th>
   <th align="center">Tanggal Daftar</th>
   <th align="center">Total Tagihan</th>
   <th align="center">Terbayar</th>
   <th align="center">Kekurangan</th>
   <th align="center">Status Tagihan</th>
   </tr>
   </thead>

	<tbody>
	<?php
	if (!empty($filter)) {
	$no = 1;
	foreach ($filter as $data) { 
		$id_invoice = $data->id_invoice;
		$terbayar = $this->db->query("SELECT SUM(nominal) as nominal FROM tbl_pembayaran WHERE id_invoice = '$id_invoice'");
		$jml_terbayar = $terbayar->row();
		$sisa = $data->harga_kursus - $jml_terbayar->nominal;
	?>
	
    <tr>
	<td><?php echo $no ?></td>
	<td><?php echo $data->nama_siswa ?></td>
	<td><?php echo $data->telepon ?></td>
	<td><?php echo $data->nama_bidang_studi ?></td>
	<td><?php echo date('d-m-Y',strtotime($data->tanggal_pendaftaran)); ?></td>
	<td><?php echo nominal($data->harga_kursus) ?></td>
	<td><?php echo nominal($jml_terbayar->nominal) ?></td>
	<td><?php echo nominal($sisa) ?></td>
	<td>
		<?php 
			if($data->status_invoice == 'pending')
			{
		?>
			<small class="label pull-center bg-red">Belum Lunas</small>
		<?php
			}
			else
			{
		?>
			<small class="label pull-center bg-green">Lunas</small>
		<?php
			}
		?>
	</td>
	
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
		$(".selek-tipe").select2({
        placeholder: " -- Status -- ",
		allowClear: true
        });
		});
	
	$(document).ready( function () {
    $('#tableku').DataTable();
} );
	
   </script>