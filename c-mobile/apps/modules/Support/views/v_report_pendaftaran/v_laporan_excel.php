<?php 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<center><h2>Report Pendafataran Siswa</h2></center>
<br>
<table>

<tbody>
	<?php
	if (!empty($excel)) {
	foreach ($excel as $data) { ?>
    <tr><td><b>Data Siswa</b></td></tr>
	<tr>
	<tr><td>Nama Siswa</td><td>:</td><td><?php echo $data->nama_depan ?> <?php echo $data->nama_belakang ?></td></tr>
	<tr><td>Jenis Kelamin</td><td>:</td><td><?php echo $data->jenis_kelamin ?></td></tr>
	<tr><td align="left">Handphone</td><td>:</td><td><?php echo $data->handphone ?>&nbsp;</td></tr>
	<tr><td>Email</td><td>:</td><td><?php echo $data->email ?></td></tr>
	<tr><td>Alamat</td><td>:</td><td><?php echo $data->alamat ?></td></tr>
	<tr><td>Kota</td><td>:</td><td><?php echo $data->kota ?></td></tr>
	<tr><td>Pendidikan</td><td>:</td><td><?php echo $data->pendidikan_terakhir ?></td></tr>
	<tr><td>Bidang Studi</td><td>:</td><td><?php echo $data->bidang_studi ?></td></tr>
	<tr>
	<tr><td><b>Data Ayah</b></td></tr>
	<tr>
	<tr><td>Nama Ayah</td><td>:</td><td><?php echo $data->nama_ayah ?></td></tr>
	<tr><td>Alamat</td><td>:</td><td><?php echo $data->alamat_ayah ?></td></tr>
	<tr><td>KTP</td><td>:</td><td><?php echo $data->ktp_ayah ?></td></tr>
	<tr><td>Pekerjaan</td><td>:</td><td><?php echo $data->pekerjaan_ayah ?></td></tr>
	<tr><td>Tempat/Tgl Lahir</td><td>:</td><td><?php echo $data->tempat_lahir_ayah ?></td><td><?php echo $data->tggal_lahir_ayah ?></td></tr>
	<tr><td>Penghasilan/Bln</td><td>:</td><td><?php echo $data->penghasilan_ayah ?></td></tr>
	<tr><td align="left">Handphone</td><td>:</td><td><?php echo $data->telpon_ayah ?>&nbsp;</td></tr>
	<tr><td>Email</td><td>:</td><td><?php echo $data->email_ayah ?></td></tr>
	<tr>
	<tr><td><b>Data Ibu</b></td></tr>
	<tr>
	<tr><td>Nama Ibu</td><td>:</td><td><?php echo $data->nama_ibu ?></td></tr>
	<tr><td>Alamat</td><td>:</td><td><?php echo $data->alamat_ibu ?></td></tr>
	<tr><td>KTP</td><td>:</td><td><?php echo $data->ktp_ibu ?></td></tr>
	<tr><td>Pekerjaan</td><td>:</td><td><?php echo $data->pekerjaan_ibu ?></td></tr>
	<tr><td>Tempat/Tgl Lahir</td><td>:</td><td><?php echo $data->tempat_lahir_ibu ?></td><td><?php echo $data->tggal_lahir_ibu ?></td></tr>
	<tr><td>Penghasilan/Bln</td><td>:</td><td><?php echo $data->penghasilan_ibu ?></td></tr>
	<tr><td align="left">Handphone</td><td>:</td><td><?php echo $data->telpon_ibu ?>&nbsp;</td></tr>
	<tr><td>Email</td><td>:</td><td><?php echo $data->email_ibu ?></td></tr>
	
    <tr><tr><tr>
    <?php  } ?>
	<?php } else {  ?>
	<center><?php echo "Belum Ada data" ?></center>
	<?php } ?>
</tbody>
</table>




