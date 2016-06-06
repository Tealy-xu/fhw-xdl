<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends CommonController {
	//显示订单
	public function showOrder()
	{
		$count = M('orders')->field('id')->count();
		$info = D('Orders')->listOrder();
		$this->assign('count',$count);
		$this->assign('info',$info);
		$this->display();
	}
	//更改订单状态
	public function dostate()
	{
		$id = I('get.id');
		$map['id'] = $id;
		$info = M('orders')->field('state,totalprice,uid')->where($map)->select();
		$uid['id'] = $info[0]['uid'];
		$data['state'] = $info[0]['state']+1;
		if($data['state'] == 4){
			$oinfo = M('orders')->where($map)->save($data);
			$Upoints = M('users')->field('user_points')->where($uid)->select();
			$point['user_points'] = $Upoints[0]['user_points']+$info[0]['totalprice']/100;
			$uonfo = M('users')->where($uid)->save($point); 
		}else{
			$oinfo = M('orders')->where($map)->save($data);
		}
		
		
	}
	//订单详情
	public function orderDetail()
	{
		$oid = $_GET['id'];
    	$info = D('Orderdetail')->listDetail($oid,$state);
    	$this->assign('oid',$oid);
    	$this->assign('state',$state);
    	$this->assign('list',$info);
		$this->display();
	}
}
