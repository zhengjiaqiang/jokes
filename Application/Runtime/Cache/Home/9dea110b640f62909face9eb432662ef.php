<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>view-黑色时间轴个人博客模板</title>
<base href="/Public/">
<meta name="keywords" content="黑色模板,个人网站模板,个人博客模板,博客模板,css3,html5,网站模板" />
<meta name="description" content="这是一个有关黑色时间轴的css3 html5 网站模板" />
<link href="css/styles.css" rel="stylesheet">
<link href="css/view.css" rel="stylesheet">
<!-- 返回顶部调用 begin -->
<link href="css/lrtk.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<!-- 返回顶部调用 end-->
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
</head>
<body>
<header>
<!-- 导航 -->


</header>
<!--header end-->
<div id="mainbody">
  <div class="blogs">
    <div id="index_view">
      <ol class="breadcrumb">
        <li><a href="<?php echo U('Index/index');?>">首页</a></li>
        <li class="active"></li>
      </ol>
      <h1 class="c_titile"></h1>
      <p class="box">发布时间：<?php echo (date('Y-m-d H:i:s',$row["add_time"])); ?></p>
      <ul>
        
      </ul>      
      <!-- 发表评论 -->
      
      <div id="comment">
        <h3><strong>发表评论:</strong></h3>
        <p>
          <span>标题：</span>
          <input type="text" name="" id="comm_title" class="text">
        </p>
        <p><span>内容：</span><textarea rows="10" id="content" cols="30" class="text-textarea"></textarea></p>
       <p style="text-align:right;"><button class="btn" jok_id='<?php echo ($row["jok_id"]); ?>'>发表</button></p>
      </div>
      <!-- 评论列表 -->
       <?php if(is_array($comList)): foreach($comList as $key=>$value): ?><div class="media">
         <a class="pull-left" href="#">
            <img class="media-object img-circle" src="images/touxiang.jpg" alt="媒体对象" width="80">
         </a>
         <div class="media-body">
            <h4 class="media-heading">
              评论标题:<span class="pull-left"><?php echo ($value["title"]); ?></span>
              评论时间:<time class="pull-right"><?php echo (date('Y-m-d H:i:s',$value["comment_time"])); ?></time>
            </h4>
            评论内容:<p><?php echo ($value["comment_text"]); ?><a href="javascript:void(0);" class="reply">回复</a></p>
            <br>
            <div style="display:none;">
              <textarea name="" cols="50" rows="2"></textarea>
              <input type="button" class="replyBtn" data-id="<?php echo ($value["comment_id"]); ?>" value="提交">
            </div>
             <?php if(is_array($value["reply"])): foreach($value["reply"] as $key=>$val): ?><p>匿名:<?php echo ($val["reply_text"]); ?></p><?php endforeach; endif; ?>
         </div>
      </div><?php endforeach; endif; ?> 
    </div>
    <!--bloglist end-->
    <aside>
      <div class="search">
        <form class="searchform" method="get" action="#">
          <input type="text" name="s" value="Search" onfocus="this.value=''" onblur="this.value='Search'">
        </form>
      </div>
      <div class="sunnav">
        <ul>
          <li><a href="/web/" target="_blank" title="网站建设">网站建设</a></li>
          <li><a href="/newshtml5/" target="_blank" title="HTML5 / CSS3">HTML5 / CSS3</a></li>
          <li><a href="/jstt/" target="_blank" title="技术探讨">技术探讨</a></li>
          <li><a href="/news/s/" target="_blank" title="慢生活">慢生活</a></li>
        </ul>
      </div>
      <!-- 推荐文章 -->
      
      
    </aside>
  </div>
  <!--blogs end--> 
</div>
<!--mainbody end-->

<!-- 底部 -->


<!-- jQuery仿腾讯回顶部和建议 代码开始 -->
<div id="tbox"> <a id="togbook" href="/e/tool/gbook/?bid=1"></a> <a id="gotop" href="javascript:void(0)"></a> </div>
<!-- 代码结束 -->
</body>
</html>
<script src="/Public/js/jquery-1.7.2.min.js"></script>
<script>
/*评论*/
$('.btn').click(function(){
  var jok_id=$(this).attr('jok_id');//id
  var title=$('#comm_title').val();//标题
  var content=$('#content').val();//内容
  $.ajax({
    url:"<?php echo U('Home/comment');?>",
    type:"post",
    data:"title="+title+"&comment_text="+content+'&jok_id='+jok_id,
    success:function(data){
      $('#comment').after(data);
    }
  })
})
/*回复框*/
$('.reply').click(function(){
  $(this).parent().next().next().toggle('normal');
})
/*提交回复*/
$('.replyBtn').click(function(){
  _this=$(this);
  var url="<?php echo U('Home/reply');?>";
  var reply_text=_this.prev().val();
  var comm_id=_this.attr('data-id');
  $.post(url,{reply_text:reply_text,comm_id:comm_id},function(data){
  if(data)
  {
    var html='<p>匿名:'+reply_text+'</p>'
    _this.after(html);
  }
  else
  {
    alert('fail');
  }
  })
})
</script>