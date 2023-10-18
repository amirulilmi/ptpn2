<?php

class Bell_Cane extends CI_Controller
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
		$this->load->model('M_Bell');
		no_access();
		// leveladmin();
	}
	public function index()
	{
		$data = array(
			"title" => 'Laporan Bell Cane',
			"menu" => getmenu(),
			"aktif" => "bell_cane",
			"content" => "user/bell_cane.php",
			'date' => $this->M_Bell->getByDate(),
		);

		// print_r($data['id']);exit;
		$this->breadcrumb->append_crumb('User', site_url('user'));
		$this->load->view('admin/template', $data);
	}

	public function get()
	{
		$draw = intval($this->input->get("draw"));
		// $query = $this->M_Bell->get();
		$data = [];

		if ($this->input->post()['pelatihan'] == '') {
			$query = $this->M_Bell->get();
		} else {
			$query = $this->M_Bell->getCaneHarvesterByDate($this->input->post()['pelatihan']);
		}

		$draw = intval($this->input->get("draw"));
		// print_r($query);
		// exit;
		foreach ($query as $key => $r) {
			$data[] = array(
				'date' => $r['date'],
				'kebun' => $r['kebun'],
				'no_unit' => $r['no_unit'],
				'hi_besar_jtt' => $r['hi_besar_jtt'],
				'sdhi_besar_jtt' => $r['sdhi_besar_jtt'],
				'hi_kecil_jtt' => $r['hi_kecil_jtt'],
				'sdhi_kecil_jtt' => $r['sdhi_kecil_jtt'],
				'hi_jh' => $r['hi_jh'],
				'sdhi_jh' => $r['sdhi_jh'],
				'rataan_jh' => $r['rataan_jh'],
				'keterangan' => $r['keterangan'],
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
		$cek = $this->M_Bell->add();

		if ($cek > 0) {
			$message['status'] = 'success';
		} else {
			$message['status'] = 'failed';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($message));
	}

	public function byid($id)
	{
		$data = array(
			"bell_cane" => $this->M_Bell->getCaneHarvesterById($id),
		);
		// print_r($data);exit;
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function edit()
	{
		$id = $this->input->post('id');

		// print_r($this->input->post('id'));exit;
		$cek = $this->M_Bell->prosesEdit($id);

		if ($cek > 0) {
			$message['status'] = 'success';
		} else {
			$message['status'] = 'failed';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($message));
	}

	public function delete($id)
	{
		if ($id == "") {
			$message['status'] = 'failed';
		} else {
			$cek = $this->M_Bell->delete($id);

			if ($cek > 0) {
				$message['status'] = 'success';
			} else {
				$message['status'] = 'failed';
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($message));
	}
}
