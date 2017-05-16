<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div align="center">
	<form action="/thinkphp3.2.3/Admin/Rbac/addnodehandle" method="post">
		<table>
			<tr>
			<th><?php echo ($type); ?>名称</th>
			<td><input type="text" name="name" value=""/></td>
			</tr>
			<tr>
			<th><?php echo ($type); ?>信息</th>
			<td><input type="text" name="title" value=""></td>
			</tr>	
			<tr>
			<th>是否开启</th>
			<td><input type="radio" name="status" checked="checked" value="1">
			<input type="radio" name="status" value="0"></td>	
			</tr>
			<tr >
				<input type="hidden" name="pid" value="<?php echo ($pid); ?>">
				<input type="hidden" name="level" value="<?php echo ($level); ?>}">
				<td colspan="2" align="center"><input type="submit" value="添加"></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>