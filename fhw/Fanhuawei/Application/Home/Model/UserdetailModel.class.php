<?php

namespace Home\Model;
use Think\Model;
class UserDetailModel extends Model {
	//用户详情处理
	public function setUserDetail($uid)
	{
		$map['uid'] = $uid;
		$data['uid'] = $uid;
		$data['sex'] = I('post.sex');
		$data['name'] = I('post.true_name');

		$yinfo = M('Userdetail')->field('uid')->where($map)->select();
		if($yinfo){
			$info = M('Userdetail')->where($map)->save($data);
		}else{
			$info = M('Userdetail')->add($data);
		}
		if($info)
			return $info;
	}
	//图片上传处理
	 public function upload()
    {

        $upload = new \Think\Upload();

        //设置一些参数
        $upload->maxSize = 3145728; 

        //允许上传类型
        $upload->exts = array('jpg','gif', 'png', 'jpeg');

        //修改文件保存的根目录
        $upload->rootPath = './Public/';

        //设置保存的路径
        $upload->savePath = './UserPhoto/';

        //做上传
        $info = $upload->upload();

        return $info;
    }
	
}