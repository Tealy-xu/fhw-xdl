<?php

namespace Home\Model;
use Think\Model;
class MessageModel extends Model {
	//新会员新处理
	public function setEmail($id)
	{
		$data['recid'] = $id;
		$data['sendid'] = '1';
		$data['pdate'] = time();
		$data['title'] = '给新会员的一封信';
		$data['message'] = '欢迎您加入我们繁花唯的大家族，在这里希望可以找到你需要的东西，我们繁花唯会不定时发信息给您告诉实时的活动咨询！';
		$info = M('Message')->add($data);
	}
}