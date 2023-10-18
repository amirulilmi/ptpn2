<?php 
header("content-type:Application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Kerja Alat berat.xls");
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
          <th width='150'>Kode Alat</th>
          <th width='200'>Jenis Alat</th>
          <th>No Unit</th>
          <th>Kebun</th>
          <th>Realisasi Pekerjaan</th>
          <th>HM Alat</th>
          <th>Bahan Bakar</th>
          <th>Prestasi Alat</th>
          <th>Kondisi Alat</th>
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
        <td>&nbsp;<?php echo $row->no_unit; ?></td>
        <td>&nbsp;<?php echo $row->kode; ?></td>
        <td width="100">&nbsp;<?php echo $row->realisasi_pekerjaan; ?></td>
        <td>&nbsp;<?php echo $row->hm_alat; ?></td>
        <td>&nbsp;<?php echo $row->bahan; ?></td>
        <td>&nbsp;<?php echo $row->prestasi_alat; ?></td>
        <td>&nbsp;<?php echo $row->kondisi_alat_berat; ?></td>
        <td>&nbsp;<?php echo $row->keterangan; ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<br>