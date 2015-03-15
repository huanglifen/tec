<?php
class Admin_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table = $this->db->dbprefix('admin');
    }

    public function getAdminByNameAndPwd($name, $pwd) {

        $sql = "select * from " . $this->table. " where name = '$name' and password = '$pwd'";
        $query =  $this->db->query($sql);

        if($query->num_rows() > 0) {
            $result = $query->result();
            return $result[0];
        }
        return false;
    }
}