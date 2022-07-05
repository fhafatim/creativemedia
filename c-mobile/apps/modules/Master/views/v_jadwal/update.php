<?php $this->load->view('_heading/_headerContent') ?>


		
<section class="content">
	<!-- style loading -->
	<div class="loading2"></div>
	<!-- -->
	<a class="klik ajaxify" href="<?php echo site_url('jadwal'); ?>"><button class="btn btn-warning btn-flat"><i class="fa fa-arrow-left"></i> Kembali</button></a>
	<div class="box">
		<!-- <div class="row"> -->
		<!-- <div class="col-md-9"> -->

		<div class="box-header with-border">
			<h3 class="box-title">Detail Data</h3>
		</div>

		<!-- /.box-header -->
		<!-- form start -->

		<form class="form-horizontal" id="form-edit" method="POST">
			<!-- <input type="hidden" name="created_by" value="<?php echo $userdata->nama; ?>"> -->
			<input type="hidden" name="id_kelas" value="<?php echo $datajadwal->id_kelas; ?>">

			<div class="box-body">

				<div class="form-group">
					<label class="col-sm-2 control-label">Nama Siswa</label>
					<div class="col-sm-4">
						<input type="text" name="id_siswa" class="form-control" value="<?= $datajadwal->nama_siswa ?>"
							readonly>
						</select>
					</div>

					<label for="inputEmail3" class="col-sm-2 control-label">Jumlah Pertemuan </label>
					<div class="col-sm-4">
						<input type="number" autocomplete="off" class="form-control" placeholder="ke- " name="jumlah_pertemuan"
							aria-describedby="sizing-addon2" value="<?php echo $datajadwal->jumlah_pertemuan ?>">
					</div>
				</div>



				<div class="form-group">
					<label class="col-sm-2 control-label">Trainer</label>
					<div class="col-sm-4">
						<select name="id_tentor" class="form-control selek-tentor">
							<?php 	foreach ($Trainer as $datatrainer) { ?>
							<option value="<?php echo $datatrainer->id_tentor ?>"
								<?php if($datatrainer->id_tentor == $datajadwal->id_tentor){echo "selected='selected'";} ?>>
								<?php echo $datatrainer->nama_tentor; ?>
							</option>
							<?php }?>
						</select>
						<p style='color: red; font-size: 14px;'> * Ketik keyword Nama Trainer</p>
					</div>

					<label class="col-sm-2 control-label">Tanggal Mulai</label>
					<div class="col-sm-4">
						<div class="input-group date">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" name="tanggal_mulai" class="form-control pull-right" id="tanggal_mulai" value="<?= date('d-m-Y',strtotime($datajadwal->tanggal_mulai)) ?>" autocomplete="off">
						</div>
					</div>

				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Bidang Studi </label>
					<div class="col-sm-4">
						<input type="text" name="bidang_studi" class="form-control"
							value="<?php
								if ($datajadwal->id_bidang_studi == '16') {
									echo $datajadwal->keterangan.' [Custom]';	
								}else{
									echo $datajadwal->nama_bidang_studi;	
								} ?>" readonly>
					</div>

					<label class="col-sm-2 control-label">Tanggal Selesai</label>
					<div class="col-sm-4">
						<div class="input-group date">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" name="tanggal_selesai" id="tanggal_selesai" class="form-control pull-right" value="<?= date('d-m-Y',strtotime($datajadwal->tanggal_selesai)) ?>">
						</div>
						
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Status Kursus</label>
					<div class="col-sm-4">
						<!-- <input type="text" class="form-control" value="<?php echo $datajadwal->status_kelas; ?>"> -->
						<span class="badge bg-primary" name="status_kelas"
							style="background-color:#0073B7;"><?php echo $datajadwal->status_kelas; ?></span>
					</div>
				</div>

				<div class="box-footer">
				<?php if($datajadwal->status_kelas == 'berjalan'){?>
					<button name="simpan" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i>
						Simpan</button>
				<?php } ?>

					<!-- Kondisi untuk memunculkan button 
					<?php
						if($datajadwal->jumlah_pertemuan <= $Count && $datajadwal->status_kelas == 'berjalan'){?>
							<button class="btn btn-flat btn-primary edit-kelas" id_kelas="id_kelas" data-id=<?= $datajadwal->id_kelas?>><i class="fa fa-check"></i>Selesai Kelas</button>
					<?php }elseif ($datajadwal->jumlah_pertemuan >= $Count && $datajadwal->status_kelas == 'selesai'){ ?>
							<button class="btn btn-flat btn-danger edit-kelas2" id_kelas="id_kelas" data-id=<?= $datajadwal->id_kelas?>><i class="fa fa-check"></i>Tandai Belum Selesai</button>
					<?php }elseif ($datajadwal->jumlah_pertemuan >= $Count && $datajadwal->status_kelas == 'berjalan'){ ?>
						 <button class="btn btn-flat btn-primary edit-kelas" id_kelas="id_kelas" data-id=<?= $datajadwal->id_kelas?>><i class="fa fa-check"></i>Selesai Kelas</button> 
					<?php } ?> -->
					
					<?php if($datajadwal->status_kelas == 'berjalan'){?>
						<button class="btn btn-flat btn-primary edit-kelas" id_kelas="id_kelas" data-id=<?= $datajadwal->id_kelas?>><i class="fa fa-check"></i> Verifikasi Selesai</button>
					<?php } ?>
				</div>

		</form>

		<!-- Layout Form Tambah Jadwal -->
		<div class="box with-border mb-3">
			<h3 class="box-title">Tambah Data Jadwal</h3>
		</div>

		<form class="form-horizontal" id="form-tambah-jadwal" method="POST">
		<input type="hidden" name="id_kelas" value="<?php echo $datajadwal->id_kelas; ?>">
			<!-- <div class="form-group">
				<label class="col-sm-2 control-label">Tanggal</label>
				<div class="col-sm-3">
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="text" name="tanggal" class="form-control pull-right" id="tanggal" autocomplete="off">
					</div>
				</div>

				<label class="col-sm-2 control-label">Jam Mulai</label>
				<div class="col-sm-3">
					<input type="time" class="form-control" id="time" autocomplete="off" name="jam_mulai"
						placeholder="Jam mulai" aria-describedby="sizing-addon2">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Pertemuan Ke-</label>
				<div class="col-sm-3">
					<input type="number" class="form-control" id="tanggal" autocomplete="off" name="pertemuan"
						placeholder="Pertemuan Ke" aria-describedby="sizing-addon2">
				</div>

				<label class="col-sm-2 control-label">Jam Selesai</label>
				<div class="col-sm-3">
					<input type="time" class="form-control" id="tanggalmasuk" autocomplete="off" name="jam_selesai"
						placeholder="Jam selesai" aria-describedby="sizing-addon2">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Keterangan</label>
				<div class="col-sm-3">
					<textarea name="keterangan" id="keterangan" class="form-control" autocomplete="off"></textarea>
				</div>
			</div> -->

			<div class="form-group">
				<label class="col-sm-2 control-label">Pilih Hari</label>
				<div class="col-sm-4">
					<select class="form-control selek-hari" name="hari" id="hari" autocomplete="off">
						<option value=""></option>
						<option value="Senin">Senin</option>
						<option value="Selasa">Selasa</option>
						<option value="Rabu">Rabu</option>
						<option value="Kamis">Kamis</option>
						<option value="Jum'at">Jum'at</option>
						<option value="Sabtu">Sabtu</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Jam Mulai</label>
				<div class="col-sm-4">
					<input type="time" class="form-control timepicker" id="time" autocomplete="off" name="jam_mulai"
						placeholder="Jam mulai" aria-describedby="sizing-addon2">
				</div>
			</div>

			<div class="box-footer">
			<?php if($datajadwal->status_kelas == 'berjalan'){?>
				<button name="simpan" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i>
					Simpan</button>
			<?php } ?>
				<!--<button type="reset" class="btn btn-warning btn-flat"><i class="fa fa-retweet"></i>
					Cancel</button>-->
			</div>
		</form>


		<!-- disini datatable -->
		<div class="box-footer">
			<div class="box box-primary">
				<div class="box-header with-border">
					<i class="fa fa-pencil" aria-hidden="true"></i>
					<h3 class="box-title">Jadwal Kursus</h3>
				</div>
				<div class="table-responsive">
					<table id="table-detail" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<input type="hidden" name="id_kelas" value="<?= $datajadwal->id_kelas; ?>">
						<thead>
							<tr>
								<th>No.</th>
								<th>Hari</th>
								<th>Jam Mulai</th>
								<th style="width:125px;">Action</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>

			<div class="box box-warning">
				<div class="box-header with-border">
					<i class="fa fa-pencil" aria-hidden="true"></i>
					<h3 class="box-title">GBMP</h3>
				</div>
				<div class="table-responsive">
					<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<input type="hidden" name="id_kelas" value="<?= $datajadwal->id_kelas; ?>">

						<thead>
							<tr>
								<th>No.</th>
								<th>Pertemuan ke</th>
								<th>Tanggal</th>
								<th>Jam Mulai</th>
								<th>Jam Selesai</th>
								<th>Keterangan</th>
								<th>Status Kelas</th>
								<th style="width:125px;">Action</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>

	

