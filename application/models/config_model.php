<?php
class Config_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table = $this->db->dbprefix('config');
    }

    public function addConfig($key, $value) {
        $time = date('Y-m-d H:i:s', time());
        $data = array(
           'name' => $key,
            'value' => $value,
            'time' => $time
        );
        $this->db->insert($this->table, $data);
    }
}