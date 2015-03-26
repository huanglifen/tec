<?php
require_once 'baselib.php';
/**
 * 管理类lib层
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
        $this->ci->load->model('source_model');
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

        $return = array();
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
    public function addNav($name, $position, $sort, $link, $parentId, $logo = '') {
        return $this->ci->nav_model->addNav($name, $position, $sort, $link, $parentId, $logo);
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
     * @param $logo
     *
     * @return mixed
     */
    public function editNav($name, $position, $sort, $link, $parentId, $id, $logo = '') {
        return $this->ci->nav_model->editNav($name, $position, $sort, $link, $parentId, $id, $logo);
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
     * @param $content
     * @param $sort
     * @param $pic
     * @param int $default
     * @return mixed
     */
    public function addPage($name, $parent, $title, $keyword, $content, $sort, $pic, $default = 0) {
        $data = array(
            'name' => $name,
            'parent_id' => $parent,
            'title' => $title,
            'keyword' => $keyword,
            'default' => $default,
            'content' => $content,
            'sort' => $sort,
            'time' => date('Y-m-d H:i:s', time())
        );
        if($pic != false) {
            $data['picture'] =  $pic;
        }
        return $this->ci->page_model->addPage($data);
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
     * @param $sort
     * @param $pic
     * @param int $default
     * @return mixed
     */
    public function editPage($id, $name, $parent, $title, $keyword, $content, $sort, $pic, $default = 0) {
        $data = array(
            'name' => $name,
            'parent_id' => $parent,
            'title' => $title,
            'keyword' => $keyword,
            'default' => $default,
            'content' => $content,
            'sort' => $sort,
        );
        if($pic != false) {
            $data['picture'] =  $pic;
        }
        return $this->ci->page_model->editPage($id, $data);
    }

    /**
     * 按主键删除一个页面
     * @param $id
     * @return mixed
     */
    public function deletePage($id) {
        return $this->ci->page_model->deletePage($id);
    }

    /**
     * 按主键查询资源信息
     *
     * @param $id
     * @return mixed
     */
    public function getSourceById($id) {
        return $this->ci->source_model->getPictureById($id);
    }

    /**
     * 添加或者更新一个图片资源
     *
     * @param $picture
     * @param $id
     * @return mixed
     */
    public function addOrUpdatePicture($picture, $id) {
        if($id) {
            return $this->ci->source_model->updateSourceById($id, $picture);
        } else {
            $picture->type = 1;
            $picture->time = date('Y-m-d H:i:s', time());
            return $this->ci->source_model->addSource($picture);
        }
    }

    /**
     * 按页获取首页图片
     *
     * @param $page
     * @param int $limit
     * @return mixed
     */
    public function getIndexPicture($page, $limit = self::NUM_PER_PAGE) {
         $offset = ($page -1 ) * $limit;
         return $this->ci->source_model->getSourceByType(1, $offset, $limit);
    }

    /**
     * 统计首页图片
     *
     * @return mixed
     */
    public function countIndexPicture() {
        return $this->ci->source_model->countSourceByType(1);
    }

    /**
     * 删除一张图片
     *
     * @param $id
     * @return mixed
     */
    public function deleteSource($id) {
        return $this->ci->source_model->deleteSource($id);
    }

    /**
     * 按主键获取管理员
     *
     * @param $id
     * @return mixed
     */
    public function getAdminById($id) {
        return $this->ci->admin_model->getAdminById($id);
    }

    /**
     * 统计所有管理员
     *
     * @return mixed
     */
    public function countAdmins() {
        return $this->ci->admin_model->countAdmins();
    }

    /**
     * 按页获取管理员记录
     *
     * @param $page
     * @param int $limit
     * @return mixed
     */
    public function getAdmins($page, $limit = self::NUM_PER_PAGE) {
        $offset = ($page - 1) * $limit;
        return $this->ci->admin_model->getAdmins($limit, $offset);
    }

    /**
     * 添加一个管理员
     *
     * @param $name
     * @param $password
     * @return mixed
     */
    public function addAdmin($name, $password) {
        $password = md5($password);
        $data = array(
            'name' => $name,
            'password' => md5($password),
            'status' => Admin_model::STATUS_OPEN,
            'time' => date('Y-m-d H:i:s', time()),
            'default' => Admin_model::NOT_DEFAULT,
        );
        return $this->ci->admin_model->addAdmin($data);
    }

    /**
     * 更新管理员状态
     *
     * @param $id
     * @param $isDefault
     * @param $status
     * @return bool
     */
    public function changeStatus($id, $isDefault, $status) {
        if($isDefault) {
            return false;
        }

        $changeArr = array(
            Admin_model::STATUS_OPEN => Admin_model::STATUS_CLOSE,
            Admin_model::STATUS_CLOSE => Admin_model::STATUS_OPEN
        );
        $status = $changeArr[$status];
        $data['status'] = $status;
        return $this->ci->admin_model->updateAdminById($data, $id);
    }

    /**
     * 修改管理员密码
     *
     * @param $password
     * @param $id
     * @return mixed
     */
    public function changePassword($password, $id) {
        $data = array(
            'password' => md5($password)
        );
        return $this->ci->admin_model->updateAdminById($data, $id);
    }
}