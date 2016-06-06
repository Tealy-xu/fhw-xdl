<?php
namespace Home\Controller;
use Think\Controller;

class ShopcartController extends Controller
{
	// 购物车页
	public function shopcart()
	{	
		// 判断session是否有用户信息，没有登陆则去登陆
		if(session()['user_info'] == null){
			$this->error('请先登录后再重试',U('login/index'));
		}
		$uid = session()['user_info']['id'];		
		$goodslist = M('shopcar')->field('sc.id,sc.gid,gd.stock,gd.image1,gd.price,sc.style,sc.subtotal,sc.num,sc.goodsname')->table('fhw_shopcar sc,fhw_goods gd')->where('sc.gid=gd.id and sc.uid='.$uid)->select();
		// dump($goodslist);exit;
		$this->goodslist = $goodslist;
		$this->display();
	}

	// 数据添加到购物车表
	public function scAdd()
	{
		// 判断用户是否存在
		if( !session()['user_info'] == null ){
			$data['uid'] = session()['user_info']['id'];
			$data['gid'] = I('post.id');
			$data['goodsname'] = I("post.goodsname");
			$data['style'] = I("post.style");
			$data['num'] = I("post.num");
			$price = I('post.price');
			$data['subtotal'] = $data['num'] * $price;

			$list = M('shopcar')->where('uid='.$data['uid'].' and gid='.$data['gid'].' and style="'.$data['style'].'"')->select();
			// dump($list);exit;
			if($list){
				$id = $list[0]['id'];
				$where['num'] = $list[0]['num'] + $data['num'];
				$where['subtotal'] = $list[0]['subtotal'] + $data['subtotal'];
				M('shopcar')->where('id='.$id)->save($where);
			}else{
				$res = M('shopcar')->data($data)->add();
			}
			$status = 1;
		}else{
			$status = 0;
		}

        $this->ajaxReturn($status);
	}

	// 购物车单选删除
	public function scdel()
	{
		$id = I('get.sid');
		$res = M('shopcar')->where('id='.$id)->delete();
		if($res){
			$status = 0;
		}else{
			$status = 1;
		}
		// dump($res);exit;
	}


	// 购物车增加减少更新数据库
	public function scSave()
	{
		$id = I('post.id'); 
		$data['num'] = I('post.num');
		$data['subtotal'] = I('post.price');
		$res = M('shopcar')->where('id='.$id)->save($data);
		if($res){
			$status = 1;
		}
	}

	// 购物车批量删除
	public function scalldel()
	{
		$id = I('get.sid');
		foreach($id as $v){
			$res = M('shopcar')->where('id='.$v)->delete();
		}
		if($res){
			$status = 0;
		}else{
			$status = 1;
		}
	}
}