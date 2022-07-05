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
        <input type="hidden" name="id_login" value="<?php echo $datatrainer->id_login; ?>">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">

                    <div class="tab-content">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Username"
                                        name="username" aria-describedby="sizing-addon2"
                                        value="<?php echo $datatrainer->username; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Password" name="password" id="password" aria-describedby="sizing-addon2" value="<?php echo $datatrainer->password; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Status Login</label>
                                <div class="col-sm-6">
									<select class="form-control select-status" name="status_login">
									<?php
										if($datatrainer->status_login == "aktif")
										{
									?>
										<option value="aktif" selected>Aktif</option>
										<option value="belum aktif">Tidak Aktif</option>
									<?php
										}
										else
										{
									?>
										<option value="aktif">Aktif</option>
										<option value="belum aktif" selected>Tidak Aktif</option>
									<?php
										}
									?>
									</select>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button name="simpan" type="submit" class="btn btn-success btn-flat"><i
                                        class="fa fa-save"></i> Simpan</button>
                                <a class="klik ajaxify" href="<?php echo site_url('trainer'); ?>"><button
								class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> Kembali</button></a>
                            </div>
                    </div>
                </div>
            </div>
    </form>
    </div>

</section>


<script>


$('#form-update').submit(function(e) {

    var data = $(this).serialize();

    $.ajax({
            beforeSend: function() {
                $(".loading2").show();
                $(".loading2").modal('show');
            },
            url: '<?php echo base_url();?>Category/Trainer/prosesUpdateLogin',
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
				//$(window).attr('location','../trainer');
            } else {
                $(".loading2").hide();
                $(".loading2").modal('hide');
                gagal();

            }
        })
    e.preventDefault();
});

$(function() {
    $(".select-status").select2({
        placeholder: " -- Status -- "
    });
});

</script>