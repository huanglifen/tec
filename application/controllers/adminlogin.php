<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

require_once('application/controllers/controller.php');

/**
 * 管理员登陆控制器类
 */
class AdminLogin extends Controller {
    protected $langFile = 'admin';

    public function __construct() {
        parent::__construct();
        $this->lang->load($this->langFile);
        $this->load->helper('url');
        $this->load->library('adminlib');
    }

    /**
     * 登陆首页
     */
    function index() {
        $this->checkInstall();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $this->getParam('name', 'required{error_name_required}');
            $password = md5($this->getParam('password', 'required{error_password_required}'));
            if($this->errorInfo) {
                $this->data['error'] = $this->errorInfo;
                return $this->showView('admin/login');
            }
            $result = $this->adminlib->getAdminByNameAndPwd($name, $password);
            if($result) {
                $_SESSION['userId'] = $result->id;
                $_SESSION['userName'] = $result->name;
                $_SESSION['userDefault'] = $result->default;
                return redirect('admin/index');
            }else{
                $this->errorInfo['error'] = $this->lang->line('name_or_password_error');
                $this->data['error'] = $this->errorInfo;
                return $this->showView('admin/login');
            }
        }else{
            return $this->showView('admin/login');
        }
    }

    public function logout() {
        $_SESSION['userId'] = 0;
        $_SESSION['userName'] = '';

        return redirect('adminlogin/index');
    }
}