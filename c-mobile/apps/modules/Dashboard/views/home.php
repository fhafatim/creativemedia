<?php $this->load->view('_heading/_headerContent') ?>

<style>
#report {
    max-width: 1080px;
    height: 400px;
    margin: 0 auto
}
</style>

<section class="content">
    <div class="row">

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><span class="count"><?php echo $siswa; ?></span></h3>
                    <p>Siswa Aktif</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
                <a href="<?php echo site_url('siswa'); ?>" class="ajaxify small-box-footer klik">Lihat data <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><span class="count"><?php echo $pengajar; ?></span></h3>
                    <p>Pengajar Aktif</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="<?php echo site_url('trainer'); ?>" class="ajaxify small-box-footer klik">Lihat data <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><span class="count"><?php echo $karyawan; ?></h3>
                    <p>Karyawan Aktif</p>
                </div>
                <div class="icon">
                    <i class="fa fa-calendar"></i>
                </div>
                <a href="<?php echo site_url('karyawan'); ?>" class="ajaxify small-box-footer klik">Lihat data <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3><span class="count"><?php echo $jadwal; ?></h3>
                    <p>Jadwal Aktif</p>
                </div>
                <div class="icon">
                    <i class="fa fa-calendar"></i>
                </div>
                <a href="<?php echo site_url('jadwal'); ?>" class="ajaxify small-box-footer klik">Lihat data <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

	

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                    <h3 class="box-title">Ulang Tahun Siswa</h3>
                </div>

                <div class="box-body">
                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Tanggal Lahir</th>
                                <th>No. Telepon/WA</th>
                                <th>Tempat Daftar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
							$no=1;
							foreach($ultah as $ultahsiswa){
							    $id_siswa = $ultahsiswa->id_siswa;
							    $sql = $this->db->query("SELECT * FROM tbl_pendaftaran WHERE id_siswa = '$id_siswa' ORDER BY id_pendaftaran DESC LIMIT 1");
							    $tempat = $sql->row();
						?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $ultahsiswa->nama_siswa ?></td>
                                 <td><?php echo $ultahsiswa->alamat ?></td>
                                
                                <td><?php echo date('d-m-Y',strtotime($ultahsiswa->tanggal_lahir)); ?></td>
                                <td><?php echo $ultahsiswa->telepon ?></td>
                                <td><?php echo $tempat->tempat_daftar ?></td>
                            </tr>
                            <?php
							$no++;
							}
						?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                    <h3 class="box-title">Ulang Tahun Karyawan</h3>
                </div>

                <div class="box-body">
                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>No. Telepon/WA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
							$no=1;
							foreach($ultahk as $ultahkaryawan){
						?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $ultahkaryawan->nama_karyawan ?></td>
                                <td><?php echo date('d-m-Y',strtotime($ultahkaryawan->tanggal_lahir)); ?></td>
                                <td><?php echo $ultahkaryawan->telepon ?></td>
                            </tr>
                            <?php
							$no++;
							}
						?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                    <h3 class="box-title">Jadwal Kursus</h3>
                </div>

                <div class="box-body">
                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Hari</th>
                                <th>Tentor</th>
                                <th>Siswa</th>
                                <th>Bidang Studi</th>
                                <th>Jam</th>
                                <th>Tempat</th>
                            </tr>
                        </thead>
                        <tbody>
                         
                        <?php
								$row = 0;
								foreach($jadwal_aktif as $jumlahdata){
									$id_kelas = $jumlahdata->id_kelas;
									$query = $this->db->query("SELECT * FROM tbl_detail_jadwal WHERE id_kelas = '$id_kelas' AND hari = 'Senin'");
									$detail_jadwal = $query->result();
									foreach($detail_jadwal as $jumlahharisenin)										
									{
										$row++;
									}
								}
								$cols=1;
								foreach($jadwal_aktif as $data){
									$id_kelas = $data->id_kelas;
									$id_pendaftaran = $data->id_pendaftaran;
									$pendaftaran = $this->db->query("SELECT * FROM tbl_pendaftaran a, tbl_bidang_studi b WHERE id_pendaftaran = '$id_pendaftaran' AND a.id_bidang_studi = b.id_bidang_studi");
									$bidang_studi = $pendaftaran->row()->nama_bidang_studi;
									
									$query = $this->db->query("SELECT * FROM tbl_detail_jadwal WHERE id_kelas = '$id_kelas' AND hari = 'Senin'");
									$detail_jadwal = $query->result();
									foreach($detail_jadwal as $datadetailjadwal)										
									{
										echo "<tr>";
										if($cols==1){
										echo "<td rowspan=".$row."> <strong>".$datadetailjadwal->hari."</strong></td>";
										}
										echo "<td>".$data->nama_tentor."</td>";
										echo "<td>".$data->nama_siswa."</td>";
										echo "<td>".$bidang_studi."</td>";
										echo "<td>".$datadetailjadwal->jam_mulai." </td>";
										echo "<td>".$data->ruang."</td>";
										echo "</tr>";
										$cols++;
									}
								}
								
						?>
						
						<?php
								$row = 0;
								foreach($jadwal_aktif as $jumlahdata){
									$id_kelas = $jumlahdata->id_kelas;
									$query = $this->db->query("SELECT * FROM tbl_detail_jadwal WHERE id_kelas = '$id_kelas' AND hari = 'Selasa'");
									$detail_jadwal = $query->result();
									foreach($detail_jadwal as $jumlahharisenin)										
									{
										$row++;
									}
								}
								$cols=1;
								foreach($jadwal_aktif as $data){
									$id_kelas = $data->id_kelas;
									$id_pendaftaran = $data->id_pendaftaran;
									$pendaftaran = $this->db->query("SELECT * FROM tbl_pendaftaran a, tbl_bidang_studi b WHERE id_pendaftaran = '$id_pendaftaran' AND a.id_bidang_studi = b.id_bidang_studi");
									$bidang_studi = $pendaftaran->row()->nama_bidang_studi;
									
									$query = $this->db->query("SELECT * FROM tbl_detail_jadwal WHERE id_kelas = '$id_kelas' AND hari = 'Selasa'");
									$detail_jadwal = $query->result();
									foreach($detail_jadwal as $datadetailjadwal)										
									{
										echo "<tr>";
										if($cols==1){
										echo "<td rowspan=".$row."> <strong>".$datadetailjadwal->hari."</strong></td>";
										}
										echo "<td>".$data->nama_tentor."</td>";
										echo "<td>".$data->nama_siswa."</td>";
										echo "<td>".$bidang_studi."</td>";
										echo "<td>".$datadetailjadwal->jam_mulai." </td>";
										echo "<td>".$data->ruang."</td>";
										echo "</tr>";
										$cols++;
									}
								}
								
						?>
						
						<?php
								$row = 0;
								foreach($jadwal_aktif as $jumlahdata){
									$id_kelas = $jumlahdata->id_kelas;
									$query = $this->db->query("SELECT * FROM tbl_detail_jadwal WHERE id_kelas = '$id_kelas' AND hari = 'Rabu'");
									$detail_jadwal = $query->result();
									foreach($detail_jadwal as $jumlahharisenin)										
									{
										$row++;
									}
								}
								$cols=1;
								foreach($jadwal_aktif as $data){
									$id_kelas = $data->id_kelas;
									$id_pendaftaran = $data->id_pendaftaran;
									$pendaftaran = $this->db->query("SELECT * FROM tbl_pendaftaran a, tbl_bidang_studi b WHERE id_pendaftaran = '$id_pendaftaran' AND a.id_bidang_studi = b.id_bidang_studi");
									$bidang_studi = $pendaftaran->row()->nama_bidang_studi;
									
									$query = $this->db->query("SELECT * FROM tbl_detail_jadwal WHERE id_kelas = '$id_kelas' AND hari = 'Rabu'");
									$detail_jadwal = $query->result();
									foreach($detail_jadwal as $datadetailjadwal)										
									{
										echo "<tr>";
										if($cols==1){
										echo "<td rowspan=".$row."> <strong>".$datadetailjadwal->hari."</strong></td>";
										}
										echo "<td>".$data->nama_tentor."</td>";
										echo "<td>".$data->nama_siswa."</td>";
										echo "<td>".$bidang_studi."</td>";
										echo "<td>".$datadetailjadwal->jam_mulai." </td>";
										echo "<td>".$data->ruang."</td>";
										echo "</tr>";
										$cols++;
									}
								}
								
						?>
						
						<?php
								$row = 0;
								foreach($jadwal_aktif as $jumlahdata){
									$id_kelas = $jumlahdata->id_kelas;
									$query = $this->db->query("SELECT * FROM tbl_detail_jadwal WHERE id_kelas = '$id_kelas' AND hari = 'Kamis'");
									$detail_jadwal = $query->result();
									foreach($detail_jadwal as $jumlahharisenin)										
									{
										$row++;
									}
								}
								$cols=1;
								foreach($jadwal_aktif as $data){
									$id_kelas = $data->id_kelas;
									$id_pendaftaran = $data->id_pendaftaran;
									$pendaftaran = $this->db->query("SELECT * FROM tbl_pendaftaran a, tbl_bidang_studi b WHERE id_pendaftaran = '$id_pendaftaran' AND a.id_bidang_studi = b.id_bidang_studi");
									$bidang_studi = $pendaftaran->row()->nama_bidang_studi;
									
									$query = $this->db->query("SELECT * FROM tbl_detail_jadwal WHERE id_kelas = '$id_kelas' AND hari = 'Kamis'");
									$detail_jadwal = $query->result();
									foreach($detail_jadwal as $datadetailjadwal)										
									{
										echo "<tr>";
										if($cols==1){
										echo "<td rowspan=".$row."> <strong>".$datadetailjadwal->hari."</strong></td>";
										}
										echo "<td>".$data->nama_tentor."</td>";
										echo "<td>".$data->nama_siswa."</td>";
										echo "<td>".$bidang_studi."</td>";
										echo "<td>".$datadetailjadwal->jam_mulai." </td>";
										echo "<td>".$data->ruang."</td>";
										echo "</tr>";
										$cols++;
									}
								}
								
						?>
						
						<?php
								$row = 0;
								foreach($jadwal_aktif as $jumlahdata){
									$id_kelas = $jumlahdata->id_kelas;
									$query = $this->db->query("SELECT * FROM tbl_detail_jadwal WHERE id_kelas = '$id_kelas' AND hari = 'Jumat'");
									$detail_jadwal = $query->result();
									foreach($detail_jadwal as $jumlahharisenin)										
									{
										$row++;
									}
								}
								$cols=1;
								foreach($jadwal_aktif as $data){
									$id_kelas = $data->id_kelas;
									$id_pendaftaran = $data->id_pendaftaran;
									$pendaftaran = $this->db->query("SELECT * FROM tbl_pendaftaran a, tbl_bidang_studi b WHERE id_pendaftaran = '$id_pendaftaran' AND a.id_bidang_studi = b.id_bidang_studi");
									$bidang_studi = $pendaftaran->row()->nama_bidang_studi;
									
									$query = $this->db->query("SELECT * FROM tbl_detail_jadwal WHERE id_kelas = '$id_kelas' AND hari = 'Jumat'");
									$detail_jadwal = $query->result();
									foreach($detail_jadwal as $datadetailjadwal)										
									{
										echo "<tr>";
										if($cols==1){
										echo "<td rowspan=".$row."> <strong>".$datadetailjadwal->hari."</strong></td>";
										}
										echo "<td>".$data->nama_tentor."</td>";
										echo "<td>".$data->nama_siswa."</td>";
										echo "<td>".$bidang_studi."</td>";
										echo "<td>".$datadetailjadwal->jam_mulai." </td>";
										echo "<td>".$data->ruang."</td>";
										echo "</tr>";
										$cols++;
									}
								}
								
						?>
						
						<?php
								$row = 0;
								foreach($jadwal_aktif as $jumlahdata){
									$id_kelas = $jumlahdata->id_kelas;
									$query = $this->db->query("SELECT * FROM tbl_detail_jadwal WHERE id_kelas = '$id_kelas' AND hari = 'Sabtu'");
									$detail_jadwal = $query->result();
									foreach($detail_jadwal as $jumlahharisenin)										
									{
										$row++;
									}
								}
								$cols=1;
								foreach($jadwal_aktif as $data){
									$id_kelas = $data->id_kelas;
									$id_pendaftaran = $data->id_pendaftaran;
									$pendaftaran = $this->db->query("SELECT * FROM tbl_pendaftaran a, tbl_bidang_studi b WHERE id_pendaftaran = '$id_pendaftaran' AND a.id_bidang_studi = b.id_bidang_studi");
									$bidang_studi = $pendaftaran->row()->nama_bidang_studi;
									
									$query = $this->db->query("SELECT * FROM tbl_detail_jadwal WHERE id_kelas = '$id_kelas' AND hari = 'Sabtu'");
									$detail_jadwal = $query->result();
									foreach($detail_jadwal as $datadetailjadwal)										
									{
										echo "<tr>";
										if($cols==1){
										echo "<td rowspan=".$row."> <strong>".$datadetailjadwal->hari."</strong></td>";
										}
										echo "<td>".$data->nama_tentor."</td>";
										echo "<td>".$data->nama_siswa."</td>";
										echo "<td>".$bidang_studi."</td>";
										echo "<td>".$datadetailjadwal->jam_mulai." </td>";
										echo "<td>".$data->ruang."</td>";
										echo "</tr>";
										$cols++;
									}
								}
								
						?>
						
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div id="report_studi"></div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div id="report_jk"></div>
			</div>
		</div>
	</div>
	
    <div id="report"></div>


