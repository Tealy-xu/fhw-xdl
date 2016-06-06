<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <meta http-equiv="Content-Language" content="zh-cn">
    <title>华为商城</title>
    <meta name="description" content="网页描述">
    <meta name="keywords" content="关键字">

    <link rel="stylesheet" type="text/css" href="/fhw/Fanhuawei/Public/css/index.min.css">
    <link rel="stylesheet" type="text/css" href="/fhw/Fanhuawei/Public/css/header.css">
    <link href="/fhw/Fanhuawei/Public/css/common.css" type="text/css" rel="Stylesheet" />
    <link href="/fhw/Fanhuawei/Public/css/detail.css" type="text/css" rel="Stylesheet" />
    <link href="/fhw/Fanhuawei/Public/css/product_right.css" type="text/css" rel="Stylesheet" />
    <script src="/fhw/Fanhuawei/Public/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="/fhw/Fanhuawei/Public/js/core.js"></script>
    <script src="/fhw/Fanhuawei/Public/js/jd_detail.js"></script>
</head>
<body>
    <div class="shortcut">
    <div class="layout">
    <div class="s-sub">
      <ul>
        <li class="s-hw"><a href="" target="_blank">繁花唯</a></li>
        <li class="s-honor"><a href="" target="_blank">荣耀官网</a></li>
        <li class="s-appsoft">
          <div class="s-dropdown">
            <div class="h">
              <a href="" target="_blank">软件应用</a>
              <s></s>
            </div>
            <div class="b">
              <p><a href="" target="_blank">EMUI</a></p>
              <p><a href="" target="_blank">应用市场</a></p>
              <p><a href="" target="_blank">云服务</a></p>
              <p><a href="" target="_blank">开发者联盟</a></p>
            </div>
          </div>  
          
        </li><li class="s-club"><a href="" target="_blank">花粉俱乐部</a></li>
        <li class="s-sr"><a href="javascript:;">Select Region</a></li>
      </ul>
    </div>
    <div class="s-main">
      <ul>
        <li class="s-login " id="unlogin_status">
            <a href="<?php echo U('login/index');?>" rel="nofollow">登录</a>
            &nbsp;&nbsp;&nbsp;<a href="<?php echo U('Register/index');?>" rel="nofollow">注册</a>
        </li>
        <li class="s-user hide" id="login_status">
          <div class="s-dropdown">
            <div class="h">
              <a href="<?php echo U('member/index');?>" id="customer_name" rel="nofollow" timetype="timestamp" class="link-user"></a><b>&nbsp;&nbsp;V1</b>
            </div>
            <div class="b">
              <p><a href="<?php echo U('member/index');?>" id="user-center">我的华为帐号</a> | <a href="<?php echo U('login/logout');?>">退出</a></p>
            </div>
          </div>
        </li>
        <li class="s-myOrders">
          <a href="" rel="nofollow" timetype="timestamp">我的订单</a>
        </li>
        <li class="s-promo"><a href="">V码(优购码)</a></li>
        <li class="s-mobile"><a href="" target="_blank">手机版</a></li>
        <li class="s-sitemap">
          <div class="s-dropdown ">
            <div class="h">
              <a href="javascript:;">网站导航</a>
              <s></s>
            </div>
            <div class="b">
              <p><a href="">帮助中心</a></p>
              <p><a href="" target="_blank">PC软件</a></p>
              <p><a href="" target="_blank">数字音乐</a></p>
              <p><a href="" target="_blank">爱旅</a></p>
              <p><a href="" target="_blank">华为网盘</a></p>
            </div>
          </div>
        </li>
      </ul>
    </div>
    </div>
</div>

<script src="/fhw/Fanhuawei/Public/js/base.min.js"></script>


<header class="header">
  <div class="layout">
    <!-- 21030909-logo-huawei-start -->
    <div class="logo"><a href="" title="Vmall.com - 华为商城"><img src="/fhw/Fanhuawei/Public/images/logo.png" alt="Vmall.com - 华为商城"></a></div><!-- 21030909-logo-start -->
    <!-- 20130909-搜索条-焦点为search-form增加className:hover -start -->
    <div class="searchBar">
      <!-- 页头热门搜索 -->
      <div class="searchBar-form" id="searchBar-area">
        <form method="get" action="<?php echo U('search/search');?>">
          <input type="text" name="keyword" placeholder="全部商品" class="text" maxlength="100" id="search-kw" autocomplete="off" style="z-index: 1;"><input type="submit" class="button" value="搜索">
          <input type="hidden" id="default-search" value="Mate 8">
        </form>
      </div>
      
        <div class="searchBar-key">
  <b>热门搜索：</b>
    <a href="<?php echo U('search/search');?>?keyword=HUAWEI P9">HUAWEI P9</a>
    <a href="<?php echo U('search/search');?>?keyword=Mate 8">Mate 8</a>
    <a href="<?php echo U('search/search');?>?keyword=畅享 5S">畅享 5S</a>
    <a href="<?php echo U('search/search');?>?keyword=HUAWEI WATCH">HUAWEI WATCH</a>
