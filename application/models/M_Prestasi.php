<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Prestasi extends CI_Model
{

    public function get()
    {
        return $this->db->get('prestasi')->result_array();
    }

    public function add()
    {
        $data = [
            'jenis' => $this->input->post('jenis'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'prestasi' => $this->input->post('prestasi'),
            'kemampuan' => $this->input->post('kemampuan'),
        ];
        $this->db->insert('prestasi', $data);
        return 1;
    }

    public function getAlatBeratById($id)
    {
        return $this->db->get_where('prestasi', ['id' => $id])->row_array();
    }

    public function prosesEdit($id)
    {
        $data = [
            'jenis' => $this->input->post('jenis'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'prestasi' => $this->input->post('prestasi'),
            'kemampuan' => $this->input->post('kemampuan'),
        ];
        $this->db->where('id', $id);
        $this->db->update('prestasi', $data);
        return 1;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('prestasi');
        return 1;
    }


    
}
