	<?php $this->load->view('_heading/_headerContent') ?>
	
	  <style>
  .field-icon {
  float: left;
  margin-left: 93%;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}

 </style>
	
<section class="content">
	<!-- style loading -->
	<div class="loading2"></div>
	<!-- -->

	<div class="box">
		<form id="form-update" class="form-horizontal" method="POST">
			<input type="hidden" name="id_tentor" value="<?php echo $datatrainer->id_tentor; ?>">
			<!-- <input type="hidden" name="updated_by" value="<?php echo $userdata->nama; ?>"> -->
			<input type="hidden" name="id_login" value="<?php echo $datatrainer->id_login; ?>">
			<div class="row">
				<div class="col-md-8">

					<div class="box-header with-border">
						<h3 class="box-title">Update Data</h3>
					</div>

					<!-- /.box-header -->
					<!-- form start -->
					<div class="box-body">

						<div class="box-body">

							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Nama Trainer</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" placeholder="nama trainer"
										name="nama_tentor" aria-describedby="sizing-addon2"
										value="<?php echo $datatrainer->nama_tentor; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Bidang Studi </label>
								<div class="col-sm-7">
									<select multiple="multiple" name="bidang_studi[]" class="form-control selek-status"
										multiple="multiple" aria-describedby="sizing-addon2">
										<?php $pecah=explode(",",$datatrainer->bidang_studi) ?>
										<?php foreach ($Studi as $data) {?>
										<option value="<?php echo $data->nama_bidang_studi; ?>"
											<?php foreach ($pecah as $pecah2){?>
											<?php if ($data->nama_bidang_studi == $pecah2){echo "selected='selected'";}}?>>
											<?php echo  $data->nama_bidang_studi ?></option>
										<?php
										} 
										?>
									</select>
								</div>
							</div>


							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Username</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" placeholder="username" name="username"
										aria-describedby="sizing-addon2" value="<?php echo $datatrainer->username; ?>">
								</div>
							</div>


							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Password</label>
								<div class="col-sm-7">
									<input type="password" class="form-control" placeholder="password"
										id="password-field" name="password" aria-describedby="sizing-addon2"
										value="<?php echo $datatrainer->password; ?>"><span toggle="#password-field"
										class="fa fa-fw fa-eye field-icon toggle-password"></span>
										<p style='color: red; font-size: 14px;'> *Lewati jika tidak diubah</p>
								</div>
							</div>



							<div class="form-group">
								<div id="slider">
									<img class="img-thumbnail" src='../<?php echo $datatrainer->gambar; ?>'>
								</div>

								<label for="inputFoto" class="col-sm-2 control-label">Image</label>
								<div class="col-sm-7">
									<input type="file" class="form-control" placeholder="gambar" name="gambar"
										id="gambar" onchange="return fileValidation()" />
									<p style='color: red; font-size: 14px;'> *Maksimal File Foto 1 MB</p>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Status Tentor</label>
								<div class="col-sm-3">
									<select name="status_tentor" class="form-control selek-status">
										<!-- <?php foreach ($datatrainer as $data) { ?>
										<option value="<?php echo $data->nama ?>"
											<?php if($data->nama == $datatrainer->status){echo "selected='selected'";} ?>>
											<?php echo $data->nama; ?>
										</option>
										<?php }?> -->

										<option></option>
                                        <option value="aktif"
                                            <?= $datatrainer->status_tentor == 'aktif' ? 'selected' : '' ?>>Aktif
                                        </option>
                                        <option value="tidak aktif"
                                            <?= $datatrainer->status_tentor == 'tidak aktif' ? 'selected' : '' ?>>Tidak Aktif
                                        </option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Status Login</label>
								<div class="col-sm-3">
									<select name="status_login" class="form-control selek-status">
										<!-- <?php foreach ($Ajar as $data) { ?>
										<option value="<?php echo $data->nama ?>"
											<?php if($data->nama == $datatrainer->status_ajar){echo "selected='selected'";} ?>>
											<?php echo $data->nama; ?>
										</option>
										<?php }?> -->

										<option></option>
                                        <option value="aktif"
                                            <?= $datatrainer->status_login == 'aktif' ? 'selected' : '' ?>>Aktif
                                        </option>
                                        <option value="belum aktif"
                                            <?= $datatrainer->status_login == 'belum aktif' ? 'selected' : '' ?>>Belum Aktif
                                        </option>
									</select>
								</div>
							</div>

						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<button name="simpan" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i>
							Update</button>
						<a class="klik ajaxify" href="<?php echo site_url('trainer'); ?>"><button
								class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> Kembali</button></a>
					</div>
		</form>
	</div>
	<!-- /.box -->
	</div>
	<!-- /.row -->
	</div>

</section>
		
		
	<script type="text/javascript">	
	
		$('#form-update').submit(function(e) {
		
		var data = $(this).serialize();
		
		$.ajax({
        beforeSend: function (){
        $(".loading2").show();
		$(".loading2").modal('show');	
        },
		url:'<?php echo base_url();?>Category/Trainer/prosesUpdate',
		type:"post",
		data:new FormData(this),
		processData:false,
		contentType:false,
		cache:false,	
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
		
		
		// untuk select2 ajak pilih tipe
		$(function () 
		{
		$(".selek-status").select2({
        placeholder: " -- pilih status -- "
        });
		});
		
		// untuk select2 ajak pilih tipe
		$(function () 
		{
		$(".selek-status").select2({
        placeholder: " -- pilih bidang studi -- "
        });
		});
		
		
	// untuk show hide password
	$(".toggle-password").click(function() {

	$(this).toggleClass("fa-eye fa-eye-slash");
	var input = $($(this).attr("toggle"));
	if (input.attr("type") == "password") {
    input.attr("type", "text");
	} else {
    input.attr("type", "password");
	}
	});
		
	</script>
