<?php

/**
 * 配置类model层
 */
class Config_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table = $this->db->dbprefix('config');
    }

    /**
     * 添加或者更新一条配置信息
     *
     * @param $key
     * @param $value
     */
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
            return $this->db->affected_rows();
        }else{
            $data = array(
                'name' => $key,
                'value' => $value,
                'time' => $time
            );
            $this->db->insert($this->table, $data);
            return $this->db->insert_id();
        }
    }

    /**
     * 获取配置信息
     *
     * @return array
     */
    public function getConfig() {
        $sql = "select * from " . $this->table;
        $query = $this->db->query($sql);

        if($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
        return array();
    }

    /**
     * 根据配置名获取配置信息
     *
     * @param $name
     * @return bool
     */
    public function getConfigByName($name) {
         $query = $this->db->where('name', $name)->get($this->table);
        if($query->num_rows() > 0) {
            $result = $query->result();
            return $result[0];
        }
        return false;
    }
}