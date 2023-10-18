<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_laporan_Bell extends CI_Model {

	public function all()
	{
		$date=$_POST['date'];
        $month=$_POST['month'];
		if($date!=""){
			$and="AND bell_cane.date='$date'";
		}else{
			$and="";
		}
        if($month!=""){
			$and1="AND bell_cane.month='$month'";
		}else{
			$and1="";
		}
		$q= $this->db->query("SELECT * FROM bell_cane 
							WHERE bell_cane.id!=''
							".$and."".$and1."
							");
		return $q->result();	
	}
}

/* End of file M_laporan.php */
/* Location: ./application/models/M_laporan.php */