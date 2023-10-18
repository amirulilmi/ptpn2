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
        <h5 class="panel-title"><i class="icon-upload7"></i>Daftar ALat Berat</h5>
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
                        <th>JENIS</th>
                        <th>BAHAN BAKAR</th>
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
                        <th>JENIS</th>
                        <th>BAHAN BAKAR</th>
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
                            <div class="form-group">
                                <label class='col-md-3'>ID Alat</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="id" name="id" autocomplete="off" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>Jenis Alat</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="jenis" name="jenis" autocomplete="off" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>Bahan Bakar</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="bahan_bakar" name="bahan_bakar" autocomplete="off" class="form-control"></div>
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
                <form action="<?php echo site_url('Artikel/edit'); ?>" id="submit" method="post">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h6 class="modal-title"><strong>Tambah Data</strong></h6>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class='col-md-3'>ID Alat</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="id" name="id" autocomplete="off" value="" class="form-control" disabled></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>Jenis Alat</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="jenis" name="jenis" autocomplete="off" placeholder="Masukkan Jenis Alat Berat" class="form-control"></div>
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
                "url": "<?php echo base_url('Daftar_Alat_Berat/get') ?>",
                "type": "POST",
            },

            bDestroy: true,
            dom: 'lfrtip8',
            columns: [{
                    data: 'no'
                },
                {
                    data: 'jenis'
                },
                {
                    data: 'bahan_bakar'
                },
                {
                    data: 'opsi'
                },

            ],

        });


    }
    myfun();

    // DATATABLE FOR USER
    function myfun2() {
        $('#data2').DataTable({
            "ajax": {
                "url": "<?php echo base_url('Daftar_Alat_Berat/get') ?>",
                "type": "POST",
            },

            bDestroy: true,
            dom: 'lfrtip8',
            columns: [{
                    data: 'no'
                },
                {
                    data: 'jenis'
                },
                {
                    data: 'bahan_bakar'
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
                url: '<?php echo site_url('Daftar_Alat_Berat/add'); ?>',
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
            url: "<?php echo base_url('Daftar_Alat_Berat/byid/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                $('[name="id"]').val(response.daftar_alat_berat['id']);
                $('[name="jenis"]').val(response.daftar_alat_berat['jenis']);
                $('[name="bahan_bakar"]').val(response.daftar_alat_berat['bahan_bakar']);
                modal_edit.modal('show');
                console.log(response.daftar_alat_berat['id']);
            }
        });

    }

    function show_modalTambah() {
        $("#submit")[0].reset();
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('Daftar_Alat_berat/getDaftarAlatId') ?>",
            dataType: "JSON",
            success: function(response) {
                var tes = parseInt(response.id['id']);
                var sum = tes + 1;
                $('[name="id"]').val(sum);
            }
        });
        modal_tambah.modal('show');
    }

    //edit data
    $(document).ready(function() {
        $('#edit').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url(); ?>Daftar_Alat_Berat/edit',
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
                        url: "<?php echo base_url('Daftar_Alat_Berat/delete/') ?>" + id,
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