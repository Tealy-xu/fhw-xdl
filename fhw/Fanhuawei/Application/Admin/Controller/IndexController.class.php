<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){

        $roleid = session()['user']['roleid'];
        $res = M('role')->field('role_auth_ids')->where('role_id='.$roleid)->select();
        $ids = $res[0]['role_auth_ids'];
        $levellist = M('auth')->where('auth_level = 0 and auth_id in ('.$ids.')')->select();
        $autolist = M('auth')->where('auth_level = 1 and auth_id in ('.$ids.')')->select();
        // dump($autolist);exit;

    	$user = session('user');
        $this->assign('user',$user);
        $this->assign('levellist',$levellist);
    	$this->assign('autolist',$autolist);
        $this->display();
    }

    public function welcome()
    {
        $user = session('user');
        // dump($user);exit;
        $this->assign('user',$user);
    	$this->display();
    }

    public function logout()
    {
    	$res = session('user',null);
        if($res == null){
    		$this->success('退出成功',U('login/login'));
    	}
    }

}