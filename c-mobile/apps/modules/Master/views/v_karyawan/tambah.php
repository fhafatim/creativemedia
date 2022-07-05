<?php $this->load->view('_heading/_headerContent') ?>

<style>
.field-icon {
    float: left;
    margin-left: 93%;
    margin-top: -25px;
    position: relative;
    z-index: 2;
}

.selek-penghasilan {
    width: 150px;
}

.selek-pendidikan2 {
    width: 150px;
}

.selek-hubungan {
    width: 250px;
}
</style>

<section class="content">
    <!-- style loading -->
    <div class="loading2"></div>
    <!-- -->
    <form class="form-horizontal" id="form-tambah" method="POST">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#karyawan" data-toggle="tab">Data Karyawan</a></li>
                        <li><a href="#keluarga" data-toggle="tab">Data Keluarga</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="active tab-pane" id="karyawan">

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nama Karyawan<font color="red">
                                        *
                                    </font></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" placeholder="Nama Karyawan"
                                        name="nama_karyawan" id="nama_karyawan" aria-describedby="sizing-addon2"
                                        autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">NIK <font color="red"> *
                                    </font></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" placeholder="NIK" name="nik" id="nik"
                                        aria-describedby="sizing-addon2" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jenis Kelamin<font color="red"> *
                                    </font></label>
                                <div class="col-sm-7">
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control select2-cat"
                                        aria-describedby="sizing-addon2" autocomplete="off">
                                        <option></option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tempat/Tgl Lahir</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Tempat Lahir"
                                        name="tempat_lahir" aria-describedby="sizing-addon2" autocomplete="off">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="tanggal" name="tanggal_lahir"
                                        placeholder="Tanggal Lahir" aria-describedby="sizing-addon2" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Alamat<font color="red"> *
                                    </font></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" placeholder="Alamat" name="alamat"
                                        id="alamat" aria-describedby="sizing-addon2" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label"></label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Kota" name="kota" id="kota"
                                        aria-describedby="sizing-addon2" autocomplete="off">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="provinsi" placeholder="Provinsi"
                                        aria-describedby="sizing-addon2" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nomor Telepon<font color="red">
                                        *
                                    </font></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" placeholder="Nomor Telepon" name="telepon"
                                        id="telepon" aria-describedby="sizing-addon2" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nomor Telepon Alternatif</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" placeholder="Nomor Telepon Alternatif"
                                        name="telepon_alternatif" aria-describedby="sizing-addon2" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Pendidikan</label>
                                <div class="col-sm-7">
                                    <select name="pendidikan" autocomplete="off" class="form-control selek-pendidikan">
                                        <option></option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA/SMK">SMA/SMK</option>
                                        <option value="D3">D3</option>
                                        <option value="D4">D4</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Lembaga Pendidikan</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" placeholder="Lembaga Pendidikan"
                                        name="lembaga_pendidikan" aria-describedby="sizing-addon2" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Tahun Lulus</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" placeholder="Tahun Lulus" name="tahun_lulus"
                                        aria-describedby="sizing-addon2" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jabatan Karyawan<font color="red"> *
                                    </font></label>
                                <div class="col-sm-7">
                                    <select name="jabatan" id="jabatan" class="form-control select-jabatan"
                                        aria-describedby="sizing-addon2" autocomplete="off">
                                        <option></option>
                                        <option value="direktur">Director
                                        </option>
                                        <option value="manager">Manager HR &
                                            GA
                                        </option>
                                        <option value="cso">
                                            Customer Service Officer
                                        </option>
                                        <option value="hrd">
                                            HRD & Admin
                                        </option>
                                        <option value="admin">Admin & Finance
                                        </option>
                                        <option value="programmer">Programmer
                                        </option>
                                        <option value="desaingrafis">
                                            Graphics Designer
                                        </option>
                                        <option value="trainer">
                                            Trainer
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tgl Masuk</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="tanggalmasuk" name="tanggal_masuk"
                                        placeholder="tanggal masuk" aria-describedby="sizing-addon2" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputFoto" class="col-sm-1 control-label"></label>
                                <div id="slider">
                                    <img class="img-thumbnail" id="output"
                                        src="<?php echo base_url();?>/assets/tambahan/gambar/tidak-ada.png"
                                        alt="your image" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputFoto" class="col-sm-2 control-label">Foto/Profile</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" name="gambar" id="gambar" />
                                    <p style='color: red; font-size: 14px;'> *Maksimal File Foto 2 MB</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status Karyawan<font color="red"> *
                                    </font></label>
                                <div class="col-sm-7">
                                    <select name="status_karyawan" id="status_karyawan"
                                        class="form-control select-status" aria-describedby="sizing-addon2"
                                        autocomplete="off">
                                        <option></option>
                                        <option value="aktif">Aktif</option>
                                        <option value="tidak aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="box-footer">
                                <a class="klik ajaxify" href="<?php echo site_url('karyawan'); ?>"><button
                                        class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i>
                                        Kembali</button></a>
                            </div>
                        </div>

                        <!---- ini buat data keluarga -->
                        <div class="tab-pane" id="keluarga">

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nama Lengkap</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Nama Lengkap"
                                        name="nama_keluarga" aria-describedby="sizing-addon2" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nomor Telepon/WA</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Nomor Telepon/WA"
                                        name="telpon_keluarga" aria-describedby="sizing-addon2" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Alamat Lengkap</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Alamat Lengkap"
                                        name="alamat_keluarga" aria-describedby="sizing-addon2" autocomplete="off">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label">Hubungan Keluarga</label>
                                <div class="col-sm-3">
                                    <select name="jenis_hubungan_keluarga" id="jenis_hubungan_keluarga"
                                        class="form-control selek-hubungan" onChange="tambah_lainnya()">
                                        <option></option>
                                        <option value="pasangan">Suami/Istri</option>
                                        <option value="orangtua">Orang Tua</option>
                                        <option value="saudarakandung">Saudara Kandung</option>
                                        <option value="kerabat">Kerabat</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control lainnya" placeholder="Lainnya"
                                        name="hubungan_keluarga" aria-describedby="sizing-addon2" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pendidikan Terakhir</label>
                                <div class="col-sm-3">
                                    <select name="pendidikan_keluarga" class="form-control selek-pendidikan2">
                                        <option></option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA/SMK">SMA/SMK</option>
                                        <option value="D3">D3</option>
                                        <option value="D4">D4</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button name="simpan" type="submit" class="btn btn-success btn-flat"><i
                                        class="fa fa-save"></i> Simpan</button>
                                <a class="klik ajaxify" href="<?php echo site_url('karyawan'); ?>"><button
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
$('.lainnya').hide();
$('.ket').hide();

