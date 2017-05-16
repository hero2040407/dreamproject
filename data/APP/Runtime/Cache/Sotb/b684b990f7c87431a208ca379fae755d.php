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
 <div class="page page-current" id="choose">
<!-- header -->
<header class="bar bar-nav">
  <a class="button button-link button-nav pull-left back" href="<?php echo U('index/index');?>">
      <span class="icon icon-left"></span>
      返回
    </a>
  <h1 class='title'>问题选择</h1>
</header>
<!--  -->
<div class="bar bar-footer">
  <div class="row">
      <div class="search-input col-75">
        <input type="search" name="comment" id='commentin' placeholder='输入评论...'/>
          </div>
          <a  href="" class="button button-fill button-primary col-25" id="comment">提 交
        </a>
    </div>
</div>
<!--  -->
  <div class="content">
  <div class="list-block">
    <ul>
      <li>
        <div class="item-content">
              <h3>提问原因</h3>
          </div>
        </li>
    </ul>
        </div>  
    <div class="content-padded">    
      &nbsp;&nbsp;<?php echo ($data["why"]); ?>
    </div>
<!--  -->
  <div class="list-block media-list">
    <ul>
      <li>
        <div class="item-content">
            <div class="item-inner">
              <h3>&nbsp;&nbsp;<?php echo ($data["question"]); ?></h3>
            </div>
          </div>
        </li>
    </ul>
  <?php if($res['cid'] > 0 ): ?><!-- 提交问题用户显示页面 -->
    <ul>
      <?php if(is_array($choose)): foreach($choose as $key=>$v): ?><li>
         <label class="label-checkbox item-content">
          <?php if($v['id'] == $res['cid']): ?><input type="radio" name="cid" checked="checked"><?php endif; ?>
        <div class="item-media"><i class="icon icon-form-checkbox"></i></div>
          <div class="item-inner">
            <div class="item-title-row">
              <?php echo ($v["choose"]); ?>
              <div class="item-after"><?php echo round(($v['total']*100/$data['sum']),1).'%' ?></div>
              </div>
              <div class="item-subtitle">
              &nbsp;
              </div>
           </div>
          </label>
        </li><?php endforeach; endif; ?>
    </ul>
    <div class="content-block"></div>
      <div class="content-block" align="center">已 回 答 本 问 题</div>
        <?php else: ?>

    <!-- 未提交问题和未登录用户显示页面 -->
    <form id="form">
     <ul>
      <?php if(is_array($choose)): foreach($choose as $key=>$v): ?><li>
        <label class="label-checkbox item-content">
         <input type="radio" name="cid" value="<?php echo ($v["id"]); ?>">
          <div class="item-media"><i class="icon icon-form-checkbox"></i></div>
           <div class="item-inner">
            <div class="item-title-row">
              <?php echo ($v["choose"]); ?>
              </div>
           </div>
          </label>
         </li><?php endforeach; endif; ?>
      </ul> 
      <div class="content-block"></div>
      <div class="content-padded"><a href="" class="button button-big button-fill button-success" id="submit">提交
        </a> </div><?php endif; ?>
       <input type="hidden" name="qid" id="qid" value="<?php echo ($data["id"]); ?>">
  </form>
</div>
<!-- list -->

      <!-- 标签页 --> 
  <div class="buttons-tab">
    <a href="#tab1" class="tab-link  button">评  论</a>
  </div>

    <div class="tabs">
      <div id="tab1" class="tab infinite-scroll active">
        <div class="list-block media-list">
          <ul class="list-container">
            <?php if(is_array($comment)): foreach($comment as $key=>$v): ?><li class="item-content">
              <div class="item-inner">
              <div class="item-title-row">
              <div class="item-title">石头</div>
              <a href="<?php echo U('object/commentreply',array('pid' => $v['id']));?>"><div class="item-after">回复</div></a>
              </div>
              <div class="item-text"><?php echo ($v["comment"]); ?></div>
              </div>
              </li><?php endforeach; endif; ?>
          </ul>
        </div>  
      </div>     
    </div>

    <!-- content -->
   </div>

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