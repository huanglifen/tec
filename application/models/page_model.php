<?php

/**
 * 单页面model
 */
class Page_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table = $this->db->dbprefix('page');
    }

    /**
     * 根据主键获取页面
     *
     * @param $id
     * @return bool
     */
    public function getPageById($id) {
        $query = $this->db->where('id', $id)->get($this->table);
        if($query->num_rows() > 0) {
            $result = $query->result();
            return $result[0];
        }
        return false;
    }

    /**
     * 按条件获取页面记录
     *
     * @param $key
     * @param $value
     * @return array
     */
    public function getPagesByWhere($key, $value) {
        $query = $this->db->where($key, $value)->get($this->table);
        if($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
        return array();
    }

    /**
     * 按偏移量获取页面记录
     *
     * @param $limit
     * @param $offset
     * @return array
     */
    public function getPages($limit, $offset) {
        $this->db->select('id, name, parent_id, title');
        $query = $this->db->get($this->table, $limit, $offset);
        if($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
        return array();
    }

    /**
     * 添加一个页面记录
     *
     * @param $data
     * @return mixed
     */
    public function addPage($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    /**
     * 按主键更新一个页面记录
     *
     * @param $id
     * @param $data
     * @return bool
     */
    public function editPage($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return true;
    }

    /**
     * 按主键删除一个页面记录
     *
     * @param $id
     * @return mixed
     */
    public function deletePage($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    /**
     * 统计页面总数
     *
     * @return mixed
     */
    public function countPages() {
        return $this->db->count_all($this->table);
    }
}