<?php
namespace Home\Controller;
use Think\Controller;
class HomeController extends Controller 
{
   public function index()
   {
    
    $model=M('jokes');
    $count=$model->count();//数据总条数
    $Page = new \Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show= $Page->show();// 分页显示输出
    $list=$model->limit($Page->firstRow.','.$Page->listRows)->select();
    $this->assign('list',$list);
    $this->assign('show',$show);
    $this->display();
   }
   public function detail()
   {
    $jok_id=I('get.jok_id');
    $row=M('jokes')->where(['jok_id'=>$jok_id])->find();
    //查询评论
    $comList=M('comment')->where(['jok_id'=>$jok_id])->order('comment_time desc')->select();
    foreach ($comList as $key => $value)
        {
            $comList[$key]['reply'] = M('reply')->where("comm_id='$value[comment_id]'")->select();
        }
    $this->assign('comList',$comList);
    $this->assign('row',$row);
    $this->display();
   }
   //点赞
   public function zan()
   {

      $data['id']=isset($_POST['id'])?intval(trim($_POST['id'])):0;
      $obj = M("jokes");
      if(!isset($_COOKIE[$_POST['id']+10000])&&$obj->where(['jok_id'=>$data['id']])->setInc('zan')){
      $cookiename = $_POST['id']+10000;
      setcookie($cookiename,40,time()+60*60,'/'); 
      $data['info'] = "ok";
      $data['status'] = 1;
      $this->ajaxReturn($data);
      exit();
      }else{
      $data['info'] = "fail";
      $data['status'] = 0;
      $this->ajaxReturn($data);
      exit();
      }

   }
   /*评论*/
   public function comment()
   {

     $data=I('post.');
     $data['comment_time']=time();
    $result=M('comment')->add($data);
    if($result)
    {
      $this->assign('data',$data);
      $this->display();

    }
    else
    {
      echo "<script>alert('fail');</script>";
    }
   }
  /*回复*/
  public function reply()
  {
    $replyData=I('post.');
    $replyData['reply_time']=time();
    $res=M('reply')->add($replyData);
    if($res)
    {
      echo 0;
    }
    else
    {
      echo 1;
    }
  }
}
