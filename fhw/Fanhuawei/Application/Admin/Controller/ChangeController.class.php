<?php
namespace Admin\Controller;
use Think\Controller;
class ChangeController extends CommonController {
    //密码修改页面
    public function index(){
    	$id = I('get.id');
    	$user = D('Users');
    	$info = $user->listChange($id);
    	$this->assign('info',$info);
        $this->display('change-password');
        
    }
    //密码修改操作
    public function doChange(){

    	$user = D('Users');
    	$info = $user->doChange();
    	if($info){
    		$this->success('修改密码成功,请关闭窗口','',99);
    	}else{
    		$this->error('修改密码失败,请关闭窗口重新修改','');
    	}
    }

}