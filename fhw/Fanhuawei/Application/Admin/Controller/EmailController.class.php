<?php
namespace Admin\Controller;
use Think\Controller;
class EmailController extends Controller {
	//显示站内信
	public function index(){
		$info = M('message')->field('message.id,message.sendid,message.title,message.statue,message.pdate,users.username')->table('fhw_message message,fhw_users users')->where('message.recid=1 and users.id=message.sendid')->select();
		$count = M('message')->where('recid=1')->count();
		$this->assign('info',$info);
		$this->assign('inCo',$count);
		$this->display();
	}
	//显示信内容
	public function showText(){
		$id = I('get.id');
		$map['id'] = $id;
		$data['statue'] = '1';
		$info = M('message')->field('message')->where($map)->select();
		$statue = M('message')->where($map)->save($data);
		$text = $info[0][message];
		$this->assign('info',$text);
		$this->display('show');
	}
	//信回复页面
	public function reply(){
		$id = I('get.id');
		$map['id'] = $id;
		$info = M('users')->field('username')->where($map)->select();
		$recUser = $info[0]['username'];
		$this->assign('recUser',$recUser);
		$this->assign('recid',$id);
		$this->display();
	}
	//执行回复操作
	public function doReply(){
		$data['title'] = I('post.title');
		$data['sendid'] = '1';
		$data['recid'] = I('post.recid');
		$data['message'] = I('post.message');
		$data['pdate'] = time();
		$doemail = M('message')->add($data);
	}
	//群发页面
	public function AllEmail(){
		$this->display();
	}
	//执行群发操作
	public function doAllEmail(){
		$data['title'] = I('post.title');
		$data['sendid'] = '1';
		$data['message'] = I('post.message');
		$data['pdate'] = time();
		$user = M('users')->field('id')->select();
		foreach ($user as $value) {
			$data['recid'] = $value['id'];
			$info = M('message')->add($data);
		}
	}
	//删除站内信
	public function doDel(){
		$id = I('get.id');
		$map['id'] = $id;
		$info = M('message')->where($map)->delete();
	}
}