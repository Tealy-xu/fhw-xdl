<?php
namespace Admin\Controller;
use Think\Controller;
class BlogrollController extends CommonController {

	//友情链接列表===================================
	public function index()
	{ 	
		$map['del'] = 1;
		$blogrolist = $this->getBlogro()
							->field('id,name,url,namepic,addtime,state,email,qq')
							->where($map)
							->select();
		// dump($blogrolist);

		$this->assign('blogrolist', $blogrolist);
		$this->display();
	}

	//添加友情链接===================================
	public function addBlogroll()
	{
		$this->display();
	}

	public function doAddBlogroll()
	{
		// dump($_POST);
		$data = $_POST;
		$data['namepic'] = ltrim($data['img'][0],'.');
		$data['addtime'] = time();

		// dump($data);
		$res = $this->getBlogro()->add($data);
		// dump($res);

		if($res){
			$this->success('添加成功',U("index"));
		}
		 
	}


	//修改友情链接====================================
	public function updBlogroll()
	{  
        $id = I('get.id');

        //id拿数据
        $binfo = $this->getBlogro()
                        ->where('id='.$id)
                        ->find();
        // dump($binfo);
        $this->assign('binfo', $binfo);
		$this->display();
	}

    public function doUpdBlogroll()
    {
        // dump($_POST);
        $data = $_POST;
        $data['namepic'] = ltrim($data['img'][0],'.');
        // dump($data);

        $res = $this->getBlogro()
                        ->where('id='.$data['id'])
                        ->save($data);

        if( $res ){
            $this->success('修改成功', U('index'));
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

    //获取Blogro模型
    public function getBlogro()
    {
    	$blogro = D('blogro');

    	return $blogro;
    }

    //修改状态 审核
    public function updStatus()
    {
    	$id = I('get.id');
        $status = I('get.status'); 

    	$map['state'] = $status;
    	$this->getBlogro()
    			->where('id='.$id)
    			->save($map);

    	$this->ajaxReturn($id);
    }

    //删除链接===================================================
    public function delBlogro()
    {
    	$id = I('get.id');

    	$map['del'] = 0;
    	$res = $this->getBlogro()
    			->where('id='.$id)
    			->save($map);

    	$this->ajaxReturn($res);
    }

    //修改里删除链接图片
    public function delLogoImg()
    {
        $id = I('get.id');

        $picsrc = $this->getBlogro()
                    ->where('id='.$id[0])
                    ->field('namepic')
                    ->find();

        $urlpath = './Public'.$picsrc['namepic'];
        $bool = unlink($urlpath);
 
        $map['namepic'] = '';
        $res = $this->getBlogro()->where('id='.$id[0])->save($map);

         

        $this->ajaxReturn($bool);
    }

	 

}