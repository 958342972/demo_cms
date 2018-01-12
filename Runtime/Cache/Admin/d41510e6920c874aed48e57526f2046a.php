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
                

                    <ul class="list">
                        <?php if(is_array($menu_level3)): foreach($menu_level3 as $key=>$level3): ?><li>
                                <a href="<?php echo (U($level3["name"])); ?>"><i class='ico fa fa-caret-right '></i><?php echo ($level3["title"]); ?></a>
                            </li><?php endforeach; endif; ?>
                    </ul>

                
            </div>

        </div>
        <div class="clearfix"></div>
    </div>
    <div class="container-right">

        <div class="main posrel">
            
	<div class="right-title">
		<span class='glyphicon glyphicon-home'></span><?php echo ($meta_title); ?>
	</div>

            <div class="main-content">
                
	<!-- 操作项 -->
	<div class="operate">
		<div class="pull-left">
			<a href="<?php echo U('add_config');?>" class="btn btn-warning">添加</a>
			<a href="<?php echo U('del_config');?>" class="btn btn-danger" id="del_num">删除</a>
			<div class="btn-group">
				<button type="button" class="btn btn-primary">选择分组</button>
				<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
					<span class="caret"></span>
					<span class="sr-only"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li><a href="<?php echo U('index');?>"><b>全部</b></a></li>
					<?php if(is_array($config_group)): $i = 0; $__LIST__ = $config_group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('index',array('group'=>$key));?>"><?php echo ($vo); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>

                <!-- 操作项 end -->

                
	<link rel="stylesheet" type="text/css" href="/test/./Site/Admin//View/Common/csssystem.css">
	<div class="table-responsive">
		<table class="table table-hover table-bordered table-striped" id='list'>
			<thead>
			<tr>
				<th width="2%"><input type="checkbox" id="checkall"></th>
				<th width="5%">编号</th>
				<th >字段名</th>
				<th width="15%">字段标题</th>
				<th width="8%">类型</th>
				<th width="6%">分组</th>
				<th>添加时间</th>
				<th width="7%">排序</th>
				<th width="4.5%">状态</th>
				<th width="15%">操作</th>
			</tr>
			</thead>
			<tbody>

			<?php if(is_array($configlist)): $k = 0; $__LIST__ = $configlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($k % 2 );++$k;?><tr class="rows" val="<?php echo ($list["path"]); ?>">
					<td><input type="checkbox" class="check" name="id[]" value="<?php echo ($list["id"]); ?>"></td>
					<td><span style="color: #999;"><?php echo ($list["id"]); ?></span></td>
					<td><?php echo ($list["name"]); ?></td>
					<td><?php echo ($list["title"]); ?> <?php echo (is_lang($list["is_lang"])); ?></td>
					<td><?php echo (get_field_type($list["type"])); ?></td>
					<td><?php echo (get_config_group($list["group"])); ?></td>
					<td><?php echo (date('Y-m-d',$list["ctime"])); ?></td>
					<td><input type="text" name="<?php echo ($list["id"]); ?>" old="<?php echo ($list["sort"]); ?>" value="<?php echo ($list["sort"]); ?>" class="mini-text sort"></td>
					<td>
						<?php if(($list["status"]) == "1"): ?>&nbsp;&nbsp;<i class='fa fa-check ok'></i>
							<?php else: ?>
							&nbsp;&nbsp;<i class='fa fa-ban ban'></i><?php endif; ?>
					</td>
					<td>
						<a href="<?php echo U('System/edit_config',array('id'=>$list['id']));?>" class="list_but btn-success">编辑</a>
						<?php if($list['status'] == 1): ?><a href="<?php echo U('ajax_config_status',array('id'=>$list['id'],'status'=>0));?>" class="list_but btn-gray ajax_status">禁用</a>
							<?php else: ?>
							<a href="<?php echo U('ajax_config_status',array('id'=>$list['id'],'status'=>1));?>" class="list_but btn-primary ajax_status">启用</a><?php endif; ?>
						<a href="<?php echo U('del_config',array('id'=>$list['id']));?>" class="list_but butbg3 click_del" >删除</a>
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>

			</tbody>
		</table>
	</div>
	<script type="text/javascript">
		$(function(){
			var order_url='<?php echo U("ajax_sort",array("group"=>I("group")));?>';
			$('.sort').lande('sort',{idclass:'.check',url:order_url});
			$('.ajax_status').lande('status');
		})
	</script>


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