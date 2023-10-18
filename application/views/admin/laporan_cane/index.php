<div class="panel panel-primary border-radius m10p">
    <div class="panel-heading header-radius">
        <h9 class="panel-title"><i class="icon-book"></i> Laporan Cane Harvester</h9>
    </div>
    <form action="<?php echo site_url('Laporan_Cane/eks'); ?>" method="post">
        <div class="panel-body">

        <div class="row">
                <div class="form-group">
                    <label class='col-md-2'>Bulan</label>
                    <div class='col-md-9'>
                        <select data-placeholder="Pilih Bulan" name="month" class="select-clear">
                            <?php $bulan = $this->db->distinct()->select('month')->get('cane_harvester')->result(); ?>
                            <option value=""></option>
                            <?php
                            $no = 0;
                            foreach ($bulan as $r) : $no++;
                                echo '<option value="' . $r->month . '">' . $r->month . '</option>';
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
            </div>
<br>
            <div class="row">
                <div class="form-group">
                    <label class='col-md-2'>Tanggal</label>
                    <div class='col-md-9'>
                        <select data-placeholder="Pilih Tanggal" name="date" class="select-clear">
                            <?php $tanggal = $this->db->distinct()->select('date')->get('cane_harvester')->result(); ?>
                            <option value=""></option>
                            <?php
                            $no = 0;
                            foreach ($tanggal as $r) : $no++;
                                echo '<option value="' . $r->date . '">' . $r->date . '</option>';
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer footer-radius">
            <br>
            <center><button type="submit" class="btn btn-md btn-primary"><i class="icon-download"></i> Ekspor Ke Excel</button></center>
            <br>
        </div>
    </form>
</div>