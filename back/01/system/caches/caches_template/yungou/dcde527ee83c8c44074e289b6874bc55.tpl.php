<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<div class="main-content clearfix">
<?php include templates("member","left");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/layout-records.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/layout-invitation.css"/>
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/ZeroClipboard.js"></script>

         <div class="R-content">
            <div class="member-t"><h2>邀请好友</h2></div>
            
		        <div id="divInvited" class="success-invitation gray02"  >
			        <p>复制链接邀请好友拿四重大礼！ <a target="_blank" href="<?php echo WEB_PATH; ?>/single/pleasereg" class="blue">详情&gt;&gt;</a></p>
			        <span><b></b><input id="txtInfo"  style="width:500px;height:20px; " disabled="disabled" value="1元就能买IPhone 4S哦，快去看看吧！ <?php echo WEB_PATH; ?>/register/<?php echo $uid; ?>" onpaste="return false" type="text"></span>
				  <div class="d_clip_copy"></div>
				   <div id="d_clip_container" style="position:relative;">									
					<div id="d_clip_button" class="bluebut" style="text-align:center;margin-top:24px"  >复制</div>
				</div>
		        </div>
		    
            <div id="divInviteInfo" class="get-tips gray01" style="">成功邀请 <span class="orange"><?php echo $involvedtotal; ?></span> 位会员注册，已有 <span class="orange"><?php echo $involvednum; ?></span> 位会员参与开心购</div>
            <div id="divList" class="list-tab SuccessCon"><ul class="listTitle"><li class="w200">用户名</li><li class="w200">时间</li><li class="w180">邀请编号</li><li>消费状态</li></ul>
			<?php if($involvedtotal!=0): ?>
			<?php $ln=1; if(is_array($invifriends)) foreach($invifriends AS $key => $val): ?>
			  <ul><li class="w200">  <a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($val['uid']); ?>" target="_blank" class="blue"><?php echo $val['sqlname']; ?></a></li>
			  <li class="w200"><?php echo date('Y.m.d H:i:s',$val['time']); ?></li>
			  <li class="w180"><?php echo idjia($val['uid']); ?></li>
			  <li><?php echo $records[$val['uid']]; ?></li></ul>
			<?php  endforeach; $ln++; unset($ln); ?>
            <?php  else: ?>
			 <div class="tips-con"><i></i>您还未有邀请谁哦</div></div>
			<?php endif; ?>			
			</div>
            <div id="divPageNav" class="page_nav"></div>
        </div>
	</div>	
	 
 <style type="text/css">
#d_clip_container,.my_clip_button,.d_clip_copy{margin:0;width:65px; height:22px;   text-align:center;}
#d_clip_container{top:-45px;left:508px;}
#fe_text{resize:none;margin-bottom:10px;}
.my_clip_button {position:absolute; border:1px solid #999; background-color:#1ba3fa; cursor:default; font-size:9pt; }
.my_clip_button.hover { background-color:#1ba3fa; }
.my_clip_button.active { background-color:#1ba3fa; }
.d_clip_copy{ font-size:14px;color:#000;}
  
</style>  

<style>
  .goods_show li{
    color:#7D7D7D;
	float:left;
	width:194px;  
  }
 .goods_show li a{
    color:#22AAFF;
	border-bottom:1px solid #22AAFF;
  }
</style>
<script>
 var clip = null;	
function copy(id){ return document.getElementById(id); }	
function initx(){
	clip = new ZeroClipboard.Client();
	clip.setHandCursor(true);
	ZeroClipboard.setMoviePath("<?php echo G_TEMPLATES_STYLE; ?>/js/ZeroClipboard.swf");
	clip.addEventListener('mouseOver',function (client){
		clip.setText(copy('txtInfo').value );
	});		
	clip.addEventListener('complete',function(client,text){
		alert("邀请复制成功");
	});		
	clip.glue('d_clip_button','d_clip_container');
}
$(function(){
	initx();
})

</script>
</div>
<?php include templates("index","footer");?>