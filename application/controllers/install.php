<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
require_once('application/controllers/controller.php');
/**
 * 安装控制器
 */
class Install extends Controller
{
    /**
     *安装首页
     */
    public function index()
    {
        $installed = $this->config->item('installed');
        if (file_exists($installed)) {
            $this->showView('install/installed');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $password = $_POST['password'];
            $passwordConfirm = $_POST['passwordConfirm'];
            $host = $_POST['host'];
            $database = $_POST['database'];
            $dbname = $_POST['dbname'];
            $dbpwd = $_POST['dbpwd'];
            $dbprefix = $_POST['dbprefix'];
            $username = $_POST['username'];
            $error = '';

            if ($password != $passwordConfirm) {
                $error = '两次输入密码不一致，请重新输入！';
            }elseif(! $host) {
                $error = '请输入要连接的数据库主机名!';
            }elseif(! $database) {
                $error = '请输入数据库名！';
            }elseif(! $dbname) {
                $error = '请输入数据库帐号!';
            }
            $this->data = compact('error', 'host', 'database', 'dbname', 'dbprefix', 'username');
        }

        $this->showView('install/index');
    }
}