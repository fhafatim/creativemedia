	<?php $this->load->view('_heading/_headerContent') ?>

	<style>
.field-icon {
    float: left;
    margin-left: 93%;
    margin-top: -25px;
    position: relative;
    z-index: 2;
}

#osas {
    color: red;
    font-weight: bold;
    margin-left: 0px;
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
	    <form id="form-update" class="form-horizontal" method="POST">
	        <input type="hidden" name="id_karyawan" value="<?php echo $datakaryawan->id_karyawan; ?>">
	        <div class="row">
	            <div class="col-md-12">
	                <div class="nav-tabs-custom">
	                    <ul class="nav nav-tabs">
	                        <li class="active"><a href="#karyawan" data-toggle="tab">Data Karyawan</a></li>
	                        <li><a href="#keluarga" data-toggle="tab">Data Keluarga</a></li>
	                    </ul>

	                    <div class="tab-content">
	                        <div class="active tab-pane" id="karyawan">
	                            <div class="box-header">
	                                <h3 class="box-title">Data Karyawan</h3>
	                            </div>

	                            <div class="form-group">
	                                <label for="inputEmail3" class="col-sm-2 control-label">Nama karyawan</label>
	                                <div class="col-sm-7">
	                                    <input type="text" class="form-control" placeholder="nama karyawan"
	                                        name="nama_karyawan" aria-describedby="sizing-addon2" autocomplete="off"
	                                        value="<?php echo $datakaryawan->nama_karyawan; ?>">
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label for="inputEmail3" class="col-sm-2 control-label">NIK</label>
	                                <div class="col-sm-7">
	                                    <input type="text" class="form-control" placeholder="NIK" name="nik"
	                                        aria-describedby="sizing-addon2" autocomplete="off"
	                                        value="<?php echo $datakaryawan->nik; ?>">
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 control-label">Jenis Kelamin</label>
	                                <div class="col-sm-7">
	                                    <select name="jenis_kelamin" class="form-control" aria-describedby="sizing-addon2"
	                                        autocomplete="off">
	                                        <option value="laki-laki"
	                                            <?= $datakaryawan->jenis_kelamin == 'laki-laki' ? 'selected' : '' ?>>
	                                            Laki-laki</option>
	                                        <option value="perempuan"
	                                            <?= $datakaryawan->jenis_kelamin == 'perempuan' ? 'selected' : '' ?>>
	                                            Perempuan</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 control-label">Tempat/Tgl Lahir</label>
	                                <div class="col-sm-3">
	                                    <input type="text" class="form-control" placeholder="Tempat Lahir"
	                                        name="tempat_lahir" aria-describedby="sizing-addon2" autocomplete="off"
	                                        value="<?php echo $datakaryawan->tempat_lahir; ?>">
	                                </div>
	                                <div class="col-sm-3">
	                                    <input type="text" class="form-control" id="tanggal" name="tanggal_lahir"
	                                        placeholder="Tanggal Lahir" aria-describedby="sizing-addon2" autocomplete="off"
	                                        value="<?php echo $datakaryawan->tanggal_lahir; ?>">
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
	                                <div class="col-sm-7">
	                                    <input type="text" class="form-control" placeholder="Alamat" name="alamat"
	                                        id="alamat" aria-describedby="sizing-addon2" autocomplete="off"
	                                        value="<?php echo $datakaryawan->alamat; ?>">
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label for="inputEmail3" class="col-sm-2 control-label"></label>
	                                <div class="col-sm-3">
	                                    <input type="text" class="form-control" placeholder="Kota" name="kota" id="kota"
	                                        aria-describedby="sizing-addon2" autocomplete="off"
	                                        value="<?php echo $datakaryawan->kota; ?>">
	                                </div>
	                                <div class="col-sm-3">
	                                    <input type="text" class="form-control" name="provinsi" placeholder="Provinsi"
	                                        aria-describedby="sizing-addon2" autocomplete="off"
	                                        value="<?php echo $datakaryawan->provinsi; ?>">
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label for="inputEmail3" class="col-sm-2 control-label">Nomor Telepon</label>
	                                <div class="col-sm-7">
	                                    <input type="text" class="form-control" placeholder="Nomor Telepon" name="telepon"
	                                        aria-describedby="sizing-addon2" autocomplete="off"
	                                        value="<?php echo $datakaryawan->telepon; ?>">
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label for="inputEmail3" class="col-sm-2 control-label">Nomor Telepon
	                                    Alternatif</label>
	                                <div class="col-sm-7">
	                                    <input type="text" class="form-control" placeholder="Nomor Telepon Alternatif"
	                                        name="telepon_alternatif" aria-describedby="sizing-addon2" autocomplete="off"
	                                        value="<?php echo $datakaryawan->telepon_alternatif; ?>">
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label for="inputEmail3" class="col-sm-2 control-label">Pendidikan</label>
	                                <div class="col-sm-7">
	                                    <select name="pendidikan" class="form-control">
	                                        <option value="SD"
	                                            <?= $datakaryawan->jenis_kelamin == 'SD' ? 'selected' : '' ?>>SD
	                                        </option>
	                                        <option value="SMP"
	                                            <?= $datakaryawan->jenis_kelamin == 'SMP' ? 'selected' : '' ?>>
	                                            SMP
	                                        </option>
	                                        <option value="SMA/SMK"
	                                            <?= $datakaryawan->jenis_kelamin == 'SMA/SMK' ? 'selected' : '' ?>>SMA/SMK
	                                        </option>
	                                        <option value="D3"
	                                            <?= $datakaryawan->jenis_kelamin == 'D3' ? 'selected' : '' ?>>D3
	                                        </option>
	                                        <option value="D4"
	                                            <?= $datakaryawan->jenis_kelamin == 'D4' ? 'selected' : '' ?>>D4
	                                        </option>
	                                        <option value="S1"
	                                            <?= $datakaryawan->jenis_kelamin == 'S1' ? 'selected' : '' ?>>S1
	                                        </option>
	                                        <option value="S2"
	                                            <?= $datakaryawan->jenis_kelamin == 'S2' ? 'selected' : '' ?>>S2
	                                        </option>
	                                        <option value="S3"
	                                            <?= $datakaryawan->jenis_kelamin == 'S3' ? 'selected' : '' ?>>S3
	                                        </option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label for="inputEmail3" class="col-sm-2 control-label">Lembaga Pendidikan</label>
	                                <div class="col-sm-7">
	                                    <input type="text" class="form-control" placeholder="Lembaga Pendidikan"
	                                        name="lembaga_pendidikan" aria-describedby="sizing-addon2" autocomplete="off"
	                                        value="<?php echo $datakaryawan->lembaga_pendidikan; ?>">
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label for="inputEmail3" class="col-sm-2 control-label">Tahun Lulus</label>
	                                <div class="col-sm-7">
	                                    <input type="text" class="form-control" placeholder="Tahun Lulus"
	                                        name="tahun_lulus" aria-describedby="sizing-addon2" autocomplete="off"
	                                        value="<?php echo $datakaryawan->tahun_lulus; ?>">
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 control-label">Jabatan Karyawan</label>
	                                <div class="col-sm-7">
	                                    <select name="jabatan" class="form-control" aria-describedby="sizing-addon2"
	                                        autocomplete="off">
	                                        <option value="direktur"
	                                            <?= $datakaryawan->jabatan == 'direktur' ? 'selected' : '' ?>>Director
	                                        </option>
	                                        <option value="manager"
	                                            <?= $datakaryawan->jabatan == 'manager' ? 'selected' : '' ?>>Manager HR &
	                                            GA
	                                        </option>
	                                        <option value="cso" <?= $datakaryawan->jabatan == 'cso' ? 'selected' : '' ?>>
	                                            Customer Service Officer
	                                        </option>
	                                        <option value="hrd" <?= $datakaryawan->jabatan == 'hrd' ? 'selected' : '' ?>>
	                                            HRD & Admin
	                                        </option>
	                                        <option value="admin"
	                                            <?= $datakaryawan->jabatan == 'admin' ? 'selected' : '' ?>>Admin & Finance
	                                        </option>
	                                        <option value="programmer"
	                                            <?= $datakaryawan->jabatan == 'programmer' ? 'selected' : '' ?>>Programmer
	                                        </option>
	                                        <option value="desaingrafis"
	                                            <?= $datakaryawan->jabatan == 'desaingrafis' ? 'selected' : '' ?>>
	                                            Graphics Designer
	                                        </option>
	                                        <option value="trainer"
	                                            <?= $datakaryawan->jabatan == 'trainer' ? 'selected' : '' ?>>
	                                            Trainer
	                                        </option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 control-label">Tgl Masuk</label>
	                                <div class="col-sm-3">
	                                    <input type="text" class="form-control" id="tanggalmasuk" name="tanggal_masuk"
	                                        placeholder="tanggal masuk" aria-describedby="sizing-addon2" autocomplete="off"
	                                        value="<?php echo $datakaryawan->tanggal_masuk; ?>">
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label for="inputFoto" class="col-sm-1 control-label"></label>
	                                <div id="slider">
	                                    <img class="img-thumbnail" id="output"
	                                        src="../<?php echo $datakaryawan->gambar; ?>" alt="your image" />
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
	                                <label class="col-sm-2 control-label">Status Karyawan</label>
	                                <div class="col-sm-3">
	                                    <select name="status_karyawan" class="form-control">
	                                        <option value="aktif"
	                                            <?= $datakaryawan->status_karyawan == 'aktif' ? 'selected' : '' ?>>Aktif
	                                        </option>
	                                        <option value="tidak aktif"
	                                            <?= $datakaryawan->status_karyawan == 'tidak aktif' ? 'selected' : '' ?>>
	                                            Tidak
	                                            Aktif
	                                        </option>
	                                    </select>
	                                </div>
	                            </div>


	                            <div class="box-footer">
	                                <button name="simpan" type="submit" class="btn btn-success btn-flat"><i
	                                        class="fa fa-save"></i> Update</button>
	                                <a class="klik ajaxify" href="<?php echo site_url('karyawan'); ?>"><button
	                                        class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i>
	                                        Kembali</button></a>
	                            </div>
	                        </div>

	                        <!---- ini buat data keluarga -->

	                        <div class="tab-pane" id="keluarga">
	                            <div class="box-header">
	                                <h3 class="box-title">Data Keluarga</h3>
	                            </div>

	                            <div class="form-group">
	                                <label for="inputEmail3" class="col-sm-2 control-label">Nama Lengkap</label>
	                                <div class="col-sm-4">
	                                    <input type="text" class="form-control" placeholder="Nama Lengkap"
	                                        name="nama_keluarga" aria-describedby="sizing-addon2" autocomplete="off"
	                                        value="<?php echo $datakaryawan->nama_keluarga; ?>">
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label for="inputEmail3" class="col-sm-2 control-label">Nomor Telepon/WA</label>
	                                <div class="col-sm-3">
	                                    <input type="text" class="form-control" placeholder="Nomor Telepon/WA"
	                                        name="telepon_keluarga" aria-describedby="sizing-addon2" autocomplete="off"
	                                        value="<?php echo $datakaryawan->telepon_keluarga; ?>">
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
	                                <div class="col-sm-4">
	                                    <input type="text" class="form-control" placeholder="Alamat Lengkap"
	                                        name="alamat_keluarga" aria-describedby="sizing-addon2" autocomplete="off"
	                                        value="<?php echo $datakaryawan->alamat_keluarga; ?>">
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 control-label">Hubungan Keluarga</label>
	                                <div class="col-sm-3">
	                                    <select name="jenis_hubungan_keluarga" id="jenis_hubungan_keluarga"
	                                        class="form-control selek-hubungan" onChange="tambah_lainnya()">
	                                        <option value="pasangan"
	                                            <?= $datakaryawan->hubungan_keluarga == 'pasangan' ? 'selected' : '' ?>>
	                                            Suami/Istri
	                                        </option>
	                                        <option value="orangtua"
	                                            <?= $datakaryawan->hubungan_keluarga == 'orangtua' ? 'selected' : '' ?>>
	                                            Orang
	                                            Tua
	                                        </option>
	                                        <option value="saudarakandung"
	                                            <?= $datakaryawan->hubungan_keluarga == 'saudarakandung' ? 'selected' : '' ?>>
	                                            Saudara Kandung
	                                        </option>
	                                        <option value="kerabat"
	                                            <?= $datakaryawan->hubungan_keluarga == 'kerabat' ? 'selected' : '' ?>>
	                                            Kerabat
	                                        </option>
	                                        <option value="Lainnya" <?php if ($datakaryawan->hubungan_keluarga == "pasangan"){ 
                                            echo '' ;
                                            }else if ($datakaryawan->hubungan_keluarga == "orangtua"){
                                            echo '' ;
                                            }else if ($datakaryawan->hubungan_keluarga == "saudarakandung"){
                                            echo '' ;
                                            }else if ($datakaryawan->hubungan_keluarga == "kerabat"){
                                            echo '' ;
											}else{
                                                echo 'selected';
                                            }?>>
	                                            Lainnya
	                                        </option>
	                                    </select>
	                                </div>
	                                <div class="col-sm-3">
	                                    <input type="text" class="form-control lainnya" placeholder="Lainnya" <?php
                                        foreach ($lainnya as $hubungankeluarga) {
												?> value="<?php echo $hubungankeluarga->hubungan_keluarga; ?>" <?php
													}
												?> name="hubungan_keluarga" id="hubungan_keluarga" aria-describedby="sizing-addon2" autocomplete="off">
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label for="inputEmail3" class="col-sm-2 control-label">Pendidikan Terakhir</label>
	                                <div class="col-sm-4 ">
	                                    <select name="pendidikan_keluarga" class="form-control selek-pendidikan2">
	                                        <option></option>
	                                        <option value="SD"
	                                            <?= $datakaryawan->pendidikan_keluarga == 'SD' ? 'selected' : '' ?>>SD
	                                        </option>
	                                        <option value="SMP"
	                                            <?= $datakaryawan->pendidikan_keluarga == 'SMP' ? 'selected' : '' ?>>SMP
	                                        </option>
	                                        <option value="SMA/SMK"
	                                            <?= $datakaryawan->pendidikan_keluarga == 'SMA/SMK' ? 'selected' : '' ?>>
	                                            SMA/SMK
	                                        </option>
	                                        <option value="D3"
	                                            <?= $datakaryawan->pendidikan_keluarga == 'D3' ? 'selected' : '' ?>>D3
	                                        </option>
	                                        <option value="D4"
	                                            <?= $datakaryawan->pendidikan_keluarga == 'D4' ? 'selected' : '' ?>>D4
	                                        </option>
	                                        <option value="S1"
	                                            <?= $datakaryawan->pendidikan_keluarga == 'S1' ? 'selected' : '' ?>>S1
	                                        </option>
	                                        <option value="S2"
	                                            <?= $datakaryawan->pendidikan_keluarga == 'S2' ? 'selected' : '' ?>>S2
	                                        </option>
	                                        <option value="S3"
	                                            <?= $datakaryawan->pendidikan_keluarga == 'S3' ? 'selected' : '' ?>>S3
	                                        </option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="box-footer">
	                                <button name="simpan" type="submit" class="btn btn-success btn-flat"><i
	                                        class="fa fa-save"></i> Update</button>
	                                <a class="klik ajaxify" href="<?php echo site_url('karyawan'); ?>"><button
	                                        class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i>
	                                        Kembali</button></a>
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
var jenis_hubungan_keluarga = document.getElementById(jenis_hubungan_keluarga);
var jenis_hubungan_keluarga = $("#jenis_hubungan_keluarga").val();
if (jenis_hubungan_keluarga == 'pasangan') {
    $('.lainnya').hide();
} else if (jenis_hubungan_keluarga == 'orangtua') {
    $('.lainnya').hide();
} else if (jenis_hubungan_keluarga == 'saudarakandung') {
    $('.lainnya').hide();
} else if (jenis_hubungan_keluarga == 'kerabat') {
    $('.lainnya').hide();
} else if (
    jenis_hubungan_keluarga == 'Lainnya') {
    $('.lainnya').show();
}


// untuk select2 ajak pilih menu
$(function() {
    $(".selek-pendidikan2").select2({
        placeholder: " -- Pendidikan -- "
    });
});

// untuk select2 ajak pilih menu
$(function() {
    $(".selek-hubungan").select2({
        placeholder: " -- Hubungan Keluarga -- "
    });
});


function tambah_lainnya() {
    var jenis_hubungan_keluarga = document.getElementById(jenis_hubungan_keluarga);
    var jenis_hubungan_keluarga = $("#jenis_hubungan_keluarga").val();
    var hubungan_keluarga = document.getElementById(hubungan_keluarga);
    var hubungan_keluarga = $("#hubungan_keluarga").val();
    if (jenis_hubungan_keluarga == 'pasangan') {
        $("#hubungan_keluarga").val('');
        $('.lainnya').hide();
    } else if (jenis_hubungan_keluarga == 'orangtua') {
        $("#hubungan_keluarga").val('');
        $('.lainnya').hide();
    } else if (jenis_hubungan_keluarga == 'saudarakandung') {
        $("#hubungan_keluarga").val('');
        $('.lainnya').hide();
    } else if (jenis_hubungan_keluarga == 'kerabat') {
        $("#hubungan_keluarga").val('');
        $('.lainnya').hide();
    } else if (
        jenis_hubungan_keluarga == 'Lainnya') {
        $('.lainnya').show();
    }
}

$('#form-update').submit(function(e) {

    var data = $(this).serialize();

    $.ajax({
            beforeSend: function() {
                $(".loading2").show();
                $(".loading2").modal('show');
            },
            url: '<?php echo base_url();?>Master/Karyawan/prosesUpdate',
            type: "post",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
        })
        .done(function(data) {
            var result = jQuery.parseJSON(data);
            if (result.status == 'berhasil') {
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
	</script>