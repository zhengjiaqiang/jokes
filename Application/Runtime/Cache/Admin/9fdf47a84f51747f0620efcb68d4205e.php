<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>用户登录</title>
	<link rel="stylesheet" href="/Public/Admin/css/base.css" />
	<link rel="stylesheet" href="/Public/Admin/css/login.css" />
</head>
<body>
<div class="superlogin"></div>
<div class="loginBox">
	<div class="loginMain">
		<div class="tabwrap">
		<form action="<?php echo U('Login/loginb');?>" method='post'>
		<table border="0" cellspacing="0" cellpadding="0">
			<tr><td class="title">用户名：</td><td><input type="text" name='adm_name'class="form-control txt" /></td></tr>
			<tr><td class="title">密   码：</td><td><input type="password" name='password'class="form-control txt" /></td></tr>
			<tr>
			<td class="title">验证码：</td>
			 <td>
              <img id="verify_img" alt="点击更换" title="点击更换"  src="<?php echo U('login/verify',array());?>" class="m"> 
              <input id="j_verify"  name="j_verify" type="text" class="form-control txt"> 
			</td>
		    </tr>
                   <!--  <label for="j_verify" class="t">验证码：</label>       -->     
			<tr><td>&nbsp;</td><td><input type="submit" class="loginbtn" value="登录" onclick="location.href='index.html'"/><input type="reset" class="resetbtn" value="重置" onclick="location.href=''"/></td></tr>		
			<tr><td>&nbsp;</td><td class="forgetpsw"></td></tr>	
		</table>
		</form>
		</div>
	</div>
</div>
<div class="footer">Copyright © 2016-2017 jianet  All Rights Reserved.</div>
</body>
</html>
<script src="/Public/Admin/js/jquery-1.7.2.min.js"></script>
<script>
$("#verify_img").click(function() {
var verifyURL = "<?php echo U('login/verify');?>";
//利用JS获取当前时间戳加入到URL之后即可。
var time = new Date().getTime();
$("#verify_img").attr({
"src" : verifyURL + "?" + time
});
});
$('#j_verify').blur(function(){
var j_verify=$('#j_verify').val();
if(j_verify=='')
{
alert('验证码不能为空');
return;
}
$.ajax({
url:"<?php echo U('login/check_verify');?>",
type:'post',
data:{j_verify:j_verify},
success:function(data){
if (data == true) {
//验证码输入正确
alert("验证码输入正确");
} else {
//验证码输入错误
alert("验证码输入错误");
return;
}
}
})
})

</script>