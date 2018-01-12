<?php
$arr = array(
	//'配置项'=>'配置值'

    /* 模块相关配置 */
    'AUTOLOAD_NAMESPACE'    =>  array('Addons' => ONETHINK_ADDON_PATH), //扩展模块列表
    'DEFAULT_MODULE'    =>  'Home', //默认模块
    'MODULE_DENY_LIST'   => array('Common', 'User'),    //禁止访问的模块
    //'MODULE_ALLOW_LIST'  => array('Home','Admin'),    //允许访问的模块

    /* 系统数据加密设置 */
    'DATA_AUTH_KEY' =>  'Wusn|958342972@qq.com',    //默认数据加密key

    /* 调试配置 */
    'SHOW_PAGE_TRACE'   => true,

    /* 用户相关设置 */
    'USER_MAX_CACHE' => 1000,   //最大缓存用户数
    'USER_ADMINISTRATOR'    =>  1,  //管理员用户ID

    /* URL配置 */
    'URL_CASE_INSENSITIVE'  =>  true,   //默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'         =>  '2',    //URL模式

    /* 全局过滤配置 */
    'DEFAULT_FILTER' => '', //全局过滤函数


);

return array_merge(include_once './Data/DbConfig.php',$arr);