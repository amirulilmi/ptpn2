<?php 
header("content-type:Application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Prestasi Alat.xls");
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
          <th>Jenis</th>
          <th>Pekerjaan</th>
          <th>Prestasi</th>
          <th>Kemampuan</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=0; foreach($all as $row): $no++;?>
      <tr>
        <td><center>&nbsp;<?php echo $no; ?></center></td>
        <td>&nbsp;<?php echo $row->jenis; ?></td>
        <td>&nbsp;<?php echo $row->pekerjaan; ?></td>
        <td>&nbsp;<?php echo $row->prestasi; ?></td>
        <td>&nbsp;<?php echo $row->kemampuan; ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<br>