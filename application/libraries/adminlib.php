<?php
require_once 'baselib.php';
/**
 * 安装类lib层
 */
class AdminLib extends BaseLib{
    function __construct() {
        parent::__construct();
        $this->ci->load->model('admin_model');
        $this->ci->load->model('config_model');
        $this->ci->load->model('nav_model');
        $this->ci->load->model('indexrow_model');
        $this->ci->load->model('indexcolumn_model');
        $this->ci->load->model('page_model');
    }

    /**
     * 根据用户名和密码获取用户信息
     *
     * @param $name
     * @param $password
     * @return bool
     */
    public function getAdminByNameAndPwd($name, $password) {
        $result = $this->ci->admin_model->getAdminByNameAndPwd($name, $password);
        if(! $result) {
            return false;
        }
        return $result;
    }

    /**
     * 添加配置数据
     *
     * @param array $config
     */
    public function setConfig($config = array()) {
        foreach($config as $key => $value){
            $this->ci->config_model->addConfig($key, $value);
        }
    }

    /**
     * 获取配置数据
     *
     * @return array
     */
    public function getConfig() {
        $result = $this->ci->config_model->getConfig();

        if(count($result)) {
            $return = array();
            foreach($result as $key => $v) {
                $name = $v->name;
                $value  = $v->value;
                $return[$name] = $value;
            }
        }
        return $return;
    }

    /**
     * 添加一条导航信息
     *
     * @param $name
     * @param $position
     * @param $sort
     * @param $link
     * @param $parentId
     *
     * @return mixed
     */
    public function addNav($name, $position, $sort, $link, $parentId) {
        return $this->ci->nav_model->addNav($name, $position, $sort, $link, $parentId);
    }

    /**
     * 按类型获取导航记录
     *
     * @param int $type
     * @param $page
     * @return mixed
     */
    public function getNav($type = 1, $page) {
        $offset = ( $page - 1 ) * self::NUM_PER_PAGE;
        return $this->ci->nav_model->getNav($type, $offset, self::NUM_PER_PAGE);
    }

    /**
     * 按类型统计导航记录
     *
     * @param int $type
     *
     * @return mixed
     */
    public function countNav($type = 1) {
        return $this->ci->nav_model->countNav($type);
    }

    /**
     * 按主键删除导航
     *
     * @param $id
     *
     * @return mixed
     */
    public function delNav($id) {
        return $this->ci->nav_model->delNav($id);
    }

    /**
     * 按主键编辑导航记录
     *
     * @param $name
     * @param $position
     * @param $sort
     * @param $link
     * @param $parentId
     * @param $id
     *
     * @return mixed
     */
    public function editNav($name, $position, $sort, $link, $parentId, $id) {
        return $this->ci->nav_model->editNav($name, $position, $sort, $link, $parentId, $id);
    }

    /**
     * 按主键查询导航记录
     *
     * @param $id
     *
     * @return mixed
     */
    public function getNavById($id) {
       return $this->ci->nav_model->getNavById($id);
    }

    /**
     * 添加首页块区域
     *
     * @param $name
     * @param $height
     * @param $sort
     * @param $columns
     *
     * @return mixed
     */
    public function addRow($name, $height, $sort, $columns) {
        $columnNum = count($columns);
        $id = $this->ci->indexrow_model->addRow($name, $height, $sort, $columnNum);
        $this->addColumns($id, $columns);
        return $id;
    }

    /**
     * 添加首页一个或者多个子区域
     *
     * @param $id
     * @param $columns
     *
     * @return mixed
     */
    public function addColumns($id, $columns) {
        $batch = array();
        foreach($columns as $column) {
            $column['row_id'] = $id;
            $column['time'] = date('Y-m-d H:i:s', time());
            unset($column['id']);
            $batch[] = $column;
        }
        return $this->ci->indexcolumn_model->addColumn($batch);
    }

    /**
     * 根据页码获取区域记录
     *
     * @param $page
     *
     * @return mixed
     */
    public function getRows() {
        return $this->ci->indexrow_model->getRows();
    }

