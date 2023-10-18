<?php
header("content-type:Application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Dislokasi Alat Berat.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<style>
  td {
    vertical-align: middle;
  }
</style>
<table border="1" style="font-size:13px;border:100px;font-family:Arial;">
    <thead>
      <tr>
          <th>No</th>
          <th width='150'>Tanggal</th>
          <th>Kode Alat Berat</th>
          <th>Jenis Alat</th>
          <th>Kebun</th>
          <th>No Unit</th>
          <th>Kondisi</th>
          <th>Keterangan</th>

      </tr>
    </thead>
    <tbody>
      <?php $no=0; foreach($all as $row): $no++;?>
      <tr>
        <td><center>&nbsp;<?php echo $no; ?></center></td>
        <td>&nbsp;<?php echo $row->date; ?></td>
        <td width="80">&nbsp;<?php echo $row->kode_alat_berat; ?></td>
        <td>&nbsp;<?php echo $row->jenis; ?></td>
        <td>&nbsp;<?php echo $row->kode; ?></td>
        <td>&nbsp;<?php echo $row->no_unit; ?></td>
        <td>&nbsp;<?php echo $row->kondisi; ?></td>
        <td>&nbsp;<?php echo $row->keterangan; ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<br>