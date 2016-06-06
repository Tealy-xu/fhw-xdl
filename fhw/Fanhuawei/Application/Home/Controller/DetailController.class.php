<?php
namespace Home\Controller;
use Think\Controller;
class DetailController extends Controller {
    public function particulars()
    {
        
        $map['id'] = I('get.goods_id');
        $goods = D('goods');

        // dump( S('info') ); //商品基本信息 缓存
        //商品基本信息 -------------------------------------
        if( !S('info') ){
            
            $info = $goods->field('id,name,price,intro,addtime,stock,image1,editorValue')
                            ->where($map)
                            ->select();

            $mdata = $info[0];
            //memcache 缓存信息 
              S('info', $mdata, 3600);
        }
        // dump( S('info') );
       

        //颜色图片 -----------------------------------------
        $map2['gid'] = $map['id'];
        $map2['attrid'] = 1;

        //dump( S('colorlist') );
        if( !S('colorlist') ){

            $colorlist = D('attrvalue')->where($map2)->select();
            S('colorlist', $colorlist, 3500);//memcache 缓存信息 
        }
        //dump( S('colorlist') );
        


        //商品详情图片---------------------------------------
        $map4['gid'] = $map['id'];
        $map4['attrid'] = 2;

        //dump( S('imglist') );
        if( !S('imglist') ){
            $imglist = D('attrvalue')->where($map4)->select();
            S('imglist', $imglist, 3400);//memcache 缓存商品详情图片信息
        }
        //dump( S('imglist') );
        


        //获取商品的规格参数------------------------------------                
        $map3['goodsid'] = $map2['gid'];

        $attrinfo = D('Detail')->getAttr($map3['goodsid']);
        $paralist = M('parapart')->where($map3)->select();
        

        //dump( S('list') );
        if( !S('list') ){

            $list = $attrinfo[2];
            foreach($attrinfo[2] as $k=>$v){
                foreach($paralist as $kk=>$vv){
                     if($v['id'] == $vv['aid']){
                        $list[$k]['val'] = $vv['content'];
                     }
                }
            }

            S('list', $list, 3300); //memcache 缓存规格参数信息
        }
        //dump( S('list') );


        //面包屑 -----------------------------------------
        //根据商品id拿分类id
        $goodscate = $goods->where($map)
                            ->field('cateid')
                            ->select(); 

        $name = ''; //breakXie 使用
        $breaklist = $this->breakXie($goodscate[0]['cateid']);
        rsort($breaklist);  

        //相关分类-----------------------------------------------
        $map4['catename'] = $breaklist[0];
        
        
        // dump( S('catenames') );
        if( !S('catenames') ){
            $cateModel = D('categorys');
            $cateinfo = $cateModel->where($map4)
                        ->field('id,catename,pid')
                        ->select();
            $catenames = $cateModel->where('pid='.$cateinfo[0]['id'])->select();
            S('catenames', $catenames, 3200);//memcache 缓存相关分类信息
        }
        // dump( S('catenames') );

        //浏览了该商品的用户最终购买---------------------------
        //dump( S('goodslist') );
        if( !S('goodslist') ){
            $goodslist = $goods->limit(4)
                            ->field('id,name,price,image1')
                            ->select();
            S('goodslist', $goodslist, 3250); //memcache 缓存终购买信息
        }
        //dump( S('goodslist') );
        
         

        //评论--------------------------------------------------
        $map5['gid'] = $map['id'];
        $map5['pid'] = 0;
        $map5['del'] = 1;
        $pinglist = $this->getComment()->join('fhw_users ON fhw_comment.uid = fhw_users.id' )
                        ->where($map5)
                           ->field('fhw_comment.id,odid,uid,gid,content,addtime,grade,username,avatar')
                        ->select();
         

        //拿评论图片
        $map8['gid'] = $map['id'];
        $pingimglist = $this->getCommentImg()
                            ->where($map8)
                            ->field('img,gid,cid')
                            ->select();

        // dump($pingimglist);

        //回复评论-------------------------------------------
        $map9['gid'] = $map['id'];
        $map9['status'] = 2;

        $huifu = $this->getComment()
                        ->where($map9)
                        ->select();
        // dump($huifu); 


        $this->assign('commentlist', $pinglist);  //评论
        $this->assign('pingimglist', $pingimglist);  //评论图片
        $this->assign('huifu',$huifu);
        $this->assign('goodsinfo',$attrinfo[0]);
        $this->assign('attrname', $attrinfo[1]); //顶级规格参数属性
        $this->assign('attrname2',S('list'));//次顶级规格参数属性     

        $this->assign('imgcolor', S('colorlist'));
        $this->assign('imglist', S('imglist')); //商品详情图片
        $this->assign('info',S('info'));  
        $this->assign('breaklist', $breaklist); //面包屑数组
        $this->assign('catenames',S('catenames'));  //相关分类
        $this->assign('goodslist', S('goodslist')); //浏览了该商品的用户最终购买
        $this->display();
    }

    //面包屑 获取函数
    public function breakXie($id)
    {   
        //根据传过来的商品id拿分类的名字
        $cate = D('categorys')->field('id,catename,pid')
                                ->where('id='.$id)
                                ->select();
                                             
        $GLOBALS['name'][] = $cate[0]['catename'];

        //判断是否有父级 有的话 递归 往下找
        if( $cate[0]['pid'] != 0 )
        {   
             
             $GLOBALS['name'] = $this->breakXie($cate[0]['pid']);
        }

        return $GLOBALS['name'];
    }

    public function shop()
    {   
        $data = $_POST;
        $this->ajaxReturn($data);
         
    }

    //获取comment对此模型
    public function getComment()
    {
        $comment = D('comment');

        return $comment;
    }

    //获取getCommentImg对此模型
    public function getCommentImg()
    {
        $commentimg = D('commentimg');

        return $commentimg;
    }

    public function updStock()
    {
        $id = I('get.id');
        $newnum = I('get.nowstocl');

        $map['id'] = $id;
        $data['stock'] = $newnum;

        $res = D('goods')->where($map)->save($data);

        // $this->ajaxReturn($newnum);
    }
}