</section>
<!--js google chart-->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<!-- JS Google Chart -->
<script src="https://www.gstatic.com/charts/loader.js"></script>
<!-- highchart -->
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/highchart/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/highchart/modules/exporting.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/highchart/modules/offline-exporting.js"></script>

<?php
        foreach($pendaftar as $data){
            $tanggal[] = date('d-m-Y',strtotime($data->tanggal_pendaftaran));
			$daftar1[] = (float) $data->id_pendaftaran;
          
        }
    ?>

<script>
jQuery(function() {
    new Highcharts.Chart({
        chart: {
            renderTo: 'report',
            // type: 'line',
            type: 'column',
        },
        title: {
            text: 'Grafik Pendaftaran Siswa',
            x: -20
        },
        xAxis: {
            categories: <?php echo json_encode($tanggal);?>
        },
        yAxis: {
            title: {
                text: 'Siswa '
            }
        },
        series: [{
            name: 'Calon Siswa ',
            data: <?php echo json_encode($daftar1); ?>
        }]
    });
});
</script>

<script>
// Animasi angka bergerak dashboard

$('.count').each(function() {
    $(this).prop('Counter', 0).animate({
        Counter: $(this).text()
    }, {
        duration: 1000,
        easing: 'swing',
        step: function(now) {
            $(this).text(Math.ceil(now));
        }
    });
});
</script>


