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

.select-kategori
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
				
		<form class="form-horizontal" id="form-update" method="POST">
			<input type="hidden" name="created_by" value="<?php echo $userdata->nama; ?>">
            <input type="hidden" name="id_surat" value="<?php echo $surat->id_surat ?>">
				<div class="row">
					<div class="col-md-12">
						<div class="nav-tabs-custom">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#kursus" data-toggle="tab">Data Barang Masuk</a></li>
							</ul>
      
							<div class="tab-content">								
								<div class="active tab-pane" id="kursus">

									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Jenis Surat</label>
										<div class="col-sm-5">
											<select name="jenis_surat" id="jenis_surat" class="form-control select-kategoris" readonly>
												<option></option>
												<option value="surat masuk" <?php if($surat->jenis_surat == "surat masuk"){ echo "selected";} ?>> Surat Masuk </option>
												<option value="surat keluar" <?php if($surat->jenis_surat == "surat keluar"){ echo "selected";} ?>> Surat Keluar </option>
											</select>
										</div>
									</div>

									<div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Tanggal<font color="red"> *
                                                    </font></label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" placeholder="Tanggal" autocomplete="off"
                                                name="tanggal" id="tanggal" aria-describedby="sizing-addon2" value="<?php echo date('d-m-Y',strtotime($surat->tanggal_surat)) ?>">
                                        </div>
                                    </div>

									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Nomor Surat<font color="red"> *
											</font></label>
										<div class="col-sm-6">
											<input type="text" class="form-control" placeholder="Nomor Surat"
												name="nomor_surat" id="nomor_surat" aria-describedby="sizing-addon2" autocomplete="off" value="<?php echo $surat->nomor_surat ?>">
										</div>
									</div>

									<?php if($surat->jenis_surat == 'surat keluar') { ?>
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Kode Surat<font color="red"> *
											</font></label>
										<div class="col-sm-6">
											<input type="text" class="form-control" placeholder="Contoh : SPK"
												name="perihal" id="perihal" aria-describedby="sizing-addon2" autocomplete="off" value="<?php echo $surat->perihal ?>">
										</div>
									</div>
									<?php } ?>
									
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Isi/Keterangan<font color="red"> *
											</font></label>
										<div class="col-sm-6">
											<input type="text" class="form-control" placeholder="Isi/Keterangan"
												name="keterangan" id="keterangan" aria-describedby="sizing-addon2" autocomplete="off" value="<?php echo $surat->keterangan_surat ?>">
										</div>
									</div>

									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Kepada/Dari<font color="red"> *
											</font></label>
										<div class="col-sm-6">
											<input type="text" class="form-control" placeholder="Kepada/Dari"
												name="dibuat" id="dibuat" aria-describedby="sizing-addon2" autocomplete="off" value="<?php echo $surat->dibuat ?>">
										</div>
									</div>

									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">File<font color="red">*</font>&nbsp<span style="color: grey; font-size: 10px;">Hanya pdf</span></label>
										<div class="col-sm-6">
											<input type="file" class="form-control"
												name="pdf_file" id="pdf_file" required>
										</div>
									</div>
        
								  <div class="box-footer">
									<button name="simpan" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>
									<a class="klik ajaxify" href="<?php echo site_url('surat-tubanan'); ?>"><button class="btn btn-primary btn-flat" ><i class="fa fa-arrow-left"></i> Kembali</button></a>
								  </div>
								</div>
							</div>
						</div>
					</div>
				</div> 
			</form>
		</section>
		
		
	<script type="text/javascript">	
	
				
				$('#form-update').submit(function(e) {
					
					var error = 0;
					var message = "";

					var data = $(this).serialize();
					
					var tanggal = $("#tanggal").val();
					var tanggal = tanggal.trim();

					if (error == 0) {
						if (tanggal.length == 0) {
							error++;
							message = "Tanggal Wajib Diisi";
						}
					}
					
					var nomor_surat = $("#nomor_surat").val();
					var nomor_surat = nomor_surat.trim();

					if (error == 0) {
						if (nomor_surat.length == 0) {
							error++;
							message = "Nomor Surat Wajib Diisi";
						}
					}

					var jenisSurat = "<?= $surat->jenis_surat ?>";

					if (jenisSurat == "surat keluar") {
						var keterangan = $("#perihal").val();
						var keterangan = keterangan.trim();

						if (error == 0) {
							if (keterangan.length == 0) {
								error++;
								message = "Kode Surat Wajib Diisi";
							}
						}
					}

					var keterangan = $("#keterangan").val();
					var keterangan = keterangan.trim();

					if (error == 0) {
						if (keterangan.length == 0) {
							error++;
							message = "Isi/Keterangan Wajib Diisi";
						}
					}

					var dibuat = $("#dibuat").val();
					var dibuat = dibuat.trim();

					if (error == 0) {
						if (dibuat.length == 0) {
							error++;
							message = "Kepada/Dari Wajib Diisi";
						}
					}

					var jenis_surat = $("#jenis_surat").val();
					var jenis_surat = jenis_surat.trim();

					if (error == 0) {
						if (jenis_surat.length == 0) {
							error++;
							message = "Jenis Surat Wajib Diisi";
						}
					}
					
					if (error == 0) {
						$.ajax({
						method: 'POST',
						beforeSend: function (){
						$(".loading2").show();
						$(".loading2").modal('show');	
						},
						url: '<?php echo site_url('Surat/Surat_tubanan/prosesUpdateSurat'); ?>',
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData:false,
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
			$(".select-kategori").select2({
				placeholder: " -- Jenis Surat -- "
			});
		});

		$(function() {
            $("#tanggal").datepicker({
                orientation: "left",
                autoclose: !0,
                format: 'dd-mm-yyyy'
            })
        });
		
		
	</script>