</div>
    </div><!-- 20130909-搜索条-end -->
    <!-- 21030910-头部-工具栏-start -->
    <div class="header-toolbar">
      <!-- 21030910-头部-工具栏-焦点为header-toolbar-item增加ClassName:hover -->
      <div class="header-toolbar-item" id="header-toolbar-imall">
        <!-- 21030909-我的商城-start -->
        <div class="i-mall">
          <div class="h"><a href="" rel="nofollow" timetype="timestamp">我的商城</a>
          <i></i><s></s><u></u></div>
          <div class="b" id="header-toolbar-imall-content">
            <div class="i-mall-prompt" id="cart_unlogin_info">
              <p class="" id="nologin">你好，请&nbsp;&nbsp;<a href="<?php echo U('login/index');?>" rel="nofollow">登录</a> | <a href="<?php echo U('Register/index');?>" rel="nofollow">注册</a></p>
              <p class="hide" id="logined">欢迎回来 , <a href="<?php echo U('member/index');?>"></a></p>
            </div>
            <div class="i-mall-uc " id="cart_login_info">
              <ul>
                <li><a href="" rel="nofollow" timetype="timestamp">我的订单</a></li>
                <li><a href="" timetype="timestamp">待支付</a><span id="toolbar-orderWaitingHandleCount" class="hide">0</span></li>
                <li><a href="" timetype="timestamp">待评论</a><span id="toolbar-notRemarkCount" class="hide">0</span></li>
                <li><a href="" timetype="timestamp">优惠券</a><span id="toolbar-couponCount" class="hide">0</span></li>
                <li><a href="" timetype="timestamp">站内信</a><span id="toolbar-newMsgCount" class="hide">0</span></li>
              </ul>
            </div>
            <!-- 页头会员专享信息 -->
            <div class="i-mall-event ">
              <p><a href=""><img src="/fhw/Fanhuawei/Public/images/20160127095348354.jpg" alt="特权频道"></a></p>
            </div>
          </div>
        </div><!-- 21030909-我的商城-end -->
      </div>
      <div class="header-toolbar-item" id="header-toolbar-minicart">
        <!-- 21030909-迷你购物车-start -->
        <div class="minicart">
          <div class="h" id="header-toolbar-minicart-h"><a href="<?php echo U('shopcart/shopcart');?>" rel="nofollow" timetype="timestamp">我的购物车</a><i></i><s></s><u></u></div>
          <div class="b" id="header-toolbar-minicart-content">
            <div class="minicart-pro-empty" id="minicart-pro-empty">
              <span class="icon-minicart">您的购物车是空的，赶紧选购吧！</span>
            </div>
            <div id="smallsc">

            </div>
          </div>
        </div><!-- 21030909-迷你购物车-end -->
      </div>
      
    </div><!-- 21030910-头部-工具栏-start -->
    <!-- 20140910-头部-二维码-start -->
    <div class="header-qrcode">
      <div class="ec-slider" id="ec-erweima" style="width: 91px; height: 96px;">
        <ul class="ec-slider-list" style="width: 91px; height: 96px;">
          <li class="ec-slider-item" style="width: 91px; height: 96px; position: absolute;">
            <p><a href="" target="blank" title="扫码下载客户端"><img src="/fhw/Fanhuawei/Public/images/qrcode_vmall_app01.png" alt="华为商城官方客户端"></a></p>
            <p><a href="" target="blank"><span>扫码下载客户端</span></a></p>
          </li>
          <li class="ec-slider-item" style="width: 91px; height: 96px; display: none; position: absolute;">
            <p><a href="" target="blank" title="微信扫码关注我们"><img src="/fhw/Fanhuawei/Public/images/qrcode_vmall_wechat01.jpg" alt="华为商城官方微信"></a></p>
            <p><a href="" target="blank"><span>微信扫码关注我们</span></a></p>
          </li>
        </ul>
      <div class="ec-slider-nav"><span class="current"></span><span></span></div><a class="button-slider-prev" href="javascript:;" style="display: none;"></a><a class="button-slider-next" href="javascript:;" style="display: none;"></a></div>
    </div><!-- 20140910-头部-二维码-end -->
  </div>      
</header><!-- 21030909-头部-end -->

<div class="naver-main">
  <div class="layout">
    <!-- 20140823-分类-start -->
    <div class="category" id="category-block">
      <!-- 20140822-分类-start -->
  <div class="h">
    <h2>全部商品</h2>
    <i class="icon-category"></i>
  </div>
  <div class="b">
    <ol class="category-list">

    </ol>
  </div>
</div>
<!-- 20140822-分类-end -->
    <!-- 20140823-分类-end -->
    <!-- 20130909-导航-start -->
    <nav class="naver">
      <ul id="naver-list">

      </ul>
    </nav><!-- 20130909-导航-end -->
    </div>
  </div>
  <div id="emailtit" style="top: 140%; left: 142%; z-index: 500; position: fixed;background-image:url(/fhw/Fanhuawei/Public/images/biaoti.png);background-size:100%;width:300px;height:150px;">
    <div style="margin-top:95px;margin-left:78px;"><input type="text" maxlength="12" id="etv"><button id="dotitle">GO</button><button id="outtitle">X</button></div>
  </div>

  <div id="emailbor" style="top: 120%; left: 120%; z-index: 500; position: fixed;width:800px;height:350px;background-image:url(/fhw/Fanhuawei/Public/images/showemail.png);background-size:100%;">
    
    <textarea name="email" cols="72" rows="11" style="margin-top:115px;margin-left:155px;"></textarea>
    <button id="emailbtn">寄出</button><button id="emailout">X</button>
  </div>
<div style="top: 68%; left: 95%; z-index: 500; position: fixed;">
  <span style='color:pink;'>有什么不懂的吗？来点我吧</span>
  <a id="emaildoing" href="javascript:;"><img  src="/fhw/Fanhuawei/Public/images/email.png"></a>
