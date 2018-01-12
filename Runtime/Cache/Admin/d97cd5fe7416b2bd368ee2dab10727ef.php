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
	<span class='glyphicon glyphicon-home'></span><a href="<?php echo U('System/index');?>">配置管理</a> / <?php echo ($mtitle); ?>
</div>

            <div class="main-content">
                
                <!-- 操作项 end -->

                
<div class="right_edit">
	<form action="" enctype="multipart/form-data" method="post" id="submit-form">
		<div class="form_list">
			<dl>
				<dt>名称</dt>
				<dd><input type="text" name="name" value="<?php echo ($edit["name"]); ?>" class="int_text int" style="text-transform:uppercase;"> <span class='color-red'>&nbsp;*</span></dd>
			</dl>
			<dl>
				<dt>标题</dt>
				<dd><input type="text" name="title" value="<?php echo ($edit["title"]); ?>" class="int_text int"> <span class='color-red'>&nbsp;*</span></dd>
			</dl>
			<dl>
				<dt>表单类型</dt>
				<dd>
					<select name="type" class="form-control select" id="item_type">
						<option value="0">请选择</option>
						<?php if(is_array($form_type)): $i = 0; $__LIST__ = $form_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" data-field="<?php echo ($vo[1]); ?>" ><?php echo ($vo[0]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
					<script type="text/javascript">
						$(function(){
							var form_type='<?php echo ($edit["type"]); ?>';
							$('#item_type option').lande('selected',{value:form_type});
							var group='<?php echo ($edit["group"]); ?>';
							$('#group option').lande('selected',{value:group});
						})
					</script>
				</dd>
			</dl>
			<dl>
				<dt>配置分组</dt>
				<dd>
					<select name="group" class="form-control select" id="group">
						<option value="0">请选择</option>
						<?php if(is_array($config_group)): $i = 0; $__LIST__ = $config_group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" ><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>

				</dd>
			</dl>
			<dl>
				<dt>表单说明</dt>
				<dd><input type="text" name="remark" class="int_text int" value="<?php echo ($edit["remark"]); ?>"></dd>
			</dl>
			<dl>
				<dt>额外选项（额外选项radio/select等需要配置此项,每行一个参数值）</dt>
				<dd><textarea name="options"  class="textarea"><?php echo ($edit["options"]); ?></textarea></dd>
			</dl>
			<dl>
				<dt>状态</dt>
				<dd>
					<input type="radio" id="ok" name='status' checked="checked" value="1"> <label for='ok' class="label">开启</label> &nbsp; 
					<input type="radio" id="no" value="0" name='status'> <label for='no' class="label">关闭</label> 
				</dd>
			</dl>
			<dl>
				<dt>排序</dt>
				<dd>
					<input type="text"  name='sort' value="<?php echo ($edit["sort"]); ?>" class="int" style="width:65px">
				</dd>
			</dl>
			<dl>
				<dt>多语言</dt>
				<dd id="is_lang">
					<label class="label"><input type="radio" name='is_lang'  value="1"> 是</label> &nbsp;
					<label class="label"><input type="radio" value="0" checked="checked" name='is_lang'> 否</label>
					<script type="text/javascript">
						$(function () {
							var is_lang='<?php echo ($edit["is_lang"]); ?>';
							$('#is_lang').lande('radio',{value:is_lang,defaults:1})
						})
					</script>
				</dd>
			</dl>
		</div>

		<div class="form_action">
			<input type="hidden" name="id" value="<?php echo ($edit["id"]); ?>">
			<input type="submit" class="sub pull-left btn"  value="提交">
			<a href="<?php echo U('index');?>" class="ret pull-left btn">返回</a>
		</div>
	</form>
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