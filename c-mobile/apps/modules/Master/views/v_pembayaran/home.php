<?php $this->load->view('_heading/_headerContent') ?>

<style>
.select-kategori {
	width: 150px ;
}
#btn_loading { display: none; }

@media screen and (min-width: 600px) {
  .batas-kiri
  {
    margin-left:-70px;
  }
  
  .batas-kiri-2
  {
	margin-left:-60px; 
  }
}
</style>


	<section class="content">
	<div class="box">
	<div class="box-header">
	<div class="row">
		<div class="col-md-2">
			<a class="klik ajaxify" href="<?php echo site_url('add-pembayaran'); ?>"><button class="btn btn-success" ><i class="glyphicon glyphicon-plus-sign"></i> Add Data</button></a>
		</div>
		
                <div class="col-md-2 batas-kiri">
                    <div class="btn-group">
                    <button id="search-button" name="search-button" type="button" class="btn grey"><i class="fa fa-search"></i> Advanced Search</button>
                    </div>
                </div>
       
  </div>
	</div>

  
	
	<br>
	<div class="search-form" style="display: none;margin-left: 20px">
		<form id="form-filter" class="form-horizontal">
			<div class="form-group">
				<label for="FirstName" class="col-sm-2 control-label">Tanggal Pembayaran Dari</label>
				<div class="col-sm-3">
					<input type="text" name="tanggal" class="form-control" id="tanggal">
				</div>
			</div>
      <div class="form-group">
				<label for="FirstName" class="col-sm-2 control-label">Tanggal Pembayaran Sampai</label>
				<div class="col-sm-3">
					<input type="text" name="tanggal2" class="form-control" id="tanggal2">
				</div>
			</div>
			<div class="form-group">
				<label for="LastName" class="col-sm-2 control-label">Tempat Pembayaran</label>
				<div class="col-sm-3">
          <select name="tempat_pembayaran" id="tempat_pembayaran" class="form-control select-tempat-pembayaran">
              <option></option>
              <option value="tubanan"> Tubanan </option>
              <option value="nginden"> Nginden </option>
          </select>
				</div>
			</div>
			<div class="form-group">
				<div class="form-group">
					<label for="LastName" class="col-sm-2 control-label"></label>
					<div class="col-sm-3">
						<button type="button" id="btn-filter" class="btn btn-primary"><i class="fa fa-refresh"></i> Filter</button>
					
					</div>
				</div>
			</div>
		</form>
	</div>
   
  <!-- /.box-header -->
  
   <div class="box-body">
	   <div class="table-responsive">
		   <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
			   <thead>
				   <tr>
					   <th>No.</th>
					   <th>Tanggal Pembayaran</th>
					   <th>No Pembayaran</th>
					   <th>No Pendaftaran</th>
					   <th>Nama Siswa</th>
					   <th>Bidang Studi</th>
					   <th>Level</th>
					   <th>Kategori Pembayaran</th>
					   <th>Jumlah Pembayaran</th>
					   <th>Tempat Pembayaran</th>
					   <th>Status Pembayaran</th>
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
  
  <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Tutup"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Import Data</h4>
          </div>

          <div class="modal-body">
            <form class="form-horizontal" id="form-import" method="post" enctype="multipart/form-data" role="form">

              <div class="modal-body">
                <div class="input-group form-group">
                  <span class="input-group-addon" id="sizing-addon2">
                    <i class="glyphicon glyphicon-file"></i>
                  </span>
                  <input type="file" class="form-control" name="excel" id="excel" aria-describedby="sizing-addon2" onchange="return validUpload()"/>
                </div>    
              </div>

              <div class="modal-footer">
                <div id='btn_loading'>
                  <button type='button' class='btn btn-success' disabled><i class='fa fa-spinner fa-spin'></i> &nbsp;Wait..</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal"> Cancel</button> </div>

                  <div id="buka">
                    <button class="btn btn-success" type="submit" name="button"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp; Upload</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"> Cancel</button>
                  </div>
                </div>

              </form>
            </div>

          </div>
        </div>
      </div>


	<script type="text/javascript">
	//untuk load data table ajax	

	var save_method; //for save method string
	var table;

	$(document).ready(function() {
    reloadTable();
  });

  function reloadTable() {
      var tanggal = $("#tanggal").val();
      var tanggal2 = $("#tanggal2").val();
      var tempat_pembayaran = $("#tempat_pembayaran").val();
     //datatables
    table = $('#table').DataTable({ 
		scrollX: true,
        "processing": true, //Feature control the processing indicator.
        "order": [], //Initial no order.
		 oLanguage: {
          sProcessing: "<img src='<?php base_url();?>assets/tambahan/gambar/loading.gif' width='30px'>" 
            },
 
        // Load data ajak di controller
        "ajax": {
            "url": "<?php echo site_url('Master/Pembayaran/ajax_list')?>",
            "type": "POST",
            data: {tempat_pembayaran: tempat_pembayaran,tanggal: tanggal, tanggal2: tanggal2},
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
	
 
    $('#btn-filter').click(function(){ //button filter event click
      table.destroy();
      reloadTable();
    });

    $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload();  //just reload table
    });

  }


function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

$(document).on("click",".hapus-master",function(){
	var id_pembayaran=$(this).attr("data-id");
	
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
			url: "<?php echo base_url('Master/Pembayaran/hapus'); ?>",
			data: "id_pembayaran=" +id_pembayaran,
			success: function(data){
				$("tr[data-id='"+id_pembayaran+"']").fadeOut("fast",function(){
					$(this).remove();
				});
				hapus_berhasil();
				reload_table();
			}
		 });
	});
});


 $('#search-button').click(function(){
                $('.search-form').toggle();
                return false;
            });

// untuk select2 ajak pilih menu
    $(function () 
	{
	$(".selek-tipe").select2({
    placeholder: " -- Jenis SIM -- ",
	allowClear: true
    });
    });
		
// untuk datetime from
    $(function () 
	{
	$("#tanggal").datepicker({
    orientation: "left",
    autoclose: !0,
    format: 'yyyy-mm-dd'
    })
    });	

    $(function () 
	{
	$("#tanggal2").datepicker({
    orientation: "left",
    autoclose: !0,
    format: 'yyyy-mm-dd'
    })
    });	

</script>

<script type="text/javascript">
    //Proses Controller logic ajax

    $('#form-import').submit(function (e) {
        var error = 0;
        var message = "";

        var data = $(this).serialize();

        var excel = $("#excel").val();
        var excel = excel.trim();

        if (error == 0) {
            if (excel.length == 0) {
                error++;
                message = "File wajib di isi.";
            }
        }

        if (error == 0) {
            $.ajax({
                method: 'POST',
                beforeSend: function () {
                $("#buka").hide();
                $("#btn_loading").show();
                },
                url: '<?php echo base_url(); ?>Master/Daftar/import',
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
            }).done(function (data) {
                var result = jQuery.parseJSON(data);
                if (result.status == true) {
                    document.getElementById("form-import").reset();
                    $("#buka").show();
                    $("#btn_loading").hide();
                    $("#myModal").hide();
                    $("#myModal").modal('hide');
                    swal("Success", result.pesan, "success");
                    reload_table();
                } else {
                    $("#buka").show();
                    $("#btn_loading").hide();
                    $("#myModal").hide();
                    $("#myModal").modal('hide');
                    swal("Warning", result.pesan, "warning");
                }
            })
            e.preventDefault();
        } else {
            swal("Warning", message, "warning");
            return false;
        }
    });
</script>






