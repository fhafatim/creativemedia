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
			<a class="klik ajaxify" href="<?php echo site_url('add-list-sertifikat'); ?>"><button class="btn btn-success" ><i class="glyphicon glyphicon-plus-sign"></i> Add Data</button></a>
		</div>
	</div>
	
	<br>
   
  <!-- /.box-header -->
  
   <div class="box-body">
	   <div class="table-responsive">
		   <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
			   <thead>
				   <tr>
					   <th>No.</th>
                       <th>Tanggal</th>
					   <th>Nama Siswa</th>
					   <th>Bidang Studi</th>
                       <th>Status</th>
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
          sProcessing: "<img src='<?php base_url();?>assets/tambahan/gambar/loading.gif' width='30px'>" 
            },
 
        // Load data ajak di controller
        "ajax": {
            "url": "<?php echo site_url('Master/Sertifikat/ajax_list')?>",
            "type": "POST"
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
        table.ajax.reload();  //just reload table
    });
    $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload();  //just reload table
    });

	});


function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

$(document).on("click",".hapus-master",function(){
	var id_list_sertifikat=$(this).attr("data-id");
	
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
			url: "<?php echo base_url('Master/Sertifikat/hapus'); ?>",
			data: "id_list_sertifikat=" +id_list_sertifikat,
			success: function(data){
				$("tr[data-id='"+id_list_sertifikat+"']").fadeOut("fast",function(){
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

</script>