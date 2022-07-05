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
			<div class="col-lg-6 col-xs-12">
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3><span class="count"><?php echo $kursus_aktif; ?></span></h3>
						<p>Kursus Aktif</p>
					</div>
					<div class="icon">
					 <i class="fa fa-calendar-plus-o"></i>
					</div>
				</div>
			</div>
		
			<div class="col-lg-6 col-xs-12">
				<div class="small-box bg-green">
					<div class="inner">
						<h3><span class="count"><?php echo $kursus_selesai; ?></span></h3>
							<p>Kursus Selesai</p>
					</div>
					<div class="icon">
						<i class="fa fa-calendar-check-o"></i>
					</div>
				</div>
			</div>
  
		</div>
		<div class="box">
			<div class="row">
				<div class="col-md-12">
					<div class="box-header with-border">
						<h3 class="box-title">Data Kursus </h3>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="table" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>No.</th>
										<th>Siswa </th>
										<th>Bidang Studi</th>
										<th>Level</th>
										<th>Tanggal Mulai - Tanggal Selesai</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<div class="box-footer">
							<a class="klik ajaxify" href="<?php echo site_url('trainer'); ?>"><button class="btn btn-primary btn-flat" ><i class="fa fa-arrow-left"></i> Kembali</button></a>
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
        "url": "<?php echo site_url('Category/Trainer/LoadDataHistory/'.$datatrainer) ?>",
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

</script>
		
		
	
	
		
		

		
		