<?php
namespace Admin\Controller;
use Think\Controller;
class ErrorController extends CommonController {
    public function error(){
        $this->display('404');
    }
}