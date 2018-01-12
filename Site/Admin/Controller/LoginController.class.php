<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2017/11/11
 * Time: 22:41
 */

namespace Admin\Controller;


use Think\Controller;

/**
 * Class LoginController
 * @package Admin\Controller
 * 后台用户登录
 * @author wusn <958342972@qq.com>
 */
class LoginController extends Controller
{
    /**
     * 后台用户登录
     * @author wusn <958342972@qq.com>
     */
    public function login($username = null,$password = null,$code = null){
        if(IS_POST){    //判断是否提交
            /* 检测验证码 */
            if(!check_verify($code)){
                $this -> error('验证码错误！');
            }else{
                //自动验证
                $rules=array(
                    array('username','require','用户名不能为空！'),
                    array('password','require','密码不能为空！'),
                );
                $db = M('manage');
                if($db->validate($rules)->create()){
                    $userinfo=$db->where(array('username'=>$username))->find();//查找数据库中是否存在登录的用户
                    if($userinfo){
                        if(set_encrypt($password)===$userinfo['password']){//验证密码是否正确
                            $userarr['user_auth'] = array(
                                'uid' => $userinfo['id'],
                                'username' => $userinfo['username'],
                                'user_status' => $userinfo['status'],
                            );
                            if($userinfo['status']==1){//判断状态
                                //更新登录的时间与登录的IP
                                $update = array(
                                    'last_login_time' => time(),
                                    'last_login_ip' => get_client_ip(),
                                );
                                $db -> where(array('id'=>$userinfo['id'])) -> save($update);//更新登录时间与登录IP
                                //将登录的用户信息存入到session中
                                session('user_auth',$userarr['user_auth']);
                                session('user_auth_sign',data_auth_sign($userarr['user_auth']));//哈希算法将登录信息存入到session
                                //登录成功跳转到后台首页
                                $this -> success('登录成功！',U('Index/index'));
                            }else{
                                switch ($userinfo['status']){
                                    case -1: $error = '用户不存在或被禁用！'; break;  //系统级别禁用
                                    case 0; $error = '参数错误！'; break;
                                    default:$error = '未知错误！'; break;
                                }
                                $this -> error($error);
                            }
                        }else{
                            $this -> error('用户名或密码错误！');//密码错误
                        }
                    }else{
                        $this -> error('用户名或密码错误！');//用户不存在
                    }
                }else{
                    //自动验证错误信息
                    $this -> error($db -> getError());
                }
            }
        }else{
            //判断是否登录
            if(is_login()){
                $this -> redirect('Index/index');
            }else{
//                echo set_encrypt('123456');die();
//                p($_SESSION) ;
                $this -> display();
            }
        }
    }
    /**
     *@param 退出登录
     */
    public function logout(){
        if(is_login()){ //判断是否存在登录的用户ID
            session('[destroy]');   //销毁session
            $this -> success('退出成功！',U('login'));
        }else{
            $this -> redirect('login');
        }
    }

    /**
     * @param 验证码
     */
    public function verify(){
        $config =    array(
            'imageW'    =>  115,    //验证码宽度
            'imageH'    =>  35,     //验证码高度
            'fontSize'  => 15,      // 验证码字体大小
            'length'    =>  4,      // 验证码位数
            'useNoise'  =>  false,  // 关闭验证码杂点
            'fontttf'   =>  '5.ttf',//验证码字体
        );
        $Verify = new \Think\Verify($config);
        $Verify -> entry(1);
    }
}