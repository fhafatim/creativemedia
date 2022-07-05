<?php $this->load->view('_heading/_headerContent') ?>

  <section class="content">
   <div class="box">

  <!-- /.box-header -->
  <div class="box-body">
   
   <form method="post" id="myform" action="<?php echo site_url('filter-data-honor');?>">
   
   <div class="box-header">
   <div class="col-md-3">
   <div class="form-group">
   <label>Trainer :</label>
   
   <select class="form-control selek-tentor" name="id_tentor" id="id_tentor">
		<option value="all"> Semua</option>
		<?php
			foreach ($tentor as $datatentor) {
		?>
			<option value="<?php echo $datatentor->id_tentor; ?>">
			<?php echo $datatentor->nama_tentor; ?>
			</option>
		<?php
			}
		?>
	</select>
   </div>
   </div>
			  
   <div class="col-md-3">
   <div class="form-group">
   <label>Status Honor :</label>
   <select class="form-control selek-status" name="status_honor" id="status_honor" required>
		<option></option>
		<option value="pending">Pending</option>
		<option value="lunas">Lunas</option>
	</select>
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
   <th align="center">Trainer</th>
   <th align="center">Nama Siswa</th>
   <th align="center">Bidang Studi</th>
   <th align="center">Jumlah Honor</th>
   <th align="center">Terbayar</th>
   <th align="center">Sisa</th>
   <th align="center">Status</th>
   </tr>
   </thead>

	<tbody>
	<?php
	if (!empty($filter)) {
	$no = 1;
	foreach ($filter as $data) { 
		$id_kelas = $data->id_kelas;
		$honor = $this->db->query("SELECT *,SUM(jumlah_pembayaran) as terbayar FROM tbl_honor WHERE id_kelas = '$id_kelas'");
		$data_honor = $honor->row();
		$sisa = $data_honor->nominal - $data_honor->terbayar;
	?>
	
    <tr>
	<td><?php echo $no ?></td>
	<td><?php echo $data->nama_tentor ?></td>
	<td><?php echo $data->nama_siswa ?></td>
	<td><?php echo $data->nama_bidang_studi ?></td>
	<td><?php echo nominal($data_honor->nominal) ?></td>
	<td><?php echo nominal($data_honor->terbayar) ?></td>
	<td><?php echo nominal($sisa) ?></td>
	<td>
		<?php 
			if($data->status_honor == 'pending')
			{
		?>
			<small class="label pull-center bg-red">Pending</small>
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
		$(".selek-tentor").select2({
        placeholder: " -- Trainer  -- ",
		allowClear: true
        });
		});
		
		$(function () 
		{
		$(".selek-status").select2({
        placeholder: " -- Status  -- ",
		allowClear: true
        });
		});
	
	$(document).ready( function () {
    $('#tableku').DataTable();
} );
	
   </script>