<?php
require_once 'baselib.php';
/**
 * 前端lib层
 */
class WebLib extends BaseLib{
    public function __construct() {
        parent::__construct();
        $this->ci->load->model('admin_model');
        $this->ci->load->model('config_model');
        $this->ci->load->model('nav_model');
        $this->ci->load->model('indexrow_model');
        $this->ci->load->model('indexcolumn_model');
        $this->ci->load->model('page_model');
        $this->ci->load->model('source_model');
    }

    /**
     * 判断网站是否关闭
     *
     * @return mixed
     */
    public function checkClose() {
       $isClose = $this->ci->config_model->getConfigByName('close');
        return $isClose ? $isClose->value : $isClose;
    }

    /**
     * 判断网站是否关闭
     *
     * @return mixed
     */
    public function getLogo() {
        $logo = $this->ci->config_model->getConfigByName('siteLogo');
        if($logo) {
            $logo = json_decode($logo->value, true);
            return $logo['fileName'];
        }else{
            return false;
        }
    }

    public function getSiteTitle() {
        $title = $this->ci->config_model->getConfigByName('siteTitle');
        if($title) {
            return $title->value;
        }else{
            return false;
        }
    }

    /**
     * 获取导航记录
     *
     * @return array
     */
    public function getNavs() {
        $head = $this->ci->nav_model->getNavOrderBySort(Nav_model::TYPE_HEAD, 0, 10);
        $main = $this->ci->nav_model->getNavOrderBySort(Nav_model::TYPE_MAIN, 0, 10);
        $bottom = $this->ci->nav_model->getNavOrderBySort(Nav_model::TYPE_BOTTOM, 0, 10);

        $navs = compact('main', 'head', 'bottom');
        return $navs;

    }

    /**
     * 获取区域极其子区域
     *
     * @return mixed
     */
    public function getRowsAndColumns() {
        $rowIds = array();
        $rows = $this->getRows();
        foreach($rows as $row) {
            $rowIds[] = $row->id;
        }
        if(count($rowIds)) {
            $columns = $this->getColumns($rowIds);
        }

        foreach($rows as $row) {
            $row->columns = array();
            $row->width = 0;
            foreach($columns as $column) {
                if($column->row_id == $row->id) {
                    $row->columns[] = $column;
                    $row->width += $column->width;
                }
            }
        }
        return $rows;
    }

    /**
     * 获取首页区域记录
     *
     * @return mixed
     */
    public function getRows() {
        return $this->ci->indexrow_model->getRowsOrderBySort(0, 10);
    }

    /**
     * 根据row_ids获取子区域
     * @param $rowIds
     * @return mixed
     */
    public function getColumns($rowIds) {
        return $this->ci->indexcolumn_model->getColumnsOrderBySort($rowIds);
    }

    /**
     * 获取首页轮播图
     *
     * @return mixed
     */
    public function getPictures() {
        return $this->ci->source_model->getSourceByTypeOrderBySort(1, 0, 10);
    }

    /**
     * 获取页面信息
     * 并获取父页面、兄弟页面相关信息
     *
     * @param $pageId
     * @return array|bool
     */
    public function getPageInfo($pageId) {
        $page = $this->ci->page_model->getPageById($pageId);
        if(! $page) {
            return false;
        }
        if($page->parent_id) {
            $parent = $this->ci->page_model->getPageById($page->parent_id);
            $siblings = $this->ci->page_model->getPagesByParentId($page->parent_id);
        }else{
            $parent = $page;
            $siblings = $this->ci->page_model->getPagesByParentId($page->id);
        }

        $result = compact('page', 'parent', 'siblings');
        return $result;
    }

    /**
     * 根据导航链接的页面获取最前面的一个导航Id
     * @param $pageId
     * @return mixed
     */
    public function getNavIdByPageId($pageId) {
        $result = $this->ci->nav_model->getNavByPageId($pageId);

        if($result) {
             $result = $result->id;
        }
        return $result;
    }

    /**
     * 搜索
     *
     * @param $keyword
     * @param $page
     * @return mixed
     */
    public function searchKeyword($keyword, $page) {
        $limit = self::NUM_PER_PAGE;
        $offset = ($page - 1) * $limit;
        return $this->ci->page_model->searchKeyword($keyword, $limit, $offset);
    }

    /**
     * 统计含关键字$keyword的页面总数
     *
     * @param $keyword
     * @return mixed
     */
    public function countSearchByKeyword($keyword) {
        return $this->ci->page_model->countSearchByKeyword($keyword);
    }
}