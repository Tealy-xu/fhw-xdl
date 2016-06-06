<?php
namespace Home\Controller;
use Think\Controller;
class EmailController extends Controller {
	//写信
	public function sandEmail(){
		if($_SESSION['user_info']){
			$info = I('session.user_info');
			$emailv = I('post.email');
			$title = I('post.title');
			$data['title'] = $title;
			$data['sendid'] = $info['id'];
			$data['recid'] = '1';
			$data['message'] = $emailv;
			$data['pdate'] = time();
			$doemail = M('message')->add($data);
			if($doemail){
				echo '1';
			}else{
				echo '2';
			}
		}else{
			echo '2';
		}
		
	}
	//站内信显示
	public function index(){
		$id = $_SESSION['user_info']['id'];
		$map['recid'] = $id;
		$count = M('message')->where($map)->count();
		$Page = new \Think\Page($count,5);
		$show = $Page->show();
		$info = M('message')->where($map)->order('pdate desc,statue')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('show',$show);
		$this->assign('list',$info);
		$this->display();
	}
	//信内内容
	public function show(){
		$id = I('get.eid');
		$statue = I('get.state');
		$map['id'] = $id;
		$info = M('message')->field('message,title')->where($map)->select();
		$emailval = $info[0];
		$data['statue'] = '1';
		$statues = M('message')->where($map)->save($data);
		$this->assign('info',$emailval);
		$this->display();
	}
	//删除站内信
	public function doDel(){
		$id = I('get.id');
		$map['id'] = $id;
		$info = M('message')->where($map)->delete();
	}
	//查看是否有站内信
	public function checkEmail(){
		$id = $_SESSION['user_info']['id'];
		$map['recid'] = $id;
		$map['statue'] = '0';
		$info = M('message')->field('statue')->where($map)->select();
		if($info){
			echo '1';
		}else{
			echo '2';
		}
	}
}	