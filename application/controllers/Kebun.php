<?php

class Kebun extends CI_Controller
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
		$this->load->model('M_Kebun');
		no_access();
		// leveladmin();
	}
	public function index()
	{
		$data = array(
			"title" => 'Daftar Kebun',
			"menu" => getmenu(),
			"aktif" => "kebun",
			"content" => "user/kebun.php",
		);

		// print_r($data['id']);exit;
		$this->breadcrumb->append_crumb('User', site_url('user'));
		$this->load->view('admin/template', $data);
	}

	public function get()
	{
		$draw = intval($this->input->get("draw"));
		$query = $this->M_Kebun->get();
		$data = [];

		$draw = intval($this->input->get("draw"));

		foreach ($query as $key => $r) {
			$data[] = array(
				'no' => $key + 1,
				'kode' => $r['kode'],
                'nama' => $r['nama'],
				'komoditi' => $r['komoditi'],
				'distrik' => $r['distrik'],
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
		$cek = $this->M_Kebun->add();

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
			"kebun" => $this->M_Kebun->getAlatBeratById($id),
		);
		// print_r($data);exit;
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function edit()
	{
		$id = $this->input->post('id');

		// print_r($this->input->post());exit;
		$cek = $this->M_Kebun->prosesEdit($id);

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
			$cek = $this->M_Kebun->delete($id);

			if ($cek > 0) {
				$message['status'] = 'success';
			} else {
				$message['status'] = 'failed';
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($message));
	}
}
