<div class="panel panel-primary border-radius m10p">
  <div class="panel-heading header-radius">
    <h9 class="panel-title"><i class="icon-book"></i> Laporan</h9>
  </div>
  <form action="<?php echo site_url('Laporan_Dislokasi/eks'); ?>" method="post">
    <div class="panel-body">
      <div class="row">
        <div class="form-group">
          <label class='col-md-2'>Tanggal</label>
          <div class='col-md-9'>
            <select data-placeholder="Pilih Tanggal" name="date" class="select-clear">
              <?php $tanggal = $this->db->distinct()->select('date')->get('dislokasi_alat_berat')->result(); ?>
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
      <br>
      <div class="row">
        <div class="form-group">
          <label class='col-md-2'>Jenis Alat</label>
          <div class='col-md-9'>
            <select data-placeholder="Pilih Jenis Alat" name="jenis" class="select-clear">
              <?php 
              $this->db->select(['daftar_alat_berat.id', 'daftar_alat_berat.jenis', 'COUNT(dislokasi_alat_berat.id_alat) AS jumlah_laporan_kerja'])
                ->from('dislokasi_alat_berat')
                ->join('daftar_alat_berat', 'daftar_alat_berat.id = dislokasi_alat_berat.id_alat')
                ->group_by('dislokasi_alat_berat.id_alat');

              $jenis = $this->db->get()->result();
              ?>
              <option value=""></option>
              <?php
              $no = 0;
              foreach ($jenis as $r) : $no++;
                echo '<option value="' . $r->id . '">' . $r->jenis . '</option>';
              endforeach;
              ?>
            </select>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="form-group">
          <label class='col-md-2'>Kondisi Alat</label>
          <div class='col-md-9'>
            <select data-placeholder="Pilih Status" name="kondisi" class="select-clear">
              <option value=""></option>
              <option value="BAIK">BAIK</option>
              <option value="RUSAK">RUSAK</option>
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