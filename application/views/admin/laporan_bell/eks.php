<?php
header("content-type:Application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan Bell Cane.xls");
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
            <th rowspan="3">NO</th>
            <th rowspan="3">DATE</th>
            <th rowspan="3">KEBUN</th>
            <th rowspan="3">RAYON</th>
            <th rowspan="3">NO UNIT</th>
            <th colspan="4">
                <center>JUMLAH TRIP TRUK</center>
            </th>
            <th colspan="3">
                <center>JUMLAH HARIAN</center>
            </th>
            <th colspan="6">
                <center>ESTIMASI TONASE DITEBANG</center>
            </th>
            <th colspan="4">
                <center>HM ALAT</center>
            </th>
            <th colspan="2" rowspan="2">
                <center>PRESTASI TON/HM</center>
            </th>
            <th rowspan="3">
                <center>HARI KERJA EFEKTIF</center>
            </th>
            <th colspan="2">
                <center>WAKTU MUAT</center>
            </th>

            <th rowspan="3">
                <center>KETERANGAN</center>
            </th>
        </tr>
        <tr>
            <th colspan="2">
                <center>BESAR</center>
            </th>
            <th colspan="2">
                <center>KECIL</center>
            </th>
            <th colspan="3">
                <center>TRIP/UNIT</center>
            </th>
            <th colspan="2">
                <center>BESAR 10 TON</center>
            </th>
            <th colspan="2">
                <center>KECIL 7 TON</center>
            </th>
            <th colspan="2">
                <center>TOTAL</center>
            </th>
            <th colspan="2">
                <center>EFEKTIF</center>
            </th>
            <th colspan="2">
                <center>LOADING</center>
            </th>
            <th rowspan="2">
                <center>MULAI</center>
            </th>
            <th rowspan="2">
                <center>SELESAI</center>
            </th>
         
        </tr>
        <tr>
            <th>
                <center>HI</center>
            </th>
            <th>
                <center>SD HI</center>
            </th>
            <th>
                <center>HI</center>
            </th>
            <th>
                <center>SD HI</center>
            </th>
            <th>
                <center>HI</center>
            </th>
            <th>
                <center>SD HI</center>
            </th>
            <th>
                <center>RATAAN</center>
            </th>
            <th>
                <center>HI</center>
            </th>
            <th>
                <center>SD HI</center>
            </th>
            <th>
                <center>HI</center>
            </th>
            <th>
                <center>SD HI</center>
            </th>
            <th>
                <center>HI</center>
            </th>
            <th>
                <center>SD HI</center>
            </th>
            <th>
                <center>HI</center>
            </th>
            <th>
                <center>SD HI</center>
            </th>
            <th>
                <center>HI</center>
            </th>
            <th>
                <center>SD HI</center>
            </th>
            <th>
                <center>HI</center>
            </th>
            <th>
                <center>SD HI</center>
            </th>

        </tr>
    </thead>
    <tbody>
        <?php $no = 0;
        foreach ($all as $row) : $no++; ?>
            <tr>
                <td>
                    <center>&nbsp;<?php echo $no; ?></center>
                </td>
                <td>&nbsp;<?php echo $row->date; ?></td>
                <td width="80">&nbsp;<?php echo $row->kebun; ?></td>
                <td width="80">&nbsp;<?php echo $row->rayon; ?></td>
                <td>&nbsp;<?php echo $row->no_unit; ?></td>
                <td>&nbsp;<?php echo $row->hi_besar_jtt; ?></td>
                <td>&nbsp;<?php echo $row->sdhi_besar_jtt; ?></td>
                <td width="100">&nbsp;<?php echo $row->hi_kecil_jtt; ?></td>
                <td>&nbsp;<?php echo $row->sdhi_kecil_jtt; ?></td>
                <td>&nbsp;<?php echo $row->hi_jh; ?></td>
                <td>&nbsp;<?php echo $row->sdhi_jh; ?></td>
                <td>&nbsp;<?php echo $row->rataan_jh; ?></td>
                <td>&nbsp;<?php echo $row->hi_10ton_etd; ?></td>
                <td>&nbsp;<?php echo $row->sdhi_10ton_etd; ?></td>
                <td>&nbsp;<?php echo $row->hi_7ton_etd; ?></td>
                <td>&nbsp;<?php echo $row->sdhi_7ton_etd; ?></td>
                <td>&nbsp;<?php echo $row->hi_total_etd; ?></td>
                <td>&nbsp;<?php echo $row->sdhi_total_etd; ?></td>
                <td>&nbsp;<?php echo $row->hi_efektif_hm; ?></td>
                <td>&nbsp;<?php echo $row->sdhi_efektif_hm; ?></td>
                <td>&nbsp;<?php echo $row->hi_loading_hm; ?></td>
                <td>&nbsp;<?php echo $row->sdhi_loading_hm; ?></td>
                <td>&nbsp;<?php echo $row->hi_prestasi; ?></td>
                <td>&nbsp;<?php echo $row->sdhi_prestasi; ?></td>
                <td>&nbsp;<?php echo $row->hari_kerja_efektif; ?></td>
                <td>&nbsp;<?php echo $row->waktu_mulai; ?></td>
                <td>&nbsp;<?php echo $row->waktu_selesai; ?></td>
                <td>&nbsp;<?php echo $row->keterangan; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<br>