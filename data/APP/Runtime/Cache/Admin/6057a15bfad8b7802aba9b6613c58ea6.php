<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div align="center">
	<form action="/thinkphp3.2.3/Admin/Rbac/addrolehandle" method="post">
		<table>
			<tr>
				<th>用户名称</th>
				<td><input type="text" name="name" value="" /></td>
				</tr>
			<tr>
			<th>用户信息</th>
			<td><input type="text" name="remark" value=""></td>
			</tr>	
			<tr>
			<th>是否开启</th>
			<td><input type="radio" name="status" checked="checked" value="1">
			<input type="radio" name="status" value="0"></td>	
			</tr>
			<tr >
				<td colspan="2" align="center"><input type="submit" value="添加"></td>
			</tr>
		</table>
	</form>
</div>
	
</body>
</html>