<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends CommonController {

    // 分类添加页
    public function cateAdd(){

    	$cate = M('categorys');
    	$info = $cate->field('id,catename,concat(path,"-",id) as catepath')->order('catepath')->select();
        // dump($cate->getLastSql());exit;
        $i = 0;
    	// dump($info);exit;
        foreach($info as $val)
        {
            $path = (strlen($val['catepath'])==3) ? 0 : strlen($val['catepath']);
            $data[$i]['id'] = $val['id'];
            $data[$i]['catename'] = str_repeat('&nbsp;',2*$path).$val['catename'];
            $i++;
        }
    	$this->data = $data;
        $this->display('category-add');

    }
    
    // 分类浏览页
    public function cateList(){
    	$cate = M('categorys');
    	$info = $cate->select();
    	// dump($info);exit;
    	$this->info = $info;
        $this->display('category-list');
    }

    // 分类添加执行
    public function add()
    {
        $catename = I('post.category_name');
        $cateid = I('post.category_id');

        $c=M('categorys'); 
		//查询父id的路径
		$cpath=$c->where("id={$cateid}")->field('path')->select();
		$data['catename'] = $catename;    
		$data['pid'] = $cateid;
		$data['addtime'] = time();
		//组合的路径
	    $data['path'] = ($cateid == 0) ? 0 : $cpath[0]['path'] . "-" . $cateid;

		// dump($cpath);exit;
	    $res = $c->data($data)->add();
	    if($res){
	    	$this->success('添加成功','cateList');
	    }
    }

    // 删除分类
    public function delCate()
    {
        $id = I('get.id');
        $res = M('categorys')->where('id='.$id)->delete();
    }
}