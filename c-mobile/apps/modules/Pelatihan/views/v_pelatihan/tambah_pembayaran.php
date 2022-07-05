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
								<li class="active"><a href="#kursus" data-toggle="tab">Data Pembayaran Pelatihan</a></li>
							</ul>
      
							<div class="tab-content">								
								<div class="active tab-pane" id="kursus">

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Pembayaran<font color="red"> *
                                                    </font></label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" placeholder="Tanggal Pembayaran" autocomplete="off"
                                                name="tanggal_pembayaran" id="tanggal_pembayaran" aria-describedby="sizing-addon2">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Kategori Pembayaran<font color="red"> *
                                                    </font></label>
                                        <div class="col-sm-3">
                                            <select name="kategori_pembayaran" id="kategori_pembayaran" class="form-control select-kategori-pembayaran">
                                                <option></option>
                                                <option value="uang muka"> Uang Muka </option>
                                                <option value="angsuran"> Angsuran </option>
                                                <option value="pelunasan"> Pelunasan </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Jenis Pembayaran<font color="red"> *
                                                    </font></label>
                                        <div class="col-sm-3">
                                            <select name="jenis_pembayaran" id="jenis_pembayaran" class="form-control select-jenis-pembayaran"
                                                onchange="disable_enable(this.value)">
                                                <option></option>
                                                <option value="tunai"> Tunai </option>
                                                <option value="transfer"> Transfer </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Dari Bank</label>
                                        <div class="col-sm-3">
                                            <select name="bank" class="form-control select-bank">
                                                <option></option>
                                                <?php
                                                    foreach($bank as $databank)
                                                    {
                                                ?>
                                                    <option value="<?php echo $databank->name ?>"> <?php echo $databank->name ?> </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Nomor Rekening</label>
                                        <div class="col-sm-3">
                                            <input type="number" class="form-control" placeholder="Nomor Rekening" name="nomor_rekening"
                                                aria-describedby="sizing-addon2" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Atas Nama</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" placeholder="Atas Nama" name="atas_nama"
                                                aria-describedby="sizing-addon2" autocomplete="off">
                                        </div>
                                    </div>
				
				
									<div class="form-group">
										<label class="col-sm-2 control-label">Jumlah Pembayaran</label>
										<div class="col-sm-5">
											<input type="text" id="jumlah_pembayaran" name="jumlah_pembayaran" class="form-control">
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
										
					
                    var tanggal_pembayaran = $("#tanggal_pembayaran").val();
                    var tanggal_pembayaran = tanggal_pembayaran.trim();
                
                    if (error == 0) {
                        if (tanggal_pembayaran.length == 0) {
                            error++;
                            message = "Tanggal Pembayaran Wajib Diisi";
                        }
                    }

                    var kategori_pembayaran = $("#kategori_pembayaran").val();
                    var kategori_pembayaran = kategori_pembayaran.trim();
                
                    if (error == 0) {
                        if (kategori_pembayaran.length == 0) {
                            error++;
                            message = "Kategori Pembayaran Wajib Diisi";
                        }
                    }

                    var jenis_pembayaran = $("#jenis_pembayaran").val();
                    var jenis_pembayaran = jenis_pembayaran.trim();
                
                    if (error == 0) {
                        if (jenis_pembayaran.length == 0) {
                            error++;
                            message = "Jenis Pembayaran Wajib Diisi";
                        }
                    }

                    var jumlah_pembayaran = $("#jumlah_pembayaran").val();
                    var jumlah_pembayaran = jumlah_pembayaran.trim();
                
                    if (error == 0) {
                        if (jumlah_pembayaran.length == 0) {
                            error++;
                            message = "Jumlah Pembayaran Wajib Diisi";
                        }
                    }
					
					if (error == 0) {
						$.ajax({
						method: 'POST',
						beforeSend: function (){
						$(".loading2").show();
						$(".loading2").modal('show');	
						},
						url: '<?php echo site_url('Pelatihan/Pelatihan/prosesTambahPembayaran'); ?>',
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
            $("#tanggal_pembayaran").datepicker({
                orientation: "left",
                autoclose: !0,
                format: 'dd-mm-yyyy'
            })
        });

        $(function() {
            $(".select-kategori-pembayaran").select2({
                placeholder: " -- Kategori Pembayaran -- "
            });
        });

        $(function() {
            $(".select-jenis-pembayaran").select2({
                placeholder: " -- Jenis Pembayaran -- "
            });
        });

        $(function() {
            $(".select-bank").select2({
                placeholder: " -- Nama BANK -- "
            });
        });

        //INPUT FORMAT RUPIAH
        var rupiah = document.getElementById("jumlah_pembayaran");
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

        function disable_enable(pilihan) {

        if (pilihan == "tunai" || document.forms[0].jenis_pembayaran.value == "tunai") {

            document.forms[0].bank.disabled = true;
            document.forms[0].atas_nama.disabled = true;
            document.forms[0].nomor_rekening.disabled = true;
        } else {
            document.forms[0].bank.disabled = false;
            document.forms[0].atas_nama.disabled = false;
            document.forms[0].nomor_rekening.disabled = false;
        }

        }
		
	</script>
	
	
		
		

		
		