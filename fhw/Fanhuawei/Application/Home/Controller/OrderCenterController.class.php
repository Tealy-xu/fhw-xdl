<?php
namespace Home\Controller;
use Think\Controller;
class OrderCenterController extends Controller {
	//订单页面
    public function index(){
    	$id = session('user_info.id');
    	$User = M('Orders'); 
		$count = $User->where("uid=$id")->count();
		$Page = new \Think\Page($count,5);
		$show = $Page->show();
		$info = M('Orders')->field('orders.id,orders.ordernum,orders.totalprice,orders.addtime,orders.state,postinfo.area,postinfo.detail')->table('fhw_orders orders,fhw_postinfo postinfo')->where("orders.uid=$id and postinfo.id=orders.pid")->order('addtime desc,state')->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach ($info as $value) {
			$value['areadetail'] = $value['area'].$value['detail'];
			$orderinfo[] = $value;
		}
    	$this->assign('show',$show);
    	$this->assign('list',$orderinfo);
    	$this->display();
    }
    //订单详情
    public function show(){
    	$oid = $_GET['oid'];
    	$state = $_GET['state'];
    	$info = D('Orderdetail')->listDetail($oid,$state);
    	$this->assign('oid',$oid);
    	$this->assign('state',$state);
    	$this->assign('list',$info);
    	$this->display();
    }
    //更改订单状态
    public function receOrder(){
    	$id = I('post.oid');
        $map['id'] = $id;
        $info = M('orders')->field('state')->where($map)->select();
        $data['state'] = $info[0]['state']+1;
        $oinfo = M('orders')->where($map)->save($data);
        if($oinfo){
            echo '1';
        }else{
            echo '0';
        }
    }
    //付款
    public function payment()
    {
        $oid = I('post.oid');
        $uid = session()['user_info']['id'];
        $res = M('users')->field('balance')->where('id='.$uid)->select();
        $data = M('orders')->field('state,totalprice')->where('id='.$oid)->select();
        $balance['balance'] = $res[0]['balance'] - $data[0]['totalprice'];
        $state['state'] = $data[0]['state'] + 1;
        $Upoints['user_points'] = $points + $data[0]['totalprice'] / 100;
        // dump($state);exit;
        if($balance['balance'] < 0){
            $status = 0;
        }else{
            // dump($Upoints);
            M('users')->where('id='.$uid)->save($balance);
            M('orders')->where('id='.$oid)->save($state);
            $status = 1;
        }
        // dump($status);exit;
        $this->ajaxReturn($status);
    }
}