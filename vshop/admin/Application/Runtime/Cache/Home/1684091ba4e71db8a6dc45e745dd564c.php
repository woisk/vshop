<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="x-ua-compatible"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($head_title); ?></title>
<link rel="stylesheet" type="text/css" href="/guoji/vshop/admin2/Public/css/style.css" />
<style>
body{
 background:#f1f1f1;
}
</style>
<!--[if IE 6]>
<script type="text/javascript" src="/guoji/vshop/admin2/Public/js/DD_belatedPNG.js" ></script>
<script type="text/javascript">
DD_belatedPNG.fix('*');
</script>
<![endif]-->

<script type="text/javascript" src="/guoji/vshop/admin2/Public/js/jquery.js"></script>

<script type="text/javascript" src="/guoji/vshop/admin2/Public/js/common.js"></script>
<link rel="stylesheet" type="text/css" href="/guoji/vshop/admin2/Public/js/artDialog/skins/chrome.css" />
<script type="text/javascript" src="/guoji/vshop/admin2/Public/js/artDialog/jquery.artDialog.js"></script>
<script type="text/javascript" src="/guoji/vshop/admin2/Public/js/artDialog/plugins/iframeTools.js"></script>

<link rel="stylesheet" type="text/css" href="/guoji/vshop/admin2/Public/css/icon.css">
<?php if(ACTION_NAME=='index' && MODULE_NAME!='Config'){ ?>
<link rel="stylesheet" type="text/css" href="/guoji/vshop/admin2/Public/js/EasyUI/themes/haidaoblue/easyui.css">
<script type="text/javascript" src="/guoji/vshop/admin2/Public/js/EasyUI/jquery.easyui.min.js"></script>
<script type="text/javascript" src="/guoji/vshop/admin2/Public/js/EasyUI/locale/easyui-lang-zh_CN.js"></script>
<script type="text/javascript" src="/guoji/vshop/admin2/Public/js/EasyUI/hd_default_config.js"></script>
<?php } ?>
<SCRIPT LANGUAGE="JavaScript">
//指定当前组模块URL地址
var ROOT = '/guoji/vshop/admin2';
var URL = '/guoji/vshop/admin2/index.php/Product';
var APP	 =	 '/guoji/vshop/admin2/index.php';
var PUBLIC = '/guoji/vshop/admin2/Public';
var uid = '<?php echo $_SESSION[C("USER_AUTH_KEY")]; ?>';
var hash = '<?php echo ($hash); ?>';
//图片预览
function yulan(file,div_id){
  var div_id = div_id ? div_id : 'preview';
  var img_id = div_id+'imghead';
  var MAXWIDTH  = 200;
  var MAXHEIGHT = 200;
  var div = document.getElementById(div_id);
  if (file.files && file.files[0])
  {
    div.innerHTML = '<img id='+img_id+'>';
    var img = document.getElementById(img_id);
    img.onload = function(){
      var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
      img.width = rect.width;
      img.height = rect.height;
      img.style.marginLeft = rect.left+'px';
      img.style.marginTop = rect.top+'px';
    }
    var reader = new FileReader();
    reader.onload = function(evt){img.src = evt.target.result;}
    reader.readAsDataURL(file.files[0]);
  }
  else
  {
    var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
    file.select();
    var src = document.selection.createRange().text;
    div.innerHTML = '<img id='+img_id+'>';
    var img = document.getElementById(img_id);
    img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
    var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
    status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
    div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;margin-left:"+rect.left+"px;"+sFilter+src+"\"'></div>";
  }
}

