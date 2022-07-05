<?php $this->load->view('_heading/_headerContent') ?>
<section class="content">

<div class="box">
  <div class="box-header">
    <div class="col-md-2">
    <a class="klik ajaxify" href="<?php echo site_url('add-kat-fasilitas'); ?>"><button class="btn btn-success" ><i class="glyphicon glyphicon-plus-sign"></i> Add Data</button></a>
     
	</div>
    
  </div>
  <!-- /.box-header -->
  
   <div class="box-body">
   <div class="table-responsive">
   <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
   <thead>
   <tr>
   <th>No.</th>
   <th>Tipe Fasilitas</th>
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

        "processing": true, //Feature control the processing indicator.
        "order": [], //Initial no order.
		 oLanguage: {
          sProcessing: "<img src='<?php base_url();?>assets/tambahan/gambar/loading.gif' width='30px'>" 
            },

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Category/Cat_fasilitas/ajax_list')?>",
            "type": "POST"
			
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });
});


function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

$(document).on("click",".hapus-cat-fasilitas",function(){
	var id_tipe=$(this).attr("data-id");
	
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
			url: "<?php echo base_url('Category/Cat_fasilitas//hapus'); ?>",
			data: "id_tipe=" +id_tipe,
			success: function(data){
				$("tr[data-id='"+id_tipe+"']").fadeOut("fast",function(){
					$(this).remove();
				});
				hapus_berhasil();
				reload_table();
			}
		 });
	});
});

</script>






