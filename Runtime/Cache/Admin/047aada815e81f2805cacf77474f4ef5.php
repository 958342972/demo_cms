<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo ($meta_title); ?>-<?php echo C('SYSTEM_SITENAME');?>-后台管理</title>
    <script type="text/javascript" src="/test/./Site/Admin/View/Common/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/test/./Site/Admin/View/Common/js/jquery.SuperSlide.2.1.1.js"></script>
    <script type="text/javascript" src="/test/Public/js/jquery-form.js"></script>
    <script type="text/javascript" src="/test/./Site/Admin/View/Common/js/default.js"></script>
    <script type="text/javascript" src="/test/Public/plug/layer/layer.js"></script>
    <script type="text/javascript" src="/test/Public/plug/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/test/./Site/Admin/View/Common/js/landecms_layout.js"></script>
    <script type="text/javascript" src="/test/Public/plug/upimg/upimg.js"></script>
    <link rel="stylesheet" type="text/css" href="/test/Public/plug/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/test/Public/plug/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/test/./Site/Admin//View/Common/css/common.css">
    <link rel="stylesheet" type="text/css" href="/test/./Site/Admin//View/Common/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/test/./Site/Admin//View/Common/css/iconfont/iconfont.css">
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="head-fixed">
<div class="head navbar-fixed-top">
    <div class="container-fluid">
        <div class="logo pull-left">
            <img src="/test/./Site/Admin/View/Common/images/logo.png" alt="">
        </div>
        <div class="nav_list pull-left">
            <ul>
                <?php if(is_array($menu_level)): foreach($menu_level as $key=>$list): ?><li>
                        <a href="<?php echo (U($list["name"])); ?>" <?php if($list['id'] == $current): ?>class="on"<?php endif; ?> ><?php echo ($list["title"]); ?></a>
                    </li><?php endforeach; endif; ?>
            </ul>
        </div>
        <div class="pull-right">
            <!-- 语言版本 -->
            <div class="pull-left dropdown">
                <button type="button" class="btn btn-topaln lang" data-toggle="dropdown" ><i class="fa fa-globe"></i>&nbsp;&nbsp;<?php echo ($default_lang); ?>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                    <?php if(is_array($lang_list)): foreach($lang_list as $key=>$vo): ?><li><a href="<?php echo U('Common/change_lang',array('lang'=>$key));?>" class="chang_lang"><?php echo ($vo); ?></a></li><?php endforeach; endif; ?>
                    <script type="text/javascript">
                        $('.chang_lang').lande('action');
                    </script>
                </ul>
            </div>
            <!-- 管理员 -->
            <div class="pull-left">
                <div class="btn btn-topaln dropdown-toggle userinfo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class='fa  fa-tachometer'></i>&nbsp;&nbsp;<?php echo ($username); ?>&nbsp;&nbsp;<i class="caret"></i>
                </div>
                <ul class="dropdown-menu dropdown-menu-right">

                    <li>
                        <a href="<?php echo U('User/updatepass');?>">
                            <span class='fa fa-key'></span>&nbsp;&nbsp;修改密码</a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="<?php echo U('Login/layout');?>" id="lyout">
                            <span class='glyphicon glyphicon-log-out'></span>&nbsp;&nbsp;退出</a>
                        <script type="text/javascript">
                            $('#lyout').lande('action');
                        </script>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container-content">
    <div class="container-left fixed-left posrel">
        <!--<div class="left_nav_toggle posabs" id='left_nav_toggle'>-->
        <!--<div class="bg show"></div>-->
        <!--<span class='fa fa-angle-double-left'></span>-->
        <!--</div>-->
        <div class="left_nav pull-left">
            <ul>
                <li>
                    <a href="<?php echo U('category/index');?>">
                        <span class="glyphicon glyphicon-th-list"></span>
                        <p>栏目管理</p>
                    </a>
                </li>
                <?php if(is_array($menu_quick)): foreach($menu_quick as $key=>$level2): ?><li>
                        <a href="<?php echo (U($level2["category_url"])); ?>">
                            <span class="<?php echo ($level2["icon"]); ?>"></span>
                            <p><?php echo ($level2["name"]); ?></p>
                        </a>
                    </li><?php endforeach; endif; ?>
            </ul>
        </div>
        <div class="left_con_list pull-right">
            <div class="left-quick">
                <ul>
                    <li><a href="<?php echo U('/index');?>" target="_blank" class="home" title="网站首页"><i class="iconfont iconfont-home"></i></a></li>
                    <li><a href="" class="user" title="会员中心"><i class="iconfont iconfont-user"></i></a></li>
                    <li><a href="<?php echo U('Common/clear_cache');?>" class="remove" title="清理缓存"><i class="iconfont iconfont-clear"></i></a></li>
                    <script type="text/javascript">
                        $('.remove').lande('action');
                    </script>
                </ul>
            </div>
            
            <div class="left_list">
                
    <script type="text/javascript" src="/test/Public/plug/jquery_ztree/jquery.ztree.core-3.5.min.js"></script>
