<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

require_once('application/controllers/controller.php');
require_once('application/libraries/installlib.php');

/**
 * 安装控制器
 */
class Install extends Controller
{
    protected $langFile = 'install';

    public function __construct() {
        parent::__construct();
        $this->load->library('installlib');
        $this->lang->load($this->langFile);
        $this->load->helper('url');
    }
    /**
     *安装首页
     */
    public function index()
    {
        $installed = $this->config->item('installed');
        if (file_exists($installed)) {
            $this->showView('install/installed');

        }elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $host = $this->getParam('host', 'required{required}');
            $database = $this->getParam('database', 'required{required}');
            $dbname = $this->getParam('dbname', 'required{required}');
            $dbpwd = $this->getParam('dbpwd');
            $dbprefix = $this->getParam('dbprefix', 'required{required}');

            $username = $this->getParam('username', 'required{required}');
            $password = $this->getParam('password', 'required{required}|minLength:6{min6}');
            $passwordConfirm = $this->getParam('passwordConfirm', 'required{required}|minLength:6{min6}');

            if ($this->errorInfo) {
                $this->data = compact('host', 'database', 'dbname', 'dbprefix', 'username');
                $this->data['error'] = $this->errorInfo;
                $this->showView('install/index');
            } elseif ($password != $passwordConfirm) {
                $this->errorInfo['password'] = '两次输入密码不一致，请重新输入！';

                $this->data = compact('host', 'database', 'dbname', 'dbprefix', 'username');
                $this->data['error'] = $this->errorInfo;
                $this->showView('install/index');
            } else {
                $result = $this->installlib->configDb($host, $dbname, $database, $dbpwd, $dbprefix, $username, md5($password));
                if ($result['status']) {
                    $lock = fopen($installed, 'w+');
                    fwrite($lock, "INSTALLED");
                    fclose($lock);
                    redirect('adminlogin/index');
                } else {
                    $this->errorInfo['dbmsg'] = $this->lang->line($result['msg']);

                    $this->data = compact('host', 'database', 'dbname', 'dbprefix', 'username');
                    $this->data['error'] = $this->errorInfo;
                    $this->showView('install/index');
                }
            }
        } else {
            $this->showView('install/index');
        }
    }
}