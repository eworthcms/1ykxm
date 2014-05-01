<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<div class="main-content clearfix">
<?php include templates("member","left");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/layout-setUp.css"/>
<script type="text/javascript">
$(function(){
	var A=20;
	var B=function()
	{if(A==1){
		location.replace("<?php echo WEB_PATH; ?>/member/home")
	}else{
		$("#spanNum").html(A);A--}
	};setInterval(B,1000)
})
</script>
<div class="R-content">
	<div class="member-t"><h2>邮箱验证</h2></div>
	<div class="email_verification_ok">
		<h4>验证成功</h4>
		<ul>
			<li><span>验证成功！</span></li>
			<li>您现在可以使用您的手机号 <span><?php echo $member['mobile']; ?></span> 或邮箱账号 <span><?php echo $memberx['0']; ?></span> 进行登录！</li>
			<li>您还可以：<a href="<?php echo WEB_PATH; ?>">开始开心购</a> <a href="<?php echo WEB_PATH; ?>/member/home">去个人中心首页</a></li>
			<li>如没有任何操作，系统将在 <span id="spanNum"></span> 秒后自动跳转到个人中心首页！</li>
		</ul>
	</div>
</div>
		
</div>
<?php include templates("index","footer");?>