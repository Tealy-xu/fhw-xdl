<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta http-equiv="Content-Language" content="zh-cn">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>我的订单_个人中心_华为商城</title>
<link rel="shortcut icon" href="/lamp/Fanhuawei/Public/Ico/favicon.ico">
<link href="/lamp/Fanhuawei/Public/css/person/ec.core.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/lamp/Fanhuawei/Public/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/layer/2.1/layer.js"></script>
<link href="/lamp/Fanhuawei/Public/css/person/main.css" rel="stylesheet" type="text/css">


<style>
#list-pager .current{
	border:1px solid #ccc;
	display:inline-block;
	width:7px;
	height:16px;
	font-weight:400;
	text-align:center;
	line-height:16px;
    font-size:12px;
	padding:0 5px;
	background:#D2D2D2;
	margin-left:5px;
	margin-right:5px;
}
#list-pager .num{
    border:1px solid #ccc;
	display:inline-block;
	width:7px;
	height:16px;
	font-weight:400;
	text-align:center;
	line-height:16px;
    font-size:12px;
	padding:0 5px;
	
	margin-left:5px;
	margin-right:5px;

}
#list-pager .prev{
    border:1px solid #ccc;
	display:inline-block;
	width:7px;
	height:16px;
	font-weight:400;
	text-align:center;
	line-height:16px;
    font-size:9px;
	padding-left:3px;
	padding-right:5px;
	
	margin-left:5px;
	margin-right:5px;
}

#list-pager .next{
    border:1px solid #ccc;
	display:inline-block;
	width:7px;
	height:16px;
	text-align:center;
	line-height:16px;
    font-size:9px;
	padding-left:3px;
	padding-right:5px;
	
	margin-left:5px;
	margin-right:5px;


}
</style>
</head>



<body>









<div class="g">
    <div class="fl u-4-5"><!--栏目 -->
<div class="part-area clearfix">
    <div class="fl">
        <h3 class="myOrders-title"><span>我的订单</span></h3>        
   	 </div>
    </div>

