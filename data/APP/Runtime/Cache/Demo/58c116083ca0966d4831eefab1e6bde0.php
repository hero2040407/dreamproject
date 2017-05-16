<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>微脱微秀首页</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="http://g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="http://g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">
    <link rel="stylesheet" href="__CSS__/wwi.css">
</head>
<body>
<div class="page-group">
    <div class="page" id="page-fixed-tab-infinite-scroll">
        <div class="content">
            <!-- 轮播开始 -->
            <div class="swiper-container" data-space-between='10'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="__IMG__/pic1.png" alt="">
                        <a href="" class="theme">
                            <div class="themeleft">
                                <h4>多来米微脱</h4>
                                <span>20160405期</span>
                                <span>谈谈微电影之路</span>
                            </div>
                            <div class="themeright">
                                <img src="__IMG__/playbutton.png">
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <img src="__IMG__/pic2.png" alt="">
                        <a href="" class="theme">
                            <div class="themeleft">
                                <h4>多来米微秀</h4>
                                <span>20160405期</span>
                                <span>谈谈微电影之路</span>
                            </div>
                            <div class="themeright">
                                <img src="__IMG__/playbutton.png">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <!--轮播结束-->
            <!--节目介绍-->
            <div class="in">
                <div class="inhead">
                    <h3>节目介绍</h3>
                    <a href="/thinkphp3.2.3/Demo/Salonroute/index">观影沙龙>></a>
                </div>
                <div class="inbody">
                    <div class="row no-gutter">
                        <div class="col-40">
                            <img src="__IMG__/wtwx.png">
                        </div>
                        <div class="col-60">
                            <div class="tname">多来米微脱微秀</div>
                            <div class="t"><span>年份：</span>2016</div>
                            <div class="t"><span>主办公司：</span>浙江米道金融信息服务有限公司</div>
                            <div class="t"><span>简介：</span>这是一档关于有颜有值、卖萌卖腐的关于大学生微电影创作的脱口秀和真人秀节目</div>
                            <div class="t"><span>最新一期：</span><?php echo (date('Ymd',$time['begin_time'])); ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--节目介绍结束-->
            <div class="buttons-tab fixed-tab"  data-offset="44">
                <a href="#tab1" class="tab-link active button">微脱往期</a>
                <a href="#tab2" class="tab-link button">微秀往期</a>
                <a href="#tab3" class="tab-link button">精彩花絮</a>
            </div>
            <div class="content-block">
                <div class="tabs">
                    <div id="tab1" class="tab active infinite-scroll">
                        <div class="list-block media-list">
                            <ul class="list-container">
                            <?php if(is_array($wt_list)): $i = 0; $__LIST__ = $wt_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                                    <a href="<?php echo U('weituo_play?id='.$v['id'].'','',false);?>" class="item-link item-content">
                                        <div class="item-media">
                                            <img src="http://www.midao360.com<?php echo ($v["video_image"]); ?>" style='width: 8rem;height:4.4rem;'>
                                        </div>
                                        <div class="item-inner">
                                            <div class="item-title-row">
                                                <div class="item-title">多来米微脱</div>
                                            </div>
                                            <div class="item-subtitle"><?php echo (date('Ymd',$v['begin_time'])); ?>期</div>
                                            <div class="item-subtitle"><?php echo ($v["describe"]); ?></div>
                                        </div>
                                    </a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <div class="infinite-scroll-preloader">
                            <div class="preloader">
                            </div>
                        </div>
                        <div class="midaofoot">Copyright © 2016 浙江米道金融信息服务有限公司 </div>
                    </div>
                    <div id="tab2" class="tab infinite-scroll">
                        <div class="list-block media-list">
                            <ul class="list-container">
                            <?php if(is_array($wx_list)): $i = 0; $__LIST__ = $wx_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                                    <a href="<?php echo U('weituo_play?id='.$v['id'].'','',false);?>" class="item-link item-content">
                                        <div class="item-media">
                                            <img src="http://www.midao360.com<?php echo ($v["video_image"]); ?>" style='width: 8rem;height:4.4rem;'>
                                        </div>
                                        <div class="item-inner">
                                            <div class="item-title-row">
                                                <div class="item-title">多来米微秀</div>
                                            </div>
                                            <div class="item-subtitle"><?php echo (date('Ymd',$v['begin_time'])); ?>期</div>
                                            <div class="item-subtitle"><?php echo ($v['describe']); ?></div>
                                        </div>
                                    </a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <div class="infinite-scroll-preloader">
                            <div class="preloader">
                            </div>
                        </div>
                        <div class="midaofoot">Copyright © 2016 浙江米道金融信息服务有限公司 </div>
                    </div>
                    <div id="tab3" class="tab infinite-scroll">
                        <div class="list-block media-list">
                            <ul class="list-container">
                            <?php if(is_array($hx_list)): $i = 0; $__LIST__ = $hx_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                                    <a href="<?php echo U('hxplay?id='.$v['id'].'','',false);?>" class="item-link item-content">
                                        <div class="item-media">
                                            <img src="http://www.midao360.com<?php echo ($v["video_image"]); ?>" style='width: 8rem;height:4.4rem;'>
                                        </div>
                                        <div class="item-inner">
                                            <div class="item-title-row">
                                                <div class="item-title hx"><?php echo ($v["name"]); ?></div>
                                            </div>
                                            <div class="item-subtitle"><?php echo ($v["describe"]); ?></div>
                                        </div>
                                    </a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <div class="infinite-scroll-preloader">
                            <div class="preloader">
                            </div>
                        </div>
                        <div class="midaofoot">Copyright © 2016 浙江米道金融信息服务有限公司 </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script type='text/javascript' src='http://g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
