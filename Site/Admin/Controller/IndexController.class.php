<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        if(UID){//判断是否登录
            $this -> meta_title = '管理首页';
//            echo PHP_OS;    //操作系统
            $this-> server_software = explode(' ',$_SERVER['SERVER_SOFTWARE']);
            //数据库版本
            $this->system_info_mysql = M()->query('SELECT version() as v');
            $this -> display();
        }else
            $this -> redirect(U('Login/login'));
    }
}