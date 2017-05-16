<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<style type="text/css">
	a{text-decoration:none;}
</style>
<link rel="stylesheet" href="/thinkphp3.2.3/APP/Admin/View/public/css/node.css">	
<script src="/thinkphp3.2.3/APP/Admin/View/public/js/access.js"></script>
<script src="/thinkphp3.2.3/APP/Admin/View/public/js/jquery-1.8.3.min.js"></script>
<script>
	$(function() {
		input();
	});
</script>
	<title></title>
</head>
<body>
<form action="/thinkphp3.2.3/Admin/Rbac/setaccess" method="post">
<div id="warp">
	<a href="<?php echo U('rbac/addnode',array());?>" class="add-app">返回</a>

		<?php if(is_array($node)): foreach($node as $key=>$app): ?><p>
			<input type="checkbox" name="access[]" value="<?php echo ($app["id"]); ?>_1" level='1' <?php if($app["access"]): ?>checked="checked"<?php endif; ?> >
			<strong><?php echo ($app["title"]); ?></strong>
			</p>
			
			
			<?php if(is_array($app["child"])): foreach($app["child"] as $key=>$controller): ?><dl>
				<dt>
					<input type="checkbox" name="access[]" value="<?php echo ($controller["id"]); ?>_2" level=2 <?php if($controller["access"]): ?>checked="checked"<?php endif; ?>>
					<?php echo ($controller["title"]); ?>
				</dt>
					<?php if(is_array($controller["child"])): foreach($controller["child"] as $key=>$method): ?><dd>
					<input type="checkbox" name="access[]" value="<?php echo ($method["id"]); ?>_3" level=3 <?php if($method["access"]): ?>checked="checked"<?php endif; ?>>
					<?php echo ($method["title"]); ?> 
				</dd><?php endforeach; endif; ?>

			</dl><?php endforeach; endif; endforeach; endif; ?> 	
</div>	
<input type="hidden" name="rid" value="<?php echo ($rid); ?>">
<input type="submit" value="提交" style="display: block;margin: 20px auto;width: 100px;">
</form>
</body>
</html>