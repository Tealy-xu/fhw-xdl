<?php
namespace Home\Controller;
use Think\Controller;
class BlogrollController extends Controller {
    //友情链接
    public function BlogrollList()
    {   
        $this->display();
    }

    public function addBlogroll()
    {
        // dump($_POST);
        $data = $_POST;
        // $data['addtime'] = time();

        // $this->getBlogro()->create($data);
        $b = D('Blogro');

        if (!$b->create()){ 

            exit($b->getError());

        }else{      
            // dump($data);
            // echo '2';
            $data['addtime'] = time();
            $res = $this->getBlogro()->add($data);
            if( $res ){
                $this->success('申请成功', U('index/index'));
            }
        }

        
    }

    public function getBlogro()
    {
        $blogro = D('blogro');

        return $blogro;
    }

     
}