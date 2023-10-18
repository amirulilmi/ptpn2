<?php 
header("content-type:Application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Spesifikasi Alat Berat.xls");
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
          <th>Merk</th>
          <th>Horse Power</th>
          <th>Bahan Bakar</th>
          <th>Tahun Perolehan</th>
          <th>Jumlah Unit</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=0; foreach($all as $row): $no++;?>
      <tr>
        <td><center>&nbsp;<?php echo $no; ?></center></td>
        <td>&nbsp;<?php echo $row->merk; ?></td>
        <td>&nbsp;<?php echo $row->horse_power; ?></td>
        <td>&nbsp;<?php echo $row->bahan_bakar; ?></td>
        <td>&nbsp;<?php echo $row->tahun_perolehan; ?></td>
        <td>&nbsp;<?php echo $row->jumlah_unit; ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<br>