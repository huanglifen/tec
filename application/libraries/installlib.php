<?php
require_once 'baselib.php';
/**
 * 安装类lib层
 */
class InstallLib extends BaseLib{

    public function configDb($host, $dbname, $database, $pwd, $tablePrefix, $username, $password)
    {
        $databaseFile = $this->ci->config->item('database');
        $configStr = "<?php if(! defined('BASEPATH')) exit('No direct script access allowed');\n";

        $configStr .= "\$active_group = 'default';\n";
        $configStr .= "\$active_record = TRUE;\n\n";

        $configStr .= "\$db['default']['dbdriver'] = 'mysql';\n";
        $configStr .= "\$db['default']['pconnect'] = TRUE;\n";
        $configStr .= "\$db['default']['db_debug'] = FALSE;\n";
        $configStr .= "\$db['default']['cache_on'] = TRUE;\n";
        $configStr .= "\$db['default']['cachedir'] = '';\n";
        $configStr .= "\$db['default']['char_set'] = 'utf8';\n";
        $configStr .= "\$db['default']['dbcollat'] = 'utf8_general_ci';\n";
        $configStr .= "\$db['default']['swap_pre'] = '';\n";
        $configStr .= "\$db['default']['autoinit'] = TRUE;\n";
        $configStr .= "\$db['default']['dbcollat'] = FALSE;\n\n";

        $configStr .= "\$db['default']['hostname'] = '" . $host . "';\n";
        $configStr .= "\$db['default']['database'] = '" . $database . "';\n";
        $configStr .= "\$db['default']['dbprefix'] = '" . $tablePrefix . "';\n";
        $configStr .= "\$db['default']['username'] = '" . $dbname . "';\n";
        $configStr .= "\$db['default']['password'] = '" . $pwd . "';\n";

        $fopenConfig = fopen($databaseFile, 'w+');
        fwrite($fopenConfig, $configStr);
        fclose($fopenConfig);

        $this->ci->load->database();
        if(! $this->ci->db->conn_id) {
            return array('status' => false, 'msg' => 'mysql_setting_error');
        }

        $result = $this->loadSql($tablePrefix, $username, $password);
        if(! $result) {
            return array('status' => false, 'msg' => 'import_tables_error');
        }
        $result = $this->initAdmin($username, $password, $tablePrefix);
        if(! $result) {
            return array('status' => false, 'msg' => 'insert_admin_info_error');
        }
        return array('status' => true);
    }

    protected function loadSql($tablePrefix){
        $loadSql = $this->ci->config->item('sql');
        $sqls = file_get_contents($loadSql);

        $sqls = preg_replace('/hx_/Ums', "$tablePrefix", $sqls);
        $sqls = str_replace(array("\r\n", "\r", "\n"),"", $sqls);
        $sqls = explode("{;}", $sqls);

        foreach($sqls as $sql){
            $sqlTrim = trim($sql);
            if(!empty($sqlTrim)) {
                $result = $this->ci->db->query($sql);
                if(! $result){
                    return false;
                }
            }
        }
        return true;
    }

    protected function initAdmin($username, $password, $tablePrefix) {
        $time = date('Y-m-d H:i:s', time());
        $sql = "insert into " .$tablePrefix ."admin (`name`, `password`, `status`, `time`, `default`) value('$username', '$password', 0, '$time', 1)";
        $result = $this->ci->db->query($sql);

        return $result;
    }
}