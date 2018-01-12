<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2017/11/11
 * Time: 22:24
 */


// 常量定义
const ONETHINK_VERSION    = '1.0.131218';
const ONETHINK_ADDON_PATH = './Addons/';

/**
 * 系统公共库文件
 * 主要定义系统公共函数库
 */

/**
 * 格式化数组
 * @param $arr 数组
 * @author wusn <958342972@qq.com>
 */
function p($arr){
    dump($arr,1,'',0);
}

/**
 * 检测用户是否登录
 * @return integer 0-未登录，大于0-当前登录用户ID
 * @author wusn <958342972@qq.com>
 */
function is_login(){
    $user = session('user_auth');
    if(empty($user)){
        return 0;
    }else{
        return session('user_auth_sign') == data_auth_sign($user) ? $user['uid'] : 0;
    }
}

/**
 * @param string $data  要加密的字符串
 * @param string $key   加密密钥
 * @param int $expire   过期时间 单位 秒
 * @return mixed
 * @author wusn <958342972@qq.com>  参考onethink
 */
function set_encrypt($data, $key = '', $expire = 0) {
    $key  = md5(empty($key) ? C('DATA_AUTH_KEY') : $key);
    $data = base64_encode($data);
    $x    = 0;
    $len  = strlen($data);
    $l    = strlen($key);
    $char = '';

    for ($i = 0; $i < $len; $i++) {
        if ($x == $l) $x = 0;
        $char .= substr($key, $x, 1);
        $x++;
    }

    $str = sprintf('%010d', $expire ? $expire + time():0);

    for ($i = 0; $i < $len; $i++) {
        $str .= chr(ord(substr($data, $i, 1)) + (ord(substr($char, $i, 1)))%256);
    }
    return str_replace(array('+','/','='),array('-','_',''),base64_encode($str));
}

/**
 * @param $data 要解密的字符串 （必须是think_encrypt方法加密的字符串）
 * @param string $key   加密密钥
 * @return bool|string
 * @author wusn <958342972@qq.com>  参考onethink
 */
function set_decrypt($data, $key = ''){
    $key    = md5(empty($key) ? C('DATA_AUTH_KEY') : $key);
    $data   = str_replace(array('-','_'),array('+','/'),$data);
    $mod4   = strlen($data) % 4;
    if ($mod4) {
        $data .= substr('====', $mod4);
    }
    $data   = base64_decode($data);
    $expire = substr($data,0,10);
    $data   = substr($data,10);

    if($expire > 0 && $expire < time()) {
        return '';
    }
    $x      = 0;
    $len    = strlen($data);
    $l      = strlen($key);
    $char   = $str = '';

    for ($i = 0; $i < $len; $i++) {
        if ($x == $l) $x = 0;
        $char .= substr($key, $x, 1);
        $x++;
    }

    for ($i = 0; $i < $len; $i++) {
        if (ord(substr($data, $i, 1))<ord(substr($char, $i, 1))) {
            $str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
        }else{
            $str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
        }
    }
    return base64_decode($str);
}

/**
 * 数字签名认证
 * @param $data array 被认证的数据
 * @return string   签名
 * @author wusn <958342972@qq.com>
 */
function data_auth_sign($data){
    //数据类型检测
    if(!is_array($data)){
        $data = (array)$data;
    }
    ksort($data);   //排序-升序 (数组key排序)
    $code = http_build_query($data);    //url编码并生成query字符串 (key=value&key=value)
    $sign = sha1($code); //生成签名 (安全哈希算法)
    return $sign;
}

/**
 * @param string $code 用户输入的验证码字符串
 * @param int $id 验证码ID
 * @return bool 验证结果
 * @author wusn <958342972@qq.com>
 */
function check_verify($code, $id = 1){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}