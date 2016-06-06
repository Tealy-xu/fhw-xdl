<?php
namespace Admin\Controller;
use Think\Controller;
class ProductController extends CommonController {
    //显示商品列表
    public function showProduct(){

        //获取商品信息
        $infolist = M('goods')->where('del=1')
                              ->field('id,name,image1,intro,price,status')
                              ->select();

        // $this->assign('status', $status);
        $this->assign('infolist', $infolist); 
        $this->display('product-list');
    }


    //商品添加===============================================
    public function addProduct(){

        if(IS_POST){
            
            

            $data = $_POST;
            $data['addtime'] = time();
            $data['image1'] = ltrim($_POST['img'][0],'.');
            // $data['image2'] = ltrim($_POST['img'][1],'.');
            // $data['image3'] = ltrim($_POST['img'][2],'.');
            $goods = M('goods')->data($data)->add();

            // foreach( $data['img'] ){}
            for($i=0; $i<count($data['img']); $i++){
                $list[$i]['gid'] = $goods;
                $list[$i]['value'] = $data['color'][$i];
                $list[$i]['img'] = ltrim($data['img'][$i],'.');
                $list[$i]['attrid'] = 1;
            }

            // dump($list);exit;
            $attrval = D('attrvalue')->addAll($list);

            if($attrval){

                $this->redirect('Admin/Product/addAttr',array('id' => $goods));

            }else{
                $this->error('添加失败',U('showProduct'));
            }
        }else{

            //拿去商品分类
            $data = $this->getCate();
            
            $this->assign('catelist',$data);
            $this->display();
        }

       
    }


    //图片上传======================================================
    public function up(){
        $config = array(
            'maxSize'=>3145728,
            'exts'=>array('jpg','gif','png','jpeg'),
            );

        $info = $this->upload($config);

        $this->ajaxReturn($info);
    }

    public function upload( $config )
    {
        $upload = new \Think\Upload($config);

        //修改文件保存的根目录
        $upload->rootPath = './Public';

        //设置保存的路径
        $upload->savePath = './';

        //多文件上传
        $info = $upload->upload();

        //上传失败
        if( !$info ){
            //直接返回错误信息 不要直接跳转

            return array(
                'errcode'=>404,
                'msg'=>$upload->getError(),
                );
        }else{

            $savename = $info['pic']['savename'];
            $savepath = $info['pic']['savepath'];
            $tmp = $savepath.$savename;

            $data = array(
                'errcode'=>200,
                'fileName'=>$tmp,
                );

            return $data;
        }
    }


    //删除图片=====================================================
    public function delImg()
    {   
        // ./2016-05-10/57314c068690e.jpg
        $url = I('get.url');

        $url = ltrim($url,'.');

        $urlpath = './Public'.$url;

        $bool = unlink($urlpath);

        if($bool){
            echo '1';
        }else{
            echo '2';
        }

        //$this->ajaxReturn($urlpath);
    }


    

    //获取商品分类=============================================
    public function getCate()
    {
            $cate = M('categorys');
            $info = $cate->field('id,catename,concat(path,"-",id) as catepath')
                        ->order('catepath asc')
                        ->select();
             
            $i = 0;
            foreach($info as $val)
            {
                $path = (strlen($val['catepath'])==3) ? 0 : strlen($val['catepath']);
                $data[$i]['id']=$val['id'];
                $data[$i]['catename'] = str_repeat('&nbsp;',2*$path).$val['catename'];
                $i++;
            }

            return $data;
    }

    //商品参数规格详情添加 ========================================
    public function addAttr()
    {     
         

        //根据id获取商品参数主属性
        $goods['id'] = I('get.id');
        $goodsinfo = D('goods')->where($goods)->field('id,name,cateid,intro')->select();
        
        //顶级
        $map['cid'] = $goodsinfo[0]['cateid'];
        $cateids = D('paraattr')->where($map)->field('pid')->select();

        $data['id']=array('in',$cateids[0]['pid']);
        $attrname = D('paracate')->where($data)->select();

        //次顶级
        $attrids = D('paraattr')->where($map)->field('attr')->select();
        $data['id']=array('in',$attrids[0]['attr']);
        $attrname2 = D('paracate')->where($data)->select();

        // dump($attrname);
        // dump($attrname2);


        $this->assign('goodsinfo',$goodsinfo[0]);
        $this->assign('attrname',$attrname);
        $this->assign('attrname2',$attrname2);
        $this->display();
         
        
    }

