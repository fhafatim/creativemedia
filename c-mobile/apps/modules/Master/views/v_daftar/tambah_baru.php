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

.select-tempat-daftar {
    width: 200px;
}
</style>

<section class="content">
    <!-- style loading -->
    <div class="loading2"></div>
    <!-- -->

    <form class="form-horizontal" id="form-tambah" method="POST">
        <input type="hidden" name="created_by" value="<?php echo $userdata->nama; ?>">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#siswa" data-toggle="tab">Data Siswa</a></li>
                        <li><a href="#ayah" data-toggle="tab">Data Ayah</a></li>
                        <li><a href="#ibu" data-toggle="tab">Data Ibu</a></li>
                        <li><a href="#kursus" data-toggle="tab">Data Kursus</a></li>
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
                                <label for="inputEmail3" class="col-sm-2 control-label">NIK / Nomor KK<font color="red"> *
                                    </font></label>
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
                                <label class="col-sm-2 control-label">Jenis Tinggal</label>
                                <div class="col-sm-3">
                                    <select name="jenis_tempat_tinggal" id="jenis_tempat_tinggal"
                                        class="form-control select-jenis-tinggal" onChange="tambah_lainnya()">
                                        <option></option>
                                        <?php
													foreach ($jenis_tinggal as $datajenistinggal) {
												?>
                                        <option value="<?php echo $datajenistinggal->nama; ?>">
                                            <?php echo $datajenistinggal->nama; ?>
                                        </option>
                                        <?php
													}
												?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control lainnya" placeholder="Lainnya"
                                        name="jenis_tinggal" aria-describedby="sizing-addon2">
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
                                <label for="inputEmail3" class="col-sm-2 control-label"></label>
                                <div class="col-sm-3">
                                    <input type="text" autocomplete="off" class="form-control" placeholder="Kode Pos" name="kode_pos"
                                        aria-describedby="sizing-addon2">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" autocomplete="off" class="form-control" name="warganegara"
                                        placeholder="Warga Negara" aria-describedby="sizing-addon2">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nomor Telepon/WA<font
                                        color="red"> *
                                    </font></label>
                                <div class="col-sm-6">
                                    <input type="text" autocomplete="off" class="form-control" placeholder="Nomor Telepon/WA"
                                        name="handphone" id="handphone" aria-describedby="sizing-addon2">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="text" autocomplete="off" class="form-control" placeholder="Email" name="email" id="email"
                                        aria-describedby="sizing-addon2">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pendidikan Terakhir</label>
                                <div class="col-sm-3">
                                    <select name="pendidikan_terakhir" autocomplete="off" class="form-control selek-pendidikan">
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
                                <label for="inputFoto" class="col-sm-2 control-label"></label>
                                <div class="col-sm-4">
                                    <div id="slider">
                                        <img class="img-thumbnail" id="output"
                                            src="<?php echo base_url();?>/assets/tambahan/gambar/tidak-ada.png"
                                            alt="your image" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputFoto" class="col-sm-2 control-label">Foto KTP / Kartu Identitas</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" name="gambar" id="gambar" />
                                    <p style='color: red; font-size: 14px;'> *Maksimal File Foto 2 MB</p>
                                </div>
                            </div>
                            <div class="box-footer">
                                <a class="klik ajaxify" href="<?php echo site_url('daftar'); ?>"><button
                                        class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i>
                                        Kembali</button></a>
                            </div>
                        </div>
                        <!---- ini buat data ayah -->

                        <div class="tab-pane" id="ayah">
                            <div class="box-header">
                                <h3 class="box-title">Data Ayah</h3>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Nama Ayah" name="nama_ayah"
                                        aria-describedby="sizing-addon2">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Alamat Ayah" name="alamat_ayah"
                                        aria-describedby="sizing-addon2">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">NIK Ayah </label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" placeholder="NIK Ayah" name="nik_ayah"
                                        aria-describedby="sizing-addon2">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Pekerjaan</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Pekerjaan Ayah"
                                        name="pekerjaan_ayah" aria-describedby="sizing-addon2">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pendidikan Terakhir</label>
                                <div class="col-sm-3">
                                    <select name="pendidikan_ayah" class="form-control selek-pendidikan2">
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
                                <label for="inputEmail3" class="col-sm-2 control-label">Tempat/Tgl Lahir</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Tempat Lahir"
                                        name="tempat_lahir_ayah" aria-describedby="sizing-addon2">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="tanggal2" name="tggal_lahir_ayah"
                                        placeholder="Tanggal Lahir" aria-describedby="sizing-addon2" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Penghasilan / Bulan</label>
                                <div class="col-sm-3">
                                    <select name="penghasilan_ayah" class="form-control selek-penghasilanayah">
                                        <option></option>
                                        <?php
										foreach ($gaji as $data) {
										?>
                                        <option value="<?php echo $data->penghasilan; ?>">
                                            <?php echo $data->penghasilan; ?>
                                        </option>
                                        <?php
										}
										?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nomor Telepon/WA</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Nomor Telepon/WA"
                                        name="telpon_ayah" aria-describedby="sizing-addon2">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="email_ayah" placeholder="Email"
                                        aria-describedby="sizing-addon2">
                                </div>
                            </div>
                            
                            <div class="box-footer">
                                <a class="klik ajaxify" href="<?php echo site_url('daftar'); ?>"><button
                                        class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i>
                                        Kembali</button></a>
                            </div>
                        </div>

                        <div class="tab-pane" id="ibu">
                            <div class="box-header ">
                                <h3 class="box-title">Data Ibu</h3>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Nama Ibu" name="nama_ibu"
                                        aria-describedby="sizing-addon2">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Alamat Ibu" name="alamat_ibu"
                                        aria-describedby="sizing-addon2">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">NIK Ibu</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" placeholder="NIK Ibu" name="nik_ibu"
                                        aria-describedby="sizing-addon2">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Pekerjaan</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Pekerjaan Ibu"
                                        name="pekerjaan_ibu" aria-describedby="sizing-addon2">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pendidikan Terakhir</label>
                                <div class="col-sm-3">
                                    <select name="pendidikan_ibu" class="form-control selek-pendidikan2">
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
                                <label for="inputEmail3" class="col-sm-2 control-label">Tempat/Tgl Lahir</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Tempat Lahir"
                                        name="tempat_lahir_ibu" aria-describedby="sizing-addon2">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="tanggal3" name="tggal_lahir_ibu"
                                        placeholder="Tanggal Lahir" aria-describedby="sizing-addon2" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Penghasilan / Bulan</label>
                                <div class="col-sm-3">
                                    <select name="penghasilan_ibu" class="form-control selek-penghasilan">
                                        <option></option>
                                        <?php
										foreach ($gaji as $data) {
										?>
                                        <option value="<?php echo $data->penghasilan; ?>">
                                            <?php echo $data->penghasilan; ?>
                                        </option>
                                        <?php
										}
										?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nomor Telepon/WA</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Nomor Telepon/WA"
                                        name="telpon_ibu" aria-describedby="sizing-addon2">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="email_ibu" placeholder="Email"
                                        aria-describedby="sizing-addon2">
                                </div>
                            </div>

                            <div class="box-footer">
                                <a class="klik ajaxify" href="<?php echo site_url('daftar'); ?>"><button
                                        class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i>
                                        Kembali</button></a>
                            </div>
                        </div>

                        <div class="tab-pane" id="kursus">
                            <div class="box-header">
                                <h3 class="box-title">Data Kursus</h3>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Pendaftaran<font color="red"> *
                                        </font></label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" placeholder="Tanggal Pendaftaran" autocomplete="off"
                                        name="tanggal_pendaftaran" id="tanggal_pendaftaran" aria-describedby="sizing-addon2">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Bidang Studi<font color="red"> *
                                    </font></label>
                                <div class="col-sm-3">
                                    <select name="bidang_studi" id="bidang_studi" class="form-control selek-studi" onChange="ket_lain()">
                                        <option></option>
                                        <?php
												foreach ($Studi as $datastudi) {
												?>
                                        <option value="<?php echo $datastudi->id_bidang_studi; ?>">
                                            <?php echo $datastudi->nama_bidang_studi; ?>
                                        </option>
                                        <?php
												}
												?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="keterangan" id="keterangan" class="form-control ket" placeholder="Lainnya" aria-describedby="sizing-addon2">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label">Level<font color="red"> *
                                    </font></label>
                                <div class="col-sm-5">
                                    <select name="level" id="level" class="form-control select-level">
                                        <option></option>
                                        <?php
													foreach ($level as $datalevel) {
												?>
                                        <option value="<?php echo $datalevel->id_level_kelas; ?>">
                                            <?php echo $datalevel->nama_level_kelas; ?>
                                        </option>
                                        <?php
												}
												?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jenis Kursus<font color="red"> *
                                    </font></label>
                                <div class="col-sm-5">
                                    <select name="kategori_kelas" id="kategori_kelas"
                                        class="form-control select-kategori-kelas">
                                        <option></option>
                                        <?php
													foreach ($kategori_kelas as $datakategori) {
												?>
                                        <option value="<?php echo $datakategori->id_kategori_kelas; ?>">
                                            <?php echo $datakategori->nama_kategori_kelas; ?>
                                        </option>
                                        <?php
												}
												?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Metode Belajar<font color="red"> *
                                    </font></label>
                                <div class="col-sm-5">
                                    <select name="metode_belajar" id="metode_belajar"
                                        class="form-control select-metode-belajar">
                                        <option></option>
                                        <option value="class private">Class Private</option>
                                        <option value="home private">Home Private</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Harga Kursus<font color="red"> *
                                    </font></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" placeholder="Harga Kursus"
                                        name="harga_kursus" id="harga_kursus" aria-describedby="sizing-addon2">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Tempat Daftar</label>
                                <div class="col-sm-5">
                                    <select name="tempat_daftar" id="tempat_daftar" class="form-control select-tempat-daftar">
                                        <option></option>
                                        <option value="tubanan"> Tubanan </option>
                                        <option value="nginden"> Nginden </option>
                                        <option value="sidoarjo"> Sidorajo </option>
                                    </select>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button name="simpan" type="submit" class="btn btn-success btn-flat"><i
                                        class="fa fa-save"></i> Simpan</button>
                                <a class="klik ajaxify" href="<?php echo site_url('daftar'); ?>"><button
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
    var jenis_tempat_tinggal = document.getElementById(jenis_tempat_tinggal);
    var jenis_tempat_tinggal = $("#jenis_tempat_tinggal").val();
    if (jenis_tempat_tinggal == 'Lainnya') {
        $('.lainnya').show();
    } else {
        $('.lainnya').hide();
    }
}

