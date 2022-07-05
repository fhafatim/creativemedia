<?php $this->load->view('_heading/_headerContent') ?>

<style>
#osas {
    color: red;
    font-weight: bold;
    margin-left: 0px;
}

.selek-penghasilan {
    width: 150px;
}

.selek-pendidikan2 {
    width: 150px;
}

.selek-studi {
    width: 200px;
}

.select-level {
    width: 200px;
}

.select-kategori-kelas {
    width: 200px;
}
</style>

<section class="content">
    <!-- style loading -->
    <div class="loading2"></div>
    <!-- -->
    <div class="box">
        <form class="form-horizontal" id="tambah_bayar" method="POST">
            <input type="hidden" name="created_by" value="<?php echo $userdata->nama; ?>">
			<input type="hidden" name="nama_siswa" id="nama_siswa"/>
			<input type="hidden" name="nama_tentor" id="nama_tentor"/>
			<input type="hidden" name="bidang_studi" id="bidang_studi"/>
			<input type="hidden" name="no_pendaftaran" id="no_pendaftaran"/>
			<input type="hidden" name="tanggal_selesai" id="tanggal_selesai"/>
			<input type="hidden" name="id_kelas" id="id_kelas"/>
			<input type="hidden" name="jumlah_honor2" id="jumlah_honor2"/>
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kursus</label>
                            <div class="col-sm-3">
                                <select name="pendaftaran_kursus" id="pendaftaran_kursus"
                                    class="form-control select-pendaftaran-kursus">
                                    <option value=""></option>

                                    <?php
											foreach ($kursus as $datakursus) {
										?>
											<option value="<?php echo $datakursus->id_kelas ; ?>">
												<?php echo $datakursus->id_kelas.' - '.$datakursus->nama_tentor.' - '.$datakursus->nama_siswa ?>
											</option>
                                    <?php
											}
										?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Honor</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" placeholder="Jumlah Honor" name="jumlah_honor"
                                    id="jumlah_honor" aria-describedby="sizing-addon2" onchange="honor()">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Sisa Honor</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" placeholder="Sisa Honor" name="sisa_honor"
                                    id="sisa_honor" aria-describedby="sizing-addon2" readonly>
                            </div>
                        </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Pembayaran</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" placeholder="Tanggal Pembayaran" autocomplete="off"
                                name="tanggal_pembayaran" id="tanggal_pembayaran" aria-describedby="sizing-addon2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jenis Pembayaran</label>
                        <div class="col-sm-3">
                            <select name="jenis_pembayaran" id="jenis_pembayaran" class="form-control select-jenis-pembayaran"
                                onchange="disable_enable(this.value)">
                                <option></option>
                                <option value="tunai"> Tunai </option>
                                <option value="transfer"> Transfer </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Pembayaran</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Jumlah Pembayaran" name="nominal"
                                id="nominal" aria-describedby="sizing-addon2" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Dari Bank</label>
                        <div class="col-sm-3">
                            <select name="bank" class="form-control select-bank">
                                <option></option>
								<?php
									foreach($bank as $databank)
									{
								?>
									<option value="<?php echo $databank->name ?>"> <?php echo $databank->name ?> </option>
								<?php
									}
								?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Nomor Rekening</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Nomor Rekening" name="nomor_rekening"
                                aria-describedby="sizing-addon2" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Atas Nama</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Atas Nama" name="atas_nama"
                                aria-describedby="sizing-addon2" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Kategori Pembayaran</label>
                        <div class="col-sm-3">
                            <select name="kategori_pembayaran" id="kategori_pembayaran" class="form-control select-kategori-invoice">
                                <option></option>
                                <option value="setengah"> Setengah </option>
                                <option value="semua"> Semua </option>
                            </select>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label">Tempat Pembayaran</label>
                        <div class="col-sm-3">
                            <select name="tempat_pembayaran" id="tempat_pembayaran" class="form-control select-tempat-pembayaran">
                                <option></option>
                                <option value="tubanan"> Tubanan </option>
                                <option value="nginden"> Nginden </option>
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button name="simpan" type="submit" id="form-tambah" class="btn btn-success btn-flat"><i
                                class="fa fa-save"></i> Simpan</button>
                        <a class="klik ajaxify" href="<?php echo site_url('honor'); ?>"><button
                                class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> Kembali</button></a>
                    </div>

                </div>
            </div>
    </div>
    </form>
    </div>
</section>

</script>
<script type="text/javascript">
function honor(){
	var jumlah_honor = $("#jumlah_honor").val();
	$("#sisa_honor").val(jumlah_honor);
}

