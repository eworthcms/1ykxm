<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<div class="main-content clearfix">
<?php include templates("member","left");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/layout-setUp.css"/>
<div class="R-content">
	<div class="member-t"><h2>邮箱验证</h2></div>
	<div class="email_verification_ok">
		<h4>验证成功</h4>
		<ul>
			<li><span>发送成功！</span></li>
			<li>1元开心购已经发送了一封验证邮件到您的邮箱<?php echo $email; ?></li>
			<li>请尽快登录您的邮箱点击验证链接，完成邮箱验证</li>
		</ul>
		<p class="not">没有收到邮件？</p>
		<p>1.请检查您的垃圾箱或广告箱，邮件有可能被误认为垃圾或广告邮件；或选择
		<a class="orangebut" href="javascript:location.reload();" >重发验证邮件</a>
		</p>
		<p>2.若您的邮箱已过期或忘记密码无法登录，请拨打客服电话 400-685-9800 申诉更换验证邮箱。</p>
	</div>
</div>
		
</div>
<?php include templates("index","footer");?>