<?php
/**
 * 首页增加区域model类
 */
class Indexrow_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table = $this->db->dbprefix('indexrow');
    }

    /**
     * 添加一条区域记录
     *
     * @param $name
     * @param $height
     * @param $sort
     * @param $columnNum
     *
     * @return mixed
     */
    public function addRow($name, $height, $sort, $columnNum) {
        $arr = array(
            'column_num' => $columnNum,
            'height' => $height,
            'name' => $name,
            'sort' => $sort,
            'time' => date('Y-m-d H:i:s', time()),
        );
        $this->db->insert($this->table, $arr);
        $result = $this->db->insert_id();
        return $result;
    }

    /**
     * 按条件返回区域记录
     *
     * @param $limit
     * @param $offset
     *
     * @return array
     */
    public function getRows() {
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }else{
            return array();
        }
    }

    /**
     * 统计所有区域记录
     *
     * @return mixed
     */
    public function countRows()
    {
       return $this->db->count_all($this->table);
    }

    /**
     * 按主键删除一条记录
     *
     * @param $id
     * @return mixed
     */
    public function deleteRow($id) {
        $this->db->where('id', $id);
        $result =  $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    /**
     * 根据主键获取区域记录
     *
     * @param $id
     * @return bool
     */
    public function getRowById($id) {
        $query = $this->db->where('id', $id)->get($this->table);

        if($query->num_rows() > 0) {
            $result = $query->result();
            return $result[0];
        }else{
            return false;
        }
    }

    public function editRow($id, $name, $height, $sort, $columnNum) {
        $data = array(
             'name' => $name,
            'height' => $height,
            'sort' => $sort,
            'column_num' => $columnNum
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return true;
    }
}