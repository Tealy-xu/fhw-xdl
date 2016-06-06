<?php
namespace Admin\Model;
use Think\Model;

class AdminusersModel extends Model
{
	public function auth($name, $pwd)
	{
		$data['username'] = $name;
		$data['userpass'] = $pwd;
		$time['lastlogin'] = time();
		$time['lastip'] = get_client_ip();
		$res = $this->where($data)->select();
		$id['id'] = $res[0]['id'];
			// dump($time);exit;
		if($res){
			$this->where($id)->save($time);
			return $res;
            return true;
        }else{
            return false;
        }
	}
}