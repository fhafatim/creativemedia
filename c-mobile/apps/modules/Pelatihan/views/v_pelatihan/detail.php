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

<section class="content">
    <!-- style loading -->
    <div class="loading2"></div>
    <div class="box">
        <div class="row">
            <div class="col-md-12">
                <div class="box-header with-border">
                    <h3 class="box-title">Bidang Studi</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <br>
                            <a class="klik ajaxify" href="<?php echo base_url('add-bidang-studi-pelatihan/'.$datamaster); ?>"><button
                                    class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i>Tambah</button></a>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Bidang Studi</th>
                                    <th>Level</th>
                                    <th>Tentor</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="row">
            <div class="col-md-12">
                <div class="box-header with-border">
                    <h3 class="box-title">Peserta</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <br>
                            <a class="klik ajaxify" href="<?php echo base_url('add-peserta-pelatihan/'.$datamaster); ?>"><button
                                    class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i>Tambah</button></a>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="table4" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Bidang Studi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="row">
            <div class="col-md-12">
                <div class="box-header with-border">
                    <h3 class="box-title">Tagihan</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <br>
                            <a class="klik ajaxify" href="<?php echo base_url('add-invoice-pelatihan/'.$datamaster); ?>"><button
                                    class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i>Tambah</button></a>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="table2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal Terbit</th>
                                    <th>Nomor Invoice</th>
                                    <th>Jumlah</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="row">
            <div class="col-md-12">
                <div class="box-header with-border">
                    <h3 class="box-title">Pembayaran</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <br>
                            <a class="klik ajaxify" href="<?php echo base_url('add-pembayaran-pelatihan/'.$datamaster); ?>"><button
                                    class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i>Tambah</button></a>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="table3" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Jumlah Pembayaran</th>
                                    <th>Jenis Pembayaran</th>
                                    <th>Kategori Pembayaran</th>
                                    <th>Bank</th>
                                    <th>Nomor Rekening</th>
                                    <th>Atas Nama</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer">
                        <a class="klik ajaxify" href="<?php echo site_url('pelatihan'); ?>"><button
                                class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> Kembali</button></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
//untuk load data table ajax    

var save_method; //for save method string
var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({
        scrollX: true,
        "processing": true, //Feature control the processing indicator.
        "order": [], //Initial no order.
        oLanguage: {
            sProcessing: "<img src='<?php base_url();?>assets/tambahan/gambar/loading.gif' wid_record_trainingth='25px'>"
        },

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Pelatihan/Pelatihan/LoadDataBidangStudi/'.$datamaster) ?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [-1], //last column
            "orderable": false, //set not orderable
        }, ],

    });
});


var table2;

$(document).ready(function() {

    //datatables
    table = $('#table2').DataTable({
        scrollX: true,
        "processing": true, //Feature control the processing indicator.
        "order": [], //Initial no order.
        oLanguage: {
            sProcessing: "<img src='<?php base_url();?>assets/tambahan/gambar/loading.gif' wid_record_trainingth='25px'>"
        },

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Pelatihan/Pelatihan/LoadDataTagihan/'.$datamaster)?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [-1], //last column
            "orderable": false, //set not orderable
        }, ],

    });
});


var table3;

$(document).ready(function() {

    //datatables
    table = $('#table3').DataTable({
        scrollX: true,
        "processing": true, //Feature control the processing indicator.
        "order": [], //Initial no order.
        oLanguage: {
            sProcessing: "<img src='<?php base_url();?>assets/tambahan/gambar/loading.gif' wid_record_trainingth='25px'>"
        },

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Pelatihan/Pelatihan/LoadDataPembayaran/'.$datamaster)?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [-1], //last column
            "orderable": false, //set not orderable
        }, ],

    });
});

var table4;

$(document).ready(function() {

    //datatables
    table = $('#table4').DataTable({
        scrollX: true,
        "processing": true, //Feature control the processing indicator.
        "order": [], //Initial no order.
        oLanguage: {
            sProcessing: "<img src='<?php base_url();?>assets/tambahan/gambar/loading.gif' wid_record_trainingth='25px'>"
        },

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Pelatihan/Pelatihan/LoadDataPeserta/'.$datamaster)?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [-1], //last column
            "orderable": false, //set not orderable
        }, ],

    });
});

function reload_table() {
    table.ajax.reload(null, false); //reload datatable ajax 
}

$(document).on("click", ".hapus-kelas", function() {
    var id_kelas_pelatihan = $(this).attr("data-id");
    console.log(id_kelas_pelatihan);
    swal({
            title: "Batal?",
            text: "Yakin anda akan menghapus data ini ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yakin",
            confirmButtonColor: '#dc1227',
            customClass: ".sweet-alert button",
            closeOnConfirm: true,
            html: true
        },
        function() {
            $.ajax({
                url: '<?php echo base_url();?>Pelatihan/Pelatihan/hapus_kelas',
                method: "POST",
                data: "id_kelas_pelatihan=" + id_kelas_pelatihan,
                success: function(data) {
                    update_berhasil();
                    $(window).attr('location','../detail-pelatihan/'+<?php echo $datamaster; ?>);
                }
            });
        });

});

$(document).on("click", ".hapus-tagihan", function() {
    var id_invoice_pelatihan = $(this).attr("data-id");
    console.log(id_invoice_pelatihan);
    swal({
            title: "Batal?",
            text: "Yakin anda akan menghapus data ini ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yakin",
            confirmButtonColor: '#dc1227',
            customClass: ".sweet-alert button",
            closeOnConfirm: true,
            html: true
        },
        function() {
            $.ajax({
                url: '<?php echo base_url();?>Pelatihan/Pelatihan/hapus_tagihan',
                method: "POST",
                data: "id_invoice_pelatihan=" + id_invoice_pelatihan,
                success: function(data) {
                    update_berhasil();
                    $(window).attr('location','../detail-pelatihan/'+<?php echo $datamaster; ?>);
                }
            });
        });

});

$(document).on("click", ".hapus-pembayaran", function() {
    var id_pembayaran_pelatihan = $(this).attr("data-id");
    console.log(id_pembayaran_pelatihan);
    swal({
            title: "Batal?",
            text: "Yakin anda akan menghapus data ini ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yakin",
            confirmButtonColor: '#dc1227',
            customClass: ".sweet-alert button",
            closeOnConfirm: true,
            html: true
        },
        function() {
            $.ajax({
                url: '<?php echo base_url();?>Pelatihan/Pelatihan/hapus_pembayaran',
                method: "POST",
                data: "id_pembayaran_pelatihan=" + id_pembayaran_pelatihan,
                success: function(data) {
                    update_berhasil();
                    $(window).attr('location','../detail-pelatihan/'+<?php echo $datamaster; ?>);
                }
            });
        });

});

$(document).on("click", ".hapus-peserta", function() {
    var id_peserta_pelatihan = $(this).attr("data-id");
    console.log(id_peserta_pelatihan);
    swal({
            title: "Batal?",
            text: "Yakin anda akan menghapus data ini ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yakin",
            confirmButtonColor: '#dc1227',
            customClass: ".sweet-alert button",
            closeOnConfirm: true,
            html: true
        },
        function() {
            $.ajax({
                url: '<?php echo base_url();?>Pelatihan/Pelatihan/hapus_peserta',
                method: "POST",
                data: "id_peserta_pelatihan=" + id_peserta_pelatihan,
                success: function(data) {
                    update_berhasil();
                    $(window).attr('location','../detail-pelatihan/'+<?php echo $datamaster; ?>);
                }
            });
        });

});
</script>