    /**
     * 统计所有区域记录
     *
     * @return mixed
     */
    public function countRows() {
        return $this->ci->indexrow_model->countRows();
    }

    /**
     * 获取区域极其子区域信息
     *
     * @param $id
     * @return array
     */
    public function getRowAndColumns($id) {
        $row = $this->ci->indexrow_model->getRowById($id);
        if(! $row) {
            return false;
        }else{
            $row->columns = $this->ci->indexcolumn_model->getColumnsByRowId($id);
            return $row;
        }
    }

    /**
     * 按主键删除区域记录
     *
     * @param $id
     * @return mixed
     */
    public function deleteRow($id) {
        $result = $this->ci->indexrow_model->deleteRow($id);
        $this->ci->indexcolumn_model->deleteColumnsByRowId($id);

        return $result;
    }

    /**
     * 修改区域信息
     *
     * @param $name
     * @param $height
     * @param $sort
     * @param $columns
     * @return mixed
     */
    public function editRow($id, $name, $height, $sort, $columns) {
        $columnNum = count($columns);
        $result = $this->ci->indexrow_model->editRow($id, $name, $height, $sort, $columnNum);
        if($result) {
            $return =  $this->editColumns($id, $columns);
            return $return;
        }else{
            return false;
        }
    }

    /**
     * 更新区域下面的子区域
     *
     * @param $id
     * @param $columns
     * @return bool
     */
    public function editColumns($id, $columns) {
        $updateIds = array();
        $insert = array();
        $update = array();
        $columnIds = array();

        foreach ($columns as $column) {
            if ($column['id'] == 0) {
                $insert[] = $column;
            } else {
                $update[] = $column;
                $updateIds[] = $column['id'];
            }
        }

        $hasColumns = $this->ci->indexcolumn_model->getColumnsByRowId($id);
        foreach($hasColumns as $col) {
            $columnIds[] = $col->id;
        }
        $deleteIds = array_diff($columnIds, $updateIds);
        if(count($deleteIds)) {
          $this->ci->indexcolumn_model->deleteColumnsByIds($deleteIds);
        }

        if(count($update)) {
            $this->ci->indexcolumn_model->updateColumnsByIds($update, 'id');
        }

        if(count($insert)) {
           $this->addColumns($id, $insert);
        }
        return true;
    }

    /**
     * 按页码获取页面记录
     *
     * @param $page
     * @param $limit
     * @return mixed
     */
    public function getPages($page, $limit = self::NUM_PER_PAGE) {
        $offset = ($page - 1) * $limit;
        return $this->ci->page_model->getPages($limit, $offset);
    }

    /**
     * 统计页面记录
     *
     * @return mixed
     */
    public function countPages() {
        return $this->ci->page_model->countPages();
    }

    /**
     * 根据主键获取页面
     *
     * @param $id
     * @return mixed
     */
    public function getPageById($id) {
        return $this->ci->page_model->getPageById($id);
    }

    /**
     * 获取所有父级页面
     * @return mixed
     */
    public function getParentPage() {
        return $this->ci->page_model->getPagesByWhere('parent_id', 0);
    }

    /**
     * 添加一个页面
     *
     * @param $name
     * @param $parent
     * @param $title
     * @param $keyword
     *  @param $content
     * @param int $default
     * @return mixed
     */
    public function addPage($name, $parent, $title, $keyword, $content, $default = 0) {
        return $this->ci->page_model->addPage($name, $parent, $title, $keyword, $content, $default);
    }

    /**
     * 更新一个页面
     *
     * @param $id
     * @param $name
     * @param $parent
     * @param $title
     * @param $keyword
     * @param $content
     * @param int $default
     * @return mixed
     */
    public function editPage($id, $name, $parent, $title, $keyword, $content, $default = 0) {
        return $this->ci->page_model->editPage($id, $name, $parent, $title, $keyword, $content, $default);
    }

    /**
     * 按主键删除一个页面
     * @param $id
     * @return mixed
     */
    public function deletePage($id) {
        return $this->ci->page_model->deletePage($id);
    }
}