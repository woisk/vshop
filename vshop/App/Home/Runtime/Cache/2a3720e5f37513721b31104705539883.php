<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0049)http://www.mxj.com/product/product/detail?id=1422 -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>商品详情</title>
<link rel="stylesheet" rev="stylesheet" href="__PUBLIC__/css/meixie.css">
<link rel="stylesheet" rev="stylesheet" href="__PUBLIC__/css/login.css">

<script src="__PUBLIC__/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/common.js"></script>

<link href="__PUBLIC__/js/artDialog/skins/blue.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="__PUBLIC__/js/artDialog/jquery.artDialog.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/artDialog/plugins/iframeTools.js"></script>
<script>
var URL = 'http://www.mxj.com/';
</script>
<!--
<script type="text/javascript" src="/static/style/default/js//product_product_detail.js"></script>
-->
</head>
<body><div class="aui_state_focus" style="position: absolute; left: -9999em; top: 224px; width: auto; z-index: 1987;"><div class="aui_outer"><table class="aui_border"><tbody><tr><td class="aui_nw"></td><td class="aui_n"></td><td class="aui_ne"></td></tr><tr><td class="aui_w"></td><td class="aui_c"><div class="aui_inner"><table class="aui_dialog"><tbody><tr><td colspan="2" class="aui_header"><div class="aui_titleBar"><div class="aui_title" style="cursor: move;">消息</div><a class="aui_close" href="javascript:/*artDialog*/;">×</a></div></td></tr><tr><td class="aui_icon" style="display: none;"><div class="aui_iconBg" style="background-image: none; background-position: initial initial; background-repeat: initial initial;"></div></td><td class="aui_main" style="width: auto; height: auto;"><div class="aui_content" style="padding: 20px 25px;"><div class="aui_loading"><span>loading..</span></div></div></td></tr><tr><td colspan="2" class="aui_footer"><div class="aui_buttons" style="display: none;"></div></td></tr></tbody></table></div></td><td class="aui_e"></td></tr><tr><td class="aui_sw"></td><td class="aui_s"></td><td class="aui_se" style="cursor: se-resize;"></td></tr></tbody></table></div></div>
<div class="viewport">
<div class="top">
    <a href="http://www.mxj.com/"><div class="logo"></div></a>
    <div class="top_menu">
       <ul>
          <li><a href="http://www.mxj.com/product/product/detail?id=1422#"></a></li>
          <li><a href="http://www.mxj.com/product/product/detail?id=1422#"></a></li>
          <li>
		   		   <a href="http://www.mxj.com/user/member"></a>
		   		  </li>
          <li><a href="http://www.mxj.com/product/product/detail?id=1422#"></a></li>
       </ul>
    </div>
</div>
<div class="menu">
   <a class="back" href="http://www.mxj.com/product/product/detail?id=1422#"></a>
   <div class="tit">商品列表</div>
   <a class="goods_sx" href="http://www.mxj.com/product/product/detail?id=1422#"></a>
</div>
<div class="shaixuan">
   <ul>
      <li>
	  <span>
	  <a href="http://www.mxj.com/product/product/&order=weight">推荐</a>
	  </span>
	  </li>
      <li>
	  <span><a href="http://www.mxj.com/product/product/&order=price">价格</a></span>
	  </li>
      <li>
	  <span><a href="http://www.mxj.com/product/product/&order=sells">销量</a></span>
	  </li>
      <li>
	  <span><a href="http://www.mxj.com/product/product/&order=dateline">最新</a></span>
	  </li>
   </ul>
</div>
<div class="goodslist">
    <ul>
	       </ul>
</div>
<div class="clear"></div>
<div class="page">
<style>
.red {
color:red;
border:1px red solid;
}
.gray {
color:gray;
border:1px gray solid;
background:;
background-color:gray;
}
</style>
<script>
/*
str="2,2,3,5,6,6"; //这是一字符串 
var strs= new Array(); //定义一数组 
strs=str.split(","); //字符分割
alert(strs.length);
alert(strs[0]);
*/

