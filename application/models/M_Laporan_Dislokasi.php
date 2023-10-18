<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_laporan_Dislokasi extends CI_Model {

	public function all()
	{
		$date=$_POST['date'];
		$jenis=$_POST['jenis'];
		$status=$_POST['kondisi'];
		if($date!=""){
			$and="AND dislokasi_alat_berat.date='$date'";
		}else{
			$and="";
		}
		if($jenis!=""){
			$and1="AND id_alat='$jenis'";
		}else{
			$and1="";
		}
		if($status!=""){
			$and2="AND kondisi='$status'";
		}else{
			$and2="";
		}
		$q = $this->db->query("
			SELECT *
			FROM dislokasi_alat_berat
			LEFT JOIN daftar_alat_berat ON dislokasi_alat_berat.id_alat = daftar_alat_berat.id
			LEFT JOIN kebun ON dislokasi_alat_berat.id_kebun = kebun.id
			WHERE dislokasi_alat_berat.kode_alat_berat != ''
			" . $and . " " . $and1 . " " . $and2 . "
		");
		return $q->result();	
	}
}

/* End of file M_laporan.php */
/* Location: ./application/models/M_laporan.php */