<?php
namespace Admin\Model;
use Think\Model;

class ProductModel extends Model
{	
	 protected $tableName = 'goods';
	 public function getAttr($id)
	 {	

	 	 $goods['id'] = $id;
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

        $attrinfo[] = $goodsinfo[0];
        $attrinfo[] = $attrname;
        $attrinfo[] = $attrname2;

        return $attrinfo;
	 }
}