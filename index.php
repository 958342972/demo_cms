<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Data: 2017/11/11
 * Time: 21:33
 */

if(version_compare(PHP_VERSION,'5.3.0','<'))  die('PHP版本必须大于 5.3.0 !');
/**
 * 系统调试设置
 * 项目正式部署后请设置为false
 */
define ( 'APP_DEBUG', true );
/**
 * 缓存目录设置
 * 此目录必须可写，建议移动到非WEB目录
 */
define ( 'RUNTIME_PATH', './Runtime/' );
define ( 'APP_PATH', './Site/' );
/**
 * 引入核心入口
 * ThinkPHP亦可移动到WEB以外的目录
 */
require './Include/index.php';