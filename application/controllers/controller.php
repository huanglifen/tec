<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Controller extends  CI_Controller {
    protected $data = array();
    protected $errorInfo = array();
    protected $langFile = 'common';

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    /**
     * 检测网站是否已安装
     */
    protected function checkInstall() {
        $installed = $this->config->item('installed');
        if (! file_exists($installed)) {
            redirect('install/index');
        }
    }

    /**
     * 判断用户是否已登录，未登录则跳转到登录页面
     */
    protected function checkLogin()
    {
        $userId = $this->session->userdata('userId');
        if (! $userId) {
            redirect('adminlogin/index');
        }
    }

    /**
     * 显示视图公共方法
     *
     * @param $view
     */
    protected function showView($view) {
        $this->data['baseUrl'] = $this->config->item('base_url');
        $this->data['title'] = '华信杰通';
        $this->load->view($view, $this->data);
    }

    /**
     * 接收参数，并对参数进行有效性验证
     *
     * @param $param
     * @param $ruleString
     * @return mixed
     */
    protected function getParam($param, $ruleString = '')
    {
        $paramValue = $_REQUEST[$param];

        if (!empty($ruleString)) {
            $ruleArr = explode('|', $ruleString);
            $rules = array();

            foreach ($ruleArr as $ruleStr) {
                if (preg_match("/(.*?)\\{(.*)\\}/", $ruleStr, $match)) {
                    $rule['rule'] = $match[1];
                    $rule['msg'] = $match[2] ? $match[2] : '';
                    $rule['arg'] = '';

                    if (preg_match("/(.*?)\:(.*)/", $rule['rule'], $matchMsg)) {
                        $rule['rule'] = $matchMsg[1];
                        $rule['arg'] = $matchMsg[2] ? $matchMsg[2] : '';
                    }
                    $rules[] = $rule;
                }
            }

            foreach($rules as $r) {
                if(method_exists($this, 'check'.$r['rule'])) {
                    $ruleMethod = 'check'.$r['rule'];
                    $result = $this->$ruleMethod($paramValue, $r['arg']);
                    if($result == false) {
                        $this->lang->load($this->langFile);
                        $this->errorInfo[$param] = $this->lang->line($r['msg']);
                        return false;
                    }
                }
            }
        }
        return $paramValue;
    }

    /**
     * 检查数据必填性
     *
     * @param $param
     * @return bool
     */
    protected function checkRequired($param) {
        return strlen(trim($param)) > 0;
    }

    /**
     * 检查数据最小长度
     *
     * @param $param
     * @param $length
     * @return bool
     */
    protected function checkMinLength($param, $length) {
        return strlen($param) >= $length;
    }
}