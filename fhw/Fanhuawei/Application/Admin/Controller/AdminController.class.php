<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends CommonController {
    //管理员
    public function showAdmin()
    {   

        $adminUser = M('adminusers')->where('status=1')->select();

        foreach($adminUser as $k=>$v){
            $map['role_id'] = $v['roleid'];
            $ainfo = $this->getRole()
                            ->field('role_id,role_name')
                            ->where($map)
                            ->select();
            // dump($ainfo);
            $adminUser[$k]['role_name'] = $ainfo[0]['role_name'];
        }
        // dump($adminUser); 
        $this->assign('adminUser',$adminUser);
        $this->display('admin-list');
    }

    

    public function getCategory()
    {
        $rolelist = $this->getRole()->select();
        // dump($rolelist);

        $str = '<option value="0" >--请选择--</option>';
        foreach($rolelist as $k=>$v){
            $str .= "<option value='{$v["role_id"]}'>{$v["role_name"]}</option>";
        }

        $this->ajaxReturn($str);
    }

    //添加 users =======================================================
    public function addAdmin()
    {   
        $rolelist = $this->getRole()->select();
        // dump($rolelist);
        $this->display('admin-add');
    }

     public function doAddAdmin()
    {
        $data['username'] = I('post.username');
        $data['userpass'] = md5(I('post.userpass'));
        $data['regtime'] = time();
        $data['state'] = I('post.state');
        $data['roleid'] = I('post.roleid');
        // dump($data);
        $addAdmin = M('adminusers');
        $res = $addAdmin->data($data)->add();
        // dump($res);exit;
        // if($res){
        //     $this->success('添加成功!','addAdmin');
        // }

        $this->ajaxReturn($res);
    }

    //修改 user ==================================================
    public function updAdmin()
    {   
        $id = I('get.id');

        $map['id'] = $id;
        $userinfo = $this->getAdminUsers()
                            ->where($map)
                            ->field('id,username,roleid')
                            ->select();

        // dump($userinfo);
        $this->assign('userinfo',$userinfo[0]);
        $this->display('admin-upd');
    }

    public function doUpdAdmin()
    {   
        // $data['username'] = I('post.username');
        $data['roleid'] = I('post.roleid');
        $map['id'] = I('post.id');
        $pass = md5(I('post.userpass'));  

        // $userpass = $this->getAdminUsers()
        //                         ->where($map)
        //                         ->field('userpass')
        //                         ->select();
        //判断密码 是否更改
        if( !empty($_POST['userpass']) ){
            $data['userpass'] = $pass;
        }

        // dump($map);
        // dump($data);exit;

        $res = $this->getAdminUsers()
                        ->where($map)
                        ->save($data);

         $this->ajaxReturn($res);
        
    }

    //删除管理员
    public function delUsers()
    {
        $map['id'] = I('get.id');
        $data['status'] = 0;

        $res = D('adminusers')->where($map)->save($data);

        $this->ajaxReturn($res);


    }

    public function delUser()
    {
        $map['id'] = I('get.id');
        $data['disable'] = I('get.disable');

        

        $res = D('adminusers')->where($map)->save($data);

        $this->ajaxReturn($res);
    }

    //权限 list
    public function permissionAdmin()
    {   
        $info = $this -> getInfo();

        // dump($info);
        $this -> assign('info', $info);
    	$this->display('admin-permission');
    }

    //角色 list=====================================================
    public function roleAdmin()
    {   
        $info = D('Role')->where('del = 1')->select();

        $namelist = [];
        foreach($info as $k=>$v){
            $map['roleid'] = $v['role_id'];
            $namelist = $this->getAdminUsers()
                                ->where($map)
                                ->field('id,username')
                                ->select();
            // dump($namelist);

            $strname = '';
            foreach($namelist as $Kk=>$vv){
                $strname .= $vv['username'].'&nbsp;&nbsp;';
            }

            $info[$k]['username'] = $strname;

        }

        // dump($info);



        

        $this -> assign('info',$info);
    	$this->display('admin-role');
    }

    //角色添加======================================================
    public function roleaddAdmin()
    {   
        //查询全部的权限信息，放入模板显示并进行权限分配
        $pauth_info = D('Auth')->where('auth_level=0')->select(); //父级权限
        $sauth_info = D('Auth')->where('auth_level=1')->select(); //次父级权限
        $tauth_info = D('Auth')->where('auth_level=2')->select(); //次次父级权限
        

        // dump($fauth_info);exit;
        $this -> assign('fauth_info',$fauth_info);
        $this -> assign('pauth_info',$pauth_info);
        $this -> assign('tauth_info',$tauth_info);
        $this -> assign('sauth_info',$sauth_info);
    	$this->display('admin-role-add');
    }

    public function doRoleAddAdmin()
    {
        // dump($_POST);
        $role_name = I('post.user-name');
        $intro = I('post.intro');
        //利用RoleModel模型里边的一个专门方法实现权限分配
        $role = D('Role');

        //saveAuth接收到一维数组信息
        $z = $role -> addAuth($_POST['authname'], $role_name, $intro);

        // dump($z);
        if( $z ){
            $this->success('添加成功', U('roleAdmin'));
        }
    }

    //角色修改============================================================
    public function roleUpdAdmin()
    {
        $role_id = I('get.role_id');

        //根据$role_id查询对应的角色名字
        $rinfo = D("Role")->getByRole_id($role_id);

        //查询全部的权限信息，放入模板显示并进行权限分配
        $pauth_info = D('Auth')->where('auth_level=0')->select(); //父级权限
        $sauth_info = D('Auth')->where('auth_level=1')->select(); //次父级权限
        $tauth_info = D('Auth')->where('auth_level=2')->select(); //次父级权限


        // dump($tauth_info);


        //把当前角色对应的权限信息给查询出来
        $authinfo = D("Role")->getByRole_id($role_id);
        $ids = rtrim($authinfo['role_auth_ids'],',');
        $auth_ids_arr = explode(',',$authinfo['role_auth_ids']); //数组auth_id 信息

        // dump($ids);

        $this -> assign('role_id',$role_id);
        $this -> assign('auth_ids_arr', $auth_ids_arr);
        $this -> assign('pauth_info',$pauth_info);
        $this -> assign('sauth_info',$sauth_info);
        $this -> assign('tauth_info',$tauth_info);
        $this -> assign('role_name', $rinfo['role_name']);
        $this->display('admin-role-upd');
    }

    public function doRoleUpdAdmin()
    {
        // dump($_POST);
        $role_id = I('post.role_id');
        //利用RoleModel模型里边的一个专门方法实现权限分配
        $role = D('Role');

        //saveAuth接收到一维数组信息
        $z = $role -> saveAuth($_POST['authname'], $role_id);
        // dump($z);exit;
        if( $z ){
            $this->success('编辑成功', U('roleAdmin'));
        }

    }

    //角色删除
    public function delRole()
    {
        $role_id = I('get.role_id');


        $data['del'] = 0;
        $z = $this->getRole()->where('role_id='.$role_id)->save($data);

        $this->ajaxReturn($role_id);
    }

   

    public function delAdmin()
    {
        $id['id'] = I('get.id');
        $del = M('adminusers');

        $del->where($id)->delete();
    }


    function getInfo($flag=false){
        //如果$flag标志为false，查询全部的权限信息
        //如果$flag标志为true,只查询level=0/1的权限信息
        $auth = D('Auth');
        if($flag == true){
        $info = D('Auth')->where('auth_level<2')->order('auth_path asc')->select();
        }else {
        $info = D('Auth')->order('auth_path asc')->select();
        }
        //$info[X][auth_name] = "->"auth_name
        foreach($info as $k => $v){
            $info[$k]['auth_name'] = str_repeat('-->',$v['auth_level']).$info[$k]['auth_name'];
        }
        return $info;
    }

    //获取 role 对象模型
    public function getRole()
    {
        $role = D('Role');

        return $role;
    }

    //获取 adminusers 对象模型
    public function getAdminUsers()
    {
        $adminusers = D('adminusers');

        return $adminusers;
    }
}