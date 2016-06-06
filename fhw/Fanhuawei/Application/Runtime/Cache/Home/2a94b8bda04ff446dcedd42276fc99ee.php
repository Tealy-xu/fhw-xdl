<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <meta http-equiv="Content-Language" content="zh-cn">
    <title>繁花唯商城</title>
    <meta name="description" content="网页描述">
    <meta name="keywords" content="关键字">
    <link rel="stylesheet" type="text/css" href="/fhw/Fanhuawei/Public/css/index.min.css">
    <link rel="stylesheet" type="text/css" href="/fhw/Fanhuawei/Public/css/header.css">
    <script src="/fhw/Fanhuawei/Public/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="/fhw/Fanhuawei/Public/js/core.js"></script>
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
<script>
  $('.category-list').attr('style','display:block');
</script>
      <div class="hot-board">
        <div class="slider">
           <div id="slider-img-list">
              <div><a href="#"><img src="/fhw/Fanhuawei/Public/images/img/20151222212225106.png" /></a></div>
              <div><a href="#"><img src="/fhw/Fanhuawei/Public/images/img/20151223145745224.jpg" /></a></div>
              <div><a href="#"><img src="/fhw/Fanhuawei/Public/images/img/20151223150140647.jpg" /></a></div>
              <div><a href="#"><img src="/fhw/Fanhuawei/Public/images/img/20151223222647443.jpg" /></a></div>
              <div><a href="#"><img src="/fhw/Fanhuawei/Public/images/img/20151223222759399.jpg" /></a></div>
           </div>
        </div>
      </div>
      <div class="hr20"></div>
      <div class="layout head-item">
        <div class="hl">
          <ul class="channel-list">
          <?php if(is_array($tuijian)): foreach($tuijian as $key=>$v): ?><li class="channel-item w50">
              <div class="channel-item-info">
                <div class="pro-info c1">
                  <div class="info-img"><a href="<?php echo U('detail/particulars',array('goods_id'=>$v['id']));?>"><img src="/fhw/Fanhuawei/Public<?php echo ($v["image1"]); ?>" width="180px" height="180px" /></a></div>
                  <div class="info-title" style="font-size:15px;"><a href="<?php echo U('detail/particulars',array('goods_id'=>$v['id']));?>"><?php echo ($v["name"]); ?></a></div>
                  <div class="price">￥<?php echo ($v["price"]); ?></div>
                  <div class="button"><a href="<?php echo U('detail/particulars',array('goods_id'=>$v['id']));?>">立即抢购</a></div>
                </div>
                <i class="pro-l-tag"></i>
              </div>
            </li><?php endforeach; endif; ?>
          </ul>
          <div style="clear:both;"></div>
        </div>
        <div class="hr">
          <div class="channel-sale">
            <img src="/fhw/Fanhuawei/Public/images/img/20160108214217801.jpg" />
          </div>
          <div class="channel-news">
            <div class="news-tab">
              <div class="h">
                <span id="notice" class="current"><a href="<?php echo U('announcement/announcementList');?>" >公告</a></span>
                <span id="news"><a href="<?php echo U('announcement/announcementList');?>" >新闻</a></span>
              </div>
              <div class="b">
                <ul id="notice-content-list">
                <?php if(is_array($msglist1)): foreach($msglist1 as $key=>$msglist1): ?><li><a href="<?php echo U('announcement/announcement',array('id'=>$msglist1[id]));?>"><?php echo ($msglist1["title"]); ?></a></li><?php endforeach; endif; ?>
                </ul>
                <ul id="notice-content-list" style="display:none;">
                <?php if(is_array($msglist2)): foreach($msglist2 as $key=>$msglist2): ?><li><a href="<?php echo U('announcement/announcement',array('id'=>$msglist2[id]));?>"><?php echo ($msglist2["title"]); ?></a></li><?php endforeach; endif; ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="hr20"></div>
          <div class="news-img">
            <a href="#"><img src="/fhw/Fanhuawei/Public/images/img/2016010100091382.jpg" /></a>
          </div>
        </div>
      </div>
      <div class="layout">
        <div class="middlebanner">
          <div><a href="#"><img src="/fhw/Fanhuawei/Public/images/img/20151222103547290.jpg" /></a></div>
          <div><a href="#"><img src="/fhw/Fanhuawei/Public/images/img/20160119102544602.jpg" /></a></div>
          <div><a href="#"><img src="/fhw/Fanhuawei/Public/images/img/20160114092941990.jpg" /></a></div>
          <div><a href="#"><img src="/fhw/Fanhuawei/Public/images/img/20160112093445949.jpg" /></a></div>
          <div><a href="#"><img src="/fhw/Fanhuawei/Public/images/img/20160114144457233.jpg" /></a></div>
        </div>
      </div>
      <div class="hr20"></div>
      <div class="layout">
        <div class="h">
          <h2><a href="#">手机</a></h2>
        </div>
        <div style="clear:both;"></div>
        <div class="b mobile-list">
          <ul class="channel-list">
            <li class="channel-item w50">
              <div class="channel-item-info">
                <div class="pro-info c1">
                  <div class="info-img-mobile"><a href="<?php echo U('detail/particulars',array('goods_id'=>$firstphone[0]['id']));?>"><img src="/fhw/Fanhuawei/Public<?php echo ($firstphone[0]['image1']); ?>" width="200px" height="200px" /></a></div>
                  <div class="i-name"><a href="<?php echo U('detail/particulars',array('goods_id'=>$firstphone[0]['id']));?>"><?php echo ($firstphone[0]['name']); ?></a></div>
                  <div class="i-detail">
                    <p style="color:#777;height:40px;overflow:hidden;"><?php echo ($firstphone[0]['intro']); ?></p>
                  </div>
                  <div class="i-price">￥<?php echo ($firstphone[0]['price']); ?></div>
                  <div class="button"><a href="<?php echo U('detail/particulars',array('goods_id'=>$firstphone['id']));?>">立即抢购</a></div>
                </div>
                <i class="pro-l-tag"></i>
              </div>
            </li>
            <?php if(is_array($phone)): foreach($phone as $key=>$phone): ?><li class="channel-item w25">
              <div class="channel-item-info">
                <div class="pro-info c2">
                  <div class="info-img-noleft"><a href="<?php echo U('detail/particulars',array('goods_id'=>$phone['id']));?>"><img src="/fhw/Fanhuawei/Public<?php echo ($phone["image1"]); ?>" /></a></div>
                  <div class="i-name">
                    <p style="color:#333;height:20px;overflow:hidden;"><a href="<?php echo U('detail/particulars',array('goods_id'=>$phone['id']));?>"><?php echo ($phone["name"]); ?></a></p>
                  </div>
                  <div class="i-price">￥<?php echo ($phone["price"]); ?></div>
                </div>
                <i class="pro-l-tag"></i>
              </div>
            </li><?php endforeach; endif; ?>
          </ul>
        </div>
      </div>
      <div class="hr20"></div>
      <div class="layout">
        <div class="h">
          <h2><a href="#">平板 & 穿戴</a></h2>
        </div>
        <div style="clear:both;"></div>
        <div class="b mobile-list">
          <ul class="channel-list">
            <li class="channel-item w50">
              <div class="channel-item-info">
                <div class="pro-info c1">
                  <div class="info-img-mobile"><a href="<?php echo U('detail/particulars',array('goods_id'=>$firstpinban[0]['id']));?>"><img src="/fhw/Fanhuawei/Public<?php echo ($firstpinban[0]['image1']); ?>" width="200px" height="200px" /></a></div>
                  <div class="i-name" style="height:45px;overflow:hidden;"><a href="<?php echo U('detail/particulars',array('goods_id'=>$firstpinban[0]['id']));?>"><?php echo ($firstpinban[0]['name']); ?></a></div>
                  <div class="i-detail">
                    <p style="color:#777;height:40px;overflow:hidden;"><?php echo ($firstpinban[0]['intro']); ?></p>
                  </div>
                  <div class="i-price">￥<?php echo ($firstpinban[0]['price']); ?></div>
                  <div class="button"><a href="<?php echo U('detail/particulars',array('goods_id'=>$firstpinban[0]['id']));?>">立即抢购</a></div>
                </div>
                <i class="pro-l-tag"></i>
              </div>
            </li>
            <?php if(is_array($pinban)): foreach($pinban as $key=>$pinban): ?><li class="channel-item w25">
              <div class="channel-item-info">
                <div class="pro-info c2">
                  <div class="info-img-noleft"><a href="<?php echo U('detail/particulars',array('goods_id'=>$pinban['id']));?>"><img src="/fhw/Fanhuawei/Public<?php echo ($pinban["image1"]); ?>" /></a></div>
                  <div class="i-name">
                    <p style="color:#333;height:20px;overflow:hidden;"><a href="<?php echo U('detail/particulars',array('goods_id'=>$pinban['id']));?>"><?php echo ($pinban["name"]); ?></a></p>
                  </div>
                  <div class="i-price">￥<?php echo ($pinban["price"]); ?></div>
                </div>
                <i class="pro-l-tag"></i>
              </div>
            </li><?php endforeach; endif; ?>
          </ul>
        </div>
      </div>
       <div class="hr20"></div>
      <div class="layout">
        <div class="h">
          <h2><a href="#">智能家居</a></h2>
        </div>
        <div style="clear:both;"></div>
        <div class="b mobile-list">
          <ul class="channel-list">
            <li class="channel-item w50">
              <div class="channel-item-info">
                <div class="pro-info c1">
                  <div class="info-img-mobile"><a href="<?php echo U('detail/particulars',array('goods_id'=>$firstjiaju[0]['id']));?>"><img src="/fhw/Fanhuawei/Public<?php echo ($firstjiaju[0]['image1']); ?>" width="200px" height="200px" /></a></div>
                  <div class="i-name" style="height:45px;overflow:hidden;"><a href="<?php echo U('detail/particulars',array('goods_id'=>$firstjiaju[0]['id']));?>"><?php echo ($firstjiaju[0]['name']); ?></a></div>
                  <div class="i-detail">
                    <p style="color:#777;height:40px;overflow:hidden;"><?php echo ($firstjiaju[0]['intro']); ?></p>
                  </div>
                  <div class="i-price">￥<?php echo ($firstjiaju[0]['price']); ?></div>
                  <div class="button"><a href="<?php echo U('detail/particulars',array('goods_id'=>$firstjiaju[0]['id']));?>">立即抢购</a></div>
                </div>
                <i class="pro-l-tag"></i>
              </div>
            </li>
            <?php if(is_array($jiaju)): foreach($jiaju as $key=>$jiaju): ?><li class="channel-item w25">
              <div class="channel-item-info">
                <div class="pro-info c2">
                  <div class="info-img-noleft"><a href="<?php echo U('detail/particulars',array('goods_id'=>$jiaju['id']));?>"><img src="/fhw/Fanhuawei/Public<?php echo ($jiaju["image1"]); ?>" /></a></div>
                  <div class="i-name">
                    <p style="color:#333;height:20px;overflow:hidden;"><a href="<?php echo U('detail/particulars',array('goods_id'=>$jiaju['id']));?>"><?php echo ($jiaju["name"]); ?></a></p>
                  </div>
                  <div class="i-price">￥<?php echo ($jiaju["price"]); ?></div>
                </div>
                <i class="pro-l-tag"></i>
              </div>
            </li><?php endforeach; endif; ?>
          </ul>
        </div>
      </div>
      <div class="hr20"></div>
      <div class="layout">
        <div class="h">
          <h2><a href="#">必备配件</a></h2>
        </div>
        <div style="clear:both;"></div>
        <div class="b mobile-list">
          <ul class="channel-list">
            <li class="channel-item w50">
              <div class="channel-item-info">
                <div class="pro-info c1">
                  <div class="info-img-mobile"><a href="<?php echo U('detail/particulars',array('goods_id'=>$firstpeijian[0]['id']));?>"><img src="/fhw/Fanhuawei/Public<?php echo ($firstpeijian[0]['image1']); ?>" width="200px" height="200px" /></a></div>
                  <div class="i-name" style="height:45px;"><a href="<?php echo U('detail/particulars',array('goods_id'=>$firstpeijian[0]['id']));?>"><?php echo ($firstpeijian[0]['name']); ?></a></div>
                  <div class="i-detail">
                    <p style="color:#777;height:40px;overflow:hidden;"><?php echo ($firstpeijian[0]['intro']); ?></p>
                  </div>
                  <div class="i-price">￥<?php echo ($firstpeijian[0]['price']); ?></div>
                  <div class="button"><a href="<?php echo U('detail/particulars',array('goods_id'=>$firstpeijian[0]['id']));?>">立即抢购</a></div>
                </div>
                <i class="pro-l-tag"></i>
              </div>
            </li>
            <?php if(is_array($peijian)): foreach($peijian as $key=>$peijian): ?><li class="channel-item w25">
              <div class="channel-item-info">
                <div class="pro-info c2">
                  <div class="info-img-noleft"><a href="<?php echo U('detail/particulars',array('goods_id'=>$peijian['id']));?>"><img src="/fhw/Fanhuawei/Public<?php echo ($peijian["image1"]); ?>" /></a></div>
                  <div class="i-name">
                    <p style="color:#333;height:20px;overflow:hidden;"><a href="<?php echo U('detail/particulars',array('goods_id'=>$peijian['id']));?>"><?php echo ($peijian["name"]); ?></a></p>
                  </div>
                  <div class="i-price">￥<?php echo ($peijian["price"]); ?></div>
                </div>
                <i class="pro-l-tag"></i>
              </div>
            </li><?php endforeach; endif; ?>
          </ul>
        </div>
      </div>
      <div class="hr20"></div>
      <div class="body-bottom"><a href="#"><img src="/fhw/Fanhuawei/Public/images/img/20151222143005583.jpg" /></a></div>
      <div class="hr20"></div>
      <div class="follow">
        <div class="layout">
          <ul>
            <li><a href="#"><img src="/fhw/Fanhuawei/Public/images/img/follow_hwsoft_application.png" /></a></li>
            <li><a href="#"><img src="/fhw/Fanhuawei/Public/images/img/follow_sina.png" /></a></li>
            <li><a href="#"><img src="/fhw/Fanhuawei/Public/images/img/follow_qzone.png" /></a></li>
            <li><a href="#"><img src="/fhw/Fanhuawei/Public/images/img/follow_android.png" /></a></li>
          </ul>
        </div>
      </div>
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
<html>