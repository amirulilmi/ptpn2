<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Alat_Berat extends CI_Model
{

    public function getAlatBerat()
    {
        // return $this->db->get('laporan_kerja_alat_berat')->result_array();

        $this->db->select(['*', 'laporan_kerja_alat_berat.id AS id_laporan_kerja']);
        $this->db->from('laporan_kerja_alat_berat');
        $this->db->join('daftar_alat_berat', 'daftar_alat_berat.id = laporan_kerja_alat_berat.id_alat');
        $this->db->join('kebun', 'kebun.id = laporan_kerja_alat_berat.id_kebun');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getByDate()
    {
        $this->db->select('date');
        $this->db->distinct();
        $query = $this->db->get('laporan_kerja_alat_berat');
        return $query->result_array();
    }

    public function getByJenis()
    {
        $this->db->select('*');
        $this->db->distinct();
        $query = $this->db->get('laporan_kerja_alat_berat');
        return $query->result_array();
    }

    public function getKebun()
    {
        $query = $this->db->get('kebun');
        return $query->result_array();
    }

    public function getAlatBeratBy($date)
    {
        $this->db->select(['*', 'laporan_kerja_alat_berat.id AS id_laporan_kerja'])
            ->from('laporan_kerja_alat_berat')
            ->join('daftar_alat_berat', 'daftar_alat_berat.id = laporan_kerja_alat_berat.id_alat')
            ->join('kebun', 'kebun.id = laporan_kerja_alat_berat.id_kebun')
            ->where(['date' => $date]);
        return $this->db->get()->result_array();
    }

    public function getAlatBeratBy2($jenis)
    {
        $this->db->select(['*', 'laporan_kerja_alat_berat.id AS id_laporan_kerja'])
            ->from('laporan_kerja_alat_berat')
            ->join('daftar_alat_berat', 'daftar_alat_berat.id = laporan_kerja_alat_berat.id_alat')
            ->join('kebun', 'kebun.id = laporan_kerja_alat_berat.id_kebun')
            ->where(['id_alat' => $jenis]);
        return $this->db->get()->result_array();
    }

    public function getAlatBeratBy3($date, $jenis)
    {
        $this->db->select(['*', 'laporan_kerja_alat_berat.id AS id_laporan_kerja'])
            ->from('laporan_kerja_alat_berat')
            ->join('daftar_alat_berat', 'daftar_alat_berat.id = laporan_kerja_alat_berat.id_alat')
            ->join('kebun', 'kebun.id = laporan_kerja_alat_berat.id_kebun')
            ->where(['date' => $date])
            ->where(['id_alat' => $jenis]);
        return $this->db->get()->result_array();
    }

    public function getforadd()
    {
        $this->db->select('*')
            ->from('laporan_kerja_alat_berat')
            ->where(['date' => $this->input->post('date1')]);
        $dataa = $this->db->get()->result_array();

        foreach ($dataa as $key => $r) {

            $data = [
                'date' => $this->input->post('date'),
                'kode_alat_berat' => $r['kode_alat_berat'],
                'id_alat' => $r['id_alat'],
                'no_unit' => $r['no_unit'],
                'id_kebun' => $r['id_kebun'],
                'realisasi_pekerjaan' => $r['realisasi_pekerjaan'],
                'hm_alat' => $r['hm_alat'],
                'bahan' => $r['bahan'],
                'prestasi_alat' => $r['prestasi_alat'],
                'kondisi_alat_berat' => $r['kondisi_alat_berat'],
                'keterangan' => $r['keterangan'],
                // 'pks_tgp' => $r['pks_tgp'],
            ];
            $this->db->insert('laporan_kerja_alat_berat', $data);
        }
        // print_r($data);exit;

        return 1;
    }

    public function add()
    {
        $data = [
            'date' => $this->input->post('date'),
            'kode_alat_berat' => $this->input->post('kode_alat_berat'),
            'id_alat' => $this->input->post('jenis'),
            'no_unit' => $this->input->post('no_unit'),
            'id_kebun' => $this->input->post('kebun'),
            'realisasi_pekerjaan' => $this->input->post('realisasi_pekerjaan'),
            'hm_alat' => $this->input->post('hm_alat'),
            'bahan' => $this->input->post('bahan'),
            'prestasi_alat' => $this->input->post('prestasi_alat'),
            'kondisi_alat_berat' => $this->input->post('kondisi_alat_berat'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->db->insert('laporan_kerja_alat_berat', $data);
        return 1;
    }

    public function getAlatBeratById($id)
    {
        // return $this->db->get_where('laporan_kerja_alat_berat', ['id' => $id])->row_array();

        $this->db->select(['*', 'laporan_kerja_alat_berat.id AS id_laporan_kerja'])
            ->from('laporan_kerja_alat_berat')
            ->join('daftar_alat_berat', 'daftar_alat_berat.id = laporan_kerja_alat_berat.id_alat')
            ->join('kebun', 'kebun.id = laporan_kerja_alat_berat.id_kebun')
            ->where('laporan_kerja_alat_berat.id', $id);
        // ->where(['no_unit' => $no_unit]);
        return $this->db->get()->row_array();
    }

    public function proses_edit($id)
    {
        //untuk mengambil bahan bakar alat
        $this->db->select('*')
            ->from('daftar_alat_berat')
            ->where(['id' => $this->input->post('jenis')]);
        $data2 = $this->db->get()->row_array();

        $hm = $this->input->post('hm_alat');

        $bahan = $hm * $data2['bahan_bakar'];


        //untuk mengupdate table dislokasi alat
        $kode_alat_berat = $this->input->post('kode_alat_berat');
        $date = $this->input->post('date');

        $data = [
            'id_kebun' => $this->input->post('kebun'),
            'no_unit' => $this->input->post('no_unit'),
            'kondisi' => $this->input->post('kondisi_alat_berat'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->db->where('date', $date);
        $this->db->where('kode_alat_berat', $kode_alat_berat);
        $this->db->update('dislokasi_alat_berat', $data);


        //Untuk mengupdate table laporan kerja alat berat
        $data = [
            'date' => $this->input->post('date'),
            'kode_alat_berat' => $this->input->post('kode_alat_berat'),
            'id_alat' => $this->input->post('jenis'),
            'no_unit' => $this->input->post('no_unit'),
            'id_kebun' => $this->input->post('kebun'),
            'realisasi_pekerjaan' => $this->input->post('realisasi_pekerjaan'),
            'hm_alat' => $this->input->post('hm_alat'),
            'bahan' => $bahan,
            'prestasi_alat' => $this->input->post('prestasi_alat'),
            'kondisi_alat_berat' => $this->input->post('kondisi_alat_berat'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->db->where('id', $id);
        $this->db->update('laporan_kerja_alat_berat', $data);
        return 1;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('laporan_kerja_alat_berat');
        return 1;
    }


    // DAFTAR ALAT BERAT

    public function getDaftarAlatBerat()
    {
        return $this->db->get('daftar_alat_berat')->result_array();
    }

    public function getDaftarAlatBeratId()
    {
        $this->load->database();
        $last = $this->db->order_by('id', "desc")
            ->limit(1)
            ->get('daftar_alat_berat');
        return $last->row_array();
    }

    public function addDaftarAlatBerat()
    {
        $data = [
            'jenis' => $this->input->post('jenis'),
        ];
        $this->db->insert('daftar_alat_berat', $data);
        return 1;
    }

    public function getDaftarAlatBeratById($id)
    {
        $this->db->select('*')
            ->from('daftar_alat_berat')
            ->where(['id' => $id]);
        return $this->db->get()->row_array();
    }

    public function prosesEditDaftarAlat($id)
    {
        //Untuk mengupdate table daftar alat berat
        $data = [
            'jenis' => $this->input->post('jenis'),
            'bahan_bakar' => $this->input->post('bahan_bakar'),
        ];
        $this->db->where('id', $id);
        $this->db->update('daftar_alat_berat', $data);
        return 1;
    }

    public function deleteDaftarAlat($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('daftar_alat_berat');
        return 1;
    }
}
