<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Laporan_Daftar_Alat extends CI_Model {

	public function all()
	{
		$q= $this->db->query("SELECT * FROM daftar_alat_berat");
		return $q->result();	
	}
}

