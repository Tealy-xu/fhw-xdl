<?php
namespace Admin\Controller;
use Think\Controller;
class MemberController extends CommonController {
    //后台显示会员
    public function listMember(){
        $list = D('users');
        $listMember = $list->doListMember();
        $infoCount = count($listMember);
        $this->assign('info',$listMember);
        $this->assign('inCo',$infoCount);
        $this->display('member-list');
    }
    //后台添加会员
    public function doAdd()
    {
        $username = I('post.member-name');
        $email = I('post.email');
        $id=M('Users')->where(array('username'=>$username,))->select();
        if($id){
            $this->error('用户名已存在','http://localhost/pj2/Fanhuawei/index.php/Admin/Member/addMember');
        }
        $ed=M('Users')->where(array('email'=>$email,))->select();
        if($ed){
            $this->error('邮箱已经被人使用','http://localhost/pj2/Fanhuawei/index.php/Admin/Member/addMember');
        }
        $user = D('Users');
        $userinfo = $user->doAdd($username,$email);
        if($userinfo)
            $this->success('添加会员成功,请关闭窗口','http://localhost/pj2/Fanhuawei/index.php/Admin/Member/addMember');
    }
    //后台删除会员
    public function doDel()
    {
        $id = I('get.id');
        $user = D('Users');
        $userDel = $user->doDel($id);

    }
    //后台停用会员
    public function doStateOne()
    {
        $user = D('Users');
        $userState = $user->doStateOne($id);
    }
    //后台启用会员
    public function doStateZero()
    {
        $user = D('Users');
        $userState = $user->doStateZero($id);
    }
    //后台添加会员
    public function addMember(){
        
        $this->display('member-add');
    }

    public function delMember(){
        $this->display('member-del');
    }

    public function recBroMember(){
        $this->display('member-record-browse');
    }

    public function recDowMember(){
        $this->display('member-record-download');
    }

    public function recShaMember(){
        $this->display('member-record-share');
    }
    //显示用户详情
    public function showMember(){
        $id = I('get.id');
        $listMember = D('Users')->doOneMember($id);
        $this->assign('v',$listMember);
        $this->display('member-show');
    }


}