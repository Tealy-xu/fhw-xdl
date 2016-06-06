<?php
namespace Admin\Controller;
use Think\Controller;
class PictureController extends CommonController {
    public function showPicture(){
        $this->display('picture-show');
    }
    public function listPicture(){
        $this->display('picture-list');
    }
    public function addPicture(){
        $this->display('picture-add');
    }

}