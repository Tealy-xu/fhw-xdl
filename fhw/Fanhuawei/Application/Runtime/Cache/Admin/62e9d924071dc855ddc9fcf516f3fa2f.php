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
<link href="/lamp/Fanhuawei/Public/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/lamp/Fanhuawei/Public/js/dropzone.js"></script>
<link rel="stylesheet" type="text/css" href="/lamp/Fanhuawei/Public/css/dropzone.css">
<link href="/lamp/Fanhuawei/Public/lib/lightbox2/2.8.1/css/lightbox.css" rel="stylesheet" type="text/css" >
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>新增图片</title>
</head>
<body>
<div class="pd-20">
	<form action="/lamp/Fanhuawei/index.php/Admin/Blogroll/doUpdBlogroll" method="post" enctype="multipart/form-data" class="form form-horizontal" id="form-article-add">
		<input type="hidden" name="id" value="<?php echo ($binfo["id"]); ?>">
		<div class="row cl">
			<label class="form-label col-2">链接名称：</label>
			<div class="formControls col-10">
				<input type="text" name="name" id="" placeholder="链接名称" value="<?php echo ($binfo["name"]); ?>" class="input-text" style=" width:25%">
				  </div>
		</div>
		<div class="row cl">
			<label class="form-label col-2"><span class="c-red">*</span>链接地址：</label>
			<div class="formControls col-10">
				<input type="text" class="input-text" value="<?php echo ($binfo["url"]); ?>" placeholder="链接地址" id="" name="url">
			</div>
		</div>
		 
		<?php if(!empty($binfo['namepic'])): ?><div class="row cl" style="margin-left:200px;" >
			 
				 <div class="portfolio-content">
					<ul class="cl portfolio-area" id="ulpic" >
						<li class="item">
							<div class="portfoliobox">
								<input class="checkbox" name="" type="checkbox" value="<?php echo ($binfo["id"]); ?>">
								<div class="picbox"><a href="/lamp/Fanhuawei/Public/<?php echo ($binfo["namepic"]); ?>" data-lightbox="gallery" data-title="<?php echo ($binfo["name"]); ?>"><img src="/lamp/Fanhuawei/Public/<?php echo ($binfo["namepic"]); ?>"></a></div>
								<div class="textbox"><?php echo ($binfo["name"]); ?></div>
							</div>
						</li>
						 	 
					</ul>
				</div>
				<br>
				<a href="javascript:;" id="delbth" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 删除</a>
			</div><?php endif; ?>
		
		
		
		 
		 
		 
		<div class="row cl">
			<label class="form-label col-2">缩略图：</label>
			<div class="formControls col-10">
				 <div class="dropzone"></div>
			</div>
		</div>

	
		<div class="row cl">
			<div class="col-10 col-offset-2">
				<button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</button>
				<button onClick="article_save();" class="btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存草稿</button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</div>
</div>
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/Validform/5.3.2/Validform.min.js"></script> 
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/webuploader/0.1.5/webuploader.min.js"></script> 
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/lightbox2/2.8.1/js/lightbox-plus-jquery.min.js"></script> 
<script type="text/javascript" src="/lamp/Fanhuawei/Public/js/H-ui.js"></script> 
<script type="text/javascript" src="/lamp/Fanhuawei/Public/js/H-ui.admin.js"></script> 
<script type="text/javascript">

	// $('.skin-minimal input').iCheck({
	// 	checkboxClass: 'icheckbox-blue',
	// 	radioClass: 'iradio-blue',
	// 	increaseArea: '20%'
	// });
	var urlname = '';
	
	Dropzone.autoDiscover = false;//防止报"Dropzone already attached."的错误
            
             var dropz = new Dropzone(".dropzone", {

                //负责上传的服务器地址
                url: "/lamp/Fanhuawei/index.php/Admin/Blogroll/up/",

                //最大上传数
                maxFiles: 10,
                paramName: "pic",

                //文件的大小
                maxFilesize: 512,

                dictDefaultMessage:'上传图片',

                dictRemoveFile:'delete file',

                //显示删除按钮
                addRemoveLinks:true,

                //允许上传类型
                acceptedFiles: "image/*",

                //监听
                init: function() {

                    //监听到文件添加的时候，
                    this.on("success", function(file,res) {
                        
                    	 $(file).attr('img',res.fileName);
                        //当文件上传成功的时候，将图片放到表单隐藏域

                        // console.log(res.fileName);
                        // console.log(res);
                        
                        //创建隐藏域
                        var input = '<input type="hidden" class="'+file.name+'" name="img[]" value="'+res.fileName+'">';

                         

                        //放到form表单
                        $('#form-article-add').append(input);
                        
                    });

                    //监听删除
                    this.on("removedfile", function(file) {
                        

                        console.log(file);
                        console.log(file.img);
                        
                        $('input[class="'+file.name+'"]').remove();

                        $.get(
					    	'/lamp/Fanhuawei/index.php/Admin/Blogroll/delImg', //url
					    	//已发送给服务器的数据
					    	{url:file.img},

					    	//回调函数
					    	function( data ){
					    	    if(data =='1'){
		                            console.log('成功');
		                        }else{
		                            console.log('失败');
		                        }
					    	},
					    	'text'
					    );
                        
                    });
                }
            });

	



$(function(){
	// var ue = UE.getEditor('container', { autoHeight: false });
	// 	UE.getEditor('editor');
	// 	alert(1); 
	 var ue = UE.getEditor('editor');
});
</script>

<script type="text/javascript">
	function datadel(){
		// alert('aaa');
		var id = [];
		$("input:checked").each(function(i){
			id[i] = $(this).attr('value');
			$(this).parent().parent().remove();
		});

		 if( $('#ulpic').children().length == 0 ){
		 	$('#delbth').remove();
		 }

		// console.log( $('#ulpic').children().length );
		console.log(id);

		$.get(
	    	'/lamp/Fanhuawei/index.php/Admin/Blogroll/delLogoImg', //url
	    	//已发送给服务器的数据
	    	{id:id},

	    	//回调函数
	    	function( data ){
	    		console.log(data);
	    	},
	    	'json'
	    );


}
</script>



</body>
</html>