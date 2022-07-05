<?php $this->load->view('_heading/_headerContent') ?>
<section class="content">

    <div class="box">
        <!-- /.box-header -->



        <div class="box-body">

            <!-- form start -->
            <form class="form-horizontal" id="form-tambah" method="POST">
                <!-- <input type="hidden" name="created_by" value="<?php echo $userdata->nama; ?>"> -->

                <div class="box-body">

                <!-- ============ INI FORM AWAL UNTUK INSERT KE TBL_JADWAL================= -->

                    <!-- <div class="form-group">
                        <label class="col-sm-2 control-label">Tanggal</label>
                        <div class="col-sm-3">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="tanggal" class="form-control pull-right"
                                    id="tanggal" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Pertemuan Ke-</label>
                        <div class="col-sm-3">
                            <input type="number" autocomplete="off" class="form-control" id="tanggal" autocomplete="off" name="pertemuan"
                                placeholder="Pertemuan Ke" aria-describedby="sizing-addon2">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jam Mulai</label>
                        <div class="col-sm-3">
                            <input type="time" class="form-control timepicker" id="time" autocomplete="off" name="jam_mulai"
                                placeholder="Jam mulai" aria-describedby="sizing-addon2">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jam Selesai</label>
                        <div class="col-sm-3">
                            <input type="time" class="form-control" id="tanggalmasuk" autocomplete="off"
                                name="jam_selesai" placeholder="Jam selesai" aria-describedby="sizing-addon2">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-3">
                            <textarea name="keterangan" id="keterangan" class="form-control"
                                autocomplete="off"></textarea>
                        </div>
                    </div> -->

                    <!-- ====FORM UNTUK INSERT KE TBL_DETAIL_JADWAL==== -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Pilih Hari</label>
                        <div class="col-sm-4">
                            <select class="form-control selek-hari" name="hari" id="hari" autocomplete="off">
                                <option value=""></option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jum'at">Jum'at</option>
                                <option value="Sabtu">Sabtu</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jam Mulai</label>
                        <div class="col-sm-4">
                            <input type="time" class="form-control timepicker" id="time" autocomplete="off" name="jam_mulai" placeholder="Jam mulai" aria-describedby="sizing-addon2">
                        </div>
                    </div>

                    <div class="box-footer">
                        <button name="simpan" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i>
                            Simpan</button>
                      <!--  <button type="reset" class="btn btn-warning btn-flat"><i class="fa fa-retweet"></i>
                            Cancel</button> -->
                        <a class="klik ajaxify" href="<?php echo site_url('jadwal'); ?>"><button
                                class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i>
                                Kembali</button></a>
                    </div>
            </form>

            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">

                    <input type="hidden" name="id_kelas" value="<?= $datamaster; ?>">

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Hari</th>
                            <th>Jam Mulai</th>
                            <th style="width:125px;">Action</th>
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
//Proses Controller logic ajax
	
        $('#form-tambah').submit(function(e) {
		var data = $(this).serialize();
		$.ajax({
		method: 'POST',
        beforeSend: function (){
        $(".loading2").show();
		$(".loading2").modal('show');	
        },
		url: '<?php echo site_url('Master/JadwalKelas/prosesTambahDetail'); ?>',
		data: data,
		})
		.done(function(data) {
			var result = jQuery.parseJSON(data);
			
			if (result.status == 'berhasil')
				
			{
				document.getElementById("form-tambah").reset();
				$(".loading2").hide();
				$(".loading2").modal('hide');				
				save_berhasil();
				setTimeout(location.reload.bind(location), 450);
				
            } else 
			
			{
				$(".loading2").hide();
				$(".loading2").modal('hide');	
				gagal();
				
			}
		})
		
		e.preventDefault();
		});

	//untuk load data table ajax	

	var save_method; //for save method string
	var table;

	$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "order": [], //Initial no order.
		 oLanguage: {
          sProcessing: "<img src='<?php base_url();?>assets/tambahan/gambar/loading.gif' width='30px'>" 
            },

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('ListDetailJadwal/').$datamaster?>",
            "type": "POST",
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        }, ],

    });
});


function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

$(document).on("click",".hapus-jadwal",function(e){
	var id_jadwal=$(this).attr("data-id");
	
	swal({
		title:"Hapus Data?",
		text:"Yakin anda akan menghapus data ?",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Hapus",
		confirmButtonColor: '#dc1227',
		customClass: ".sweet-alert button",
		closeOnConfirm: true,
		html: true
	},
		function(){
		 $.ajax({
			method: "POST",
			url: "<?php echo base_url('Master/JadwalKelas/hapus'); ?>",
			data: "id_jadwal=" +id_jadwal,
			success: function(data){
				$("tr[data-id='"+id_jadwal+"']").fadeOut("fast",function(){
					$(this).remove();
				});
				hapus_berhasil();
				reload_table();
			}
		 });
	});
    e.preventDefault();
});

//Hapus detail jadwal
$(document).on("click",".hapus-detail-jadwal",function(e){
	var id_detail_jadwal=$(this).attr("data-id");
	
	swal({
		title:"Hapus Data?",
		text:"Yakin anda akan menghapus data ?",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Hapus",
		confirmButtonColor: '#dc1227',
		customClass: ".sweet-alert button",
		closeOnConfirm: true,
		html: true
	},
		function(){
		 $.ajax({
			method: "POST",
			url: "<?php echo base_url('Master/JadwalKelas/hapus_detail_jadwal'); ?>",
			data: "id_detail_jadwal=" +id_detail_jadwal,
			success: function(data){
				$("tr[data-id='"+id_detail_jadwal+"']").fadeOut("fast",function(){
					$(this).remove();
				});
				hapus_berhasil();
				reload_table();
			}
		 });
	});
    e.preventDefault();
});

//Update jadwal menjadi selesai
$(document).on("click", ".edit-jadwal", function(e) {
    		var id_jadwal = $(this).attr("data-id");
    		console.log(id_jadwal);

			swal({
					title: "Selesai?",
					text: "Sudah menyelesaikan pertemuan ini ?",
					type: "warning",
					showCancelButton: true,
					confirmButtonText: "Ya, Sudah",
					confirmButtonColor: '#009e00',
					customClass: ".sweet-alert button",
					closeOnConfirm: true,
					html: true
				},
				function() {
					$.ajax({
						url: '<?php echo base_url();?>Master/JadwalKelas/selesai'+id_jadwal,
						method: "POST",
						data: "id_jadwal=" + id_jadwal,
						success: function(data) {
							update_berhasil();
							reload_table();
						}
					});
				});
				e.preventDefault();
		});
		//#End Update jadwal menjadi selesai

        // Javascript untuk tanggal
        $(document).ready(function () {
                $('#tanggal').datepicker({
                 //merubah format tanggal datepicker ke dd-mm-yyyy
                    format: "dd-mm-yyyy",
                    autoclose: true
                });
            });


        // untuk select2 ajak pilih menu
		$(function () 
		{
            $(".selek-hari  ").select2({
            placeholder: " -- Pilih Hari -- ",
            allowClear: true
            });
		});
</script>