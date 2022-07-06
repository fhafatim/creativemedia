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
            <input type="hidden" name="id_barang_keluar" value="<?php echo $barang_keluar->id_barang_keluar ?>">
				<div class="row">
					<div class="col-md-12">
						<div class="nav-tabs-custom">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#kursus" data-toggle="tab">Data Barang Masuk</a></li>
							</ul>
      
							<div class="tab-content">								
								<div class="active tab-pane" id="kursus">

                                <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Tanggal<font color="red"> *
                                                    </font></label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" placeholder="Tanggal" autocomplete="off"
                                                name="tanggal" id="tanggal" aria-describedby="sizing-addon2" value="<?php echo $barang_keluar->tanggal; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Barang<font color="red"> *
                                                    </font></label>
										<div class="col-sm-5">
											<select name="id_barang" id="id_barang" class="form-control select-barang">
												<option></option>
                                                <?php
                                                    foreach($barang as $data){
                                                ?>
												    <option value="<?php echo $data->id_barang ?>" <?php if($data->id_barang == $barang_keluar->id_barang){ echo "selected";} ?>> <?php echo $data->nama_barang ?> </option>
                                                <?php
                                                    }
                                                ?>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Jumlah<font color="red"> *
											</font></label>
										<div class="col-sm-6">
											<input type="number" class="form-control" placeholder="Jumlah"
												name="jumlah" id="jumlah" aria-describedby="sizing-addon2" autocomplete="off" value="<?php echo $barang_keluar->jumlah; ?>">
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Keterangan<font color="red"> *
											</font></label>
										<div class="col-sm-6">
											<input type="text" class="form-control" placeholder="Keterangan"
												name="keterangan" id="keterangan" aria-describedby="sizing-addon2" autocomplete="off" value="<?php echo $barang_keluar->keterangan; ?>">
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Lokasi</label>
										<div class="col-sm-5">
											<select name="lokasi" id="lokasi" class="form-control select-kategori">
												<option></option>
												<option value="tubanan" <?php if($barang_keluar->lokasi == "tubanan"){ echo "selected"; } ?>> Tubanan </option>
												<option value="nginden" <?php if($barang_keluar->lokasi == "nginden"){ echo "selected"; } ?>> Nginden </option>
											</select>
										</div>
									</div>
        
								  <div class="box-footer">
									<button name="simpan" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>
									<a class="klik ajaxify" href="<?php echo site_url('barang-keluar'); ?>"><button class="btn btn-primary btn-flat" ><i class="fa fa-arrow-left"></i> Kembali</button></a>
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
					
					var id_barang = $("#id_barang").val();
					var id_barang = id_barang.trim();

					if (error == 0) {
						if (id_barang.length == 0) {
							error++;
							message = "Barang Wajib Diisi";
						}
					}
					
					var jumlah = $("#jumlah").val();
					var jumlah = jumlah.trim();

					if (error == 0) {
						if (jumlah.length == 0) {
							error++;
							message = "jumlah Wajib Diisi";
						}
					}

					var keterangan = $("#keterangan").val();
					var keterangan = keterangan.trim();

					if (error == 0) {
						if (keterangan.length == 0) {
							error++;
							message = "Keterangan Wajib Diisi";
						}
					}

					var lokasi = $("#lokasi").val();
					var lokasi = lokasi.trim();

					if (error == 0) {
						if (lokasi.length == 0) {
							error++;
							message = "Lokasi Wajib Diisi";
						}
					}
					
					if (error == 0) {
						$.ajax({
						method: 'POST',
						beforeSend: function (){
						$(".loading2").show();
						$(".loading2").modal('show');	
						},
						url: '<?php echo site_url('Inventaris/barang_keluar/prosesUpdateBarangKeluar'); ?>',
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
				placeholder: " -- Kategori Barang -- "
			});
		});
		
		
	</script>