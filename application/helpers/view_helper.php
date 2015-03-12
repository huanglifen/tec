<?php
/**
 * 视图帮助函数
 */

/**
 * 显示数据或者显示默认值
 */
if(! function_exists('defaultValue')) {
    function defaultValue($value, $default = '') {
       return isset($$value) ? $$value : $default;
    }
}