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
  <div class="page" id='admin'>
	  <header class="bar bar-nav">
	    <h1 class='title'>我的提问</h1>
	    <p class="button button-link button-nav pull-right edit">
	      编辑
	      <span class="icon icon-menu"></span>
	    </p>
	    <a href="<?php echo U('admin/index','allow=1');?>" class="button button-link button-nav pull-left">
	      审核通过的问题
	    </a>
	     <a href="<?php echo U('admin/index');?>" class="button button-link button-nav pull-left">
	      未审核的问题
	    </a>
	  </header>
<div class="content">
  	<div class="list-block media-list">
          <ul>
            <?php if(is_array($question)): foreach($question as $key=>$v): ?><li>
                <div class="item-content">
                  <div class="item-inner">
                  <div class="item-title-row">
                    <a href="<?php echo U('object/choose',array('id' => $v['id']));?>">
                    <div class="item-title"><?php echo ($v["question"]); ?></div></a>
                    <div id="<?php echo ($v["id"]); ?>" class="item-after">
                    <div style="color:red;" class="delete">删除</div>
                    <div class="allow" id="<?php echo ($v["id"]); ?>">通过</div>
                    </div>
                    </div>
                  </div>
              </li><?php endforeach; endif; ?>
          </ul>
        </div>
	<?php echo ($pagestr); ?>
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