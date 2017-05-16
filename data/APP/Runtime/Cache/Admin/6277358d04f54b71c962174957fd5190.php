<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台模板管理系统</title>
<link type="text/css" rel="stylesheet" href="/thinkphp3.2.3/APP/Admin/View/public/css/style.css" />
<script type="text/javascript" src="/thinkphp3.2.3/APP/Admin/View/public/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/thinkphp3.2.3/APP/Admin/View/public/js/menu.js"></script>
</head>

<body>
<div class="top"></div>
<div id="header">
	<div class="logo">米道众筹后台管理系统</div>
	<div class="navigation">
		<ul>
		 	<li>欢迎您！</li>
			<li><a href="">张山</a></li>
			<li><a href="">修改密码</a></li>
			<li><a href="">设置</a></li>
			<li><a href="<?php echo U('index/logout');?>">退出</a></li>
		</ul>
	</div>
</div>
<div id="content">
	<div class="left_menu">
				<ul id="nav_dot">
      <li>
          <h4 class="M1"><span></span>PAGE</h4>
          <div class="list-item none">
            <a href="<?php echo U('Page/wxpay');?>" target="iframe">微信支付</a>
            <a href="<?php echo U('Page/scorepay');?>" target="iframe">积分支付</a>
            <a href="<?php echo U('Page/wxscore');?>" target="iframe">微信积分支付</a>
            <a href="<?php echo U('Page/dealout');?>" target="iframe">收款人详情</a>
          </div>
        </li>
        <li>
          <h4 class="M2"><span></span>分类管理</h4>
          <div class="list-item none">
            <a href="<?php echo U('main/sort');?>" target="iframe">添加分类</a>
            <a href="" >分类列表</a>        
           </div>
        </li>
        <li>
          <h4 class="M3"><span></span>财务数据</h4>
          <div class="list-item none">
            <a href=''>基础教学1</a>
            <a href=''>基础教学2</a>
            <a href=''>基础教学3</a>
          </div>
        </li>
				<li>
          <h4 class="M4"><span></span>用户权限</h4>
          <div class="list-item none">
           <a href="<?php echo U('rbac/index');?>" target="iframe">用户列表</a>
          <a href="<?php echo U('rbac/role');?>" target="iframe">角色列表</a>
          <a href="<?php echo U('rbac/node');?>" target="iframe">权限列表</a>
          <a href="<?php echo U('rbac/adduser');?>" target="iframe">添加用户</a>
          <a href="<?php echo U('rbac/addrole');?>" target="iframe">添加角色</a>
          <a href="<?php echo U('rbac/addnode');?>" target="iframe">添加权限</a>
          </div>
        </li>
				<li>
          <h4 class="M5"><span></span>调研问卷</h4>
          <div class="list-item none">
            <a href=''>调研问卷1</a>
            <a href=''>调研问卷2</a>
            <a href=''>调研问卷3</a>
          </div>
        </li>
				<li>
          <h4  class="M6"><span></span>数据统计</h4>
          <div class="list-item none">
            <a href=''>数据统计1</a>
            <a href=''>数据统计2</a>
            <a href=''>数据统计3</a>
          </div>
        </li>
				<li>
          <h4  class="M7"><span></span>奖励管理</h4>
          <div class="list-item none">
            <a href=''>奖励管理1</a>
            <a href=''>奖励管理2</a>
            <a href=''>奖励管理3</a>
          </div>
        </li>
				<li>
          <h4   class="M8"><span></span>字典维护</h4>
          <div class="list-item none">
            <a href=''>字典维护1</a>
            <a href=''>字典维护2</a>
            <a href=''>字典维护3</a>
						<a href=''>字典维护4</a>
          </div>
        </li>
				<li>
          <h4  class="M9"><span></span>其他功能</h4>
          <div class="list-item none">
            <a href="<?php echo U('student/index');?>" target="iframe">学生兼职</a>
            <a href=''>内容管理2</a>
            <a href=''>内容管理3</a>
          </div>
        </li>
				<li>
          <h4   class="M10"><span></span>系统管理</h4>
          <div class="list-item none">
            <a href="<?php echo U('system/verify');?>" target="iframe">验证码设置</a>
            <a href=''>系统管理2</a>
            <a href=''>系统管理3</a>
          </div>
        </li>
  </ul>
		</div>
		<div class="m-right">
			<div class="right-nav">
					<ul>
							<li><img src="/thinkphp3.2.3/APP/Admin/View/public/images/home.png"></li>
								<li style="margin-left:25px;">您当前的位置：</li>
								<li><a href="#">系统公告</a></li>
								<li>></li>
								<li><a href="#">最新公告</a></li>
						</ul>
			</div>
			<div class="main">
				<iframe src=" " frameborder="0" name="iframe" width="100%" height="100%"></iframe>
			</div>
		</div>
</div>

<script>navList(12);</script>
</body>
</html>