<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2017/11/12
 * Time: 21:10
 */

namespace Admin\Controller;


use Think\Controller;
use Think\Verify;

class CommonController extends Controller
{
    /**
     * 后台控制器初始化
     */
    public function _initialize(){
//        session_unset();
//        session_destroy();
        define('UID',is_login());//登录用户ID
        $user_auth=session('user_auth');
        $username=$user_auth['username'];
        $this->username = $username;
        if(empty($username)) $this->auther = $username; //如果设置username为空 则使用用户名
        if(!UID){//还没登录 跳转到登录界面
            $this -> redirect('Login/login');
        }
    }
}