</div>
<script>
// 这个script放着滑稽提交给后台问题的ajax
  $('#emaildoing').click(function(){
    $('#emailtit').css('top','40%');
    $('#emailtit').css('left','42%');
  })

  $('#dotitle').click(function(){
    var etv = $('#etv').val();
    if(etv){
      $('#emailbor').css('top','30%');
      $('#emailbor').css('left','30%');
      $('#emailtit').css('top','120%');
      $('#emailtit').css('left','120%');
    }else{
      alert('请输入标题！(- -!)');
    }
    
  })

  $('#emailbtn').click(function(){
    var etv = $('#etv').val();
    var email = $('textarea').val();
    if(email){
      $.ajax({
      url:"<?php echo U('Email/sandEmail');?>",  
        type:'POST',
        data:{
          'email':email,
          'title':etv
        },
        success:function(responseText){
          if(responseText == 1)
            alert('发送成功！您的问题我们会用最快的时间解决的。');
          $('#emailbor').css('top','120%');
          $('#emailbor').css('left','120%');
          if(responseText == 2)
            alert('发送失败！亲你是不是没有登录，如果没登录请登录。')
        }
        })
    }else{
      alert('请输入你要提的问题！！(0,0)');
    }
  })

  $('#emailout').click(function(){
    $('#emailbor').css('top','120%');
    $('#emailbor').css('left','120%');
  })

  $('#outtitle').click(function(){
    $('#emailtit').css('top','120%');
    $('#emailtit').css('left','120%');
  })


</script>

<script type="text/javascript">
// 这个script放着小型购物车的ajax
  $.ajax({
    'url':"<?php echo U('public/smallSC');?>",
    'type':'GET',
    'success':function(responseText,status,xhr){
      if(status == 'success'){
          if(responseText.length > 500){
            $('#minicart-pro-empty').addClass('hide');
            $("#smallsc").html(responseText);     
          }else{
            $('#smallsc').addClass('hide');
          }
      }else{
          window.location.reload();
      }
    }
  });
</script>

<script>
  $(function () {
    $('#naver-list li').hover(function () {
      $(this).addClass('hover');
    },function () {
      $(this).removeClass('hover');
    });
  });
</script>
<script>
(function () {
  //所有分类显示隐藏控制
  var isIndex =  false,
    categoryBlock = gid('category-block');

  if(isIndex) return;
  
  $("#category-block").hover(function(){
    $(this).addClass("category-hover");
  },function(){
    $(this).removeClass("category-hover");
  });
}());
</script>

<script type="text/javascript">
// 这个script放着侧边栏导航的ajax遍历
      $.ajax({
        'url':"<?php echo U('public/header');?>",
        'type':'GET',
        'success':function(responseText,status,xhr){
           if(status == 'success'){
             $(".category-list").html(responseText);
         }else{
             window.location.reload();
        }
      }
    });
</script>

<script type="text/javascript">
// 这个script放着头部导航栏的ajax遍历
      $.ajax({
        'url':"<?php echo U('public/naver');?>",
        'type':'GET',
        'success':function(responseText,status,xhr){
           if(status == 'success'){
             $("#naver-list").html(responseText);
         }else{
             window.location.reload();
        }
      }
    });
</script>

<script>
// 这个script放着登陆判断的ajax
  $(function(){
    $.ajax({
      url:'<?php echo U("public/login");?>',
      type:'GET',
      dataType:'json',
      success:function(responseText,status,xhr){
        if(status == "success"){
          if(responseText.statu == 1){
              $("#login_status").removeClass('hide');
              $("#logined").removeClass('hide');
              $("#login_status #customer_name").html(responseText.username);
              $("#logined").find('a').html(responseText.username);
              $("#unlogin_status").addClass('hide');
              $("#nologin").addClass('hide');
            }else{
                $("#login_status").addClass('hide');
                $("#logined").addClass('hide');
                $("#unlogin_status").removeClass('hide');
                $("#nologin").removeClass('hide');
            }
          }else{
              $("#login_status").addClass('hide');
              $("#logined").addClass('hide');
              $("#unlogin_status").removeClass('hide');
              $("#nologin").removeClass('hide');
          }
        }
        });
      });
