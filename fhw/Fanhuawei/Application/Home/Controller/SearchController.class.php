<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends Controller {
	// 简易查询，通过MYSQL自带的like
	public function search()
	{
		$keyword = I('get.keyword');
		// 如果没有获取到字段，则默认为ID字段
		$sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
		// 接收到的order字段进行更改，方便下次点击变化方法
		if(I('order') == 'asc'){
			$order = 'desc';
		}else{
			$order = 'asc';
		}
		$res = M('goods')->where('name like '."'%".$keyword."%'")->order($sort.' '.$order)->limit($Page->firstRow.','.$Page->listRows)->select();
		$num = count($res);
		$this->keyword = $keyword;
		$this->sort = $sort;
		$this->num = $num;
		$this->order = $order;
		$this->goodslist = $res;
		$this->display();
	}
}