<!-- Jurusan -->
<?php
        foreach($bidang_s as $data){
            $nama_studi[] = $data->nama_bidang_studi;
			$studi1[] = (float) $data->id_pendaftaran;
          
        }
    ?>

<script>
jQuery(function() {
    new Highcharts.Chart({
        chart: {
            renderTo: 'report_studi',
            // type: 'line',
            type: 'column',
        },
        title: {
            text: 'Grafik Pendaftaran Siswa',
            x: -20
        },
        xAxis: {
            categories: <?php echo json_encode($nama_studi);?>
        },
        yAxis: {
            title: {
                text: 'Siswa '
            }
        },
        series: [{
            name: 'Calon Siswa ',
            data: <?php echo json_encode($studi1); ?>
        }]
    });
});
</script>


<!-- Pie Chart -->
<?php
        foreach($jenkel as $data){
            $jenis_kelamin[] = $data->nama_bidang_studi;
			$jenkel1[] = (float) $data->id_pendaftaran;
          
        }
    ?>
	

<script>
jQuery(function() {
    $('#report_jk').highcharts({
        chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
		},
        title: {
            text: 'Grafik Jenis Kelamin Siswa'
        },
        
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>',
					style: {
						color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
					}
				}
			}
		},
		series: [{
			type: 'pie',
			name: 'Jumlah',
			data: [
					<?php 
					// data yang diambil dari database
					if(count($jenkel)>0)
					{
					   foreach ($jenkel as $data) {
					   echo "['" .$data->jenis_kelamin . "'," . $data->total ."],\n";
					   }
					}
					?>
			]
		}]
    });
});
</script>