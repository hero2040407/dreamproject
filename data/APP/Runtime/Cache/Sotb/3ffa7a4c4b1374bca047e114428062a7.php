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
  <div class="page page-current" id="register">
   <header class="bar bar-nav">
    <h1 class="title">用户注册</h1>
  </header>
<div class="content">
<form id="form">
  <div class="list-block">
    <ul>
      <!-- Text inputs -->
      <li>
        <div class="item-content">
         
          <div class="item-inner">
            <div class="item-title label">手机号码</div>
            <div class="item-input">
              <input type="text" name="mobile" placeholder="" id="mobile">
            </div>
          </div>
        </div>
      </li>
       <li>
        <div class="item-content">
          <div class="item-inner">
            <div class="item-title label">密码</div>
            <div class="item-input">
              <input type="password" name="password" placeholder="" >
           </div>
         </div>
        </div>
      </li>
      <li>
       <div class="row">

        <div class="col-60">
         <div class="item-content">
            <div class="item-inner">
              <div class="item-title label">验证码</div>
                <div class="item-input">
              	  <input type="text" name="message" id="message" placeholder="">  
                </div>
              </div>
            </div>
          </div>
        <div class="col-30">
        <div class="item-content">
        <input type="button" class="button button-light" id="send" value="发送验证码"/>
      </div>
    </div>

  </div>
</li>

     <ul>
    </div>
   </form>
   <div class="content-block">
    <a href="#" class="button button-dark button-big" id="register">注 册</a> 
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