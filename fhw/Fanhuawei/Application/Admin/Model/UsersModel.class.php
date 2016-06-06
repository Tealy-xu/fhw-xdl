<?php
namespace Admin\Model;
use Think\Model;

class UsersModel extends Model
{
	//添加会员操作
	public function doAdd($username,$email)
	{
		$pwd = I('post.member-pwd');
        $tel = I('post.member-tel');
		
		Vendor('phpass.PasswordHash');
		$hasher = new \PasswordHash(8,falsh);
		$hash = $hasher->HashPassword($pwd);

		$data['username'] = $username;
		$data['userpass'] = $hash;
		$data['tel'] = $tel;
		$data['email'] = $email;
		$data['regtime'] = time();

		$info = M('Users')->add($data);
		return $info;
	}
	//删除操作
	public function doDel($id)
	{
		$info = M('Users')->delete($id);
		return $info;
	}
	//停用操作
	public function doStateOne($id)
	{
		$id = I('get.id');
		$map['id'] = $id;
		$info = M('Users')->where($map)->select();
		dump($info);
		if($info[0]['state'] == 1)
			$info['state'] = 0;
		dump($info['state']);
		$userinfo = M('Users')->where($map)->save($info);
	}
	//启用操作
	public function doStateZero($id)
	{
		$id = I('get.id');
		$map['id'] = $id;
		$info = M('Users')->where($map)->select();
		dump($info);
		if($info[0]['state'] == 0)
			$info['state'] = 1;
		dump($info['state']);
		$userinfo = M('Users')->where($map)->save($info);
	}
	//查询用户名
	public function listChange($id)
	{
		$id = I('get.id');
		$map['id'] = $id;
		$info = M('Users')->where($map)->select();
		$username = $info[0]['username'];
		return $username;
	}
	//执行修改密码
	public function doChange()
	{
		$pwd = $_POST['new-password'];
		$map['username'] = $_POST['username'];
		$info = M('Users')->field('userpass')->where($map)->select();
		if(empty($_POST['new-password2'])){
			$hash = $info[0]['userpass'];
		}else{
			Vendor('phpass.PasswordHash');
			$hasher = new \PasswordHash(8,falsh);
			$hash = $hasher->HashPassword($pwd);
		}	
		$data['userpass'] = $hash;
		$userinfo = M('Users')->where($map)->field('userpass')->save($data);
		return $userinfo;
	}
	//显示会员查询
	public function doListMember()
	{
		$info = M('Users')->field('id,username,tel,email,regtime,state')->select();
		return $info;
	}
	//会员详情查询
	public function doOneMember()
	{
		$id = I('get.id');
		$info = M('users')->field('userdetail.name,userdetail.sex,users.tel,users.email,users.regtime,users.user_points,users.balance')->table('fhw_users users,fhw_userdetail userdetail')->where("userdetail.uid=users.id and users.id=$id")->select();
		$uinfo = M('users')->field('tel,email,regtime,user_points,balance')->where("id=$id")->select();
		if(empty($info)){
			return $uinfo[0];
		}else{
			return $info[0];
		}
	}
	//修改用户信息
	public function doEdit()
	{	$username = $_POST['member-username'];
		$email = $_POST['email'];
		$map['username'] = $username;
		$haveU = M('users')->where($map)->select();
		$map = null;
		if($haveU)
			return 2;
		$map['email'] = $email;
		$haveE = M('users')->where($map)->select();
		if($haveE)
			return 3;
		$data['username'] = $_POST['member-username'];
		$data['tel'] = $_POST['member-tel'];
		$data['email'] = $_POST['email'];
		$info = M('users')->where("id=$_POST[uid]")->save($data);
		$data = null;
		$data['sex'] = $_POST['sex'];
		$data['name'] = $_POST['member-name'];
		$arr = M('userdetail')->where("uid=$_POST[uid]")->select();
		if($arr){
			$onfo = M('userdetail')->where("uid=$_POST[uid]")->save($data);
		}else{
			$data['uid'] = $_POST['uid'];
			$onfo = M('userdetail')->add($data);
		}
		if($info||$onfo)
			return 1;
	}
}