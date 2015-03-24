<?php

/**
 * 首页区域子区域类
 */
class Indexcolumn_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table = $this->db->dbprefix('indexcolumn');
    }

    /**
     * 批量添加子区域
     *
     * @param $batch
     * @return mixed
     */
    public function addColumn($batch) {
        return $this->db->insert_batch($this->table, $batch);
    }

    /**
     * 根据区域id删除所有子区域
     *
     * @param $columnId
     * @return mixed
     */
    public function deleteColumnsByRowId($rowId) {
        return $this->db->where('row_id', $rowId)->delete($this->table);
    }

    /**
     * 根据主键批量删除子区域
     * @param $ids
     * @return mixed
     */
    public function deleteColumnsByIds($ids) {
        return $this->db->where_in('id', $ids)->delete($this->table);
    }

    /**
     * 批量更新子区域
     *
     * @param $updates
     * @param $key
     * @return mixed
     */
    public function updateColumnsByIds($updates, $key) {
        return $this->db->update_batch($this->table, $updates, $key);
    }

    /**
     * 根据区域id获取所有子区域
     *
     * @param $rowId
     * @return array
     */
    public function getColumnsByRowId($rowId) {
        $query = $this->db->where('row_id', $rowId)->get($this->table);
        if($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }else {
            return array();
        }
    }

    /**
     * 获取区域在$rowIds数组的所有子区域
     *
     * @param $rowIds
     * @return array
     */
    public function getColumnsOrderBySort($rowIds) {
        $query = $this->db->where_in('row_id', $rowIds)->order_by('sort', 'asc')->get($this->table);
        if($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }else {
            return array();
        }
    }
}