<div class="hr-3"></div>
<!--我的订单 -->
<div class="myOrders-area">
	<div class="myOrders-title-area">
        <div class="h clearfix">
            <div class="fl">
                <div class="h-tab">
                    <ul>
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="b">
            <table border="0" cellpadding="0" cellspacing="0" id="order-list-head">
                <thead>
                    <tr>
                        <th>订单号</th>
                        <th>送货地址</th>
                        <th class="tr-span-4">实付款<em>/元</em></th>
                        <th class="tr-span-4 operate">订单状态及操作</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="hr-2"></div>
    <!-------------------以上为订单头部---------------------------------->
    <div id="myOrders-list-content">
        <div class="myOrders-list">
    
    	
    	
    
    	
    	<!--我的订单-订单-套餐 -->
	 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="myOrders-pro-area">
        	<div class="h clearfix">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td class="tal">
                            	<input type="hidden" id="order_id" value="<?php echo ($vo["id"]); ?>">
                            	订单编号：<a href="<?php echo U('OrderCenter/show');?>?oid=<?php echo ($vo["id"]); ?>&state=<?php echo ($vo["state"]); ?>" title="<?php echo ($vo["order_no"]); ?>" onclick="orderdetail_show(<?php echo ($vo["id"]); ?>)"><?php echo ($vo["ordernum"]); ?></a>
                            	&nbsp;&nbsp;&nbsp;&nbsp;
          
								
                            </td>
                            <td>
                            	生成时间：<?php echo (date('Y-m-d H:i:s',$vo["addtime"])); ?>
								&nbsp;&nbsp;&nbsp;&nbsp;
                            </td>
                            <td class="tr-span-4">
								<em>
								    <?php if($vo['state'] == '0'): ?>未付款<?php endif; ?>
								     <?php if($vo['state'] == '1'): ?>已付款<?php endif; ?>
								      <?php if($vo['state'] == '2'): ?>正在发货中<?php endif; ?>
								      <?php if($vo['state'] == '3'): ?>等待卖家确认交易<?php endif; ?>
								       <?php if($vo['state'] == '4'): ?>交易完成<?php endif; ?>
								</em>
							</td>
                        </tr>
                	</tbody>
                </table>  
            </div>
            <div class="b">
            	<table border="0" cellpadding="0" cellspacing="0">
                    <tbody>

						
						
                        <!-- 组合套餐列表 -->

						<!-- 普通商品列表 -->
					
                         <tr>
                         <td><img src="/lamp/Fanhuawei/Public/Images/Orderboli.png"></td>
                            <!-- <td class="tal">
                                <div class="pro-area clearfix">
                                    <p class="p-img">
                                    	<a title="<?php echo ($vo["goods"]["name"]); ?>" href="<?php echo U('Product/index',array('g'=>$vo['goods']['id']));?>" target="_blank">
                                    	<img alt="<?php echo ($vo['goods']['name']); ?>" src="/lamp/Fanhuawei/Public<?php echo ($vo["goods"]["image1"]); ?>">
                                        
                                    	</a>
                                    </p>
                                    <p class="p-name">
                                    	<a title="<?php echo ($vo["goods"]["name"]); ?>" target="_blank" href="<?php echo U('Product/index',array('g'=>$vo['goods']['id']));?>"><?php echo ($vo["goods"]["name"]); ?></a>
                                    </p>
                                    
                                </div>
                            </td> -->

                            <td class="tr-span-12"><?php echo ($vo["areadetail"]); ?></td>                       


								<td rowspan="2" class="tr-span-4">
									<p>¥<?php echo ($vo["totalprice"]); ?></p>
								</td>
                            
							
								<td rowspan="2" class="tr-span-4 operate">
									  <?php if($vo['state'] == '0'): ?><a class="pay" href="javascript:;">去付款</a>
								   <input type="hidden" name="oid" value="<?php echo ($vo['id']); ?>">
								   <script>
								   		$('.pay').click(function(){
								   			var oid = $('input[name=oid]').prop('value');
								   			layer.confirm('确定要付款吗',{
												time:0,
												btn: ['确定', '取消'],
												shadeClose: true,
												yes: function(index){
													$.post(
														"/lamp/Fanhuawei/index.php/Home/OrderCenter/payment",
														{'oid':oid},
														function(status){
															if(status == 1){
																layer.close(index);
																layer.msg('支付成功', {icon: 6});
																setTimeout(function(){
																	window.location.reload();
																},1500);
															}else{
																layer.alert('余额不足，请尽快充值');
															}
														}
													);
												}
											});
								   		});
								   </script>
								        <?php elseif($vo['state'] == '1'): ?>
										    等待发货
										<?php elseif($vo['state'] == '2'): ?>
										
										   <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>
									       <a href="javascript:void(0);" class="recOreder">确认收货</a>
										<?php elseif($vo['state'] == '3'): ?>
											已签收
										<?php elseif($vo['state'] == '4'): ?>
										   <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>
										    <a href="<?php echo U('Comment/index');?>" >去评价</a><?php endif; ?>
										
								</td>
							
							

                        </tr>
                       
                        
                        
                        
                        
					   <!-- 普通商品列表 end -->
                    </tbody>
                </table>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
		 
		
		
		
	
        </div>
        
    </div>
<script type="text/javascript">
   $(function(){
         //收货的ajax处理
        $(".recOreder").click(function(){
		    var order_id=$(this).prev('input').val();
		    console.log(order_id);
			var value=confirm("你确定要收货吗?");
			
			if(value){
			     $.ajax({
				     url:"<?php echo U('OrderCenter/receOrder');?>",
					 type:'post',
					 data:{
					     'oid':order_id,
					 },
					 success:function(responseText,status,xhr){
						      if(responseText==1){
							     window.location.reload();
								 alert("收货成功!");
							  }else{
							     alert("收货失败");						  
					 }
					}
		});
   }
});
});
//显示订单详情
// function orderdetail_show(id){
// 	layer.open({
// 		type:2,
// 		title:false,
// 		area:['790px', '380px'],
// 		maxmin: true,
// 		scrollbar: false,
// 		moveOut: true,
// 		content:"<?php echo U('OrderCenter/show',array('oid'=>id));?>",
// 		success:function(id){
// 	}
// })
// }

</script>
    <div class="hr-5"></div>
    <!--分页-->
    <div class="pager" id="list-pager">
	   <ul>
	       <?php echo ($show); ?>
		</ul>
	 </div>
    
</div>
<input type="hidden" id="colid" value="0">




</div>
	
</div>
<div class="hr-60"></div>
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/lamp/Fanhuawei/Public/js/jquery-1.10.2.min.js"></script>
</body></html>