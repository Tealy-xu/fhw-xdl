<?php if (!defined('THINK_PATH')) exit();?>
﻿<!DOCTYPE html>
<!--------个人中心-------------->
<html>
<head><meta charset="UTF-8">
<title>首页_个人中心_华为商城</title>
<link href="/lamp/Fanhuawei/Public/css/ec.core.css" rel="stylesheet" type="text/css">
<link href="/lamp/Fanhuawei/Public/css/mainn.css" rel="stylesheet" type="text/css">
<script src="/lamp/Fanhuawei/Public/css/jsapi.js" namespace="ec"></script>
<script src="/lamp/Fanhuawei/Public/Js/jquery-1.4.4.min.js"></script>
<script src="/lamp/Fanhuawei/Public/Js/ec.core.js"></script> 
<script src="/lamp/Fanhuawei/Public/Js/ec.business.js"></script> 
<link href="/lamp/Fanhuawei/Public/css/header.css" rel="stylesheet" type="text/css">



</head>

<body>
<!--引入公共头-->
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

<script src="/lamp/Fanhuawei/Public/js/base.min.js"></script>


<header class="header">
  <div class="layout">
    <!-- 21030909-logo-huawei-start -->
    <div class="logo"><a href="" title="Vmall.com - 华为商城"><img src="/lamp/Fanhuawei/Public/images/logo.png" alt="Vmall.com - 华为商城"></a></div><!-- 21030909-logo-start -->
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
              <p><a href=""><img src="/lamp/Fanhuawei/Public/images/20160127095348354.jpg" alt="特权频道"></a></p>
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
            <p><a href="" target="blank" title="扫码下载客户端"><img src="/lamp/Fanhuawei/Public/images/qrcode_vmall_app01.png" alt="华为商城官方客户端"></a></p>
            <p><a href="" target="blank"><span>扫码下载客户端</span></a></p>
          </li>
          <li class="ec-slider-item" style="width: 91px; height: 96px; display: none; position: absolute;">
            <p><a href="" target="blank" title="微信扫码关注我们"><img src="/lamp/Fanhuawei/Public/images/qrcode_vmall_wechat01.jpg" alt="华为商城官方微信"></a></p>
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
  <div id="emailtit" style="top: 140%; left: 142%; z-index: 500; position: fixed;background-image:url(/lamp/Fanhuawei/Public/images/biaoti.png);background-size:100%;width:300px;height:150px;">
    <div style="margin-top:95px;margin-left:78px;"><input type="text" maxlength="12" id="etv"><button id="dotitle">GO</button><button id="outtitle">X</button></div>
  </div>

  <div id="emailbor" style="top: 120%; left: 120%; z-index: 500; position: fixed;width:800px;height:350px;background-image:url(/lamp/Fanhuawei/Public/images/showemail.png);background-size:100%;">
    
    <textarea name="email" cols="72" rows="11" style="margin-top:115px;margin-left:155px;"></textarea>
    <button id="emailbtn">寄出</button><button id="emailout">X</button>
  </div>
<div style="top: 68%; left: 95%; z-index: 500; position: fixed;">
  <span style='color:pink;'>有什么不懂的吗？来点我吧</span>
  <a id="emaildoing" href="javascript:;"><img  src="/lamp/Fanhuawei/Public/images/email.png"></a>
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
<script type="text/javascript" src="/lamp/Fanhuawei/Public/lib/layer/2.1/layer.js"></script>

<script src="/lamp/Fanhuawei/Public/Js/base.js"></script>

<div class="hr-10"></div>
<div class="g">
	<!--面包屑 -->
	<div class="breadcrumb-area icon-breadcrumb fcn">您现在的位置：
		<a href="<?php echo U('Index/index');?>" title="首页">首页</a>&nbsp;&gt;&nbsp;
		<span><b>个人中心</b></span>
		<span id="pathPoint"></span>
		<b id="pathTitle"></b>
	</div>
</div>
<div class="hr-15"></div>

<div class="g">
    <div class="fr u-4-5"><!--个人中心 -->
     <!--  <div id="iframe_box" class="Hui-article"> -->
            <div style="display:none" class="loading"></div>
            <iframe scrolling="no" width="100%" frameborder="0" src="<?php echo U('Member/welcome');?>" name='myiframe' id="external-frame" onload="setIframeHeight(this)"></iframe>
      </div>
	<div class="fl u-1-5">
    	

