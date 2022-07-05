
		
		
		<section class="content">
		<!-- style loading -->
		<div class="loading2"></div>
		<!-- -->
		
		<div class="box">
        <div class="row">
        <div class="col-md-8">
       
        <div class="box-header with-border">
        <h3 class="box-title">Tambah Data</h3>
         </div>
			
            <!-- /.box-header -->
            <!-- form start -->
			
			<form method="post" action="<?php echo site_url('WebService/daftar');?>">
			
            <div class="box-body">
			
            <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Nama Depan </label>
            <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="nama depan" name="nama_depan" aria-describedby="sizing-addon2">
            </div>
            </div>
			
			
			
			<div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Nama Belakang </label>
            <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="nama belakang" name="nama_belakang" aria-describedby="sizing-addon2">
            </div>
            </div>
			
			 <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">jenis kelamin </label>
            <div class="col-sm-9">
            <input type="radio" name="jenis_kelamin" value="laki-laki" /> Laki - Laki
			<input type="radio" name="jenis_kelamin" value="perempuan" /> Perempuan
            </div>
            </div>
			
			<div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">HP </label>
            <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="hp" name="handphone" aria-describedby="sizing-addon2">
            </div>
            </div>
			
			<div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">email </label>
            <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="email" name="email" aria-describedby="sizing-addon2">
            </div>
            </div>
			
			<div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">alamat </label>
            <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="alamat" name="alamat" aria-describedby="sizing-addon2">
            </div>
            </div>
			
			<div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">kota </label>
            <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="kota" name="kota" aria-describedby="sizing-addon2">
            </div>
            </div>
			
			<div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">kode pos </label>
            <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="kode_pos" name="kode_pos" aria-describedby="sizing-addon2">
            </div>
            </div>
			
			<div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">provinsi </label>
            <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="provinsi" name="provinsi" aria-describedby="sizing-addon2">
            </div>
            </div>
			
			<div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">warganegara </label>
            <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="warganegara" name="warganegara" aria-describedby="sizing-addon2">
            </div>
            </div>
			
			<div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">pendidikan terakhir </label>
            <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="pendidikan" name="pendidikan_terakhir" aria-describedby="sizing-addon2">
            </div>
            </div>
			
	    <div class="form-group">
        <label class="col-sm-2 control-label">Bidang Studi </label>
        <div class="col-sm-7">
        <select name="bidang_studi">
		<?php foreach ($studi as $data) { ?>
		<option value="<?php echo $data->nama_studi; ?>">
		<?php echo $data->nama_studi; ?>
		</option>
		<?php } ?>
		</select>
        </div>
        </div>

            </div>
            <div class="box-footer">
            <button name="simpan" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-warning btn-flat"><i class="fa fa-retweet"></i> Cancel</button>
            </div>
            </form>
			
          </div>
          <!-- /.box -->
       
          </div>
          <!-- /.row -->
		</div>

		</section>
		
		
	
	
	
	
	
	
		
		

		
		