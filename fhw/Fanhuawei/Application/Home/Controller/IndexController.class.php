<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller
{
	public function index()
	{
		// 推荐列表
		$tuijian = M('goods')->limit(4)->select();

		// 手机分类遍历
		$phoneid = M('categorys')->field('id')->where('pid=10')->select();
		foreach($phoneid as $v){
			$pid .= ','.$v['id'];
		}
		$str = ',';
		$pid = ltrim($pid,$str);
		$phone = M('goods')->where('cateid in ('.$pid.')')->limit('2,6')->select();
		$firstphone = M('goods')->where('cateid in ('.$pid.')')->limit('1')->select();
		$this->firstphone = $firstphone;
		$this->phone = $phone;

		// 平板分类遍历
		$pinbanid = M('categorys')->field('id')->where('pid=15')->select();
		foreach($pinbanid as $v){
			$pdid .= ','.$v['id'];
		}
		$str = ',';
		$pdid = ltrim($pdid,$str);
		$pinban = M('goods')->where('cateid in ('.$pdid.')')->limit('2,6')->select();
		// dump($pdid);exit;
		$firstpinban = M('goods')->where('cateid in ('.$pdid.')')->limit('1')->select();
		$this->firstpinban = $firstpinban;
		$this->pinban = $pinban;

		// 家居分类遍历
		$jiajuid = M('categorys')->field('id')->where('pid=19')->select();
		foreach($jiajuid as $v){
			$jjid .= ','.$v['id'];
		}
		$str = ',';
		$jjid = ltrim($jjid,$str);
		$jiaju = M('goods')->where('cateid in ('.$jjid.')')->limit('2,6')->select();
		$firstjiaju = M('goods')->where('cateid in ('.$jjid.')')->limit('1')->select();
		$this->firstjiaju = $firstjiaju;
		$this->jiaju = $jiaju;

		// 配件分类遍历
		$peijianid = M('categorys')->field('id')->where('pid=23')->select();
		foreach($peijianid as $v){
			$pjid .= ','.$v['id'];
		}
		$str = ',';
		$pjid = ltrim($pjid,$str);
		$peijian = M('goods')->where('cateid in ('.$pjid.')')->limit('2,6')->select();
		$firstpeijian = M('goods')->where('cateid in ('.$pjid.')')->limit('1')->select();
		$this->firstpeijian = $firstpeijian;
		$this->peijian = $peijian;

		// 新闻列表遍历
		$msglist1 = M('article')->limit('0,5')->select();
		$msglist2 = M('article')->limit('6,5')->select();

		$this->msglist1 = $msglist1;
		$this->msglist2 = $msglist2;
		$this->tuijian = $tuijian;
		$this->display();
	}
}