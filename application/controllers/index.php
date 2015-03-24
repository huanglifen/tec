<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

require_once('application/controllers/controller.php');

class Index extends Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('weblib');
    }

    /**
     * 显示首页
     */
    public function index() {
        $this->checkInstall();

        $isClose = $this->weblib->checkClose();
        if($isClose) {
            return $this->showView('close');
        }

        $logo = $this->weblib->getLogo();
        $navs = $this->weblib->getNavs();
        $pictures = $this->weblib->getPictures();
        $rows = $this->weblib->getRowsAndColumns();
        $path = $this->path;

        $this->data = compact('navs', 'pictures', 'rows', 'logo', 'path');
        $this->showView('index');
    }
}

