<?php
class Config_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table = $this->db->dbprefix('config');
    }

    public function addConfig($key, $value) {
        $time = date('Y-m-d H:i:s', time());

        $sql = "select * from " . $this->table . " where name = '$key'";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0) {
            $data = array(
                'value' => $value,
                'time' => $time
            );
            $this->db->where('name', $key);
            $this->db->update($this->table, $data);
        }else{
            $data = array(
                'name' => $key,
                'value' => $value,
                'time' => $time
            );
            $this->db->insert($this->table, $data);
        }
    }

    public function getConfig() {
        $sql = "select * from " . $this->table;
        $query = $this->db->query($sql);

        if($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
        return array();
    }
}