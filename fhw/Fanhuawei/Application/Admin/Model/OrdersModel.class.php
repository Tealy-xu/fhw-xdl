<?php
namespace Admin\Model;
use Think\Model;
class OrdersModel extends Model{	
	//订单查询
	public function listOrder()
	{
		$list = M('Orders')->field('id,uid,pid,addtime,ordernum,state')->select();
		
		foreach ($list as $value) {
			$info = M('Postinfo')->field('area,detail')->where("id=$value[pid]")->select();
			$user = M('Users')->field('username')->where("id=$value[uid]")->select();
			$value['username'] = $user[0]['username'];
			$value['address'] = $info[0]['area'].$info[0]['detail'];
			$orderinfo[] = $value;
		}
		return $orderinfo;
	}
}