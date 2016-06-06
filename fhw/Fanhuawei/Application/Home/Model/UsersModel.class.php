<?php

namespace Home\Model;
use Think\Model;
class UsersModel extends Model {
	//注册处理
	public function doReg($name, $pwd)
	{
		//加盐大法
		Vendor('phpass.PasswordHash');
		$hasher = new \PasswordHash(8,falsh);
		$hash = $hasher->HashPassword($pwd);
		
		$data['username'] = $name;
		$data['userpass'] = $hash;
		$data['regtime'] = time();
		$data['user_points'] = 0;

		$list = $this->add($data);
		return $list;
		
	}
	//登录处理
	public function doLogin($name,$pwd)
	{
		
		//有盐登录
		 Vendor('phpass.PasswordHash');
		 $hasher = new \PasswordHash(8,false);
		 $map['username'] = $name;
		 $idinfo = M('Users')->field('id,avatar')->where($map)->select();
		 $id = $idinfo[0]['id'];
		 $avatar = $idinfo[0]['avatar'];
		 $hash = M('Users')->where($map)->getField('userpass');
		 $bool = $hasher->CheckPassword($pwd,$hash);
		 if($bool){
		 		$save_info['id'] = $id;
		 		$save_info['username'] = $name;
				$save_info['user_points'] = 0;
				$save_info['avatar'] = $avatar;
				session(C('USER_ID'),$userid);
				session(C('USER_INFO'),$save_info);
		 	return true;
		 }else{
		 	return false;
		 }
	}
	//修改处理
	public function doChange($userphoto)
	{
		$id = $_SESSION['user_info']['id'];
		$map['id'] = $id;
		$nonephoto = M('users')->field('avatar')->where($map)->select();
		$savename = $userphoto['userphoto']['savename'];
		$savepath = $userphoto['userphoto']['savepath'];
		$photoName = $savepath.$savename;
		if(empty($photoName)){
			$photoName = $nonephoto[0]['avatar'];
		}
		$data['avatar'] = $photoName;
		if(isset($_POST['email']))
		$data['email'] = $_POST['email'];
		$userchange = M('Users')->where($map)->save($data);
		if($userchange){
			$_SESSION['user_info']['UserPhoto'] = $photoName;
			return true;
		}else{
			return false;
		}
	}
	//密码修改处理
	public function passChange()
	{
		//1 成功 2 因修改空值没有修改 3久密码错误 4修改密码和重复密码不一样 5密码格式不行 6迷之错误
		Vendor('phpass.PasswordHash');
		$hasher = new \PasswordHash(8,false);
		$id = $_SESSION['user_info']['id'];
		$map['id'] = $id;
		$hash = M('Users')->where($map)->getField('userpass');
		$op = $_POST['oldPassword'];
		$np = $_POST['newPassword'];
		$rnp = $_POST['renewPassword'];
		$bool = $hasher->CheckPassword($op,$hash);
		$pattern = "/^([a-zA-Z0-9]|[._]){6,26}$/i";
		if($bool){
			if(!empty($np)){
				if(preg_match($pattern, $np)){
					if($np == $rnp){
						Vendor('phpass.PasswordHash');
						$hasher = new \PasswordHash(8,falsh);
						$hash = $hasher->HashPassword($np);
						$data['userpass'] = $hash;
						$changePass = M('Users')->where($map)->save($data);
						if($changePass){
							return 1;
						}else{
							return 6;
						}
					}else{
						return 4;
					}
				}else{
					return 5;
				}	
			}else{
				return 2;
			}
		}else{
			return 3;
		}
	}
}