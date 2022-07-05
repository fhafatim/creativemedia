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
    <div class="row">
        <div class="col-lg-4 col-xs-12">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><span class="count"><?php echo $jumlah_tagihan; ?></h3>
                    <p>Tagihan</p>
                </div>
                <div class="icon">
                    <i class="fa fa-credit-card"></i>
                </div>
            </div>
        </div>

    </div>
    <div class="box">
        <div class="row">
            <div class="col-md-12">
                <div class="box-header with-border">
                    <h3 class="box-title">Tagihan</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="table2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal Terbit</th>
                                    <th>Nomor Invoice</th>
                                    <th>Bidang Studi</th>
                                    <th>Tagihan</th>
                                    <th>Pembayaran</th>
                                    <th>Sisa</th>
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
                    <h3 class="box-title">History Pembayaran</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>No Pembayaran</th>
                                    <th>Jumlah Pembayaran</th>
                                    <th>Jenis Pembayaran</th>
                                    <th>Kategori Pembayaran</th>
                                    <th>Status Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer">
                        <a class="klik ajaxify" href="<?php echo site_url('daftar'); ?>"><button
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
            "url": "<?php echo site_url('Master/Daftar/LoadDataHistory/'.$datamaster) ?>",
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
            "url": "<?php echo site_url('Master/Daftar/LoadDataTagihan/'.$datamaster)?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [-1], //last column
            "orderable": false, //set not orderable
        }, ],

    });
});
</script>