function ket_lain() {
    var bidang_studi = document.getElementById(bidang_studi);
    var bidang_studi = $("#bidang_studi").val();
    if(bidang_studi == '16'){
        $('.ket').show();
    }else{
        $('.ket').hide();
    }
}
$('#form-tambah').submit(function(e) {

    var error = 0;
    var message = "";

    var data = $(this).serialize();

    var nama_lengkap = $("#nama_lengkap").val();
    var nama_lengkap = nama_lengkap.trim();

    if (error == 0) {
        if (nama_lengkap.length == 0) {
            error++;
            message = "Data Siswa : Nama Lengkap Wajib Diisi";
        }
    }

    var jenis_kelamin = $("#jenis_kelamin").val();
    var jenis_kelamin = jenis_kelamin.trim();

    if (error == 0) {
        if (jenis_kelamin.length == 0) {
            error++;
            message = "Data Siswa : Jenis Kelamin Wajib Diisi";
        }
    }

    var alamat = $("#alamat").val();
    var alamat = alamat.trim();

    if (error == 0) {
        if (alamat.length == 0) {
            error++;
            message = "Data Siswa : Alamat Wajib Diisi";
        }
    }

    var handphone = $("#handphone").val();
    var handphone = handphone.trim();

    if (error == 0) {
        if (handphone.length == 0) {
            error++;
            message = "Data Siswa : Handphone Wajib Diisi";
        }
    }

    // var email = $("#email").val();
    // var email = email.trim();

    // if (error == 0) {
    //     if (email.length == 0) {
    //         error++;
    //         message = "Data Siswa : Email Wajib Diisi";
    //     }
    // }

    var bidang_studi = $("#bidang_studi").val();
    var bidang_studi = bidang_studi.trim();

    if (error == 0) {
        if (bidang_studi.length == 0) {
            error++;
            message = "Data Siswa : Bidang Studi Wajib Diisi";
        }
    }

    var level = $("#level").val();
    var level = level.trim();

    if (error == 0) {
        if (level.length == 0) {
            error++;
            message = "Data Siswa : Level Wajib Diisi";
        }
    }

    var kategori_kelas = $("#kategori_kelas").val();
    var kategori_kelas = kategori_kelas.trim();

    if (error == 0) {
        if (kategori_kelas.length == 0) {
            error++;
            message = "Data Siswa : Jenis Kursus Wajib Diisi";
        }
    }

    var harga_kursus = $("#harga_kursus").val();
    var harga_kursus = harga_kursus.trim();

    if (error == 0) {
        if (harga_kursus.length == 0) {
            error++;
            message = "Data Siswa : Jenis Kursus Wajib Diisi";
        }
    }
    
    var tanggal_pendaftaran = $("#tanggal_pendaftaran").val();
    var tanggal_pendaftaran = tanggal_pendaftaran.trim();
            
    if (error == 0) {
        if (tanggal_pendaftaran.length == 0) {
            error++;
            message = "Tanggal Pendaftaran Wajib Diisi";
        }
    }

    if (error == 0) {
        $.ajax({
                beforeSend: function() {
                    $(".loading2").show();
                    $(".loading2").modal('show');
                },
                url: '<?php echo base_url();?>Master/Daftar/prosesTambah',
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
    $(".select-jenis-tinggal").select2({
        placeholder: " -- Jenis Tinggal -- "
    });
});

$(function() {
    $(".select-level").select2({
        placeholder: " -- Level -- "
    });
});

$(function() {
    $(".select-kategori-kelas").select2({
        placeholder: " -- Jenis Kursus -- "
    });
});

$(function() {
    $(".select-metode-belajar").select2({
        placeholder: " -- Metode Belajar -- "
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
    $(".selek-pendidikan2").select2({
        placeholder: " -- Pendidikan -- "
    });
});

// untuk select2 ajak pilih menu
$(function() {
    $(".selek-penghasilanayah").select2({
        placeholder: " -- Penghasilan -- "
    });
});

// untuk select2 ajak pilih menu
$(function() {
    $(".selek-penghasilan").select2({
        placeholder: " -- Penghasilan -- "
    });
});


// untuk select2 ajak pilih menu
$(function() {
    $(".selek-studi").select2({
        placeholder: " -- Bidang studi -- "
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

$(function() {
    $(".select-tempat-daftar").select2({
        placeholder: " -- Tempat Daftar -- "
    });
});

// untuk datetime from
        $(function() {
            $("#tanggal_pendaftaran").datepicker({
                orientation: "left",
                autoclose: !0,
                format: 'yyyy-mm-dd'
            })
        });

//INPUT FORMAT RUPIAH
var rupiah = document.getElementById("harga_kursus");
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