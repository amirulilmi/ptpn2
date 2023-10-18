<?php

class Dislokasi_Alat extends CI_Controller
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
		$this->load->model('M_Dislokasi_Alat');
		no_access();
		// leveladmin();
	}
	public function index()
	{
		$data = array(
			"title" => 'Dislokasi Alat Berat',
			"menu" => getmenu(),
			"aktif" => "disk",
			"content" => "user/dislokasi_alat.php",
            "date" =>  $this->M_Dislokasi_Alat->getDate(),
            "jenis" =>  $this->M_Dislokasi_Alat->getJenis(),
			"kebun" =>  $this->M_Dislokasi_Alat->getKebun(),
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
		// $query = $this->M_Dislokasi_Alat->get();
		$data = [];

		// print_r($this->input->post()['jenis_alat']);exit;


        if ($this->input->post()['pelatihan'] == '') {
			if ($this->input->post()['jenis_alat'] == '') {
				$query = $this->M_Dislokasi_Alat->get();
			} else {
				$query = $this->M_Dislokasi_Alat->getDislokasiAlatByJenis($this->input->post()['jenis_alat']);
			}
		}
		if ($this->input->post()['pelatihan'] != '') {
			if ($this->input->post()['jenis_alat'] == '') {
				$query = $this->M_Dislokasi_Alat->getDislokasiAlatByDate($this->input->post()['pelatihan']);
			} else {
				$query = $this->M_Dislokasi_Alat->getDislokasiAlatByJenisAndDate($this->input->post()['pelatihan'], $this->input->post()['jenis_alat']);
			}
		}

		// print_r($query);exit;

        // if ($this->input->post()['pelatihan'] == '') {
		// 	$query = $this->M_Dislokasi_Alat->get();
		// } else {
		// 	$query = $this->M_Dislokasi_Alat->getDislokasiAlatByDate($this->input->post()['pelatihan']);
		// }

		$draw = intval($this->input->get("draw"));

		foreach ($query as $key => $r) {
			$data[] = array(
				'no' => $key + 1,
				'date' => $r['date'],
				'kode_alat_berat' => $r['kode_alat_berat'],
                'jenis' => $r['jenis'],
                'kode' => $r['kode'],
				'kondisi' => $r['kondisi'],
				'no_unit' => $r['no_unit'],
				'keterangan' => $r['keterangan'],
				'opsi' => '<a style="margin-bottom:3px;padding:0px;margin:0px" href="#" onclick="byid(' . $r['id_dislokasi'].')" class="badge"><img src="' . base_url() . 'assets/images/edit.svg"></a>
                <a href="#"  onclick="deleted(' . $r['id_dislokasi'] . ')" class=" "><img src=" ' . base_url() . 'assets/images/delete.svg"></a>
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
		$cek = $this->M_Dislokasi_Alat->getforadd();

		if ($cek > 0) {
			$message['status'] = 'success';
		} else {
			$message['status'] = 'failed';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($message));
	}

	
	public function add2()
	{

		// print_r($this->input->post());
		// exit;
		$cek = $this->M_Dislokasi_Alat->add();

		if ($cek > 0) {
			$message['status'] = 'success';
		} else {
			$message['status'] = 'failed';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($message));
	}
	public function byid($id)
	{

		// print_r($id);exit;
		$data = array(
			"daftar_dislokasi_alat" => $this->M_Dislokasi_Alat->getDislokasiAlatById($id),
		);
		// print_r($data);exit;
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function edit()
	{
		$id = $this->input->post('id_dislokasi');

		// print_r($this->input->post());exit;
		$cek = $this->M_Dislokasi_Alat->prosesEdit($id);

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
			$cek = $this->M_Dislokasi_Alat->delete($id);

			if ($cek > 0) {
				$message['status'] = 'success';
			} else {
				$message['status'] = 'failed';
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($message));
	}
}
