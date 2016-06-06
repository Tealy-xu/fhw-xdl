<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Language" content="zh-cn">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>商品评价_个人中心_华为商城</title>
<link rel="shortcut icon" href="/lamp/Fanhuawei/Public/Ico/favicon.ico">
<link href="/lamp/Fanhuawei/Public/Css/person/ec.css" rel="stylesheet" type="text/css">

<link href="/lamp/Fanhuawei/Public/Css/person/main.css" rel="stylesheet" type="text/css">
<style type="text/css">
#commodity-list-head .current{
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
#commodity-list-head .num{
    border:1px solid #ccc;
	display:inline-block;
	width:7px;
	height:16px;
	font-weight:400;
	text-align:center;
	line-height:16px;
    font-size:12px;
	padding:0 5px;
	background-color: #FFFFFF;
	margin-left:5px;
	margin-right:5px;

}
#commodity-list-head .prev{
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

#commodity-list-head .next{
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



<script src="/lamp/Fanhuawei/Public/Js/base.js"></script>



<div class="hr-10"></div>
<div class="g">
	<!--面包屑 -->
	<div class="breadcrumb-area icon-breadcrumb fcn">您现在的位置：
		<a href="<?php echo U('Index/index');?>" title="首页">首页</a>&nbsp;&gt;&nbsp;
		<span id="personCenter"><a href="<?php echo U('Member/index');?>" title="个人中心">个人中心</a></span>
		<span id="pathPoint">&nbsp;&gt;&nbsp;</span>
		<b id="pathTitle">商品评价</b>
	</div>
</div>
<div class="hr-15"></div>

<div class="g">
    <div class="fl u-4-5"><!--栏目 -->
<div class="part-area clearfix">
    <div class="fl">
        <h3 class="ce-title"><span>商品评价</span></h3>
    </div>
</div>
<div class="hr-2"></div>
<!--商品评价 -->
<div class="ce-list">
	<div class="myOrders-title-area">
        <div class="h clearfix">
            <div class="fl">
                <div class="h-tab">
                   
                </div>
            </div>
        </div>
        <div class="b">
            <table id="commodity-list-head" border="0" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th class="tr-span-2">编号</th>
                        <th class="tr-span-5">商品名称</th>
                        <th class="tr-span-3">数量</th>
                        <th class="tr-span-5">评价</th>
                        <th class="tr-span-2">评价分数</th>
                    </tr>
                </thead>
				   <?php if(is_array($commentlist)): $i = 0; $__LIST__ = $commentlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr style="border: 1px solid black;" >
                        <th style="border: 1px solid black;" class="tr-span-2"><?php echo ($v["id"]); ?></th>
                        <th style="border: 1px solid black;" class="tr-span-5"><?php echo ($v["goodsname"]); ?>&nbsp;<?php echo ($v["style"]); ?></th>
                        <th style="border: 1px solid black;" class="tr-span-3"><?php echo ($v["num"]); ?></th>
                        <th style="border: 1px solid black;" >
						   <!-- <a href="/lamp/Fanhuawei/index.php/Home/Comment/addComment/odid/<?php echo ($v["oid"]); ?>/num/<?php echo ($v["num"]); ?>/gid/<?php echo ($v["gid"]); ?>/subtotal/<?php echo ($v["subtotal"]); ?>/style/<?php echo ($v["style"]); ?>" >评论</a> -->
		
						   <!-- <?php if($v['status'] == 1): ?><a href="/lamp/Fanhuawei/index.php/Home/Comment/addComment/odid/<?php echo ($v["id"]); ?>/num/<?php echo ($v["num"]); ?>/gid/<?php echo ($v["gid"]); ?>/subtotal/<?php echo ($v["subtotal"]); ?>/style/<?php echo ($v["style"]); ?>/odid/<?php echo ($v["id"]); ?>" >评论</a>
						   	<?php else: ?>
						   		
						   	<a href="/lamp/Fanhuawei/index.php/Home/Comment/addBackComment/odid/<?php echo ($v["id"]); ?>/num/<?php echo ($v["num"]); ?>/gid/<?php echo ($v["gid"]); ?>/subtotal/<?php echo ($v["subtotal"]); ?>/style/<?php echo ($v["style"]); ?>/odid/<?php echo ($v["id"]); ?>" >追加评论</a><?php endif; ?> -->
						   <?php switch($v["status"]): case "1": ?><a href="/lamp/Fanhuawei/index.php/Home/Comment/addComment/odid/<?php echo ($v["id"]); ?>/num/<?php echo ($v["num"]); ?>/gid/<?php echo ($v["gid"]); ?>/subtotal/<?php echo ($v["subtotal"]); ?>/style/<?php echo ($v["style"]); ?>/odid/<?php echo ($v["id"]); ?>" >评论</a><?php break;?>
					        <?php case "2": ?><a href="/lamp/Fanhuawei/index.php/Home/Comment/addBackComment/odid/<?php echo ($v["id"]); ?>/num/<?php echo ($v["num"]); ?>/gid/<?php echo ($v["gid"]); ?>/subtotal/<?php echo ($v["subtotal"]); ?>/style/<?php echo ($v["style"]); ?>/odid/<?php echo ($v["id"]); ?>" >追加评论</a><?php break;?>
					        <?php case "3": ?>已评论<?php break; endswitch;?>
						    
                        </th>
                        <th style="border: 1px solid black;" class="tr-span-2">
						  <?php switch($v["grade"]): case "1": ?>很差<?php break;?>
					        <?php case "2": ?>良好<?php break;?>
					        <?php case "3": ?>一般<?php break;?>
					        <?php case "4": ?>满意<?php break;?>
					        <?php case "5": ?>非常满意<?php break;?>
					        <?php default: ?>未评论<?php endswitch;?>
							 
                        </th>
                         
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
					<tr align="right">
					
					
					 <th colspan='4'><?php echo ($page); ?></th>
                 </tr>
            </table>
        </div>
    </div>

        
	 

	<!--空数据-商品评价 -->
	<div style="display: block;" id="commodity-list-empty" class="ce-empty-area"></div>
	
	
</div>
<div class="hr-25"></div>
<!--分页 -->
<!-- <div class="pager" id="list-pager"></div>
<input id="colid" value="0" type="hidden"> -->





</div>
	
</div>
<!-- <div class="hr-60"></div> -->





</div>
	
</div>
<!-- <div class="hr-60"></div> -->

<!--口号-20121025 -->
 
</body></html>