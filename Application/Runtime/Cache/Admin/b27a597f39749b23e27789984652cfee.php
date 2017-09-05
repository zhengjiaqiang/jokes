<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>修改密码</title>
	<link rel="stylesheet" href="/Public/Admin/css/base.css" />
	<link rel="stylesheet" href="/Public/Admin/css/login.css" />
</head>
<body>
<div class="superlogin"></div>
<div class="loginBox">
	<div class="loginMain">
		<div class="tabwrap">
		<form action="<?php echo U('Login/change_psw');?>" method='post'>
		<table border="0" cellspacing="0" cellpadding="0">
			<tr><td class="title">旧密码：</td><td><input type="text" name='password'class="form-control txt" /></td></tr>
			<tr><td class="title">新密码：</td><td><input type="password" name='new_pwd'class="form-control txt" /></td></tr>	
			<tr><td class="title">确认密码：</td><td><input type="password" name='real_pwd'class="form-control txt" /></td></tr>	
			<tr><td>&nbsp;</td><td><input type="submit" value="确定" />
            <input type="reset" value="重置">
			</td></tr>		
		</table>
		</form>
		</div>
	</div>
</div>
<div class="footer">Copyright © 2016-2017 jianet  All Rights Reserved.</div>
</body>
</html>