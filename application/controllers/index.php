<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

require_once('application/controllers/controller.php');

/**
 * 前端控制器
 */
class Index extends Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('weblib');
    }

    /**
     * 显示站点关闭页面
     */
    public function close() {
        $this->showView('close');
    }

    /**
     * 显示首页
     */
    public function index() {
        $this->checkInstall();

        $isClose = $this->weblib->checkClose();
        if($isClose) {
            redirect('close');
        }
        if(isset($_GET['nav'])) {
            $navId = $this->input->get('nav');
        }

        $logo = $this->weblib->getLogo();
        $navs = $this->weblib->getNavs();
        $pictures = $this->weblib->getPictures();
        $rows = $this->weblib->getRowsAndColumns();
        $path = $this->path;

        $this->data = compact('navs', 'pictures', 'rows', 'logo', 'path', 'navId');
        $this->showView('index');
    }

    /**
     * 动态显示页面
     *
     * @param int $pageId
     */
    public function page($pageId = 0) {
        $this->checkInstall();

        $isClose = $this->weblib->checkClose();
        if($isClose) {
            redirect('close');
        }

        if(! $pageId) {
            redirect('index');
        }

        $pageInfo = $this->weblib->getPageInfo($pageId);
        if(! $pageInfo) {
            redirect('index');
        }

        if(isset($_GET['nav'])) {
            $navId = $this->input->get('nav');
        }else{
            $navId = $this->weblib->getNavIdByPageId($pageId);
        }

        $logo = $this->weblib->getLogo();
        $navs = $this->weblib->getNavs();
        $path = $this->path;

        $this->data = compact('pageInfo', 'logo', 'navs', 'path', 'navId');
        $this->showView('page');
    }

    /**
     * 搜索
     *
     * @param int $page
     */
    public function search($page = 1) {
        $keyword = $this->input->get('key');
        if(! $keyword) {
            redirect('index');
        }


        $total = $this->weblib->countSearchByKeyword($keyword);
        $totalPage = ceil($total/BaseLib::NUM_PER_PAGE);

        $page = $page ? $page : 1;
        if($page < $totalPage && $totalPage) {
            $page = $totalPage;
        }
        $results = $this->weblib->searchKeyword($keyword, $page);

        $logo = $this->weblib->getLogo();
        $navs = $this->weblib->getNavs();
        $path = $this->path;

        $this->data = compact('results', 'logo', 'navs', 'path', 'totalPage', 'keyword', 'page');
        $this->showView('search');
    }
}

