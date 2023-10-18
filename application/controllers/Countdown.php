<?php

class Countdown extends CI_Controller
{
	function __construct()
	{

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		$this->load->model('M_Countdown');
		no_access();
		// leveladmin();
	}
	public function index()
	{
		$data = array(
			"title" => 'Laporan Alat Berat',
			"menu" => getmenu(),
			"aktif" => "alat_berat",
			"content" => "user/countdown.php",
		);

		// print_r($data['id']);exit;
		$this->breadcrumb->append_crumb('User', site_url('user'));
		$this->load->view('admin/template', $data);
	}

	public function get()
	{
		$draw = intval($this->input->get("draw"));
		$query = $this->M_Countdown->get();
		$data = [];

		$draw = intval($this->input->get("draw"));

		// print_r($query);exit;
		foreach ($query as $key => $r) {
			$data[] = array(
				'no' => $key + 1,
                'akhir' => $r['akhir'],
                'countdown_timer' =>'<div class="countdown" data-target-time="'.$r['akhir'].'"></div>',
                // 'countdown' => $r['akhir'],
				'opsi' => '<a style="margin-bottom:3px;padding:0px;margin:0px" href="#" onclick="byid(' . $r['id'] . ')" class="badge"><img src="' . base_url() . 'assets/images/edit.svg"></a>
                <a href="#"  onclick="deleted(' . $r['id'] . ')" class=" "><img src=" ' . base_url() . 'assets/images/delete.svg"></a>
                '
			);
		}
		$result = array(
			"draw" => $draw,
			"data" => $data
		);

		echo json_encode($result);
	}

	public function add()
	{

		// print_r($this->input->post());
		// exit;
		$cek = $this->M_Countdown->add();

		if ($cek > 0) {
			$message['status'] = 'success';
		} else {
			$message['status'] = 'failed';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($message));
	}

	// public function byid($id)
	// {
	// 	$data = array(
	// 		"alat_berat" => $this->M_Spesifikasi_Alat->getAlatBeratById($id),
	// 	);
	// 	// print_r($data);exit;
	// 	$this->output->set_content_type('application/json')->set_output(json_encode($data));
	// }

	// public function edit()
	// {
	// 	$id = $this->input->post('id');

	// 	// print_r($this->input->post());exit;
	// 	$cek = $this->M_Spesifikasi_Alat->prosesEdit($id);

	// 	if ($cek > 0) {
	// 		$message['status'] = 'success';
	// 	} else {
	// 		$message['status'] = 'failed';
	// 	}

	// 	$this->output->set_content_type('application/json')->set_output(json_encode($message));
	// }

	// public function delete($id)
	// {
	// 	if ($id == "") {
	// 		$message['status'] = 'failed';
	// 	} else {
	// 		$cek = $this->M_Spesifikasi_Alat->delete($id);

	// 		if ($cek > 0) {
	// 			$message['status'] = 'success';
	// 		} else {
	// 			$message['status'] = 'failed';
	// 		}
	// 	}

	// 	$this->output->set_content_type('application/json')->set_output(json_encode($message));
	// }
}
