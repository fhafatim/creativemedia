<?php $this->load->view('_heading/_headerContent') ?>

<style>
    .select-kategori {
        width: 150px;
    }

    #btn_loading {
        display: none;
    }

    @media screen and (min-width: 600px) {
        .batas-kiri {
            margin-left: -140px;
        }

        .batas-kiri-2 {
            margin-left: -180px;
        }
    }
</style>

<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-md-3">
                    <a class="klik ajaxify" href="<?php echo site_url('add-surat-nginden'); ?>"><button class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i>Tambah
                            Baru</button></a>
                </div>
            </div>
            <br>
            <div class="row mt-2">
                <div class="col-md-3">
                    <button type="button" class="btn btn-success btn-sm btn-export-nginden">
                        <i class="glyphicon glyphicon-excel"></i>
                        Export
                    </button>
                </div>
            </div>
        </div>

        <!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Nomor Surat</th>
                            <th>Isi/Keterangan</th>
                            <th>Jenis Surat</th>
                            <th>Kepada/Dari</th>
                            <th>File</th>
                            <th style="width:20%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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
            "processing": true, //Feature control the processing indicator.
            "order": [], //Initial no order.
            oLanguage: {
                sProcessing: "<img src='<?php base_url(); ?>assets/tambahan/gambar/loading.gif' width='30px'>"
            },

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url('Surat/Surat_nginden/ajax_list') ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [-1], //last column
                "orderable": false, //set not orderable
            }, ],

        });

        $(function() {
            $(document).on("click", ".btn-export-nginden", function(e) {
                e.preventDefault();
                var table = $('#table').dataTable();
                var lengthTable = table.fnGetData().length;

                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>Surat/Surat_nginden/export',
                    data: {
                        table_length: lengthTable,
                    },
                    success: function(response) {
                        var data = JSON.parse(response)
                        // alert(data.data)
                        window.open(data.data, '_blank');
                    }
                });
            });
        });
    });

    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax 
    }

    $(document).on("click", ".hapus-surat", function() {
        var id_surat = $(this).attr("data-id");

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
                    url: '<?php echo base_url(); ?>Surat/Surat_nginden/hapus_surat',
                    method: "POST",
                    data: "id_surat=" + id_surat,
                    success: function(data) {
                        update_berhasil();
                        reload_table();
                    }
                });
            });

    });


    $('#search-button').click(function() {
        $('.search-form').toggle();
        return false;
    });

    // untuk select2 ajak pilih menu
    $(function() {
        $(".selek-tipe").select2({
            placeholder: " -- Jenis SIM -- ",
            allowClear: true
        });
    });

    // untuk datetime from
    $(function() {
        $("#tanggal").datepicker({
            orientation: "left",
            autoclose: !0,
            format: 'yyyy-mm-dd'
        })
    });
</script>