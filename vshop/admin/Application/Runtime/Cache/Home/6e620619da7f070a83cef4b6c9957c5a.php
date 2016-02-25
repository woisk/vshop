<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="x-ua-compatible"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($head_title); ?></title>
<link rel="stylesheet" type="text/css" href="/git/vshop/admin/Public/css/style.css" />
<style>
body{
 background:#f1f1f1;
}
</style>
<!--[if IE 6]>
<script type="text/javascript" src="/git/vshop/admin/Public/js/DD_belatedPNG.js" ></script>
<script type="text/javascript">
DD_belatedPNG.fix('*');
</script>
<![endif]-->

<script type="text/javascript" src="/git/vshop/admin/Public/js/jquery.js"></script>

<script type="text/javascript" src="/git/vshop/admin/Public/js/common.js"></script>
<link rel="stylesheet" type="text/css" href="/git/vshop/admin/Public/js/artDialog/skins/chrome.css" />
<script type="text/javascript" src="/git/vshop/admin/Public/js/artDialog/jquery.artDialog.js"></script>
<script type="text/javascript" src="/git/vshop/admin/Public/js/artDialog/plugins/iframeTools.js"></script>

<link rel="stylesheet" type="text/css" href="/git/vshop/admin/Public/css/icon.css">
<?php if(ACTION_NAME=='index' && MODULE_NAME!='Config'){ ?>
<link rel="stylesheet" type="text/css" href="/git/vshop/admin/Public/js/EasyUI/themes/haidaoblue/easyui.css">
<script type="text/javascript" src="/git/vshop/admin/Public/js/EasyUI/jquery.easyui.min.js"></script>
<script type="text/javascript" src="/git/vshop/admin/Public/js/EasyUI/locale/easyui-lang-zh_CN.js"></script>
<script type="text/javascript" src="/git/vshop/admin/Public/js/EasyUI/hd_default_config.js"></script>
<?php } ?>
<SCRIPT LANGUAGE="JavaScript">
//指定当前组模块URL地址
var ROOT = '/git/vshop/admin';
var URL = '/git/vshop/admin/index.php/PaymentConfig';
var APP	 =	 '/git/vshop/admin/index.php';
var PUBLIC = '/git/vshop/admin/Public';
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
		<img src="/git/vshop/admin/Public/images/logo.png" alt="" height="60px;"/>
	</div>
    <div class="menu-box">
        <div class="menu-left-bg"></div>
        <div class="top_menu fl">
			<?php if(is_array($menu1)): $i = 0; $__LIST__ = $menu1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><a href='/git/vshop/admin/index.php?c=<?php echo ($item['nlist'][0]['name']); echo ($item['nlist'][0]['param_str']); ?>' <?php if(($item["show"]) == "1"): ?>class='hover'<?php endif; ?> ><?php echo ($item["cname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
        <div class="menu-right-bg"></div>
    </div>
    <div class="help">
        <a href="/git/vshop/admin/index.php?m=Cache&a=clear"><img src="/git/vshop/admin/Public/images/ico_1.png" alt="" />更新缓存</a>
        <a href="javascript:;"><img src="/git/vshop/admin/Public/images/ico_2.png" alt="" />帮助</a>
    </div>
    <div class="clear"></div>
    <div class="welcome">
        <a href="javascript:void(0)">欢迎您 <?php echo $_SESSION['account']; ?></a>|
        <a href="/git/vshop/admin/index.php?c=Index&a=uc_sup_infoxg" target="mainFrame">更改密码</a>|
        <a href="/git/vshop/admin/index.php" target="_blank">网站前台</a>|
        <a href="/git/vshop/admin/index.php?c=Public&a=logout">退出系统</a>|
    </div>
</div>

<div class="side">
    <div class="head">
		<?php if(!$_SESSION['logo']){ ?>
        <img src="/git/vshop/admin/Public/images/head.jpg" width="43" height="43" alt="" />
		<?php }else{ ?>
		<img src="<?php echo $_SESSION['logo'];?>" width="43" height="43" alt="" />
		<?php } ?>

    </div>
    <h3><img src="/git/vshop/admin/Public/images/ico_6.png" />管理员</h3>
    <ul>
		<?php if(is_array($left_nlist)): $i = 0; $__LIST__ = $left_nlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$node): $mod = ($i % 2 );++$i;?><li><a href='/git/vshop/admin/index.php?c=<?php echo ($node["name"]); echo ($node["param_str"]); ?>' name='' class='n<?php echo ($node["id"]); ?> z_side <?php if((MODULE_NAME) == $node["name"]): ?>hover<?php endif; ?>'><?php echo ($node["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
</div>

<div id="Container" style="min-width: 1000px;">
    <div class="ico_left"><img src="/git/vshop/admin/Public/images/ico_8.png" /></div>
	<!--
    <iframe id="mainFrame" style="min-width: 1000px;" name="mainFrame" frameborder="0" src="" width="100%" height="100%" >
    </iframe>
	-->
<style type="text/css">
/* 关闭消息提示x按钮 */
.tisi .closetips{float:right;margin-right:10px;color:#636363;}
.tisi .closetips:hover {color:red;text-decoration:none;}
</style>
<script>
 function showremark(){
   var obj = document.getElementById('remark');
   if(obj.style.display == "none"){
     obj.style.display = "block";
   }else{
     obj.style.display = "none";
   } 
 }
</script>
<div class="content">
<div class="title">编辑微信支付[ <A HREF="/git/vshop/admin/index.php/PaymentConfig">返回列表</A> ]</div>
<TABLE cellpadding=3 cellspacing=3 class="add">
<FORM METHOD=POST id="form1" action="/git/vshop/admin/index.php/PaymentConfig/edit?<?php echo time(); ?>">
<TR>
	<TD colspan="2"><div id="result" class="result none"></div></TD>
</TR>
<TR>
	<TD class="tRight" >支付公司：</TD>
	<TD class="tLeft" >
	<select name="pay_name">
	 <option value="微信APP支付" selected >
	 微信APP支付</option>
	</select>
	<a href="/git/vshop/admin/index.php/PaymentConfig/wx_add">切换到微信支付</a>
	<a href="/git/vshop/admin/index.php/PaymentConfig/ali_add">切换到支付宝</a>
	</TD>
</TR>

<TR>
	<TD class="tRight" >账户昵称：</TD>
	<TD class="tLeft" ><INPUT TYPE="text" class="medium bLeftRequire"  NAME="account_nickname" value="<?php echo ($vo["account_nickname"]); ?>">用以区别不同账号</TD>
</TR>

<TR>
	<TD class="tRight" >APPID：</TD>
	<TD class="tLeft" ><INPUT TYPE="text" class="large bLeftRequire"  NAME="appid" value="<?php echo ($vo["appid"]); ?>"> 微信公众号身份的唯一标识</TD>
</TR>

<TR>
	<TD class="tRight" >MCHID：</TD>
	<TD class="tLeft" ><INPUT TYPE="text" class="large bLeftRequire"  NAME="mchid" value="<?php echo ($vo["mchid"]); ?>"> 受理商ID，身份标识</TD>
</TR>

<TR>
	<TD class="tRight" >KEY：</TD>
	<TD class="tLeft" ><INPUT TYPE="text" class="large bLeftRequire"  NAME="key" value="<?php echo ($vo["key"]); ?>"> 商户支付密钥Key</TD>
</TR>

<TR>
	<TD class="tRight" >APPSECRET：</TD>
	<TD class="tLeft" ><INPUT TYPE="text" class="large bLeftRequire"  NAME="appsecret" value="<?php echo ($vo["appsecret"]); ?>"> 
	JSAPI接口中获取openid，审核后在公众平台开启开发模式后可查看
	</TD>
</TR>

<TR>
	<TD class="tRight" >状态：</TD>
	<TD class="tLeft" >
	<SELECT class="small bLeft" NAME="status">
	  <option value="1" <?php if(($vo["status"]) == "1"): ?>SELECTED<?php endif; ?> >启用</option>
	  <option value="0" <?php if(($vo["status"]) == "0"): ?>SELECTED<?php endif; ?> >禁用</option>
	</SELECT>
	</TD>
</TR>

<TR>
	<TD ></TD>
	<TD>
	<INPUT TYPE="hidden" NAME="id" value="<?php echo ($vo["id"]); ?>">
	<INPUT TYPE="submit" value="保 存" class="button">
	</TD>
</TR>
</TABLE>
</FORM>

<!-- 主页面结束 -->

	<div class="copy"><span class="line_white"></span>Powered by vion 0.5 版权所有 © 2013-2015 vion，并保留所有权利。</div>
  </div><!--content结束-->
</div>
</body>
</html>
<script>
$(".z_side").click(function() {
    $("iframe").attr("src", $(this).attr("data"));
});
/*
if (top.location !== self.location) {
    top.location = self.location;
}
*/
//$(".side a[name!='disabled']").eq(0).addClass('hover').click();

//左侧side中的hover 效果
$(function(){
	$(".side li a").click(function(){
		if($(this).hasClass('disabled')) return false;
		$(".side li a").removeClass("hover");
		$(this).addClass("hover");
	});
});
/**
 * 显示和收起后台导航
 */
$(".ico_left").toggle(function(){
			$(".side").animate({left:"-200px"});
			$("#Container").animate({left:"0"});
			$(".welcome").animate({paddingLeft:"10px"});
			$(this).children().attr('src','/git/vshop/admin/Public/images/ico_8a.png');
		},
		function(){
			$(".side").animate({left:"0px"});
			$("#Container").animate({left:"200px"});
			$(".welcome").animate({paddingLeft:"65px"});
			$(this).children().attr('src','/git/vshop/admin/Public/images/ico_8.png');
		}
	  );
</script>