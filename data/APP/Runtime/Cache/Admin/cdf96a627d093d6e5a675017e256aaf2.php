<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.2.0/css/bootstrap.min.css">
<script src="/thinkphp3.2.3/APP/Admin/View/public/js/jquery-1.8.3.min.js"></script>
<script>
	$(function() {
		$('.add-role').click(function() {
			var obj = $(this).parents('tr').clone();
			obj.find('.add-role').remove();
			$('#last').before(obj);

		})
	});
</script>
</head>
<body>
<form action="/thinkphp3.2.3/Admin/Rbac/adduserhandle" method="post">
	 <table class="table table-striped table-bordered">
		<tr>
			<th>添加用户</th>
		</tr>
		<tr><td align="right" width="40%">用户称号</td><td><input type="text" name="nickname" value=""></td></tr>
		<tr><td align="right">账号</td><td><input type="text" name="account" value=""></td></tr>
		<tr><td align="right">密码</td><td><input type="text" name="password" value=""></td></tr>
		<tr>
			<td align="right">请选择角色</td>
			<td>
				<select name="role_id[]" >
				<option value="请选择"></option>
				<?php if(is_array($role)): foreach($role as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); echo ($v["remark"]); ?></option><?php endforeach; endif; ?>
				</select>
				<span class="add-role">添加一个角色</span>
			</td>
		</tr>
		<tr id="last">
			<td cosplan="2" align="center">
				
			</td>
		</tr>
	</table>
	<input type="submit" value="设置" style="display:block;margin:20px auto;width:100px;">
</form>
</body>
</html>