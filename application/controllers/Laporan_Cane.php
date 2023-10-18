<?php

class Laporan_Cane extends CI_Controller {
	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		$this->load->model('M_laporan_Cane');
		no_access();
        // leveladmin();
	}
	public function index()
	{
		$data=array(
			"title"=>'Laporan',
			"menu"=>getmenu(),
			"aktif"=>"laporan_cane",
			"content"=>"laporan_cane/index.php",
		);
		$this->breadcrumb->append_crumb('Laporan', site_url('laporan'));
		$this->load->view('admin/template',$data);
	}
	public function eks()
	{
		$data['all']=$this->M_laporan_Cane->all();
		$this->load->view('admin/laporan_cane/eks',$data);
	}
}
