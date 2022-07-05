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
</style>

<section class="content">
    <!-- style loading -->
    <div class="loading2"></div>
    <!-- -->


    <form class="form-horizontal" id="form-update" method="POST">
        <input type="hidden" name="id_pendaftaran" value="<?php echo $datamaster->id_pendaftaran; ?>">
        <input type="hidden" name="id_siswa" value="<?php echo $datamaster->id_siswa; ?>">
        <input type="hidden" name="id_login" value="<?php echo $datamaster->id_login; ?>">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#siswa" data-toggle="tab">Data Siswa</a></li>
                        <li><a href="#ayah" data-toggle="tab">Data Ayah</a></li>
                        <li><a href="#ibu" data-toggle="tab">Data Ibu</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="active tab-pane" id="siswa">
                            <div class="box-header">
                                <h3 class="box-title">Data Siswa</h3>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nama Lengkap</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Nama Lengkap"
                                        name="nama_siswa" aria-describedby="sizing-addon2"
                                        value="<?php echo $datamaster->nama_siswa; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">NIK</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" placeholder="NIK" name="nik" id="nik"
                                        aria-describedby="sizing-addon2" value="<?php echo $datamaster->nik; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Tempat/Tgl Lahir</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Tempat Lahir"
                                        name="tempat_lahir" aria-describedby="sizing-addon2"
                                        value="<?php echo $datamaster->tempat_lahir; ?>">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="tanggal" name="tanggal_lahir"
                                        placeholder="Tanggal Lahir" aria-describedby="sizing-addon2"
                                        value="<?php echo date('d-m-Y', strtotime($datamaster->tanggal_lahir)); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Agama</label>
                                <div class="col-sm-3">
                                    <select name="agama" id="agama" class="form-control selek-agama">
                                        <option value="Islam" <?= $datamaster->agama == 'Islam' ? 'selected' : '' ?>>
                                            Islam
                                        </option>
                                        <option value="Kristen"
                                            <?= $datamaster->agama == 'Kristen' ? 'selected' : '' ?>>
                                            Kristen</option>
                                        <option value="Katolik"
                                            <?= $datamaster->agama == 'Katolik' ? 'selected' : '' ?>>
                                            Katolik</option>
                                        <option value="Hindu" <?= $datamaster->agama == 'Hindu' ? 'selected' : '' ?>>
                                            Hindu
                                        </option>
                                        <option value="Budha" <?= $datamaster->agama == 'Budha' ? 'selected' : '' ?>>
                                            Budha
                                        </option>
                                        <option value="Kepercayaan"
                                            <?= $datamaster->agama == 'Kepercayaan' ? 'selected' : '' ?>>Kepercayaan
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jenis Kelamin</label>
                                <div class="col-sm-3">
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control select2-cat">
                                        <option></option>
                                        <option value="Laki-laki"
                                            <?= $datamaster->jenis_kelamin == 'laki-laki' ? 'selected' : '' ?>>Laki-laki
                                        </option>
                                        <option value="Perempuan"
                                            <?= $datamaster->jenis_kelamin == 'perempuan' ? 'selected' : '' ?>>Perempuan
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jenis Tinggal</label>
                                <div class="col-sm-3">
                                    <select name="jenis_tempat_tinggal" id="jenis_tempat_tinggal"
                                        class="form-control select-jenis-tinggal" onChange="tambah_lainnya()">
                                        <option></option>
                                        <option value="Bersama Orang Tua"
                                            <?= $datamaster->jenis_tinggal == 'Bersama Orang Tua' ? 'selected' : '' ?>>
                                            Bersama
                                            Orang Tua
                                        </option>
                                        <option value="Kos"
                                            <?= $datamaster->jenis_tinggal == 'Kos' ? 'selected' : '' ?>>Kos
                                        </option>
                                        <option value="Lainnya" <?php if ($datamaster->jenis_tinggal == "Bersama Orang Tua"){ 
                                            echo '' ;
                                            }else if ($datamaster->jenis_tinggal == "Kos"){
                                            echo '' ;}else{
                                                echo 'selected';
                                            }?>>
                                            Lainnya
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control lainnya" placeholder="Lainnya" <?php
                                        foreach ($lainnya as $jenistinggal) {
												?> value="<?php echo $jenistinggal->jenis_tinggal; ?>" <?php
													}
												?> name="jenis_tinggal" id="jenis_tinggal" aria-describedby="sizing-addon2">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Alamat" name="alamat"
                                        id="alamat" aria-describedby="sizing-addon2"
                                        value="<?php echo $datamaster->alamat; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label"></label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Kota" name="kota" id="kota"
                                        aria-describedby="sizing-addon2" value="<?php echo $datamaster->kota; ?>">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Provinsi" name="provinsi"
                                        aria-describedby="sizing-addon2" value="<?php echo $datamaster->provinsi; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label"></label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Kode pos" name="kode_pos"
                                        aria-describedby="sizing-addon2" value="<?php echo $datamaster->kode_pos; ?>">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="warga_negara"
                                        placeholder="Warga Negara" aria-describedby="sizing-addon2"
                                        value="<?php echo $datamaster->warga_negara; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nomor Telepon/WA</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Nomor Telepon/WA"
                                        name="telepon" id="handphone" aria-describedby="sizing-addon2"
                                        value="<?php echo $datamaster->telepon; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Email" name="email" id="email"
                                        aria-describedby="sizing-addon2" value="<?php echo $datamaster->email; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pendidikan Terakhir</label>
                                <div class="col-sm-3">
                                    <select name="pendidikan_terakhir" class="form-control selek-pendidikan">
                                        <option></option>
                                        <option value="SD"
                                            <?= $datamaster->pendidikan_terakhir == 'SD' ? 'selected' : '' ?>>SD
                                        </option>
                                        <option value="SMP"
                                            <?= $datamaster->pendidikan_terakhir == 'SMP' ? 'selected' : '' ?>>SMP
                                        </option>
                                        <option value="SMA/SMK"
                                            <?= $datamaster->pendidikan_terakhir == 'SMA/SMK' ? 'selected' : '' ?>>
                                            SMA/SMK
                                        </option>
                                        <option value="D3"
                                            <?= $datamaster->pendidikan_terakhir == 'D3' ? 'selected' : '' ?>>D3
                                        </option>
                                        <option value="D4"
                                            <?= $datamaster->pendidikan_terakhir == 'D4' ? 'selected' : '' ?>>D4
                                        </option>
                                        <option value="S1"
                                            <?= $datamaster->pendidikan_terakhir == 'S1' ? 'selected' : '' ?>>S1
                                        </option>
                                        <option value="S2"
                                            <?= $datamaster->pendidikan_terakhir == 'S2' ? 'selected' : '' ?>>S2
                                        </option>
                                        <option value="S3"
                                            <?= $datamaster->pendidikan_terakhir == 'S3' ? 'selected' : '' ?>>S3
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputFoto" class="col-sm-2 control-label"></label>
                                <div class="col-sm-4">
                                    <div id="slider">
                                        <img id="output" class="img-thumbnail"
                                            src='../<?php echo $datamaster->gambar; ?>' alt="your image" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputFoto" class="col-sm-2 control-label">Foto/Profile</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" name="gambar" id="gambar" />
                                    <p style='color: red; font-size: 14px;'> *Maksimal File Foto 2 MB</p>
                                </div>
                            </div>

                            <div class="box-footer">
                                <a class="klik ajaxify" href="<?php echo site_url('siswa'); ?>"><button
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
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="Nama Ayah Siswa"
                                        name="nama_ayah" aria-describedby="sizing-addon2"
                                        value="<?php echo $datamaster->nama_ayah; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="Alamat Ayah" name="alamat_ayah"
                                        aria-describedby="sizing-addon2"
                                        value="<?php echo $datamaster->alamat_ayah; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">NIK Ayah</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" placeholder="NIK Ayah" name="nik_ayah"
                                        aria-describedby="sizing-addon2" value="<?php echo $datamaster->nik_ayah; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Pekerjaan</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="Pekerjaan Ayah"
                                        name="pekerjaan_ayah" aria-describedby="sizing-addon2"
                                        value="<?php echo $datamaster->pekerjaan_ayah; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Pendidikan Terakhir</label>
                                <div class="col-sm-4">
                                    <select name="pendidikan_ayah" class="form-control">
                                        <option></option>
                                        <option value="SD"
                                            <?= $datamaster->pendidikan_ayah == 'SD' ? 'selected' : '' ?>>SD
                                        </option>
                                        <option value="SMP"
                                            <?= $datamaster->pendidikan_ayah == 'SMP' ? 'selected' : '' ?>>SMP
                                        </option>
                                        <option value="SMA/SMK"
                                            <?= $datamaster->pendidikan_ayah == 'SMA/SMK' ? 'selected' : '' ?>>
                                            SMA/SMK
                                        </option>
                                        <option value="D3"
                                            <?= $datamaster->pendidikan_ayah == 'D3' ? 'selected' : '' ?>>D3
                                        </option>
                                        <option value="D4"
                                            <?= $datamaster->pendidikan_ayah == 'D4' ? 'selected' : '' ?>>D4
                                        </option>
                                        <option value="S1"
                                            <?= $datamaster->pendidikan_ayah == 'S1' ? 'selected' : '' ?>>S1
                                        </option>
                                        <option value="S2"
                                            <?= $datamaster->pendidikan_ayah == 'S2' ? 'selected' : '' ?>>S2
                                        </option>
                                        <option value="S3"
                                            <?= $datamaster->pendidikan_ayah == 'S3' ? 'selected' : '' ?>>S3
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Tempat/Tgl Lahir</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" placeholder="Tempat Lahir Ayah"
                                        name="tempat_lahir_ayah" aria-describedby="sizing-addon2"
                                        value="<?php echo $datamaster->tempat_lahir_ayah; ?>">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" id="tgl_ayah" class="form-control"
                                        placeholder="Tanggal Lahir Ayah" name="tanggal_lahir_ayah"
                                        aria-describedby="sizing-addon2"
                                        value="<?php echo date('d-m-Y', strtotime($datamaster->tanggal_lahir_ayah)); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Penghasilan</label>
                                <div class="col-sm-3">
                                    <select name="penghasilan_ayah" class="form-control">
                                        <option value=">2 Juta"
                                            <?= $datamaster->penghasilan_ayah == '>2 Juta' ? 'selected' : '' ?>>
                                            >2 Juta
                                        </option>
                                        <option value="2 Juta - 5 Juta"
                                            <?= $datamaster->penghasilan_ayah == '2 Juta - 5 Juta' ? 'selected' : '' ?>>
                                            2
                                            Juta - 5 Juta
                                        </option>
                                        <option value="6 Juta - 10 Juta"
                                            <?= $datamaster->penghasilan_ayah == '6 Juta - 10 Juta' ? 'selected' : '' ?>>
                                            6 Juta - 10 Juta
                                        </option>
                                        <option value="<10 Juta"
                                            <?= $datamaster->penghasilan_ayah == '<10 Juta' ? 'selected' : '' ?>>
                                            <10 Juta </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Telpon/Email</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Telepon Ayah"
                                        name="telepon_ayah" aria-describedby="sizing-addon2"
                                        value="<?php echo $datamaster->telepon_ayah; ?>">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Email Ayah" name="email_ayah"
                                        aria-describedby="sizing-addon2" value="<?php echo $datamaster->email_ayah; ?>">
                                </div>
                            </div>

                            <div class="box-footer">
                                <a class="klik ajaxify" href="<?php echo site_url('siswa'); ?>"><button
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
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="Nama Ibu Siswa" name="nama_ibu"
                                        aria-describedby="sizing-addon2" value="<?php echo $datamaster->nama_ibu; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="Alamat Ibu" name="alamat_ibu"
                                        aria-describedby="sizing-addon2" value="<?php echo $datamaster->alamat_ibu; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">NIK Ibu</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" placeholder="NIK Ibu" name="nik_ibu"
                                        aria-describedby="sizing-addon2" value="<?php echo $datamaster->nik_ibu; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Pekerjaan</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="Pekerjaan Ibu"
                                        name="pekerjaan_ibu" aria-describedby="sizing-addon2"
                                        value="<?php echo $datamaster->pekerjaan_ibu; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Pendidikan Terakhir</label>
                                <div class="col-sm-4">
                                    <select name="pendidikan_ibu" class="form-control">
                                        <option></option>
                                        <option value="SD" <?= $datamaster->pendidikan_ibu == 'SD' ? 'selected' : '' ?>>
                                            SD
                                        </option>
                                        <option value="SMP"
                                            <?= $datamaster->pendidikan_ibu == 'SMP' ? 'selected' : '' ?>>SMP
                                        </option>
                                        <option value="SMA/SMK"
                                            <?= $datamaster->pendidikan_ibu == 'SMA/SMK' ? 'selected' : '' ?>>
                                            SMA/SMK
                                        </option>
                                        <option value="D3" <?= $datamaster->pendidikan_ibu == 'D3' ? 'selected' : '' ?>>
                                            D3
                                        </option>
                                        <option value="D4" <?= $datamaster->pendidikan_ibu == 'D4' ? 'selected' : '' ?>>
                                            D4
                                        </option>
                                        <option value="S1" <?= $datamaster->pendidikan_ibu == 'S1' ? 'selected' : '' ?>>
                                            S1
                                        </option>
                                        <option value="S2" <?= $datamaster->pendidikan_ibu == 'S2' ? 'selected' : '' ?>>
                                            S2
                                        </option>
                                        <option value="S3" <?= $datamaster->pendidikan_ibu == 'S3' ? 'selected' : '' ?>>
                                            S3
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Tempat/Tgl Lahir</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" placeholder="Tempat Lahir Ibu"
                                        name="tempat_lahir_ibu" aria-describedby="sizing-addon2"
                                        value="<?php echo $datamaster->tempat_lahir_ibu; ?>">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" id="tgl_ibu" class="form-control" placeholder="Tanggal Lahir Ibu"
                                        name="tanggal_lahir_ibu" aria-describedby="sizing-addon2"
                                        value="<?php echo date('d-m-Y', strtotime($datamaster->tanggal_lahir_ibu)); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Penghasilan</label>
                                <div class="col-sm-3">
                                    <select name="penghasilan_ibu" class="form-control">
                                        <option value=">2 Juta"
                                            <?= $datamaster->penghasilan_ibu == '>2 Juta' ? 'selected' : '' ?>>
                                            >2 Juta
                                        </option>
                                        <option value="2 Juta - 5 Juta"
                                            <?= $datamaster->penghasilan_ibu == '2 Juta - 5 Juta' ? 'selected' : '' ?>>2
                                            Juta - 5 Juta
                                        </option>
                                        <option value="6 Juta - 10 Juta"
                                            <?= $datamaster->penghasilan_ibu == '6 Juta - 10 Juta' ? 'selected' : '' ?>>
                                            6 Juta - 10 Juta
                                        </option>
                                        <option value="<10 Juta"
                                            <?= $datamaster->penghasilan_ibu == '<10 Juta' ? 'selected' : '' ?>>
                                            <10 Juta </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Telpon/Email</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Telepon Ibu" name="telepon_ibu"
                                        aria-describedby="sizing-addon2"
                                        value="<?php echo $datamaster->telepon_ibu; ?>">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Email Ibu" name="email_ibu"
                                        aria-describedby="sizing-addon2" value="<?php echo $datamaster->email_ibu; ?>">
                                </div>
                            </div>

                            <div class="box-footer">
                                <a class="klik ajaxify" href="<?php echo site_url('siswa'); ?>"><button
                                        class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i>
                                        Kembali</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
    </div>

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

<script>
var jenis_tempat_tinggal = document.getElementById(jenis_tempat_tinggal);
var jenis_tempat_tinggal = $("#jenis_tempat_tinggal").val();
if (jenis_tempat_tinggal == 'Kos') {
    $('.lainnya').hide();
} else if (jenis_tempat_tinggal == 'Bersama Orang Tua') {
    $('.lainnya').hide();
} else if (
    jenis_tempat_tinggal == 'Lainnya') {
    $('.lainnya').show();
}

function tambah_lainnya() {
    var jenis_tempat_tinggal = document.getElementById(jenis_tempat_tinggal);
    var jenis_tempat_tinggal = $("#jenis_tempat_tinggal").val();
    var jenis_tinggal = document.getElementById(jenis_tinggal);
    var jenis_tinggal = $("#jenis_tinggal").val();
    if (jenis_tempat_tinggal == 'Kos') {
        $("#jenis_tinggal").val('');
        $('.lainnya').hide();
    } else if (jenis_tempat_tinggal == 'Bersama Orang Tua') {
        $("#jenis_tinggal").val('');
        $('.lainnya').hide();
    } else if (
        jenis_tempat_tinggal == 'Lainnya') {
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
            url: '<?php echo base_url();?>Siswa/Siswa_aktif/prosesUpdate',
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
            } else {
                $(".loading2").hide();
                $(".loading2").modal('hide');
                gagal();

            }
        })
    e.preventDefault();
});

// untuk select2 ajak pilih menu
$(function() {
    $(".select2-cat").select2({
        placeholder: " -- Jenis Kelamin -- "
    });
});

$(function() {
    $(".select-jenis-tinggal").select2({
        placeholder: " -- Jenis Tinggal -- "
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
    $(".selek-studi").select2({
        placeholder: " -- Bidang studi -- "
    });
});
// untuk datetime to
$(function() {
    $("#tgl_ayah").datepicker({
        orientation: "left",
        autoclose: !0,
        format: 'dd-mm-yyyy'
    })
});

// untuk datetime from
$(function() {
    $("#tanggal").datepicker({
        orientation: "left",
        autoclose: !0,
        format: 'dd-mm-yyyy'
    })
});

// untuk datetime to
$(function() {
    $("#tgl_ibu").datepicker({
        orientation: "left",
        autoclose: !0,
        format: 'dd-mm-yyyy'
    })
});
</script>