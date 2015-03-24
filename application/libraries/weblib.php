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
        $columns = $this->getColumns($rowIds);

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



}