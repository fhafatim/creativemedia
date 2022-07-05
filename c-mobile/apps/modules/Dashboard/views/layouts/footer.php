</div>
  <!-- /.content-wrapper -->
    
      <!-- footer -->
      <footer class="main-footer">
	<!-- To the right -->
	<div class="pull-right hidden-xs">
		Dashboard Admin
	</div>
	<!-- Default to the left -->
	<strong>Copyright &copy; <?php echo date("Y") ?> Develop by <a href="#">Creative Media Team</a>.</strong> All rights reserved.
</footer>
    
      <div class="control-sidebar-bg"></div>
    </div>

    <!-- js -->
    
<!-- REQUIRED JS SCRIPTS -->


<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>admin-lte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


<!-- FastClick -->
<script src="<?php echo base_url(); ?>admin-lte/bower_components/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>admin-lte/dist/js/adminlte.min.js"></script>


<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>admin-lte/dist/js/demo.js"></script>
<script src="<?php echo base_url(); ?>admin-lte/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>


<!-- daterangepicker -->

<script src="<?php echo base_url(); ?>admin-lte/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>admin-lte/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>admin-lte/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>admin-lte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- checkbox -->
<script src="<?php echo base_url(); ?>admin-lte/plugins/iCheck/icheck.min.js"></script>

<!-- AdminLTE App -->
<script src="<?= base_url();?>admin-lte/dist/js/app.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-summernote/summernote.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ajax.js"></script>


<script type="text/javascript">
//klik loading ajax
	
	$(document).ready(function(){
    $('.klik').click(function() {
    var url = $(this).attr('href');
	$("#loading2").show().html("<img src='http://apps.creativemedia.id/assets/tambahan/gambar/loader-ok.gif' height='18'> ");
	$("#loading2").modal('show');		
	$.ajax({
	complete: function(){
	$("#loading2").hide();
	$("#loading2").modal('hide');
	}
	});	
	return true;
    });
    });
</script>



<script type="text/javascript">

    // handle ajax link dengan konten
        var base_url = '<?= base_url();?>';
        var ajaxify     = [null, null, null];
        
        $('.content-wrapper').on('click', '.ajaxify', function(e) {
            var ele = $(this);
            function_ajaxify(e, ele);
        });

        $('.sidebar-menu').on('click', ' li > a.ajaxify', function(e) {
        var ele = $(this);
            function_ajaxify(e, ele);

        });
		
		
		 // loading ajax
		
		 $.ajaxSetup({
	        beforeSend: function(xhr) {
	        $("#loading2").show().html("<img src='http://apps.creativemedia.id/assets/tambahan/gambar/loader-ok.gif' height='18'> ");
			$("#loading2").modal('show');	
	        },
	        complete: function() {
	            $("#loading2").hide();
				$("#loading2").modal('hide');
	        },
	        error: function() {
	            $("#loading2").hide();
				$("#loading2").modal('hide');
	        }
	    });
		
		
	// load konten ajax
		
        var function_ajaxify = function(e, ele){
            e.preventDefault();

            var url = $(ele).attr("href");
            //var pageContent = $('.page-content');
            var pageContentBody = $('.content-wrapper');

            if(url != ajaxify[2]){
                ajaxify.push(url);
                history.pushState(null, null, url);
            }
            ajaxify = ajaxify.slice(-3, 5);

            $.ajax({
                type: "POST",
                cache: false,
                url: url,
                data: {status_link: 'ajax'},
                dataType: "html",
                success: function(res) {
                    if(res == 'out'){
                        window.location = base_url+'login';
                    }else{
                        //hide_loading_bar();
                        pageContentBody.html(res);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    $.ajax({
                        type: "POST",
                        cache: false,
                        url: 'error/error_404',
                        data: {url: ajaxify[1], url1: ajaxify[2]},
                        dataType: "html",
                        success: function(res) {
                            if(res == 'out'){
                                window.location = base_url+'login';
                            }else{
                                //hide_loading_bar();
                                pageContentBody.html(res);
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            //hide_loading_bar();
                        }
                    });
                }
            });
        } 
		
  </script> 