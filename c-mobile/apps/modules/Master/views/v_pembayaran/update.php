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

.select-kategori-kelas
{
	width:200px;
}

</style>
		
	<section class="content">
		<!-- style loading -->
		<div class="loading2"></div>
		<!-- -->
		<div class="box">		
			<form class="form-horizontal" id="form-update" method="POST">
				<input type="hidden" name="created_by" value="<?php echo $userdata->nama; ?>">
				<input type="hidden" name="id_pembayaran" value="<?php echo $datamaster->id_pembayaran; ?>">
				<input type="hidden" name="id_invoice" value="<?php echo $datamaster->id_invoice; ?>">
				<div class="row">
					<div class="col-md-12">
						<div class="box-body">
							
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Tanggal Pembayaran</label>
								<div class="col-sm-2">
									<input type="text" class="form-control" placeholder="Tanggal Pembayaran" name="tanggal_pembayaran" id="tanggal_pembayaran" aria-describedby="sizing-addon2" value="<?php echo $datamaster->tanggal_pembayaran ?>">
								</div> 
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Jenis Pembayaran</label>
								<div class="col-sm-3">
									<select name="jenis_pembayaran" class="form-control select-jenis-pembayaran" onchange="disable_enable(this.value)" >
										<option></option>
										<?php
											if($datamaster->jenis_pembayaran == "tunai")
											{
										?>
												<option value="tunai" selected> Tunai </option>
												<option value="transfer"> Transfer </option>
										<?php
											}
											else
											{
										?>
												<option value="tunai"> Tunai </option>
												<option value="transfer" selected> Transfer </option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Jumlah Pembayaran</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" placeholder="Jumlah Pembayaran" name="nominal" id="nominal" aria-describedby="sizing-addon2" value="<?php echo $datamaster->nominal ?>">
								</div> 
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Bank</label>
								<div class="col-sm-3">
								<select name="bank"class="form-control select-bank">
									<option></option>
									<?php
										foreach($bank as $databank)
										{
									?>
										<?php
											if($datamaster->bank == $databank->name)
											{
										?>
											<option value="<?php echo $databank->name ?>" selected> <?php echo $databank->name ?> </option>
										<?php
											}
											else
											{
										?>
											<option value="<?php echo $databank->name ?>"> <?php echo $databank->name ?> </option>
									<?php
											}
										}
									?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Nomor Rekening</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" placeholder="Nomor Rekening" name="nomor_rekening" aria-describedby="sizing-addon2" >
								</div> 
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Atas Nama</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" placeholder="Atas Nama" name="atas_nama" aria-describedby="sizing-addon2">
								</div> 
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Kategori Pembayaran</label>
								<div class="col-sm-3">
									<select name="kategori_pembayaran" class="form-control select-kategori-invoice">
									<?php
										if($datamaster->kategori_pembayaran == "uang muka")
										{
									?>
											<option value="uang muka" selected> Uang Muka </option>
											<option value="angsuran"> Angsuran </option>
											<option value="pelunasan"> Pelunasan </option>
									<?php
										}
										else if($datamaster->kategori_pembayaran == "cicilan")
										{
									?>
											<option value="uang muka"> Uang Muka </option>
											<option value="angsuran" selected> Angsuran </option>
											<option value="pelunasan"> Pelunasan </option>
									<?php
										}
										else
										{
									?>
											<option value="uang muka"> Uang Muka </option>
											<option value="angsuran"> Angsuran </option>
											<option value="pelunasan" selected> Pelunasan </option>
									<?php
										}
									?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Tempat Pembayaran</label>
								<div class="col-sm-3">
									<select name="tempat_pembayaran" id="tempat_pembayaran" class="form-control select-tempat-pembayaran">
										<option></option>
										<?php
										if($datamaster->tempat_pembayaran == "tubanan")
											{
										?>
												<option value="tubanan" selected> Tubanan </option>
												<option value="nginden"> Nginden </option>
										
										<?php
											}
											else
											{
										?>
												<option value="tubanan"> Tubanan </option>
												<option value="nginden" selected> Nginden </option>
										<?php
											}
										?>
										
									</select>
								</div>
							</div>
							<div class="box-footer">
								<button name="simpan" type="submit" id="form-tambah" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>
								<a class="klik ajaxify" href="<?php echo site_url('pembayaran'); ?>"><button class="btn btn-primary btn-flat" ><i class="fa fa-arrow-left"></i> Kembali</button></a>
							</div>
						</div>	
						</div>
					</div>
				</div> 
			</form>
		</div>
	</section>
		
		
	<script type="text/javascript">	
	
	document.onload = disable_enable();
	function disable_enable(pilihan) {

		if(pilihan=="tunai" || document.forms[0].jenis_pembayaran.value=="tunai") {

			document.forms[0].bank.disabled=true;
			document.forms[0].atas_nama.disabled=true;
			document.forms[0].nomor_rekening.disabled=true;
		} else {
		document.forms[0].bank.disabled=false;
		document.forms[0].atas_nama.disabled=false;
		document.forms[0].nomor_rekening.disabled=false;
		}
	}
	
		$('#form-update').submit(function(e) {
		
		var data = $(this).serialize();

		console.log(data);
		$.ajax({
        	beforeSend: function (){
				$(".loading2").show();
				$(".loading2").modal('show');	
        },
		url:'<?php echo base_url();?>Master/Pembayaran/prosesUpdate',
		type:"post",
		data: new FormData(this),
		processData: false,
		contentType: false,
		cache: false,	
		})
		.done(function(data) {
			var result = jQuery.parseJSON(data);
			console.log(data);
			if (result.status == 'berhasil')
			{
				$(".loading2").hide();
				$(".loading2").modal('hide');
				save_berhasil();			
			} else {
				$(".loading2").hide();
				$(".loading2").modal('hide');	
				gagal();
			
			}
		})
		e.preventDefault();
		});
		// untuk datetime from
		$(function () 
		{
		$("#tanggal").datepicker({
		format: 'dd-mm-yyyy'
		})
		});
		
		// untuk select2 ajak pilih menu
		$(function () 
		{
		$(".select-pendaftaran-kursus").select2({
        placeholder: " -- Pendaftaran Kursus -- "
        });
		});
		
		$(function () 
		{
		$(".select-jenis-pembayaran").select2({
        placeholder: " -- Jenis Pembayaran -- "
        });
		});

		$(function () 
		{
		$(".select-bank").select2({
        placeholder: " -- Nama BANK -- "
        });
		});

		$(function () 
		{
		$(".select-kategori-invoice").select2({
        placeholder: " -- Kategori Pembayaran -- "
        });
		});
		
		$(function() {
			$(".select-tempat-pembayaran").select2({
				placeholder: " -- Tempat Pembayaran -- "
			});
		});
		
		$(function () 
		{
		$(".selek-jumlahtagihan").select2({
        placeholder: " -- Jumlah Tagihan -- ",
		allowClear: true
        });
		});
		
		// untuk select2 ajak pilih menu
		$(function () 
		{
		$(".selek-idpendaftaran").select2({
        placeholder: " -- Id Pendaftaran -- ",
		allowClear: true
        });
		});
		
		
		// untuk datetime from
		$(function () 
		{
		$("#tanggal_pembayaran").datepicker({
			orientation: "left",
			autoclose: !0,
			format: 'yyyy-mm-dd'
			})
			});	

	</script>
