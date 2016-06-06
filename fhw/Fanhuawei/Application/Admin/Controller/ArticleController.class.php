<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends CommonController {
	//公告列表
    public function showArticle(){

    	$articlelist = $this->getArticle()
    						->field('id,title,addtime,author,status')
    						->where('del=1')
    						->select();
    	// dump($articlelist);

    	$this->assign('articlelist', $articlelist);  //公告列表
        $this->display('article-list');
    }

    //显示添加公告=================================
    public function addArticle()
    {
    	$this->display('article-add');
    }

    //处理添加公告数据
    public function doAddArticle()
    {	
    	$data = $_POST;
    	date_default_timezone_set("Asia/Shanghai");
    	$data['addtime'] = time();
    	
    	//数据添加
    	$res = $this->getArticle()->add($data);

    	// dump($res);

    	if($res){
    		$this->success('添加成功', U("showArticle"));
    	}else{
    		$this->error('添加失败', U("addArticle"));
    	}

    }

    //获取对象Article模型====================================
    public function getArticle()
    {
    	$article = D('article');

    	return $article;
    }


    //修改状态  审核 已审核
    public function updStatus()
    {	
    	$id = I('get.id');

    	//如果有id传过来做数据处理
    	if(!empty($id)){
    		$data['status'] = 1;
    		$res = $this->getArticle()->where('id='.$id)
    							->save($data);


    		$this->ajaxReturn($res);
    	}else{
    		$a = 'error';
    		$this->ajaxReturn($a);
    	}

    	
    }


    //修改公告
    public function updArticle()
    {
        $id = I('get.id');

        $ainfo = $this->getArticle()
                        ->where('id='.$id)
                        ->find();
        // dump($ainfo);

        $this->assign('ainfo', $ainfo);
        $this->display('article-upd');
    }

    public function doUpdArticle()
    {
        // dump($_POST);
        $data = $_POST;

        $res = $this->getArticle()
                    ->where('id='.$data['id'])
                    ->save($data);

        if( $res ){
            $this->success('修改成功', U('showArticle'));
        }
    }

    //文章不发布======================================
    public function updNoStatus()
    {

        $id = I('get.id');

        $map['status'] = 0;
        $res = $this->getArticle()
                ->where('id='.$id)
                ->save($map);

        $this->ajaxReturn($res);
    }


    //删除 公告
    public function updDel()
    {
        $id = I('get.id');
        $map['del'] = 0;

        $res = $this->getArticle()
                ->where('id='.$id)
                ->save($map);

        $this->ajaxReturn($res);
    }
}