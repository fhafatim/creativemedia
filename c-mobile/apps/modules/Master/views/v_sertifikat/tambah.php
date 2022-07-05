<?php $this->load->view('_heading/_headerContent') ?>

<style>
#osas {
    color: red;
    font-weight: bold;
    margin-left: 0px;
}

.select-pendaftaran-kursus {
    width: 500px;
}
</style>

<section class="content">
    <!-- style loading -->
    <div class="loading2"></div>
    <!-- -->
    <div class="box">
        <form class="form-horizontal" id="tambah_sertifikat" method="POST">
            <input type="hidden" name="created_by" value="<?php echo $userdata->nama; ?>">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Siswa</label>
                            <div class="col-sm-3">
                                <select name="siswa" id="siswa"
                                    class="form-control select-pendaftaran-kursus">
                                    <option value=""></option>

                                    <?php
											foreach ($siswa as $datasiswa) {
										?>
                                    <option value="<?php echo $datasiswa->id_kelas; ?>">
                                        <?php echo $datasiswa->no_pendaftaran.' - '.$datasiswa->nama_siswa.' - '.$datasiswa->nama_bidang_studi.' '.$datasiswa->nama_level_kelas; ?>
                                    </option>
                                    <?php
											}
										?>
                                </select>
                            </div>
                        </div>
                    <div class="box-footer">
                        <button name="simpan" type="submit" id="form-tambah" class="btn btn-success btn-flat"><i
                                class="fa fa-save"></i> Simpan</button>
                        <a class="klik ajaxify" href="<?php echo site_url('sertifikat'); ?>"><button
                                class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> Kembali</button></a>
                    </div>

                </div>
            </div>
    </div>
    </form>
    </div>
</section>

</script>
<script type="text/javascript">

$('#tambah_sertifikat').submit(function(e) {

    var error = 0;
    var message = "";
    var data = $(this).serialize();

    var siswa = $("#siswa").val();
    var siswa = siswa.trim();
    console.log(data);
    if (error == 0) {
        if (siswa.length == 0) {
            error++;
            message = "Siswa Wajib Diisi";
        }
    }

    if (error == 0) {
        $.ajax({
                method: 'POST',
                beforeSend: function() {
                    $(".loading2").show();
                    $(".loading2").modal('show');
                },
                url: '<?php echo site_url('Master/Sertifikat/prosesTambah'); ?>',
                data: data,
            })
            .done(function(data) {
                var result = jQuery.parseJSON(data);
                if (result.status == 'berhasil')
                {
                    document.getElementById("tambah_sertifikat").reset();
                    $(".loading2").hide();
                    $(".loading2").modal('hide');
                    save_berhasil();
                    setTimeout(location.reload.bind(location), 450);
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
// console.log(status);


// untuk select2 ajak pilih menu
$(function() {
    $(".select-pendaftaran-kursus").select2({
        placeholder: " -- Siswa -- "
    });
});


</script>