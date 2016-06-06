//封装jd函数,专门负责按选择器查找元素,返回和选择器匹配的集合
//jd("选择器") -> 整个页面查找
//elem.jd("选择器") -> elem下查找
window.jd=HTMLElement.prototype.jd=function(selector){
  var result=(this==window?document:this).querySelectorAll(selector);
  result.length==1&&(result=result[0]);
  return result;
}
//顶部菜单栏
/*function show(){//弹出一级菜单
 this.jd('.'+this.className+'>a').className="hover";
 this.jd('[idjd="_items"]').style.display="block";
}
function hide(){//隐藏一级菜单
  this.jd('.'+this.className+'>a').className="";
  this.jd('[idjd="_items"]').style.display="none";
}
*/
function showAndHide(){
  var display=getComputedStyle(this.jd('[idjd="_items"]')).display;
  this.jd('[idjd="_items"]').style.display=display=="none"?"block":"none";
  this.jd('.'+this.className+'>a').className=display=="none"?"hover":"";
}
function toggleL1(){//显示或隐藏一级菜单
  //找到id为cate_box的ul,获取计算后display属性
  var display=getComputedStyle(jd("#cate_box")).display;
  //若display为none,改为block,否则为none
  jd("#cate_box").style.display=display=="none"?"block":"none";
}
function toggleL2(){//显示或隐藏二级菜单
  var display=getComputedStyle(this.jd('.sub_cate_box')).display;
  //若display为none,改为block,否则为none
  this.jd(".sub_cate_box").style.display=display=="none"?"block":"none";
  //找到当前li下h3
  this.jd("h3").className=this.jd('.sub_cate_box').style.display=="none"?"":"hover";
}
function showTab(e){
  e=e||window.event;
  //获取目标元素target:ul li a
  var target=e.target||e.srcElement;
  //如果target不是ul
  if(target.nodeName!="UL"){
    //如果target是a,设置target为target的父元素
      target.nodeName=="A"&&(target=target.parentNode);
    //如果target的class不是current
    if(target.className!="current"){
      //清除当前ul下class为current的li的class
      this.jd(".current").className="";
      //找到id为product_detail下的class为show的元素,清除class
      jd("#product_detail>.show").className="";
      //设置target的class为current
      target.className="current";
      //若target的i不是-1
      if(target.getAttribute("i")!=-1){
        //找到id为product_detail下的所有id以product_开头的直接子元素,保存在divs中
        var divs=jd("#product_detail>[id^='product_']");
        //获取divs中和target的i属性相同位置的div,设置class为show
        divs[target.getAttribute("i")].className="show";
      } 
    }
  }
}
/*尽量不要用变量临时存储DOM元素对象
  容易形成闭包
  闭包缺点:占用更多内存,且不易释放--内存泄漏
  解决:随用随查
*/
window.addEventListener("load",function(){
//顶部菜单栏  
  //找到class为app_id的li,为li绑定鼠标进入事件为show
  // jd(".app_jd").addEventListener('mouseover',showAndHide);
  $(".app_jd").bind('mouseover',showAndHide);
  //为li绑定鼠标移出事件为hide
  // jd(".app_jd").addEventListener('mouseout',showAndHide);
  $(".app_jd").bind('mouseout',showAndHide);
  //找到class为service的li...
  //jd(".service").addEventListener('mouseover',show);
  //jd(".service").addEventListener('mouseout',hide);
  jd(".service").addEventListener('mouseover',showAndHide);
  jd(".service").addEventListener('mouseout',showAndHide);
//全部商品分类
  //找到id为category的div,绑定onmouseover为toggleL1
  // jd("#category").addEventListener('mouseover',toggleL1);
  $("#category").bind('mouseover',toggleL1);
  //#category->onmouseout为toggleL1
  // jd("#category").addEventListener('mouseout',toggleL1);
  $("#category").bind('mouseout',toggleL1);
  //找到id为cate box的ul下的所有li.保存在lis中
  var lis=jd("#cate_box>li");
  for(var i=0;i<lis.length;i++){
    lis[i].addEventListener('mouseover',toggleL2);
    lis[i].addEventListener('mouseout',toggleL2);
  }
//商品详情的页签
  //找到id为product_detail下的class为main_tabs的ul绑定单击事件为showTab
  jd("#product_detail .main_tabs").addEventListener('click',showTab);
preview.init();
})
var preview={
  LICOUNT:0,//保存li总数
  moved:0,//保存已经左移的li个数,左移一次+1,右移一次-1
  LIWIDTH:0,
  STARTLEFT:0,
  ul:null,
  aLeft:null,//左边按钮,向右移动
  aRignt:null,

  MSIZE:0,//mask的宽高
  SMSIZE:0,//superMask的宽高
  MAX:0,
  mask:null,
  smask:null,
  init:function(){
  //找到id为icon_list的ul
    this.ul=jd("#icon_list");
    //获得ul计算后left值(去掉单位),保存在STARTLEFT中
    this.STARTLEFT=parseFloat(getComputedStyle(this.ul).left);
    //找到ul下的所有li,获得长度,保存在当前对象的LICOUNT中
    this.LICOUNT=this.ul.jd("li").length;
    //找到id为icon_list下的第一个子元素li,获得其计算后的width,转为浮点数,保存在LIWIDTH中
    this.LIWIDTH=parseFloat(getComputedStyle(jd("#icon_list>li:first-child")).width);
                                             //this.ul.firstElementChild
    //找到class以backward开头的a,保存在aLeft中
    this.aLeft=jd("[class^='backward']");
    //....aRight
    this.aRight=jd("[class^='forward']");
    //为当前对象aRight绑定click事件为move,同时为move方法提前绑定this为当前对象
    this.aRight.addEventListener("click",move.bind(this));
    this.aLeft.addEventListener("click",move.bind(this));
    //为ul绑定onmouseover事件
    this.ul.addEventListener('mouseover',changeMImg)
  //mask随鼠标移动
    //获得id为mask的div,保存在div中
    this.mask=jd("#mask");
    //获得mask计算后的width,转为浮点数,保存在MSIZE中
    this.MSIZE=parseFloat(getComputedStyle(this.mask).width);
    //获得id为superMask的div,保存在smask中
    this.smask=jd("#superMask");
    //获得smask计算后的width,转为浮点数,保存在SMSIZE中
    this.SMSIZE=parseFloat(getComputedStyle(this.smask).width);
    //为smask绑定鼠标进入事件为maskToggle
    this.smask.addEventListener("mouseover",maskToggle);
    //为smask绑定鼠标移出事件为maskToggle
    this.smask.addEventListener("mouseout",maskToggle);
  //为smask绑定鼠标移动事件
    //计算MAX:SMSIZE-MSIZE
    this.MAX=this.SMSIZE-this.MSIZE;
    //为smask绑定鼠标移动事件maskMove,同时提前绑定this为当前对象
    this.smask.addEventListener("mousemove",maskMove.bind(this));
    //
    }
}
function maskMove(e){//this->preview
  e=e||window.event;
  //分别获得相对于当前父元素的鼠标坐标x,y
  var x=e.offsetX;
  var y=e.offsetY;
  //计算mask的top:y-MSIZE/2
  var top=y-this.MSIZE/2;
  //计算mask的left:x-MSIZE/2
  var left=x-this.MSIZE/2;
  //如果top>MAX,就设置top为MAX,如果top<0就设置为0,否则不变
  top=top>this.MAX?this.MAX:top<0?0:top;
  //如果left>MAX,就设置left为MAX,如果left<0就设置为0,否则不变
  left=left>this.MAX?this.MAX:left<0?0:left;
  //设置mask的top等于top;left等于left
  this.mask.style.top=top+"px";
  this.mask.style.left=left+"px";
  //修改largeDiv的背景位置为-2top和-2left
  jd('#largeDiv').style.backgroundPosition=-16/7*left+"px "+-16/7*top+"px";
}
function maskToggle(){
  //找到id为mask的div
  //如果div的className为"",就改为show,否则改为""
  jd("#mask").style.display=jd("#mask").style.display=="block"?"none":"block";
  //找到id为largeDiv的元素,设置其display和mask的display一致
  jd("#largeDiv").style.display=jd("#mask").style.display;
  //获取id为mImg的src:xxx-m.jpg -> xxxx-l.jpg
  var src=jd("#mImg").src;
  //查找最后一个.的位置i
  // console.log(src);
  var i=src.lastIndexOf(".");
  //截取0-i之间的子字符串,拼上l,在拼上src中i到结尾的剩余字符
  //设置largeDiv的backgroundImage属性为url(src);
  // src=src.slice(0,i-1)+"l"+src.slice(i);
   
  jd("#largeDiv").style.backgroundImage="url("+src+")";
}
//小图片的左移和右移
function move(e){//this被bind替换为preview对象
 //获得事件对象e
 e=e||window.event;
 //获得目标元素target
 var target=e.target||e.srcElement;
 //如果target的className中不包含_disabled
 if(target.className.indexOf("_disabled")==-1){
  //如果target的className中包含forward
    //当前对象的moved+1
    this.moved+=target.className.indexOf("forward")!=-1?1:-1;
    //将当前对象的ul的left设置为:-LIWIDTH*moved+20
    this.ul.style.left=-this.LIWIDTH*this.moved+20+"px";
    //如果LICOUNT-moved==5
    if((this.LICOUNT-this.moved)==5){
      //aRight的className追加_disabled
      this.aRight.className="forward_disabled";
    }else if(this.moved==0){//否则,如果moved==0
      //在aLeft的className追加_disabled
      this.aLeft.className="backward_disabled";
    }else{//否则
      //设置aLeft的class为backward
      this.aLeft.className="backward";
      //设置aRight的class为forward
      this.aRight.className="forward";
    }
 }
}
function changeMImg(e){//this->ul
  //获得事件对象
  e=e||window.event;
  //获得target
  var target=e.target||e.srcElement;
  //如果target是IMG
  if(target.nodeName=="IMG"){
    //获取target的src,保存在变量src中
    var src=target.src;
    //找到src中最后一个.的位置i
    // var i=src.lastIndexOf(".");
    //截取0~i之前的子字符串,拼接上-m,在拼接上src中i到结尾的剩余字符,将拼接的结果保存回src中
    // src=src.slice(0,i)+"-m"+src.slice(i);
    //找到id为mImg的img元素,直接设置src属性为src
    jd("#mImg").src=src;
  }
}