    public function doAddAttr()
    {
        $goods_id = I('get.goodsid'); 
        $data = $_POST;
         

        foreach($data as $k=>$v){
            $datalist[] = array('aid'=>$k,'content'=>$v,'goodsid'=>$goods_id);
        }

        $res = D('parapart')->addAll($datalist);
        //dump($res);exit;
        if($res){
             
            $this->redirect('Admin/Product/addPic',array('id' => $goods_id));

        }else{
            $this->error('添加失败',U('addAttr'));
        }
    }


    //添加商品详细图片===============================================
    public function addPic()
    {
        if( IS_POST ){

            // $data = $_POST;
            // $map['pic1'] = $data['img'][0];
            // $map['pic2'] = $data['img'][1];
            // $map['pic3'] = $data['img'][2];
            // $map['pic4'] = $data['img'][3];
            // $map['pic5'] = $data['img'][4];

            // $map['gid'] = $data['goodsid'];

            // $res = D('goodspic')->add($map);
            // if($res){
            //     $this->success('添加成功',U('showProduct'));
            // }else{
            //     $this->error('添加失败',U('addPic'));
            // }

            $gid = I('post.goodsid');
            $data = $_POST['img'];

            $list = [];
            foreach( $data as $k=>$v ){
                $list[$k]['gid'] = $gid;
                $list[$k]['img'] = $v;
                $list[$k]['attrid'] = 2;
                $list[$k]['value'] = $k;
            }


            $res = $this->getAttrValue()->addAll($list);


            if($res){
                $this->success('添加成功',U('showProduct'));
            }
             


        }else{
            $goods['id'] = I('get.id');
            
            $goodsinfo = D('goods')->where($goods)->field('id,name,cateid,intro')->select();

            
            $this->assign('goodsinfo',$goodsinfo[0]);
            $this->display();
        }
    }


    //商品修改=====================================================
    public function updGoods()
    {
        $map['id'] = I('get.goods_id');

        //拿商品基本信息
        $ginfo = $this->getGoods()
                        ->where($map)
                        ->field('id,name,status,intro,price,cateid,editorValue')
                        ->select();

        //根据商品id 样式id 拿出样式图片
        $map3['gid'] = $map['id'];
        $map3['attrid'] = 1;
        $attrpic = $this->getAttrValue()
                            ->where($map3)
                            ->field('id,value,img')
                            ->select();

        // dump($attrpic);
        //拿去商品分类
        $data = $this->getCate();
        
        $this->assign('attrpic', $attrpic);
        $this->assign('catelist',$data);
        $this->assign('ginfo',$ginfo[0]);
        $this->display();
    }

    //删除样式图片
    public function delStyleImg()
    {
        $ids = I('get.id');
        $map['id'] = array('in',$ids);

    //删除图片
        //1.删除文件
        $dataimg = $this->getAttrValue()
                            ->where($map)
                            ->field('img')
                            ->select();  

        foreach($dataimg as $k=>$v){
            $urlpath = './Public'.$v['img'];
            unlink($urlpath);
        }
        //2.删除数据库
        // $map['id'] = array('in',$ids);
        $data = $this->getAttrValue()
                            ->where($map)
                            ->delete();
        


        $this->ajaxReturn($data);
    }

    public function doUpdGoods()
    {   
         
         
        $data = $_POST;
        $map['id'] = $data['id']; 
        $map2['gid'] = $data['id']; 
        //判断是否有上传图片
        if( !empty($_POST['img']) ){
             
            $data['image1'] = ltrim($_POST['img'][0],'.');
            

            // //删除原来的图片
            // $gimg = D('attrvalue')->where($map2)->select();
             
            // dump($gimg);

            // foreach($gimg as $k=>$v){
            //     $urlpath = './Public'.$v['img'];
            //     dump($urlpath);
            //     unlink($urlpath);
            // }

            //把颜色属性放到duoattr表里
            for($i=0; $i<count($data['img']); $i++){
                $list[$i]['gid'] = $map2['gid'];
                $list[$i]['value'] = $data['color'][$i];
                $list[$i]['img'] = ltrim($data['img'][$i],'.');
                $list[$i]['attrid'] = 1;
            }

            

            $attr = D('attrvalue');
            //$res = $attr->where($map2)->delete();

            $res2 = $attr->addAll($list);


            // dump($res2);exit;

            
        }

        // $data['image1'] = ltrim($_POST['img'][0],'.');
       
         
        $res = D('goods')->where($map)->save($data);

        if( $res ){
            $this->success('修改成功', U('showProduct'));
        }

    }

