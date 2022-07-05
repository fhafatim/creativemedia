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
								<li class="active"><a href="#kursus" data-toggle="tab">Data Invoice Pelatihan</a></li>
							</ul>
      
							<div class="tab-content">								
								<div class="active tab-pane" id="kursus">

                                	<div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Invoice<font color="red"> *
                                                    </font></label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" placeholder="Tanggal Invoice" autocomplete="off"
                                                name="tanggal_invoice" id="tanggal_invoice" aria-describedby="sizing-addon2">
                                        </div>
                                    </div>
									
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Nomor Invoice<font color="red"> *
											</font></label>
										<div class="col-sm-6">
											<input type="text" class="form-control" placeholder="Nomor Invoice"
												name="nomor_invoice" id="nomor_invoice" aria-describedby="sizing-addon2" autocomplete="off">
										</div>
									</div>

									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Jumlah Tagihan<font color="red"> *
											</font></label>
										<div class="col-sm-6">
											<input type="text" autocomplete="off" class="form-control" placeholder="Jumlah Tagihan" name="jumlah_tagihan"
												id="jumlah_tagihan" aria-describedby="sizing-addon2">
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
					
				$('#form-tambah').submit(function(e) {
					
					var error = 0;
					var message = "";

					var data = $(this).serialize();
										
					
                    var tanggal_invoice = $("#tanggal_invoice").val();
                    var tanggal_invoice = tanggal_invoice.trim();
                
                    if (error == 0) {
                        if (tanggal_invoice.length == 0) {
                            error++;
                            message = "Tanggal Invoice Wajib Diisi";
                        }
                    }

                    var nomor_invoice = $("#nomor_invoice").val();
                    var nomor_invoice = nomor_invoice.trim();
                
                    if (error == 0) {
                        if (nomor_invoice.length == 0) {
                            error++;
                            message = "Nomor Invoice Wajib Diisi";
                        }
                    }

                    var jumlah_tagihan = $("#jumlah_tagihan").val();
                    var jumlah_tagihan = jumlah_tagihan.trim();
                
                    if (error == 0) {
                        if (jumlah_tagihan.length == 0) {
                            error++;
                            message = "Jumlah Tagihan Wajib Diisi";
                        }
                    }
					
					if (error == 0) {
						$.ajax({
						method: 'POST',
						beforeSend: function (){
						$(".loading2").show();
						$(".loading2").modal('show');	
						},
						url: '<?php echo site_url('Pelatihan/Pelatihan/prosesTambahInvoice'); ?>',
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
		
        $(function() {
            $("#tanggal_invoice").datepicker({
                orientation: "left",
                autoclose: !0,
                format: 'dd-mm-yyyy'
            })
        });

        //INPUT FORMAT RUPIAH
        var rupiah = document.getElementById("jumlah_tagihan");
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
	
	
		
		

		
		