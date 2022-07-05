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

.select-trainer {
    width: 200px;
}

</style>
		
	<section class="content">
		<!-- style loading -->
		<div class="loading2"></div>
		<!-- -->
				
		<form class="form-horizontal" id="form-tambah" method="POST">
			<input type="hidden" name="created_by" value="<?php echo $userdata->nama; ?>">
            <input type="hidden" name="id_pelatihan" value="<?php echo $datamaster ?>">
				<div class="row">
					<div class="col-md-12">
						<div class="nav-tabs-custom">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#kursus" data-toggle="tab">Data Bidang Studi Pelatihan</a></li>
							</ul>
      
							<div class="tab-content">								
								<div class="active tab-pane" id="kursus">

                                	<div class="form-group">
										<label class="col-sm-2 control-label">Bidang Studi<font color="red"> *
											</font></label>
										<div class="col-sm-3">
											<select name="bidang_studi" id="bidang_studi" class="form-control selek-studi" onChange="ket_lain()">
												<option></option>
												<?php
												foreach ($Studi as $datastudi) {
												?>
												<option value="<?php echo $datastudi->nama_bidang_studi; ?>">
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
													<option value="<?php echo $datalevel->nama_level_kelas; ?>">
														<?php echo $datalevel->nama_level_kelas; ?>
													</option>
												<?php
												}
												?>
											</select>
										</div>
									</div>
																		
									<div class="form-group">
										<label class="col-sm-2 control-label">Trainer</label>
										<div class="col-sm-5">
											<select name="trainer" id="trainer" class="form-control select-trainer">
												<option></option>
												<?php
													foreach ($trainer as $datatrainer) {
												?>
													<option value="<?php echo $datatrainer->nama_tentor; ?>">
														<?php echo $datatrainer->nama_tentor; ?>
													</option>
												<?php
												}
												?>
											</select>
										</div>
									</div>

									<div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Mulai<font color="red"> *
                                                    </font></label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" placeholder="Tanggal Mulai" autocomplete="off"
                                                name="tanggal_mulai" id="tanggal_mulai" aria-describedby="sizing-addon2">
                                        </div>
                                    </div>

									<div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Selesai<font color="red"> *
                                                    </font></label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" placeholder="Tanggal Selesai" autocomplete="off"
                                                name="tanggal_selesai" id="tanggal_selesai" aria-describedby="sizing-addon2">
                                        </div>
                                    </div>
        
								  <div class="box-footer">
									<button name="simpan" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>
									<a class="klik ajaxify" href="<?php echo base_url('detail-pelatihan/'.$datamaster); ?>"><button class="btn btn-primary btn-flat" ><i class="fa fa-arrow-left"></i> Kembali</button></a>
								  </div>
								</div>
							</div>
						</div>
					</div>
				</div> 
			</form>
		</section>
		
		
	<script type="text/javascript">	
	
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
				
				$('#form-tambah').submit(function(e) {
					
					var error = 0;
					var message = "";

					var data = $(this).serialize();
										
					
                    var bidang_studi = $("#bidang_studi").val();
                    var bidang_studi = bidang_studi.trim();
                
                    if (error == 0) {
                        if (bidang_studi.length == 0) {
                            error++;
                            message = "Bidang Studi Wajib Diisi";
                        }
                    }

                    var level = $("#level").val();
                    var level = level.trim();
                
                    if (error == 0) {
                        if (level.length == 0) {
                            error++;
                            message = "Level Wajib Diisi";
                        }
                    }

                    var trainer = $("#trainer").val();
                    var trainer = trainer.trim();
                
                    if (error == 0) {
                        if (trainer.length == 0) {
                            error++;
                            message = "Trainer Wajib Diisi";
                        }
                    }
					
					if (error == 0) {
						$.ajax({
						method: 'POST',
						beforeSend: function (){
						$(".loading2").show();
						$(".loading2").modal('show');	
						},
						url: '<?php echo site_url('Pelatihan/Pelatihan/prosesTambahBidangStudi'); ?>',
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
								$(window).attr('location','../detail-pelatihan/'+<?php echo $datamaster; ?>);
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
		$(".selek-studi").select2({
        placeholder: " -- Bidang studi -- "
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
		$(".select-trainer").select2({
        placeholder: " -- Trainer -- "
        });
		});

		$(function() {
            $("#tanggal_mulai").datepicker({
                orientation: "left",
                autoclose: !0,
                format: 'dd-mm-yyyy'
            })
        });

		$(function() {
            $("#tanggal_selesai").datepicker({
                orientation: "left",
                autoclose: !0,
                format: 'dd-mm-yyyy'
            })
        });
		
	</script>
	
	
		
		

		
		