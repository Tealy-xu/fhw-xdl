<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta http-equiv="Content-Language" content="zh-cn">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>我的订单_个人中心_华为商城</title>
<link rel="shortcut icon" href="/lamp/Fanhuawei/Public/Ico/favicon.ico">
<link href="/lamp/Fanhuawei/Public/css/person/ec.core.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/lamp/Fanhuawei/Public/js/jquery-1.10.2.min.js"></script>
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
                    	<th class="tr-span-9">发件人</th>
                        <th class="tr-span-6">标题</th>
                        <th class="tr-span-7">时间</th>
                        <th class="tr-span-4 operate">状态</th>
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
                        	<td>系统信息</td>
                            <td class="tal" style="text-align:center;">
                            	<input type="hidden" id="eid" value="<?php echo ($vo["id"]); ?>">
                            	<a href="<?php echo U('Email/show');?>?eid=<?php echo ($vo["id"]); ?>&state=<?php echo ($vo["statue"]); ?>" title="<?php echo ($vo["order_no"]); ?>"><?php echo ($vo["title"]); ?></a>
                            	&nbsp;&nbsp;&nbsp;&nbsp;
          
								
                            </td>
                            <td>
                            	<?php echo (date('Y-m-d H:i:s',$vo["pdate"])); ?>
								&nbsp;&nbsp;&nbsp;&nbsp;
                            </td>
                            <td class="tr-span-4" >
								<em>
								    <?php if($vo['statue'] == '0'): ?><img src="/lamp/Fanhuawei/Public/images/weidu.png"><?php endif; ?>
								     <?php if($vo['statue'] == '1'): ?><img src="/lamp/Fanhuawei/Public/images/yidu.png"><?php endif; ?>
								     <a src="javascript:;" onclick="emailDel(<?php echo ($vo["id"]); ?>)"><img src="/lamp/Fanhuawei/Public/images/lajitong.png"></a>
								</em>
							</td>
                        </tr>
                	</tbody>
                </table>  
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
		 
		
		
		
	
        </div>
        
    </div>
<script type="text/javascript">
function emailDel(id){
   		console.log(id);
   		layer.confirm('确定删除吗？',function(){
		 $.ajax({
		url:"<?php echo U('Email/doDel');?>",
		type:"GET",
		data:{
			'id':id,
		},
		success:function(){
		window.location.href="<?php echo U('Email/index');?>";
		layer.msg('已删除!',{icon: 5,time:1000});
		}
		});
	});
   }
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