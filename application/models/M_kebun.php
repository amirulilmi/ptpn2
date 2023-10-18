<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Kebun extends CI_Model
{

    public function get()
    {
        return $this->db->get('kebun')->result_array();
    }

    public function add()
    {
        $data = [
            'kode' => $this->input->post('kode'),
            'nama' => $this->input->post('nama'),
            'komoditi' => $this->input->post('komoditi'),
            'distrik' => $this->input->post('distrik'),
        ];
        $this->db->insert('kebun', $data);
        return 1;
    }

    public function getAlatBeratById($id)
    {
        return $this->db->get_where('kebun', ['id' => $id])->row_array();
    }

    public function prosesEdit($id)
    {
        $data = [
            'kode' => $this->input->post('kode'),
            'nama' => $this->input->post('nama'),
            'komoditi' => $this->input->post('komoditi'),
            'distrik' => $this->input->post('distrik'),
        ];
        $this->db->where('id', $id);
        $this->db->update('kebun', $data);
        return 1;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kebun');
        return 1;
    }


    
}
