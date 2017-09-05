<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller
{
	public function __construct()
	{
		//重写父类中的方法
		parent::__construct();
	 $username=cookie('adm_name');
     if(empty($username))
     {
     	$this->error("请先登录",U('login/loginb'));
     }
      
     //是否有权限
     if($this->checkAcc() == false)
     {
     	$this->error('No权限');
     	
     }
     
	}
    /*权限验证*/
	public function checkAcc()
	{
       $info=session('info'); 
       //设置超级管理员
       if($info['adm_name']==C('superAdmin'))
       {
          return true;
     }
	 //获取当前访问的控制器和方法
     $controller=CONTROLLER_NAME;
     $action=ACTION_NAME;
     //echo $controller.','.$action;
      if(in_array($controller,C('comController')))
      {
          return true;
      }
     $accessList=session('accessList');
     foreach ($accessList as $k => $v) 
     {
     	if($v['controller']==$controller && $v['action']==$action)
     	{
     		return true;
     		
     	}
     }
     return false;
	}
	
}