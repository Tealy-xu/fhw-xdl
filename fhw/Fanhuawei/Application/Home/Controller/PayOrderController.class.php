<?php
namespace Home\Controller;
use Think\Controller;
class PayOrderController extends Controller {
    // 提交订单成功页面
    public function index(){

    	$oid = session()['lastoid'];// 获取session里面的订单ID
    	$uid = session()['user_info']['id'];// 获取session里面的用户ID
    	$orderlist = M('orders')->table('fhw_orders od, fhw_postinfo po')->where('od.pid=po.id and od.id='.$oid)->select();// 获取订单表资料
    	$balance = M('users')->field('balance')->where('id='.$uid)->select();
    	// dump($orderlist);exit;
    	$this->orderlist = $orderlist;
    	$this->oid = $oid;
    	$this->balance = $balance;
    	$this->display();
    }

    // 简易支付
    public function pay()
    {
    	$uid = session()['user_info']['id'];
    	$balance = I('post.balance');// 余额
    	$totalprice = I('post.totalprice');// 总金额
    	$oid = I('post.oid');
    	$data['balance'] = $balance - $totalprice;
    	$state['state'] = I('post.state');
    	if($data['balance'] < 0){
    		$status = 0;
    	}else{
    		M('users')->where('id='.$uid)->save($data);
    		M('orders')->where('id='.$oid)->save($state);
    		$status = 1;
    	}
    	$this->ajaxReturn($status);
    }
}