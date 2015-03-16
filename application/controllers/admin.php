<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

require_once('application/controllers/controller.php');

/**
 * 管理员控制器类
 */
class Admin extends Controller {
    protected $langFile = 'admin';

    public function __construct() {
        parent::__construct();
        $this->lang->load($this->langFile);
        $this->load->helper('url');
        $this->load->library('adminlib');
    }

    public function index() {
        $this->checkLogin();
        $this->showView('admin/index');
    }

    public function set() {
        $content = array();
        $content['siteName'] = $this->getParam('siteName');
        $content['siteTitle'] = $this->getParam('siteTitle');
        $content['siteDesc'] = $this->getParam('siteDesc');
        $content['siteLogo'] = $this->getParam('siteLogo');
        $content['address'] = $this->getParam('address');
        $content['telephone'] = $this->getParam('telephone');
        $content['icp'] = $this->getParam('ICP');
        $content['close'] = $this->getParam('close');

        $result = $this->adminlib->setConfig($content);
        $this->showView('admin/index');
    }
    public function nav() {
        $this->checkLogin();
        $this->showView('admin/nav');
    }

    public function pic() {
        $this->checkLogin();
        $this->showView('admin/index_pic');
    }

    public function page() {
        $this->checkLogin();
        $this->showView('admin/page');
    }

    public function user() {
        $this->checkLogin();
        $this->showView('admin/admin');
    }

}