$(document).ready(function() {

    $('#pendaftaran_kursus').change(function() {
        var id = $(this).val();
        console.log(id);
        $.ajax({
            method: 'POST',
            url: "<?php echo site_url('Category/Honor/get_honor');?>",
            data: {
                id_kelas: id
            },
            async: true,
        }).done(function(data) {
            var result = jQuery.parseJSON(data);
            var html = '';
            html += 'harga_kursus';
			if(result.jumlah_honor > 0){
				$("#jumlah_honor").attr('disabled','disabled');
				$("#jumlah_honor").val(result.jumlah_honor);
				$("#sisa_honor").val(result.sisa);
				$("#nama_siswa").val(result.siswa);
				$("#nama_tentor").val(result.tentor);
				$("#bidang_studi").val(result.bidang_studi);
				$("#no_pendaftaran").val(result.pendaftaran);
				$("#tanggal_selesai").val(result.tanggal_selesai);
				$("#id_kelas").val(result.id_kelas);
				$("#jumlah_honor2").val(result.jumlah_honor);
			} else {
				$("#jumlah_honor").val(result.jumlah_honor);
				$("#sisa_honor").val(result.sisa);
				$("#nama_siswa").val(result.siswa);
				$("#nama_tentor").val(result.tentor);
				$("#bidang_studi").val(result.bidang_studi);
				$("#no_pendaftaran").val(result.pendaftaran);
				$("#tanggal_selesai").val(result.tanggal_selesai);
				$("#id_kelas").val(result.id_kelas);
			}
            
        });
		

        /*
					$.ajax({
						url : "<?php echo site_url('Master/Pembayaran/get_harga_kursus');?>",
						method : "POST",
						data : {id_pendaftaran: id},
						async : true,
						dataType : 'json',
						success: function(data){
							//var obj = JSON.parse(data);
							var obj = jQuery.parseJSON(data);
							//var html = '';
							//	html += 'harga_kursus';
							//console.log(data);

							$("#harga_kursus").val(obj.harga_kursus);
	
						}
					});*/
        return false;
    });

});
document.onload = disable_enable();

function disable_enable(pilihan) {

    if (pilihan == "tunai" || document.forms[0].jenis_pembayaran.value == "tunai") {

        document.forms[0].bank.disabled = true;
        document.forms[0].atas_nama.disabled = true;
        document.forms[0].nomor_rekening.disabled = true;
    } else {
        document.forms[0].bank.disabled = false;
		document.forms[0].atas_nama.disabled = false;
        document.forms[0].nomor_rekening.disabled = false;
	}
}

/*
$("#nominal").keyup(function(){
	var nominal = $("#nominal").val();
	var nominal = nominal.trim();

	// var nominal = $("#nominal").val();

	var data_total_bayar = parseInt(<?= $datapendaftaran->harga_kursus ?>) - parseInt(nominal);
	$("#sisa_tagihan_value").val(data_total_bayar);
	var reverse          = data_total_bayar.toString().split('').reverse().join(''),
	ribuan_total         = reverse.match(/\d{1,3}/g);
	ribuan_total         = ribuan_total.join('.').split('').reverse().join('');
	$("#sisa_tagihan").html("Rp." + ribuan_total);
				console.log(sisa_tagihan);
})
*/

$('#tambah_bayar').submit(function(e) {

    var error = 0;
    var message = "";
    var data = $(this).serialize();

    
    if (error == 0) {
        $.ajax({
                method: 'POST',
                beforeSend: function() {
                    $(".loading2").show();
                    $(".loading2").modal('show');
                },
                url: '<?php echo site_url('Category/Honor/prosesTambah'); ?>',
                data: data,
            })
            .done(function(data) {
                var result = jQuery.parseJSON(data);
                if (result.status == 'berhasil')

                {
                    document.getElementById("tambah_bayar").reset();
                    $(".loading2").hide();
                    $(".loading2").modal('hide');
                    save_berhasil();
                    setTimeout(location.reload.bind(location), 450);
                } else

                {
                    $(".loading2").hide();
                    $(".loading2").modal('hide');
                    swal("Warning", result.pesan, "warning");
                }
            })

        e.preventDefault();
    } else {
        swal("Peringatan", message, "warning");
        return false;
    }

});
// console.log(status);


// untuk select2 ajak pilih menu
$(function() {
    $(".select-pendaftaran-kursus").select2({
        placeholder: " -- Pendaftaran Kursus -- "
    });
});

$(function() {
    $(".select-jenis-pembayaran").select2({
        placeholder: " -- Jenis Pembayaran -- "
    });
});

$(function() {
    $(".select-bank").select2({
        placeholder: " -- Nama BANK -- "
    });
});

$(function() {
    $(".select-kategori-invoice").select2({
        placeholder: " -- Kategori Pembayaran -- "
    });
});
$(function() {
    $(".selek-jumlahtagihan").select2({
        placeholder: " -- Jumlah Tagihan -- ",
        allowClear: true
    });
});


$(function() {
    $(".select-tempat-pembayaran").select2({
        placeholder: " -- Tempat Pembayaran -- "
    });
});

// untuk select2 ajak pilih menu
$(function() {
    $(".selek-idpendaftaran").select2({
        placeholder: " -- Id Pendaftaran -- ",
        allowClear: true
    });
});


// untuk datetime from
$(function() {
    $("#tanggal_pembayaran").datepicker({
        orientation: "left",
        autoclose: !0,
        format: 'yyyy-mm-dd'
    })
});



//INPUT FORMAT RUPIAH
var rupiah = document.getElementById("nominal");
rupiah.addEventListener("keyup", function(e) {
  // tambahkan 'Rp.' pada saat form di ketik
  // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
  rupiah.value = formatRupiah(this.value, "Rp. ");
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}
</script>