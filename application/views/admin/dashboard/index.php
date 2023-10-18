<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/visualization/echarts/echarts.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/charts/echarts/bars_tornados.js') ?>"></script>
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

<div class="flex-container dashboard-content">
    <div class="margin-content background-color screen-small min-left">
        <img src="<?php echo base_url('assets/images/dashboard/people.png'); ?>" alt="" class="size-image">
        <p class="font-dashboard"><?php echo gettotalalat(); ?> Unit</p>
        <p class="font-dashboard-black">Jumlah Alat Berat</p>
    </div>
    <div class="margin-content1 background-color screen-small add-margin-top-dashboard min-left">
        <img src="<?php echo base_url('assets/images/dashboard/fam.png'); ?>" alt="" class="size-images">
        <p class="font-dashboard"><?php echo gettotalkebun(); ?> Buah</p>
        <p class="font-dashboard-black">Jumlah Kebun</p>
    </div>
</div>
<div class="panel panel-flat">
    <div class="panel-body border-radius">
        <div class="chart-container">
            <div class="col-md-6">
                <center><i class="label label-info"><strong>Berdasarkan Baik/Rusak </strong></i></center>
                <hr>
                <center>
                    <div class="chart has-fixed-height" id="basic_bars"></div>
                </center>
            </div>
            <div class="col-md-6">
                <center><i class="label label-default"><strong>Berdasarkan HM Alat</strong></i></center>
                <hr>
                <center>
                    <div class="chart has-fixed-height" id="basic_line"></div>
                </center>
            </div>
            <br><br><br>
            <div class="col-md-12">
                <center><i class="label label-primary"><strong>Berdasarkan Tahun Perolehan</strong></i></center>
                <hr>
                <center>
                    <div class="chart has-fixed-height" id="basic_columns"></div>
                </center>
            </div>
        </div>
    </div>
</div>
<?php

// $this->db->select('tahun_perolehan');
// $this->db->distinct();
// $alat_berat = $this->db->get('alat_berat')->result();

$this->db->select(['kebun.id', 'kebun.kode', 'COUNT(laporan_kerja_alat_berat.id_kebun) AS jumlah_laporan_kerja'])
    ->from('laporan_kerja_alat_berat')
    ->join('kebun', 'kebun.id = laporan_kerja_alat_berat.id_kebun')
    ->group_by('laporan_kerja_alat_berat.id_kebun');

$alat_berat = $this->db->get()->result();

