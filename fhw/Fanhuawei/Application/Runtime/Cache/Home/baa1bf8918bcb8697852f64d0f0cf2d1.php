<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>密码管理_个人中心_华为商城</title>
<link href="/lamp/Fanhuawei/Public/Css/person/ec.core.css" rel="stylesheet" type="text/css">
<link href="/lamp/Fanhuawei/Public/Css/person/main.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/lamp/Fanhuawei/Public/js/jquery-1.10.2.min.js"></script>
</head>

<body>




<div class="g">
    <div class="fl u-4-5"><!--栏目 -->
	<div class="part-area clearfix">
		<div class="fl">
			<h3 class="password-title"><span>密码管理</span></h3>
		</div>
	</div>
	<div class="hr-35"></div>
	<!--密码管理 -->
	<form id="password-list" method="post" action="<?php echo U('PersonCenter/doChange');?>" >
		<div class="password-area">
			<div class="form-edit-area">
				<div class="form-edit-table">
					<table border="0" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<th><span class="required">*</span>原来密码：</th>
								<td><label style="display: block; position: absolute; cursor: text; float: left; z-index: 2; color: rgb(153, 153, 153);" class="text vam span-150" for="input_label_0"></label>
								<input name="oldPassword" type="password" maxlength="16" class="text vam span-150"  id="input_label_0" style="z-index: 1;" placeholder="请输入原本密码">
								</td>
							</tr>
							<tr>
								<th><span class="required">*</span>新密码：</th>
								<td><label style="display: block; position: absolute; cursor: text; float: left; z-index: 2; color: rgb(153, 153, 153);" class="text vam span-150" for="input_label_1">
								</label>
								
								<input name="newPassword" type="password" maxlength="16" class="text vam span-150"  id="input_label_1" style="z-index: 1;" placeholder="6-26位新密码">
								</td>
							</tr>
							<tr>
								<th><span class="required">*</span>重复新密码：</th>
								<td><label style="display: block; position: absolute; cursor: text; float: left; z-index: 2; color: rgb(153, 153, 153);" class="text vam span-150" for="input_label_2"></label>
								
								<input name="renewPassword" type="password" maxlength="16" class="text vam span-150"  id="input_label_2" style="z-index: 1;" placeholder="重复新密码">
								</td>
							</tr>
							<tr>
								<th style="color: rgb(192, 112, 144);font-size:10px;"><span class="required">!</span>提示：</th>
								<td style="display: block; position: absolute; cursor: text; float: left; z-index: 2; color: rgb(192, 112, 144);font-size:10px;">密码为空等于不修改</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="form-edit-action">
					<input type="submit" class="button-replace vam" id="pwd_submit" value="&nbsp;">
				</div>
			</div>
		</div>
	</form>
</div>



</div>
</div>
<div class="hr-60"></div>

<!--底部 -->


<div id="AutocompleteContainter_7fce7" style="position: absolute; z-index: 9999; top: 93px; left: 556.5px;"><div class="autocomplete-w1"><div class="autocomplete" id="Autocomplete_7fce7" style="display: none; width: 315px; max-height: 400px;"></div></div></div></body></html>