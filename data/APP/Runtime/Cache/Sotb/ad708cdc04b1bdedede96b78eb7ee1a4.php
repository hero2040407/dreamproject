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

<!-- 我的页面 -->
<div class="page-group">
<div id="mine" class="page page-current">
  <nav class="bar bar-tab">
  <a class="tab-item " href="/data/Index/index">
      <span class="icon icon-home"></span>
      <span class="tab-label">首页</span>
    </a>
    <a class="tab-item" href="/data/Index/create">
      <span class="icon icon-star"></span>
      <span class="tab-label">创想</span>
    </a>
<a class="tab-item active" href="#">
      <span class="icon icon-me"></span>
      <span class="tab-label">我</span>
    </a>
</nav>
<!-- page 1 -->

<div class="content">
  <?php if($question == 1): ?><div class="list-block media-list">
      <ul>
        <li>
          <div class="item-content">
            <div class="item-inner">
              <a href="/data/Index/login"><h3>登录</h3></a>
            </div>
          </div>
        </li>
      </ul>
    </div>
  <?php else: ?>
   
      <div class="list-block media-list">
      <ul>
      
          <li><div class="item-content">
            <div class="item-inner">
              <a href="#question"><h3>我的提问</h3></a>
            </div>
          </div></li>
          <li><div class="item-content">
            <div class="item-inner">
              <a href="#data"><h3>我的资料</h3></a>
            </div>
          </div></li>
          <li><div class="item-content">
            <div class="item-inner">
              <a href="#comment" data-no-cache="true"><h3>我的评论</h3></a>
            </div>
          </div></li>
          <li><div class="item-content">
            <div class="item-inner">
              <a href="" id="logout"><h3>注销</h3></a>
            </div>
          </div></li>
         <!--  <li><a href="#comment">我的评论</a></li>
          <li><a href="#data">我的资料</a></li>
          <li><a href="/data/Index/login">登录</a></li> -->
          </ul>
          </div><?php endif; ?>
        </div>
    </div>

<!-- question -->
<div class="page" id='question'>
  <header class="bar bar-nav">
    <h1 class='title'>我的提问</h1>
    <p class="button button-link button-nav pull-right edit">
      编辑
      <span class="icon icon-menu"></span>
    </p>
  </header>

  <div class="content">
    <div class="buttons-tab">
      <a href="#tab3" class="tab-link active button">公开问题</a>
      <a href="#tab4" class="tab-link button">私人问题</a>
    </div>

    <div class="tabs">
      <div id="tab3" class="tab active">
       <div class="list-block media-list">
        <div class="list-group">
          <ul class="list-question">
            <?php if(is_array($question)): foreach($question as $key=>$v): ?><li>
                <div class="item-content">
                  <div class="item-inner">
                  <div class="item-title-row">
                    <a href="<?php echo U('object/choose',array('id' => $v['id']));?>">
                    <div class="item-title"><?php echo ($v["question"]); ?></div></a>
                    <div class="item-after">
                    <?php if($v['audit'] == 1): ?>审核通过
                    <?php else: ?>
                    未审核<?php endif; ?>
                    </div>
                    <div id="<?php echo ($v["id"]); ?>" class="item-after delete" style="color:red;">删除</div>
                    </div>
                  </div>
                </div>
              </li><?php endforeach; endif; ?>
          </ul>
        </div>
    </div>
  </div>

<div id="tab4" class="tab">
      <div class="list-block media-list">
        <div class="list-group">
          <ul class="list-personal">
            <?php if(is_array($personal)): foreach($personal as $key=>$v): ?><li>
                <div class="item-content">
                  <div class="item-inner">
                  <div class="item-title-row">
                    <a href="<?php echo U('object/choose',array('id' => $v['id']));?>">
                    <div class="item-title"><?php echo ($v["question"]); ?></div></a>
                    <div id="<?php echo ($v["id"]); ?>" class="item-after delete" style="color:red;">删除</div>
                    </div>
                  </div>
                </div>
              </li><?php endforeach; endif; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- data -->
  <div class="page" id=''>
  <header class="bar bar-nav">
    <h1 class='title'>我的资料</h1>
  </header>
  <div class="content">

    

    </div>
  </div>

<!-- comment -->
  <div class="page" id='comment'>
  <header class="bar bar-nav">
    <h1 class='title'>评论内容</h1>
    <p class="button button-link button-nav pull-right edit">
      编辑
      <span class="icon icon-menu"></span>
    </p>
  </header>
  <div class="content">
    <div class="buttons-tab">
      <a href="#tab1" class="tab-link active button">我的评论</a>
      <a href="#tab2" class="tab-link button">我的回复</a>
    </div>
    <div class="tabs">
      <div id="tab1" class="tab active">

      <div class="list-block media-list">
          <ul class="list-comment">
          <?php if(is_array($comment)): foreach($comment as $key=>$v): ?><li>
              <div class="item-content">
                <div class="item-inner">
                  <div class="item-title-row">
                    <a href="<?php echo U('object/choose',array('id' => $v['qid']));?>">
                      <div class="item-title"><?php echo ($v["comment"]); ?></div></a>
                      <div id="<?php echo ($v["id"]); ?>" class="item-after delete" style="color:red;">删除</div>
                  </div>
                </div>
              </div>
            </li><?php endforeach; endif; ?>
        </ul>
    </div>

      <div class="content-block">
        <div class="row">
            <div class="col-50"><a href="" id="commentup" class="button button-danger">上一页</a></div>
            <div class="col-50"><a href="#" id="commentdown" class="button  button-dark">下一页</a></div>
          </div>
        </div>
      </div>

      <div id="tab2" class="tab">
        <div class="list-block media-list">
          <ul class="list-reply">
          <?php if(is_array($reply)): foreach($reply as $key=>$v): ?><li>
              <div class="item-content">
                <div class="item-inner">
                  <div class="item-title-row">
                    <a href="<?php echo U('object/commentreply',array('pid' => $v['pid']));?>">
                      <div class="item-title"><?php echo ($v["comment"]); ?></div></a>
                      <div id="<?php echo ($v["id"]); ?>" class="item-after delete" style="color:red;">删除</div>
                  </div>
                </div>
              </div>
            </li><?php endforeach; endif; ?>
        </ul>
    </div>

      <div class="content-block">
        <div class="row">
            <div class="col-50"><a href="" id="replyup" class="button button-danger">上一页</a></div>
            <div class="col-50"><a href="#" id="replydown" class="button  button-dark">下一页</a></div>
          </div>
        </div>
      </div>

    </div>
</div>

<!-- page -->
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