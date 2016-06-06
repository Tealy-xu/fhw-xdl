<?php
namespace Admin\Model;
use Think\Model;
class OrderdetailModel extends Model {
	//订单详情查询
	public function listDetail($oid)
	{
		$info = M('orderdetail')->field('num,subtotal,gid,style')->where("oid=$oid")->select();
		foreach ($info as $value) {
			$list = M('goods')->field('name,price,image1,intro')->where("id=$value[gid]")->select();
			$value[] = $list[0];
			$goodsinfo[] = $value;
		}
		return $goodsinfo;
	}

}