<!--左边菜单 -->
<div class="mc-menu-area">
	<div class="h"><a href="<?php echo U('Member/index');?>" class="button-go-mc" title="个人中心"><span>个人中心</span></a></div>
    <div class="b">
        <ul>
        	<li>
        	<h3>订单中心</h3>
            	<ol>
                	<li id="li-order"><a href="<?php echo U('OrderCenter/index');?>"  target="myiframe" title="我的订单"><span>我的订单</span></a></li>
                   
                </ol>
            </li>
            <li>
            <h3>个人中心</h3>
            	<ol>
                	<li id="li-account"><a href="<?php echo U('PersonCenter/index');?>" target="myiframe" title="个人信息"><span>个人信息</span></a></li>
                    <li id="li-security"><a href="<?php echo U('PersonCenter/pwd');?>" target="myiframe" title="密码管理"><span>密码管理</span></a></li>
                    <li id="li-myAddress"><a href="<?php echo U('PersonCenter/address');?>" target="myiframe" title="收货信息"><span>收货信息</span></a></li>
					<li id="li-enterprise" class="hide"></li>
                </ol>
            </li>
            <li>
            <h3>社区中心</h3>
            	<ol>
                	<li id="li-prdRemark"><a href="<?php echo U('Comment/index');?>" target="myiframe" title="商品评价"><span>商品评价</span></a></li>
                    <li id="li-prdRemark"><a href="<?php echo U('Email/index');?>" target="myiframe" title="站内信"><span>系统信息</span></a></li>
                </ol>
            </li>
        </ul>
    </div>
    <div class="f"></div>
</div>
    </div>
</div>
<div class="hr-60"></div>

  </div>
<!----------------引入底部公共头---------------------------->
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
  <div class="footer-warrant-area"><p><a title="隐私政策" target="_blank" href="http://www.vmall.com/help/faq-2635.html">隐私政策</a>  <a title="服务协议" target="_blank" href="http://www.vmall.com/help/faq-778.html">服务协议</a>        Copyright © 2012-2016  VMALL.COM   版权所有  保留一切权利</p><p><a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=32011402010009"><img style="width:20px;height:20px;float:none;" src="/lamp/Fanhuawei/Public/images/20160226162651249.png" title="公安备案" height="20" hspace="0" border="0" vspace="0" width="20"><span style="font-size:15px;font-family:宋体"><span style="font-size:12px;font-family:arial,helvetica,sans-serif;"> 苏公网安备</span><span style="font-size:12px;font-family:arial,helvetica,sans-serif;"> 32011402010009号</span></span></a> | 苏ICP备09062682号-9 | 增值电信业务经营许可证：苏B2-20130048 | <a target="_blank" href="http://res.vmallres.com/certificate/wwwz.jpg">网络文化经营许可证：苏网文[2012]0401-019号</a></p><p><br><a target="_blank" href="http://res.vmallres.com/certificate/wwwz.jpg"></a></p><p><a target="_blank" href="http://www.jsgsj.gov.cn:60103/businessCheck/verifKey.do?serial=320100913201147770231720001001-SAIC_SHOW_32000020160129102316602&signData=MEUCIQDjstcg6fPylz+uES4LNTcBpBVlZujS8l5erIgXiDGw1QIgfHZFK11kZ1vB2enLCwvaslyfE1fztpB19AEK4hlwibo="><img src="/lamp/Fanhuawei/Public/images/20160226162415360.png" style="float:none;width:90px;height:32px;" title="电子营业执照" height="32" hspace="0" border="0" vspace="0" width="90"></a>   <a target="_blank" href="https://ss.knet.cn/verifyseal.dll?sn=e13010932010038497pwz6000000&trustKey=dn&trustValue=vmall.com"><img style="width:90px;height:32px;float:none;" src="/lamp/Fanhuawei/Public/images/20160226162521265.png" title="可信网站" height="32" hspace="0" border="0" vspace="0" width="90"></a>   <a target="_blank" href="https://search.szfw.org/cert/l/CX20121017001773002082"><img style="width:90px;height:32px;float:none;" src="/lamp/Fanhuawei/Public/images/20160226162531395.png" title="诚信网站" height="32" hspace="0" border="0" vspace="0" width="90"></a></p></div><!--授权结束 -->
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
<script>
function setIframeHeight(iframe) {
if (iframe) {
var iframeWin = iframe.contentWindow || iframe.contentDocument.parentWindow;
if (iframeWin.document.body) {
iframe.height = iframeWin.document.documentElement.scrollHeight || iframeWin.document.body.scrollHeight;
}
}
};

window.onload = function () {
setIframeHeight(document.getElementById('external-frame'));
};

</SCRIPT>
<script>
    $(function(){
      $.ajax({
        url:"<?php echo U('Email/checkEmail');?>",
        type:"POST",
        success:function(responseText){
          if(responseText == 1)
            alert('亲，您有新的消息。请去系统信息查看！');
        }
      })
    })
  </script>

</script>
</html>