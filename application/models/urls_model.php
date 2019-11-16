<?php

class Urls_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_urls($short = false) {
        if ($short === FALSE) {
            $query = $this->db->get('urls');
            return $query->result_array();
        }

        $query = $this->db->get_where('urls', array('short' => $short));
        return $query->row_array();
    }

    public function set_urls() {
        $flag = false;
        do {
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $url = '';
            for ($i = 0; $i < 8; $i++) {
                $url .= $characters[rand(0, strlen($characters) - 1)];
            }
            $data = array(
                'short' => $url,
                'long' => $this->input->post('long')
            );
            $flag = $this->db->insert('urls', $data);
        } while (!$flag);
        return $url;
    }

}