function tambah_lainnya() {
    var jenis_hubungan_keluarga = document.getElementById(jenis_hubungan_keluarga);
    var jenis_hubungan_keluarga = $("#jenis_hubungan_keluarga").val();
    if (jenis_hubungan_keluarga == 'Lainnya') {
        $('.lainnya').show();
    } else {
        $('.lainnya').hide();
    }
}

$('#form-tambah').submit(function(e) {

    var error = 0;
    var message = "";
    var data = $(this).serialize();

    var nama_karyawan = $("#nama_karyawan").val();
    var nama_karyawan = nama_karyawan.trim();

    if (error == 0) {
        if (nama_karyawan.length == 0) {
            error++;
            message = "Data Karyawan : Nama Wajib Diisi";
        }
    }

    var nik = $("#nik").val();
    var nik = nik.trim();

    if (error == 0) {
        if (nik.length == 0) {
            error++;
            message = "Data Karyawan : NIK Wajib Diisi";
        }
    }

    var jenis_kelamin = $("#jenis_kelamin").val();
    var jenis_kelamin = jenis_kelamin.trim();

    if (error == 0) {
        if (jenis_kelamin.length == 0) {
            error++;
            message = "Data Karyawan : Jenis Kelamin Wajib Diisi";
        }
    }

    var alamat = $("#alamat").val();
    var alamat = alamat.trim();

    if (error == 0) {
        if (alamat.length == 0) {
            error++;
            message = "Data Karyawan : Alamat Wajib Diisi";
        }
    }

    var telepon = $("#telepon").val();
    var telepon = telepon.trim();

    if (error == 0) {
        if (telepon.length == 0) {
            error++;
            message = "Data Karyawan : Telepon Wajib Diisi";
        }
    }

    var jabatan = $("#jabatan").val();
    var jabatan = jabatan.trim();

    if (error == 0) {
        if (jabatan.length == 0) {
            error++;
            message = "Data Karyawan : Jabatan Wajib Diisi";
        }
    }

    var status_karyawan = $("#status_karyawan").val();
    var status_karyawan = status_karyawan.trim();

    if (error == 0) {
        if (status_karyawan.length == 0) {
            error++;
            message = "Data Karyawan : Status Karyawan Wajib Diisi";
        }
    }

    if (error == 0) {
        $.ajax({
                beforeSend: function() {
                    $(".loading2").show();
                    $(".loading2").modal('show');
                },
                url: '<?php echo base_url();?>Master/Karyawan/prosesTambah',
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
                    setTimeout(location.reload.bind(location), 350);

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
    $(".select-jabatan").select2({
        placeholder: " -- Jabatan -- "
    });
});

$(function() {
    $(".select-status").select2({
        placeholder: " -- Status Karyawan -- "
    });
});



$(function() {
    $(".select-agama").select2({
        placeholder: " -- Agama -- "
    });
});

// untuk select2 ajak pilih menu
$(function() {
    $(".selek-pendidikan").select2({
        placeholder: " -- Pendidikan -- "
    });
});

// untuk select2 ajak pilih menu
$(function() {
    $(".selek-hubungan").select2({
        placeholder: " -- Hubungan Keluarga -- "
    });
});

// untuk select2 ajak pilih menu
$(function() {
    $(".selek-pendidikan2").select2({
        placeholder: " -- Pendidikan -- "
    });
});


// untuk select2 ajak pilih menu
$(function() {
    $(".selek-penghasilan").select2({
        placeholder: " -- Penghasilan -- "
    });
});


// untuk datetime from
$(function() {
    $("#tanggal").datepicker({
        format: 'dd-mm-yyyy'
    })
});

// untuk datetime from
$(function() {
    $("#tanggal3").datepicker({
        format: 'dd-mm-yyyy'
    })
});

// untuk datetime from
$(function() {
    $("#tanggal2").datepicker({
        format: 'dd-mm-yyyy'
    })
});

// untuk datetime from
$(function() {
    $("#tanggalmasuk").datepicker({
        format: 'dd-mm-yyyy'
    })
});
</script>