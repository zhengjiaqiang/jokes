<?php if (!defined('THINK_PATH')) exit();?><div id="mainbody">
  <div class="info">
    <figure> <img src="/Public/Home/images/art.jpg"  alt="Panama Hat">
      <figcaption><strong>渡人如渡己，渡已，亦是渡</strong> 当我们被误解时，会花很多时间去辩白。 但没有用，没人愿意听，大家习惯按自己的所闻、理解做出判别，每个人其实都很固执。与其努力且痛苦的试图扭转别人的评判，不如默默承受，给大家多一点时间和空间去了解。而我们省下辩解的功夫，去实现自身更久远的人生价值。其实，渡人如渡己，渡已，亦是渡人。</figcaption>
    </figure>
    <div class="card">
      <h1>我的名片</h1>
      <p>网名：DanceSmile | 即步非烟</p>
      <p>职业：Web前端设计师、网页设计</p>
      <p>电话：13662012345</p>
      <p>Email：dancesmiling@qq.com</p>
      <ul class="linkmore">
        <li><a href="/" class="talk" title="给我留言"></a></li>
        <li><a href="/" class="address" title="联系地址"></a></li>
        <li><a href="/" class="email" title="给我写信"></a></li>
        <li><a href="/" class="photos" title="生活照片"></a></li>
        <li><a href="/" class="heart" title="关注我"></a></li>
      </ul>
    </div>
  </div>
  <!--info end-->
  <div class="blank"></div>

  <div class="blogs">



    <ul class="bloglist">
      
        <?php if(is_array($data)): foreach($data as $key=>$val): ?><li>
        <div class="arrow_box">
          <div class="ti"></div>
          <!--三角形-->
          <div class="ci"></div>
          <!--圆形-->
          <h2 class="title"><a href="/" target="_blank"><?php echo ($val["title"]); ?></a></h2>
          <ul class="textinfo">
            <a href="/"><img src="/Public/Home/images/s1.jpg"></a>
            <p><?php echo ($val["content"]); ?></p>
          </ul>
          <ul class="details">
            <li class="likes zan"opt='<?php echo ($val["id"]); ?>'><a href="javascript:void(0)" ><?php echo ($val["support_num"]); ?></a></li>
            <li class="comments"><a href="#"><?php echo ($val["disscuss_num"]); ?></a></li>
            <li class="icon-time"><a href="#"><?php echo (date("Y-m-d",$val["add_time"])); ?></a></li>
          </ul>
        </div>
        <!--arrow_box end--> 
      </li><?php endforeach; endif; ?>

    <li id="suibian">
        <div class="arrow_box">
             <h3 class="title" align="center"> 
           <?php if($pagetotal > 1): ?><a href="javascript:void(0)" class="loads" opt='<?php echo ($pagetotal); ?>'>加载更多Y.Y</a>
         <?php else: ?>
         无更多可供加载的数据<?php endif; ?></h3>         
        </div>
        <!--arrow_box end--> 
      </li>
    </ul>
    <!--bloglist end-->




    <aside>
      <div class="tuijian">
        <h2>推荐文章</h2>
        <ol>
          <li><span><strong>1</strong></span><a href="/">有一种思念，是淡淡的幸福,一个心情一行文字</a></li>
          <li><span><strong>2</strong></span><a href="/">励志人生-要做一个潇洒的女人</a></li>
          <li><span><strong>3</strong></span><a href="/">女孩都有浪漫的小情怀——浪漫的求婚词</a></li>
          <li><span><strong>4</strong></span><a href="/">Green绿色小清新的夏天-个人博客模板</a></li>
          <li><span><strong>5</strong></span><a href="/">女生清新个人博客网站模板</a></li>
          <li><span><strong>6</strong></span><a href="/">Wedding-婚礼主题、情人节网站模板</a></li>
          <li><span><strong>7</strong></span><a href="/">Column 三栏布局 个人网站模板</a></li>
          <li><span><strong>8</strong></span><a href="/">时间煮雨-个人网站模板</a></li>
          <li><span><strong>9</strong></span><a href="/">花气袭人是酒香—个人网站模板</a></li>
        </ol>
      </div>
      <div class="toppic">
        <h2>图文并茂</h2>
        <ul>
          <li><a href="/"><img src="/Public/Home/images/k01.jpg">腐女不可怕，就怕腐女会画画！
            <p>伤不起</p>
            </a></li>
          <li><a href="/"><img src="/Public/Home/images/k02.jpg">问前任，你还爱我吗？无限戳中泪点~
            <p>感兴趣</p>
            </a></li>
          <li><a href="/"><img src="/Public/Home/images/k03.jpg">世上所谓幸福，就是一个笨蛋遇到一个傻瓜。
            <p>喜欢</p>
            </a></li>
        </ul>
      </div>
      <div class="clicks">
        <h2>热门点击</h2>
        <ol>
          <li><span><a href="/">慢生活</a></span><a href="/">有一种思念，是淡淡的幸福,一个心情一行文字</a></li>
          <li><span><a href="/">爱情美文</a></span><a href="/">励志人生-要做一个潇洒的女人</a></li>
          <li><span><a href="/">慢生活</a></span><a href="/">女孩都有浪漫的小情怀——浪漫的求婚词</a></li>
          <li><span><a href="/">博客模板</a></span><a href="/">Green绿色小清新的夏天-个人博客模板</a></li>
          <li><span><a href="/">女生个人博客</a></span><a href="/">女生清新个人博客网站模板</a></li>
          <li><span><a href="/">Wedding</a></span><a href="/">Wedding-婚礼主题、情人节网站模板</a></li>
          <li><span><a href="/">三栏布局</a></span><a href="/">Column 三栏布局 个人网站模板</a></li>
          <li><span><a href="/">个人网站模板</a></span><a href="/">时间煮雨-个人网站模板</a></li>
          <li><span><a href="/">古典风格</a></span><a href="/">花气袭人是酒香—个人网站模板</a></li>
        </ol>
      </div>
      <div class="search">
        <form class="searchform" method="get" action="#">
          <input type="text" name="s" value="Search" onfocus="this.value=''" onblur="this.value='Search'">
        </form>
      </div>
      <div class="viny">
        <dl>
          <dt class="art"><img src="/Public/Home/images/artwork.png" alt="专辑"></dt>
          <dd class="icon-song"><span></span>南方姑娘</dd>
          <dd class="icon-artist"><span></span>歌手：赵雷</dd>
          <dd class="icon-album"><span></span>所属专辑：《赵小雷》</dd>
          <dd class="icon-like"><span></span><a href="/">喜欢</a></dd>
          <dd class="music">
            <audio src="/Public/Home/images/nf.mp3" controls></audio>
          </dd>
          <!--也可以添加loop属性 音频加载到末尾时，会重新播放-->
        </dl>
      </div>
    </aside>
  </div>
  <!--blogs end--> 
