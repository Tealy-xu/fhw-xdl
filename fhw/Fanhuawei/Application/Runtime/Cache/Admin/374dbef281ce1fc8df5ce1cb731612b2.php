<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
<link href="/lamp/Fanhuawei/Public/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/lamp/Fanhuawei/Public/css/H-ui.admin.css" rel="stylesheet" type="text/css" />
<link href="/lamp/Fanhuawei/Public/lib/icheck/icheck.css" rel="stylesheet" type="text/css" />
<link href="/lamp/Fanhuawei/Public/lib/Hui-iconfont/1.0.7/iconfont.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>添加管理员</title>
</head>
<body>
<div class="pd-20">
	<form action="<?php echo U('Admin/doAddAdmin');?>" method="post" class="form form-horizontal" id="form-admin-add">
		<div class="row cl">
			<label class="form-label col-3"><span class="c-red">*</span>登录名：</label>
			<div class="formControls col-5">
				<input type="text" class="input-text" value="" placeholder="" id="user-name" name="username" datatype="*2-16" nullmsg="用户名不能为空">
			</div>
			<div class="col-4"> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-3"><span class="c-red">*</span>密码：</label>
			<div class="formControls col-5">
				<input type="password" id="user-pass" placeholder="密码" autocomplete="off" value="" class="input-text" datatype="*6-20" nullmsg="密码不能为空" name="userpass">
			</div>
			<div class="col-4"> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-3">角色：</label>
			<div class="formControls col-5"> <span class="select-box" style="width:150px;">
				<select class="select" name="roleid" size="1">
					 
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<div class="col-9 col-offset-3">
				<input class="btn btn-primary radius" id="subbutton" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</div>
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/Validform/5.3.2/Validform.min.js"></script> 
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/lamp/Fanhuawei/Public/js/H-ui.js"></script> 
<script type="text/javascript" src="/lamp/Fanhuawei/Public/js/H-ui.admin.js"></script> 
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-admin-add").Validform({
		// tiptype:2,
		// callback:function(form){
		// 	form[0].submit();
		// 	var index = parent.layer.getFrameIndex(window.name);
		// 	parent.$('.btn-refresh').click();
		// 	parent.layer.close(index);
		// }

		

		
	});

		
	$.get(
    	'/lamp/Fanhuawei/index.php/Admin/Admin/getCategory', //url
    	//已发送给服务器的数据

    	//回调函数
    	function( data ){
    		console.log(data);
    		$('.select').html(data);
    	},
    	'json'
    );
});
</script>
<script type="text/javascript">
	$('#subbutton').click(function(){
		//username userpass roleid
		var name = $('#user-name').val();
		var pass = $('#user-pass').val();
		var role = $('select option:selected').val();

		$.post(
	    	'/lamp/Fanhuawei/index.php/Admin/Admin/doAddAdmin', //url
	    	//已发送给服务器的数据
	    	{username:name,userpass:pass,roleid:role},

	    	//回调函数
	    	function( data ){
	    		console.log(data);
	    	},
	    	'json'
	    );

	    var index = parent.layer.getFrameIndex(window.name);
		parent.layer.close(index);

		
	});
</script>
</body>
</html>