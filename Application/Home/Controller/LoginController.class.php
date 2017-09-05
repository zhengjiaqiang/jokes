<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller 
{
	/*登陆*/
public function login()

{
if(!empty($_POST))
{
$model=M('login');
$uname=I('post.uname');
$upwd=I('post.upwd');
//判断用户名是否存在
$info=$model->where(['uname'=>$uname])->find();
if($info['uname'])
{
if($info['upwd']==$upwd)
{
//存储用户信息
cookie('uname',$info['uname']);
session('user_id',$info['user_id']);
$this->success('登陆成功,用户名与密码输入正确',U('Home/index'));
}
else
{
$this->error('密码输入有误');
}
}
else
{
$this->error('该用户不存在');
}
}
else
{
$this->display();
}
    	
}
//退出
public function out()
{
cookie('uname',null);
$this->success("退出成功",U('Login/login'));
}
}