<?php
require_once 'baselib.php';
/**
 * 安装类lib层
 */
class AdminLib extends BaseLib{
    function __construct() {
        parent::__construct();
        $this->ci->load->model('admin_model');
    }

    /**
     * 根据用户名和密码获取用户信息
     *
     * @param $name
     * @param $password
     * @return bool
     */
    public function getAdminByNameAndPwd($name, $password) {
        $result = $this->ci->admin_model->getAdminByNameAndPwd($name, $password);
        if(! $result) {
            return false;
        }
        return $result;
    }

    /**
     * 添加配置数据
     * 
     * @param array $config
     */
    public function setConfig($config = array()) {
        foreach($config as $key => $value){
            $this->ci->config_model->addConfig($key, $value);
        }
    }
}