<?php

class Laporan_Alat_Berat extends CI_Controller
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
			"title" => 'Laporan Alat Berat',
			"menu" => getmenu(),
			"aktif" => "laporan_alat_berat",
			"content" => "user/laporan_alat_berat.php",
			'laporan_kerja_alat_berat' => $this->db->get('laporan_kerja_alat_berat')->result_array(),
			'date' => $this->M_Alat_Berat->getByDate(),
			'jenis' => $this->M_Alat_Berat->getDaftarAlatBerat(),
			"kebun" =>  $this->M_Alat_Berat->getKebun(),
			 
		);

		// print_r($data['date']);exit; 
		$this->breadcrumb->append_crumb('User', site_url('user'));
		$this->load->view('admin/template', $data);
	}

	public function get()
	{
		$draw = intval($this->input->get("draw"));
		// $query = $this->M_Alat_Berat->getAlatBerat();
		$data = [];

		if ($this->input->post()['pelatihan'] == '') {
			if ($this->input->post()['jenis_alat'] == '') {
				$query = $this->M_Alat_Berat->getAlatBerat();
			} else {
				$query = $this->M_Alat_Berat->getAlatBeratBy2($this->input->post()['jenis_alat']);
			}
		}
		if ($this->input->post()['pelatihan'] != '') {
			if ($this->input->post()['jenis_alat'] == '') {
				$query = $this->M_Alat_Berat->getAlatBeratBy($this->input->post()['pelatihan']);
			} else {
				$query = $this->M_Alat_Berat->getAlatBeratBy3($this->input->post()['pelatihan'], $this->input->post()['jenis_alat']);
			}
		}

		$draw = intval($this->input->get("draw"));

		// print_r($this->input->post()['tes']);exit;
		// print_r($query);exit;

		foreach ($query as $key => $r) {
			$data[] = array(
				'date' => $r['date'],
				'kode_alat_berat' => $r['kode_alat_berat'],
				'jenis' => $r['jenis'],
				'no_unit' => $r['no_unit'],
				'kebun' => $r['kode'],
				'realisasi_pekerjaan' => $r['realisasi_pekerjaan'],
				'hm_alat' => $r['hm_alat'],
				'bahan' => $r['bahan'],
				'prestasi_alat' => $r['prestasi_alat'],
				'kondisi_alat_berat' => $r['kondisi_alat_berat'],
				'keterangan' => $r['keterangan'],
				'opsi' => '<a style="margin-bottom:3px;padding:0px;margin:0px" href="#" onclick="byid(' . $r['id_laporan_kerja'] . ')" class="badge"><img src="' . base_url() . 'assets/images/edit.svg"></a>
                <a href="#"  onclick="deleted(' . $r['id_laporan_kerja'] . ')" class=" "><img src=" ' . base_url() . 'assets/images/delete.svg"></a>
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
		$cek = $this->M_Alat_Berat->getforadd();

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
		$cek = $this->M_Alat_Berat->add();

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
			"laporan_alat_berat" => $this->M_Alat_Berat->getAlatBeratById($id),
		);
		// print_r($data);exit;
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function edit()
	{
		$id = $this->input->post('id');

		// print_r($this->input->post('id'));exit;
		$cek = $this->M_Alat_Berat->proses_edit($id);

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
			$cek = $this->M_Alat_Berat->delete($id);

			if ($cek > 0) {
				$message['status'] = 'success';
			} else {
				$message['status'] = 'failed';
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($message));
	}
}
