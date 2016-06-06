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

<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>新增图片</title>
</head>
<body>
<div class="pd-20">
	<form action="/lamp/Fanhuawei/index.php/Admin/Product/addProduct" method="post" enctype="multipart/form-data" class="form form-horizontal" id="form-article-add">
		<div class="row cl">
			<label class="form-label col-2"><span class="c-red">*</span>商品标题：</label>
			<div class="formControls col-10">
				<input type="text" class="input-text" value="" placeholder="" id="" name="name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-2">简略标题：</label>
			<div class="formControls col-10">
				<input type="text" class="input-text" value="" placeholder="" id="" name="intro">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-2"><span class="c-red">*</span>分类栏目：</label>
			<div class="formControls col-2"> <span class="select-box">
				<select name="cateid" class="select">
					<option value="0">--请选择--</option>
					<?php if(is_array($catelist)): foreach($catelist as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["catename"]); ?></option><?php endforeach; endif; ?>
				</select>
				</span> </div>
			 
			 
		</div>
		<div class="row cl">
			<label class="form-label col-2"><span class="c-red">*</span>状态：</label>
			<div class="formControls col-2"> <span class="select-box">
				<select name="status" class="select">
					<option value="1">已发布</option>
					<option value="0">已下架</option>				 
				</select>
				</span> </div>
			 
			 
		</div>
		<div class="row cl">
			<label class="form-label col-2">商品价格：</label>
			<div class="formControls col-10">
				<input type="text" name="price" id="" placeholder="输入价格" value="" class="input-text" style=" width:25%">元
				  </div>
		</div>
		
		 
		 
		 
		<div class="row cl">
			<label class="form-label col-2">缩略图：</label>
			<div class="formControls col-10">
				 <div class="dropzone"></div>
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-2">商品颜色：</label>
			<div class="formControls col-10">
				<input type="text" name="color[]" id=""   value="" class="input-text" style=" width:25%">
				<input type="text" name="color[]" id=""   value="" class="input-text" style=" width:25%">
				<input type="text" name="color[]" id=""   value="" class="input-text" style=" width:25%">
				<input type="text" name="color[]" id=""   value="" class="input-text" style=" width:25%">
				<input type="text" name="color[]" id=""   value="" class="input-text" style=" width:25%">
				<input type="text" name="color[]" id=""   value="" class="input-text" style=" width:25%">
			</div>
			 
		</div>


		<div class="row cl">
			<label class="form-label col-2">详细内容：</label>
			<div class="formControls col-10"> 
				<script id="editor" type="text/plain" style="width:100%;height:400px;"></script> 
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
                url: "/lamp/Fanhuawei/index.php/Admin/Product/up/",

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
					    	'/lamp/Fanhuawei/index.php/Admin/Product/delImg', //url
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
 
</body>
</html>