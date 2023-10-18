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
        <h5 class="panel-title"><i class="icon-upload7"></i>Daftar Dan Spesifikasi Alat Berat</h5>
    </div>

    <!-- DATATABLE FOR SUPERADMIN AND ADMIN -->
    <?php if (id_akses()!=3){ ?>
    <div class="panel-body add-margin-top" style="border-radius:20px">
        <table class="table table-bordered table-hover" id="data" style="border-radius:20px">
            <div class="button-data" style="margin-right: 140px;margin-top:3px">
                <button type="button" onclick="show_modalTambah()" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary"><i class="icon-file-plus"></i> Tambah </button>
            </div>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>COUNTDOWN</th>
                    <th>AKHIR</th>
                    <!-- <th>COUNTDOWN</th>                    -->
                    <th>OPSI</th>
                    
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <?php } ?>

    <!-- DATATABLE FOR USER -->
    <?php if (id_akses()==3){ ?>
    <div class="panel-body add-margin-top" style="border-radius:20px">
        <table class="table table-bordered table-hover" id="data2" style="border-radius:20px">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>MERK</th>
                    <th>HORSE POWER</th>
                    <th>BAHAN BAKAR</th>
                    <th>TAHUN PEROLEHAN</th>
                    <th>JUMLAH UNIT</th>
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
                                <label class='col-md-3'>Merk</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="merk" name="merk" autocomplete="off" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>Horse Power</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="horse_power" name="horse_power" autocomplete="off" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>Bahan Bakar</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="bahan_bakar" name="bahan_bakar" autocomplete="off" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>Tahun Perolehan</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="tahun_perolehan" name="tahun_perolehan" autocomplete="off" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class='col-md-3'>Jumlah Unit</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="jumlah_unit" name="jumlah_unit" autocomplete="off" class="form-control"></div>
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
                                <label class='col-md-3'>Tanggal Mulai</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="datetime-local" id="mulai" name="mulai" autocomplete="off" placeholder="Masukkan Merk Berat" class="form-control"></div>
                            </div>
                            <!-- <div class="form-group">
                                <label class='col-md-3'>Tanggal Selesai</label>
                                <div class='col-md-9' style="margin-bottom:5px"><input required type="datetime-local" id="akhir" name="akhir" autocomplete="off" placeholder="Masukkan Horse Power Alat Berat" class="form-control"></div>
                            </div> -->

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

    var tes = 2;


    function myfun() {
        $('#data').DataTable({
            "ajax": {
                "url": "<?php echo base_url('Countdown/get') ?>",
                "type": "POST",
            },
            bDestroy: true,
            dom: 'lfrtip8',
            columns: [{
                    data: 'no'
                },
                {
                    data: 'countdown_timer'
                },
                {
                    data: 'akhir'
                },
                {
                    data: 'opsi'
                },
            ],
            // Inisialisasi countdown pada kolom countdown_timer
            "fnCreatedRow": function(row, data, index) {
                var targetTime = $(row).find('.countdown').data('target-time');
                if (targetTime) {
                    // Hitung selisih waktu dari targetTime dengan waktu sekarang
                    var now = new Date().getTime();
                    var target = new Date(targetTime).getTime();
                    var distance = target - now;

                    // Mulai countdown menggunakan setInterval
                    if (distance > 0) {
                        var countdownInterval = setInterval(function() {
                            now = new Date().getTime();
                            distance = target - now;
                            if (distance <= 0) {
                                clearInterval(countdownInterval);
                                $(row).find('.countdown').html("Countdown expired!");
                            } else {
                                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                var countdownHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s";
                                $(row).find('.countdown').html(countdownHTML);
                            }
                        }, 1000);
                    } else {
                        $(row).find('.countdown').html("Countdown expired!");
                    }
                }
            },
        });
    }
    myfun();

    // DATATABLE FOR USER
    function myfun2() {
        $('#data2').DataTable({
            "ajax": {
                "url": "<?php echo base_url('Alat_Berat/get') ?>",
                "type": "POST",
            },

            bDestroy: true,
            dom: 'lfrtip8',
            columns: [{
                    data: 'no'
                },
                {
                    data: 'merk'
                },
                {
                    data: 'horse_power'
                },
                {
                    data: 'bahan_bakar'
                },
                {
                    data: 'tahun_perolehan'
                },
                {
                    data: 'jumlah_unit'
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
                url: '<?php echo site_url('Countdown/add'); ?>',
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
            url: "<?php echo base_url('Alat_Berat/byid/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                $('[name="id"]').val(response.alat_berat['id']);
                $('[name="merk"]').val(response.alat_berat['merk']);
                $('[name="horse_power"]').val(response.alat_berat['horse_power']);
                $('[name="bahan_bakar"]').val(response.alat_berat['bahan_bakar']);
                $('[name="tahun_perolehan"]').val(response.alat_berat['tahun_perolehan']);
                $('[name="jumlah_unit"]').val(response.alat_berat['jumlah_unit']);
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
                url: '<?php echo base_url(); ?>Alat_Berat/edit',
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
                        url: "<?php echo base_url('Alat_Berat/delete/') ?>" + id,
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