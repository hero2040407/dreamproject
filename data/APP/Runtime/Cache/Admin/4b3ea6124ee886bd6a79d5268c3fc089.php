<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
    <table>
    	<tr><th colspan="2">1111111</th></tr>
    	
    		 <?php if(is_array($db)): foreach($db as $key=>$v): ?><tr><td><?php echo ($v["name"]); ?> </td><td><?php echo ($v["title"]); ?></td></tr>
                   <tr></tr><?php endforeach; endif; ?>
    	
    </table>
</body>
</html>