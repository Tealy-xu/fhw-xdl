<?php
namespace Admin\Controller;
use Think\Controller;
class FeedbackController extends CommonController {
    public function showFeedback(){
    	$map['pid'] = 0;
    	$clist = $this->getComment()
    					->where($map)
    					->select();

    	// dump($clist);

    	$list = $this->getComment()
    				->join('fhw_users ON fhw_users.id = fhw_comment.uid' )
                    ->join('fhw_orderdetail ON fhw_comment.odid = fhw_orderdetail.id' )
    				->field('fhw_comment.id,fhw_comment.uid,fhw_comment.odid,fhw_comment.content,fhw_comment.addtime,fhw_comment.gid,grade,username,avatar,email,fhw_comment.oid,fhw_orderdetail.goodsname,fhw_orderdetail.style,fhw_orderdetail.status,fhw_comment.comment2')
                    ->where('pid=0')
    				->select();

    	// dump($list);


    	$this->assign('list', $list);
        $this->display('feedback-list');
    }

    //回复评论======================================================
    public function addMember()
    {	
    	//odid uid gid cid
    	$map['odid'] = I('get.odid');
    	// $map['uid'] = I('get.uid');
    	$map['gid'] = I('get.gid');
    	$map['cid'] = I('get.cid');
        $map['oid'] = I('get.oid');
    	// dump($map);

    	$this->assign('cinfo',$map);
    	$this->display('member-add');
    }

    //处理回复评论
    public function doAddMember()
    {
    	 
    	$data = $_POST;
        // dump($data); 
    	$data['pid'] = $data['cid'];
    	$data['addtime'] = time();
    	$data['status'] = 2;
        // $data['comment2'] = 1;

    	// dump($data);exit;
    	$res = $this->getComment()->add($data);

    	if( $res ){
            $map['comment2'] = 1;
            $this->getComment()->where('id='.$data['pid'])->save($map);

    		$this->success('回复成功',U('showFeedback'));
    	}
    }

    //追加回复评论
    public function addBackMember()
    {   
        // echo "string";
        $map['odid'] = I('get.odid');
        // $map['uid'] = I('get.uid');
        $map['gid'] = I('get.gid');
        $map['cid'] = I('get.cid');
        // $map['oid'] = I('get.oid');
        // dump($map);

        $this->assign('cinfo',$map);
        $this->display('member-add-back');
    }

    public function doAddBackMember()
    {
        $data = $_POST;
        // dump($data); 
        $data['pid'] = $data['cid'];
        $data['addtime'] = time();
        $data['status'] = 2;
        // $data['comment2'] = 1;

        // dump($data);exit;
        $res = $this->getComment()->add($data);

        if( $res ){
            $map['comment2'] = 2;
            $cres = $this->getComment()->where('id='.$data['pid'])->save($map);

            if( $cres ){
                $this->success('回复成功',U('showFeedback'));
            }
             
        }
    }

    //获取comment模型对象
    public function getComment()
    {
    	$comment = D('comment');

    	return $comment;
    }

    //获取user模型对象
    public function getUsers()
    {
    	$users = D('users');

    	return $users;
    }

}