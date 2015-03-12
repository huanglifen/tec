<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Controller extends  CI_Controller {
    protected $data = array();
    protected $errorInfo = array();

    protected function showView($view) {
        $this->data['baseUrl'] = $this->config->item('base_url');
        $this->load->view($view, $this->data);
    }

    protected function getParam($name) {

    }
}