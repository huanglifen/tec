<?php

/**
 * 管理员model类
 */
class Admin_model extends CI_Model {
    const STATUS_OPEN = 0;
    const STATUS_CLOSE = 1;
    const IS_DEFAULT = 1;
    const NOT_DEFAULT = 0;
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table = $this->db->dbprefix('admin');
    }

    /**
     * 按管理员名和密码查询用户
     *
     * @param $name
     * @param $pwd
     * @return bool
     */
    public function getAdminByNameAndPwd($name, $pwd) {

        $sql = "select * from " . $this->table. " where name = '$name' and password = '$pwd' and status = '" . self::STATUS_OPEN . "'";
        $query =  $this->db->query($sql);

        if($query->num_rows() > 0) {
            $result = $query->result();
            return $result[0];
        }
        return false;
    }

    /**
     * 按用户名获取管理员信息
     *
     * @param $name
     * @return bool
     */
    public function getAdminByName($name) {
        $query = $this->db->where('name', $name)->get($this->table);
        if($query->num_rows() > 0) {
            $result = $query->result();
            return $result[0];
        }
        return false;
    }

    /**
     * 按主键获取管理员信息
     *
     * @param $id
     * @return bool
     */
    public function getAdminById($id) {
        $query = $this->db->where('id', $id)->get($this->table);
        if($query->num_rows() > 0) {
            $result = $query->result();
            return $result[0];
        }
        return false;
    }

    /**
     * 统计管理员总数
     *
     * @return mixed
     */
    public function countAdmins() {
        return $this->db->count_all($this->table);
    }

    /**
     * 按条件获取管理员记录
     *
     * @param $limit
     * @param $offset
     * @return array
     */
    public function getAdmins($limit, $offset) {
        $query = $this->db->get($this->table, $limit, $offset);
        if($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
        return array();
    }

    /**
     * 添加一个管理员
     *
     * @param $data
     * @return mixed
     */
    public function addAdmin($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    /**
     * 按主键更新管理员信息
     *
     * @param $data
     * @param $id
     * @return mixed
     */
    public function updateAdminById($data, $id) {
        $this->db->where('id', $id)->update($this->table, $data);
        return true;
    }
}