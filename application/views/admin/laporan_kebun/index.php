<div class="panel panel-primary border-radius m10p">
  <div class="panel-heading header-radius">
    <h9 class="panel-title"><i class="icon-book"></i> Laporan Kebun</h9>
  </div>
  <form action="<?php echo site_url('Laporan_Kebun/eks'); ?>" method="post">
    <div class="panel-body">
      <div class="row">
        <div class="form-group">
          <label class='col-md-2'>Komoditi</label>
          <div class='col-md-9'>
            <select data-placeholder="Pilih Komoditi" name="date" class="select-clear">
              <?php $tanggal = $this->db->distinct()->select('komoditi')->get('kebun')->result(); ?>
              <option value=""></option>
              <?php
              $no = 0;
              foreach ($tanggal as $r) : $no++;
                echo '<option value="' . $r->komoditi . '">' . $r->komoditi . '</option>';
              endforeach;
              ?>
            </select>
          </div>
        </div>
      </div>
      <br>
    </div>
    <div class="panel-footer footer-radius">
      <br>
      <center><button type="submit" class="btn btn-md btn-primary"><i class="icon-download"></i> Ekspor Ke Excel</button></center>
      <br>
    </div>
  </form>
</div>