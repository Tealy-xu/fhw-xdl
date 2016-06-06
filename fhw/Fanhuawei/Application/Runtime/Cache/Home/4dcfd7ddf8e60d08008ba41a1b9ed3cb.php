<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>

<html><head><meta charset="UTF-8">

<title>个人购物地址_华为商城</title>
<link rel="shortcut icon" href="/lamp/Fanhuawei/Public/Ico/favicon.ico">
<link href="/lamp/Fanhuawei/Public/Css/ec.core.css" rel="stylesheet" type="text/css">

<link href="/lamp/Fanhuawei/Public/Css/mainn.css" rel="stylesheet" type="text/css">

</head>



<body>

<script src="/lamp/Fanhuawei/Public/js/base.js"></script>
<script src="/lamp/Fanhuawei/Public/js/jquery-1.10.2.min.js"></script>





<div class="g">
    <div class="fl u-4-5"><!--栏目 -->
<div class="part-area clearfix">
    <div class="fl">
        <h3 class="myAddress-title"><span>我的收货地址</span></h3>
    </div>
</div>
<div class="hr-2"></div>
<!--表单-我的收货地址 -->
<div class="myAddress-list">
       <!--一个地址-->
	<?php if(is_array($vo)): $i = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div id="myAddress-area-8543557" class="myAddress-area">
	<div class="h clearfix">
		<div class="fl" id="tip">
		   <?php if($vo['address_lock'] == 1): ?><b>已设为默认地址</b>
		   <?php else: ?>
			  <b></b><?php endif; ?>
		</div>
	    <div class="fr">
		   <a id="deldun" href="javascript:void(0);" title="删除">删除</a>
		   <input id="idvalue" type="hidden" value="<?php echo ($vo["id"]); ?>">
	    </div>
	</div>
	<div class="b">
		<div id="address-detail-8543557" class="form-detail-area">
			<table border="0" cellpadding="0" cellspacing="0">
				<tbody>
				<tr>
					<th>收货人：</th>
				    <td><?php echo ($vo["linkuser"]); ?></td>
				</tr>
				<tr>
					<th class="vat">收货地址：</th>
				    <td><?php echo ($vo["adetail"]); ?></td>
				</tr>
				<tr>
					<th>邮政编码：</th>
				    <td><?php echo ($vo["code"]); ?></td>
				</tr>
				<tr>
					<th>联系号码：</th>
				    <td><?php echo ($vo["tel"]); ?></td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
 <!--一个地址-->

</div>
<!--我的收货地址-添加新地址 -->

<div class="myAddress-add-area">
	<div class="h"><b>添加新地址</b></div>
    <div class="b">
    	<div class="form-edit-area">
	    <form id="myAddress-add-form" autocomplete="off" onsubmit="return ec.member.myAddress.save(this)" data-type="add">
            <div class="form-edit-table">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tbody><tr>
                            <th><span class="required">*</span>收货人：</th>
                            <td><input maxlength="20" type="text" name="address_name" class="text vam span-400" id="luser" validator="validator11409811718553">
                            <span id="msg_user"></span></td>
                        </tr>
                        <tr>
                            <th rowspan="2" class="vat"><span class="required">*</span>收货地址：</th>
                            <td>
								<div id="myAddress-add-region" style="height:25px; float:left;">
								 <select name="s_province" id="s_province"></select>
	 	                         <select name="s_city" id="s_city"></select>
	 	                         <select name="s_county" id="s_county"></select>
								 <script type="text/javascript" src="/lamp/Fanhuawei/Public/Js/c-area.js"></script><span id='msg_addr'></span>
								</div>
								<span id="region-msg" style="float:left"></span>
							</td>
                        </tr>
                        <tr>
                            <td>
                            <label style="display: block; position: absolute; cursor: text; float: left; z-index: 2; color: rgb(153, 153, 153);" class="text vam span-400" for="input_label_0"></label>
							
							<input maxlength="100" type="text" class="text vam span-400" name="address" validator="validator21409811718554" id="input_label_0" style="z-index: 1;" placeholder="详细收货地址">
							<span id="msg_address"></span></td>
                        </tr>
                        <tr>
                            <th>邮编：</th>
                            <td><input maxlength="6" type="text" class="text vam span-150 ime-disabled" name="zipCode" id="adcode" validator="validator31409811718554">
                            <span id="msg_code"></span></td>
                        </tr>
                        <tr>
                            <th><span class="required">*</span>手机号码：</th>
                            <td>
				<div class="inline-block vam">
				
				       <input maxlength="11" type="text" name="mobile" id="adtel" class="text vam span-150 ime-disabled" alt="phone-msg" validator="validator41409811718554">&nbsp;&nbsp;
						<span id="msg_tel"></span>
				       </div>
					   
			
				<div class="inline-block vam" id="phone-msg"></div>
			    </td>
                        </tr>
                    </tbody></table>
            </div>
            <div class="form-edit-action"><input type="button" id="btnSubmit" class="button-action-ok-2 vam" value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" class="button-action-cancel-2 vam" value="" onclick="ec.member.myAddress.reset()"><span id="addaddress_msg" class="vam error"></span></div>
	    </form>
        </div>
    </div>
