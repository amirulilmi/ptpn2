<?php echo br(2); ?>
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
  <div class="panel-body add-margin-top">
    <table class="table table-bordered table-hover" id="data">
     <div class="button-data">
       <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary"><i class="icon-file-plus"></i> Tambah </button>
     </div>
      <thead>
          <tr>
              <th>Nomor</th>
              <th>No KK</th>
              <th>RT</th>
              <th>RW</th>
              <th>Jumlah Individu</th>
              <th>Kepala Keluarga</th>
              <th><center>Opsi</center></th>
          </tr>
      </thead>
      <tbody>
          <?php $no=0; foreach($all as $row): $no++; ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $row->no_kk; ?></td>
              <td><?php echo $row->rt; ?></td>
              <td><?php echo $row->rw; ?></td>
              <?php $kk=$row->id_kk; ?>
              <td><?php echo $this->db->query("select * from penduduk where id_kk='$kk'")->num_rows();?></td>
              <td><?php if($row->kk==""){echo "<i>Belum Di Update</i>";}else{echo getnama($row->kk);}?></td>
              <td>
                <center>
                  <a href="<?php echo site_url('entry/detailkk/'.$row->id_kk); ?>"  data-popup="tooltip" data-original-title="Detail Data" data-placement="top"><img src="<?php base_url() ?>assets/images/detail.svg"></a>
                  <a href="<?php echo site_url('entry/editkk/'.$row->id_kk); ?>"  data-popup="tooltip" data-original-title="Edit Data" data-placement="top"><img src="<?php base_url() ?>assets/images/edit.svg"></a>
                  <a href="<?php echo site_url('entry/hapus/'.$row->id_kk); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');" data-popup="tooltip" data-original-title="Hapus Data" data-placement="top"><img src="<?php base_url() ?>assets/images/delete.svg" class=""></a>
                </center>
              </td>
            </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<div id="modal_theme_primary" class="modal fade">
  <div class="modal-dialog">
    <form action="<?php echo site_url('entry/addkk'); ?>" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title"><strong>Tambah Data KK</strong></h6>
      </div>
      <input type="hidden" name="id" value="<?php echo getid('kk','id_kk'); ?>" readonly class="form-control" >
      <div class="modal-body">
        <div class="form-group">
          <label class='col-md-3'>No KK</label>
          <div class='col-md-9'><input type="text" name="no_kk" autocomplete="off" required placeholder="Masukkan No KK" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>RT</label>
          <div class='col-md-9'><input type="text" name="rt" autocomplete="off" required placeholder="Masukkan RT" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>RW</label>
          <div class='col-md-9'><input type="text" name="rw" autocomplete="off" required placeholder="Masukkan RW" class="form-control" ></div>
        </div>
        <br>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"><i class="icon-checkmark-circle2"></i> Simpan</button>
        </div>
      </form>
  </div>
</div>

<script>
$(document).ready(function () {
  $('#data thead').addClass('thead-blue');
  
  $('#data').DataTable( {
  "columnDefs": [
    {
      "data": null,
    }
  ]
  });
});
</script>