</script>
<script type="text/javascript" src="/fhw/Fanhuawei/Public/lib/layer/2.1/layer.js"></script>
       
      <div class="hr20"></div>
       
      
	<!-- start -->
	 <!--主体内容! -->
        <section id="main" class="clear">
            <!--产品的类别导航路径-->
            <div class="bread-crumb">
                <a href="#"><b>首页</b></a>
                <!-- <a href="#">清洁用品</a>
                <span>&gt;</span>
                <a href="#">衣物清洁</a>
                <span>&gt;</span>
                <a href="#">卫新</a> -->
                <?php if(is_array($breaklist)): foreach($breaklist as $key=>$v): ?><span>&gt;</span>
                <a href="#"><?php echo ($v); ?></a><?php endforeach; endif; ?>
                <span>&gt;</span>
                <a href="#"><?php echo ($info["name"]); ?></a>
            </div>

            <!--产品简介-->
            <div id="product_intro">
                <div id="preview">
                    <div id="mediumDiv">
                        <img id="mImg" src="/fhw/Fanhuawei/Public/<?php echo ($info["image1"]); ?>"/>
                        <div id="mask"></div>
                        <div id="superMask"></div>
                    </div>
                    <div id="largeDiv"></div>
                    <h1>
                        <a class="backward_disabled"></a>
                        <a class="forward"></a>
                        <ul id="icon_list">
                        		<?php if(is_array($imglist)): foreach($imglist as $key=>$v): ?><li><img src="/fhw/Fanhuawei/Public/<?php echo ($v["img"]); ?>" /><?php echo ($v["val"]); ?></li><?php endforeach; endif; ?>
                                 
                        </ul>
                    </h1>
                </div>
                <h1><span id="goodsname" index="<?php echo ($info["id"]); ?>" ><?php echo ($info["name"]); ?></span><b><?php echo ($info["intro"]); ?></b></h1>
                <ul id="summary">
                    <li id="summary_price">
                        <p>华&nbsp;为&nbsp;价：</p>
                        <div class="content">
                            ￥<b><?php echo ($info["price"]); ?>.00</b>
                            <a href="#">(降价通知)</a>
                        </div>                        
                    </li>
                    <li id="summary_market">
                        <p class="title">商品编号：</p>
                        <div class="content">
                            <span>FHW<?php echo ($info["addtime"]); ?></span>
                        </div>
                    </li>
                    <li id="summary_grade">
                        <p>商品库存：</p>
                        <div class="content">
                            <span id="stock" ><?php echo ($info["stock"]); ?></span>件
                            <a href="#">(已有<b>47662</b>人评价)</a>
                        </div>
                    </li>
                     
                    <li id="summary_service">
                        <p>服&nbsp;&nbsp;务：</p>
                        <div class="content">
                            由<span>华为</span>商城负责发货，并提供售后服务
                        </div>
                    </li>
                </ul>
                <ul id="choose">
                    <li id="choose_color">
                        <p>选择样式：</p>
                        <div class="content" id="content">
                        	<?php if(is_array($imgcolor)): foreach($imgcolor as $key=>$v): ?><a href="#" >
                                <img src="/fhw/Fanhuawei/Public/<?php echo ($v["img"]); ?>" style="width:30; height:40px;" index="<?php echo ($v["value"]); ?>" />
                                
                            </a><?php endforeach; endif; ?>
                            <script type="text/javascript">
                            $('#content a').first().addClass('selected');
                            	$('.content a').click(function() {
                            		// alert($(this).index());
                            		$(this).addClass('selected').siblings().removeClass('selected');

                            		return false;
                            	})
                            </script>
                            <!-- <a href="#" class="selected" >
                                <img src="/fhw/Fanhuawei/Public/jd/products/p_icon_02.jpg" />
                                <span>索菲亚玫瑰</span>
                                <b></b>
                            </a> -->
                        </div>
                    </li>
                    <li id="choose_amount">
                        <p>购买数量：</p>
                        <div class="content">
                            <a href="javascript:;" onclick="ac_num('jian');" style="display:block; width:20px; height:20px; float:left; border:1px solid #CCCCCC; text-align:center; text-decoration:none;" >-</a>

                            <input id="ac_num" type="text" value="1" />
                            
                           <a href="javascript:;" onclick="ac_num('jia');" style="display:block; width:20px; height:20px;  float:left; border:1px solid #CCCCCC; text-align:center; text-decoration:none;" >+</a>
                        </div>
                        <script type="text/javascript">
            						    function ac_num(ac){
            						    var v= document.getElementById('ac_num');
            						    var val= v.value;
            						    switch(ac){
            						        case 'jian':
            						        //alert(v.innerHTML);
            						        v.value=parseInt(val) - 1;
            						        if(v.value<=0){
            						        	v.value=1;
            						        }
            						        break;
            						        case 'jia':
            						        v.value = parseInt(val)+1;
            						        break;
            						        }
            						    }
                            $('#ac_num').blur(function(){
                                var value = $(this).val();
                                //库存
                                var kucun = $('#stock').text();  
                                if(value <= 0){
                                    // console.log(value);
                                    $(this).val(1);
                                }

                                console.log(kucun);
                                console.log(value);
                                value = parseInt(value);
                                if( value > kucun ){
                                    // console.log('aaa');
                                    $(this).val(kucun);
                                }
                            });
            			</script>
                    </li>
                    <?php if($info['stock'] != 0): ?><li id="choose_btns" class="clear">
                         <a href="#" style="display:block; width:120px; height:40px; float:left; border:1px solid #CCCCCC; text-align:center; text-decoration:none; position:absolute; left:400px; color:#FFFFFF; background:#E2373A; " >加入购物车</a>
                    </li>
                    <?php else: ?>
                     <li id="choose_btns" class="clear">
                         <span href="#" style="display:block; width:120px; height:40px; float:left; border:1px solid #CCCCCC; text-align:center; text-decoration:none; position:absolute; left:400px; color:#000000; background:#C1C1C1; line-height:40px; margin-top:20px;" >售完</span>
                    </li><?php endif; ?>
                    
                    
                </ul>
            </div>

            <!--左侧浮动栏-->
            <div id="left_product">
                <!--相关分类-->
                <div id="related_sorts">
                    <p>相关分类</p>
                    <ul class="m_content">
                        <?php if(is_array($catenames)): foreach($catenames as $key=>$v): ?><li><a href="#"><?php echo ($v["catename"]); ?></a></li><?php endforeach; endif; ?>
                        <!-- <li><a href="#">衣物清洁</a></li>
                        <li><a href="#">清洁工具</a></li>
                        <li><a href="#">驱虫用品</a></li>
                        <li><a href="#">家庭清洁</a></li>
                        <li><a href="#">皮具护理</a></li>
                        <li><a href="#">一次性用品</a></li> -->
                    </ul>
                </div>
 
                <!--最终购买-->
                <div class="view_buy">
                    <p>浏览了该商品的用户最终购买</p>
                    <ul class="m_content">
                        <?php if(is_array($goodslist)): foreach($goodslist as $key=>$v): ?><li>
                            <p><a href="#"><img src="/fhw/Fanhuawei/Public/<?php echo ($v["image1"]); ?>" /></a></p>
                            <a href="#"><?php echo ($v["name"]); ?></a>
                            <h2><a href="#">￥<?php echo ($v["price"]); ?></a></h2>
                        </li><?php endforeach; endif; ?>
                       <!--  <li>
                            <p><a href="#"><img src="/fhw/Fanhuawei/Public/jd/products/p002.jpg" /></a></p>
                            <a href="#">卫新 护色洗衣液 2kg 袋装</a>
                            <h2><a href="#">￥39.90</a></h2>
                        </li>
                        <li>
                            <p><a href="#"><img src="/fhw/Fanhuawei/Public/jd/products/p004.jpg" /></a></p>
                            <a href="#">卫新 护色洗衣液 2kg 袋装</a>
                            <h2><a href="#">￥69.90</a></h2>
                        </li>
                        <li class="no_bottom">
                            <p><a href="#"><img src="/fhw/Fanhuawei/Public/jd/products/p005.jpg" /></a></p>
                            <a href="#">威露士（Walch）2kg+2kg洗衣液（有氧洗）特惠双袋组合装</a>
                            <h2><a href="#">￥39.90</a></h2>
                        </li> -->
                    </ul>
                </div>

                <!--其他-->
                <ul id="left_shows">
                    <li>
                        <a><img src="/fhw/Fanhuawei/Public/jd/products/left_p001.jpg" /></a>
                    </li>
                    <li>
                        <a><img src="/fhw/Fanhuawei/Public/jd/products/left_p002.jpg" /></a>
                    </li>
                    <li>
                        <a><img src="/fhw/Fanhuawei/Public/jd/products/left_p003.jpg" /></a>
                    </li>
                </ul>
            </div>

            <!--右侧产品信息-->
            <div id="right_product">
                <!--优惠套装-->
                <!-- <div id="favorable_suit">
                    <p class="main_tabs">优惠套装</p>
                    <div class="m_content">
                            <div class="master">    
                                <span class="add"></span>                                 
                                <a href="#"><img src="/fhw/Fanhuawei/Public/jd/products/product_01_m.jpg" /></a>
                                <p><a href="#">卫新 薰衣草洗衣液 4.26kg</a></p>                                                                                           
                            </div>
                            <ul  class="suits">
                                <li >
                                    <span class="add"></span>
                                    <a href="#"><img src="/fhw/Fanhuawei/Public/jd/products/product_02_m.jpg" /></a>
                                    <p><a href="#">卫新 去静电柔顺剂 清怡樱花袋装 500</a></p>
                                </li>
                                <li>
                                    <span class="add"></span>
                                    <a href="#"><img src="/fhw/Fanhuawei/Public/jd/products/product_03_m.jpg" /></a>
                                    <p><a href="#">威露士（Walch） 手洗洗衣液单袋装 500ml</a></p>
                                </li>
                                <li>                                        
                                    <a href="#"><img src="/fhw/Fanhuawei/Public/jd/products/product_04_m.jpg" /></a>
                                    <p><a href="#">威露士（Walch） 衣物家居消毒液 3</a></p>
                                </li>
                            </ul>
                            <div class="infos">
                                <span></span>
                                <h1><a href="#">威露士组合</a></h1>
                                <p>套装价：<b class="empasis">105.30</b></p>
                                <p>京东价：<b class="strike">142.40</b></p>
                                <p>立即节省：<b>37.10</b></p>
                                <div class="btns">
                                    <a href="#" class="btn_buy">购买套装</a>
                                </div>
                            </div>
                    </div>
                </div>          -->       
  
                <!--产品详细-->
                <div id="product_detail">
                    <!--页签-->
                    <ul class="main_tabs">
                        <li i="0" class="current"><a>商品介绍</a></li>
                        <li id="" i="1"><a>规格参数</a></li>
                        <li i="2"><a>商品评价</a></li>
                        <!-- <li i="-1"><a>商品评价(43390)</a></li>
                        <li i="3"><a>售后保障</a></li> -->
                    </ul>                                      

                    <!--商品介绍-->
                    <div id="product_info" class="show" >
                        <?php echo ($info["editorvalue"]); ?>

                        <div class="detail_content">
                             
                                                     
                        </div>
                    </div>                    
                   
                    <!--规格参数-->
                    <div id="product_data">
                    	<?php if(is_array($attrname)): foreach($attrname as $key=>$v): ?><h1><?php echo ($v["name"]); ?></h1>
                    	 	<br>
                    	 	<?php if(is_array($attrname2)): foreach($attrname2 as $key=>$vv): if($v['id'] == $vv['pid']): ?><h3><?php echo ($vv["name"]); ?>&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo ($vv["val"]); ?></h3><?php endif; endforeach; endif; ?>
                    	 	<br><?php endforeach; endif; ?>
                    </div>
                    
                    <!--包装清单-->
                    <div id="product_package">
                         <!--  商品评论 -->
                    </div>

                    <!--售后保障-->
                    <div id="product_saleAfter">
                        <p>本产品全国联保，享受三包服务，质保期为：无质保</p>
                    </div>
                </div>

                <!--服务承诺-->
                <div id="promise">
                    <b>服务承诺：</b>
                    <p>京东向您保证所售商品均为正品行货，京东自营商品开具机打发票或电子发票。凭质保证书及京东发票，可享受全国联保服务（奢侈品、钟表除外；奢侈品、钟表由京东联系保修，享受法定三包售后服务），与您亲临商场选购的商品享受相同的质量保证。京东还为您提供具有竞争力的商品价格和运费政策，请您放心购买！ </p>
                    <p>注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！</p>
                </div>

                <!--权力声明-->
                <div id="state">
                    <span>权利声明：</span>
                    <p>京东上的所有商品信息、客户评价、商品咨询、网友讨论等内容，是京东重要的经营资源，未经许可，禁止非法转载使用。</p>
                    <p><b>注：</b>本站商品信息均来自于合作方，其真实性、准确性和合法性由信息拥有者（合作方）负责。本站不提供任何保证，并不承担任何法律责任。</p>
                </div>   
                
                <!--商品评价-->
                <div id="comment">
                    <p class="main_tabs">商品评价</p>
                    <div class="m_content">
                       <!--  <div class="rate">
                            <span>97</span><b>%</b>
                            <p>好评度</p>
                        </div> -->
                        <!-- <div class="percent">
                            <dl>
                                <dt>好评(<span>97%</span>)</dt>
                                <dd><p style="width:97px;"></p></dd>
                            </dl>
                            <dl>
                                <dt>中评(<span>2%</span>)</dt>
                                <dd><p style="width:2px;"></p></dd>
                            </dl>
                            <dl>
                                <dt>差评(<span>1%</span>)</dt>
                                <dd><p style="width:1px;"></p></dd>
                            </dl>
                        </div> -->
                        <!-- <div class="buyers">
                            <p>买家印象：</p>
                            <ul>
                                <li>比超市便宜<span>(8450)</span></li>
                                <li>味道不错<span>(6931)</span></li>
                                <li>质量不错<span>(5034)</span></li>
                                <li>洗衣效果好<span>(5003)</span></li>
                                <li>洗涤效果好<span>(4834)</span></li>
                                <li>洗衣服干净<span>(4712)</span></li>
                            </ul>
                        </div> -->
                       <!--  <div class="btns">
                            您可对已购商品进行评价
                            <a class="btn_comment" href="#">发评价拿京豆</a>
                        </div> -->
                    </div>
                </div>

                <!--评价详细-->
                <div id="comment_list">
                    <ul class="main_tabs">
                        <li class="current"><a href="#">全部评价</a></li>
                        <!-- <li><a href="#">好评(48232)</a></li>
                        <li><a href="#">中评(992)</a></li>
                        <li><a href="#">差评(415)</a></li>
                        <li><a href="#">有晒单的评价(962)</a></li> -->
                    </ul>
                    <!--全部评价-->
                    <?php if(is_array($commentlist)): foreach($commentlist as $key=>$v): ?><div id="comment_0" >
                        <div class="comment_item" >
                            <ul>
                                <li><a href="#"><img src="/fhw/Fanhuawei/Public/<?php echo ($v["avatar"]); ?>" /></a></li>
                                <li><?php echo ($v["username"]); ?></li>
                                <!-- <li><b>金牌会员</b><span>广东</span></li> -->
                            </ul>
                            <div>
                                <div class="topic">
                                    <p class="star3"></p>
                                    <a href="#"><?php echo (date('Y-m-d H:i:s',$v["addtime"])); ?></a>
                                </div>
                                <table>
                                    <tr>
                                        <td>标签：</td>
                                        <td class="comment_tag">
                                            <span>
                                             
                                            <?php switch($v["grade"]): case "0": ?>未评分<?php break;?>
                                                <?php case "1": ?>很差<?php break;?>
                                                <?php case "2": ?>良好<?php break;?>
                                                <?php case "3": ?>一般<?php break;?>
                                                <?php case "4": ?>满意<?php break;?>
                                                <?php case "5": ?>非常满意<?php break; endswitch;?>
                                            </span>
                                            <!-- <span>去污能力强</span> -->
                                        </td>                                    
                                    </tr>
                                    <tr>
                                        <td>心得：</td>
                                        <td><?php echo ($v["content"]); ?></td>
                                    </tr>
                                    <tr>
                                        
                                        <td>晒单：</td>
                                        
                                        <td class="comment_show">
                                            <?php if(is_array($pingimglist)): foreach($pingimglist as $key=>$vv): if($v[id] == $vv['cid']): ?><a href="#"><img src="/fhw/Fanhuawei/Public/<?php echo ($vv["img"]); ?>"/></a><?php endif; endforeach; endif; ?>
                                             
                                            <!-- <a href="#"><img src="/fhw/Fanhuawei/Public/jd/products/show_03.jpg"/></a> -->
                                            <!-- 共<b>3</b>张图片<a href="#">查看晒单&gt;</a> -->                                  
                                        </td>
                                       
                                        
                                    </tr>
                                    <tr>
                                        <td>日期：</td>
                                        <td><?php echo (date('Y-m-d H:i:s',$v["addtime"])); ?></td>
                                    </tr>
                                </table>
                                <p class="btns">
                                   <!--  <a href="#">有用(3)</a>
                                    <a href="#">回复(0)</a> -->
                                </p>
                            </div>
                            <div class="corner"></div>
                        </div>
                        
                        <?php if(is_array($huifu)): foreach($huifu as $key=>$vvv): if($v['id'] == $vvv['pid']): if($vvv['uid'] == 0): ?><div class="comment_item" style="margin-left:60px;" >
                                    <ul>
                                        <li><a href="#"><img src="/fhw/Fanhuawei/Public/jd/user_01.jpg" /></a></li>
                                        <li>华为客服</li>
                                        <!-- <li><b>金牌会员</b><span>广东</span></li> -->
                                    </ul>
                                    <div>
                                        <div class="topic">
                                            <p class="star4"></p>
                                            <a href="#"><?php echo (date('Y-m-d H:i:s',$vvv["addtime"])); ?></a>
                                        </div>
                                        <table>
                                            <tr>
                                                <!-- <td>标签：</td>
                                                <td class="comment_tag">
                                                    <span>比洗衣粉好</span>
                                                    <span>去污能力强</span>
                                                </td> -->                                    
                                            </tr>
                                            <tr>
                                                <td>回复：</td>
                                                <td><?php echo ($vvv["content"]); ?></td>
                                            </tr>
                                            <tr>
                                                <!-- <td>晒单：</td>
                                                <td class="comment_show">
                                                    <a href="#"><img src="/fhw/Fanhuawei/Public/jd/products/show_01.jpg"/></a>
                                                    <a href="#"><img src="/fhw/Fanhuawei/Public/jd/products/show_02.jpg"/></a>
                                                    <a href="#"><img src="/fhw/Fanhuawei/Public/jd/products/show_03.jpg"/></a>
                                                    共<b>3</b>张图片<a href="#">查看晒单&gt;</a>                                  
                                                </td> -->
                                            </tr>
                                            <tr>
                                                <td>日期：</td>
                                                <td><?php echo (date('Y-m-d H:i:s',$vvv["addtime"])); ?></td>
                                            </tr>
                                        </table>
                                        <p class="btns">
                                            <!-- <a href="#">有用(3)</a>
                                            <a href="#">回复(0)</a> -->
                                        </p>
                                    </div>
                                    <div class="corner"></div>
                                </div>
                                <?php else: ?>
                                    
                                
                                    <div class="comment_item" style="margin-left:60px;" >
                                    <ul>
                                        <li><a href="#"><img src="/fhw/Fanhuawei/Public/<?php echo ($v["avatar"]); ?>" /></a></li>
                                        <li><?php echo ($v["username"]); ?></li>
                                        <!-- <li><b>金牌会员</b><span>广东</span></li> -->
                                    </ul>
                                    <div>
                                        <div class="topic">
                                            <p class="star4"></p>
                                            <a href="#"><?php echo (date('Y-m-d H:i:s',$vvv["addtime"])); ?></a>
                                        </div>
                                        <table>
                                            <tr>
                                                <!-- <td>标签：</td>
                                                <td class="comment_tag">
                                                    <span>比洗衣粉好</span>
                                                    <span>去污能力强</span>
                                                </td> -->                                    
                                            </tr>
                                            <tr>
                                                <td>回复：</td>
                                                <td><?php echo ($vvv["content"]); ?></td>
                                            </tr>
                                            <tr>
                                                <!-- <td>晒单：</td>
                                                <td class="comment_show">
                                                    <a href="#"><img src="/fhw/Fanhuawei/Public/jd/products/show_01.jpg"/></a>
                                                    <a href="#"><img src="/fhw/Fanhuawei/Public/jd/products/show_02.jpg"/></a>
                                                    <a href="#"><img src="/fhw/Fanhuawei/Public/jd/products/show_03.jpg"/></a>
                                                    共<b>3</b>张图片<a href="#">查看晒单&gt;</a>                                  
                                                </td> -->
                                            </tr>
                                            <tr>
                                                <td>日期：</td>
                                                <td><?php echo (date('Y-m-d H:i:s',$vvv["addtime"])); ?></td>
                                            </tr>
                                        </table>
                                        <p class="btns">
                                            <!-- <a href="#">有用(3)</a>
                                            <a href="#">回复(0)</a> -->
                                        </p>
                                    </div>
                                    <div class="corner"></div>
                                </div><?php endif; endif; endforeach; endif; endforeach; endif; ?>
                       <!--  <div class="comment_item" style="margin-left:60px;" >
                            <ul>
                                <li><a href="#"><img src="/fhw/Fanhuawei/Public/jd/user_01.jpg" /></a></li>
                                <li>kkngj2008 </li>
                                <li><b>金牌会员</b><span>广东</span></li>
                            </ul>
                            <div>
                                <div class="topic">
                                    <p class="star4"></p>
                                    <a href="#">2014-08-12 19:01</a>
                                </div>
                                <table>
                                    <tr>
                                        <td>标签：</td>
                                        <td class="comment_tag">
                                            <span>比洗衣粉好</span>
                                            <span>去污能力强</span>
                                        </td>                                    
                                    </tr>
                                    <tr>
                                        <td>心得：</td>
                                        <td>味道清香..价格也比较公道</td>
                                    </tr>
                                    <tr>
                                        <td>晒单：</td>
                                        <td class="comment_show">
                                            <a href="#"><img src="/fhw/Fanhuawei/Public/jd/products/show_01.jpg"/></a>
                                            <a href="#"><img src="/fhw/Fanhuawei/Public/jd/products/show_02.jpg"/></a>
                                            <a href="#"><img src="/fhw/Fanhuawei/Public/jd/products/show_03.jpg"/></a>
                                            共<b>3</b>张图片<a href="#">查看晒单&gt;</a>                                  
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>日期：</td>
                                        <td>2014-08-11</td>
                                    </tr>
                                </table>
                                <p class="btns">
                                    <a href="#">有用(3)</a>
                                    <a href="#">回复(0)</a>
                                </p>
                            </div>
                            <div class="corner"></div>
                        </div> -->
                    </div>
                    <!--可能还会有其他评论分类：比如“好评”等-->
                    <!--页码-->
                    <div>
                        <a class="comment_show_all" href="#">[查看全部评价]</a>
                        <div id="pages">
                            <!-- <a class="current">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">5</a>
                            <a href="#">6</a>
                            <a href="#">....</a>
                            <a href="#">3421</a>
                            <a href="#">下一页</a> -->
                        </div>
                    </div>
                </div>

                <!--咨询-->
                

                <!--讨论-->
                 
            </div>
        </section>

        <!--最近浏览-->
         
	<!-- end -->



      <div class="hr20"></div>
       

      <div style="clear:both;"></div>
        
      
  <div class="slogan">
  <ul>
    <li class="s1"><i></i>500强企业&nbsp;品质保证</li>
    <li class="s2"><i></i>7天退货&nbsp;15天换货</li>
    <li class="s3"><i></i>
      <span>99元起免运费</span>
