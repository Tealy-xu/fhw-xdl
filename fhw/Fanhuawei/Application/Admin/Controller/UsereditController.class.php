<?php
namespace Admin\Controller;
use Think\Controller;
class UsereditController extends CommonController {
	//用户修改页面
	public function index()
	{ 	 
		$id = I('get.id');
		$map['uid'] = $id;
		$res = M('userdetail')->where($map)->select();
		if(empty($res)){
			$map = null;
			$map['id'] = $id;
			$info = M('users')->field('username,tel,email')->where($map)->select();
		}else{
			$info = M('users')->field('users.username,users.tel,users.email,userdetail.name,userdetail.sex')->table('fhw_users users,fhw_userdetail userdetail')->where("users.id=$id and userdetail.uid=$id")->select();
		}
		$this->assign('info',$info[0]);
		$this->assign('id',$id);
		$this->display();
	} 
	//用户修改处理
	public function doEdit()
	{
		$list = D('Users')->doEdit();
		switch ($list) {
			case 1:
				$this->success('修改成功，请关闭页面','',3);
				break;
			case 2:
				$this->error('账号已经被注册了','',3);
				break;
			case 3:
				$this->error('邮箱已经被注册了','',3);
				break;
			default:
				$this->error('迷之错误','',3);
				break;
		}
	}

}