    //商品规格参数修改==================================
    public function updAttr()
    {   

        //根据id获取商品参数主属性
        $id = I('get.goods_id');
        $map['goodsid'] = $id;
        $attrinfo = D('Product')->getAttr($id);

        $paralist = M('parapart')->where($map)->select();
         

        $list = $attrinfo[2];
        foreach($attrinfo[2] as $k=>$v){
            foreach($paralist as $kk=>$vv){
                 if($v['id'] == $vv['aid']){
                    $list[$k]['val'] = $vv['content'];
                 }
            }
        }



        $this->assign('goodsinfo',$attrinfo[0]);
        $this->assign('attrname', $attrinfo[1]);
        $this->assign('attrname2',$list);
        $this->display();
    }

    public function doUpdAttr()
    {   
        $gid = I('get.goodsid'); 
        $data = $_POST;

        $map['goodsid'] = $gid; 

        $para = D('parapart');
        $para->where($map)->delete();

        foreach($data as $k=>$v){
            $datalist[] = array('aid'=>$k,'content'=>$v,'goodsid'=>$map['goodsid']);
        }


        $res = $para->addAll($datalist);
        if($res){
             
            $this->redirect('Admin/Product/showProduct');

        }else{
            $this->error('添加失败',U('showProduct'));
        }
    }

    //商品详细图片修改========================================
    public function updPic()
    {   
        $map['id'] = I('get.goods_id');
        $ginfo = $this->getGoods()
                        ->where($map)
                        ->field('id,name,status,intro,price,cateid')
                        ->select();

        $map2['gid'] = $map['id'];
        $map2['attrid'] = 2; 
        //拿商品图片详情路径
        $piclist = $this->getAttrValue()
                        ->where($map2)
                        ->field('id,value,img')
                        ->select();

        // dump($piclist);

        //根据商品id 样式id 拿出样式图片
        // $map3['gid'] = $map['id'];
        // $map3['attrid'] = 1;
        // $attrpic = $this->getAttrValue()
        //                     ->where($map3)
        //                     ->field('id,value,img')
        //                     ->select();

        $this->assign('piclist',$piclist);
        $this->assign('goodsinfo',$ginfo[0]);
        $this->display();
    }

     public function doUpdPic()
    {
        // dump($_POST);
        $map['id'] = I('post.goodsid');
        $data = $_POST;
        // dump($data); 

        $list = [];
        //判断图片是否不为空
        if( !empty($data['img']) ){

            foreach($data['img'] as $k=>$v){
                $list[$k]['img'] = $v;
                $list[$k]['value'] = $k;
                $list[$k]['gid'] = $data['goodsid'];
                $list[$k]['attrid'] = 2;
            }

        }
        // dump($list);exit;
        
            
        $res = $this->getAttrValue()->addAll($list);
            
            //修改成功
        if( $res ){
            $this->success('修改成功',U('showProduct'));
        }
       
    }

    //删除商品==================================================
    public function delGoods()
    {
        $id = I('post.goods');
        // $data['del'] = 0;
        // dump($id);

        // $res = D('goods')->where($map)->save($data);

        // if( $res ){
        //     $this->redirect('showProduct');
        // }
        $data['del'] = 0;
        $res = $this->getGoods()
                    ->where('id='.$id)
                    ->save($data);

        $this->ajaxReturn($res);
    }

    //修改商品状态 上架 下架==========================================
    public function updStatus()
    {
         $val = I('post.idVal');
         $goodsid = I('post.goods');

         if($val == 1){
            $data['status'] = 0;
         }else{
            $data['status'] = 1;
         }

         $res = $this->getGoods()
                    ->where('id='.$goodsid)
                    ->save($data);


         $this->ajaxReturn($res);
    }

    //获取商品模型
    public function getGoods()
    {
        $goods = D('Goods');

        return $goods;
    }

    //获取attrvalue表的模型
    public function getAttrValue()
    {
        $av = D('attrvalue');

        return $av;
    }
   
}