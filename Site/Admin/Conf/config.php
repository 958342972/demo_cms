<?php
return array(
	//'配置项'=>'配置值'

    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__CSS__' => __ROOT__.'/'.MODULE_PATH.'/View/Common/css',
        '__JS__' => __ROOT__.'/'.MODULE_PATH.'View/Common/js',
        '__IMG__' => __ROOT__.'/'.MODULE_PATH.'View/Common/images',
        '__PLUG__' => __ROOT__.'/Public/plug',
    ),
    /* 表单类型 */
    'FORM_ITEM_TYPE' => array(
        'hidden'    =>  array('隐藏','varchar(32) NOT NULL'),
        'mun'       =>  array('数字','int(10) UNSIGNED NOT NULL'),
        'radio'     =>  array('单选','varchar(32) NOT NULL'),
        'checkbox'  =>  array('复选框','varchar(32) NOT NULL'),
        'select'    =>  array('下拉框','varchar(32) NOT NULL'),
        'text'      =>  array('字符串','varchar(128) NOT NULL'),
        'textarea'  =>  array('文本','varchar(256) NOT NULL'),
        'time'      =>  array('时间','int(10) UNSIGNED NOT NULL'),
        'images'    =>  array('图片','varchar(255) NOT NULL'),
        'editor'    =>  array('编辑器','varchar(255) NOT NULL'),
        'file'      =>  array('文件','varchar(255) NOT NULL'),
    ),
    'CONFIG_GROUP'=>array('站点','系统','高级'),    //配置分组

);