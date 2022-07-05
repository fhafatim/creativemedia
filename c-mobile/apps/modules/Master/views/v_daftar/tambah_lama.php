<?php $this->load->view('_heading/_headerContent') ?>

<style>
#osas {
color:red;
font-weight:bold;
margin-left:0px;
}

.selek-penghasilan
{
	width:150px;
}

.selek-pendidikan2
{
	width:150px;
}

.selek-studi
{
	width:200px;
}

.select-level
{
	width:200px;
}

.select-siswa
{
	width:400px;
}

.select-kategori-kelas
{
	width:200px;
}

.select-metode-belajar {
    width: 200px;
}

.select-tempat-daftar {
    width: 200px;
}

</style>
		
	<section class="content">
		<!-- style loading -->
		<div class="loading2"></div>
		<!-- -->
				
		<form class="form-horizontal" id="form-tambah" method="POST">
			<input type="hidden" name="created_by" value="<?php echo $userdata->nama; ?>">
				<div class="row">
					<div class="col-md-12">
						<div class="nav-tabs-custom">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#kursus" data-toggle="tab">Data Kursus</a></li>
							</ul>
      
							<div class="tab-content">								
								<div class="active tab-pane" id="kursus">
									<div class="box-header">
										<h3 class="box-title">Data Kursus</h3>
									</div>
									
									<div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Pendaftaran<font color="red"> *
                                                    </font></label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" placeholder="Tanggal Pendaftaran" autocomplete="off"
                                                name="tanggal_pendaftaran" id="tanggal_pendaftaran" aria-describedby="sizing-addon2">
                                        </div>
                                    </div>
									
									<div class="form-group">
										<label class="col-sm-2 control-label">Siswa</label>
										<div class="col-sm-5">
											<select name="siswa" id="siswa" class="form-control select-siswa">
												<option></option>
												<?php
													foreach ($siswa as $datasiswa) {
												?>
													<option value="<?php echo $datasiswa->id_siswa; ?>">
														<?php echo $datasiswa->nama_siswa; ?> (<?php echo $datasiswa->alamat; ?> - <?php echo $datasiswa->kota; ?>)
													</option>
												<?php
													}
												?>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-2 control-label">Bidang Studi<font color="red"> *
											</font></label>
										<div class="col-sm-3">
											<select name="bidang_studi" id="bidang_studi" class="form-control selek-studi" onChange="ket_lain()">
												<option></option>
												<?php
												foreach ($Studi as $datastudi) {
												?>
												<option value="<?php echo $datastudi->id_bidang_studi; ?>">
													<?php echo $datastudi->nama_bidang_studi; ?>
												</option>
												<?php
												}
												?>
											</select>
										</div>
										<div class="col-sm-3">
											<input type="text" name="keterangan" id="keterangan" class="form-control ket" placeholder="Lainnya" aria-describedby="sizing-addon2" value="<?php echo $Studi->id_bidang_studi ?>">
										</div>
									</div>
				
				
									<div class="form-group">
										<label class="col-sm-2 control-label">Level</label>
										<div class="col-sm-5">
											<select name="level" id="level" class="form-control select-level">
												<option></option>
												<?php
													foreach ($level as $datalevel) {
												?>
													<option value="<?php echo $datalevel->id_level_kelas; ?>">
														<?php echo $datalevel->nama_level_kelas; ?>
													</option>
												<?php
												}
												?>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-2 control-label">Jenis Kursus</label>
										<div class="col-sm-5">
											<select name="kategori_kelas" id="kategori_kelas" class="form-control select-kategori-kelas">
												<option></option>
												<?php
													foreach ($kategori_kelas as $datakategori) {
												?>
													<option value="<?php echo $datakategori->id_kategori_kelas; ?>">
														<?php echo $datakategori->nama_kategori_kelas; ?>
													</option>
												<?php
												}
												?>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label">Metode Belajar<font color="red"> *
											</font></label>
										<div class="col-sm-5">
											<select name="metode_belajar" id="metode_belajar"
												class="form-control select-metode-belajar">
												<option></option>
												<option value="class private">Class Private</option>
												<option value="home private">Home Private</option>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Harga Kursus</label>
										<div class="col-sm-5">
											<input type="text" class="form-control" placeholder="Harga Kursus" name="harga_kursus" id="harga_kursus" aria-describedby="sizing-addon2">
										</div> 
									</div>
									
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Tempat Daftar</label>
										<div class="col-sm-5">
											<select name="tempat_daftar" id="tempat_daftar" class="form-control select-tempat-daftar">
												<option></option>
												<option value="tubanan"> Tubanan </option>
												<option value="nginden"> Nginden </option>
												<option value="sidoarjo"> Sidoarjo </option>
											</select>
										</div>
									</div>
        
								  <div class="box-footer">
									<button name="simpan" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>
									<a class="klik ajaxify" href="<?php echo site_url('daftar'); ?>"><button class="btn btn-primary btn-flat" ><i class="fa fa-arrow-left"></i> Kembali</button></a>
								  </div>
								</div>
							</div>
						</div>
					</div>
				</div> 
			</form>
		</section>
		
		
	<script type="text/javascript">	
	
		//Proses Controller logic ajax
		$('.lainnya').hide();
		$('.ket').hide();

		function ket_lain() {
			var bidang_studi = document.getElementById(bidang_studi);
			var bidang_studi = $("#bidang_studi").val();
			if (bidang_studi == '16') {
				$('.ket').show();
			} else {
				$('.ket').hide();
			}
		}

		// $("#bidang_studi").change(function () {
		// 	var value = $(this).val();
		// 	if (value > 0) {
		// 		$.ajax({
		// 			beforeSend: function () {
		// 				$("#loadingImg").fadeIn();
		// 			},
		// 			data: {
		// 				modul: 'id_siswa',
		// 				id_pendaftaran: value
		// 			},
		// 			success: function (respond) {
		// 				$("#id_siswa").html(respond);
		// 				$("#loadingImg").fadeOut();
		// 				$("#idsiswa").fadeIn();
		// 			}
		// 		})
		// 	}
		// });
				
				$('#form-tambah').submit(function(e) {
					
					var error = 0;
					var message = "";

					var data = $(this).serialize();
										
					var bidang_studi = $("#bidang_studi").val();
					var bidang_studi = bidang_studi.trim();

					if (error == 0) {
						if (bidang_studi.length == 0) {
							error++;
							message = "Data Siswa : Bidang Studi Wajib Diisi";
						}
					}
					
					var level = $("#level").val();
					var level = level.trim();

					if (error == 0) {
						if (level.length == 0) {
							error++;
							message = "Data Siswa : Level Wajib Diisi";
						}
					}
					
					var kategori_kelas = $("#kategori_kelas").val();
					var kategori_kelas = kategori_kelas.trim();

					if (error == 0) {
						if (kategori_kelas.length == 0) {
							error++;
							message = "Data Siswa : Jenis Kursus Wajib Diisi";
						}
					}
					
					var harga_kursus = $("#harga_kursus").val();
					var harga_kursus = harga_kursus.trim();

					if (error == 0) {
						if (harga_kursus.length == 0) {
							error++;
							message = "Data Siswa : Jenis Kursus Wajib Diisi";
						}
					}
					
					var tanggal_pendaftaran = $("#tanggal_pendaftaran").val();
                    var tanggal_pendaftaran = tanggal_pendaftaran.trim();
                
                    if (error == 0) {
                        if (tanggal_pendaftaran.length == 0) {
                            error++;
                            message = "Tanggal Pendaftaran Wajib Diisi";
                        }
                    }
                    
                    var tempat_daftar = $("#tempat_daftar").val();
                    var tempat_daftar = tempat_daftar.trim();
                
                    if (error == 0) {
                        if (tempat_daftar.length == 0) {
                            error++;
                            message = "Tempat Daftar Wajib Diisi";
                        }
                    }
					
					if (error == 0) {
						$.ajax({
						method: 'POST',
						beforeSend: function (){
						$(".loading2").show();
						$(".loading2").modal('show');	
						},
						url: '<?php echo site_url('Master/Daftar/prosesTambahKelas'); ?>',
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
								setTimeout(location.reload.bind(location), 450);
							} else 
							
							{
								$(".loading2").hide();
								$(".loading2").modal('hide');	
								swal("Warning", result.pesan, "warning");
							}
						})
						
						e.preventDefault();
					} else {
						swal("Peringatan", message, "warning");
						return false;
					}
				});	
		
			
		$(function () 
		{
		$(".select-siswa").select2({
        placeholder: " -- Siswa -- "
        });
		});
				
		$(function () 
		{
		$(".select-level").select2({
        placeholder: " -- Level -- "
        });
		});
		
		$(function () 
		{
		$(".select-kategori-kelas").select2({
        placeholder: " -- Jenis Kursus -- "
        });
		});

		$(function() {
			$(".select-metode-belajar").select2({
				placeholder: " -- Metode Belajar -- "
			});
		});
		
		$(function() {
			$(".select-tempat-daftar").select2({
				placeholder: " -- Tempat Daftar -- "
			});
		});
		
		// untuk select2 ajak pilih menu
		$(function () 
		{
		$(".selek-studi").select2({
        placeholder: " -- Bidang studi -- "
        });
		});
		
		// untuk datetime from
        $(function() {
            $("#tanggal_pendaftaran").datepicker({
                orientation: "left",
                autoclose: !0,
                format: 'yyyy-mm-dd'
            })
        });
		
		//INPUT FORMAT RUPIAH
        var rupiah = document.getElementById("harga_kursus");
        rupiah.addEventListener("keyup", function(e) {
          // tambahkan 'Rp.' pada saat form di ketik
          // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
          rupiah.value = formatRupiah(this.value, "Rp. ");
        });
        
        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
          var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        
          // tambahkan titik jika yang di input sudah menjadi angka ribuan
          if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
          }
        
          rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
          return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
        }
		
	</script>
	
	
		
		

		
		