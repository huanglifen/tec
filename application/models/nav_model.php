<?php

/**
 * 导航model
 */
class Nav_model extends CI_Model {
    const TYPE_MAIN = 1;
    const TYPE_HEAD = 2;
    const TYPE_BOTTOM = 3;

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
    public function addNav($name, $position, $sort, $link, $parentId, $logo) {
        $data = array(
            'name' => $name,
            'link' => $link,
            'sort' => $sort,
            'type' => $position,
            'parent_id' => $parentId,
            'time' => date('Y-m-d H:i:s', time()),
            'logo' => $logo,
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
     * 按照排序属性升序获取导航记录
     *
     * @param $type
     * @param $offset
     * @param $limit
     * @return array
     */
    public function getNavOrderBySort($type, $offset, $limit) {
        $query = $this->db->order_by('sort', 'asc')->order_by('id', 'asc')->where('type', $type)->get($this->table, $limit, $offset);
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
            return false;
        }
    }

    /**
     * 更新一个导航记录
     *
     * @param $name
     * @param $position
     * @param $sort
     * @param $link
     * @param $parentId
     * @param $id
     * @param $logo
     * @return mixed
     */
    public function editNav($name, $position, $sort, $link, $parentId, $id, $logo) {
        $data = array(
            'name' => $name,
            'type' => $position,
            'sort' => $sort,
            'link' => $link,
            'parent_id' => $parentId,
        );
        if($logo) {
            $data['logo'] = $logo;
        }

        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * 根据导航链接的页面id获取一个导航记录
     *
     * @param $pageId
     * @return int
     */
    public function getNavByPageId($pageId) {
        $query = $this->db->where('link', $pageId)->where('type', self::TYPE_MAIN)->order_by('sort', 'asc')->get($this->table, 1, 0);
        if($query->num_rows() > 0) {
            $result = $query->result();
            return $result[0];
        }else{
            return 0;
        }
    }
}