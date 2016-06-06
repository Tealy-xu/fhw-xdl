<?php
namespace Home\Controller;
use Think\Controller;
class MemberController extends Controller {
    //个人中心
    public function index(){
    	if(empty($_SESSION['user_info']['username']))
    	{
    		$this->redirect('Login/index');
    	}
    	$this->display();
    }
    //个人中心头
    public function welcome(){
    	$value = session();
    	$val = $value['user_info'];
        $map['id'] =$val['id']; 
        $info = M('users')->field('user_points,username,avatar,balance')->where($map)->select();
        $onfo = $info[0];

    	$this->assign('val',$onfo);
    	$this->display();
    }
    //充值
    public function recharge()
    {
        $num = I('post.num');
        $data['balance'] = I('post.balance') + $num;
        $uid = session()['user_info']['id'];
        $res = M('users')->where('id='.$uid)->save($data);
        if($res){
            $status = 1;
        }
    }
}