</div>
<!--mainbody end-->

<script>
  //定义一个页码数
  var p=1;
$('.loads').on('click',function(){
$.ajax({
   type: "GET",
   url: "/index.php/Home/Index/getdata",
   data: "p="+p,
   dataType:'json',
   success: function(msg){
     //alert( "Data Saved: " + msg );
  //定义一个空的字符串
   var str='';
   //循环数组对象
   $.each(msg,function(k,v){
    //拼接字符串
      str += '<li><div class="arrow_box"><div class="ti"></div><!--三角形--><div class="ci"></div>';
       str+='<h2 class="title"><a href="/" target="_blank">'+v.title+'</a></h2>';   
       str+='<ul class="textinfo">'
       str+='<a href="/"><img src="/Public/Home/images/s1.jpg"></a>'
       str+='<p>'+v.content+'</p></ul>'
      str+='<ul class="details">';      
      str+= '<li class="likes"><a href="#">'+v.support_num+'</a></li>';     
      str+= '<li class="comments"><a href="#">'+v.disscuss_num+'</a></li>';        
     str+='<li class="icon-time"><a href="#">'+v.add_time+'</a></li>'; 
      str+='</ul></div>';         
   }) 
  //alert(str);
  $('#suibian').before(str);
   }
 
}); 
 if(p >= $(this).attr('pageTotal')) $(this).parent().html('暂无更多资源'); 
 p++;
 //alert(p);

})
 //点赞
 $('.zan').on('click',function(){
  //获取文章id值
  var id=$(this).attr('opt');
  var num=parseInt($(this).children().html())+1;
  var obj=$(this)
  //alert(num);
  $.ajax({
   type: "GET",
   url: "/index.php/Home/Index/zan",
   data: "id="+id,
   success: function(msg){
    if(msg==1)
    {
      //alert('点赞成功');
      $(obj).children().html(num)+1;
    }else
    {
   alert('点赞失败');
    }
   }
});
 })
</script>