</div>
<div class="hr-60"></div>





</div>
	
</div>
<div class="hr-60"></div>

<script>
	//单击登录按钮进行处理
		$("#btnSubmit").click(function(){
			var mark=1;
			var linkuser=$("#luser").val();
			var detail=$("#input_label_0").val();
			var code=$("#adcode").val();
			var tel=$('#adtel').val();
			var addr=$('#s_province').val()+$('#s_city').val()+$('#s_county').val();
			 //先判断是否有没有输入的
			if(linkuser.length==0){
				 mark=0;
				 $("#msg_user").html('<span class="vam icon-error">收货人不能为空</span>');
			}
			if(detail.length==0){
				  mark=0;
				 $("#msg_address").html('<span class="vam icon-error">详细地址不能为空</span>');
						 
			}
						  
			if(code.length==0){
				  mark==0;
				 $("#msg_code").html('<span class="vam icon-error">邮编号不能为空</span>');
			}
					     
			if(tel.length==0){
				   mark=0;
				  $("#msg_tel").html('<span class="vam icon-error">手机不能为空</span>');
						 }
		
					if(mark==1){
						     //成功开始注册
							 var url="<?php echo U('PersonCenter/address');?>";
							 $.ajax({
							      url:"<?php echo U('PersonCenter/addAddress');?>",
								  type:"POST",
								  data:{
								     'linkuser':linkuser,
									 'detail':detail,
									 'code':code,
									 'tel':tel,
									 'addr':addr
								  },
								  success:function(responseText){
										if(responseText==3){
											$('#addaddress_msg').html('<span class="vam icon-error">请重新输入正确的邮编码</span>');
										}
										if(responseText==2){
											$('#addaddress_msg').html('<span class="vam icon-error">请重新输入正确的手机号</span>');
										}
									    if(responseText==1){
										  $("#addaddress_msg").html('<span class="vam icon-ok">添加成功!</span>');
                                                window.location.href=url;
										}
										if(responseText==0){
											$('#addaddress_msg').html('<span class="vam icon-error">添加失败，迷之错误</span>');
										}
									 
									 }
								  });
							 
							 };
					 });

	 $("#deldun").click(function(){
	 				var id = $('#idvalue').val();
					 var url="<?php echo U('PersonCenter/address');?>";
					  $.ajax({
							url:"<?php echo U('PersonCenter/delAddress');?>",
							type:"GET",
							data:{
								 'pid':id 
								  },
								  success:function(responseText){
								  		if(responseText==1){
								  		window.location.href=url;
								  		}else{
								  		window.location.href=url;
								  		}
								  }
								});
							});
</script>
</body></html>