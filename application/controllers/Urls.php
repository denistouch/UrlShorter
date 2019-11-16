<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Urls extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('urls_model');
    }

    public function views($short = NULL) {
        $data['urls_item'] = $this->urls_model->get_urls($short);
        if (empty($data['urls_item'])) {
            show_404();
        }
        $this->load->view('urls/view', $data);
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a url pair';

        $this->form_validation->set_rules('long', 'long', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('urls/create');
        } else {
            $data['title'] = $this->urls_model->set_urls();
            $this->load->view('urls/success',$data);
        }
    }

}