</section>
		
<script type="text/javascript">
		//tampil datatable
		var save_method; //for save method string
		var table;

		$(document).ready(function() {
	    //datatables
    	table = $('#table-detail').DataTable({ 

				"processing": true, //Feature control the processing indicator.
				"order": [], //Initial no order.
				oLanguage: {
				sProcessing: "<img src='<?php base_url();?>assets/tambahan/gambar/loading.gif' width='30px'>" 
				},

				// Load data for the table's content from an Ajax source
				"ajax": {
					"url": "<?php echo base_url('ListDetailJadwal/').$datajadwal->id_kelas?>",
					"type": "POST"
				},

				//Set column definition initialisation properties.
				"columnDefs": [
				{ 
					"targets": [ -1 ], //last column
					"orderable": false, //set not orderable
				}, ],
    		});
		});	

		$(document).ready(function() {
	    //datatables
    	table = $('#table').DataTable({ 

				"processing": true, //Feature control the processing indicator.
				"order": [], //Initial no order.
				oLanguage: {
				sProcessing: "<img src='<?php base_url();?>assets/tambahan/gambar/loading.gif' width='30px'>" 
				},

				// Load data for the table's content from an Ajax source
				"ajax": {
					"url": "<?php echo base_url('ListJadwal/').$datajadwal->id_kelas?>",
					"type": "POST"
				},

				//Set column definition initialisation properties.
				"columnDefs": [
				{ 
					"targets": [ -1 ], //last column
					"orderable": false, //set not orderable
				}, ],
    		});
		});	

		// Proses Controller logic ajax - add jadwal
		$('#form-tambah-jadwal').submit(function(e) {
		var data = $(this).serialize();
		$.ajax({
		method: 'POST',
        beforeSend: function (){
        $(".loading2").show();
		$(".loading2").modal('show');	
        },
		url: '<?php echo site_url('Master/JadwalKelas/prosesTambahDetail'); ?>',
		data: data,
		})
		.done(function(data) {
			var result = jQuery.parseJSON(data);
			
			if (result.status == 'berhasil')
				
			{
				
				$(".loading2").hide();
				$(".loading2").modal('hide');				
				save_berhasil();
				setTimeout(location.reload.bind(location), 450);
				
				
            } else 
			
			{
				$(".loading2").hide();
				$(".loading2").modal('hide');	
				gagal();
				
			}
		})
		
		e.preventDefault();
		});
	
		//Proses Controller logic ajax - edit form bagian atas (tbl_kelas)//
		$('#form-edit').submit(function(e) {
		var data = $(this).serialize();
		$.ajax({
		method: 'POST',
        beforeSend: function (){
        $(".loading2").show();
		$(".loading2").modal('show');	
        },
		url: '<?php echo site_url('Master/Jadwal/prosesUpdate'); ?>',
		data: data,
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
		//#End Proses Controller logic ajax - edit form bagian atas (tbl_kelas)//


		//=============Update kelas menjadi selesai====================//
		$('#form-edit').on("click",".edit-kelas", function(e) {
		var id_kelas=$(this).attr("data-id");
    	// 	console.log(id_kelas);

			swal({
					title: "Tandai Sebagai Selesai?",
					text: "Sudah menyelesaikan semua pertemuan dikelas ini ?",
					type: "warning",
					showCancelButton: true,
					confirmButtonText: "Ya, Sudah",
					confirmButtonColor: '#009e00',
					customClass: ".sweet-alert button",
					closeOnConfirm: true,
					html: true
			},
			function() {
				$.ajax({
					method: 'POST',
					url: '<?php echo site_url('Master/Jadwal/selesai'); ?>',
					data: "id_kelas="+id_kelas,
					success: function(data) {
							var result = jQuery.parseJSON(data);
								if (result.status == 'berhasil')	
								{				
									save_berhasil();
									setTimeout(location.reload.bind(location), 450);
									//location.reload();
								} else 
								{
									gagal();
								}
						}
				});
			});
			e.preventDefault();
		});
		//#=============End Update kelas menjadi selesai==============//

		//=============End Update kelas selesai menjadi belum selesai====================//
		$('#form-edit').on("click",".edit-kelas2", function(e) {
		var id_kelas=$(this).attr("data-id");
    	// 	console.log(id_kelas);
			swal({
					title: "Tandai Sebagai Belum Selesai?",
					text: "Ingin menandai kelas sebagai belum selesai ?",
					type: "warning",
					showCancelButton: true,
					confirmButtonText: "Ya, Tandai belum selesai",
					confirmButtonColor: '#ff0000',
					customClass: ".sweet-alert button",
					closeOnConfirm: true,
					html: true
			},
			function() {
				$.ajax({
					method: 'POST',
					url: '<?php echo site_url('Master/Jadwal/selesai2'); ?>',
					data: "id_kelas="+id_kelas,
					success: function(data) {
							var result = jQuery.parseJSON(data);
								if (result.status == 'berhasil')	
								{				
									save_berhasil();
									setTimeout(location.reload.bind(location), 450);
									//location.reload();
								} else 
								{
									gagal();
								}
						}
				});
			});
			e.preventDefault();
		});
		//#=============End Update kelas selesai menjadi belum selesai==============//

		function reload_table() {
			table.ajax.reload(null, false); //reload datatable ajax 
		}

		//Update jadwal menjadi selesai
		$(document).on("click", ".edit-jadwal", function(e) {
    		var id_jadwal = $(this).attr("data-id");
    		console.log(id_jadwal);

			swal({
					title: "Selesai?",
					text: "Sudah menyelesaikan pertemuan ini ?",
					type: "warning",
					showCancelButton: true,
					confirmButtonText: "Ya, Sudah",
					confirmButtonColor: '#009e00',
					customClass: ".sweet-alert button",
					closeOnConfirm: true,
					html: true
				},
				function() {
					$.ajax({
						url: '<?php echo base_url();?>Master/JadwalKelas/selesai',
						method: "POST",
						data: "id_jadwal=" + id_jadwal,
						success: function(data) {
							update_berhasil();
							//reload_table();
							//location.reload();
							setTimeout(location.reload.bind(location), 450);
						}
					});
				});
				e.preventDefault();
		});
		//#End Update jadwal menjadi selesai

		//ajax hapus jadwal (tbl_jadwal)
		$(document).on("click",".hapus-jadwal",function(e){
		var id_jadwal=$(this).attr("data-id");
	
			swal({
				title:"Hapus Data?",
				text:"Yakin anda akan menghapus data ?",
				type: "warning",
				showCancelButton: true,
				confirmButtonText: "Hapus",
				confirmButtonColor: '#dc1227',
				customClass: ".sweet-alert button",
				closeOnConfirm: true,
				html: true
			},
				function(){
				$.ajax({
					method: "POST",
					url: "<?php echo base_url('Master/JadwalKelas/hapus'); ?>",
					data: "id_jadwal=" +id_jadwal,
					success: function(data){
						$("tr[data-id='"+id_jadwal+"']").fadeOut("fast",function(){
							$(this).remove();
						});
						hapus_berhasil();
						reload_table();
					}
				});
			});
			e.preventDefault();
		});
		//#End hapus jadwal
		
		//ajax hapus detail jadwal (tbl_jadwal)
		$(document).on("click",".hapus-detail-jadwal",function(e){
		var id_detail_jadwal=$(this).attr("data-id");
	
			swal({
				title:"Hapus Data?",
				text:"Yakin anda akan menghapus data ?",
				type: "warning",
				showCancelButton: true,
				confirmButtonText: "Hapus",
				confirmButtonColor: '#dc1227',
				customClass: ".sweet-alert button",
				closeOnConfirm: true,
				html: true
			},
				function(){
				$.ajax({
					method: "POST",
					url: "<?php echo base_url('Master/JadwalKelas/hapus_detail_jadwal'); ?>",
					data: "id_detail_jadwal=" +id_detail_jadwal,
					success: function(data){
						$("tr[data-id='"+id_detail_jadwal+"']").fadeOut("fast",function(){
							$(this).remove();
						});
						hapus_berhasil();
						setTimeout(location.reload.bind(location), 450);
					}
				});
			});
			e.preventDefault();
		});
		//#End hapus jadwal
		
		
		// untuk select2 ajak pilih menu
		$(function () 
		{
		$(".selek-siswa").select2({
        placeholder: " -- Pilih Siswa -- ",
		allowClear: true
        });
		});
		
		// untuk select2 ajak pilih menu
		$(function () 
		{
		$(".selek-status").select2({
        placeholder: " -- Pilih status -- ",
		allowClear: true
        });
		});
		
			// untuk select2 ajak pilih menu
		$(function () 
		{
		$(".selek-hari").select2({
        placeholder: " -- Pilih hari -- "
        });
		});
		
		// untuk select2 ajak pilih menu
		$(function () 
		{
		$(".selek-studi").select2({
        placeholder: " -- Bidang studi -- ",
		allowClear: true
        });
		});
		
		// untuk select2 ajak pilih menu
		$(function () 
		{
		$(".selek-jam").select2({
        placeholder: " -- Jam Mulai -- "
        });
		});	
		
	</script>
	
	
	<script>
	
	// untuk selek tentor
	
	$(document).ready(function(){
	function carigambar (data) {
	if (data.loading) return data.text; 
	var find = ',';
    var template = '<div class="clearfix">' +
	// '<div class="col-sm-3">' +
    // //'<img src="http://apps-backend.infocreativemedia.com/' + data.gambar + '" style="max-width: 100%" />' +
    // '<img src="' + data.gambar + '" style="max-width: 100%" />' +
    // '</div>' +
    '<div clas="col-sm-10">' +
    '<div class="clearfix">' +
    '<div class="col-sm-9"><b>' + data.nama_tentor + '</b></div>' +
	'<div class="col-sm-9">' + data.bidang_studi.replace(/,/g,'<li></li>') + '</div>' +
    '</div>';
    template += '</div></div>';
    return template;
	}
	function seleksigambar (data) {
    return data.nama_tentor || data.text;
	}	
	
	$(".selek-tentor").select2({   
	ajax: {
    url: "<?php echo base_url('Category/Trainer/cari_ajak_trainer') ?>",
    dataType: 'json',
    delay: 250,
	type: 'GET',
    data: function (params) {
          return {
                q: params.term,
				page: params.page
            };
        },
        processResults: function (data,params) {
		data.forEach(function (d, i) {
        //definisi id untuk data ajax
        d.id = d.id_tentor; })
        return {results: data };
		},
    cache: true
    },
	placeholder: " --- pilih trainer --- ",
	allowClear: true,
	multiple: false,
	escapeMarkup: function (template) { return template; }, // let our custom formatter work
	templateResult: carigambar,
	templateSelection: seleksigambar
	 
});
});	
	
	</script>
	
	<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
	</script>
	
	<script>
	$("body").on("click",".remove2",function(){ 
	var r = confirm("Hapus data ini ?");
	if (r == true) {
    $(this).parents(".control-group").remove();
	}
	return false;
    });
	
	</script>


    <script>
    var room = 1;
	function education_fields() {
 
    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="form-group"><div class="row"><div class="col-md-3"><select data-skip-name="true" name="hari[]" class="form-control"><option value="">Pilih Hari</option><option value="Senin">Senin</option><option value="Selasa">Selasa</option><option value="Rabu">Rabu</option><option value="Kamis">Kamis</option><option value="Jumat">Jumat</option><option value="Sabtu">Sabtu</option></select></div><div class="col-md-3"><input type="text" data-skip-name="true" placeholder="Jam"  class="form-control" name="jam[]"></div><div class="col-md-1"><button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"><i class="fa fa-trash"></i> Hapus </button></div></div></div>';
    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
   }

	</script>
	
<!-- Javascript untuk format tanggal -->
<script>
	$(document).ready(function () {
                $('#tanggal_mulai').datepicker({
                 //merubah format tanggal datepicker ke dd-mm-yyyy
                    format: "dd-mm-yyyy",
                    //aktifkan kode dibawah untuk melihat perbedaanya, disable baris perintah diatasa
                    //format: "dd-mm-yyyy",
                    autoclose: true
                });
            });
	
	$(document).ready(function () {
                $('#tanggal_selesai').datepicker({
                 //merubah format tanggal datepicker ke dd-mm-yyyy
                    format: "dd-mm-yyyy",
                    //aktifkan kode dibawah untuk melihat perbedaanya, disable baris perintah diatasa
                    //format: "dd-mm-yyyy",
                    autoclose: true
                });
            });

	// Javascript untuk tanggal
	$(document).ready(function () {
		$('#tanggal').datepicker({
			//merubah format tanggal datepicker ke dd-mm-yyyy
			format: "dd-mm-yyyy",
			//aktifkan kode dibawah untuk melihat perbedaanya, disable baris perintah diatasa
			//format: "dd-mm-yyyy",
			autoclose: true
		});
	});
</script>