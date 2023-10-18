<?php
header("content-type:Application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Kebun.xls");
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
          <th>Kode Kebun</th>
          <th>Nama</th>
          <th>Komoditi</th>
          <th>Distrik</th>

      </tr>
    </thead>
    <tbody>
      <?php $no=0; foreach($all as $row): $no++;?>
      <tr>
        <td><center>&nbsp;<?php echo $no; ?></center></td>
        <td>&nbsp;<?php echo $row->kode; ?></td>
        <td>&nbsp;<?php echo $row->nama; ?></td>
        <td>&nbsp;<?php echo $row->komoditi; ?></td>
        <td>&nbsp;<?php echo $row->distrik; ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<br>