<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Countdown extends CI_Model
{

    public function get()
    {
        return $this->db->get('countdown')->result_array();
    }


    public function add()
    {

        $currentDateTime = date('Y-m-d H:i:s');

        $futureDateTime = date('Y-m-d H:i:s', strtotime('+14 days', strtotime($currentDateTime)));

        $data = [
            'mulai' => $this->input->post('mulai'),
            'akhir' => $futureDateTime ,

        ];
        $this->db->insert('countdown', $data);
        return 1;
    }
}
