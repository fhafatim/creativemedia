<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Creative Media Apps | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/ionicons.min.css">
	
	<!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/tambahan/style-login.css">
	
	<link rel="icon" href="<?php echo base_url()?>/assets/tambahan/gambar/c-mobile.png">
	
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.css">
	
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	
	
	<video autoplay muted loop id="video">
	<source src="<?php echo base_url(); ?>assets/tambahan/video/video_agency_home.mp4">
	</video>
	
	
	

  </head>
  <body>
    <div class="login-box">
      <div class="login-logo">
        <img src="<?php echo base_url(); ?>assets/tambahan/gambar/c-mobile.png" width="100px">
      </div>

      <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">
          Silahkan Login !!
        </p>

        <form action="<?php echo base_url('Default/Auth/login'); ?>" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" name="username">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
             <input type='password' class="form-control" id="password" name="password" placeholder="password" class="span12">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
		  
		   <label>
		 <input type="checkbox" class="form-ok"> <font style='color: black; font-size: 13px;'> <b>Show password</b></font><br><br>
		</label>
		  
          <div class="row">
            <div class="col-xs-offset-8 col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
            </div>
          </div>
        </form>
      </div>
	  
	  
      <!-- /.login-box-body -->
      <?php
        echo show_err_msg($this->session->flashdata('error_msg'));
      ?>
    </div>
	
	<script>
	
		$(document).ready(function(){		
		$('.form-ok').click(function(){
			if($(this).is(':checked')){
				$('#password').attr('type','text');
			}else{
				$('#password').attr('type','password');
			}
		});
	});
	
	</script>
	
	
	
	
	
    <!-- /.login-box -->
    <!-- jQuery 2.2.3 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	
   
  </body>
</html>
