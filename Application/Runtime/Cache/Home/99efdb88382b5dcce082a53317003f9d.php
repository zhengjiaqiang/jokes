<?php if (!defined('THINK_PATH')) exit();?><div class="media">
         <a href="#" class="pull-left">
            <img width="80" alt="媒体对象" src="images/touxiang.jpg" class="media-object img-circle">
         </a>
         <div class="media-body">
            <h4 class="media-heading">
              <span class="pull-left"><?php echo ($data["title"]); ?></span>
              <time class="pull-right"><?php echo (date("Y/m/d H:i:s",$data["comment_time"])); ?></time>
            </h4>
            <p><?php echo ($data["comment_text"]); ?><a href="#">回复</a></p><br>
          </div>
</div>