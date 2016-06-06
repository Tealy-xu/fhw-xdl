<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {

    public function yzm()
    {
        $config =    array(   
            'fontSize'    =>    30,    
            'length'      =>    3,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

    public function login()
    {
    	$this->display();
        $this->assign($yzm);
    }

    public function dologin()
    {
        $name = I('post.name');
        $pwd = md5(I('post.pass'));
        $code = I('post.code');
        $verify = new \Think\Verify();    
        $res = $verify->check($code, $id);
        if($res == true){
            $userModel = D('Adminusers');
            //登录验证
            $bool = $userModel->auth($name, $pwd);
            // dump(session());exit;
            if( $bool ){
                session('user',$bool[0]);
                $this->success('登录成功',U('index/index'));
            }else{
                $this->error('用户名或密码错误');
            }
        }else{
            $this->error('验证码错误');
        }

    }
}