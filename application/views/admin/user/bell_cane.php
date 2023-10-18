<?php echo br(2); ?>


<?php
$data = $this->session->flashdata('sukses');
if ($data != "") { ?>
    <div class="alert alert-success"><strong>Sukses! </strong> <?= $data; ?></div>
<?php } ?>
<?php
$data2 = $this->session->flashdata('error');
if ($data2 != "") { ?>
    <div class="alert alert-danger"><strong> Error! </strong> <?= $data2; ?></div>
<?php } ?>

<div class="" style="margin-bottom: 10px;margin-right:10px;">
    <table>
        <tr>
            <td>
                <select name="" id="pelatihan" class="" style="width: 200px;">
                    <option value="">Pilih Semua</option>
                    <?php foreach ($date as $dte) { ?>
                        <option value="<?php echo $dte['date'] ?>"><?php echo $dte['date'] ?></option>
                    <?php } ?>
                </select>
                <input type="hidden" id="kata" value="">
            </td>
        </tr>
    </table>
</div>

<div class="panel panel-primary border-radius">
    <div class="panel-heading header-radius">
        <h5 class="panel-title"><i class="icon-upload7"></i>Laporan Cane Harvester</h5>
    </div>

    <!-- DATATABLE FOR SUPERADMIN AND ADMIN -->
    <?php if (id_akses() != 3) { ?>
        <div class="panel-body add-margin-top" style="border-radius:20px">
            <table class="table table-bordered table-hover" id="data" style="border-radius:20px">
                <div class="button-data" style="margin-right: 135px;margin-top:2px">
                    <button type="button" onclick="show_modalTambah()" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary"><i class="icon-file-plus"></i> Tambah </button>
                </div>
                <thead>
                    <tr>
                        <th rowspan="3">DATE</th>
                        <th rowspan="3">KEBUN</th>
                        <th rowspan="3">NO UNIT</th>
                        <th colspan="4">
                            <center>JUMLAH TRIP TRUK</center>
                        </th>
                        <th colspan="3">
                            <center>JUMLAH HARIAN</center>
                        </th>
                        <th rowspan="3">
                            <center>OPSI</center>
                        </th>

                    </tr>
                    <tr>
                        <th colspan="2">
                            <center>BESAR</center>
                        </th>
                        <th colspan="2">
                            <center>KECIL</center>
                        </th>
                        <th colspan="3">
                            <center>TRIP/UNIT</center>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <center>HI</center>
                        </th>
                        <th>
                            <center>SD HI</center>
                        </th>
                        <th>
                            <center>HI</center>
                        </th>
                        <th>
                            <center>SD HI</center>
                        </th>
                        <th>
                            <center>HI</center>
                        </th>
                        <th>
                            <center>SD HI</center>
                        </th>
                        <th>
                            <center>RATAAN</center>
                        </th>

                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    <?php } ?>

    <!-- DATATABLE FOR USER -->
    <?php if (id_akses() == 3) { ?>
        <div class="panel-body add-margin-top" style="border-radius:20px">
            <table class="table table-bordered table-hover" id="data2" style="border-radius:20px">
                <thead>
                    <tr>
                        <th rowspan="3">DATE</th>
                        <th rowspan="3">KEBUN</th>
                        <th rowspan="3">NO UNIT</th>
                        <th colspan="4">
                            <center>JUMLAH TRIP TRUK</center>
                        </th>
                        <th colspan="3">
                            <center>JUMLAH HARIAN</center>
                        </th>

                    </tr>
                    <tr>
                        <th colspan="2">
                            <center>BESAR</center>
                        </th>
                        <th colspan="2">
                            <center>KECIL</center>
                        </th>
                        <th colspan="3">
                            <center>TRIP/UNIT</center>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <center>HI</center>
                        </th>
                        <th>
                            <center>SD HI</center>
                        </th>
                        <th>
                            <center>HI</center>
                        </th>
                        <th>
                            <center>SD HI</center>
                        </th>
                        <th>
                            <center>HI</center>
                        </th>
                        <th>
                            <center>SD HI</center>
                        </th>
                        <th>
                            <center>RATAAN</center>
                        </th>

                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    <?php } ?>
    <!-- MODAL EDIT -->
    <div class="row">
        <div class="modal fade" id="modalEdit">
            <div class="modal-dialog">
                <form action="<?php echo site_url('Dafar_Alat_Berat/edit'); ?>" id="edit" method="post">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h6 class="modal-title"><strong>Edit Data</strong></h6>
                        </div>
                        <div class="modal-body">
                            <input required type="hidden" id="id" name="id" autocomplete="off" class="form-control" hidden>

                            <div class="form-group">
                                <label class='col-md-3'>Tanggal</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="date" id="date" name="date" autocomplete="off" placeholder="Masukkan Judul Artikel" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>Kebun</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="kebun" name="kebun" autocomplete="off" placeholder="Masukkan Nama Kebun" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>Rayon</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="rayon" name="rayon" autocomplete="off" placeholder="Masukkan Nama Rayon" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>No Unit</label>
                                <div class='col-md-9' style="margin-bottom:10px"><input required type="text" id="no_unit" name="no_unit" autocomplete="off" placeholder="Masukkan No Unit" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-12' style="margin-bottom:10px">JUMLAH TRIP TRUK BESAR : </label>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">HI</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="hi_besar_jtt" name="hi_besar_jtt" autocomplete="off" placeholder="Masukkan HI Jumlah Trip Truk Besar" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">SD HI</label>
                                <div class='col-md-9' style="margin-bottom:10px"><input required type="text" id="sdhi_besar_jtt" name="sdhi_besar_jtt" autocomplete="off" placeholder="Masukkan SD HI Jumlah Trip Truk Besar" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label class='col-md-12' style="margin-bottom:10px">JUMLAH TRIP TRUK KECIL : </label>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">HI</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="hi_kecil_jtt" name="hi_kecil_jtt" autocomplete="off" placeholder="Masukkan HI Jumlah Trip Truk Kecil" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">SD HI</label>
                                <div class='col-md-9' style="margin-bottom:10px"><input required type="text" id="sdhi_kecil_jtt" name="sdhi_kecil_jtt" autocomplete="off" placeholder="Masukkan SD HI Jumlah Trip Truk Kecil" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label class='col-md-12' style="margin-bottom:10px">JUMLAH HARIAN TRIP/UNIT : </label>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">HI</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="hi_jh" name="hi_jh" autocomplete="off" placeholder="Masukkan HI Jumlah Harian Trip/Unit" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">SD HI</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="sdhi_jh" name="sdhi_jh" autocomplete="off" placeholder="Masukkan SD HI Jumlah Harian Trip/Unit" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">Rataan</label>
                                <div class='col-md-9' style="margin-bottom:10px"><input required type="text" id="rataan_jh" name="rataan_jh" autocomplete="off" placeholder="Masukkan Rataan Jumlah Harian Trip/Unit" class="form-control"></div>
                            </div>


                            <div class="form-group">
                                <label class='col-md-12' style="margin-bottom:10px">ESTIMASI TONASE DITEBANG (10 TON) : </label>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">HI</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="hi_10ton_etd" name="hi_10ton_etd" autocomplete="off" placeholder="Masukkan HI Estimasi Ditebang (10 TON)" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">SD HI</label>
                                <div class='col-md-9' style="margin-bottom:10px"><input required type="text" id="sdhi_10ton_etd" name="sdhi_10ton_etd" autocomplete="off" placeholder="Masukkan SD HI Estimasi Ditebang (10 TON)" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label class='col-md-12' style="margin-bottom:10px">ESTIMASI TONASE DITEBANG (7 TON) : </label>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">HI</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="hi_7ton_etd" name="hi_7ton_etd" autocomplete="off" placeholder="Masukkan HI Estimasi Ditebang (7 TON)" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">SD HI</label>
                                <div class='col-md-9' style="margin-bottom:10px"><input required type="text" id="sdhi_7ton_etd" name="sdhi_7ton_etd" autocomplete="off" placeholder="Masukkan SD HI Estimasi Ditebang (7 TON)" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label class='col-md-12' style="margin-bottom:10px">HM ALAT (EFEKTIF) : </label>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">HI</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="hi_efektif_hm" name="hi_efektif_hm" autocomplete="off" placeholder="Masukkan HI HM Alat (Efektif)" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">SD HI</label>
                                <div class='col-md-9' style="margin-bottom:10px"><input required type="text" id="sdhi_efektif_hm" name="sdhi_efektif_hm" autocomplete="off" placeholder="Masukkan SD HI HM Alat (Efektif)" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label class='col-md-12' style="margin-bottom:10px">HM ALAT (LOADING) : </label>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">HI</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="hi_loading_hm" name="hi_loading_hm" autocomplete="off" placeholder="Masukkan HI HM Alat (loading)" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">SD HI</label>
                                <div class='col-md-9' style="margin-bottom:10px"><input required type="text" id="sdhi_loading_hm" name="sdhi_loading_hm" autocomplete="off" placeholder="Masukkan SD HI HM Alat (loading)" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label class='col-md-12' style="margin-bottom:10px">PRESTASI TON/HM : </label>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">HI</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="hi_prestasi" name="hi_prestasi" autocomplete="off" placeholder="Masukkan HI Prestasi (TON/HM)" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">SD HI</label>
                                <div class='col-md-9' style="margin-bottom:10px"><input required type="text" id="sdhi_prestasi" name="sdhi_prestasi" autocomplete="off" placeholder="Masukkan SD HI Prestasi (TON/HM)" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label class='col-md-3'>Hari Kerja Efektif </label>
                                <div class='col-md-9' style="margin-bottom:10px"><input required type="text" id="hari_kerja_efektif" name="hari_kerja_efektif" autocomplete="off" placeholder="Masukkan Hari Kerja Efektif" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label class='col-md-12' style="margin-bottom:10px">WAKTU MUAT : </label>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">Waktu Mulai</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="waktu_mulai" name="waktu_mulai" autocomplete="off" placeholder="Masukkan Waktu Mulai" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">Waktu Selesai</label>
                                <div class='col-md-9' style="margin-bottom:10px"><input required type="text" id="waktu_selesai" name="waktu_selesai" autocomplete="off" placeholder="Masukkan Waktu Selesai" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label class='col-md-3'>Keterangan</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="keterangan" name="keterangan" autocomplete="off" placeholder="Masukkan Keterangan" class="form-control"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"><i class="icon-checkmark-circle2" data-dismiss="modal"></i> Simpan</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <!-- AKHIR MODAL EDIT -->

    <!-- MODAL TAMBAH -->
    <div class="row">
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <form action="" id="submit" method="post">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h6 class="modal-title"><strong>Tambah Data</strong></h6>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class='col-md-3'>Tanggal</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="date" id="date" name="date" autocomplete="off" placeholder="Masukkan Judul Artikel" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>Kebun</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="kebun" name="kebun" autocomplete="off" placeholder="Masukkan Nama Kebun" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>Rayon</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="rayon" name="rayon" autocomplete="off" placeholder="Masukkan Nama Rayon" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>No Unit</label>
                                <div class='col-md-9' style="margin-bottom:10px"><input required type="text" id="no_unit" name="no_unit" autocomplete="off" placeholder="Masukkan No Unit" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-12' style="margin-bottom:10px">JUMLAH TRIP TRUK BESAR : </label>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">HI</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="hi_besar_jtt" name="hi_besar_jtt" autocomplete="off" placeholder="Masukkan HI Jumlah Trip Truk Besar" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">SD HI</label>
                                <div class='col-md-9' style="margin-bottom:10px"><input required type="text" id="sdhi_besar_jtt" name="sdhi_besar_jtt" autocomplete="off" placeholder="Masukkan SD HI Jumlah Trip Truk Besar" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label class='col-md-12' style="margin-bottom:10px">JUMLAH TRIP TRUK KECIL : </label>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">HI</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="hi_kecil_jtt" name="hi_kecil_jtt" autocomplete="off" placeholder="Masukkan HI Jumlah Trip Truk Kecil" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">SD HI</label>
                                <div class='col-md-9' style="margin-bottom:10px"><input required type="text" id="sdhi_kecil_jtt" name="sdhi_kecil_jtt" autocomplete="off" placeholder="Masukkan SD HI Jumlah Trip Truk Kecil" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label class='col-md-12' style="margin-bottom:10px">JUMLAH HARIAN TRIP/UNIT : </label>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">HI</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="hi_jh" name="hi_jh" autocomplete="off" placeholder="Masukkan HI Jumlah Harian Trip/Unit" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">SD HI</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="sdhi_jh" name="sdhi_jh" autocomplete="off" placeholder="Masukkan SD HI Jumlah Harian Trip/Unit" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">Rataan</label>
                                <div class='col-md-9' style="margin-bottom:10px"><input required type="text" id="rataan_jh" name="rataan_jh" autocomplete="off" placeholder="Masukkan Rataan Jumlah Harian Trip/Unit" class="form-control"></div>
                            </div>


                            <div class="form-group">
                                <label class='col-md-12' style="margin-bottom:10px">ESTIMASI TONASE DITEBANG (10 TON) : </label>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">HI</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="hi_10ton_etd" name="hi_10ton_etd" autocomplete="off" placeholder="Masukkan HI Estimasi Ditebang (10 TON)" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">SD HI</label>
                                <div class='col-md-9' style="margin-bottom:10px"><input required type="text" id="sdhi_10ton_etd" name="sdhi_10ton_etd" autocomplete="off" placeholder="Masukkan SD HI Estimasi Ditebang (10 TON)" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label class='col-md-12' style="margin-bottom:10px">ESTIMASI TONASE DITEBANG (7 TON) : </label>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">HI</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="hi_7ton_etd" name="hi_7ton_etd" autocomplete="off" placeholder="Masukkan HI Estimasi Ditebang (7 TON)" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">SD HI</label>
                                <div class='col-md-9' style="margin-bottom:10px"><input required type="text" id="sdhi_7ton_etd" name="sdhi_7ton_etd" autocomplete="off" placeholder="Masukkan SD HI Estimasi Ditebang (7 TON)" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label class='col-md-12' style="margin-bottom:10px">HM ALAT (EFEKTIF) : </label>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">HI</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="hi_efektif_hm" name="hi_efektif_hm" autocomplete="off" placeholder="Masukkan HI HM Alat (Efektif)" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">SD HI</label>
                                <div class='col-md-9' style="margin-bottom:10px"><input required type="text" id="sdhi_efektif_hm" name="sdhi_efektif_hm" autocomplete="off" placeholder="Masukkan SD HI HM Alat (Efektif)" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label class='col-md-12' style="margin-bottom:10px">HM ALAT (LOADING) : </label>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">HI</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="hi_loading_hm" name="hi_loading_hm" autocomplete="off" placeholder="Masukkan HI HM Alat (loading)" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">SD HI</label>
                                <div class='col-md-9' style="margin-bottom:10px"><input required type="text" id="sdhi_loading_hm" name="sdhi_loading_hm" autocomplete="off" placeholder="Masukkan SD HI HM Alat (loading)" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label class='col-md-12' style="margin-bottom:10px">PRESTASI TON/HM : </label>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">HI</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="hi_prestasi" name="hi_prestasi" autocomplete="off" placeholder="Masukkan HI Prestasi (TON/HM)" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">SD HI</label>
                                <div class='col-md-9' style="margin-bottom:10px"><input required type="text" id="sdhi_prestasi" name="sdhi_prestasi" autocomplete="off" placeholder="Masukkan SD HI Prestasi (TON/HM)" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label class='col-md-3'>Hari Kerja Efektif </label>
                                <div class='col-md-9' style="margin-bottom:10px"><input required type="text" id="hari_kerja_efektif" name="hari_kerja_efektif" autocomplete="off" placeholder="Masukkan Hari Kerja Efektif" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label class='col-md-12' style="margin-bottom:10px">WAKTU MUAT : </label>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">Waktu Mulai</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="waktu_mulai" name="waktu_mulai" autocomplete="off" placeholder="Masukkan Waktu Mulai" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3' style="padding-left:40px">Waktu Selesai</label>
                                <div class='col-md-9' style="margin-bottom:10px"><input required type="text" id="waktu_selesai" name="waktu_selesai" autocomplete="off" placeholder="Masukkan Waktu Selesai" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label class='col-md-3'>Keterangan</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="keterangan" name="keterangan" autocomplete="off" placeholder="Masukkan Keterangan" class="form-control"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"><i class="icon-checkmark-circle2" data-dismiss="modal"></i> Simpan</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- AKHIR MODAL TAMBAH -->

