/**
 * Created by Administrator on 2016/10/25.
 */
//  selected    [value:值]              下拉选中
//  radio       [value:值]              单选
//  clickall    [class:样式名]           全选
//  del_one                             删除一条
//  del_num     [class:样式名]           删除多条条
//  ajaxForm                            ajax提交
//  confirm     [title:标题,time:时间]   弹窗
//  action                              执行后弹窗
;(function($, window, document,undefined) {
    layer.config({
       time: 2500
    });
    ////公共模块
    var public={
        isJson :function(obj){
            var isjson = typeof(obj) == "object" && Object.prototype.toString.call(obj).toLowerCase() == "[object object]" && !obj.length;
            return isjson;
        },
        //勾选列表项
        clecked:function(options){
            var defaults={
                classname:'',
                title:'请勾选要处理的数据'
            }
            var setting = $.extend({}, defaults, options)
            var len=$(setting.classname+":checked").length;
            if(len<1){
                layer.alert(setting.title,{icon: 2,btn:false,area: ['300px', '110px']});
            }else{
                var del='',dian;
                $(setting.classname+":checked").each(function(i){
                    i<(len-1)?dian=',':dian='';
                    del=del+$(this).val()+dian;
                })
                return del;
            }
            return false;
        },
        //询问弹窗
        confirm:function(options){
            var defaults={
                time:2500,
                classname:'',
                title:'确定要删除吗？',
                data:'',
                url:'',
            }
            var setting = $.extend({}, defaults, options)
            //判断ID
            if(setting.data){
                var id={};
               id.id= setting.data;
            }
            layer.confirm(
                setting.title,
                {icon: 3, title:'提示',time:setting.time,area: ['300px']},
                function(index){
                    if(setting.url!=''){
                        $.get(setting.url,id,function(data){
                            if(data.info){
                                var icon=1;
                                var title='成功信息';
                                if(!data.status){icon=2;title='错误信息';}
                                layer.confirm(data.info, {icon: icon,title :title,btn:false,
                                    end: function(index){
                                        if(data.url!=''){
                                            location.href=data.url
                                        }else{
                                            location.href=location;
                                        }
                                    }
                                });
                            }
                        });
                    }
                    layer.close(index);
                });
        },
        action:function(options){
            var defaults={
                data:'',
                url:'',
            }
            var setting = $.extend({}, defaults, options)
            //判断ID
            if(setting.data){
                var data={};
                data= setting.data;
            }
            if(setting.url!=''){
                $.get(setting.url,data,function(data){
                    if(data.info){
                        var icon=1;
                        var title='成功信息';
                        var btn=false;
                        if(!data.status){icon=2;title='错误信息';}
                        layer.confirm(data.info, {icon: icon,btn:btn,title :title,
                            end: function(index){
                                if(data.url!=''){
                                    location.href=data.url
                                }else{
                                    location.href=location;
                                }
                            }
                        });
                    }
                });
            }else{
                return false;
            }
        }
    };

    var methods  = {
        //选择select 的option项
        selected: function(options) {
            var setting = $.extend({}, this.defaults, options)
            this.each(function(){
                if($(this).val()==setting.value){
                    $(this).attr('selected',true);
                }
            });
            return this;
        },
        //radio
        radio:function(options){
            var defaults={
                defaults:0,
                value:''
            }
            var setting = $.extend({},defaults, options)
            if(setting.value==''){
                this.find('input').eq(setting.defaults).attr('checked',true);
            }else{
                this.find('input[type="radio"]').each(function(){
                    if($(this).val()==setting.value){
                        $(this).attr('checked',true)
                    }
                });
            }
            return this
        },
        //radio
        checkbox:function(options){
            var defaults={}
            var setting = $.extend({},defaults, options)
            var value='';
            if(setting.value!=''){ value=eval('('+setting.value+')');}
            this.find('input[type="checkbox"]').each(function(){
                var $this=$(this);
                var thisval=$(this).val();
                if($.isArray(value)){
                    $.each(value,function (i,v) {
                        if(v==thisval){
                            $this.attr('checked',true)
                        }
                    });
                }else{
                    if((thisval&value)==thisval){
                        $this.attr('checked',true)
                    }
                }
            });
            return this
        },
        //全选的功能
        clickall:function(options){
            var defaults={
                classname:'.check'
            }
            var setting = $.extend({},defaults, options)
            this.click(function(){
                $(setting.classname).prop("checked", this.checked);
            });
            return this;
        },
        //列表ajax删除一条
        del_one: function (options) {
            var defaults={
                title:''
            }
            var setting = $.extend({},defaults, options)
            this.on('click',function(){
                var del_url=$(this).attr('href');
                var data=[];
                    data.url=del_url
                if(setting.title!='')
                    data.title=setting.title;
                public.confirm(data)
                return false;
            });
        },
        //删除多条
        del_num: function (options) {
            var defaults={
                classname:'.check'
            }
            var setting = $.extend({},defaults, options)
            this.on('click',function(){
                var del=public.clecked({classname:setting.classname});
                if(del){
                    var delurl=$(this).attr('href');
                    var data=[];
                    data.url=delurl;
                    data.data=del;
                    public.confirm(data);
                }
                return false;
            });
        },
        //ajax表单提交
        ajaxForm:function(){
            this.ajaxForm(function(data){
                if(data.info){
                    var icon=1;
                    var title='成功信息';
                    if(!data.status){icon=2;title='错误信息';}
                    var btn=false;
                    var area=['300px', '110px'];
                    if(data.again){
                        btn=['继续添加','返回'];
                        area=['300px','150px'];
                    }
                    layer.confirm(data.info, {icon: icon,title :title,closeBtn:1,area:area ,time:false,btn:btn,
                        yes:function(index, layero){
                            if(data.again!=''){
                                location.href=data.again
                            }
                        },

                        end: function(index){
                            if(data.url!=''){
                                location.href=data.url
                            }
                        }
                    });
                }
            });
        },
        //直接执行
        action:function(){
            this.on('click',function(E){
                E.preventDefault();
                var action_url=$(this).attr('href');
                public.action({url:action_url});
            });
        },
        //确认窗
        move: function (options) {
            var defaults={
                title:'确认操作',
                classname:'.check'
            }
            var setting = $.extend({},defaults, options)
            this.on('click',function(){
                var ids=public.clecked({classname:setting.classname});
                if(ids){
                    var acturl=$(this).attr('href');
                    layer.open({
                        time:false,
                        title:'移动内容',
                        type: 2,
                        area: ['500px', '500px'],
                        fixed: false, //不固定
                        maxmin: true,
                        content:acturl+'?moveid='+ids,
                        end: function(index){
                            location.href=location
                        }
                    });
                }
                return false;
            });
        },
        //排序
        sort:function(options){
            var defaults={
                idclass:'',
                url:'',
            }
            var setting = $.extend({},defaults, options)
            this.on('focusout',function(){
                var val=$(this).val()
                var id=$(this).attr('name');
                var old=$(this).attr('old');
                if(id&&val!=old){
                    var data=[];
                    data.url=setting.url;
                    data.data={id:id,value:val};
                    public.action(data);
                }
                return false;
            });
        },
        //更改状态
        status:function(options){
            this.on('click',function(){
                var url=$(this).attr('href');
                    var data=[];
                    data.url=url;
                    public.action(data);
                return false;
            });
        },
    };

    $.fn.lande = function(method) {
        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error('Method ' + method + ' does not exist on jQuery.lande');
        }
    }
})(jQuery, window, document);