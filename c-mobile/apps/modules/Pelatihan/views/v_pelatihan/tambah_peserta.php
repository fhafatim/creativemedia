<?php $this->load->view('_heading/_headerContent') ?>

<style>
#osas {
    color: red;
    font-weight: bold;
    margin-left: 0px;
}

.selek-penghasilan {
    width: 150px;
}

.selek-penghasilanayah {
    width: 150px;
}

.selek-pendidikan2 {
    width: 150px;
}

.selek-studi {
    width: 200px;
}

.select-level {
    width: 200px;
}

.select-kategori-kelas {
    width: 200px;
}

.select-metode-belajar {
    width: 200px;
}

.select2-cat {
    width: 200px;
}
</style>

<section class="content">
    <!-- style loading -->
    <div class="loading2"></div>
    <!-- -->

    <form class="form-horizontal" id="form-tambah" method="POST">
        <input type="hidden" name="created_by" value="<?php echo $userdata->nama; ?>">
        <input type="hidden" name="id_pelatihan" value="<?php echo $datamaster; ?>">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs"> 
                        <li class="active"><a href="#siswa" data-toggle="tab">Data Siswa</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="active tab-pane" id="siswa">

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nama Lengkap<font color="red"> *
                                    </font></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Nama Lengkap"
                                        name="nama_lengkap" id="nama_lengkap" aria-describedby="sizing-addon2" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">NIK / Nomor KK<font color="red"></font></label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" placeholder="NIK" name="nik" id="nik"
                                        aria-describedby="sizing-addon2" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Tempat/Tgl Lahir</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Tempat Lahir"
                                        name="tempat_lahir" aria-describedby="sizing-addon2" autocomplete="off">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="tanggal" autocomplete="off" name="tanggal_lahir"
                                        placeholder="Tanggal Lahir" aria-describedby="sizing-addon2" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Agama</label>
                                <div class="col-sm-3">
                                    <select name="agama" class="form-control select-agama" autocomplete="off">
                                        <option></option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Kepercayaan">Kepercayaan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jenis Kelamin<font color="red"> *
                                    </font></label>
                                <div class="col-sm-3">
                                    <select name="jenis_kelamin" autocomplete="off" id="jenis_kelamin" class="form-control select2-cat">
                                        <option></option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
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
                                <label for="inputEmail3" class="col-sm-2 control-label">Nomor Telepon/WA<font
                                        color="red"> *
                                    </font></label>
                                <div class="col-sm-6">
                                    <input type="number" autocomplete="off" class="form-control" placeholder="Nomor Telepon/WA"
                                        name="handphone" id="handphone" aria-describedby="sizing-addon2">
                                </div>
                            </div>

                            <div class="form-group">
										<label class="col-sm-2 control-label">Bidang Studi<font color="red"> *
											</font></label>
										<div class="col-sm-3">
											<select name="bidang_studi" id="bidang_studi" class="form-control selek-studi">
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
									</div>
                            
                            <div class="box-footer">
                                <button name="simpan" type="submit" class="btn btn-success btn-flat"><i
                                        class="fa fa-save"></i> Simpan</button>
                                <a class="klik ajaxify" href="<?php echo site_url('siswa'); ?>"><button
                                        class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i>
                                        Kembali</button></a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>


<script type="text/javascript">
$('#gambar').bind('change', function() {
    if (this.files[0].size > 2007200) // validasi ukuran size file
    {
        swal("Peringatan", "File harus maksimal 2 MB", "warning");
        this.value = '';
        // return false;
    } else {
        var reader = new FileReader();
        reader.onload = function() {
            var dataURL = reader.result;
            var output = document.getElementById('output');
            output.src = dataURL;
        };
        reader.readAsDataURL(this.files[0]);
    }
});
</script>

<script type="text/javascript">
//Proses Controller logic ajax

$('#form-tambah').submit(function(e) {

    var error = 0;
    var message = "";

    var data = $(this).serialize();

    var nama_lengkap = $("#nama_lengkap").val();
    var nama_lengkap = nama_lengkap.trim();

    if (error == 0) {
        if (nama_lengkap.length == 0) {
            error++;
            message = "Nama Lengkap Wajib Diisi";
        }
    }

    var jenis_kelamin = $("#jenis_kelamin").val();
    var jenis_kelamin = jenis_kelamin.trim();

    if (error == 0) {
        if (jenis_kelamin.length == 0) {
            error++;
            message = "Jenis Kelamin Wajib Diisi";
        }
    }

    var alamat = $("#alamat").val();
    var alamat = alamat.trim();

    if (error == 0) {
        if (alamat.length == 0) {
            error++;
            message = "Alamat Wajib Diisi";
        }
    }

    var handphone = $("#handphone").val();
    var handphone = handphone.trim();

    if (error == 0) {
        if (handphone.length == 0) {
            error++;
            message = "Handphone Wajib Diisi";
        }
    }

    var bidang_studi = $("#bidang_studi").val();
    var bidang_studi = bidang_studi.trim();

    if (error == 0) {
        if (bidang_studi.length == 0) {
            error++;
            message = "Bidang Studi Wajib Diisi";
        }
    }

    if (error == 0) {
        $.ajax({
                beforeSend: function() {
                    $(".loading2").show();
                    $(".loading2").modal('show');
                },
                url: '<?php echo base_url();?>Pelatihan/Pelatihan/prosesTambahPeserta',
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
            })
            .done(function(data) {
                var result = jQuery.parseJSON(data);
                if (result.status == 'berhasil') {
                    document.getElementById("form-tambah").reset();
                    $(".loading2").hide();
                    $(".loading2").modal('hide');
                    save_berhasil();
                    $("#slider").fadeOut("slow");
                    $(window).attr('location','../detail-pelatihan/'+<?php echo $datamaster; ?>);

                } else

                {
                    document.getElementById("form-tambah").reset();
                    $(".loading2").hide();
                    $(".loading2").modal('hide');
                    gagal();
                    $("#slider").fadeOut("slow");
                    setTimeout(location.reload.bind(location), 350);
                }
            })
        e.preventDefault();
    } else {
        swal("Peringatan", message, "warning");
        return false;
    }
});


// untuk select2 ajak pilih menu
$(function() {
    $(".select2-cat").select2({
        placeholder: " --Jenis Kelamin -- "
    });
});

$(function() {
    $(".select-agama").select2({
        placeholder: " -- Agama -- "
    });
});

$(function() {
    $("#tanggal").datepicker({
        format: 'dd-mm-yyyy'
    })
});

$(function () 
		{
		$(".selek-studi").select2({
        placeholder: " -- Bidang studi -- "
        });
		});

</script>