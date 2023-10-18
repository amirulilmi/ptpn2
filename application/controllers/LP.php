<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LP extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// in_access();
		// $this->load->model('M_login');
	}

	public function index()
	{
	
		// $result['data'] = $this->db->query("select * from artikel where kategori='1'")->result_array();
		// $result['data2'] =$this->db->query("select * from artikel where kategori='2'")->result_array();
		$this->load->view('lp');
	}
	
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */