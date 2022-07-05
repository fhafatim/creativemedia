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
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Pendaftaran Kursus<font color="red"> *
                                    </font></label>
                            <div class="col-sm-3">
                                <select name="pendaftaran_kursus" id="pendaftaran_kursus"
                                    class="form-control select-pendaftaran-kursus">
                                    <option value=""></option>

                                    <?php
											foreach ($pembayaran as $datapendaftaran) {
										?>
                                    <option value="<?php echo $datapendaftaran->id_pendaftaran ; ?>">
                                        <?php 
                                        if ($datapendaftaran->id_bidang_studi=='16') {
                                            echo $datapendaftaran->no_pendaftaran.' - '.$datapendaftaran->nama_siswa.' - '.$datapendaftaran->keterangan.' '.$datapendaftaran->nama_level_kelas;
                                        }else{
                                            echo $datapendaftaran->no_pendaftaran.' - '.$datapendaftaran->nama_siswa.' - '.$datapendaftaran->nama_bidang_studi.' '.$datapendaftaran->nama_level_kelas;
                                        }
                                         ?>
                                    </option>
                                    <?php
											}
										?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Tagihan</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" placeholder="Jumlah Tagihan" name="harga_kursus"
                                    id="harga_kursus" aria-describedby="sizing-addon2" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Sisa Tagihan</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" placeholder="Sisa Tagihan" name="sisa_tagihan"
                                    id="sisa_tagihan" aria-describedby="sizing-addon2" readonly>
                            </div>
                        </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Pembayaran<font color="red"> *
                                    </font></label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" placeholder="Tanggal Pembayaran" autocomplete="off"
                                name="tanggal_pembayaran" id="tanggal_pembayaran" aria-describedby="sizing-addon2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jenis Pembayaran<font color="red"> *
                                    </font></label>
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
                        <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Pembayaran<font color="red"> *
                                    </font></label>
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
                        <label class="col-sm-2 control-label">Kategori Pembayaran<font color="red"> *
                                    </font></label>
                        <div class="col-sm-3">
                            <select name="kategori_pembayaran" id="kategori_pembayaran" class="form-control select-kategori-invoice">
                                <option></option>
                                <option value="uang muka"> Uang Muka </option>
                                <option value="angsuran"> Angsuran </option>
                                <option value="pelunasan"> Pelunasan </option>
                            </select>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label">Tempat Pembayaran<font color="red"> *
                                    </font></label>
                        <div class="col-sm-3">
                            <select name="tempat_pembayaran" id="tempat_pembayaran" class="form-control select-tempat-pembayaran">
                                <option></option>
                                <option value="tubanan"> Tubanan </option>
                                <option value="nginden"> Nginden </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Kode Pembayaran</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Kode Pembayaran" name="kode_pembayaran" id="kode_pembayaran"
                                aria-describedby="sizing-addon2" autocomplete="off" value="">
                        </div>
                    </div>

                    <div class="box-footer">
                        <button name="simpan" type="submit" id="form-tambah" class="btn btn-success btn-flat"><i
                                class="fa fa-save"></i> Simpan</button>
                        <a class="klik ajaxify" href="<?php echo site_url('pembayaran'); ?>"><button
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
$(document).ready(function() {

    $('#pendaftaran_kursus').change(function() {
        var id = $(this).val();
        console.log(id);
        $.ajax({
            method: 'POST',
            url: "<?php echo site_url('Master/Pembayaran/get_harga_kursus');?>",
            data: {
                id_pendaftaran: id
            },
            async: true,
        }).done(function(data) {
            var result = jQuery.parseJSON(data);
            var html = '';
            html += 'harga_kursus';
            $("#harga_kursus").val(result.harga_kursus);
            $("#sisa_tagihan").val(result.sisa);
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

$(document).ready(function() {

    $('#tempat_pembayaran').change(function() {
        var tempat = $("#tempat_pembayaran").val(); 
        if(tempat == 'tubanan'){
            $("#kode_pembayaran").val("<?php echo $kode_tubanan; ?>");
        } else {
            $("#kode_pembayaran").val("<?php echo $kode_nginden; ?>");
        }
        
    });

});

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

    var pendaftaran_kursus = $("#pendaftaran_kursus").val();
    var pendaftaran_kursus = pendaftaran_kursus.trim();
    console.log(data);
    if (error == 0) {
        if (pendaftaran_kursus.length == 0) {
            error++;
            message = "Pendaftaran Kursus Wajib Diisi";
        }
    }

    var tanggal_pembayaran = $("#tanggal_pembayaran").val();
    var tanggal_pembayaran = tanggal_pembayaran.trim();

    if (error == 0) {
        if (tanggal_pembayaran.length == 0) {
            error++;
            message = "Tanggal Pembayaran Wajib Diisi";
        }
    }

     var jenis_pembayaran = $("#jenis_pembayaran").val();
     var jenis_pembayaran = jenis_pembayaran.trim();

     if (error == 0) {
     	if (jenis_pembayaran.length == 0) {
     		error++;
     		message = "Data Pembayaran : Jenis Pembayaran Wajib Diisi";
     	}
     }
	 
	 var kategori_pembayaran = $("#kategori_pembayaran").val();
     var kategori_pembayaran = kategori_pembayaran.trim();

     if (error == 0) {
     	if (kategori_pembayaran.length == 0) {
     		error++;
     		message = "Data Pembayaran : Kategori Pembayaran Wajib Diisi";
     	}
     }
	 
	 var tempat_pembayaran = $("#tempat_pembayaran").val();
     var tempat_pembayaran = tempat_pembayaran.trim();

     if (error == 0) {
     	if (tempat_pembayaran.length == 0) {
     		error++;
     		message = "Data Pembayaran : Tempat Pembayaran Wajib Diisi";
     	}
     }

    var nominal = $("#nominal").val();
    var nominal = nominal.trim();

    if (error == 0) {
        if (nominal.length == 0) {
            error++;
            message = "Data Pembayaran : Jumlah Pembayaran Wajib Diisi";
        }
    }

    // var nominal = $("#nominal").val();

    // var data_total_bayar = parseInt(<?= $datapendaftaran->harga_kursus ?>) - parseInt(nominal);
    // var reverse          = data_total_bayar.toString().split('').reverse().join(''),
    // ribuan_total         = reverse.match(/\d{1,3}/g);
    // ribuan_total         = ribuan_total.join('.').split('').reverse().join('');
    // $("#sisa_tagihan").html("Rp." + ribuan_total);
    // console.log(sisa_tagihan);


    if (error == 0) {
        $.ajax({
                method: 'POST',
                beforeSend: function() {
                    $(".loading2").show();
                    $(".loading2").modal('show');
                },
                url: '<?php echo site_url('Master/Pembayaran/prosesTambah'); ?>',
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