var products = eval('(<?php echo ($products); ?>)');		//所有产品
var specval = eval('(<?php echo ($specval); ?>)');			//属性关系
var attr_ids = eval('(<?php echo ($attr_ids_json); ?>)');  //属性json
<?php if(is_array($attr_ids)): $i = 0; $__LIST__ = $attr_ids;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$attr_id): $mod = ($i % 2 );++$i;?>var attr_id_<?php echo ($attr_id); ?> = '';<?php endforeach; endif; else: echo "" ;endif; ?>
var checked_id = 0;//被选中属性id
var pack_val = '';//组装后的值
//alert(specval[217][24][216]['v'].length);
/*
 * var a 属性id 
 * var j 产品属性id
 * var v 产品属性名称
*/

function xz(a,j,v){
	checked_id = a;
	//本属性处理
	var attr_obj = $('#attr_id_'+a+' input');//属性对象
	attr_obj.each(function(){
		var product_attr_id = $(this).attr('id');
		if(product_attr_id=='product_attr_id_'+j){
			if($(this).attr('class')=='red'){
			  $(this).removeClass('red');
			  eval('attr_id_'+a+' =""');
			  //删除
			}else{
			  $(this).addClass('red');
			}
			attr_reset_optional(a);//本属性切换先重置
		}else{
			eval('attr_id_'+a+' =""');
			$(this).removeClass('red');
		}
		//$(this).removeClass('red');
		//$(this).addClass('gray');
	});
	attr_optional();

}


//处理其他可选
function attr_optional(){
  var product_attr_id;
  //循环属性
  for(var i=0;i<attr_ids.length;i++){
	var attr_id = attr_ids[i];//属性id
	product_attr_id = '';
    $('#attr_id_'+attr_id+' input').each(function(){
		if($(this).attr('class')=='red'){
			product_attr_id = $(this).attr('val');
			//alert(product_attr_id);
			eval('attr_id_'+attr_id+' ="'+product_attr_id+'"'); //赋值
		}
	});
	//无值不做处理
	if(product_attr_id==''){
	  continue;
	}
	//alert(product_attr_id);
	for(var z=0;z<attr_ids.length;z++){
		//不同组
		var dif_attr_id = attr_ids[z];
		if(attr_id!=dif_attr_id){
			//alert(attr_id+'/'+product_attr_id+'/'+dif_attr_id);
			var opts_ids = specval[attr_id][product_attr_id][dif_attr_id]['v'];//可选产品属性id
			var attr_obj = $('#attr_id_'+dif_attr_id+' input');//属性对象
			//其他所有属性处理
			attr_obj.each(function(){
				//$(this).attr("disabled", true);
				var val = $(this).attr('val');
				var key = opts_ids.indexOf(val); //-1 不存在
				//查找不到值则不可选
				if(key==-1){
				  $(this).attr("disabled", true);
				}
			});
		}
	}
  }
  get_val();
}

//本属性切换,重置其他属性
function attr_reset_optional(attr_id){
	//其他属性可全部选择
	for(var i=0;i<attr_ids.length;i++){
		if(attr_ids[i]!=attr_id){
			var dif_attr_id = attr_ids[i];//属性id
			eval('attr_id_'+attr_id+' =""'); //赋值
			$('#attr_id_'+dif_attr_id+' input').each(function(){
				$(this).attr("disabled", false);	
			});
		}
	}
}

//取值
function get_val(){
	pack_val = '';
	for(var i=0;i<attr_ids.length;i++){
		var attr_id = attr_ids[i];//属性id
		$('#attr_id_'+attr_id+' input').each(function(){
			//$(this).attr("disabled", false);
			if($(this).attr('class')=='red'){
				if(pack_val==''){
					pack_val = $(this).attr('val');
				}else{
					pack_val += '|'+$(this).attr('val');
				}
			}
		});
	}

}

