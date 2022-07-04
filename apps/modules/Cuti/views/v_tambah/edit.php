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
<?php
if ($idpg == "7") {
    $hehe = '';
    $hoho = 'style="visibility:hidden"';
} else {
    $hehe = 'readonly';
}

?>
<section class="content">
    <!-- style loading -->
    <div class="loading2"></div>
    <!-- -->

    <div class="box">
        <div class="row">
            <div class="col-md-8">

                <div class="box-header with-border">
                    <h3 class="box-title">Edit Data</h3>
                </div>

                <!-- /.box-header -->
                <!-- form start -->

                <!-- form start -->
                <form class="form-horizontal" id="form-update" method="POST">
                    <input type="hidden" name="no_surat" value="<?php echo $datacuti->no_surat; ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">No Surat</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" placeholder="no surat" name="no_surat" value="<?php echo $datacuti->no_surat; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nama Karyawan</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" placeholder="nama tentor" name="nama" aria-describedby="sizing-addon2" value="<?php echo $datacuti->nama; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Jabatan</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" placeholder="jabatan" name="jabatan" id="jabatan" aria-describedby="sizing-addon2" value="<?php echo $datacuti->jabatan; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Divisi</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" placeholder="divisi" name="divisi" id="divisi" aria-describedby="sizing-addon2" value="<?php echo $datacuti->divisi; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tgl Cuti</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" id="tglcuti" name="tglcuti" placeholder="Tanggal Cuti" aria-describedby="sizing-addon2" value="<?php $dob = (new DateTime($datacuti->tglcuti))->format('Y-m-d');
                                                                                                                                                                        echo $dob ?>" <?= $hehe ?>>
                            </div>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" id="selesai" name="selesai" placeholder="Tanggal Selesai" aria-describedby="sizing-addon2" value="<?php $dib = (new DateTime($datacuti->selesai))->format('Y-m-d');
                                                                                                                                                                            echo $dib ?>" <?= $hehe ?>>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Jenis Cuti</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" placeholder="jeniscuti" name="jeniscuti" id="jeniscuti" aria-describedby="sizing-addon2" value="<?php echo $datacuti->jeniscuti; ?>" <?= $hehe ?>>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Cuti</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" placeholder="jmlh_cuti" name="jmlh_cuti" id="jmlh_cuti" aria-describedby="sizing-addon2" value="<?php echo $datacuti->jmlh_cuti; ?>" <?= $hehe ?>>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Sisa Cuti</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" placeholder="sisacuti" name="sisacuti" id="sisacuti" aria-describedby="sizing-addon2" value="<?php echo $datacuti->sisacuti; ?>" <?= $hehe ?>>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Keperluan</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" placeholder="keperluan" name="keperluan" id="keperluan" aria-describedby="sizing-addon2" value="<?php echo $datacuti->keperluan; ?>" <?= $hehe ?>>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Lampiran</label>
                            <div id="slider">
                                <img class="img-thumbnail" id="output" src="<?php echo base_url($datacuti->lampiran); ?>" alt="your image" />
                            </div>
                        </div>

                        <div class="form-group" <?= $hoho ?>>
                            <label class="col-sm-2 control-label">Status Izin</label>
                            <div class="col-sm-3">
                                <select name="status" class="form-control selek-status">
                                    <!-- <?php foreach ($datacuti as $data) { ?>
										<option value="<?php echo $data->nama ?>"
											<?php if ($data->nama == $datacuti->status) {
                                                    echo "selected='selected'";
                                                } ?>>
											<?php echo $data->nama; ?>
										</option>
										<?php } ?> -->

                                    <option></option>
                                    <option value="Approved" <?= $datacuti->status == 'Approved' ? 'selected' : '' ?>>Approved
                                    </option>
                                    <option value="Reject" <?= $datacuti->status == 'Reject' ? 'selected' : '' ?>>Reject
                                    </option>
                                </select>
                            </div>
                        </div>


                        <div class="box-footer">
                            <button name="simpan" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>
                            <button type="reset" class="btn btn-warning btn-flat"><i class="fa fa-retweet"></i>
                                Cancel</button>
                            <a class="klik ajaxify" href="<?php echo site_url('cuti'); ?>"><button class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i>
                                    Kembali</button></a>
                        </div>
                </form>

            </div>
            <!-- /.box -->

        </div>
        <!-- /.row -->
    </div>

</section>

<!-- js edit -->
<script type="text/javascript">
    $('#form-update').submit(function(e) {

        var data = $(this).serialize();

        $.ajax({
                beforeSend: function() {
                    $(".loading2").show();
                    $(".loading2").modal('show');
                },
                url: '<?php echo base_url(); ?>Cuti/Cuti/prosesUpdate',
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


    // untuk select2 ajak pilih tipe
    $(function() {
        $(".selek-status").select2({
            placeholder: " -- pilih status -- "
        });
    });

    // untuk select2 ajak pilih tipe
    $(function() {
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

<!-- end js edit -->


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

    // untuk datetime from
    $(function() {
        $("#tanggal").datepicker({
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