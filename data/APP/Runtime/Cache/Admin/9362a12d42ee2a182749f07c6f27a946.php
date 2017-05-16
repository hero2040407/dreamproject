<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>无标题</title>
<link rel="stylesheet" type="text/css" href="/thinkphpexercise/thinkphp3.2.3/APP/Admin/View/public/css/admin.css">
</head>
<body>
<form method="post" action=""></form>
<table  class="verify"> 
	<tr>
		<th colspan="2">验证码设置</th>
	</tr>
	<tr>
		<td>验证码长度</td>
		<td>
			<input type="text" class="verify" name="VERIFY_LENGTH" value="<?php echo (C("VERIFY_LENGTH")); ?>" />
		</td>
		</tr>
		<tr>
		<td>验证码宽度</td>
		<td>
			<input type="text" name="VERIFY_WIDTH" value="<?php echo (C("VERIFY_WIDTH")); ?>"/>
		</td>
		</tr>
		<tr>
		<td>验证码高度</td>
			<td><input type="text" name="VERIFY_HEIGHT" value="<?php echo (C("VERIFY_HEIGHT")); ?>"/></td>
		</tr>
		<tr>
			<td>验证码字体大小</td>
			<td><input type="text" name="VERIFY_FONTSIZE" value="<?php echo (C("VERIFY_FONTSIZE")); ?>"/></td>
		</tr>
		<tr>
			<td>随机因子</td>
			<td><input type="text" name="VERIFY_SEED" value="<?php echo (C("VERIFY_SEED")); ?>"></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="button" value="设置"/></td>
		</tr>
</table>

</body>
</html>