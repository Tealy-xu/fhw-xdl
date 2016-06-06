<?php 
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
	
	//登录页面
	public function index()
	{
		$this->display();
	}



	//验证码
	public function verify(){
	     //配置验证码
	     $config=array(
		   'imgW'=>'140',
		   'imgH'=>'65',
		   'length'=>4,
		   'bg'=>array(253,253,253),
		   'useNoise'=>false,
		   'fontSize'=>30
		    
		 
		 );
	     $Verify = new \Think\Verify($config);
		 $Verify->entry();
	
	}
	//验证登录
	public function remoteLogin(){
 			
	     $name=I('post.uname');
		 $pwd=I('post.pwd');
		 $rembername=I('post.rembername');

		 if(empty($name)||empty($pwd)){
			$status=0;
			}else{
				$use = M('Users');
				$use_info = $use->where(array('username'=>$name))->select();
				if($use_info){
					if($use_info[0]['state'] == 0){
						//账号被禁用
						$status = 1;
					}else{
						$user = D('Users');
						$userinfo = $user->doLogin($name,$pwd);
						if($userinfo){
							$status = 2;
						}else{
							$status = 0;
						}
					}
				}
			}
			echo $status;

	}

	//验证码验证
	public function checkVerify($code,$id='')
	{
		$code = I('get.code');
		$verify = new \Think\Verify();  
		if($verify->check($code, $id)){
				$data=1;
			}else{
			    $data=0;
			}
		echo $data;
	}

	//登出
	public function logout()
	{
		session('user_info',null);
		$this->redirect('Index/index');
	}

}
