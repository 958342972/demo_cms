<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2017/11/17
 * Time: 20:58
 */

namespace Admin\Controller;


class SystemController extends CommonController
{
    private $table = 'config';

    /**
     * @param 配置管理
     * @author wusn <958342972@qq.com>
     */
    public function index(){
        $this->meta_title = '配置管理';
        $db = M($this->table);
        $where['group'] = I('get.group','','intval'); //获取分组
        $this->list = $db->where($where)->order('`group`,sort DESC')->select();
        $this->display();
    }

    /**
     * @param 添加配置
     * @author wusn <958342972@qq.com>
     */
    public function add_config(){
        $this->meta_title = '配置管理';
        $db = M($this->table);
        if(IS_POST){
            $data = I();
            $rules = array(
                array('status','1'),
                array('create_time','time',1,'function'),
            );
            $validate = array(
                array('name','require','名称不能为空'),
                array('name','','名称已存在',0,'unique',1),
                array('title','require','标题不能为空'),
            );
            if($db->auto($rules)->validate($validate)->create($data)){

            }else{
                $this->error($db->getError());
            }

        }else{
            $this->form_type = C('FORM_ITEM_TYPE');
            $this->config_group = C('CONFIG_GROUP');
            $this->display('edit_config');
        }
    }
}