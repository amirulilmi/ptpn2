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



<div class="panel panel-primary border-radius">
    <div class="panel-heading header-radius">
        <h5 class="panel-title"><i class="icon-upload7"></i>Daftar Kebun</h5>
    </div>

    <!-- DATATABLE FOR SUPERADMIN AND ADMIN -->
    <?php if (id_akses() != 3) { ?>
        <div class="panel-body add-margin-top" style="border-radius:20px">
            <table class="table table-bordered table-hover" id="data" style="border-radius:20px">
                <div class="button-data" style="margin-right: 140px;margin-top:3px">
                    <button type="button" onclick="show_modalTambah()" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary"><i class="icon-file-plus"></i> Tambah </button>
                </div>

                <thead>
                    <tr>
                        <th>NO</th>
                        <th>KODE KEBUN</th>
                        <th>NAMA</th>
                        <th>KOMODITI</th>
                        <th>DISTRIK</th>
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
                        <th>KODE KEBUN</th>
                        <th>NAMA</th>
                        <th>KOMODITI</th>
                        <th>DISTRIK</th>
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
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label class='col-md-3'>Kode Kebun</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="kode" name="kode" autocomplete="off" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>Nama Kebun</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="nama" name="nama" autocomplete="off" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>Komoditi</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="komoditi" name="komoditi" autocomplete="off" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>Distrik</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="distrik" name="distrik" autocomplete="off" class="form-control"></div>
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
                                <label class='col-md-3'>Kode Kebun</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input placeholder="Masukkan Kode Kebun" required type="text" id="kode" name="kode" autocomplete="off" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>Nama Kebun</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input placeholder="Masukkan Nama Kebun" required type="text" id="nama" name="nama" autocomplete="off" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>Komoditi</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input placeholder="Masukkan Komoditi Kebun" required type="text" id="komoditi" name="komoditi" autocomplete="off" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>Distrik</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input placeholder="Masukkan Distrik Kebun" required type="text" id="distrik" name="distrik" autocomplete="off" class="form-control"></div>
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
                "url": "<?php echo base_url('Kebun/get') ?>",
                "type": "POST",
            },

            bDestroy: true,
            dom: 'lfrtip8',
            columns: [{
                    data: 'no'
                },
                {
                    data: 'kode'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'komoditi'
                },
                {
                    data: 'distrik'
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
                "url": "<?php echo base_url('Kebun/get') ?>",
                "type": "POST",
            },

            bDestroy: true,
            dom: 'lfrtip8',
            columns: [{
                    data: 'no'
                },
                {
                    data: 'kode'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'komoditi'
                },
                {
                    data: 'distrik'
                },
            ],

        });


    }
    myfun2();


    function reload() {
        var tableData = $('#data')
        tableData.DataTable().ajax.reload();
    }

    //tambah data
    $(document).ready(function() {
        $('#submit').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo site_url('Kebun/add'); ?>',
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
            url: "<?php echo base_url('Kebun/byid/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                $('[name="id"]').val(response.kebun['id']);
                $('[name="kode"]').val(response.kebun['kode']);
                $('[name="nama"]').val(response.kebun['nama']);
                $('[name="komoditi"]').val(response.kebun['komoditi']);
                $('[name="distrik"]').val(response.kebun['distrik']);
                modal_edit.modal('show');
                // console.log(response.alat_berat['id']);
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
                url: '<?php echo base_url(); ?>Kebun/edit',
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
                        url: "<?php echo base_url('Kebun/delete/') ?>" + id,
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