<script>
    $.config = {router: false}
</script>

</script>

<script type='text/javascript' src='http://g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>
<script type='text/javascript' src='http://g.alicdn.com/msui/sm/0.6.2/js/sm-extend.min.js' charset='utf-8'></script>
<script>$.init()</script>
<script>
    $(function(){
        var x=$.device;
        if(x["ipad"]){
            $(".themeleft h4").css("fontSize","1.2rem");
            $(".themeleft span").css("fontSize","1rem");
        }
        if(x["iphone"]){
            if(window.screen.width==320){
                $(".tname").css({"fontSize":".75rem","marginTop":'.2rem'});
                $(".t span").css("fontSize",".4rem");
                $(".t").css({"fontSize":".3rem","margin":'0'});
                $(".inbody .row.no-gutter .col-40").css({"paddingLeft":'.2rem',"paddingRight":'.2rem',"paddingBottom":'.2rem'});
                $(".content-block  .tabs .list-block .hx").css("marginTop","20%")
            }
        }
    });
</script>
<script>
    //多个标签页下的无限滚动
    $(document).on("pageInit", "#page-fixed-tab-infinite-scroll", function(e, id, page) {
        var loading = false;
        // 每次加载添加多少条目
        var itemsPerLoad = 2;
        // 最多可加载的条目
        var wtmaxItems = 50;
        var wxmaxItems = 20;
        var hxmaxItems = 30;
        var lastIndex = $('.list-container li')[0].length;
        $(page).on('infinite', function() {
            // 如果正在加载，则退出
            if (loading) return;
            // 设置flag
            loading = true;
            var tabIndex = 0;
            if($(this).find('.infinite-scroll.active').attr('id') == "tab1"){
                tabIndex = 0;
            }
            if($(this).find('.infinite-scroll.active').attr('id') == "tab2"){
                tabIndex = 1;
            }
            if($(this).find('.infinite-scroll.active').attr('id') == "tab3"){
                tabIndex = 2;
            }
            lastIndex = $('.list-container').eq(tabIndex).find('li').length;
            // 模拟1s的加载过程
            setTimeout(function() {
                // 重置加载flag
                loading = false;
                if(tabIndex==0){
                    if (lastIndex >= wtmaxItems) {
                        // 加载完毕，则注销无限加载事件，以防不必要的加载
                        //$.detachInfiniteScroll($('.infinite-scroll').eq(tabIndex));
                        // 删除加载提示符
                        $('.infinite-scroll-preloader').eq(tabIndex).hide();
                        return;
                    }
                    var pagenumber1=Math.ceil(lastIndex/itemsPerLoad)+1;
                    $.ajax({
                        type : "POST",
                        url :"<?php echo U('wt_ajax_page');?>",
                        data : {'page':pagenumber1,'pagesize':itemsPerLoad},
                        success : function(data){
                            var html = '';
                            for(var i=0;i<data.length;i++){
                                var a=data[i].name;
                                var b=data[i].begin_time;
                                var c='http://www.midao360.com'+data[i].video_image;
                                var d=data[i].describe;
                                var e = '/thinkphp3.2.3/Demo/Weituo/weituo_play/id/'+data[i].id;
                                
                                    html += "<li>"
                                            +"<a href='"+e+"' class='item-link item-content'>"
                                            +"<div class='item-media'>"
                                            +"<img src='"+c+"' style='width: 8rem;height:4.4rem;'>"
                                            +"</div>"
                                            +"<div class='item-inner'>"
                                            +"<div class='item-title-row'>"
                                            +"<div class='item-title'>"+a+"</div>"
                                            +"</div>"
                                            +"<div class='item-subtitle'>"+b+"期</div>"
                                            +"<div class='item-subtitle'>"+d+"</div>"
                                            +"</div>"
                                            +"</a>"
                                            +"</li>";
                            }
                            $('.infinite-scroll.active .list-container').append(html);
                            
                        }


                    });
                }
                if(tabIndex==1){
                    if (lastIndex >= wxmaxItems) {
                        // 加载完毕，则注销无限加载事件，以防不必要的加载
                        //$.detachInfiniteScroll($('.infinite-scroll').eq(tabIndex));
                        // 删除加载提示符
                        $('.infinite-scroll-preloader').eq(tabIndex).hide();
                        return;
                    }
                    var pagenumber2=Math.ceil(lastIndex/itemsPerLoad)+1;
                    console.log(pagenumber2);
                    $.ajax({
                        type : "POST",
                        url :"<?php echo U('wx_ajax_page');?>",
                        data : {'page':pagenumber2,'pagesize':itemsPerLoad},
                        success : function(data){
                            var html = '';
                            for(var i=0;i<data.length;i++){
                                var a=data[i].name;
                                var b=data[i].begin_time;
                                var c='http://www.midao360.com'+data[i].video_image;
                                var d=data[i].describe;
                                var e = '/thinkphp3.2.3/Demo/Weituo/weituo_play/id/'+data[i].id;
                                
                                    html += "<li>"
                                            +"<a href='"+e+"' class='item-link item-content'>"
                                            +"<div class='item-media'>"
                                            +"<img src='"+c+"' style='width: 8rem;height:4.4rem;'>"
                                            +"</div>"
                                            +"<div class='item-inner'>"
                                            +"<div class='item-title-row'>"
                                            +"<div class='item-title'>"+a+"</div>"
                                            +"</div>"
                                            +"<div class='item-subtitle'>"+b+"期</div>"
                                            +"<div class='item-subtitle'>"+d+"</div>"
                                            +"</div>"
                                            +"</a>"
                                            +"</li>";
                            }
                            $('.infinite-scroll.active .list-container').append(html);
                            
                        }


                    });
                }
                if(tabIndex==2){
                    if (lastIndex >= hxmaxItems) {
                        // 加载完毕，则注销无限加载事件，以防不必要的加载
                        //$.detachInfiniteScroll($('.infinite-scroll').eq(tabIndex));
                        // 删除加载提示符
                        $('.infinite-scroll-preloader').eq(tabIndex).hide();
                        return;
                    }
                    var pagenumber3=Math.ceil(lastIndex/itemsPerLoad)+1;
                    console.log(pagenumber3);
                    $.ajax({
                        type : "POST",
                        url :"<?php echo U('hx_ajax_page');?>",
                        data : {'page':pagenumber3,'pagesize':itemsPerLoad},
                        success : function(data){
                            var html = '';
                            for(var i=0;i<data.length;i++){
                                var a=data[i].name;
                                var b=data[i].begin_time;
                                var c='http://www.midao360.com'+data[i].video_image;
                                var d=data[i].describe;
                                var e = '/thinkphp3.2.3/Demo/Weituo/hxplay/id/'+data[i].id;
                                
                                    html += "<li>"
                                            +"<a href='"+e+"' class='item-link item-content'>"
                                            +"<div class='item-media'>"
                                            +"<img src='"+c+"' style='width: 8rem;height:4.4rem;'>"
                                            +"</div>"
                                            +"<div class='item-inner'>"
                                            +"<div class='item-title-row'>"
                                            +"<div class='item-title'>"+a+"</div>"
                                            +"</div>"
                                            +"<div class='item-subtitle'>"+b+"期</div>"
                                            +"<div class='item-subtitle'>"+d+"</div>"
                                            +"</div>"
                                            +"</a>"
                                            +"</li>";
                            }
                            $('.infinite-scroll.active .list-container').append(html);
                            
                        }


                    });
                }
                // 更新最后加载的序号
                lastIndex =  $('.list-container').eq(tabIndex).find('li').length;
                $.refreshScroller();
            }, 750);
        });
    });
    $.init();
</script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?00c697f405cb8315183504fff81c02e4";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm, s);
})();
</script>
</html>