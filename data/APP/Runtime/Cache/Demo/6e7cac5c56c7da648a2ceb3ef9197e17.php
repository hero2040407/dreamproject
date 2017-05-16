<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>微脱微秀播放页面</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="http://g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="http://g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">
    <link rel="stylesheet" href="__CSS__/wwplay.css">
</head>
<body>
<div class="page-group">
    <div class="page">
        <div class="dimblock"><img src="__IMG__/sharejt.png"></div>
        <div class="content">
            <div class="playblock">
                <p><?php echo ($list['name']); ?></p>
                <div class="v">
                    <video width="100%" height="100%" controls loop="loop" src="<?php echo ($list['video_addr']); ?>"></video>
                </div>
                <div class="row no-gutter">
                    <div class="col-60">
                        <div class="star">
                            <b>打分:</b>
                            <span class="graystar" value="1">1</span>
                            <span class="graystar" value="2">2</span>
                            <span class="graystar" value="3">3</span>
                            <span class="graystar" value="4">4</span>
                            <span class="graystar" value="5">5</span>
                        </div>
                    </div>
                    <div class="col-40">
                        总评分:<span><?php echo ($list['avg_score']); ?></span>/<?php echo ($list['score_people']); ?>人
                    </div>
                    <input type="hidden" id="v_id" value="<?php echo ($list['id']); ?>">
                </div>
                <div class="ins">
                    <h3><?php echo ($title); ?> <?php echo (date('Ymd',$list['begin_time'])); ?>期</h3>
                    <article><?php echo ($list['describe']); ?></article>
                    <div class="cnumber"><img src="__IMG__/pl.png"><span><?php echo ($list['comment_num']); ?></span></div>
                    <div class="pnumber"><img src="__IMG__/bfl.png"><span><?php echo ($list['play_num']); ?></span></div>
                    <div class="shareblock"><img src="__IMG__/share.png"></div>
                     <input type="hidden" id="v-id" value="<?php echo ($list['id']); ?>">
                </div>
            </div>
            <div class="buttons-tab">
                <a href="#tab1" class="tab-link button"><?php echo ($head); ?>往期</a>
                <a href="#tab2" class="tab-link button">相关花絮</a>
                <a href="#tab3" class="tab-link active button">评论</a>
            </div>
            <div class="content-block">
                <div class="tabs">
                    <div id="tab1" class="tab">
                        <div class="list-block media-list">
                            <ul>
                            <?php if(is_array($wt_info)): $i = 0; $__LIST__ = $wt_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                                    <div class="cover"></div>
                                    <a href="/Demo/Weituo/weituo_play/id/<?php echo ($v["id"]); ?>" class="item-link item-content">
                                        <div class="item-media">
                                            <img src="http://www.midao360.com<?php echo ($v["video_image"]); ?>" style='width: 7rem;height:4rem;'>
                                            <span style="position:absolute;right:3%;bottom:0;font-family: 'Microsoft YaHei';font-size:.5rem;color:#f3f8fa"></span>
                                        </div>
                                        <div class="item-inner">
                                            <div class="item-title-row">
                                                <div class="item-title"><?php echo ($head); echo (date('Ymd',$v['begin_time'])); ?>期</div>
                                            </div>
                                            <div class="item-subtitle"><?php echo ($v["describe"]); ?></div>
                                            <div class="playnumbers"><span><?php echo ($v["play_num"]); ?></span><img src="__IMG__/grayplay.png"></div>

                                        </div>
                                    </a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div id="tab2" class="tab">
                        <div class="list-block media-list">
                            <ul>
                            <?php if(is_array($hx_info)): $i = 0; $__LIST__ = $hx_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                                    <div class="cover"></div>
                                    <a href="/Demo/Weituo/weituo_play/id/<?php echo ($v["id"]); ?>" class="item-link item-content">
                                        <div class="item-media">
                                            <img src="http://www.midao360.com<?php echo ($v["video_image"]); ?>" style='width: 7rem;height:4rem;'>
                                            <span style="position:absolute;right:3%;bottom:0;font-family: 'Microsoft YaHei';font-size:.5rem;color:#f3f8fa"></span>
                                        </div>
                                        <div class="item-inner">
                                            <div class="item-title-row">
                                                <div class="item-title"><?php echo ($head); echo (date('Ymd',$v['begin_time'])); ?>期<?php echo ($v["name"]); ?>花絮</div>
                                            </div>
                                            <div class="item-subtitle"><?php echo ($v["describe"]); ?></div>
                                            <div class="playnumbers"><span><?php echo ($v["play_num"]); ?></span><img src="__IMG__/grayplay.png"></div>
                                        </div>
                                    </a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div id="tab3" class="tab active">
                        <div class="searchbar row">
                            <div class="search-input col-80">
                                <input type="text" id='comment' placeholder='我来说两句...'/>
                            </div>
                            <a class="button button-fill button-primary col-20" id="publish">发表</a>
                        </div>
                        <div class="commentarea">
                        <div style="width:0;height:0;" id="c"></div>
                        <?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="userblock">
                                <div class="row no-gutter">
                                    <div class="col-15"><img src="__IMG__/user.png"></div>
                                    <div class="col-85">
                                        <div class="usernt">
                                            <div class="username">游客</div>
                                            <span><?php echo (date('Ymd',$v['create_time'])); ?></span>
                                        </div>
                                        <div class="usercomment">
                                           <?php echo ($v["comment"]); ?>
                                        </div>
                                        <div class="commentfoot">
                                            <div class="dian dc" >
                                            <img src="__IMG__/c1.png">
                                            <span><?php echo ($v["step_num"]); ?></span>
                                            </div>
                                            <div class="dian dz"  style="border-right:.1rem solid #646464;">
                                            <img src="__IMG__/z1.png">
                                            <span><?php echo ($v["praise_num"]); ?></span>
                                            </div>
                                            <div class="c_id" style="display: none;"><?php echo ($v["id"]); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript' src='http://g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
