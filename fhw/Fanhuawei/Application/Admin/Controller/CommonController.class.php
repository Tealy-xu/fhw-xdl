<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
    //在每个控制器都要判断是否登录
    public function _initialize()
    {
        //判断是否登录
        if( !session('user')){
            //跳转到登录页面
            $this->redirect('login/login');
        }

        $roleid = session()['user']['roleid'];
        $res = M('role')->field('role_auth_ac')->where('role_id='.$roleid)->select();
        $authUrl = $res[0]['role_auth_ac'];
        $nowUrl = CONTROLLER_NAME."-".ACTION_NAME;
        $allowUrl = array('Index-index','Index-welcome','Index-logout');
        // dump($res);exit;
        if(!in_array($nowUrl,$allowUrl) && strpos($authUrl,$nowUrl) === false){
        	$this->error('没有权限访问',U("index/index"));
        }
    }
}