</li>
    <li class="s4"><i></i>448家维修网点&nbsp;全国联保</li>
  </ul>
</div><!--口号-end -->
<!--服务-20121025 -->
<div class="service">
    <dl class="s1">
      <dt><i></i>帮助中心</dt>
      <dd>
        <ol>
          <li><a target="_blank" href="#">购物指南</a></li>
          <li><a target="_blank" href="#">配送方式</a></li>
          <li><a target="_blank" href="#">支付方式</a></li>
          <li><a target="_blank" href="#">常见问题</a></li>
        </ol>
      </dd>
    </dl>
    <dl class="s2">
      <dt><i></i>售后服务</dt>
      <dd>
        <ol>
          <li><a target="_blank" href="#">保修政策</a></li>
          <li><a target="_blank" href="#">退换货政策</a></li>
          <li><a target="_blank" href="#">退换货流程</a></li>
          <li><a target="_blank" href="#">保修状态查询</a></li>
        </ol>
      </dd>
    </dl>
    <dl class="s3">
      <dt><i></i>技术支持</dt>
      <dd>
        <ol>
          <li><a target="_blank" href="#">售后网点</a></li>
          <li><a target="_blank" href="#">预约维修</a></li>
          <li><a target="_blank" href="#">手机寄修服务</a></li>
          <li><a target="_blank" href="#">软件下载</a></li>
        </ol>
      </dd>
    </dl>
    <dl class="s4">
      <dt><i></i>关于商城</dt>
      <dd>
        <ol>
          <li><a target="_blank" href="#">公司介绍</a></li>
          <li><a target="_blank" href="#">华为商城简介</a></li>
          <li><a target="_blank" href="#">联系客服</a></li>
        </ol>
      </dd>
    </dl>
    <dl class="s5">
      <dt><i></i>关注我们</dt>
      <dd>
        <ol>
          <li><a class="sina" rel="nofollow" href="#" target="_blank">新浪微博</a></li>
          <li><a class="qq" rel="nofollow" href="#" target="_blank">腾讯微博</a></li>
          <li><a class="huafen" href="#" target="_blank">花粉社区</a></li>
          <li><a href="#" target="_blank">商城手机版</a></li>
        </ol>
      </dd>
    </dl>
