<?php $this->load->view('_heading/_headerContent') ?>

<section class="content">

<div class="box">
  <div class="box-header">
    
  </div>
  <!-- /.box-header -->
  <div class="box-body">
  
   <form action="<?= base_url() ?>Setting/Akses/update_hak_akses/<?= $grup_id; ?>" method="post">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
         <th width='5%'><center>#</center></th>
		 <th width='30%'>Menu Dashboard</th>
		 <th width='20%'>Sub Menu</th>
		 <th width='7%'><center>View</center></th>							
		 <th width='7%'><center>Add</center></th>
		 <th width='7%'><center>Edit</center></th>
		 <th width='7%'><center>Delete</center></th>
        </tr>
      </thead>
       
	   <tbody>
	         <?php
			 $no = 1;
			 foreach($privilege as $row){
			 $view_pos	= strpos($row->menu_file, "iew");
			 $view 		= ($row->view == 1 and $view_pos != 0)?'checked=checked':'';
			 $viewavail 	= ($view_pos != 0)?'':'disabled=disabled';
									
			 $add_pos	= strpos($row->menu_file, "dd");
			 $add 		= ($row->add == 1 and $add_pos != 0)?'checked=checked':'';
			 $addavail 	= ($add_pos != 0)?'':'disabled=disabled';
									
			 $edit_pos	= strpos($row->menu_file, "dit");
			 $edit 		= ($row->edit == 1 and $edit_pos != 0)?'checked=checked':'';
			 $editavail 	= ($edit_pos != 0)?'':'disabled=disabled';
									
			 $del_pos	= strpos($row->menu_file, "el");
			 $del 		= ($row->del == 1 and $del_pos != 0)?'checked=checked':'';
			 $delavail 	= ($del_pos != 0)?'':'disabled=disabled';
									
			 echo "
			 <tr class='odd gradeX'>
			 <input type='hidden' name='id_menu[]' value=$row->menus />
			 <input type='hidden' name='grup_id' />
											
			 <td><center>$no</center></td>
			 <td>$row->nama_menu</td>	
			 <td><b>$row->menuparent</b></td>
			 <td class='center'><center><input type='checkbox' class='flat-red' value='1' name='view[$row->menus]' $view $viewavail /></center></td>
			 <td class='center'><center><input type='checkbox' class='flat-red' value='1' name='add[$row->menus]' $add $addavail /></center></td>
			 <td class='center'><center><input type='checkbox' class='flat-red' value='1' name='edit[$row->menus]' $edit $editavail /></center></td>
			 <td class='center'><center><input type='checkbox' class='flat-red' value='1' name='del[$row->menus]' $del $delavail /></center></td>
			 </tr>"; 
			 $no++; } ?>				
		</tbody>
	   
       </table>
	    <div class="box-footer">
        <button type="submit" class="btn btn-sm btn-primary klik-custom"><i class="fa fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-retweet"></i> Cancel</button>
        </div>
	</form>
  </div>
</div>

</section>

  <script>
  $(document).ready(function(){
  $('.klik-custom').click(function() {
  var url = $(this).attr('href');			
  $.ajax({
  complete: function(){
  save_berhasil();
  }
  });	
  return true;
  });
  });	
  
  </script>
  
  <script>
  //Flat red color scheme for iCheck
  $(function() {
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    });
	});
		
	 $(function() {
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    });
		});	
		
		
	</script>







