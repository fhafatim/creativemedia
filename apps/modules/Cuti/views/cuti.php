<?php $this->load->view('_heading/_headerContent') ?>

<style>
    .select-kategori {
        width: 150px;
    }
</style>

<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="col-md-2">
                <a href="<?php echo site_url('add-cuti'); ?>"><button class=" btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add Data</button></a>
            </div>
        </div>

        <!-- /.box-header -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>No.Surat</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Divisi</th>
                                <th>Tanggal Cuti</th>
                                <th>Tanggal Berakhir</th>
                                <th>Jenis Cuti</th>
                                <th>Jumlah Cuti</th>
                                <th>Sisa Cuti</th>
                                <th>Keperluan</th>
                                <th style="width:125px;"></th>
                                <th>Status</th>
                                <th style="width:125px;">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>



<script type="text/javascript">
    var save_method; //for save method string
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#table').DataTable({
            "processing": false, //Feature control the processing indicator.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Cuti/ajax_list') ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{

            }, ],

        });

    });


    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax 
    }

    $(document).on("click", ".hapus-cuti", function() {
        var no_surat = $(this).attr("data-id");

        swal({
                title: "Hapus Data?",
                text: "Yakin anda akan menghapus data ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Hapus",
                confirmButtonColor: '#dc1227',
                customClass: ".sweet-alert button",
                closeOnConfirm: true,
                html: true
            },
            function() {
                $.ajax({
                    method: "POST",
                    url: "<?php echo base_url('Cuti/Cuti/hapus'); ?>",
                    data: "no_surat=" + no_surat,
                    success: function(data) {
                        $("tr[data-id='" + no_surat + "']").fadeOut("fast", function() {
                            $(this).remove();
                        });
                        hapus_berhasil();
                        reload_table();
                    }
                });
            });
    });
</script>