</div>
<!--服务-end -->

<!--底部 -->

<footer class="footer">
    <!-- 20130902-底部-友情链接-start -->
  <div class="footer-otherLink">

  </div>
  <div class="footer-warrant-area"><p><a title="隐私政策" target="_blank" href="http://www.vmall.com/help/faq-2635.html">隐私政策</a>  <a title="服务协议" target="_blank" href="http://www.vmall.com/help/faq-778.html">服务协议</a>        Copyright © 2012-2016  VMALL.COM   版权所有  保留一切权利</p><p><a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=32011402010009"><img style="width:20px;height:20px;float:none;" src="/fhw/Fanhuawei/Public/images/20160226162651249.png" title="公安备案" height="20" hspace="0" border="0" vspace="0" width="20"><span style="font-size:15px;font-family:宋体"><span style="font-size:12px;font-family:arial,helvetica,sans-serif;"> 苏公网安备</span><span style="font-size:12px;font-family:arial,helvetica,sans-serif;"> 32011402010009号</span></span></a> | 苏ICP备09062682号-9 | 增值电信业务经营许可证：苏B2-20130048 | <a target="_blank" href="http://res.vmallres.com/certificate/wwwz.jpg">网络文化经营许可证：苏网文[2012]0401-019号</a></p><p><br><a target="_blank" href="http://res.vmallres.com/certificate/wwwz.jpg"></a></p><p><a target="_blank" href="http://www.jsgsj.gov.cn:60103/businessCheck/verifKey.do?serial=320100913201147770231720001001-SAIC_SHOW_32000020160129102316602&signData=MEUCIQDjstcg6fPylz+uES4LNTcBpBVlZujS8l5erIgXiDGw1QIgfHZFK11kZ1vB2enLCwvaslyfE1fztpB19AEK4hlwibo="><img src="/fhw/Fanhuawei/Public/images/20160226162415360.png" style="float:none;width:90px;height:32px;" title="电子营业执照" height="32" hspace="0" border="0" vspace="0" width="90"></a>   <a target="_blank" href="https://ss.knet.cn/verifyseal.dll?sn=e13010932010038497pwz6000000&trustKey=dn&trustValue=vmall.com"><img style="width:90px;height:32px;float:none;" src="/fhw/Fanhuawei/Public/images/20160226162521265.png" title="可信网站" height="32" hspace="0" border="0" vspace="0" width="90"></a>   <a target="_blank" href="https://search.szfw.org/cert/l/CX20121017001773002082"><img style="width:90px;height:32px;float:none;" src="/fhw/Fanhuawei/Public/images/20160226162531395.png" title="诚信网站" height="32" hspace="0" border="0" vspace="0" width="90"></a></p></div><!--授权结束 -->
