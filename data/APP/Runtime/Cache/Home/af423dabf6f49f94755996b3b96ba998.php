<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
</head>
<body>
	<?php if(is_array($img)): foreach($img as $key=>$v): ?><img src="'/thinkphp3.2.3/'.<?php echo ($v["imgurl"]); ?>"><?php endforeach; endif; ?>
</body>
</html>