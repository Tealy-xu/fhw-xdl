<?php
namespace Home\Controller;
use Think\Controller;

class CatelistController extends Controller{

	public function catelist(){
	
		//接收分类id
		$category = I('get.cid');
		//接收排序字段
		$sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
		if(I('order') == 'asc'){
			$order = 'desc';
		}else{
			$order = 'asc';
		}
		// dump($order);
		//通过接收到的找到分类
		$parent_category = M('categorys')->where('id='.$category)->select();
		if(empty($parent_category)){
		    $this->error("你要查找的分类不存在!",U('index/index'));
		}
		// dump($parent_category[0]['pid']);exit;
		if($parent_category[0]['pid'] == 0){
		
			//通过父类就去找子分类
		    $child_category = M('categorys')->where('pid='.$category)->order('id asc')->select();
			//整合成要的结果
			$parents = array($category,$parent_category[0]['catename']);
			
			foreach($child_category as $value){
				$c_array[]=array('id'=>$value['id'],'name'=>$value['catename']);
			}

	        //所有当前分类的商品列表
			//如果商品的分类在子分类中就取出
			$map = '';
			foreach($c_array as $val){
				$map .= $val['id'].',';
			}
			$map = rtrim($map, ",");
			$where['cateid']=array('in',$map);
			$goodslist = M('goods')->where($where)->order($sort.' '.$order)->select();
			
		}else{
			//不是父类 就找到父类和同辈
			$pid = $parent_category[0]['pid'];
			// 找到父类
			$parent = M('categorys')->where('id='.$pid)->select();
			// 找到同辈
			$sibling = M('categorys')->where('pid='.$pid)->select();
			// 
			$parents = array($parent[0]['id'],$parent[0]['catename']);
			foreach($sibling as $value){
				$c_array[] = array('id'=>$value['id'],'name'=>$value['catename']);
			}

			$goodslist = M('goods')->where('cateid='.$category)->order($sort.' '.$order)->select();

		}
		// dump(M('goods')->getLastSql());exit;
		// dump($c_array);exit;
		// 当前类
		$this->order = $order;
		$this->sort = $sort;
		$currentid = $parent_category[0]['id'];
		$this->currentid = $currentid;
		//返回结果到前台
		//面包屑显示顶级分类
		$this->parents = $parents;
        //所有子类		 
        $this->categorys = $c_array;
        $this->goodslist = $goodslist;
		// dump($goodslist);exit;
		$this->display();
    }

}