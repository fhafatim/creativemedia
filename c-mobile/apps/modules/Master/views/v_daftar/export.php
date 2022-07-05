<?php 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<center>
    <h2>Data Pendaftaran</h2>
</center>

<br><br>

<table border="1" width="100%">
    <thead>
        <tr>
            <th align="center">No</th>
            <th align="center">Nomor Pendaftaran</th>
            <th align="center">Nama Lengkap</th>
            <th align="center">Jenis Kelamin</th>
            <th align="center">NIK</th>
            <th align="center">Tempat Lahir</th>
            <th align="center">Tanggal Lahir</th>
            <th align="center">Agama</th>
            <th align="center">Jenis Tinggal</th>
            <th align="center">Nomor Telepon/WA</th>
            <th align="center">Email</th>
            <th align="center">Alamat</th>
            <th align="center">Kota</th>
            <th align="center">Kode Pos</th>
            <th align="center">Provinsi</th>
            <th align="center">Warga negara</th>
            <th align="center">Pendidikan Terakhir</th>
            <th align="center">Nama Ayah</th>
            <th align="center">Nama Ibu</th>
            <th align="center">Alamat Ayah</th>
            <th align="center">Alamat Ibu</th>
            <th align="center">NIK Ayah</th>
            <th align="center">NIK Ibu</th>
            <th align="center">Pekerjaan Ayah</th>
            <th align="center">Pekerjaan Ibu</th>
            <th align="center">Pendidikan Ayah</th>
            <th align="center">Pendidikan Ibu</th>
            <th align="center">Tempat Lahir Ayah</th>
            <th align="center">Tempat Lahir Ibu</th>
            <th align="center">Tanggal Lahir Ayah</th>
            <th align="center">Tanggal Lahir Ibu</th>
            <th align="center">Penghasilan Ayah</th>
            <th align="center">Penghasilan Ibu</th>
            <th align="center">Telepon Ayah</th>
            <th align="center">Telepon Ibu</th>
            <th align="center">Email Ayah</th>
            <th align="center">Email Ibu</th>
            <th align="center">Foto Siswa</th>
            <th align="center">Bidang Studi</th>
            <th align="center">Kategori Kelas</th>
            <th align="center">Level Kelas</th>
            <th align="center">Harga Kursus</th>
            <th align="center">Tanggal Pendaftaran</th>
            <th align="center">Status Pendaftaran</th>
            <th align="center">Status Siswa</th>
        </tr>
    </thead>

    <tbody>
        <?php
	if (!empty($excel)) {
		$no = 1;
		foreach ($excel as $data) { 
		?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $data->no_pendaftaran ?></td>
            <td><?php echo $data->nama_siswa?></td>
            <td><?php echo $data->jenis_kelamin ?></td>
            <td><?php if($data->nik != ''){ echo "'".$data->nik; } ?></td>
            <td><?php echo $data->tempat_lahir ?></td>
            <td><?php echo $data->tanggal_lahir ?></td>
            <td><?php echo $data->agama ?></td>
            <td><?php echo $data->jenis_tinggal ?></td>
            <td><?php if($data->telepon != ''){ echo "'".$data->telepon; } ?></td>
            <td><?php echo $data->email ?></td>
            <td><?php echo $data->alamat ?></td>
            <td><?php echo $data->kota ?></td>
            <td><?php echo $data->kode_pos ?></td>
            <td><?php echo $data->provinsi ?></td>
            <td><?php echo $data->warga_negara ?></td>
            <td><?php echo $data->pendidikan_terakhir ?></td>
            <td><?php echo $data->nama_ayah ?></td>
            <td><?php echo $data->nama_ibu ?></td>
            <td><?php echo $data->alamat_ayah ?></td>
            <td><?php echo $data->alamat_ibu ?></td>
            <td><?php if($data->nik_ayah != ''){ echo "'".$data->nik_ayah; } ?></td>
            <td><?php if($data->nik_ibu != ''){ echo "'".$data->nik_ibu; } ?></td>
            <td><?php echo $data->pekerjaan_ayah ?></td>
            <td><?php echo $data->pekerjaan_ibu ?></td>
            <td><?php echo $data->pendidikan_ayah ?></td>
            <td><?php echo $data->pendidikan_ibu ?></td>
            <td><?php echo $data->tempat_lahir_ayah ?></td>
            <td><?php echo $data->tempat_lahir_ibu ?></td>
            <td><?php echo $data->tanggal_lahir_ayah ?></td>
            <td><?php echo $data->tanggal_lahir_ibu ?></td>
            <td><?php echo $data->penghasilan_ayah ?></td>
            <td><?php echo $data->penghasilan_ibu ?></td>
            <td><?php if($data->telepon_ayah != ''){ echo "'".$data->telepon_ayah; } ?></td>
            <td><?php if($data->telepon_ibu != ''){ echo "'".$data->telepon_ibu; } ?></td>
            <td><?php echo $data->email_ayah ?></td>
            <td><?php echo $data->email_ibu ?></td>
            <td><?php echo $data->gambar ?></td>
            <td><?php echo $data->nama_bidang_studi ?></td>
            <td><?php echo $data->nama_kategori_kelas ?></td>
            <td><?php echo $data->nama_level_kelas ?></td>
            <td><?php echo $data->harga_kursus ?></td>
            <td><?php echo date('d-m-Y',strtotime($data->tanggal_pendaftaran));?></td>
            <td><?php echo $data->status_pendaftaran ?></td>
            <td><?php echo $data->status_siswa ?></td>
        </tr>
        <?php $no++; } ?>

        <?php } else {  ?>

        <center><?php echo "Belum Ada data" ?></center>

        <?php } ?>
    </tbody>
</table><br>

<br><br>