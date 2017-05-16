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
  <div class="page page-current" id="commentreply">

<header class="bar bar-nav">
  <a class="button button-link button-nav pull-left back">
      <span class="icon icon-left"></span>
      返回
    </a>
    <a class="button button-link button-nav pull-right" href="<?php echo U('object/choose',array('id' => $comment['qid']));?>">
      <span class="icon">&nbsp;</span>
      进入问题
    </a>
  <h1 class='title'>评论回复</h1>
</header>

<!-- 评论输入 -->
<div class="bar bar-footer">
  <div class="row">
      <div class="search-input col-75">
        <input type="search" name="comment" id='commentin' placeholder='输入评论...'/>
          </div>
          <a  href="" class="button button-fill button-primary col-25" id="comment">提 交
        </a>
    </div>
</div>

<!-- 评论查看 -->
  <div class="content">
      <div class="content-padded">    
      &nbsp;&nbsp;<?php echo ($comment['comment']); ?>
    </div>
        <div class="list-block media-list">
          <ul class="list-container">
            <?php if(is_array($reply)): foreach($reply as $key=>$v): ?><li class="item-content">
              	<div class="item-inner">
              	<div class="item-title"></div>
              	<div class="item-text"><?php echo ($v["comment"]); ?></div>
              	</div>
              </li><?php endforeach; endif; ?>
          </ul>
        </div>  
        <div class="content-padded"><a href="#" class="button button-light" id="loadmore">加 载 更 多 评 论 <span class="icon icon-down"></span></a>
        </div>
      </div>
      <input type="hidden" id="pid" value="<?php echo ($pid); ?>"  />
      <!-- page -->
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