<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>

<div class="groups-stripes"></div>
<div class="layout980">
	<div class="groups-left">
		<div class="Topic-head">
			<div class="Topic-Himg"><a href="" class="fl-img"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $quanzi['img']; ?>" id="imgGroupIco" border="0"></a></div>
			<div class="Topic-HC">
				<div class="Topic-Htit gray03">
					<h2><a id="thisGroupName" href="" class="orange"><?php echo $quanzi['title']; ?></a></h2> 
					<?php if($quanzi['jiaru']=='Y'): ?>
					<?php if(!$addgroup): ?>
					<a id="btnJoinGroup" href="javascript:;" class="button04">申请加入</a>
					<?php  else: ?>
					<span class="JoinOut" id="spanJoinOut"><s></s>已加入<i>|</i><a id="btnJoinOutGroup" href="javascript:;" class="blue">退出</a></span>
					<?php endif; ?>
					<?php endif; ?>
				</div>
				<p class="Topic-Hinfo gray02">成员：
					<span class="gray01"><?php echo $quanzi['chengyuan']; ?></span>&nbsp;&nbsp;&nbsp;话题：
					<span class="gray01"><?php echo $quanzi['tiezi']; ?></span>&nbsp;&nbsp;&nbsp;创建时间：
					<span class="gray01"><?php echo date("Y-m-d H:i",$quanzi['time']); ?></span>
				</p>
				<div class="Topic-Hintro"><span id="pGroupAbout" class="gray01"><?php echo $quanzi['jianjie']; ?></span>&nbsp;</div>
			</div>
			<div class="Managers">
				<a class="Managers-icon" type="showCard" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($quanzi['guanli']); ?>"></a>
				<div class="Managers-Himg"><a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($quanzi['guanli']); ?>" type="showCard" class="fl-img">
				<?php if(userid($quanzi['guanli'],'img')==null): ?>
				<img src="<?php echo G_TEMPLATES_STYLE; ?>/images/prmimg.jpg" width="50" height="50" />
				<?php  else: ?>
				<img id="imgUserPhoto" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo userid($quanzi['guanli'],'img'); ?>" width="50" height="50" border="0"/>
				<?php endif; ?>				
				</a>
				<p class="Managers-name"><a type="showCard" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($quanzi['guanli']); ?>" class="blue"><?php echo userid($quanzi['guanli'],'username'); ?></a></p>
				</div>
			</div>
		</div>
		<div class="msg">
			<b><i></i>圈子公告：</b>
			<p id="pGroupNotice" class="gray01"><?php echo $quanzi['gongao']; ?></p>
		</div>
		<div class="Publish">
			<div class="Pub-inp-click">
				<b></b>
				<input type="text" id="txtTopicTitle" value="点击展开"><a id="btnPostTopic" href="javascript:;" class="button05">发表话题</a>
			</div>
			<div id="divEditor" class="Pub-topic hidden">
			<form action="<?php echo WEB_PATH; ?>/group/group/showinsert" method="post">
				<p class="Pub-tit"><b></b><input id="txtTopicTitleEx" maxlength="100" type="text" name="title" value=""></p>
				<p class="Pub-con"><b></b><textarea id="txtTopicContent" name="neirong" value="" style="border:1px solid #C2C2C2; height:150px; resize:none;"></textarea></p>
				<input type="hidden" value="<?php echo $quanzi['id']; ?>" name="qzid" />
				<div class="Pub-btn-r">
					<a id="btnCancel" href="javascript:;" class="button06">取消</a>
					<input type="submit" id="btnPostTopicEx" style="float:right; margin-left:10px" name="submit" class="button05"value="发表话题" />
				</div>
			</form>
			</div>
		</div>		
		<div class="Topic-tab">
			<ul>
				<li class="tabcur">话题</li>
			</ul>
		</div>
		<?php if($total==0): ?>
		<div class="tips-con"><i></i>暂无话题，快抢沙发吧！</div>
		<?php  else: ?>
		<?php $ln=1;if(is_array($qz)) foreach($qz AS $tiezi): ?>
		<div class="Topiclist">
			<div class="Topiclist-img">
				<a type="showCard" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($tiezi['hueiyuan']); ?>" class="head-img">
				<?php if(userid($tiezi['hueiyuan'],'img')==null): ?>
				<img src="<?php echo G_TEMPLATES_STYLE; ?>/images/prmimg.jpg" width="50" height="50" />
				<?php  else: ?>
				<img id="imgUserPhoto" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo userid($tiezi['hueiyuan'],'img'); ?>" width="50" height="50" border="0"/>
				<?php endif; ?>	
				</a>
				<a type="showCard" rel="nofollow" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($tiezi['hueiyuan']); ?>" class="blue"><?php echo userid($tiezi['hueiyuan'],'username'); ?></a>
			</div>
			<div class="Topiclist-RC "><b class="arrow"></b>
				<div class="R-tit gray">		
					<?php if($tiezi['zhiding']=='Y'): ?>
					<a href="<?php echo WEB_PATH; ?>/group/nei/<?php echo $tiezi['id']; ?>" class="red"><?php echo $tiezi['title']; ?></a>
					<i class="zhiding"></i>&nbsp;
					<?php  else: ?>
					<a href="<?php echo WEB_PATH; ?>/group/nei/<?php echo $tiezi['id']; ?>"><?php echo $tiezi['title']; ?></a> 
				   <!--  <i class="jing"></i>&nbsp; -->
				   <?php endif; ?>
					<span class="time"><?php echo date("Y年m月d日 H:i",$tiezi['time']); ?></span>
				</div>
				<div class="gray02"><?php echo _strcut($tiezi['neirong'],160); ?></div>
				<div class="topic-reply">
					<div>
						<a href="<?php echo WEB_PATH; ?>/group/nei/<?php echo $tiezi['id']; ?>" class="gray02">回复<span class="gray03">(<?php echo $tiezi['hueifu']; ?>)</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="<?php echo WEB_PATH; ?>/group/nei/<?php echo $tiezi['id']; ?>" class="gray02">人气<span class="gray03">(<?php echo $tiezi['dianji']; ?>)</span></a>
					</div>
					<span class="gray03">最后回复：<a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($tiezi['zuihou']); ?>" class="blue"><?php echo userid($tiezi['zuihou'],'username'); ?></a>&nbsp;&nbsp;<?php echo date("Y年m月d日",$tiezi['time']); ?>&nbsp;&nbsp;</span>			
				</div>
			</div><p class="Topicline"></p>
		</div>					
		<?php  endforeach; $ln++; unset($ln); ?>
		<?php if($total>$num): ?>
		<div class="pagesx"><?php echo $page->show('two'); ?></div>
		<?php endif; ?>
		<?php endif; ?>	
	</div>
	<?php include templates("group","right");?>
