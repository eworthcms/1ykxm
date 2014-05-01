<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link href="<?php echo G_TEMPLATES_STYLE; ?>/js/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/jquery.Validform.min.js"></script>
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/passwordStrength-min.js"></script>
<script type="text/javascript">
$(function(){		
	var demo=$(".login_Content").Validform({
		tiptype:2,
	});	
});
var form_but;
window.onload=function(){
			
	var checkcode=document.getElementById('showVerifySN');
	var src=checkcode.src;
		checkcode.onclick=function(){
				this.src=src+'/?';	
		}
	
}
</script>
<div class="login_layout">
	<div class="login_title">
		<h2>密码忘了？不要着急，通过以下方式即可帮您顺利的找回来！</h2>
	</div>
	<div class="login_Content">
		<form method="post" action="" enctype="application/x-www-form-urlencoded">
		<div class="login_CMobile_Complete login_CEmailPal">
			<p>您可以通过注册时所填写的手机号或邮箱地址找回密码，请在下方输入您的帐号信息。</p>
			<dl>
				<dt>邮箱地址或手机号：</dt>
				<dd><input datatype="m | e" sucmsg="帐号验证通过！" nullmsg="请填写帐号！" errormsg="手机号或邮箱！" id="userAccount" type="text" name="name" class="login_CMobile_CodeW" value=""></dd>
				<dd><div style="margin:7px 0 0 10px;" class="Validform_checktip">手机号或邮箱！</div></dd>
			</dl>
			<dl>
				<dt>验证码：</dt>
				<dd><input id="regSN" type="text" name="txtRegSN" class="login_input_text" value="" maxlength="6" style="width:60px;"><span><img  src="<?php echo WEB_PATH; ?>/api/checkcode/image/80/27/" id="showVerifySN" alt="看不清？换一张"></span></dd>
			</dl>
			<input type="submit" name="submit" id="btnSubmitAccount" class="login_Email_but"  value="提交" />			
		</div> 
		</form>
		<div class="login_Explain">
			<p>1.您若忘记注册时所用的手机号或邮箱建议您重新注册账号， <a href="<?php echo WEB_PATH; ?>/member/user/register" class="blue Fb">立即注册</a></p>
			<p>2.若有任何疑问或需要帮助请您进入帮助中心，也可以点击在线客服进行咨询或拨打服务热线400-685-9800</p>
		</div>
	</div>
</div>
<?php include templates("index","footer");?>