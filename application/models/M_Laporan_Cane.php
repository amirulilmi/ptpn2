<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_laporan_Cane extends CI_Model {

	public function all()
	{
		$date=$_POST['date'];
        $month=$_POST['month'];
		if($date!=""){
			$and="AND cane_harvester.date='$date'";
		}else{
			$and="";
		}
        if($month!=""){
			$and1="AND cane_harvester.month='$month'";
		}else{
			$and1="";
		}
		$q= $this->db->query("SELECT * FROM cane_harvester 
							WHERE cane_harvester.id!=''
							".$and."".$and1."
							");
		return $q->result();	
	}
}

/* End of file M_laporan.php */
/* Location: ./application/models/M_laporan.php */