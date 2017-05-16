<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
<title>Login Form</title>

<link rel="stylesheet" href="/create/APP/Admin/View/public/css/normalize.css">
<script type="text/javascript" src="/create/APP/Admin/View/public/js/jquery-1.8.3.min.js"></script>
<link rel="stylesheet" href="/create/APP/Admin/View/public/css/admin.css">

<script src="js/prefixfree.min.js"></script>
<script type="text/javascript" src="/create/APP/Admin/View/public/js/login.js"></script>
<script type="text/javascript">
	var URL="<?php echo U('index/verify');?>/";
	 
</script>

</head>

<body>

<div class="login">
	<h1>Login</h1>
	<form method="post" action="<?php echo U('index/login');?>">
		<input type="text" name="username" placeholder="用户名" required="required" />
		<input type="password" name="password" placeholder="密码" required="required" />
			<div class="col-md-4">
			<dl>
			<dh><input type="text" name="verify" placeholder="请输入验证码" required="required" autocomplete="off"/></dh>
        <dh><a href="javascript:void(change_code(this));"><img  src="<?php echo U('index/verify');?>" id="code"/>
        看不清</a></dh>
        </dh>
		
        </div>
		<div class="form-group">
                   
		<button type="submit" class="btn btn-primary btn-block btn-large">登录</button>
	</form>
</div>
<div style="text-align:center;">
</div>


</body>
</html>