// print_r($alat_berat);exit;
?>
<script>
    $(function() {
        require.config({
            paths: {
                echarts: 'assets/js/plugins/visualization/echarts'
            }
        });
        require(
            [
                'echarts',
                'echarts/theme/limitless',
                'echarts/chart/bar',
                'echarts/chart/line'
            ],
            function(ec, limitless) {
                var basic_bars = ec.init(document.getElementById('basic_bars'), limitless);
                var basic_line = ec.init(document.getElementById('basic_line'), limitless);
                var basic_columns = ec.init(document.getElementById('basic_columns'), limitless);
                basic_bars_options = {
                    grid: {
                        x: 40,
                        x2: 40,
                        y: 35,
                        y2: 25
                    },
                    tooltip: {
                        trigger: 'axis',
                        axisPointer: {
                            type: 'shadow'
                        }
                    },
                    legend: {
                        data: ['RUSAK', 'BAIK']
                    },
                    calculable: true,
                    xAxis: [{
                        type: 'value',
                        boundaryGap: [0, 1]
                    }],
                    yAxis: [{
                        type: 'category',
                        data: ['']
                    }],
                    series: [{
                            name: 'RUSAK',
                            type: 'bar',
                            itemStyle: {
                                normal: {
                                    color: '#EF5350'
                                }
                            },
                            data: [<?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    $currentTime = date('Y-m-d');

                                    $query = "SELECT * FROM laporan_kerja_alat_berat WHERE kondisi_alat_berat = 'RUSAK' AND date = ?";
                                    $result = $this->db->query($query, array($currentTime));
                                    echo  $numRows = $result->num_rows();


                                    ?>]
                        },
                        {
                            name: 'BAIK',
                            type: 'bar',
                            itemStyle: {
                                normal: {
                                    color: '#66BB6A'
                                }
                            },
                            data: [<?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    $currentTime = date('Y-m-d');

                                    $query = "SELECT * FROM laporan_kerja_alat_berat WHERE kondisi_alat_berat = 'BAIK' AND date = ?";
                                    $result = $this->db->query($query, array($currentTime));
                                    echo  $numRows = $result->num_rows();


                                    ?>]
                        }
                    ]
                };
                basic_line_options = {
                    grid: {
                        x: 40,
                        x2: 40,
                        y: 35,
                        y2: 25
                    },
                    tooltip: {
                        trigger: 'axis',
                        axisPointer: {
                            type: 'shadow'
                        }
                    },
                    legend: {
                        data: ['HM Alat > 10', 'HM Alat < 10']
                    },
                    calculable: true,
                    yAxis: [{
                        type: 'value',
                        boundaryGap: [0, 1]
                    }],
                    xAxis: [{
                        type: 'category',
                        data: ['']
                    }],
                    series: [{
                            name: 'HM Alat > 10',
                            type: 'bar',
                            itemStyle: {
                                normal: {
                                    color: '#EF5350'
                                }
                            },
                            data: [<?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    $currentTime = date('Y-m-d');

                                    $query = "SELECT * FROM laporan_kerja_alat_berat WHERE hm_alat > '10' AND date = ?";
                                    $result = $this->db->query($query, array($currentTime));
                                    echo  $numRows = $result->num_rows();


                                    ?>
                                
                                
                                ]
                        },
                        {
                            name: 'HM Alat < 10',
                            type: 'bar',
                            itemStyle: {
                                normal: {
                                    color: '#66BB6A'
                                }
                            },
                            data: [<?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    $currentTime = date('Y-m-d');

                                    $query = "SELECT * FROM laporan_kerja_alat_berat WHERE hm_alat < '10' AND date = ?";
                                    $result = $this->db->query($query, array($currentTime));
                                    echo  $numRows = $result->num_rows();


                                    ?>]
                        }
                    ]
                };


                basic_columns_options = {

                    // Setup grid
                    grid: {
                        x: 40,
                        x2: 40,
                        y: 35,
                        y2: 25
                    },

                    // Add tooltip
                    tooltip: {
                        trigger: 'axis'
                    },

                    // Add legend
                    legend: {
                        data: ['Jumlah']
                    },

                    // Enable drag recalculate
                    calculable: true,

                    // Horizontal axis
                    xAxis: [{
                        type: 'category',
                        data: [<?php $no = 0;
                                foreach ($alat_berat as $row) : $no++; ?> '<?php echo $row->kode; ?>', <?php endforeach; ?>]
                    }],

                    // Vertical axis
                    yAxis: [{
                        type: 'value'
                    }],

                    // Add series
                    series: [{
                            name: 'Jumlah',
                            type: 'line',
                            data: [<?php $no = 0;
                                    foreach ($alat_berat as $row) : $no++; ?> '<?php echo getjumalat($row->id); ?>', <?php endforeach; ?>],
                            itemStyle: {
                                normal: {
                                    label: {
                                        show: true,
                                        textStyle: {
                                            fontWeight: 500
                                        }
                                    }
                                }
                            },
                        },

                    ]
                };



                // Apply options
                // ------------------------------

                basic_columns.setOption(basic_columns_options);
                basic_bars.setOption(basic_bars_options);
                basic_line.setOption(basic_line_options);
                window.onresize = function() {
                    setTimeout(function() {
                        basic_columns.resize();
                        basic_bars.resize();
                        basic_line.resize();
                    }, 200);
                }
            }
        );
    });
</script>