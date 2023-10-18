<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Cane_Harvester extends CI_Model
{

    public function getByDate()
    {
        $this->db->select('date');
        $this->db->distinct();
        $query = $this->db->get('cane_harvester');
        return $query->result_array();
    }

    public function get()
    {
        return $this->db->get('cane_harvester')->result_array();
    }

    public function getCaneHarvesterByDate($date){
        $this->db->select('*')
            ->from('cane_harvester')
            ->where(['date' => $date]);
        return $this->db->get()->result_array();
    }

    public function add()
    {

        $month = $this->input->post('date');
        $month_fix = substr($month, 0, 7);
        $hi_total_etd = $this->input->post('hi_10ton_etd') + $this->input->post('hi_7ton_etd');
        $sdhi_total_etd = $this->input->post('sdhi_10ton_etd') + $this->input->post('sdhi_7ton_etd');

        $data = [
            'date' => $this->input->post('date'),
            'month' => $month_fix,
            'kebun' => $this->input->post('kebun'),
            'no_unit' => $this->input->post('no_unit'),
            'hi_besar_jtt' => $this->input->post('hi_besar_jtt'),
            'sdhi_besar_jtt' => $this->input->post('sdhi_besar_jtt'),
            'hi_kecil_jtt' => $this->input->post('hi_kecil_jtt'),
            'sdhi_kecil_jtt' => $this->input->post('sdhi_kecil_jtt'),
            'hi_jh' => $this->input->post('hi_jh'),
            'sdhi_jh' => $this->input->post('sdhi_jh'),
            'rataan_jh' => $this->input->post('rataan_jh'),
            'hi_10ton_etd' => $this->input->post('hi_10ton_etd'),
            'sdhi_10ton_etd' => $this->input->post('sdhi_10ton_etd'),
            'hi_7ton_etd' => $this->input->post('hi_7ton_etd'),
            'sdhi_7ton_etd' => $this->input->post('sdhi_7ton_etd'),
            'hi_total_etd' => $hi_total_etd,
            'sdhi_total_etd' => $sdhi_total_etd,
            'hi_efektif_hm' => $this->input->post('hi_efektif_hm'),
            'sdhi_efektif_hm' => $this->input->post('sdhi_efektif_hm'),
            'hi_loading_hm' => $this->input->post('hi_loading_hm'),
            'sdhi_loading_hm' => $this->input->post('sdhi_loading_hm'),
            'hi_prestasi' => $this->input->post('hi_prestasi'),
            'sdhi_prestasi' => $this->input->post('sdhi_prestasi'),
            'hari_kerja_efektif' => $this->input->post('hari_kerja_efektif'),
            'waktu_mulai' => $this->input->post('waktu_mulai'),
            'waktu_selesai' => $this->input->post('waktu_selesai'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->db->insert('cane_harvester', $data);
        return 1;
    }

    public function getCaneHarvesterById($id){
        return $this->db->get_where('cane_harvester', ['id' => $id])->row_array();
    }

    public function prosesEdit($id){

        $month = $this->input->post('date');
        $month_fix = substr($month, 0, 7);
        $hi_total_etd = $this->input->post('hi_10ton_etd') + $this->input->post('hi_7ton_etd');
        $sdhi_total_etd = $this->input->post('sdhi_10ton_etd') + $this->input->post('sdhi_7ton_etd');

        $data = [
            'date' => $this->input->post('date'),
            'month' => $month_fix,
            'kebun' => $this->input->post('kebun'),
            'no_unit' => $this->input->post('no_unit'),
            'hi_besar_jtt' => $this->input->post('hi_besar_jtt'),
            'sdhi_besar_jtt' => $this->input->post('sdhi_besar_jtt'),
            'hi_kecil_jtt' => $this->input->post('hi_kecil_jtt'),
            'sdhi_kecil_jtt' => $this->input->post('sdhi_kecil_jtt'),
            'hi_jh' => $this->input->post('hi_jh'),
            'sdhi_jh' => $this->input->post('sdhi_jh'),
            'rataan_jh' => $this->input->post('rataan_jh'),
            'hi_10ton_etd' => $this->input->post('hi_10ton_etd'),
            'sdhi_10ton_etd' => $this->input->post('sdhi_10ton_etd'),
            'hi_7ton_etd' => $this->input->post('hi_7ton_etd'),
            'sdhi_7ton_etd' => $this->input->post('sdhi_7ton_etd'),
            'hi_total_etd' => $hi_total_etd,
            'sdhi_total_etd' => $sdhi_total_etd,
            'hi_efektif_hm' => $this->input->post('hi_efektif_hm'),
            'sdhi_efektif_hm' => $this->input->post('sdhi_efektif_hm'),
            'hi_loading_hm' => $this->input->post('hi_loading_hm'),
            'sdhi_loading_hm' => $this->input->post('sdhi_loading_hm'),
            'hi_prestasi' => $this->input->post('hi_prestasi'),
            'sdhi_prestasi' => $this->input->post('sdhi_prestasi'),
            'hari_kerja_efektif' => $this->input->post('hari_kerja_efektif'),
            'waktu_mulai' => $this->input->post('waktu_mulai'),
            'waktu_selesai' => $this->input->post('waktu_selesai'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->db->where('id', $id);
        $this->db->update('cane_harvester', $data);
        return 1;
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('cane_harvester');
        return 1;
    }
    // public function getByDate()
    // {
    //     $this->db->select('date');
    //     $this->db->distinct();
    //     $query = $this->db->get('laporan_kerja_alat_berat');
    //     return $query->result_array();
    // }



    
}
