<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<style type="text/css">
	a{text-decoration:none;}
</style>
	

	<title></title>
</head>
<body>
	<table>
		<tr>
			<th>ID</th>
			<th>用户名称</th>
			<th>用户信息</th>
			<th>开启状态</th>
		</tr>
		<?php if(is_array($role)): foreach($role as $key=>$v): ?><tr>
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["name"]); ?></td>	
				<td><?php echo ($v["remark"]); ?></td>
				<td>
					<?php if($v['status']): ?>开启
					<?php else: ?>
					关闭<?php endif; ?>
				</td>
				<td><a href="<?php echo U('rbac/access',array('rid' => $v['id']));?>" target="iframe">配置权限</a></td>
			</tr><?php endforeach; endif; ?> 	


	</table>	
</body>
</html>