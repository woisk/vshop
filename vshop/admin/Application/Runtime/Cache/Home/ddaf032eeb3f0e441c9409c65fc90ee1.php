<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<TITLE>系统登录</TITLE>
<link rel='stylesheet' type='text/css' href='/guoji/vshop/admin2/Public/css/login.css'>
<script type="text/javascript" src="/guoji/vshop/admin2/Public/js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="/guoji/vshop/admin2/Public/js/artDialog/skins/chrome.css" />
<script type="text/javascript" src="/guoji/vshop/admin2/Public/js/artDialog/jquery.artDialog.js"></script>
<script type="text/javascript" src="/guoji/vshop/admin2/Public/js/artDialog/plugins/iframeTools.js"></script>
<script type="text/javascript" src="/guoji/vshop/admin2/Public/js/Validform_v5.3.2_min.js"></script>

<SCRIPT LANGUAGE="JavaScript">
var PUBLIC	 =	 '/guoji/vshop/admin2/Public';
var APP = '/guoji/vshop/admin2/index.php';

function checkLogin(){
  var username = $('#username').val();
  var password = $('#password').val();
  var verify = $('#verify').val();
  $.ajax({
	   type: "POST",
	   url: "/guoji/vshop/admin2/index.php/Public/checkLogin",
	   data: "username="+username+"&password="+password+"&verify="+verify,
	   success: function(ret){
		 if(ret.error_code==0){
		   window.location = '/guoji/vshop/admin2/index.php';
		 }else{		   
		   art.dialog({time: 2,title:'温馨提示',content: ret.notice});
		 }
	   }
  });   
  
}

function fleshVerify(){
//重载验证码
  var timenow = new Date().getTime();
  //alert('/guoji/vshop/admin2/index.php/Public/verify/'+timenow);
  $('#verifyImg').attr('src','/guoji/vshop/admin2/index.php/Public/verify/'+timenow);
}

$(document).keypress(function(e) {
   //alert(e.which);
// 回车键事件  
   if(e.which == 13) {  
     checkLogin();
   }  
}); 
</SCRIPT>
</HEAD>
<body>


	<div class="main">
		<div class="login">

			<div class="left">
				<!--
				<p>
					<a href="" target="_blank">阿里云后台</a> 是 <a href="" target="_blank">迪米盒子</a>公司旗下以电子商务为基础的专业网店建站系统，专注电子商务运营服务。
				</p>
				-->
			</div>
			<div class="right">
                    <form action="/guoji/vshop/admin2/index.php/Public/checkLogin" method="" name="" id="" class="loginform">
				<p>
					<label>用户名：</label><input type='text' name="username" class="Inpt" placeholder="请输入用户名" datatype="*4-10|/^[\u4E00-\u9FA5\uf900-\ufa2d]{2,4}$/" value="admin"/>
				</p>
				<p>
					<label>密&nbsp;&nbsp;&nbsp;码：</label><input type='password' name="password"  class="Inpt" placeholder="请输入密码" datatype="*" value="admin123"/>
				</p>

				<p>
					<label>验证码：</label>
					<!--
					<input type='text' name="verify" class="captcha" placeholder="验证码" datatype="/\w{4}/i" errormsg="请输入4位验证码！" />
					-->
					<input type='text' name="verify" class="captcha" />					
					<img src="/guoji/vshop/admin2/index.php?c=Public&a=verify" id="verify" alt="看不清楚，换一张" style="cursor: pointer; vertical-align:middle; margin-top:-4px!important;maargin-top:-0px;padding-left:5px;" onclick="this.src='/guoji/vshop/admin2/index.php?c=Public&a=verify&_t=' + Math.round(new Date().getTime()/1000)" />
				</p>

				<p>
					<label></label><input type="submit" name="" value="" class="Btn" />
				</p>
				</form>
			</div>
		</div>
	</div>
<script type="text/javascript">

var demo=$(".loginform").Validform({
        tiptype: function(){},
        label:".label",
        showAllError:true,
        ajaxPost:true,
        callback:function(ret){
        	if(ret.error_code != 0) {
        		$('#verify').trigger('click');
        		art.dialog({time: 2,title:'温馨提示',content: ret.notice});
        	} else {
          		window.location = '/guoji/vshop/admin2/index.php';
        		return;
        	}
        }
});
if (top.location !== self.location) {
    top.location=self.location;
}
</script>

</body>
</HTML>