<script type='text/javascript' src='http://g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>
<script type='text/javascript' src='http://g.alicdn.com/msui/sm/0.6.2/js/sm-extend.min.js' charset='utf-8'></script>
<script>
    $(function(){
    var x=$.device;
    if(x["ipad"]){
        $(".star span").css({"width":'10%',"marginTop":'2%'});
        $(" .star b").css({"font-size":'1rem'});
        $(".playblock .row .col-40").css({"font-size":'1rem'});
        $(".playblock .row .col-40 span").css({"font-size":'1.2rem'});
    }
    if(x["iphone"]){
        if(window.screen.width<=320){
            $(".star span").css("marginTop","6%");
        }
    }
});

$(function(){
    $(document).on('click', '.shareblock', function () {
        $(".dimblock").css("display","block");
        $(".dimblock").click(function(){
            $(this).css("display","none");
        })
    });
    $(document).on('click', '.media-list ul li', function () {
        $(".cover").css("display","none");
        $(this).find(".cover").css("display","block");
    });
});
$(function(){
    var v_id = $("#v_id").val();
    $.ajax({
        type:"POST",
        url:"<?php echo U('is_score');?>",
        data : {"v_id":v_id},
        success:function(data){
            if(data.status==1){
                var x=data.score;
                x=x/2;
                for(var i=0;i<x;i++){
                    $(".graystar").eq(i).addClass("bluestar");
                }
            }else{
                for(var j=0;j<5;j++){
                    $(".graystar").eq(j).removeClass("bluestar");
                }
            }
        }
    })
});
$(function() {
    $(document).on('click', '.graystar', function () {
        var a = $(this).attr('value');
        var v_id = $("#v_id").val();
        var cd = $('.graystar').length;
        for (var j = 0; j < cd; j++) {
            $(".graystar").eq(j).removeClass("bluestar");
            for (var i = 0; i < a; i++) {
                $(".graystar").eq(i).addClass("bluestar");
            }
        }
        $.ajax({
            type: "POST",
            url: "<?php echo U('score');?>",
            data: {"score": a, "v_id": v_id},
            success: function (data) {
                if(data.status==1){
                    $.alert("评分失败！请重新点评.");
                }else if(data.status==2){
                    $.alert("对，爆炸了~。~");
                }else if(data.status==3){
                    var y=data.score;
                    y=y/2;
                    for (var j = 0; j < 5; j++) {
                        $(".graystar").eq(j).removeClass("bluestar");
                        for (var i = 0; i < y; i++) {
                            $(".graystar").eq(i).addClass("bluestar");
                        }
                    }
                    $(".graystar").on("click",function(event){
                        return false;
                    });
                    $.alert("你已经评过分了.");
                }else{
                    $.alert(data);
                }
            }
        })
    });
});
$(function() {
    $(document).on('click', '#publish', function () {
        var text=$("#comment").val();
        var v_id = $("#v_id").val();
        var time=$("#time").val();
        $.ajax({
            type : "POST",
            url :　"<?php echo U('set_comment');?>",
            data : {"content":text,"v_id":v_id},
            success : function(data){
                if(data.status==1){
                   var id = data.id;
                    $.alert("评论成功！");
                    $("#comment").val("");
                    var mydate = new Date();
                    var m=mydate.getMonth()+1;
                    var d=mydate.getDate();
                    var userpic=" <div class='col-15'>"+"<img src='__IMG__/user.png'>"+"</div>";
                    var commentfoot="<div class='commentfoot'>"
                        +"<div class='dian dc'>"+"<img src='__IMG__/c1.png'>"+"<span>"+0+"</span>"+"</div>"
                        +"<div class='dian dz' style='border-right:.1rem solid #646464;'>"+"<img src='__IMG__/z1.png'>"+"<span>"+0+"</span>"+"</div>"
                        +"<div class='c_id' style='display: none;'>"+id+"</div>"
                        +"</div>";
                    var userinf="<div class='col-85'>"+ "<div class='usernt'>" +"<div class='username'>"+"游客"+"</div>" +"<span>"+m+"月"+d+"日"+"</span>" +"</div>" +"<div class='usercomment'>"+text +"</div>"+commentfoot+"</div>";

                    var userblock="<div class='userblock'>"+ "<div class='row no-gutter'>"+userpic+userinf+"</div>"+"</div>";
                    $('#c').after(userblock);

                }else if(data.status==2){
                    $.alert("评论失败请从新提交");
                }
                else if(data.status==3){
                    $.alert("你已经评论过了");
                    $("#search").val("");
                }
                else if(data.status==4)
                    $.alert("评论值不能为空");
            }
        });
    });
});
$(function(){
    $(document).on("click",".dz",function()
    {

        var a=$(this).parent().find(".c_id").text();
        $(this).find("img").attr("src","__IMG__/z2.png");
        var x=parseInt($(this).find("span").text());
        x=x+1;
        $(this).find("span").text("");
        $(this).find("span").text("+"+x);
         $.ajax({
            type : "POST",
            url :　"<?php echo U('praise');?>",
            data : {"c_id":a},
            success : function(data){
            }
        });
        $(this).on("click",function(event){
            return false;
        });
        $(this).parent().find(".dc").on("click",function(event){
            return false;
        });
       
    });
    $(document).on("click",".dc",function(){
        var b=$(this).parent().find(".c_id").text();
        $(this).find("img").attr("src","__IMG__/c2.png");
        var x=parseInt($(this).find("span").text());
        x=x-1;
        $(this).find("span").text("");
        $(this).find("span").text(x);
        $(this).on("click",function(event){
            return false;
        });
        $(this).parent().find(".dz").on("click",function(event){
            return false;
        });
        $.ajax({
            type : "POST",
            url :　"<?php echo U('step');?>",
            data : {"c_id":b},
            success : function(data){

            }
        });
    });
});
$.init();
</script>
</html>