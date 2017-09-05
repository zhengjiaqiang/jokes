<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;
class LoginController extends Controller
 {
//登录
public function loginb()
{

if(!empty($_POST))
{

$model=M('admin');
$uname=I('post.adm_name');
$upwd=I('post.password');
$code=I('post.j_verify');
//判断用户名密码是否为空
if($uname==''||$upwd=='')
{
$this->error('用户名或密码不能为空');
return;
}
//判断用户名是否存在
$info=$model->where(['adm_name'=>$uname])->find();
if($info['adm_name'])
{
if($info['password']==$upwd)
{
//存储用户信息
cookie('adm_name',$info['adm_name']);
session('adm_id',$info['adm_id']);
session('info',$info);
 //查询当前管理员所拥有的权限
 $sql="SELECT * FROM privilege as p LEFT JOIN node as n on p.node_id=n.node_id WHERE adm_id='$info[adm_id]'";
 $accessList=M()->query($sql);
 session('accessList',$accessList);
 $this->success('登陆成功,用户名与密码输入正确',U('Admin/index'));
}
else
{
$this->error('密码输入有误');
}
}
else
{
$this->error('该用户不存在,请注册',U('Login/regist'));
}
 //判断验证码是否输入正确
 // $check_verify=$this->check_verify($code)
 // if(!$check_verify)
 // {
 // 	echo -1;
 // }
}
else
{
$this->display();
}
}
//退出
public function out()
{
cookie('adm_name',null);
$this->success("退出成功",U('login/loginb'));
}
//注册
public function regist()
{
if(!empty($_POST))
{
$post_data=I('post.');
$post_data['create_time']=time();
$model=M('admin');
$res=$model->add($post_data);
if($res)
{
$this->success('注册成功',U('Login/loginb'));
}
else
{
$this->error('注册失败');
}
}
else
{
$this->display();
}
}
  /*验证用户唯一性*/
  public function  unique()
  {
	$uname=I('post.uname');
	$res=M('login')->where(['uname'=>$uname])->find();
	if($res)
	{
	echo 0;

	}
	else
	{
	echo 1;
	}
  }
//修改密码
public function change_psw()
{
if(!empty($_POST))
{
$adm_id=session('adm_id');//用户id
$model=M('admin');
$password=I('post.password');//原密码
$new_pwd=I('post.new_pwd');//新密码
$real_pwd=I('post.real_pwd');//确认密码
$msg=$model->where(['adm_id'=>$adm_id])->find();
//判断密码是否为空
if($password=='')
{
$this->error('旧密码不能为空',U('Login/change_psw'));
}
if($new_pwd==''||$real_pwd=='')
{   
echo "<script>alert('新密码或确认密码不能为空');</script>";
header("refresh:3 url=".U('Login/change_psw'));
die;
}
//判断旧密码是否正确
if($password!=$msg['password'])
{
$this->error("旧密码输入有误",U('Login/change_psw'));

}
//判断新密码与确认密码是否一致
if($new_pwd!=$real_pwd)
{
$this->error('新密码与确认密码不一致',U('Login/change_psw'));
}
else
{
$model=M('admin');
$adm_id=session('adm_id');
$model->password=$real_pwd;
$bool=$model->where(['adm_id'=>$adm_id])->save();
if($bool)
{
$this->success('密码修改成功',U('Login/loginb'));
}
else
{
$this->error('密码修改失败');
}
}

}
else
{
$this->display();
}
}
/* 生成验证码 */  
public function verify()
{

$config = [
'fontSize'    =>    30,    // 验证码字体大小   
'length'      =>    3,     // 验证码位数    
'useNoise'    =>    false, // 关闭验证码杂点
];
$Verify = new Verify($config);
$Verify->entry();
}


/* 验证码校验 */ 
function check_verify($id='')
{   
$code=I('post.j_verify');
$verify = new \Think\Verify();    
$res=$verify->check($code, $id);
$this->ajaxReturn($res, 'json');	
} 
}