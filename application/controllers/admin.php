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
        $this->load->library('adminlib');
    }

    /**
     * 显示系统设置页面
     */
    public function index() {
        $this->checkLogin();

        $result = $this->adminlib->getConfig();
        $this->data['config'] = $result;

        $this->showView('admin/index');
    }

    /**
     * 系统设置
     */
    public function setBase() {
        $this->checkLogin();

        $content = array();

        $path = APPPATH . "../public/img/";
        if($_FILES['userfile']['name'] != ''){
            $_FILES['userfile']['name'] = iconv("UTF-8", 'GBK', $_FILES['userfile']['name']);
            $fileInfo = $this->doUpload($path);
            if($this->errorInfo) {
                $this->data['error'] = $this->errorInfo['upload'];
                $this->data['redirect'] = 'admin/index';
                $this->data['bread'] = '系统设置';
                return $this->showView('admin/error');
            }
            $info = array('origName' => iconv('GBK', 'UTF-8',$fileInfo['orig_name']), 'fileName' => $fileInfo['file_name']);
            $content['siteLogo'] = json_encode($info);
        }
        $content['siteName'] = $this->getParam('siteName');
        $content['siteTitle'] = $this->getParam('siteTitle');
        $content['siteDesc'] = $this->getParam('siteDesc');
        $content['address'] = $this->getParam('address');
        $content['telephone'] = $this->getParam('telephone');
        $content['icp'] = $this->getParam('ICP');
        $content['close'] = $this->getParam('close');

        $this->adminlib->setConfig($content);
        redirect('admin/index');
    }

    /**
     * 自定义导航页面
     *
     * @param int $type
     */
    public function nav($type = 1, $page = 1) {
        $this->checkLogin();
        $navs = $this->adminlib->getNav($type, $page);

        $total = $this->adminlib->countNav($type);
        $this->data['page'] = ceil($total / BaseLib::NUM_PER_PAGE);

        $this->data['navs'] = $navs;
        $this->data['type'] = $type;
        $this->data['currentPage'] = $page;
        $this->showView('admin/nav');
    }

    /**
     * 添加导航页面
     */
    public function addNav() {
        $this->checkLogin();
        $pages = $this->adminlib->getParentPage();
        $this->data['pages'] = $pages;

        $this->data['type'] = 1;
        $this->showView('admin/addnav');
    }

    /**
     * 添加导航操作
     *
     * @param $type 1 站内导航 2自定义导航
     */
    public function addNavAction($type) {
        $this->checkLogin();

        $name = $this->getParam('name', 'required{error_nav_name_required}');
        $position = $this->getParam('position', 'required{error_nav_position_required}');
        $sort = $this->getParam('sort', 'required{error_nav_sort_required}|number{error_number_required}');
        $link = $this->getParam('link', 'required{error_nav_link_required}');

        if($this->errorInfo) {
            $this->data['error'] = $this->errorInfo;
            $this->data['type'] = $type;
            return $this->showView('admin/addnav');
        }

        $parentId = 0;
        $this->adminlib->addNav($name, $position, $sort, $link, $parentId);

        $this->data['success'] = '添加导航成功！';
        $this->data['bread'] = '自定义导航';
        $this->data['redirect'] = 'admin/nav';
        $this->data['current'] = 2;
        $this->showView('admin/success');
    }

    /**
     * 删除导航操作
     */
    public function delNav() {
        $this->isLogin();
        $id = $this->getParam('id', 'required');
        $this->adminlib->delNav($id);

        echo  json_encode(array('status' => 0));
    }

    /**
     * 编辑导航
     */
    public function editNav($id) {
        $this->checkLogin();
        $nav = $this->adminlib->getNavById($id);
        if(count($nav) <= 0) {
            redirect('admin/nav');
        }

        $pages = $this->adminlib->getParentPage();
        $this->data['pages'] = $pages;
        $this->data['nav'] = $nav;
        $this->data['id'] = $id;
        $this->showView('admin/editNav');
    }

    /**
     * 编辑导航操作
     */
    public function editNavAction() {
        $this->checkLogin();

        $name = $this->getParam('name', 'required{error_nav_name_required}');
        $position = $this->getParam('position', 'required{error_nav_position_required}');
        $sort = $this->getParam('sort', 'required{error_nav_sort_required}|number{error_number_required}');

        $category = $this->getParam('category', 'required');
        if($category == 1) {
            $link = $this->getParam('linkS', 'required{error_nav_link_required}');
        }else{
            $link = $this->getParam('linkC', 'required{error_nav_link_required}');
        }

        $id = $this->getParam('id', 'required');

        if($this->errorInfo) {
            $this->data['error'] = $this->errorInfo;
            return $this->showView('admin/addnav');
        }

        $parentId = 0;
        $this->adminlib->editNav($name, $position, $sort, $link, $parentId, $id);

        $this->data['success'] = '编辑导航成功！';
        $this->data['bread'] = '自定义导航';
        $this->data['redirect'] = 'admin/nav';
        $this->data['current'] = 2;
        $this->showView('admin/success');

    }

    public function pic() {
        $this->checkLogin();
        $this->showView('admin/index_pic');
    }

    /**
     * 显示页面列表
     */
    public function page($page = 1) {
        $this->checkLogin();

        $total = $this->adminlib->countPages();
        $totalPage = ceil($total/BaseLib::NUM_PER_PAGE);

        $page = $page ? ($page <=$totalPage ? $page : $totalPage) : 1;
        $pages = $this->adminlib->getPages($page);

        $this->data['totalPage'] = $totalPage;
        $this->data['pages'] = $pages;
        $this->data['page'] = $page;
        $this->showView('admin/page');
    }

    /**
     * 显示添加页面
     */
    public function addPage($id = 0) {
        $this->checkLogin();
        $parents = $this->adminlib->getParentPage();
        $page = new stdClass();

        if($id) {
            $page = $this->adminlib->getPageById($id);
            if(! $page) {
                redirect('admin/page');
            }
        }

        $this->data['page'] = $page;
        $this->data['id'] = $id;
        $this->data['parents'] = $parents;

        $this->showView('admin/addpage');
    }

    /**
     * 添加页面操作
     */
    public function addPageAction() {
        $this->checkLogin();
        $name = htmlspecialchars($this->getParam('name', 'required{error_page_name_required}|maxLength:15{error_page_name_larger}'));
        $parent = $this->getParam('parent');
        if($parent == 0) {
            $title = $this->getParam('title', 'required{error_page_title_required}|maxLength:15{error_page_title_larger}');
        }else{
            $title = '';
        }
        $keyword = $this->getParam('keyword', 'required{error_keyword_required}|maxLength:15{error_page_keyword_larger}');
        $content = $this->getParam('content', 'required{error_keyword_required}');
        $id = $this->getParam('id');

        if($this->errorInfo) {
            $parents = $this->adminlib->getParentPage();
            $page = new stdClass();
            if($id != 0 ) {
                $page = $this->adminlib->getPageById($id);
                if(! $page) {
                    redirect('admin/page');
                }
            }

            $this->data['page'] = $page;
            $this->data['error'] = $this->errorInfo;
            $this->data['id'] = $id;
            $this->data['parents'] = $parents;

            return $this->showView('admin/addpage');
        }

        if($id == 0) {
            $this->data['bread'] = '添加页面';
            $this->data['success'] = '新增页面成功';
            $this->adminlib->addPage($name, $parent, $title, $keyword, $content);
        } else {
            $this->data['bread'] = '更新页面';
            $this->data['success'] = '更新页面成功';
            $this->adminlib->editPage($id, $name, $parent, $title, $keyword, $content);
        }

        $this->data['redirect'] = 'admin/page';
        $this->data['current'] = 4;
        $this->showView('admin/success');
    }

    public function deletePage() {
        $this->isLogin();
        $id = $this->getParam('id', 'required');
        $this->adminlib->deletePage($id);
        echo json_encode(array('status' => self::RESPONSE_SUCCESS));
    }

    /**
     * 编辑首页
     */
    public function editIndex() {
        $this->checkLogin();

        $rows = $this->adminlib->getRows();

        $this->data['rows'] = $rows;

        $this->showView('admin/editindex');
    }

    /**
     * 显示新增行区域页面
     */
    public function addRow() {
        $this->checkLogin();
        $this->showView('admin/addrow');
    }

    /**
     * 新增区域操作
     */
    public function addRowAction() {
        $this->isLogin();

        $name = $this->getParam('name', 'required');
        $height = $this->getParam('height', 'required');
        $sort = $this->getParam('sort', 'required');
        $columns = $this->getParam('columns', 'required');

        if($this->errorInfo){
            echo json_encode(array('status' => 200));
        } else {
            $id = $this->adminlib->addRow($name, $height, $sort, $columns);
            echo json_encode(array('status' => 0, 'id' => $id));exit;
        }
    }

    /**
     * 显示编辑首页新增行页面
     */
    public function editRow($id) {
        $this->checkLogin();

        $row = $this->adminlib->getRowAndColumns($id);
        if(! $row) {
            redirect('admin/editIndex');
        }else{
            $this->data['id'] = $id;
            $this->data['row'] = $row;
            $this->showView('admin/editrow');
        }

    }

    /**
     * 编辑首页行
     */
    public function editRowAction()
    {
        $this->isLogin();

        $id = $this->getParam('id', 'required');
        $name = $this->getParam('name', 'required');
        $height = $this->getParam('height', 'required');
        $sort = $this->getParam('sort', 'required');
        $columns = $this->getParam('columns', 'required');

        if ($this->errorInfo) {
            echo json_encode(array('status' => 200));
        } else {
            $result = $this->adminlib->editRow($id, $name, $height, $sort, $columns);
            if ($result) {
                echo json_encode(array('status' => self::RESPONSE_SUCCESS, 'id' => $id));
            } else {
                echo json_encode(array('status' => self::RESPONSE_FAILURE, 'id' => $id));
            }
        }
    }

    /**
     * 删除一个区域
     */
    public function deleteRow() {
        $this->isLogin();

        $id = $this->getParam('id', 'required');
        $result = $this->adminlib->deleteRow($id);

        if($result> 0) {
            $status = self::RESPONSE_SUCCESS;
        }else{
            $status = self::RESPONSE_FAILURE;
        }
        echo json_encode(array('status' => $status));
    }

    public function user() {
        $this->checkLogin();
        $this->showView('admin/admin');
    }

}