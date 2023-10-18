<br><br>
<?php 
$data=$this->session->flashdata('sukses');
if($data!=""){ ?>
<div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
<?php } ?>
<?php 
$data2=$this->session->flashdata('error');
if($data2!=""){ ?>
<div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
<?php } ?>
<div class="panel panel-primary border-radius">
  <div class="panel-heading header-radius">
    <h5 class="panel-title"><i class="icon-city"></i> Manajemen Perusahaan</h5>
  </div>
  <div class="panel-body">
    <table class="table table-bordered table-hover">
      <tr>
        <th>Perusahaan</th>
        <td><?php echo $getrow['desa']; ?></td>
      </tr>
      <tr>
        <th>Kota</th>
        <td><?php echo $getrow['kecamatan']; ?></td>
      </tr>
      <tr>
        <th>Provinsi</th>
        <td><?php echo $getrow['kabupaten']; ?></td>
      </tr>
      <tr>
        <th>Direktur</th>
        <td><?php if($getrow['kepala_desa']==""){echo '<i>Belum Di Update</i>';}else{echo $getrow['kepala_desa'];} ?></td>
      </tr>
    </table>

    <?php if (id_akses() != 3) { ?>
    <div class="update-made">
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary"><i class="icon-pencil"></i> Update </button>
    </div>
    <?php } ?>
  </div>
</div>
<div id="modal_theme_primary" class="modal fade">
      <div class="modal-dialog">
        <form action="<?php echo site_url('Ins/add'); ?>" method="post">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h6 class="modal-title"><strong>Update Data</strong></h6>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label class='col-md-3'>Desa</label>
                <div class='col-md-9'><input type="text" value="<?php echo $getrow['desa']; ?>" name="desa" autocomplete="off" required placeholder="Masukkan Desa" class="form-control" ></div>
              </div>
              <br>
              <div class="form-group">
                <label class='col-md-3'>Kecamatan</label>
                <div class='col-md-9'><input type="text" name="kecamatan" value="<?php echo $getrow['kecamatan']; ?>" autocomplete="off" required placeholder="Masukkan Kecamatan" class="form-control" ></div>
              </div>
              <br>
              <div class="form-group">
                <label class='col-md-3'>Kabupaten</label>
                <div class='col-md-9'><input type="text" name="kabupaten" value="<?php echo $getrow['kabupaten']; ?>" autocomplete="off" required placeholder="Masukkan Kabupaten" class="form-control" ></div>
              </div>
              <br>
              <div class="form-group">
                <label class='col-md-3'>Kepala Desa</label>
                <div class='col-md-9'>
                  <input type="text" name="kepala_desa" autocomplete="off" value="<?php echo $getrow['kepala_desa']; ?>" required placeholder="Masukkan Kepala Desa" class="form-control" >
                </div>
              </div>
              <br>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary"><i class="icon-pencil"></i> Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>