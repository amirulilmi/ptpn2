<?php

class Laporan_Prestasi_Alat extends CI_Controller {
	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		$this->load->model('M_Laporan_Prestasi_Alat');
		no_access();
        // leveladmin();
	}
	public function index()
	{
		$data=array(
			"title"=>'Laporan',
			"menu"=>getmenu(),
			"aktif"=>"download_prestasi",
			"content"=>"laporan_prestasi_alat/index.php",
		);
		$this->breadcrumb->append_crumb('Laporan', site_url('laporan'));
		$this->load->view('admin/template',$data);
	}
	public function eks()
	{
		$data['all']=$this->M_Laporan_Prestasi_Alat->all();
		$this->load->view('admin/laporan_prestasi_alat/eks',$data);
	}
}
