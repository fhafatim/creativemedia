<?php $this->load->view('_heading/_headerContent') ?>
<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
</head>
<style>
    .field-icon {
        float: left;
        margin-left: 93%;
        margin-top: -25px;
        position: relative;
        z-index: 2;
    }
</style>

<body>
    <section class="content">
        <!-- style loading -->
        <div class="loading2"></div>
        <!-- -->
        <form class="form-horizontal" id="form-tambah" enctype="multipart/form-data" method="POST">
            <div class="row">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#cuti" data-toggle="tab">Data Izin</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="cuti">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">No.Surat <font color="red">
                                            *
                                        </font></label>
                                    <div class="col-sm-7">
                                        <?php
                                        echo form_input([
                                            'name' => 'no_surat',
                                            'class' => 'form-control',
                                            'value' => set_value('kode', $kode),
                                            'readonly' => 'true',
                                        ]);
                                        ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Nama Karyawan<font color="red">
                                            *
                                        </font></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Nama Karyawan" name="nama" id="nama" aria-describedby="sizing-addon2" autocomplete="off" value="<?php echo $userdata->nama; ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Jabatan<font color="red">
                                            *
                                        </font></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Jabatan" name="jabatan" id="jabatan" aria-describedby="sizing-addon2" autocomplete="off" value="<?php echo $userdata->nama_grup; ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Divisi <font color="red"> *
                                        </font></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Divisi" name="divisi" id="divisi" aria-describedby="sizing-addon2" autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal Cuti</label>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control" placeholder="Tanggal Cuti" name="tglcuti" id="tglcuti" aria-describedby="sizing-addon2" autocomplete="off">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control" name="selesai" id="selesai" placeholder="Tanggal Berakhir" aria-describedby="sizing-addon2" autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Jenis Cuti</label>
                                    <div class="col-sm-7">
                                        <select name="jeniscuti" autocomplete="off" class="form-control selek-jeniscuti">
                                            <option>-Pilih-</option>
                                            <option value="Tahunan">Tahunan</option>
                                            <option value="Penting">Penting</option>
                                            <option value="Bersalin">Bersalin</option>
                                            <option value="Sakit">Sakit</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Cuti <font color="red"> *
                                        </font></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Jumlah Cuti" name="jmlh_cuti" id="jmlh_cuti" aria-describedby="sizing-addon2" autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Sisa Cuti <font color="red"> *
                                        </font></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Sisa Cuti" name="sisacuti" id="sisacuti" aria-describedby="sizing-addon2" autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Keperluan <font color="red"> *
                                        </font></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Keperluan" name="keperluan" id="keperluan" aria-describedby="sizing-addon2" autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div id="slider">
                                        <img class="img-thumbnail" id="output" src="<?php echo base_url(); ?>/assets/tambahan/gambar/tidak-ada.png" alt="your image" />
                                    </div>

                                    <label for="inputFoto" class="col-sm-2 control-label">Foto</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" name="gambar" id="gambar" />
                                        <p style='color: red; font-size: 14px;'> *Maksimal File Foto 2 MB</p>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <button name="simpan" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>
                                    <a class="klik ajaxify" href="<?php echo site_url('cuti'); ?>"><button class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i>
                                            Kembali</button></a>
                                </div>
                            </div>
                            <!---- ini buat data keluarga -->
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </section>

</body>

</html>
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

        var data = $(this).serialize();

        $.ajax({
                beforeSend: function() {
                    $(".loading2").show();
                    $(".loading2").modal('show');
                },
                url: '<?php echo base_url(); ?>Cuti/Cuti/prosesTambah',
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
    });
</script>