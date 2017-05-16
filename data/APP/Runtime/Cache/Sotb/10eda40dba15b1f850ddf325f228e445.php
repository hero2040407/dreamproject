<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Choose初始</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">
    <link rel="stylesheet" type="text/css" href="/data/APP/Sotb/View/public/css/style.css">
    <script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
    
    <style type="text/css">
      h4 {color:#3B3B3B;}
      input::-webkit-input-placeholder {
      color: #999;
      -webkit-transition: color.5s;
      }
      input:focus::-webkit-input-placeholder, input:hover::-webkit-input-placeholder {
      color: #c2c2c2;
      -webkit-transition: color.5s;
      } 
      .infinite-scroll-preloader {
        margin-top:-20px;
      }
    </style>
  </head>
  <body>
    
        <!-- <div class="page page-current"> -->
    <!-- 你的html代码 -->

<div class="page-group">
  <div class="page" id='create'>
  <nav class="bar bar-tab">
	<a class="tab-item " href="/data/Index/index">
      <span class="icon icon-home"></span>
      <span class="tab-label">首页</span>
    </a>
    <a class="tab-item active" href="#">
      <span class="icon icon-star"></span>
      <span class="tab-label">创想</span>
    </a>
	<a class="tab-item" href="/data/Index/mine">
      <span class="icon icon-me"></span>
      <span class="tab-label">我</span>
    </a>
</nav>
      <header class="bar bar-nav">
      <a class="button button-link button-nav pull-left back" >
      <span class="icon icon-left"></span>
      返回
    </a>
    <h1 class="title">我的数据提问</h1>
    </header>    
  <div class="content">
  	    <div class="content-block">
     	  <div class="row">
            <div class="col-50"><h4><a href="#" id="public" class="button button-type button-danger">公开问题</a></h4></div>
          	<div class="col-50"><h4><a href="#" id="personal" class="button button-type button-dark">私人问题</a></h4></div>
        </div>
      </div>
    </div>


  </div>
</div>    
   <script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm-extend.min.js' charset='utf-8'></script> 
    <script src="/data/APP/Sotb/View/public/js/roll.js"></script>
    <script src="/data/APP/Sotb/View/public/js/config.js"></script>
<script>
	$(function(){
	$('input:not([autocomplete]),textarea:not([autocomplete]),select:not([autocomplete])').attr('autocomplete','off');
}); 
</script>

  </body>
</html>