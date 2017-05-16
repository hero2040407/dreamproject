<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<style type="text/css">
	a{text-decoration:none;}
</style>
<link rel="stylesheet" href="/thinkphp3.2.3/APP/Admin/View/public/css/node.css">	

	<title></title>
</head>
<body>
<div id="warp">
	<a href="<?php echo U('rbac/addnode',array());?>" class="add-app">添加</a>

		<?php if(is_array($node)): foreach($node as $key=>$v): ?><p>
			<strong><?php echo ($v["title"]); ?></strong>
			<a href="<?php echo U('rbac/addnode',array('pid' => $v['id'] , 'level' => 2));?>"> 添加控制器</a>
			[<a href="">修改</a>]
			[<a href="">删除</a>]
			</p>
			
			
			<?php if(is_array($v["child"])): foreach($v["child"] as $key=>$k): ?><dl>
				<dt>
					<?php echo ($k["title"]); ?>
					<a href="<?php echo U('rbac/addnode',array('pid' => $k['id'] , 'level' => 3));?>">添加方法</a>
					[<a href="">修改</a>]
					[<a href="<?php echo U('rbac/deletenode',array('nid' => $k['id'] , 'level' => 3));?>">删除</a>]	
				</dt>
					<?php if(is_array($k["child"])): foreach($k["child"] as $key=>$s): ?><dd>
					<?php echo ($s["title"]); ?> 
					[<a href="">修改</a>]
					[<a href="<?php echo U('rbac/deletenode',array('nid' => $s['id'] , 'level' => 3));?>">删除</a>]
					</dd><?php endforeach; endif; ?>

			</dl><?php endforeach; endif; endforeach; endif; ?> 	
</div>	
</body>
</html>