<script type="text/javascript" src="/test/Public/plug/jquery_ztree/jquery.ztree.exedit.min.js"></script>
<link rel="stylesheet" type="text/css" href="/test/Public/plug/jquery_ztree/css/zTreeStyle/zTreeStyle.css">
<ul class="ztree" id="treeDemo" ></ul>
<style type="text/css">
    .ztree * {font-size:12px;font-family:"Microsoft Yahei",Verdana,Simsun,"Segoe UI Web Light","Segoe UI Light","Segoe UI Web Regular","Segoe UI","Segoe UI Symbol","Helvetica Neue",Arial,FontAwesome}
    .loading{margin-top:20px;text-align: center}
    .ztree{margin: 0;padding: 0;width:100%}
    .ztree li ul{ margin:0; padding:0}
    .ztree li {line-height:38px;}
    .ztree li a {width:100%;height:38px;padding: 0px;color: #444;padding-left:2px;}
    .ztree li a:hover {text-decoration:none; background-color: #fff;color: #FF4200}
    .ztree li a:hover span{color: #FF4200}
    /*.ztree li a span.button.switch {visibility:hidden}*/
    .ztree.showIcon li a span.button.switch {visibility:visible}
    .ztree li a.curSelectedNode {background-color:#fff;border:0;height:38px;color: #FF4200}
    .ztree li a.curSelectedNode span{color: #FF4200}
    .ztree li.level1 a.curSelectedNode {background-color:#F6F6F6;border:0;height:38px;color: #FF4200}
    .ztree li.level1 a.curSelectedNode span{color: #FF4200}
    .ztree li ul.level0{background: #fff}
    .ztree li span {line-height:38px;}
    .ztree li.level0{border-bottom:1px solid  #e5e5e5;}
    .ztree li.level1 a{font-size:12px;}
    .ztree li.level1 a:hover{background: #F6F6F6}
    .ztree li.level1{border-top:1px dotted  #e5e5e5;font-size: 12px;}
    .ztree li.level2{border-top:1px dotted  #e5e5e5;}
    .ztree li span.button.switch {width: 16px;height: 16px;}

    .ztree li a.level0 span {}
    /*.ztree li span.button {background-image:url("./left_menuForOutLook.png"); *background-image:url("./left_menuForOutLook.gif")}*/
    .ztree li span.button {
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        transform: translate(0, 0);
        color: #888;
    }
    .ztree li span.button.switch.level0 {width: 8px; height:15px;margin-left:10px;}
    .ztree li span.button.switch.level0:before{content:"\f0da"; }
    .ztree li span.button.switch.level1 {width: 8px; height:15px;margin-left:20px;}
    .ztree li span.button.switch.level2 {width: 8px; height:15px;margin-left:25px;}
    .ztree li span.button.switch.level3 {width: 8px; height:15px;margin-left:30px;}
    .ztree li span.button.noline_open {background: none;}
    .ztree li span.button.noline_open:before {content:"\f0da";}
    .ztree li span.button.noline_close {background:none}
    .ztree li span.button.noline_close:before{content: "\f0da";}
    /*.ztree li span.button.noline_open.level0 {background-position: 0 -18px;}*/
    .ztree li span.button.noline_open.level0:before {content: "\f0da";}
    .ztree li span.button.noline_close.level0 {background-position: -18px -18px;}
    .ztree li span.click_link{float: right;margin-right:12px;}
</style>
<SCRIPT type="text/javascript">
    var setting = {
        view: {
            showLine: false,
            showIcon: false,
            addDiyDom: addDiyDom,
            dblClickExpand: false,
            treeNodeKey : "cid",
            addHoverDom: addHoverDom,
            removeHoverDom: removeHoverDom,
        },
        data: {
            simpleData: {
                enable: true
            }
        },
        callback: {
            onClick: onClick
        }
    };
    var url='<?php echo U("Category/ajax_category");?>';
    var zNodes= new Array();
    $.ajax({
        type:'POST',
        url:url,
        dataType:'json',
        beforeSend: function(){
            var html=' <h3 class="loading" style="font-size:14px;"><i class="fa fa-spinner fa-spin"></i>  加载中...</h3>'
            $('#treeDemo').html(html);
        },
        success:function(data){
            $(document).ready(function(){
                $.fn.zTree.init($("#treeDemo"), setting, data);
                var cid="<?php echo I('cat_id');?>";
                var zTree_Menu = $.fn.zTree.getZTreeObj("treeDemo");
                var node = zTree_Menu.getNodeByParam("id",cid,null);
                zTree_Menu.selectNode(node,true);//指定选中ID的节点
                zTree_Menu.expandNode(node, true, false);//指定选中ID节点展开
            });
        },
        error: function () {}
    });


    function addDiyDom(treeId, treeNode) {
        var spaceWidth = 5;
        var switchObj = $("#" + treeNode.tId + "_switch"),
                icoObj = $("#" + treeNode.tId + "_ico");
        switchObj.remove();
        icoObj.before(switchObj);
        if (treeNode.level > 1) {
            var spaceStr = "<span style='display: inline-block;'></span>";
            switchObj.before(spaceStr);
        }
    }

    function onClick(e,treeId, treeNode) {
        var zTree = $.fn.zTree.getZTreeObj("treeDemo");
        zTree.expandNode(treeNode);
    }
    //链接
    function addHoverDom(treeId, treeNode) {

        var sObj = $("#" + treeNode.tId + "_span");
        if (treeNode.editNameFlag || $("#addBtn_"+treeNode.tId).length>0) return;
        if(treeNode.url!='') return;
        var addStr = "<span class='click_link fa  fa-link' id='addBtn_" + treeNode.tId
                + "' title='直接打开' onfocus='this.blur();'></span>";
        sObj.after(addStr);
        var btn = $("#addBtn_"+treeNode.tId);
        if (btn) btn.bind("click", function(){
            window.location.href=treeNode.link
            return false;
        });
    };

    function removeHoverDom(treeId, treeNode) {
        $("#addBtn_"+treeNode.tId).unbind().remove();
    };


</SCRIPT>

            </div>

        </div>
        <div class="clearfix"></div>
    </div>
    <div class="container-right">

        <div class="main posrel">
            
            <div class="main-content">
                
                <!-- 操作项 end -->

                
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" >
                <div class="panel-heading">关于LDCMS</div>
                <div class="panel-body">
                    <p>竹子网站管理系统(简称：LDCMS)是一套互联网+解决方案的企业网站管理系统。致力于搭建一个完善的企业级应用生态环境以适应不同行业用户的需求。</p>
                    <p>LDCMS是苏州竹子网络科技 ( <a href="http://www.zhuziweb.com/" target="_blank" style="color:#287dde">zhuziweb.com</a> ) 开发的一款基于php的企业网站管理系统，苏州竹子网络科技是一家一直致力于以“专注网站，用心服务”为中心价值，坚持创新、诚信、客户至上原则，提供客户最需要的服务。希望通过发挥我们的专业知识，重塑中小企业网络形象，为客户打造满意的产品以客户的利益最大化为目标，为各型企业提供网上网下全方位的网站建设服务。</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default" >
                <div class="panel-heading">系统信息</div>
                <table class="table">
                    <tr>
                        <td>服务器操作系统</td>
                        <td><?php echo (PHP_OS); ?></td>
                    </tr>
                    <tr>
                        <td>PHP版本</td>
                        <td><?php echo (PHP_VERSION); ?></td>
                    </tr>
                    <tr>
                        <td>运行环境</td>
                        <td>
                            <?php echo ($server_software[0]); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>MYSQL版本</td>
                        <td><?php echo ($system_info_mysql["0"]["v"]); ?></td>
                    </tr>
                    <tr>
                        <td>上传限制</td>
                        <td><?php echo ini_get('upload_max_filesize');?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default" >
                <div class="panel-heading">产品团队</div>
                <div class="panel-body">
                    Panel content
                </div>
            </div>
        </div>
    </div>




            </div>
            <!--main-content end-->
            <div class="copyright">
                <div class="pull-left">
                    感谢使用<?php echo C('SYSTEM_SITENAME');?>
                </div>
                <div class="pull-right">
                    版本：<?php echo C('LDCMS_VERSION');?>
                </div>
            </div>
        </div>

    </div>
    <!--container-right end-->
</div>


<script type="text/javascript">
    $(function () {
        $('#submit-form').lande('ajaxForm');
        $('#checkall').lande('clickall');
        $('.click_del').lande('del_one');
        $('#del_num').lande('del_num',{classname:'.check'});
        $(window).resize(function(){
            $(".main").css("min-height", $(window).height() - 55);
        }).resize();
    })

</script>


</body>
</html>