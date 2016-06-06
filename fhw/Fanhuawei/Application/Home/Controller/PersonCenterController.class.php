<?php
namespace Home\Controller;
use Think\Controller;
class PersonCenterController extends Controller {
    //个人中心个人信息
    public function index()
    {
       
    	$map['username'] = session('user_info.username');
    	if(empty($map)){
			 $this->redirect('Login/index','', 3, '未登录,页面跳转到登录页面中...');
			 exit;
    	}
    	$info = M('Users')->field('id,username,email,regtime,avatar')->where($map)->select();
    	$userinfo = $info[0];
    	$this->assign('info',$userinfo);
         $map['uid'] = session('user_info.id');
         $list = M('Userdetail')->field('sex,name')->where($map)->select();
         $userlist = $list[0];
         $this->assign('list',$userlist);

    	$this->display();
    }
    //修改个人信息
    public function doUserDetail()
    {	
        if(empty($_POST['true_name'])){
            $this->error('真实名字不能为空');
        }
        $map['email'] = I('post.email');
        $user = M('Users')->field('email')->where($map)->select();
        if($user){
            $this->error('邮箱地址已经被注册了');
        }
    	$userphoto = D('Userdetail')->upload();
        $userchange = D('Users')->doChange($userphoto);
    	$uid = session('user_info.id');
    	$userDetail = D('Userdetail')->setUserDetail($uid);
    	if(isset($userDetail)||isset($userchange)){
            $this->success('个人资料更改成功');
        }else{
            $this->error('修改失败，请重新修改');
        }
    	
    }
    //密码修改页面
    public function pwd()
    {
       
    	$this->display();
    }
    //修改密码
    public function doChange()
    {
        if(empty($_POST['oldPassword'])){
            $this->error('没有填写，密码没有修改！');
        }
        $change = D('Users');
        $password = $change->passChange();
        if($password == 3)
            $this->error('原来的密码错误，请输入正确的密码');
        if($password == 4)
            $this->error('修改的密码和重复密码不一样，请一致');
        if($password == 2)
            $this->error('没有输入修改的密码，密码没有修改');
        if($password == 5)
            $this->error('密码格式错误,请输入6-26位密码');
        if($password == 6)
            $this->error('迷之错误,请联系客服');
        if($password == 1)
            $this->success('修改成功！');
    }
    //个人收货地址
    public function address()
    {
        $id = $_SESSION['user_info']['id'];
        $Uaddress = D('postinfo')->listAddress($id);
        $this->assign('vo',$Uaddress);
    	$this->display();
    }
    //增加个人收货地址
    public function addAddress()
    {
        $id = $_SESSION['user_info']['id'];
        $adinfo = D('Postinfo')->addAddress($id);
    }
    //删除个人地址
    public function delAddress()
    {
        $id = I('get.pid');
        $info = D('Postinfo')->delPostinfo($id);
        if($info){
            echo '1';
        }else{
            echo '0';
        }
    }
    
    public function account()
    {
        $this->display();
    }

}