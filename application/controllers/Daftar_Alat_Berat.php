<?php

class Daftar_Alat_Berat extends CI_Controller
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
		$this->load->model('M_Alat_Berat');
		no_access();
		// leveladmin();
	}
	public function index()
	{
		$data = array(
			"title" => 'Daftar Alat Berat',
			"menu" => getmenu(),
			"aktif" => "daftar_alat_berat",
			"content" => "user/daftar_alat_berat.php",
            "id" =>  $this->M_Alat_Berat->getDaftarAlatBeratId()
		);

		// print_r($data['id']);exit;
		$this->breadcrumb->append_crumb('User', site_url('user'));
		$this->load->view('admin/template', $data);
	}

    public function getDaftarAlatId()
	{
		$data = array(
			"id" => $this->M_Alat_Berat->getDaftarAlatBeratId(),
		);
		// print_r($data);exit;
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
		// echo json_encode($data);
	}

	public function get()
	{
		$draw = intval($this->input->get("draw"));
		$query = $this->M_Alat_Berat->getDaftarAlatBerat();
		$data = [];

		$draw = intval($this->input->get("draw"));

		foreach ($query as $key => $r) {
			$data[] = array(
				'no' => $key + 1,
				'jenis' => $r['jenis'],
				'bahan_bakar' => $r['bahan_bakar'],
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

		$cek = $this->M_Alat_Berat->addDaftarAlatBerat();

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
			"daftar_alat_berat" => $this->M_Alat_Berat->getDaftarAlatBeratById($id),
		);
		// print_r($data);exit;
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function edit()
	{
		$id = $this->input->post('id');

		// print_r($this->input->post());exit;
		$cek = $this->M_Alat_Berat->prosesEditDaftarAlat($id);

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
			$cek = $this->M_Alat_Berat->deleteDaftarAlat($id);

			if ($cek > 0) {
				$message['status'] = 'success';
			} else {
				$message['status'] = 'failed';
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($message));
	}
}
