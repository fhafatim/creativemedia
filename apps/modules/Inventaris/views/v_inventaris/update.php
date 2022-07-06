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
            <input type="hidden" name="id_barang" value="<?php echo $inventaris->id_barang ?>">
				<div class="row">
					<div class="col-md-12">
						<div class="nav-tabs-custom">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#kursus" data-toggle="tab">Data Inventaris</a></li>
							</ul>
      
							<div class="tab-content">								
								<div class="active tab-pane" id="kursus">

									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Kode Barang<font color="red"> *
											</font></label>
										<div class="col-sm-6">
											<input type="text" class="form-control" placeholder="Kode Barang"
												name="kode_barang" id="kode_barang" aria-describedby="sizing-addon2" autocomplete="off" value="<?php echo $inventaris->kode_barang ?>">
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Nama Barang<font color="red"> *
											</font></label>
										<div class="col-sm-6">
											<input type="text" class="form-control" placeholder="Nama Barang"
												name="nama_barang" id="nama_barang" aria-describedby="sizing-addon2" autocomplete="off" value="<?php echo $inventaris->nama_barang ?>">
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Kategori Barang</label>
										<div class="col-sm-5">
											<select name="kategori_barang" id="kategori_barang" class="form-control select-kategori">
												<option></option>
												<option value="aset" <?php if($inventaris->kategori_barang == "aset"){ echo "selected"; } ?>> Aset </option>
												<option value="starter kit" <?php if($inventaris->kategori_barang == "starter kit"){ echo "selected"; } ?>> Starter Kit </option>
											</select>
										</div>
									</div>
        
								  <div class="box-footer">
									<button name="simpan" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>
									<a class="klik ajaxify" href="<?php echo site_url('inventaris'); ?>"><button class="btn btn-primary btn-flat" ><i class="fa fa-arrow-left"></i> Kembali</button></a>
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
					
					var nama_barang = $("#nama_barang").val();
					var nama_barang = nama_barang.trim();

					if (error == 0) {
						if (nama_barang.length == 0) {
							error++;
							message = "Nama Barang Wajib Diisi";
						}
					}
					
					var kode_barang = $("#kode_barang").val();
					var kode_barang = kode_barang.trim();

					if (error == 0) {
						if (kode_barang.length == 0) {
							error++;
							message = "Kode Barang Wajib Diisi";
						}
					}
					
					var kategori_barang = $("#kategori_barang").val();
					var kategori_barang = kategori_barang.trim();

					if (error == 0) {
						if (kategori_barang.length == 0) {
							error++;
							message = "Kategori Wajib Diisi";
						}
					}
					
					if (error == 0) {
						$.ajax({
						method: 'POST',
						beforeSend: function (){
						$(".loading2").show();
						$(".loading2").modal('show');	
						},
						url: '<?php echo site_url('Inventaris/Inventaris/prosesUpdateBarang'); ?>',
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