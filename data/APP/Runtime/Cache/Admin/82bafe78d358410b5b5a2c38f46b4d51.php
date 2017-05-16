<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <title>演示：jQuery+PHP星级评分</title>
        <meta name="keywords" content="星级评分,jQuery评分" />
        <meta name="description" content="我们经常看到各大商城购买商品后，会有个评分功能。本文将讲解如何使用jQuery和PHP来实现星级评分效果。" />
        <link rel="stylesheet" type="text/css" href="http://www.sucaihuo.com/jquery/css/common.css" />
        <style type="text/css">
            .rate{width:600px; margin:100px auto; color:#51555c; font-size:14px; position:relative; padding:10px 0;}
            .rate p {margin:0; padding:0; display:inline; height:40px; overflow:hidden; position:absolute; top:0; left:100px; margin-left:140px;}
            .rate p span.s {font-size:36px; line-height:36px; float:left; font-weight:bold; color:#DD5400;}
            .rate p span.g {font-size:22px; display:block; float:left; color:#DD5400;}
            .big_rate {width:140px; height:28px; text-align:left; position:absolute; top:3px; left:85px; display:inline-block; background:url(/thinkphp3.2.3/APP/Admin/View/public/images/star.gif) left bottom repeat-x;}
            .big_rate span {display:inline-block; width:24px; height:28px; position:relative; z-index:1000; cursor:pointer; overflow:hidden;}
            .big_rate_up {width:140px; height:28px; position:absolute; top:0; left:0; background:url(/thinkphp3.2.3/APP/Admin/View/public/images/star.gif) left top;}
            #my_rate{ position:absolute; margin-top:40px; margin-left:100px}
            #my_rate span{color:#dd5400; font-weight:bold}
        </style>
    </head>
    <body>
        <div class="head">
            <div class="head_inner clearfix">
                <ul id="nav">
                    <li><a href="http://www.sucaihuo.com">首 页</a></li>
                    <li><a href="http://www.sucaihuo.com/templates">网站模板</a></li>
                    <li><a href="http://www.sucaihuo.com/js">网页特效</a></li>
                </ul>
                <a class="logo" href="http://www.sucaihuo.com"><img src="http://www.sucaihuo.com/Public/images/logo.jpg" alt="素材火logo" /></a>
            </div>
        </div>
        <div class="container">
            <div class="demo">
                <h2 class="title"><a href="http://www.sucaihuo.com/js/92.html">演示：jQuery+PHP星级评分</a></h2>
                <div class="rate">
                    <div class="big_rate">
                        <span rate="2">&nbsp;</span>
                        <span rate="4">&nbsp;</span>
                        <span rate="6">&nbsp;</span>
                        <span rate="8">&nbsp;</span>
                        <span rate="10">&nbsp;</span>
                        <div style="width:45px;" class="big_rate_up"></div>
                    </div>
                    <p><span id="s" class="s"></span><span id="g" class="g"></span></p>
                    <div id="my_rate"></div>
                </div>
            </div>
        </div>
        <div class="foot">
            Powered by sucaihuo.com  本站皆为作者原创，转载请注明原文链接：<a href="http://www.sucaihuo.com" target="_blank">www.sucaihuo.com</a>
        </div>
        <script type="text/javascript" src="/thinkphp3.2.3/APP/Admin/View/public/js/jquery-1.10.2.js"></script> 
        <script type="text/javascript">
            $(function() {
                get_rate(<?php echo ($aver); ?>);
            });
            function get_rate(rate) {
                rate = rate.toString();
                var s;
                var g;
                $("#g").show();
                if (rate.length >= 3) {
                    s = 10;
                    g = 0;
                    $("#g").hide();
                } else if (rate == "0") {
                    s = 0;
                    g = 0;
                } else {
                    s = rate.substr(0, 1);
                    g = rate.substr(1, 1);
                }
                $("#s").text(s);
                $("#g").text("." + g);
                $(".big_rate_up").animate({width: (parseInt(s) + parseInt(g) / 10) * 14, height: 26}, 1000);
                $(".big_rate span").each(function() {
                    $(this).mouseover(function() {
                        $(".big_rate_up").width($(this).attr("rate") * 14);
                        $("#s").text($(this).attr("rate"));
                        $("#g").text("");
                    }).click(function() {
                        var score = $(this).attr("rate");
                        $("#my_rate").html("您的评分：<span>" + score + "</span>");
                        $.ajax({
                            type: "POST",
                            url: "<?php echo U('demo/ajax');?>",
                            data: "score=" + score,
                            success: function(msg) {
                                //alert(msg);
                                if (msg == 1) {
                                    $("#my_rate").html("<span>您已经评过分了！</span>");
                                } else if (msg == 2) {
                                    $("#my_rate").html("<span>您评过分了！</span>");
                                } else {
                                    get_rate(msg);
                                }
                            }
                        });
                    })
                })
                $(".big_rate").mouseout(function() {
                    $("#s").text(s);
                    $("#g").text("." + g);
                    $(".big_rate_up").width((parseInt(s) + parseInt(g) / 10) * 14);
                })
            }
        </script>
    </body>
</html>