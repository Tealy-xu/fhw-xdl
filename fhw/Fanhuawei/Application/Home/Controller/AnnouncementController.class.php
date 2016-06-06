<?php
namespace Home\Controller;
use Think\Controller;
class AnnouncementController extends Controller {
    //公告列表
    public function AnnouncementList()
    {   
        // 查询满足要求的总记录数
        $count = $this->getArticle()->where('status=1')->count();

        // 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page = new \Think\Page($count,6);

        $show = $Page->show();// 分页显示输出

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $articlelist = $this->getArticle()->where('status=1')->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();

         

        // dump($count);
        $this->assign('page', $show);
        $this->assign('articlelist', $articlelist);
        $this->display();
    }


    //公告内容
    public function Announcement()
    {   
        $id = I('get.id');
        $ainfo = $this->getArticle()
                        ->where('id='.$id)
                        ->field('id,title,author,editorValue,addtime')
                        ->select();

        //拿出id大的一条数据 next
        $nextinfo = $this->getArticle()
                            ->where('id>'.$id)
                            ->field('id,title')
                            ->find();
        

        //拿出id小的一条数据 prep
        $prepinfo = $this->getArticle()
                            ->order('id desc')
                            ->where('id<'.$id)
                            ->field('id,title')
                            ->find();

        $this->assign('prepinfo', $prepinfo);  //上一篇
        $this->assign('nextinfo', $nextinfo);  //下一篇
        $this->assign('ainfo',$ainfo[0]);
        $this->display();
    	 
    }

    //获取对象Article模型 
    public function getArticle()
    {
        $article = D('article');

        return $article;
    }
}