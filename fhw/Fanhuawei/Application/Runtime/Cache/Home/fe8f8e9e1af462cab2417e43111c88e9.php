<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
	<head>
	<meta charset='utf-8'>	
	</head>
	<body>
		<div style="position: fixed;left:160px;top:70px;font-size:12px;color:gray;"><span style="font-family:sans-serif,宋体;">标题：<?php echo ($info["title"]); ?></span></div>
		<div id="emailbor" style="width:800px;height:350px;background-image:url(/lamp/Fanhuawei/Public/images/showemail.png);background-size:100%;">
   		 <textarea readonly="readonly" name="email" cols="61" rows="13" style="margin-top:115px;margin-left:155px;">&nbsp;&nbsp;<?php echo ($info["message"]); ?></textarea>
  </div>
	</body>
</html>