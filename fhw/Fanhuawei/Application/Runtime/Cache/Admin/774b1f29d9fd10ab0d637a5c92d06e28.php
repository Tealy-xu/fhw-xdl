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
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>资讯列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 资讯管理 <span class="c-gray en">&gt;</span> 资讯列表 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20">
	<div class="text-c"> <span class="select-box inline">
		<select name="" class="select">
			<option value="0">全部分类</option>
			<option value="1">分类一</option>
			<option value="2">分类二</option>
		</select>
		</span>
		<input type="text" name="" id="" placeholder=" 资讯名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜资讯</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" data-title="添加资讯" _href="/lamp/Fanhuawei/index.php/Admin/Blogroll/addBlogroll" onclick="Hui_admin_tab(this)"  ><i class="Hui-iconfont">&#xe600;</i> 添加链接</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th width="80">标题</th>
					
					<!-- <th width="80">logo</th> -->
					<th width="80">E-mail</th>
					<th width="80">QQ</th>
					<th width="120">更新时间</th>
					<th width="60">发布状态</th>
					<th width="120">操作</th>
				</tr>
			</thead>
			<tbody>
				<!-- <tr class="text-c">
					<td><input type="checkbox" value="" name=""></td>
					<td>10001</td>
					<td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="article_edit('查看','article-zhang.html','10001')" title="查看">资讯标题</u></td>
					<td>行业动态</td>
					<td>H-ui</td>
					<td>2014-6-11 11:11:42</td>
					<td>21212</td>
					<td class="td-status"><span class="label label-success radius">已发布</span></td>
					<td class="f-14 td-manage"><a style="text-decoration:none" onClick="article_stop(this,'10001')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a> <a style="text-decoration:none" class="ml-5" onClick="article_edit('资讯编辑','article-add.html','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="article_del(this,'10001')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>
				<tr class="text-c">
					<td><input type="checkbox" value="" name=""></td>
					<td>10002</td>
					<td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="article_edit('查看','article-zhang.html','10002')" title="查看">资讯标题</u></td>
					<td>行业动态</td>
					<td>H-ui</td>
					<td>2014-6-11 11:11:42</td>
					<td>21212</td>
					<td class="td-status"><span class="label label-success radius">草稿</span></td>
					<td class="f-14 td-manage"><a style="text-decoration:none" onClick="article_shenhe(this,'10001')" href="javascript:;" title="审核">审核</a> <a style="text-decoration:none" class="ml-5" onClick="article_edit('资讯编辑','article-add.html','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="article_del(this,'10001')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr> -->
				<?php if(is_array($blogrolist)): foreach($blogrolist as $key=>$v): ?><tr class="text-c">
					<td><input type="checkbox" value="" name=""></td>
					<td><?php echo ($v["id"]); ?></td>
					<td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="article_edit('查看','article-zhang.html','10002')" title="查看"><a href="<?php echo ($v["url"]); ?>" ><?php echo ($v["name"]); ?></a></u></td>
					<!-- <td>
						<?php if(empty($v['namepic'])): else: ?> 
							<a href="<?php echo ($v["url"]); ?>" ><img src="/lamp/Fanhuawei/Public/<?php echo ($v["namepic"]); ?>"></a><?php endif; ?> 
						
					</td> -->
					<td><?php echo ($v["email"]); ?></td>
					<td><?php echo ($v["qq"]); ?></td>
					<td><?php echo (date('Y-m-d H:i:s',$v["addtime"])); ?></td>
					<td class="td-status">
						<span class="label label-success radius">
						<?php if($v['state'] == 1): ?>已发布
						<?php else: ?>
						审核<?php endif; ?>
						</span>
					</td>
					<td class="f-14 td-manage">
					<?php if($v['state'] == 1): ?><a style="text-decoration:none" onClick="article_yishenhe(this,'10001',<?php echo ($v["id"]); ?>)" href="javascript:;" title="审核">
						已审核
						</a> 
					<?php else: ?>
						<a style="text-decoration:none" onClick="article_shenhe(this,'10001',<?php echo ($v["id"]); ?>)" href="javascript:;" title="审核">
						审核
						</a><?php endif; ?>
					<a style="text-decoration:none" class="ml-5" onClick="article_edit('资讯编辑','updBlogroll/id/<?php echo ($v["id"]); ?>','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="article_del(this,'10001',<?php echo ($v["id"]); ?>)" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr><?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/lamp/Fanhuawei/Public/js/H-ui.js"></script> 
<script type="text/javascript" src="/lamp/Fanhuawei/Public/js/H-ui.admin.js"></script>
<script type="text/javascript">
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,6]}// 制定列不参与排序
	]
});

