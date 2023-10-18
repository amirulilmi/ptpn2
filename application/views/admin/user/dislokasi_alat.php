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

<!-- FILTER 1 -->
<div class="" style="margin-bottom: 10px;margin-right:10px;float:left">
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
<!-- AKHIR FILTER 1 -->

<!-- FILTER 2 -->
<div class="" style="margin-bottom: 10px;margin-right:10px;float:left">
    <table>
        <tr>
            <td>
                <select name="" id="jenis_alat" class="" style="width: 200px;">
                    <option value="">Pilih Semua</option>
                    <?php foreach ($jenis as $ja) { ?>
                        <option value="<?php echo $ja['id'] ?>"><?php echo $ja['jenis'] ?></option>
                    <?php } ?>
                </select>
                <input type="hidden" id="kata2" value="">
            </td>
        </tr>
    </table>
</div>
<!-- AKHIR FILTER 2 -->
<?php if (id_akses() != 3) { ?>
<div class="" style="margin-bottom: 10px;overflow:hidden">
  <button type="button" onclick="show_modalTambah()" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary"><i class="icon-file-plus"></i> Copy Sumber </button>
</div>
<?php } ?>

<?php if (id_akses() == 3) { ?>
<div class="" style="margin-bottom: 50px;overflow:hidden">
  
</div>
<?php } ?>

