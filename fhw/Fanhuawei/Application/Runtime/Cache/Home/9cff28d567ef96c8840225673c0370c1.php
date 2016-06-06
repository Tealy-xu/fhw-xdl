<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<link href="/lamp/Fanhuawei/Public/css/ec.core.css" rel="stylesheet" type="text/css">
<link href="/lamp/Fanhuawei/Public/css/mainn.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/lamp/Fanhuawei/Public/css/index.min.css">
<script src="/lamp/Fanhuawei/Public/css/jsapi.js" namespace="ec"></script>
<script src="/lamp/Fanhuawei/Public/Js/ec.core.js"></script> 
<script src="/lamp/Fanhuawei/Public/Js/ec.business.js"></script>
<script type="text/javascript" src="/lamp/Fanhuawei/Public/js/jquery-1.10.2.min.js"></script> 
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/layer/layer/layer.js"></script>
<meta charset="utf-8">
<title>首页</title>
</head>
<body>
 <div class="fr u-4-5"><!--个人中心 -->
<div class="ic-area">
	<div class="ic-detail-area">
		<img src="/lamp/Fanhuawei/Public/<?php echo ($val["avatar"]); ?>" width="100px" height="100px" style="position:absolute;top:1px">
		<div class="h">

			<h3><b>
				<?php echo ($val["username"]); ?>
				</b>
				<em class="vip-state">
					<a href="javascript:void(0)" title="VMALL 会员"><i class="<?php echo ($user_level); ?>">
					</i></a>
				
				</em>
				<b>欢迎您！</b>
			</h3>
			<div class="ic-detail-area">
				<table border="0" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<th>我的积分：</th>
							<td>
								<a href="javascript:void(0);" class="red"><b><?php echo ($val["user_points"]); ?></b></a>
							</td>
							<th>我的余额：</th>
							<td><a href="javascript:void(0);" class="red"><b><?php echo ($val["balance"]); ?></b></a><a href="javascript:;" id="recharge">充值</a>
						</td>
						</tr>
						<tr>
							<th>我的特权：</th>
							<td>
								<div class="ic-user-privilege">
						    			<a href="javascript:void(0);" title="“V”字身份标识：获得与Vmall会员等级对应的“V”身份标识"><img src="/lamp/Fanhuawei/Public/images/icon_privilege_vip_large_light.png" alt="“V”字身份高亮显示"></a>
						    			<a href="javascript:void(0)" title="会员日活动参与权：有权参与专属的会员日活动"><img src="/lamp/Fanhuawei/Public/images/icon_privilege_vipDay_large_gray.png" alt="会员日活动参与权"></a>
									
								</div></td>
						</tr>
					
					</tbody>
				</table>
			</div>
		</div>
		<div class="b">
			<div class="form-detail-area">
				<table border="0" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<th style=" width:100px;">订单中心:</th>
							<td>
								<a href="<?php echo U('OrderCenter/index');?>">处理中的订单（<b><?php echo ((isset($order_handle["order_count"]) && ($order_handle["order_count"] !== ""))?($order_handle["order_count"]):0); ?></b>）</a>
								<a id="member_index_notRemarkCount" href="<?php echo U('OrderCenter/index');?>">待评价的商品（<b id="member-notRemarkCount"><?php echo ((isset($order_handle["comment_goods_count"]) && ($order_handle["comment_goods_count"] !== ""))?($order_handle["comment_goods_count"]):0); ?></b>）</a>
							</td>
						</tr>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="hr-70"></div>
	
</div>
</div>
</body>
</html>
<script>
	$('#recharge').click(function(){
		var balance = <?php echo ($val["balance"]); ?>;
		layer.prompt({
			maxlength: 10,
			shade:0,
	  		title:'想要变得更强吗'
		},function(val){
			$.post(
				'/lamp/Fanhuawei/index.php/Home/Member/recharge',
				{num:val,balance:balance},
				function(status){
					layer.msg('正在py交易中,请等待', {icon: 16});
					setTimeout(function(){
						window.location.reload();
					},2000);
			});
		});
	});
</script>