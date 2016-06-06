<?php
namespace Home\Model;
use Think\Model;
class PostinfoModel extends Model {

	public function newadd()
	{

	}
	//查询地址处理
	public function listAddress($id)
	{
		$info = M('postinfo')->where("uid=$id")->select();
		foreach ($info as $key => $value) {
			$value['adetail'] = $value['area'].$value['detail'];
			$dinfo[] = $value;
		}
		return $dinfo;
	}
	//添加地址处理
	public function addAddress($id)
	{
		$linkUser = I('post.linkuser');
		$detail = I('post.detail');
		$code = I('post.code');
		$tel = I('post.tel');
		$addr = I('post.addr');
		$pattern = "/^1[3|4|5|8][0-9]\d{8}$/i";
		$codetern = "/^(\d){6}$/i";
		if(!preg_match($codetern, $code)){
			echo '3';
			exit;
		}
		if(!preg_match($pattern, $tel)){
			echo '2';
			exit;
		}
		$data['uid'] = $id;
		$data['linkuser'] = $linkUser;
		$data['area'] = $addr;
		$data['detail'] = $detail;
		$data['tel'] = $tel;
		$data['code'] = $code;

		$map['uid'] = $id;
		$info = M('Postinfo')->where($map)->add($data);
		if($info){
			echo '1';
		}else{
			echo '0';
		}
	}
	//删除地址处理
	public function delPostinfo($id)
	{
		$map['id'] = $id;
		$info = M('postinfo')->where($map)->delete();
		if($info){
			return true;
		}else{
			return false;
		}
	}

}