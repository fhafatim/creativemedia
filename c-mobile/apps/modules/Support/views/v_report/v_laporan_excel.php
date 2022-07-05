<?php 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<center><h2>Report Data Siswa</h2></center>
<br>
<table border="1" width="80%">

<thead>
   <tr>
   <th align="center">No</th>
   <th align="center">Tanggal Pendaftaran</th>
   <th align="center">Nama</th>
   <th align="center">Alamat</th>
   <th align="center">Jenis Kelamin</th>
   <th align="center">Handphone</th>
   <th align="center">Bidang Studi</th>
   <th align="center">Level</th>
   <th align="center">Tempat Daftar</th>
   </tr>
 </thead>


<tbody>
	<?php
	if (!empty($excel)) {
	$no = 1;
	foreach ($excel as $data) { ?>
    <tr>
	<td><?php echo $no ?></td>
	<td><?php echo date('d-m-Y',strtotime($data->tanggal_pendaftaran)); ?></td>
	<td><?php echo $data->nama_siswa ?></td>
	<td><?php echo $data->alamat ?></td>
	<td><?php echo $data->jenis_kelamin ?></td>
	<td><?php echo $data->telepon ?></td>
	<td><?php echo $data->nama_bidang_studi ?></td>
	<td><?php echo $data->nama_level_kelas ?></td>
	<td><?php echo $data->tempat_daftar ?></td>
	</tr>
    <?php $no++; } ?>
	<?php } else {  ?>
	<center><?php echo "Belum Ada data" ?></center>
	<?php } ?>
</tbody>
</table>




