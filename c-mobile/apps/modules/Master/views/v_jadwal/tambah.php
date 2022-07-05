<?php $this->load->view('_heading/_headerContent') ?>

<style>
#osas {
color:red;
font-weight:bold;
margin-left:0px;
}

#education_fields {
	width:610px;
	margin-left:190px;
} 

.after-add-more
{
	padding-left:10px;
	width:395px;
	
}

#loadingImg
{
	margin-left:150px;
}
</style>
		
<section class="content">
	<!-- style loading -->
	<div class="loading2"></div>
	<!-- -->

	<div class="box">
		<div class="row">
			<div class="col-md-10">

				<div class="box-header with-border">
					<h3 class="box-title">Tambah Data</h3>
				</div>

				<!-- /.box-header -->
				<!-- form start -->

				<form class="form-horizontal" id="form-tambah" method="POST">
					<!-- <input type="hidden" name="created_by" value="<?php echo $userdata->nama; ?>"> -->

					<div class="box-body">

						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Siswa</label>
							<div class="col-sm-4">
								<select class="form-control selek-siswa" name="id_pendaftaran" id="siswa">
									<option></option>
									<?php
									foreach ($Siswa as $datasiswa) {
									?>
										<option value="<?php echo $datasiswa->id_pendaftaran; ?>">
											[<?php echo $datasiswa->no_pendaftaran; ?>] - <?php echo $datasiswa->nama_siswa; ?>
										</option>
									<?php
									}
									?>
								</select>
							</div>

							
							<label class="col-sm-2 control-label">Lokasi</label>
							<div class="col-sm-4">
								<select class="form-control selek-ruang" name="ruang" id="ruang">
									<option value=""></option>
									<option value="tubanan">Tubanan</option>
									<option value="nginden">Nginden</option>
									<option value="home">Home</option>
									<option value="online">Online</option>
								</select>
							</div>
						</div>



						<div id="studi">
							<div class="form-group">
								<label class="col-sm-2 control-label">Bidang Studi</label>
								<div class="col-sm-4">
									<select select name="studi" class="form-control selek-studi" id="bidang_studi">
										<option></option>
									</select>
								</div>
							</div>
						</div>

						<div id="idsiswa">
							<div class="form-group">
								<label class="col-sm-2 control-label">ID Siswa</label>
								<div class="col-sm-4">
									<select select name="id_siswa" class="form-control selek-idsiswa" id="id_siswa">
										<option></option>
									</select>									
								</div>
							</div>
						</div>

						<div id="loadingImg">
							<img src="<?php echo base_url().'assets/' ?>tambahan/gambar/loading-bubble.gif">
							<p style="color:black;">Sistem sedang memproses data...</p>
						</div>

						<!-- <div class="form-group" style="display:none;">
							<label class="col-sm-2 control-label">Nama Siswa</label>
							<div class="col-sm-4">
								<select select type="hidden" name="id_siswa" class="form-control selek-siswa"
									id="nama_siswa" value="<?= $Siswa->id_siswa ?>">
									<option></option>
								</select>
							</div>
						</div> -->


						<div class="form-group">
							<label class="col-sm-2 control-label">Trainer</label>
							<div class="col-sm-4">
								<select name="id_tentor" class="form-control selek-tentor">
								</select>
								<p style='color: red; font-size: 14px;'> * Ketik keyword Nama Trainer</p>
							</div>

							<label class="col-sm-2 control-label">Tgl Mulai</label>
                            <div class="col-sm-3">
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" name="tanggal_mulai" class="form-control pull-right" id="tanggal_mulai" autocomplete="off">
								</div>
                                <!-- <input type="date" class="form-control" id="tanggal2" autocomplete="off" name="tanggal_mulai" placeholder="tanggal mulai" aria-describedby="sizing-addon2"> -->
								
                            </div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Jumlah Pertemuan </label>
							<div class="col-sm-4">
								<input type="text" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" placeholder="Masukkan Jumlah Pertemuan " name="jumlah_pertemuan" aria-describedby="sizing-addon2">
							</div>

							<label class="col-sm-2 control-label">Tgl Selesai</label>
                            <div class="col-sm-3">
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" name="tanggal_selesai" class="form-control pull-right" id="tanggal_selesai" autocomplete="off">
								</div>
                                <!-- <input type="date" class="form-control" id="tanggal2" autocomplete="off" name="tanggal_selesai" placeholder="tanggal selesai" aria-describedby="sizing-addon2"> -->
                            </div>
						</div>

					</div>
					<div class="box-footer">
						<button name="simpan" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>
						<a class="klik ajaxify" href="<?php echo site_url('jadwal'); ?>"><button class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> Kembali</button></a>
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
		url: '<?php echo site_url('Master/Jadwal/prosesTambah'); ?>',
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
				//setTimeout(location.reload.bind(location), 450);
				//window.location = 'jadwal_kelas';

				var link = '<?php echo base_url("jadwal_kelas/")?>';
				var redirect = link+''+result.id_kelas;
                window.location.replace(redirect);
				//alert(result.id_kelas);
			} else 
			
			{
				$(".loading2").hide();
				$(".loading2").modal('hide');	
				gagal();
				
			}
		})
		
		e.preventDefault();
		});
		
		
		
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
		$(".selek-ruang").select2({
        placeholder: " -- Pilih Lokasi -- ",
		allowClear: true
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
		$(".selek-idsiswa").select2({
        placeholder: " -- Id siswa -- ",
		allowClear: true
        });
		});
		
		
		// untuk datetime from
		$(function () 
		{
		$(".tanggal").datepicker({
		format: 'dd-mm-yyyy'
		})
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
	


	<script type="text/javascript">

		$(function(){
		$("#loadingImg").hide();
		$("#studi").hide();
		$("#idsiswa").hide();

		$.ajaxSetup({
		type:"POST",
		url: "<?php echo base_url('Master/Jadwal/ambil_data') ?>",
		cache: true,
		});

		$("#siswa").change(function(){
		var value=$(this).val();
		if(value>0){
		$.ajax({
		beforeSend: function (){
		$("#loadingImg").fadeIn();
        },
		data:{modul:'bidang_studi',id_pendaftaran:value},
		success: function(respond){
		$("#bidang_studi").html(respond);
		$("#loadingImg").fadeOut();	
		$("#studi").fadeIn();	
		}
		})
		}
		});


		$("#siswa").change(function(){
		var value=$(this).val();
		if(value>0){
		$.ajax({
		beforeSend: function (){
		$("#loadingImg").fadeIn();
        },
		data:{modul:'id_siswa',id_pendaftaran:value},
		success: function(respond){
		$("#id_siswa").html(respond);
		$("#loadingImg").fadeOut();	
		$("#idsiswa").hide();	
		}
		})
		}
		});
		
		
		
		
		
		})
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
	