</footer>

<script type="text/javascript">
// 这是友情链接的ajax遍历
      $.ajax({
        'url':"<?php echo U('public/links');?>",
        'type':'GET',
        'success':function(responseText,status,xhr){
           if(status == 'success'){
             $(".footer-otherLink").html(responseText);
         }else{
             window.location.reload();
        }
      }
    });
</script>
  </body>
  <script type="text/javascript">
      $('#choose_btns a').click(function(){
          // alert();
          //拿样式
          var style = $('.selected').find('img').attr('index');
          //拿名字
          var goodsname = $('#goodsname').text();
          //拿商品数量
          var num = $('#ac_num').val();
          //拿id
          var id = $('#goodsname').attr('index');
          var price = $('#summary_price').find('b').html();
          // console.log(totalprice);

          //ajax发送数据
          $.post(
            //请求的url
            "<?php echo U('shopcart/scAdd');?>",
            //需要发送的数据
            { "style":style , "goodsname":goodsname, "num":num, "id":id,"price":price },

            function( status ){
                // console.log(status);
               if(status == 0){
                    alert('请登陆后再添加到购物车！');
                    location.href="<?php echo U('login/index');?>";
               }else if(status == 1){
                    alert('添加成功！快去付款吧！');
                    location.href="<?php echo U('shopcart/shopcart');?>";
               }
            }
          );


        //减库存数量
          //库存数量
          var stock = $('#stock').text(); console.log(stock);
          // stock = parseInt(stock);
          //商品数量  上面有

          //库存数量 减 商品数量
          var nowstocl = stock - num;


          //ajax 更新数据库 库存数据
          $.get(
                '/fhw/Fanhuawei/index.php/Home/Detail/updStock', //url
                //已发送给服务器的数据
                {id:id,nowstocl:nowstocl},

                //回调函数
                function( data ){
                    console.log(data);
                },
                'json'
            );



      });
  </script>

<html>