<script src="<?php echo base_url('assets/js/') ?>sweetalert2.all.min.js"></script>
<script type="text/javascript">
    var modal_tambah = $('#myModal');
    var modal_edit = $('#modalEdit');
    var tableData = $('#data');
    var save_method;


    function myfun() {
        $('#data').DataTable({
            "ajax": {
                "url": "<?php echo base_url('Bell_Cane/get') ?>",
                "type": "POST",
                "data": function() {
                    return {
                        pelatihan: $('#kata').val(),

                    }
                },
            },

            bDestroy: true,
            dom: 'lfrtip8',
            columns: [{
                    data: 'date'
                },
                {
                    data: 'kebun'
                },
                {
                    data: 'no_unit'
                },
                {
                    data: 'hi_besar_jtt'
                },
                {
                    data: 'sdhi_besar_jtt'
                },
                {
                    data: 'hi_kecil_jtt'
                },
                {
                    data: 'sdhi_kecil_jtt'
                },
                {
                    data: 'hi_jh'
                },
                {
                    data: 'sdhi_jh'
                },
                {
                    data: 'rataan_jh'
                },
                // {
                //     data: 'keterangan'
                // },

                {
                    data: 'opsi'
                },


            ],

        });


    }
    myfun();

    function myfun2() {
        $('#data2').DataTable({
            "ajax": {
                "url": "<?php echo base_url('Bell_Cane/get') ?>",
                "type": "POST",
                "data": function() {
                    return {
                        pelatihan: $('#kata').val(),

                    }
                },
            },

            bDestroy: true,
            dom: 'lfrtip8',
            columns: [{
                    data: 'date'
                },
                {
                    data: 'kebun'
                },
                {
                    data: 'no_unit'
                },
                {
                    data: 'hi_besar_jtt'
                },
                {
                    data: 'sdhi_besar_jtt'
                },
                {
                    data: 'hi_kecil_jtt'
                },
                {
                    data: 'sdhi_kecil_jtt'
                },
                {
                    data: 'hi_jh'
                },
                {
                    data: 'sdhi_jh'
                },
                {
                    data: 'rataan_jh'
                },

            ],

        });


    }
    myfun2();

    $('#pelatihan').change(function() {

        $('#kata').val($('#pelatihan').val());
        $("#data").DataTable().ajax.reload();

    })

    $(document).ready(function() {
        $("#pelatihan").change(function() {
            var a = $(this).val();


        })
    });

    $(document).ready(function() {
        $("#pelatihan").select2();
    });

    function tes() {
        var pelatihan = $('#pelatihan').val();
        $.ajax({
            type: "method",
            url: "<?php echo base_url() ?>",
            data: pelatihan,
            success: function(response) {

            }
        });
    }

    function reload() {
        var tableData = $('#data')
        tableData.DataTable().ajax.reload();
    }

    //tambah data
    $(document).ready(function() {
        $('#submit').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo site_url('Bell_Cane/add'); ?>',
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(response) {

                    if (response.status == 'success') {
                        $('#myModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: 'Data berhasil ditambahkan',
                        })
                    }
                    if (response.status == 'pict') {
                        Swal.fire({
                            title: 'Gagal',
                            text: response.error,
                            icon: 'error',
                        })

                    }
                    reload();


                }
            });
        });
    });

    function byid(id) {
        $("#edit")[0].reset();
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('Bell_Cane/byid/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                $('[name="id"]').val(response.bell_cane['id']);
                $('[name="date"]').val(response.bell_cane['date']);
                $('[name="kebun"]').val(response.bell_cane['kebun']);
                $('[name="rayon"]').val(response.bell_cane['rayon']);
                $('[name="no_unit"]').val(response.bell_cane['no_unit']);
                $('[name="hi_besar_jtt"]').val(response.bell_cane['hi_besar_jtt']);
                $('[name="sdhi_besar_jtt"]').val(response.bell_cane['sdhi_besar_jtt']);
                $('[name="hi_kecil_jtt"]').val(response.bell_cane['hi_kecil_jtt']);
                $('[name="sdhi_kecil_jtt"]').val(response.bell_cane['sdhi_kecil_jtt']);
                $('[name="hi_jh"]').val(response.bell_cane['hi_jh']);
                $('[name="sdhi_jh"]').val(response.bell_cane['sdhi_jh']);
                $('[name="rataan_jh"]').val(response.bell_cane['rataan_jh']);
                $('[name="hi_10ton_etd"]').val(response.bell_cane['hi_10ton_etd']);
                $('[name="sdhi_10ton_etd"]').val(response.bell_cane['sdhi_10ton_etd']);
                $('[name="hi_7ton_etd"]').val(response.bell_cane['hi_7ton_etd']);
                $('[name="sdhi_7ton_etd"]').val(response.bell_cane['sdhi_7ton_etd']);
                $('[name="hi_total_etd"]').val(response.bell_cane['hi_total_etd']);
                $('[name="sdhi_total_etd"]').val(response.bell_cane['sdhi_total_etd']);
                $('[name="hi_efektif_hm"]').val(response.bell_cane['hi_efektif_hm']);
                $('[name="sdhi_efektif_hm"]').val(response.bell_cane['sdhi_efektif_hm']);
                $('[name="hi_loading_hm"]').val(response.bell_cane['hi_loading_hm']);
                $('[name="sdhi_loading_hm"]').val(response.bell_cane['sdhi_loading_hm']);
                $('[name="hi_prestasi"]').val(response.bell_cane['hi_prestasi']);
                $('[name="sdhi_prestasi"]').val(response.bell_cane['sdhi_prestasi']);
                $('[name="hari_kerja_efektif"]').val(response.bell_cane['hari_kerja_efektif']);
                $('[name="waktu_mulai"]').val(response.bell_cane['waktu_mulai']);
                $('[name="waktu_selesai"]').val(response.bell_cane['waktu_selesai']);
                $('[name="keterangan"]').val(response.bell_cane['keterangan']);


                $('[name="keterangan"]').val(response.bell_cane['keterangan']);
                modal_edit.modal('show');
                console.log(response.daftar_alat_berat['id']);
            }
        });

    }

    function show_modalTambah() {
        $("#submit")[0].reset();
        modal_tambah.modal('show');
    }

    //edit data
    $(document).ready(function() {
        $('#edit').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url(); ?>Bell_Cane/edit',
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(response) {
                    if (response.status == 'success') {
                        modal_edit.modal('hide');
                        Swal.fire({
                            title: 'Data Cane Harvester',
                            text: 'Berhasil diubah',
                            icon: 'success',
                        })
                        reload();

                    }
                    if (response.status == 'failed') {
                        // $('#judul').text(response.nama_error);
                        // $('#isi').text(response.profesi_error);
                    }
                }
            });
        });


    });

    function deleted(id) {
        Swal.fire({
            title: 'Data akan dihapus',
            text: "Apakah anda yakin?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus!',
            cancelButtonText: 'Batal'

        }).then((result) => {
            if (result.isConfirmed) {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url('Bell_Cane/delete/') ?>" + id,
                        dataType: "JSON",
                        success: function(response) {
                            if (response.status == 'success') {
                                Swal.fire({
                                    title: 'Data berhasil dihapus',
                                    icon: 'success',
                                })
                                reload();

                            } else if (response.status == 'failed') {
                                Swal.fire({
                                    title: 'Data Anda Gagal Dihapus',
                                    icon: 'danger',
                                })
                                reload();
                            }

                        }
                    });
                }

            }
        })


    }
</script>