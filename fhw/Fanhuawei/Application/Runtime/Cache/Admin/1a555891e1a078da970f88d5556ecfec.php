<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
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
<link href="/lamp/Fanhuawei/Public/css/style.css" rel="stylesheet" type="text/css" />
<link href="/lamp/Fanhuawei/Public/lib/Hui-iconfont/1.0.7/iconfont.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>新建网站角色</title>
</head>
<body>
<div class="pd-20">
	<form action="/lamp/Fanhuawei/index.php/Admin/Admin/doRoleUpdAdmin" method="post" class="form form-horizontal" id="form-user-character-add">
		<input type="hidden" value="<?php echo ($role_id); ?>" name="role_id" >
		<div class="row cl">
			<label class="form-label col-2"><span class="c-red">*</span>角色名称：</label>
			<div class="formControls col-10">
				 <?php echo ($role_name); ?>
			</div>
		</div>
		<div class="row cl">
			<!-- <label class="form-label col-2">备注：</label>
			<div class="formControls col-10">
				<input type="text" class="input-text" value="" placeholder="" id="" name="">
			</div> -->
		</div>
		<div class="row cl">
			<label class="form-label col-2">角色权限：</label>
			<div class="formControls col-10">
			<!-- {*首先显示父级权限，在内部嵌套判断显示对应的子级权限 ul  li*} -->
			<ul>
			<!-- <foreach name="pauth_info" item="v"> -->
			<?php if(is_array($pauth_info)): $i = 0; $__LIST__ = $pauth_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><input type="checkbox" name="authname[]" <?php if(in_array($v['auth_id'],$auth_ids_arr)): ?>checked='checked'<?php endif; ?> value="<?php echo ($v["auth_id"]); ?>"><?php echo ($v["auth_name"]); ?></li>
				<ul>

					<?php if(is_array($sauth_info)): foreach($sauth_info as $key=>$vv): if($vv['auth_pid'] == $v['auth_id']): ?><li>&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="authname[]" <?php if(in_array($vv['auth_id'],$auth_ids_arr)): ?>checked='checked'<?php endif; ?> value="<?php echo ($vv["auth_id"]); ?>"><?php echo ($vv["auth_name"]); ?></li>
						
						<ul>
						<?php if(is_array($tauth_info)): foreach($tauth_info as $key=>$vvv): if($vvv['auth_pid'] == $vv['auth_id']): ?><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="authname[]" <?php if(in_array($vvv['auth_id'],$auth_ids_arr)): ?>checked='checked'<?php endif; ?> value="<?php echo ($vvv["auth_id"]); ?>"><?php echo ($vvv["auth_name"]); ?></li><?php endif; endforeach; endif; ?>
						</ul><?php endif; endforeach; endif; ?>

				</ul><br><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			</div>
		</div>
		<div class="row cl">
			<div class="col-10 col-offset-2">
				<button type="submit" class="btn btn-success radius" id="admin-role-save" name="admin-role-save"><i class="icon-ok"></i> 确定</button>
			</div>
		</div>
	</form>
</div>
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/laypage/1.2/laypage.js"></script> 
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/lamp/Fanhuawei/Public/js/H-ui.js"></script> 
<script type="text/javascript" src="/lamp/Fanhuawei/Public/js/H-ui.admin.js"></script> 
<script>
$(function(){
	$(".permission-list dt input:checkbox").click(function(){
		$(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
	});
	$(".permission-list2 dd input:checkbox").click(function(){
		var l =$(this).parent().parent().find("input:checked").length;
		var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
		if($(this).prop("checked")){
			$(this).closest("dl").find("dt input:checkbox").prop("checked",true);
			$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
		}
		else{
			if(l==0){
				$(this).closest("dl").find("dt input:checkbox").prop("checked",false);
			}
			if(l2==0){
				$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
			}
		}
		
	});
});
</script>
</body>
</html>