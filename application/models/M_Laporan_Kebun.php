<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_laporan_Kebun extends CI_Model
{

	public function all()
	{
		$komoditi = $_POST['date'];
		// $jenis = $_POST['jenis'];
		// $status = $_POST['kondisi_alat_berat'];
		if ($komoditi != "") {
			$and = "AND kebun.komoditi='$komoditi'";
		} else {
			$and = "";
		}
		// if ($jenis != "") {
		// 	$and1 = "AND id_alat='$jenis'";
		// } else {
		// 	$and1 = "";
		// }
		// if ($status != "") {
		// 	$and2 = "AND kondisi_alat_berat='$status'";
		// } else {
		// 	$and2 = "";
		// }
		$q = $this->db->query("SELECT * FROM kebun 
							WHERE kebun.komoditi!=''
							" . $and . " " );

		// $q = $this->db->query("
		// 	SELECT *
		// 	FROM laporan_kerja_alat_berat
		// 	LEFT JOIN daftar_alat_berat ON laporan_kerja_alat_berat.id_alat = daftar_alat_berat.id
		// 	LEFT JOIN kebun ON laporan_kerja_alat_berat.id_kebun = kebun.id
		// 	WHERE laporan_kerja_alat_berat.kode_alat_berat != ''
		// 	" . $and . " " . $and1 . " " . $and2 . "
		// ");
		return $q->result();
	}
}

/* End of file M_laporan.php */
/* Location: ./application/models/M_laporan.php */