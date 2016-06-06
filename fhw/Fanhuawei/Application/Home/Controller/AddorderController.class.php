<?php
namespace Home\Controller;
use Think\Controller;
class AddorderController extends Controller {
    // 提交订单获取数据
    public function index()
    {
    	$post = I('post.sid');
    	$totalprice = I('post.totalprice');
    	$sid = explode(',',$post);
    	foreach($sid as $v)
    	{
    		$sclist[] = M('shopcar')->field('sc.id,gd.image1,gd.price,sc.style,sc.subtotal,sc.num,sc.goodsname')->table('fhw_shopcar sc,fhw_goods gd')->where('sc.gid=gd.id and sc.id='.$v)->select(); 
    	}

        $uid = session()['user_info']['id'];
        $address = M('postinfo')->where('uid='.$uid)->select();
    	// dump($address);exit;
        $this->sclist = $sclist;
    	$this->arlist = $address;
    	$this->totalprice = $totalprice;
    	$this->display();
    }

    // 执行添加收货地址和订单
    public function doadd()
    {
        // 添加到收货信息表
        $link['linkuser'] = I('post.linkman');
        $link['area'] = I('post.provincename').'省'.I('post.city').I('post.countyname');
        $link['detail'] = I('post.street');
        $link['code'] = I('post.code');
        $link['tel'] = I('post.tel');
        $link['uid'] = session()['user_info']['id'];
        $lastid = M('postinfo')->data($link)->add();

        // 添加到订单表
        $uid = session()['user_info']['id'];
        $order['pid'] = $lastid;
        $order['uid'] = $uid;
        $order['addtime'] = time();
        $order['ordernum'] = time().$order['uid'];
        $order['totalprice'] = I('post.totalprice');
        $oid = M('orders')->data($order)->add();

        // 添加到订单详情表
        $sid = I('post.sid');
        foreach($sid as $v){
            $sclist = M('shopcar')->field('goodsname,gid,num,subtotal')->where('id='.$v)->select();
            foreach($sclist as $val){
                $val['oid'] = $oid;
                $val['uid'] = session()['user_info']['id'];
                $res = M('orderdetail')->data($val)->add();
            }
            M('shopcar')->where('id='.$v)->delete();
        }
        // 存入session订单号，方便下一步遍历
        session('lastoid',$oid);
        $this->ajaxReturn($status);
    }

    // 如果收货地址已存在，就只执行添加订单
    public function adddo()
    {
        // 添加到订单表
        $order['pid'] = I('post.pid');
        $order['uid'] = session()['user_info']['id'];
        $order['addtime'] = time();
        $order['ordernum'] = time().$order['uid'];
        $order['totalprice'] = I('post.totalprice');
        $oid = M('orders')->data($order)->add();
        // 添加到订单详情表
        $sid = I('post.sid');
        foreach($sid as $v){
            $sclist = M('shopcar')->field('goodsname,gid,num,subtotal,style')->where('id='.$v)->select();
            foreach($sclist as $val){
                $val['oid'] = $oid;
                $val['uid'] = session()['user_info']['id'];
                $res = M('orderdetail')->data($val)->add();
            }
            M('shopcar')->where('id='.$v)->delete();
        }
        // 存入session订单号，方便下一步遍历
        session('lastoid',$oid);
        $this->ajaxReturn($status);
    }
}