<?php
namespace Admin\Controller;
use Think\Controller;
class JokeController extends CommonController
 {
	//段子发布
	public function wenzhang_xinwen_fabu()
	{
	if(!empty($_POST))
	{
	//类内调用上传文件方法
	$path=$this->upload();
	$model=M('jokes');
	$post_data=I('post.');
	$post_data['img']=$path;
	$post_data['add_time']=time();
	$info=$model->add($post_data);
	if($info)
	{
	$this->success('添加成功啦',U('Admin/wenzhang_xinwen'));
	}
	else
	{
	$this->error('添加失败');
	}
	}
	else
	{
	$this->display();
	}
	}
	/*文件上传*/
	public function upload()
	{    
	$upload = new \Think\Upload();// 实例化上传类   
	$upload->maxSize = 3145728 ;// 设置附件上传大小    
	$upload->exts= array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
	$upload->savePath = '/Public/Uploads/'; // 设置附件上传目录    
	// 上传单个文件     
	$info= $upload->uploadOne($_FILES['img']);    
	if(!$info)
	{
	// 上传错误提示错误信息
	return $this->error($upload->getError());    
	}
	else
	{
	// 上传成功 获取上传文件信息 
	return $info['savepath'].$info['savename'];    
	}
	}
	/*段子删除*/
	public function del()
	{
	$id=I('get.id');
	$res=M('jokes')->where(['jok_id'=>$id])->delete();
	if($res)
	{
	$this->success('删除成功',U('Admin/wenzhang_xinwen'));
	}
	else
	{
	$this->success('删除失败');	
	}
	}
	/*即点即该*/
	public function update()
	{
		$id=I('post.id');
		$new_val=I('post.new_val');
		// echo $id.','.$new_val;
		$model=M('jokes');
		$model->title=$new_val;
		$bool=$model->where(['jok_id'=>$id])->save();
		if($bool)
		{
			echo 0;
		}
		else
		{
			echo 1;
		}
	}
	/*段子置顶*/
	 public function top()
	 {

        $data = I('post.');
        $flag = $data['flag'] == 0 ? 1 : 0;
        $time = date('Y-m-d H:i:s');
        $res = M('jokes')->where('jok_id='.$data['id'])->save(['top'=>$time,'flag'=>$flag]);
        if($res)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

}