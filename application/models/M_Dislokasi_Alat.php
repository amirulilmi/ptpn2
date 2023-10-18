<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Dislokasi_Alat extends CI_Model
{

    public function get()
    {
        // $this->db->select(['*', 'trainer.id as id_trainer'])
        $this->db->select(['*', 'dislokasi_alat_berat.id AS id_dislokasi']);
        $this->db->from('dislokasi_alat_berat');
        $this->db->join('daftar_alat_berat', 'daftar_alat_berat.id = dislokasi_alat_berat.id_alat');
        $this->db->join('kebun', 'kebun.id = dislokasi_alat_berat.id_kebun');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDate()
    {
        $this->db->select('date');
        $this->db->distinct();
        $query = $this->db->get('dislokasi_alat_berat');
        return $query->result_array();
    }

    public function getJenis()
    {
        $query = $this->db->get('daftar_alat_berat');
        return $query->result_array();
    }

    public function getKebun()
    {
        $query = $this->db->get('kebun');
        return $query->result_array();
    }

    public function getforadd()
    {
        $this->db->select('*')
            ->from('dislokasi_alat_berat')
            ->where(['date' => $this->input->post('date1')]);
        $dataa = $this->db->get()->result_array();

        foreach ($dataa as $key => $r) {

            $data = [
                'date' => $this->input->post('date'),
                'id_alat' => $r['id_alat'],
                'id_kebun' => $r['id_kebun'],
                'kode_alat_berat' => $r['kode_alat_berat'],
                'kondisi' => $r['kondisi'],
                'no_unit' => $r['no_unit'],
                'keterangan' => $r['keterangan'],

            ];
            $this->db->insert('dislokasi_alat_berat', $data);
        }
        // print_r($data);exit;

        return 1;
    }

    public function add()
    {
            $data = [
                'date' => $this->input->post('date'),
                'id_alat' => $this->input->post('jenis'),
                'id_kebun' => $this->input->post('kebun'),
                'kode_alat_berat' => $this->input->post('kode_alat_berat'),
                'kondisi' => $this->input->post('kondisi'),
                'no_unit' => $this->input->post('no_unit'),
                'keterangan' => $this->input->post('keterangan'),
            ];
            $this->db->insert('dislokasi_alat_berat', $data);
        
        // print_r($data);exit;

        return 1;
    }

    public function getDislokasiAlatByDate($date)
    {
        $this->db->select(['*', 'dislokasi_alat_berat.id AS id_dislokasi'])
            ->from('dislokasi_alat_berat')
            ->join('daftar_alat_berat', 'daftar_alat_berat.id = dislokasi_alat_berat.id_alat')
            ->join('kebun', 'kebun.id = dislokasi_alat_berat.id_kebun')
            ->where(['date' => $date]);
        return $this->db->get()->result_array();
    }

    public function getDislokasiAlatByJenis($jenis)
    {
        $this->db->select(['*', 'dislokasi_alat_berat.id AS id_dislokasi'])
            ->from('dislokasi_alat_berat')
            ->join('daftar_alat_berat', 'daftar_alat_berat.id = dislokasi_alat_berat.id_alat')
            ->join('kebun', 'kebun.id = dislokasi_alat_berat.id_kebun')
            ->where(['id_alat' => $jenis]);
        return $this->db->get()->result_array();
    }

    public function getDislokasiAlatByJenisAndDate($date, $jenis)
    {
        $this->db->select(['*', 'dislokasi_alat_berat.id AS id_dislokasi'])
            ->from('dislokasi_alat_berat')
            ->join('daftar_alat_berat', 'daftar_alat_berat.id = dislokasi_alat_berat.id_alat')
            ->join('kebun', 'kebun.id = dislokasi_alat_berat.id_kebun')
            ->where(['date' => $date])
            ->where(['id_alat' => $jenis]);
        return $this->db->get()->result_array();
    }

    public function getDislokasiAlatById($id)
    {
        // $data = $this->db->get_where('dislokasi_alat_berat', ['id' => $id])->row_array();
        // return $data->row_array();

        // $id_alat = $data['id_alat'];
        // $id_kebun = $data['id_kebun'];
        // $no_unit = $data['no_unit'];

        $this->db->select(['*', 'dislokasi_alat_berat.id AS id_dislokasi'])
            ->from('dislokasi_alat_berat')
            ->join('daftar_alat_berat', 'daftar_alat_berat.id = dislokasi_alat_berat.id_alat')
            ->join('kebun', 'kebun.id = dislokasi_alat_berat.id_kebun')
            ->where('dislokasi_alat_berat.id', $id);
        // ->where(['no_unit' => $no_unit]);
        return $this->db->get()->row_array();
    }

    public function prosesEdit($id)
    {
        // print_r($id);exit;


        //untuk mengupdate table laporan kerja alat berat
        $kode_alat_berat = $this->input->post('kode_alat_berat');
        $date = $this->input->post('date');

        $data = [
            'id_kebun' => $this->input->post('kebun'),
            'no_unit' => $this->input->post('no_unit'),
            'kondisi_alat_berat' => $this->input->post('kondisi'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->db->where('date', $date);
        $this->db->where('kode_alat_berat', $kode_alat_berat);
        $this->db->update('laporan_kerja_alat_berat', $data);

        //untuk mengupdate table dislokasi alat berat
        $data = [
            'date' => $this->input->post('date'),
            'id_alat' => $this->input->post('jenis'),
            'id_kebun' => $this->input->post('kebun'),
            'kode_alat_berat' => $this->input->post('kode_alat_berat'),
            'kondisi' => $this->input->post('kondisi'),
            'no_unit' => $this->input->post('no_unit'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->db->where('id', $id);
        $this->db->update('dislokasi_alat_berat', $data);
        return 1;
    }

    public function delete($id)
    {
        // print_r($id);exit;
        $this->db->where('id', $id);
        $this->db->delete('dislokasi_alat_berat');
        return 1;
    }
}