function clacImgZoomParam( maxWidth, maxHeight, width, height ){
    var param = {top:0, left:0, width:width, height:height};
    if( width>maxWidth || height>maxHeight )
    {
        rateWidth = width / maxWidth;
        rateHeight = height / maxHeight;
        if( rateWidth > rateHeight )
        {
            param.width =  maxWidth;
            param.height = Math.round(height / rateWidth);
        }else
        {
            param.width = Math.round(width / rateHeight);
            param.height = maxHeight;
        }
    }
    param.left = Math.round((maxWidth - param.width) / 2);
    param.top = Math.round((maxHeight - param.height) / 2);
    return param;
}
</SCRIPT>
</head>
<body>
<div class="header">
    <div class="logo fl" style="padding:0px;margin:0px;">
		<img src="/guoji/vshop/admin2/Public/images/logo.png" alt="" height="60px;"/>
	</div>
    <div class="menu-box">
        <div class="menu-left-bg"></div>
        <div class="top_menu fl">
			<?php if(is_array($menu1)): $i = 0; $__LIST__ = $menu1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><a href='/guoji/vshop/admin2/index.php?c=<?php echo ($item['nlist'][0]['name']); echo ($item['nlist'][0]['param_str']); ?>' <?php if(($item["show"]) == "1"): ?>class='hover'<?php endif; ?> ><?php echo ($item["cname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
        <div class="menu-right-bg"></div>
    </div>
    <div class="help">
        <a href="/guoji/vshop/admin2/index.php?m=Cache&a=clear"><img src="/guoji/vshop/admin2/Public/images/ico_1.png" alt="" />更新缓存</a>
        <a href="javascript:;"><img src="/guoji/vshop/admin2/Public/images/ico_2.png" alt="" />帮助</a>
    </div>
    <div class="clear"></div>
    <div class="welcome">
        <a href="javascript:void(0)">欢迎您 <?php echo $_SESSION['account']; ?></a>|
        <a href="/guoji/vshop/admin2/index.php?c=Index&a=uc_sup_infoxg" target="mainFrame">更改密码</a>|
        <a href="/guoji/vshop/admin2/index.php" target="_blank">网站前台</a>|
        <a href="/guoji/vshop/admin2/index.php?c=Public&a=logout">退出系统</a>|
    </div>
</div>

<div class="side">
    <div class="head">
		<?php if(!$_SESSION['logo']){ ?>
        <img src="/guoji/vshop/admin2/Public/images/head.jpg" width="43" height="43" alt="" />
		<?php }else{ ?>
		<img src="<?php echo $_SESSION['logo'];?>" width="43" height="43" alt="" />
		<?php } ?>

    </div>
    <h3><img src="/guoji/vshop/admin2/Public/images/ico_6.png" />管理员</h3>
    <ul>
		<?php if(is_array($left_nlist)): $i = 0; $__LIST__ = $left_nlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$node): $mod = ($i % 2 );++$i;?><li><a href='/guoji/vshop/admin2/index.php?c=<?php echo ($node["name"]); echo ($node["param_str"]); ?>' name='' class='n<?php echo ($node["id"]); ?> z_side <?php if((MODULE_NAME) == $node["name"]): ?>hover<?php endif; ?>'><?php echo ($node["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
</div>

<div id="Container" style="min-width: 1000px;">
    <div class="ico_left"><img src="/guoji/vshop/admin2/Public/images/ico_8.png" /></div>
	<!--
    <iframe id="mainFrame" style="min-width: 1000px;" name="mainFrame" frameborder="0" src="" width="100%" height="100%" >
    </iframe>
	-->
<style type="text/css">
/* 关闭消息提示x按钮 */
.tisi .closetips{float:right;margin-right:10px;color:#636363;}
.tisi .closetips:hover {color:red;text-decoration:none;}
</style>
<script language="JavaScript">
jQuery.noConflict();
//图片预览
function yulan(file,id) {
  if(file.value.indexOf(".jpg")<0 && file.value.indexOf(".jpeg")<0 &&   file.value.indexOf(".gif")<0 && file.value.indexOf(".png")<0 && file.value.indexOf(".JPG")<0 && file.value.indexOf(".JPEG")<0 &&   file.value.indexOf(".GIF")<0 && file.value.indexOf(".PNG")<0){
		alert('您选择的不是图片文件');
		return false;
	}
	if(navigator.userAgent.indexOf("Mozilla/5.")>-1){
	    document.getElementById(id).innerHTML = "<img src='"+file.files[0].getAsDataURL()+"' width='128px'>";
		CheckFileSize(file.files[0].getAsDataURL(),id);

	}else{
      //var newPreview = document.getElementById(id);
      //newPreview.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = file.value;
	  file.select();
	  var img = document.selection.createRange().text;
	  jQuery('#'+id).html("<img src='"+img+"' width='128px'>");
	  //document.getElementById(id).innerHTML = "<img src='"+img+"' width='128px'>";
	}
}
//添加上传条
function addinput(name){
  var o = jQuery('#'+name).parent();
  var n = jQuery(o).find('input:last').val();
  var title = jQuery(o).find('input:last').prev().attr('name');
  var vname = jQuery(o).find('input:last').prev().prev().attr('name');
  var html = "<input type='file' onChange=yulan(this,'"+vname+"1') name='"+vname+"1'>标题:<input name='"+title+"1' class='small'><input type='radio' name='f_logo' value='"+n+"1'><div id='"+vname+"1'></div>";
  jQuery('#'+name).parent().append(html);
}

function delpic( pid ){
  jQuery.ajax({
    type:"POST",
	dataType:'json',
	url:URL+'/ajax_delpic',
	data:"pid="+pid,
	success:function(obj){
	  if(obj.error_code=='0'){
	    //window.location.reload();
		jQuery('#pic'+pid).remove();
	  }else{
		  art.dialog({
			id  :'del',
			time: 1.5,
			content: obj.notice
		  });
	  }
	}
  })
}

function check_radio( id ){
  /*
  if(n==1){
    jQuery('input[name="logo"]').attr('checked',false);
  }else{
    jQuery('input[name="f_logo"]').attr('checked',false);
  }
  */
  jQuery('#lit_pic').val(jQuery('#'+id).val());
}
</script>
<div class="content">
<div class="title">商品图库 [ <a href="/guoji/vshop/admin2/index.php/Product">返回列表</a> ] [ <a href="/guoji/vshop/admin2/index.php/Product/edit/id/<?php echo ($vo["id"]); ?>">返回商品</a> ]</div>
<form method='post' id="form1" action="/guoji/vshop/admin2/index.php/Product/upablum/" enctype="multipart/form-data">
		<table  cellpadding=3 cellspacing=3 class="add">
		 <tr>
		    <td>
			商品：<font color="red"><?php echo ($vo["name"]); ?></font></td>
		  </tr>
		  <tr>
		    <td>商品图上传：<input type="button" value="添加上传" onclick="addinput('up_zp1')"/></td>
		  </tr>
		  <tr>
		   <td>
		   <input type="file" name="up_zp1" onchange="yulan(this,'up_zp1')">标题:<input name="title1" class="small"><input type="radio" value="1" name="f_logo" onclick="check_radio(1)"><div id="up_zp1"></div>
		   </td>
		  </tr>
		</table>
<table  cellpadding=3 cellspacing=3 class="add">
<tr>
	<td class="tRight" >商品图：</td>
	<td class="tLeft">
	<?php if(is_array($pics)): $k = 0; $__LIST__ = $pics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pic): $mod = ($k % 2 );++$k;?><span id="pic<?php echo ($pic["picid"]); ?>">
	<INPUT type="radio" value="<?php echo ($pic["domain"]); echo ($pic["filepath"]); echo ($pic["savename"]); ?>" id="logo<?php echo ($k); ?>" name="select_logo"
	<?php if($pic['domain'].$pic['filepath']==$vo['lit_pic']){ echo 'checked="checked"'; } ?>
	><img src="<?php echo ($pic["domain"]); echo ($pic["filepath"]); ?>" WIDTH="150PX" alt="<?php echo ($pic["title"]); ?>" title="<?php echo ($pic["title"]); ?>">&nbsp;
	<img src="/guoji/vshop/admin2/Public/images/ico_cuo.png" onclick="delpic('<?php echo ($pic["picid"]); ?>')" style="cursor:pointer" alt="删除按钮">
	</span>
	<?php if($k%5==0){ echo "<br>"; } endforeach; endif; else: echo "" ;endif; ?>
	</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td style="padding:8px;">
	<INPUT TYPE="hidden" NAME="id" value="<?php echo ($vo["id"]); ?>">
	<INPUT TYPE="hidden" NAME="lit_pic" id="lit_pic"  value="<?php echo ($vo["lit_pic"]); ?>">
	<input type="submit" value="保 存" class="button">
	</td>
</tr>
</table>
</form>