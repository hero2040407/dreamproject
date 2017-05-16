<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>		
	<title></title>
</head>
<body>
<!-- <?php if(is_array($page)): foreach($page as $key=>$k): echo ($k["name"]); endforeach; endif; ?> -->
<html>
    <head>
        
    </head>
    <body>
    <P><a href="<?php echo U('page/expUser');?>" >导出数据并生成excel</a></P><br/>
        <form action="<?php echo U('Index/impUser');?>" method="post" enctype="multipart/form-data">
            <input type="file" name="import"/>
            <input type="hidden" name="table" value="tablename"/>
            <input type="submit" value="导入"/>
        </form>
    </body>
    
</html>
</body>
</html>