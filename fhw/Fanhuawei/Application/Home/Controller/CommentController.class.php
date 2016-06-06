<?php
namespace Home\Controller;
use Think\Controller;
class CommentController extends Controller {
     public function index(){

     	$uid = $_SESSION['user_info']['id'];


     	$olist = D('orders')->where('uid='.$uid.' and state=4')->field('id,state')->select();

     	$oids = '';
     	foreach($olist as $k=>$v){
     		$oids .= ','.$v['id'];
     	}
     	$oids = ltrim($oids,',');

     	$map['oid'] = array('in',$oids);
     	//$od = $this->getOrderDetail()->where($map)->select();

     	$count = $this->getOrderDetail()->where($map)->count();// 查询满足要求的总记录数
     	$Page = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数(6)
     	$show = $Page->show();// 分页显示输出

     	// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
     	$odlist = $this->getOrderDetail()
     						->where($map)
     						->order('id desc')
     						->limit($Page->firstRow.','.$Page->listRows)
     						->select();


     	foreach($odlist as $k=>$v){
     		
     		$cinfo = D('comment')
     					->where('odid='.$v['id'])
     					->field('grade')
     					->select();
     		$odlist[$k]['grade'] = $cinfo[0]['grade'];
     	}

	    // dump($olist);
     // 	dump($oids);
     // 	dump($count);
     	// dump($odlist);

     	$this->assign('page',$show);// 赋值分页输出
	    $this->assign('commentlist',$odlist);
	    $this->display();
	 }

	 //添加评论====================================================
	 public function addComment()
	 {	
	 	$map['uid'] = $_SESSION['user_info']['id'];
	 	$map['odid'] = I('get.odid');
	 	$map['gid'] = I('get.gid');
	 	$map['num'] = I('get.num');
	 	$map['subtotal'] = I('get.subtotal');
	 	$map['style'] = I('get.style');
	 	$map['odid'] = I('get.odid');

	 	

	 	$srcimg  =$this->getGoods()->where('id='.$map['gid'])->field('name,image1')->select();
	 	$map['srcimg'] = $srcimg[0]['image1'];
	 	$map['goodsname'] = $srcimg[0]['name'];

	 	// dump($map);
 	
 		$this->assign('ginfo',$map);
	 	$this->display();
	 }

	 public function doAddComment()
	 {
	 	// dump($_POST);   
	 	$data = $_POST;
	 	//先查数据
	 	$data['uid'] = $_SESSION['user_info']['id'];
	 	$data['addtime'] = time();
	 	$data['status'] = 1;

	 	// dump($data); 

	 	//评论不能为空
	 	if( empty($data['content']) ){
	 		$this->redirect('index');
	 	}

	 	//评价不能为空
	 	if( empty($data['grade']) ){
	 		$this->redirect('index');
	 	}


	 	$res = $this->getComment()->add($data);
	 	// dump($res);

	 	//在插图片
	 	if(!empty($data['img'])){
	 		$imgs = $data['img'];
		 	$imglist = [];
		 	foreach($imgs as $k=>$v){
		 		$imglist[$k]['img'] = ltrim($v,'.');
		 		$imglist[$k]['uid'] = $data['uid'];
		 		$imglist[$k]['odid'] = $data['odid'];
		 		$imglist[$k]['gid'] = $data['gid'];
		 		$imglist[$k]['cid'] = $res;

		 		$imgres = $this->getCommentImg()
	 					->addAll($imglist);
	 	}
	 	}

	 	// dump($imglist);


	 	

	 	//修改订单详情表
	 	$map['id'] = $data['odid'];
	 	$data2['status'] = 2;
	 	$odres = $this->getOrderDetail()
	 				->where($map)
	 				->save($data2);

	 	// dump($imgres);
	 	if( $odres ){
	 		$this->success('添加成功', U('index'));
	 	}

	 	
	 }

	 //追加回复
	 public function addBackComment()
	 {
	 	$map['uid'] = $_SESSION['user_info']['id'];
	 	$map['odid'] = I('get.odid');
	 	$map['gid'] = I('get.gid');
	 	$map['num'] = I('get.num');
	 	$map['subtotal'] = I('get.subtotal');
	 	$map['style'] = I('get.style');
	 	$map['odid'] = I('get.odid');

	 	

	 	$srcimg  =$this->getGoods()->where('id='.$map['gid'])->field('name,image1')->select();
	 	$map['srcimg'] = $srcimg[0]['image1'];
	 	$map['goodsname'] = $srcimg[0]['name'];

	 	//拿首条评论id
	 	$map2['odid'] = $map['odid'];
	 	$map2['status'] = 1;
	 	$cinfo = $this->getComment()
	 					->where($map2)
	 					->field('id')
	 					->select();

	 	$map['cid'] = $cinfo[0]['id'];
	 	// dump($map);
 	
 		$this->assign('ginfo',$map);
	 	$this->display();
	 }

	 public function doAddBackComment()
	 {
	 	// dump($_POST);
	 	$data = $_POST;
	 	$data['addtime'] = time();
	 	$data['uid'] = $_SESSION['user_info']['id'];
	 	$data['status'] = 2;
	 	$data['comment2'] = 1;

	    $res = $this->getComment()->add($data);

	    if( $res ){
	    	//修改订单详情的评论状态 
	    	$data2['status'] = 3;
	    	$map['id'] = $data['odid'];
	    	$odres = $this->getOrderDetail()->where($map)->save($data2);

	    	if( $odres ){
	    		$this->success('追加评论成功', U('index') );
	    	}
	    }
	 	
	 }

	 //获取orders对象模型===========================================
	 public function getOrders()
	 {
	 	$orders = D('orders');

	 	return $orders;
	 }

	 //获取orders对象模型
	 public function getOrderDetail()
	 {
	 	$orderdetail = D('orderdetail');

	 	return $orderdetail;
	 }

	 //获取goods对象模型
	 public function getGoods()
	 {
	 	$goods = D('goods');

	 	return $goods;
	 }

	 //获取Comment对象模型
	 public function getComment()
	 {
	 	$comment = D('comment');

	 	return $comment;
	 }

	 //获取CommentImg对象模型
	 public function getCommentImg()
	 {
	 	$commentimg = D('commentimg');

	 	return $commentimg;
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
}