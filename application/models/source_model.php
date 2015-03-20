<?php

/**
 * 资源类model层
 *
 * 资源可为图片，文件等
 */
class Source_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table = $this->db->dbprefix('source');
    }

    /**
     * 获取主键为$id的资源信息
     *
     * @param $id
     * @return bool
     */
    public function getPictureById($id) {
        $query = $this->db->where('id', $id)->get($this->table);

        if($query->num_rows() > 0) {
            $result = $query->result();
            return $result[0];
        }else{
            return false;
        }
    }

    /**
     * 添加一个资源
     *
     * @param $source
     * @return mixed
     */
    public function addSource($source) {
        $this->db->insert($this->table, $source);
        return $this->db->insert_id();
    }

    /**
     * 更新资源
     *
     * @param $source
     * @param $id
     * @return mixed
     */
    public function updateSourceById( $id, $source) {
        $this->db->where('id', $id)->update($this->table, $source);
        return true;
    }

    /**
     * 按类型获取资源记录
     *
     * @param $type
     * @param $offset
     * @param $limit
     * @return array
     */
    public function getSourceByType($type, $offset, $limit) {
        $query = $this->db->where('type', $type)->get($this->table, $limit, $offset);
        if($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }else{
            return array();
        }
    }

    /**
     * 按类型统计资源记录
     *
     * @param $type
     * @return mixed
     */
    public function countSourceByType($type) {
        return $this->db->where('type', $type)->count_all($this->table);
    }

    /**
     * 删除一个资源
     *
     * @param $id
     * @return mixed
     */
    public function deleteSource($id) {
        $this->db->where('id', $id)->delete($this->table);
        return $this->db->affected_rows();
    }
}