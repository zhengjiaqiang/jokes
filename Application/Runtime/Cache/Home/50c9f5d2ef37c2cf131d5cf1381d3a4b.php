<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>登录</title>
<link rel="stylesheet" type="text/css" href="/Public/css1/styles.css">
</head>
<body>
<div class="htmleaf-container">
	<div class="wrapper">
		<div class="container">
			<h1>Welcome</h1>
			
			<form class="form" action="<?php echo U('Login/login');?>" method='post' id='target'>
				<input type="text" placeholder="Username" name='uname'class='u_name'status='0'>
				<span class='t_uanme'></span>
				<input type="password" placeholder="Password" name='upwd' class='u_pwd'>
				<span class='t_pwd'></span>
				<input type="submit" id="login-button" value='Login'>
			</form>
		</div>
	</div>
</div>
</body>
</html>
<script src="/Public/Home/js/jquery-1.7.2.min.js"></script>
<script>
$(function(){
$('.u_name').blur(function(){
var uname=$('.u_name').val();
if(uname=='')
{
$('.t_uanme').html('<font color="red">用户名不能为空</font>');

}
else
{
$('.t_uanme').html('<font color="green">√</font>');	
}

})
$('.u_pwd').blur(function(){
var upwd=$('.u_pwd').val();
if(upwd=='')
{
$('.t_pwd').html('<font color="red">密码不能为空</font>');
 return true;
}
else
{
$('.t_pwd').html('<font color="green">√</font>');
return true;
}

})
})
//表单提交事件
$('#target').submit(function(){
var uname=$('.u_name').val();
var upwd=$('.u_pwd').val();
if(uname==''&& upwd=='')
{

return false;
}

var reg= /^[a-zA-Z0-9_-]{4,16}$/;
if(!reg.test(uname))
{
 $('.t_uanme').html('<font color="red">用户名可以是字母、数字、下划线、减号且长度至少四个,最多十六个</font>');
 return false;	
}
if(upwd.length<3||upwd.length>6)
{
               
$('.t_pwd').html("<font color='red'>密码长度需要保证在3---6位之间</font>");
return false;
}


})

</script>