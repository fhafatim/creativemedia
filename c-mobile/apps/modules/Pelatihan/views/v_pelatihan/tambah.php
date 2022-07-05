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
								<li class="active"><a href="#kursus" data-toggle="tab">Data Pendaftar</a></li>
							</ul>
      
							<div class="tab-content">								
								<div class="active tab-pane" id="kursus">
									<div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Pendaftaran<font color="red"> *
                                                    </font></label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" placeholder="Tanggal Pendaftaran" autocomplete="off"
                                                name="tanggal_pendaftaran" id="tanggal_pendaftaran" aria-describedby="sizing-addon2">
                                        </div>
                                    </div>
									
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Nama Perusahaan<font color="red"> *
											</font></label>
										<div class="col-sm-6">
											<input type="text" class="form-control" placeholder="Nama Perusahaan"
												name="nama_perusahaan" id="nama_perusahaan" aria-describedby="sizing-addon2" autocomplete="off">
										</div>
									</div>

									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Alamat<font color="red"> *
											</font></label>
										<div class="col-sm-6">
											<input type="text" autocomplete="off" class="form-control" placeholder="Alamat" name="alamat"
												id="alamat" aria-describedby="sizing-addon2">
										</div>
									</div>

									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label"></label>
										<div class="col-sm-3">
											<input type="text" autocomplete="off" class="form-control" placeholder="Kota" name="kota" id="kota"
												aria-describedby="sizing-addon2">
										</div>
										<div class="col-sm-3">
											<input type="text" autocomplete="off" class="form-control" name="provinsi" placeholder="Provinsi"
												aria-describedby="sizing-addon2">
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Nama PIC<font
												color="red"> *
											</font></label>
										<div class="col-sm-6">
											<input type="text" autocomplete="off" class="form-control" placeholder="Nama PIC"
												name="nama_pic" id="nama_pic" aria-describedby="sizing-addon2">
										</div>
									</div>

									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Nomor Telepon/WA<font
												color="red"> *
											</font></label>
										<div class="col-sm-6">
											<input type="number" autocomplete="off" class="form-control" placeholder="Nomor Telepon/WA"
												name="telepon" id="telepon" aria-describedby="sizing-addon2">
										</div>
									</div>

									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
										<div class="col-sm-6">
											<input type="email" autocomplete="off" class="form-control" placeholder="Email" name="email" id="email"
												aria-describedby="sizing-addon2">
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
									<a class="klik ajaxify" href="<?php echo site_url('pelatihan'); ?>"><button class="btn btn-primary btn-flat" ><i class="fa fa-arrow-left"></i> Kembali</button></a>
								  </div>
								</div>
							</div>
						</div>
					</div>
				</div> 
			</form>
		</section>
		
		
	<script type="text/javascript">	
	
				
				$('#form-tambah').submit(function(e) {
					
					var error = 0;
					var message = "";

					var data = $(this).serialize();
										
					var tanggal_pendaftaran = $("#tanggal_pendaftaran").val();
					var tanggal_pendaftaran = tanggal_pendaftaran.trim();

					if (error == 0) {
						if (tanggal_pendaftaran.length == 0) {
							error++;
							message = "Data Pelatihan : Tanggal Wajib Diisi";
						}
					}
					
					var nama_perusahaan = $("#nama_perusahaan").val();
					var nama_perusahaan = nama_perusahaan.trim();

					if (error == 0) {
						if (nama_perusahaan.length == 0) {
							error++;
							message = "Data Pelatihan : Nama Perusahaan Wajib Diisi";
						}
					}
					
					var alamat = $("#alamat").val();
					var alamat = alamat.trim();

					if (error == 0) {
						if (alamat.length == 0) {
							error++;
							message = "Data Pelatihan : Alamat Wajib Diisi";
						}
					}
					
					var nama_pic = $("#nama_pic").val();
					var nama_pic = nama_pic.trim();

					if (error == 0) {
						if (nama_pic.length == 0) {
							error++;
							message = "Data Pelatihan : Nama PIC Wajib Diisi";
						}
					}
					
					var telepon = $("#telepon").val();
					var telepon = telepon.trim();

					if (error == 0) {
						if (telepon.length == 0) {
							error++;
							message = "Data Pelatihan : Telepon Wajib Diisi";
						}
					}
					
					var email = $("#email").val();
                    var email = email.trim();
                
                    if (error == 0) {
                        if (email.length == 0) {
                            error++;
                            message = "Email Wajib Diisi";
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
						url: '<?php echo site_url('Pelatihan/Pelatihan/prosesTambahPelatihan'); ?>',
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
								$(window).attr('location','detail-pelatihan/'+result.id_pelatihan);
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
		
		$(function() {
			$(".select-tempat-daftar").select2({
				placeholder: " -- Tempat Daftar -- "
			});
		});
		
		// untuk datetime from
        $(function() {
            $("#tanggal_pendaftaran").datepicker({
                orientation: "left",
                autoclose: !0,
                format: 'dd-mm-yyyy'
            })
        });
		
		
	</script>
	
	
		
		

		
		