/*资讯-添加*/
function article_add(title,url,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*资讯-编辑*/
function article_edit(title,url,id,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*资讯-删除*/
function article_del(obj,id,bid){
	layer.confirm('确认要删除吗？',function(index){
		$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});

		$.get(
	    	'/lamp/Fanhuawei/index.php/Admin/Blogroll/delBlogro', //url
	    	//已发送给服务器的数据
	    	{id: bid},

	    	//回调函数
	    	function( data ){
	    		
	    		 console.log( data );
	    	},
	    	'json'
	    );

	});
}
/*资讯-审核*/
function article_shenhe(obj,id,bid){
	layer.confirm('审核链接？', {
		btn: ['通过','不通过'], 
		shade: false
	},
	function(){
		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" style="text-decoration:none;color:black;" onClick="article_yishenhe(this,10001,'+bid+')"  href="javascript:;" title="申请上线">已审核</a>');

		// console.log(aid);
		$.get(
	    	'/lamp/Fanhuawei/index.php/Admin/Blogroll/updStatus', //url
	    	//已发送给服务器的数据
	    	{id: bid,status:1},

	    	//回调函数
	    	function( data ){
	    		
	    		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
				$(obj).remove();
				layer.msg('已发布', {icon:6,time:1000});
				console.log(data);
	    	},
	    	'json'
	    );
	},
	function(){
		// $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" style="color:black;" onClick="article_shenhe(this,id)"  href="javascript:;" title="申请上线">审核</a>');
		// $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">审核</span>');
		// $(obj).remove();
  //   	layer.msg('审核', {icon:5,time:1000});
	});	
}
/*资讯-已审核*/
function article_yishenhe(obj,id,bid){
	layer.confirm('取消审核链接？', {
		btn: ['是的','取消'], 
		shade: false
	},
	function(){
		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" style="text-decoration:none;color:black;" onClick="article_shenhe(this,10001,'+bid+')"  href="javascript:;" title="申请上线">审核</a>');
		 


		// console.log(bid);
		$.get(
	    	'/lamp/Fanhuawei/index.php/Admin/Blogroll/updStatus', //url
	    	//已发送给服务器的数据
	    	{id: bid,status:0},

	    	//回调函数
	    	function( data ){
	    		
	    		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">审核</span>');
				$(obj).remove();
				layer.msg('审核', {icon:6,time:1000});
				console.log(data);
	    	},
	    	'json'
	    );
	},
	function(){
		// $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" style="color:black;" onClick="article_shenhe(this,id)"  href="javascript:;" title="申请上线">审核</a>');
		// $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">审核</span>');
		// $(obj).remove();
  //   	layer.msg('审核', {icon:5,time:1000});
	});	
}
/*资讯-下架*/
function article_stop(obj,id){
	layer.confirm('确认要下架吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
		$(obj).remove();
		layer.msg('已下架!',{icon: 5,time:1000});
	});
}

/*资讯-发布*/
function article_start(obj,id){
	layer.confirm('确认要发布吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布!',{icon: 6,time:1000});
	});
}
/*资讯-申请上线*/
function article_shenqing(obj,id){
	$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
	$(obj).parents("tr").find(".td-manage").html("");
	layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
}

</script> 
</body>
</html>