<?php

/**
 * 导航model
 */
class Nav_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table = $this->db->dbprefix('nav');
    }

    /**
     * 添加一条导航
     *
     * @param $name
     * @param $position
     * @param $sort
     * @param $link
     * @param $parentId
     *
     * @return mixed
     */
    public function addNav($name, $position, $sort, $link, $parentId) {
        $data = array(
            'name' => $name,
            'link' => $link,
            'sort' => $sort,
            'type' => $position,
            'parent_id' => $parentId,
            'time' => date('Y-m-d H:i:s', time()),
        );
        return $this->db->insert($this->table, $data);
    }

    /**
     * 按类型获取导航记录
     *
     * @param $type
     * @param $offset
     * @param $limit
     *
     * @return array
     */
    public function getNav($type, $offset, $limit) {
        $sql = "select * from " . $this->table ." where type = '" .$type . "' order by time desc limit $offset,$limit";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0) {
            return $query->result();
        }else{
            return array();
        }
    }

    /**
     * 按类型统计记录
     *
     * @param $type
     *
     * @return int
     */
    public function countNav($type) {
        $sql = "select count(*) as num from " . $this->table ." where type = '" .$type . "'";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0) {
            $result = $query->result();
            return $result[0]->num;
        }else{
            return 0;
        }
    }

    /**
     * 按主键删除导航记录
     *
     * @param $id
     *
     * @return mixed
     */
    public function delNav($id) {
        return $this->db->where('id', $id)->delete($this->table);
    }

    /**
     * 按主键获取导航记录
     *
     * @param $id
     *
     * @return array
     */
    public function getNavById($id) {
        $query = $this->db->get_where($this->table, array('id' => $id), 1, 0);
        if($query->num_rows() > 0) {
            $result = $query->result();
            return $result[0];
        }else{
            return array();
        }
    }

    public function editNav($name, $position, $sort, $link, $parentId, $id) {
        $data = array(
            'name' => $name,
            'type' => $position,
            'sort' => $sort,
            'link' => $link,
            'parent_id' => $parentId,
        );

        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }
}