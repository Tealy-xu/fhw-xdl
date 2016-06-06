<?php
namespace Admin\Controller;
use Think\Controller;
class SystemController extends CommonController {
    public function baseSystem(){
        $this->display('system-base');
    }

    public function cateAddSystem(){
        $this->display('system-category-add');
    }

    public function cateSystem(){
        $this->display('system-category');
    }

    public function dataSystem(){
        $this->display('system-data');
    }

    public function logSystem(){
        $this->display('system-log');
    }
    
    public function shieldSystem(){
        $this->display('system-shielding');
    }
}