<div class="panel panel-primary border-radius">
    <div class="panel-heading header-radius">
        <h5 class="panel-title"><i class="icon-upload7"></i>Dislokasi Alat</h5>
    </div>

    <!-- DATATABLE FOR SUPERADMIN AND ADMIN -->
    <?php if (id_akses() != 3) { ?>
        <div class="panel-body add-margin-top" style="border-radius:20px">
            <table class="table table-bordered table-hover" id="data" style="border-radius:20px">
                <div class="button-data" style="margin-right: 140px;margin-top:3px">
                    <button type="button" onclick="show_modalTambah2()" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary"><i class="icon-file-plus"></i> Tambah </button>
                </div>

                <thead>
                    <tr>
                        <th>NO</th>
                        <th>TANGGAL</th>
                        <th>KODE ALAT</th>
                        <th>JENIS</th>
                        <th>KODE KEBUN</th>
                        <th>NO UNIT</th>
                        <th>KONDISI</th>
                        <th>KETERANGAN</th>
                        <th>OPSI</th>
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
                        <th>NO</th>
                        <th>TANGGAL</th>
                        <th>KODE ALAT</th>
                        <th>JENIS</th>
                        <th>KODE KEBUN</th>
                        <th>NO UNIT</th>
                        <th>KONDISI</th>
                        <th>KETERANGAN</th>
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
                <form action="" id="edit" method="post">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h6 class="modal-title"><strong>Edit Data</strong></h6>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_dislokasi" id="id_dislokasi">
                            <div class="form-group">
                                <label class='col-md-3'>Tanggal</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required placeholder="Masukkan Tanggal" type="date" id="date" name="date" autocomplete="off" class="form-control"></div>
                            </div>
                            <div class="form-group" style="margin-left:-2px;">
                                <label for="jenis" class="col-md-3 col-form-label">Jenis</label>
                                <div class="col-md-9" style="margin-bottom:5px">
                                    <select class="form-control" aria-label="Default select example" name="jenis">
                                        <?php foreach ($jenis as $dte) { ?>
                                            <option value="<?php echo $dte['id'] ?>"><?php echo $dte['jenis'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" style="margin-left:-2px;">
                                <label for="jenis" class="col-md-3 col-form-label">Kebun</label>
                                <div class="col-md-9" style="margin-bottom:5px">
                                    <select class="form-control" aria-label="Default select example" name="kebun">
                                        <?php foreach ($kebun as $dte) { ?>
                                            <option value="<?php echo $dte['id'] ?>"><?php echo $dte['kode'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>Kode Alat Berat</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input type="text" id="kode_alat_berat" name="kode_alat_berat" autocomplete="off" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>No Unit</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input type="text" id="no_unit" name="no_unit" autocomplete="off" class="form-control"></div>
                            </div>
                            <div class="form-group" style="margin-left:-2px;">
                                <label for="jenis_kelamin" class="col-md-3 col-form-label">Kondisi Alat</label>
                                <div class="col-md-9" style="margin-bottom:5px">
                                    <select class="form-control" aria-label="Default select example" name="kondisi">
                                        <option selected value="<?php echo 'BAIK'; ?>">BAIK</option>
                                        <option value="<?php echo 'RUSAK'; ?>">RUSAK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>Keterangan</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input type="text" id="keterangan" name="keterangan" autocomplete="off" class="form-control"></div>
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
                            <input required type="hidden" id="kode_alat_berat" name="kode_alat_berat" autocomplete="off" class="form-control" hidden>
                            <div class="form-group">
                                <label class='col-md-3'>Tanggal Laporan</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="date" id="date" name="date" autocomplete="off" placeholder="Masukkan Judul Artikel" class="form-control"></div>
                            </div>
                            <div class="form-group" style="margin-left:-2px;">
                                <label for="jenis_kelamin" class="col-md-3 col-form-label">Sumber Laporan</label>
                                <div class="col-md-9" style="margin-bottom:5px">
                                    <select class="form-control" aria-label="Default select example" name="date1">
                                        <?php foreach ($date as $dte) { ?>
                                            <option value="<?php echo $dte['date'] ?>"><?php echo $dte['date'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
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

    <!-- SINGLE MODAL TAMBAH -->
    <div class="row">
        <div class="modal fade" id="myModal2">
            <div class="modal-dialog">
                <form action="" id="submit2" method="post">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h6 class="modal-title"><strong>Edit Data</strong></h6>
                        </div>
                        <div class="modal-body">
                            <!-- <input type="hidden" name="id_dislokasi" id="id_dislokasi"> -->
                            <div class="form-group">
                                <label class='col-md-3'>Tanggal</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required placeholder="Masukkan Tanggal" type="date" id="date" name="date" autocomplete="off" class="form-control"></div>
                            </div>
                            <div class="form-group" style="margin-left:-2px;">
                                <label for="jenis" class="col-md-3 col-form-label">Jenis</label>
                                <div class="col-md-9" style="margin-bottom:5px">
                                    <select class="form-control" aria-label="Default select example" name="jenis">
                                        <?php foreach ($jenis as $dte) { ?>
                                            <option value="<?php echo $dte['id'] ?>"><?php echo $dte['jenis'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" style="margin-left:-2px;">
                                <label for="jenis" class="col-md-3 col-form-label">Kebun</label>
                                <div class="col-md-9" style="margin-bottom:5px">
                                    <select class="form-control" aria-label="Default select example" name="kebun">
                                        <?php foreach ($kebun as $dte) { ?>
                                            <option value="<?php echo $dte['id'] ?>"><?php echo $dte['kode'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>Kode Alat Berat</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input type="text" id="kode_alat_berat" name="kode_alat_berat" autocomplete="off" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>No Unit</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input type="text" id="no_unit" name="no_unit" autocomplete="off" class="form-control"></div>
                            </div>
                            <div class="form-group" style="margin-left:-2px;">
                                <label for="jenis_kelamin" class="col-md-3 col-form-label">Kondisi Alat</label>
                                <div class="col-md-9" style="margin-bottom:5px">
                                    <select class="form-control" aria-label="Default select example" name="kondisi">
                                        <option selected value="<?php echo 'BAIK'; ?>">BAIK</option>
                                        <option value="<?php echo 'RUSAK'; ?>">RUSAK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>Keterangan</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input type="text" id="keterangan" name="keterangan" autocomplete="off" class="form-control"></div>
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
    <!-- AKHIR SINGLE -->

</div>
<!-- AKHIR MODAL TAMBAH -->

<script src="<?php echo base_url('assets/js/') ?>sweetalert2.all.min.js"></script>
<script type="text/javascript">
    var modal_tambah = $('#myModal');
    var modal_tambah2 = $('#myModal2');
    var modal_edit = $('#modalEdit');
    var tableData = $('#data');
    var tableData2 = $('#data2');
    var save_method;


    function myfun() {
        $('#data').DataTable({
            "ajax": {
                "url": "<?php echo base_url('Dislokasi_Alat/get') ?>",
                "type": "POST",
                "data": function() {
                    return {
                        pelatihan: $('#kata').val(),
                        jenis_alat: $('#kata2').val(),

                    }
                },
            },
            // fixedColumns:   true,
            fixedColumns: {
                leftColumns: 1,
                // rightColumns: 1
            },
            // paging: false,
            scrollCollapse: true,
            scrollX: true,
            scrollY: 400,
            bDestroy: true,
            dom: 'lfrtip8',
            columns: [{
                    data: 'no'
                },
                {
                    data: 'date'
                },
                {
                    data: 'kode_alat_berat'
                },
                {
                    data: 'jenis'
                },
                {
                    data: 'kode'
                },
                {
                    data: 'no_unit'
                },
                {
                    data: 'kondisi'
                },
                {
                    data: 'keterangan'
                },
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
                "url": "<?php echo base_url('Dislokasi_Alat/get') ?>",
                "type": "POST",
                "data": function() {
                    return {
                        pelatihan: $('#kata').val(),
                        jenis_alat: $('#kata2').val(),
                    }
                },
            },
            fixedColumns: {
                leftColumns: 1,
                rightColumns: 1
            },
            // paging: false,
            scrollCollapse: true,
            scrollX: true,
            scrollY: 300,
            bDestroy: true,
            dom: 'lfrtip8',
            columns: [{
                    data: 'no'
                },
                {
                    data: 'date'
                },
                {
                    data: 'kode_alat_berat'
                },
                {
                    data: 'jenis'
                },
                {
                    data: 'kode'
                },
                {
                    data: 'no_unit'
                },
                {
                    data: 'kondisi'
                },
                {
                    data: 'keterangan'
                },

            ],

        });


    }
    myfun2();

    //filter 1
    $('#pelatihan').change(function() {

        $('#kata').val($('#pelatihan').val());
        $("#data").DataTable().ajax.reload();
        $("#data2").DataTable().ajax.reload();

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

    //filter 2
    $('#jenis_alat').change(function() {

        $('#kata2').val($('#jenis_alat').val());
        $("#data").DataTable().ajax.reload();
        $("#data2").DataTable().ajax.reload();

    })

    $(document).ready(function() {
        $("#jenis_alat").change(function() {
            var a = $(this).val();
        })
    });

    $(document).ready(function() {
        $("#jenis_alat").select2();
    });

    function tes() {
        var jenis_alat = $('#jenis_alat').val();
        $.ajax({
            type: "method",
            url: "<?php echo base_url() ?>",
            data: jenis_alat,
            success: function(response) {

            }
        });
    }

    function reload() {
        var tableData = $('#data')
        tableData.DataTable().ajax.reload();
    }

    function reload2() {
        var tableData2 = $('#data2')
        tableData2.DataTable().ajax.reload();
    }

    //tambah data
    $(document).ready(function() {
        $('#submit').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo site_url('Dislokasi_Alat/add'); ?>',
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

    // SINGLE TAMBAH DATA
    $(document).ready(function() {
        $('#submit2').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo site_url('Dislokasi_Alat/add2'); ?>',
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
            url: "<?php echo base_url('Dislokasi_Alat/byid/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                $('[name="id_dislokasi"]').val(response.daftar_dislokasi_alat['id_dislokasi']);
                $('[name="date"]').val(response.daftar_dislokasi_alat['date']);
                $('[name="jenis"]').val(response.daftar_dislokasi_alat['id_alat']);
                $('[name="kebun"]').val(response.daftar_dislokasi_alat['id_kebun']);
                $('[name="kode_alat_berat"]').val(response.daftar_dislokasi_alat['kode_alat_berat']);
                $('[name="kondisi"]').val(response.daftar_dislokasi_alat['kondisi']);
                $('[name="no_unit"]').val(response.daftar_dislokasi_alat['no_unit']);
                $('[name="keterangan"]').val(response.daftar_dislokasi_alat['keterangan']);
                modal_edit.modal('show');
                // console.log(response.alat_berat['id']);
            }
        });

    }

    function show_modalTambah() {
        $("#submit")[0].reset();
        modal_tambah.modal('show');
    }

    function show_modalTambah2() {
        $("#submit2")[0].reset();
        modal_tambah2.modal('show');
    }

    //edit data
    $(document).ready(function() {
        $('#edit').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url(); ?>Dislokasi_Alat/edit',
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
                            title: 'Data Alat',
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
                        url: "<?php echo base_url('Dislokasi_Alat/delete/') ?>" + id,
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