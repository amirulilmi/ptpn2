<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Laporan_Prestasi_Alat extends CI_Model {

	public function all()
	{
		$q= $this->db->query("SELECT * FROM prestasi");
		return $q->result();	
	}
}

