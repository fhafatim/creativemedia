<?php $this->load->view('_heading/_headerContent') ?>


		
<section class="content">
	<!-- style loading -->
	<div class="loading2"></div>
	<!-- -->
	<a class="klik ajaxify" href="<?php echo site_url('karyawan'); ?>"><button class="btn btn-warning btn-flat"><i class="fa fa-arrow-left"></i> Kembali</button></a>
	<div class="box">

		<div class="box-header with-border">
			<h3 class="box-title">Form Tambah</h3>
		</div>

		<!-- form start -->

		<form class="form-horizontal" id="form-tambah-sertif" method="POST">
		    <input type="hidden" name="id_karyawan" value="<?php echo $datasertif->id_karyawan; ?>">

		    <div class="box-body">
		        <div class="form-group">
		            <label class="col-sm-2 control-label">Nama Pelatihan</label>
		            <div class="col-sm-4">
		                <input type="text" name="nama_pelatihan" class="form-control">
		                </select>
		            </div>

		            <label class="col-sm-2 control-label">Tanggal Mulai</label>
		            <div class="col-sm-4">
		                <div class="input-group date">
		                    <div class="input-group-addon">
		                        <i class="fa fa-calendar"></i>
		                    </div>
		                    <input type="text" name="tanggal_mulai" class="form-control pull-right" id="tanggal_mulai" autocomplete="off">
		                </div>
		            </div>
		        </div>

		        <div class="form-group">
		            <label class="col-sm-2 control-label">Nomor Sertifikat</label>
		            <div class="col-sm-4">
		                <input type="text" name="no_sertifikat" class="form-control">
		                </select>
		            </div>

		            <label class="col-sm-2 control-label">Tanggal Selesai</label>
		            <div class="col-sm-4">
		                <div class="input-group date">
		                    <div class="input-group-addon">
		                        <i class="fa fa-calendar"></i>
		                    </div>
		                    <input type="text" name="tanggal_selesai" class="form-control pull-right" id="tanggal_selesai" autocomplete="off">
		                </div>
		            </div>
		        </div>

		        <div class="form-group">
		            <!-- <div id="slider">
		                <img class="img-thumbnail" id="output"
		                    src="<?php echo base_url();?>/assets/tambahan/gambar/tidak-ada.png" alt="your image" />
		            </div> -->

		            <label for="inputFoto" class="col-sm-2 control-label">File Sertifikat</label>
		            <div class="col-sm-4">
		                <input type="file" class="form-control" name="gambar" id="gambar" />
		                <p style='color: red; font-size: 14px;'> *Maksimal File Foto 2 MB</p>
		            </div>
		        </div>

		        <div class="box-footer">
		            <button name="simpan" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i>
		                Simpan</button>
		        </div>
		</form>

		<!-- disini datatable -->
		<div class="box-footer">
			<div class="box box-primary">
				<div class="box-header with-border">
					<i class="fa fa-pencil" aria-hidden="true"></i>
					<h3 class="box-title">Data Sertifikat</h3>
				</div>
				<div class="table-responsive">
					<table id="table-detail" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<input type="hidden" name="id_karyawan" value="<?= $datasertif->id_karyawan; ?>">
						<thead>
						    <tr>
						        <th>No.</th>
						        <th>Nomor Sertifikat </th>
						        <th>Nama Pelatihan</th>
						        <th>Durasi Pelatihan</th>
						        <th>Aksi</th>
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
					"url": "<?php echo base_url('ListSertifikat/').$datasertif->id_karyawan?>",
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
		$('#form-tambah-sertif').submit(function(e) {
		var data = $(this).serialize();
		$.ajax({
                beforeSend: function() {
                    $(".loading2").show();
                    $(".loading2").modal('show');
                },
                url: '<?php echo site_url('Master/Sertif_karyawan/prosesTambah'); ?>',
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
            })
		.done(function(data) {
			var result = jQuery.parseJSON(data);
			
			if (result.status == 'berhasil')	
			{
				$(".loading2").hide();
				$(".loading2").modal('hide');				
				save_berhasil();
				setTimeout(location.reload.bind(location), 450);		
            } else {
				$(".loading2").hide();
				$(".loading2").modal('hide');	
				gagal();
			}
		})
		
		e.preventDefault();
		});


		function reload_table() {
			table.ajax.reload(null, false); //reload datatable ajax 
		}
		

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
</script>