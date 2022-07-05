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

<P class="p6 ft4">HALAMAN COBA</P>