function tijiao(){
	//alert(pack_val);
	for(var i=0;i<products.length;i++){
	  if(products[i].product_attr==pack_val){
		var products_id = products[i].id;
		break;
	  }
	}
	alert(products_id);
}
</script>
    <ul>
	<?php if(is_array($attrs)): $k = 0; $__LIST__ = $attrs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$attr): $mod = ($k % 2 );++$k;?><li id="attr_id_<?php echo ($attr["attr_id"]); ?>">
			<a href="javascript:;" class="up"><?php echo ($attr["atrr_name"]); ?></a>
			<br>
	       <?php if(is_array($attr["value"])): $i = 0; $__LIST__ = $attr["value"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><span>
		   <input id="product_attr_id_<?php echo ($attr['ids'][$key]); ?>" val="<?php echo ($attr['ids'][$key]); ?>" type="button" value="<?php echo ($val); ?>" id="btn" onclick="xz(<?php echo ($attr["attr_id"]); ?>,<?php echo ($attr['ids'][$key]); ?>,'<?php echo ($val); ?>')"> 
		   <!--<a href="javascript:;" onclick="xz(<?php echo ($attr["attr_id"]); ?>,<?php echo ($attr['ids'][$key]); ?>,'<?php echo ($val); ?>')" class="up"><?php echo ($val); ?></a>
		   -->
		   </span>&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
	  </li><?php endforeach; endif; else: echo "" ;endif; ?>
	<!--
	          <li>
	   <a href="javascript:;" class="up">颜色</a>
	   <br>
	   	   <span id="00"><a href="javascript:;" onclick="xz(0,&#39;黑色&#39;,&#39;00&#39;)" class="up">黑色</a></span>&nbsp;&nbsp;
	   	   <span id="01"><a href="javascript:;" onclick="xz(0,&#39;蓝色&#39;,&#39;01&#39;)" class="up">蓝色</a></span>&nbsp;&nbsp;
	   	   </li>
	          <li>
	   <a href="javascript:;" class="up">尺码</a>
	   <br>
	   	   <span id="10"><a href="javascript:;" onclick="xz(1,&#39;39&#39;,&#39;10&#39;)" class="up">39</a></span>&nbsp;&nbsp;
	   	   <span id="11"><a href="javascript:;" onclick="xz(1,&#39;40&#39;,&#39;11&#39;)" class="up">40</a></span>&nbsp;&nbsp;
	   	   <span id="12"><a href="javascript:;" onclick="xz(1,&#39;41&#39;,&#39;12&#39;)" class="up">41</a></span>&nbsp;&nbsp;
	   	   <span id="13"><a href="javascript:;" onclick="xz(1,&#39;42&#39;,&#39;13&#39;)" class="up">42</a></span>&nbsp;&nbsp;
	   	   <span id="14"><a href="javascript:;" onclick="xz(1,&#39;43&#39;,&#39;14&#39;)" class="up">43</a></span>&nbsp;&nbsp;
	   	   <span id="15"><a href="javascript:;" onclick="xz(1,&#39;44&#39;,&#39;15&#39;)" class="up">44</a></span>&nbsp;&nbsp;
	   	   </li>
		   -->
	       </ul>
</div>
<div>
<INPUT TYPE="button" VALUE="提交" ONCLICK="tijiao();">
</div>
<br>
<br>
<br>
<!-- footer -->
<div class="f_menu">
   <ul> 
     <li><a href="http://www.mxj.com/">首  页</a></li>
     <li><a href="http://www.mxj.com/news/news/list?id=76">帮助中心</a></li>
     <li><a href="http://www.mxj.com/product/product/detail?id=1422#">反馈建议</a></li>
   </ul>
</div>
<div class="foot">
   <ul>
      <li><span class="foot_c">厂家直供<br>百分百正品</span></li>
      <li><span class="foot_s">7天包退换</span></li>
   </ul>
</div>
<div class="copy">
   <div class="c_menu"><a href="http://www.mxj.com/user/account/login">登录</a><a href="http://www.mxj.com/user/account/register">注册</a><a href="http://www.mxj.com/product/product/detail?id=1422#">客户端</a></div>
   <div class="c_info"><p>©2015美鞋家 ALL Rights Reserved</p>浙ICP备12398761</div>
</div>
</div>
<div style="display: none; position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; cursor: move; opacity: 0; background-color: rgb(255, 255, 255); background-position: initial initial; background-repeat: initial initial;"></div></body></html>