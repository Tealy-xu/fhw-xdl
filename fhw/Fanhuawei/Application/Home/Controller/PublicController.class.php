<?php
namespace Home\Controller;
use Think\Controller;

class PublicController extends Controller
{
	// 这是左边的导航栏
	public function header()
	{
		//对数据分类进行显示到前台
		$parents = M('categorys')->where(array('pid'=>0))->order('id')->select();
		$child_category = array();

		foreach($parents as $v){
		    $path = '0-'.$v['id'];
			$child = M('categorys')->where(array('path'=>array('like',$path)))->limit(3)->select();
			$child_category[$v['id']]=$child;
		}
		 
		$str='';
		foreach($parents as $val){
		    $url = U('catelist/catelist',array('cid'=>$val['id']));
			$str .= "<li class='category-item '><div class='category-info'><h3><a href='{$url}'><span>{$val['catename']}</span></a></h3>";
			foreach($child_category[$val['id']] as $child){
				$newurl = U('catelist/catelist',array('cid'=>$child['id']));
			    $str .= "<a href='{$newurl}'><span>{$child['catename']}</span></a>";
			}		
			$str.="</div></li>";
		}
		
		// dump($str);exit;
		
		echo $str;
	}

	// 头部导航栏
	public function naver()
	{
		//对父类查询并显示到前台
		$parents = M('categorys')->where(array('pid'=>0))->order('id')->select();

		$index = U('index/index');
		$str = "<li><a href='{$index}' class='current'><span>首页</span></a></li>";
		// dump($str);exit;
		foreach($parents as $v)
		{
			$url = U('catelist/catelist',array('cid'=>$v['id']));
			$str .= "<li><a href='{$url}'><span>{$v['catename']}</span></a></li>";
		}
		echo $str;
	}

	public function login()
	{
			      
		//session是否保存有用户信息
		//登录后的标志  0 未登录 1 登录
		// dump($user_info);exit;
		$statu = 0; 
		$user_info = session()['user_info'];
		//存在表示用户已经登录
		if($user_info){
		    $statu = 1;
			$user_name = $user_info['username'];
			$user_id = $user_info['id'];
		}else{
		   	$statu = 0;
		}
		$data['statu']=$statu;
		$data['id']=$user_id;
		$data['username']=$user_name;
	    // dump($data);exit;
	    echo json_encode($data);
	}

	// 小型购物车ajax遍历
	public function smallSC(){
		$uid = session()['user_info']['id'];
		// 获取小购物车所需的所有数据
		$sclist = M('shopcar')->field('gd.id,gd.image1,gd.intro,gd.price,sc.style,sc.subtotal,sc.num,sc.goodsname')->table('fhw_shopcar sc,fhw_goods gd')->where('sc.gid=gd.id and sc.uid='.$uid)->select();
		// dump($sclist);exit;
		$str = "<div id='minicart-pro-list-block'><ul class='minicart-pro-list' id='minicart-pro-list'>";
		foreach($sclist as $v){
			$url = U('detail/particulars',array('goods_id'=>$v['id']));
			$str .= "<li class='minicart-pro-item'><div class='pro-info'><div class='p-img'><a href='{$url}' target='_blank'><img src='/lemp/Fanhuawei/Public{$v['image1']}'></a></div><div class='p-name'><a href='{$url}' target='_blank'>{$v['goodsname']}&nbsp;<span class='p-slogan'>{$v['intro']}</span><span class='p-promotions'></span></a></div><div class='p-status'><div class='p-price'><b>¥&nbsp;{$v['price']}.00</b><em>x</em><span>{$v['num']}</span></div><div class='p-tags'></div></div></div></li>";
			$totalprice += $v['subtotal'];
		}
		$num = count($sclist);
		// dump($totalprice);exit;
		$scurl = U('shopcart/shopcart');
		$str .= "</ul></div><div class='minicart-pro-settleup' id='minicart-pro-settleup'><p>共<em id='micro-cart-total'>{$num}</em>件商品，金额合计<b id='micro-cart-totalPrice'>¥&nbsp;{$totalprice}</b></p><a class='button-minicart-settleup' href='{$scurl}'>去结算</a></div>";

		echo $str;

	}

	// 友情链接ajax遍历
	public function links()
	{
		// 获取友情链接状态为审核通过的数据
		$links = M('blogro')->where('state=1')->select();
		$str = "<p style='text-align:left;''>友情链接：";
		foreach($links as $v){
			$url = $v['url'];
			$str .= "<span style='line-height:1.5;'> | </span><a href='{$url}' target='_blank' style='line-height:1.5;'>{$v['name']}</a>";
		}
		$url = U('Blogroll/BlogrollList');
		$str .= "<span style='line-height:1.5;'> | </span><a href='{$url}' target='_blank' style='line-height:1.5;color:#ff0000;'>申请链接 &gt;&gt;</a></p>";
		echo $str;
		// dump($str);exit;
	}
}
