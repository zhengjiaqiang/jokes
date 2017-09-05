<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends CommonController
 {
 	//后台首页
    public function index()
    {
    $this->display();
    }
    public function public_left()
    {
    $this->display();
    }
    public function public_header()
    {
    $this->display();
    }
    /*列表展示*/
    public function wenzhang_xinwen()
    {
    $_where=$this->search();
    $model=M('jokes');
    $count=$model->where($_where)->count();//数据总条数
    $Page = new \Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show= $Page->show();// 分页显示输出
    $list=$model->order('flag desc,top desc,jok_id desc')->limit($Page->firstRow.','.$Page->listRows)->where($_where)->select();
    $this->assign('list',$list);
    $this->assign('show',$show);
    $this->assign('count',$count);
    $this->display();
    }
    /*搜索*/
    public function search()
    {
    $arr=array('1=1');
    $keywords=I('get.keywords');
    if(!empty($keywords))
    {
    $arr[]=" title like '%$keywords%' ";
    }
    $_where=implode(' AND ', $arr);
    return  $_where;
    }
}