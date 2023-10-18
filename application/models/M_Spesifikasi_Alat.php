<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Spesifikasi_Alat extends CI_Model
{

    public function get()
    {
        return $this->db->get('alat_berat')->result_array();
    }

    public function add()
    {
        $data = [
            'merk' => $this->input->post('merk'),
            'horse_power' => $this->input->post('horse_power'),
            'bahan_bakar' => $this->input->post('bahan_bakar'),
            'tahun_perolehan' => $this->input->post('tahun_perolehan'),
            'jumlah_unit' => $this->input->post('jumlah_unit'),
        ];
        $this->db->insert('alat_berat', $data);
        return 1;
    }

    public function getAlatBeratById($id)
    {
        return $this->db->get_where('alat_berat', ['id' => $id])->row_array();
    }

    public function prosesEdit($id)
    {
        $data = [
            'merk' => $this->input->post('merk'),
            'horse_power' => $this->input->post('horse_power'),
            'bahan_bakar' => $this->input->post('bahan_bakar'),
            'tahun_perolehan' => $this->input->post('tahun_perolehan'),
            'jumlah_unit' => $this->input->post('jumlah_unit'),
        ];
        $this->db->where('id', $id);
        $this->db->update('alat_berat', $data);
        return 1;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('alat_berat');
        return 1;
    }


    
}
