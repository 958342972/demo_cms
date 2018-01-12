$(function(){
	var ltoggle=$('#left_nav_toggle');
	ltoggle.hover(function(){
		$(this).stop(true,true);
		$(this).animate({'right':0},100);
	},function(){
		$(this).stop(true,true);
		$(this).animate({'right':'-3px'},400);
	});

	ltoggle.bind('click',function(){
		if($('.left_con_list').is(':hidden')){
			$('.container-right').animate({'marginLeft':'240px'},100,function(){
				$(this).removeClass('right_full')
			});

			$('.left_con_list').show().animate({'width':'160px'},100,function(){
				$(this).removeClass('left_con_list_hide');
			});
			$(this).find('span').removeClass('fa-angle-double-right').addClass('fa-angle-double-left');
		}else{
			$('.left_con_list').animate({'width':0},50,function(){
				$(this).hide().addClass('left_con_list_hide');
			})
			$('.container-right').animate({'marginLeft':'80px'},50,function(){
				$(this).addClass('right_full')
			});
			$(this).find('span').removeClass('fa-angle-double-left').addClass('fa-angle-double-right');	
		}
		
	});

	// 搜索子菜单
	var drop_down=$('div#drop_down');
	var dowm=$('ul#dowm');
	var drop_value=drop_down.find('#drop_value');
	var drop_value_val=drop_value.attr('value');
	
	drop_down.hover(function(){
		dowm.removeClass('hidden');
	},function(){
		dowm.addClass('hidden');
	});

	// 搜索高级
	var senior=$('#senior');
	var senior_down=$('#senior_down');
	senior.bind('click',function(){
		senior_down.stop(true,true).slideToggle(100);
	})

	$(document).click(function(e){ 
	e = window.event || e; // 兼容IE7
	obj = $(e.srcElement || e.target);
	    if (!$(obj).is("#senior,#senior i,#senior_down")) { 
	    	senior_down.slideUp(100);
	   	}
	});

});