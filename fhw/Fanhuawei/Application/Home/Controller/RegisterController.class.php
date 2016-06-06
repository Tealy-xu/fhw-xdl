<?php 
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller{
	//注册页面
	public function index()
	{
		$this->display();
	}

	//验证码
	public function verify()
	{
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
	//检查用户名
	public function checkName()
	{
		$name = I('post.name');
		$userStatus = 0;
		if(empty($name)){
			$userStatus = 0;
		}else{
			$user_info = M('users')->where(array('username'=>$name))->select();
			if($user_info){
				$userStatus = 1;
			}else{
				$userStatus = 2;
			}
		}
		echo $userStatus;
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

	//注册信息
	public function DoRegister()
	{
		$register_status = 0;
		$name = I('post.name');
		$pwd = I('post.pwd');

		$id=M('Users')->where(array('username'=>$name))->select();
		if($id){
			$register_status=0;
			echo $register_status;
			exit;
		}
		 if(empty($name)||empty($pwd)){
			$register_satatus=0;
		}else{
			$resList = D('Users');
			$user_id = $resList->doReg($name,$pwd);

			if($user_id){
				
				$register_status = 1;
				$map['username'] = $name;
				$idinfo = M('Users')->field('id,avatar')->where($map)->select();
				$id = $idinfo[0]['id'];
				$avatar = $idinfo[0]['avatar'];
				$save_info['id'] = $id;
				$save_info['user_points'] = 0;
				$save_info['avatar'] = $avatar;
				$save_info['username'] = $name;
				$save_info['regtime'] = date('Y-m-d H:i:s',$data['regtime']);
				$save_info['user_points'] = 0;
				session(C('USER_ID'),$userid);
				session(C('USER_INFO'),$save_info);
			}else{
				$register_status = 0;
			}
		}

		echo $register_status;
	}
	//插入新生EMAIL
	public function setEmail(){
		$name = $_GET['name'];
		$map['username'] = $name;
		$idinfo = M('Users')->field('id')->where($map)->select();
		$id = $idinfo[0]['id'];
		$email = D('Message')->setEmail($id);
	}
}