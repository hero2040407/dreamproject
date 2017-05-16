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
			<th>是否开启</th>
			<th>用户组别</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($user)): foreach($user as $key=>$v): ?><tr>
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["account"]); ?></td>	
				<td><?php echo ($v["nickname"]); ?></td>
				<td>
					<?php if($v["status"]): ?>开启<?php endif; ?> 
				</td>
				<td>
					<?php if($v["account"] == C("RBAC_SUPERADMIN")): ?>超级管理员<?php endif; ?>
					<dl>
						<?php if(is_array($v["roles"])): foreach($v["roles"] as $key=>$vaule): ?><dd><?php echo ($vaule["name"]); ?>(<?php echo ($vaule["remark"]); ?>)</dd><?php endforeach; endif; ?>						
					</dl>
				</td>
				<td><a href="">锁定</a></td>
				<td><a href="<?php echo U('rbac/deleteuser', array('uid' => $v['id']));?>">删除用户</a></td>
			</tr><?php endforeach; endif; ?> 	


	</table>	
</body>
</html>