</div>
<script>
$(function(){
	$("#btnJoinGroup,#btnJoinOutGroup").click(function(){
		var uid="<?php echo $uid; ?>";
		if(!uid){
			alert("你未登录！");
		}else{
			var qzid="<?php echo $quanzi['id']; ?>";
			var text=$("#btnJoinOutGroup").text();
			$.ajax({
				type:"POST",
				url:"<?php echo WEB_PATH; ?>/group/group/goqz",
				data:{id:qzid,text:text},
				success:function(){
					location.replace(location);
				}
			});
		}		
	});
	$("#txtTopicTitle,#btnPostTopic").click(function(){
		var uid="<?php echo uidcookie('uid'); ?>";
		var text=$("#btnJoinOutGroup").text();
		if(!uid){
			alert("你未登录！");
		}else if(!text){
			alert("你未加入圈子！");
		}else{
			$("#divEditor").removeClass("hidden");
			$(".Pub-inp-click").addClass("hidden");
		}
	});
	$("#btnCancel").click(function(){
		$("#divEditor").addClass("hidden");
		$(".Pub-inp-click").removeClass("hidden");
	});
	$("form").submit(function(){
		var text=$("#txtTopicTitleEx").val();
		var content=$("#txtTopicContent").val();
		if(!text || !content){			
			alert("标题内容不能为空!");
			return false;
		}
	})
})
</script>
 <?php include templates("index","footer");?>