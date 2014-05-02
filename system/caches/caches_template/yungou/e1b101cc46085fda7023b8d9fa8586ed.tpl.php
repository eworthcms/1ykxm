<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php if(isset($title)): ?><?php echo $title; ?><?php  else: ?><?php echo _cfg("web_name"); ?><?php endif; ?></title>
    <meta name="keywords" content="<?php if(isset($keywords)): ?><?php echo $keywords; ?><?php  else: ?><?php echo _cfg("web_key"); ?><?php endif; ?>" />
    <meta name="description" content="<?php if(isset($description)): ?><?php echo $description; ?><?php  else: ?><?php echo _cfg("web_des"); ?><?php endif; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/Comm.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/register.css"/>
    <!--<link rel="stylesheet" type="text/css" href="//ucloud.1ykxm.com/statics/templates/yungou/css/login.css"/>-->
    <script type="text/javascript" src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/jquery.cookie.js"></script>
    <script src="//unslider.com/unslider.js"></script>
</head>
<body>
<div class="header">
    <div style="clear: both;"></div>
    <div class="head_mid">
        <div class="head_mid_bg">
            <h1 class="logo_1yyg">
                <a class="logo_1yyg_img" href="<?php echo G_WEB_PATH; ?>/" title="<?php echo _cfg('web_name'); ?>">
                    <img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo Getlogo(); ?>"/>
                </a>
            </h1>
        </div>
    </div>
</div>

<link href="<?php echo G_TEMPLATES_STYLE; ?>/js/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo G_TEMPLATES_STYLE; ?>/js/demo.css" rel="stylesheet" type="text/css" />
<link href="http://www.1ykxm.com/statics/templates/yungou/css/new_register.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://www.1ykxm.com/statics/templates/yungou/js/jquery.Validform.min.js"></script>
<script type="text/javascript" src="http://www.1ykxm.com/statics/templates/yungou/js/passwordStrength-min.js"></script>
<script type="text/javascript">
$(function(){
	var demo=$(".newregisterform").Validform({
		tiptype:3,
		usePlugin:{
			passwordstrength:{
				minLen:6,
				maxLen:20,
				trigger:function(obj,error){
					if(error){
//						obj.parent().next().find(".Validform_checktip").show();
						obj.parent().next().find(".passwordStrength").hide();
					}else{
//						obj.parent().next().find(".Validform_checktip").hide();
						obj.parent().next().find(".passwordStrength").show();
					}
				}
			}
		}
	});
})
    $(function(){
        $('.rel-banner').unslider();
    });
</script>
<div id="NA" class="newregisterform">
    <div class="left fl">
    <form method="post" action="" enctype="application/x-www-form-urlencoded" onSubmit="return authOnce(this);">
        <div class="tabs">
            <p class="email cur">
                <a href="<?php echo WEB_PATH; ?>/new_register/&regtype=email" class="ei"><i></i>电子邮箱注册<sub></sub></a>
            </p>
            <p class="phone">
                <a href="<?php echo WEB_PATH; ?>/new_register/&regtype=mobile" class="pi"><i></i>手机号注册<sub></sub></a>
            </p>
        </div>
        <div class="Panel PanelA" id="email">
        <div class="step clear">
            <p>
                <span class="step1 cur"><i>1</i>
                <br>
                填写账户信息</span>
                <span class="step2"><i>2</i>
                <br>
                邮件激活账户</span>
                <span class="step3"><i>3</i>
                <br>
                注册成功</span>
            </p>
        </div>

        <div class="reg_box ">
            <div class="item msg_zt1">
                <label>邮箱：</label>
                <input id="ipyanz" datatype="e" sucmsg="帐号验证通过" nullmsg="请填写帐号" errormsg="邮箱格式不正确" type="text" name="name" class="inputxt itext1" />
                <div class="msg_box Validform_checktip"><span class="msg">请输入邮箱</span></div>
            </div>
            <div class="item pw msg_zt1">
                <label>密码：</label>
                <input datatype="*6-20" plugin="passwordStrength" nullmsg="请设置密码" errormsg="密码范围在6~20位之间" type="password" class="itext1" id="password" name="userpassword" maxlength="20" />
                <!--<div class="msg_box row1"><em></em><span class="msg">请输入密码</span></div>-->
                <div class="msg_box Validform_checktip"><span class="msg">请输入6~20位密码</span></div>
                <div class="passwordStrength strength"><span>弱</span><span>中</span><span class="last">强</span></div>
            </div>
            <div class="item msg_zt1">
                <label>确认密码：</label>
                <input tip="test"  datatype="*" recheck="userpassword" nullmsg="请再输入一次密码！" errormsg="您两次输入的账号密码不一致！" type="password" name="userpassword2" class="inputxt itext1" id="password2" maxlength="20" />
                <div class="msg_box Validform_checktip"></div>
            </div>
            <!--<div class="item i_code">-->
                <!--<label>验证码：</label>-->
                <!--<input type="text" class="itext2" id="validCode">-->
                <!--<span id="vcode_box"><img src="/simple_captcha?code=32e4244d38f515f4ac9f1d8e312f53d619aca23e&amp;time=1398937880"-->
                                <!--alt="captcha"><input id="captcha_key" name="captcha_key" type="hidden" value="32e4244d38f515f4ac9f1d8e312f53d619aca23e">-->
                <!--</span>-->
                <!--<a id="refresh_vcode" href="javascript:void(0);">换一换</a>-->
            <!--</div>-->
            <div class="item i_txt">
                <p>
                    <input type="checkbox" id="inputacc" checked="checked">
                    我已经认真阅读并同意1元开心购的<a href="" target="_blank">《用户注册协议》</a>
                </p>
                <p>
                    <input type="checkbox" checked="checked" id="subscribe_status">
                    接收来自1元开心购的优惠信息
                </p>
            </div>
            <div class="item">
                <input type="submit" name="submit" class="Mem_orangebut btn" id="reg_submit" value="立即注册">
            </div>
            <div class="item loginQQsingle" style="padding-top: 20px; width: 405px;">使用合作帐号登录:
                <span id="qq_login_btn">
                <a href="http://www.1ykxm.com/?/api/qqlogin/"><img src="http://ucloud.1ykxm.com/statics/templates/yungou/images/qqlogin.png"></a>
                </span>
            </div>
        </div>
    </div>
    </form>
    </div>

    <div class="fr rel-banner">
        <ul>
            <li style="background-image: url(//www.1ykxm.com/statics/uploads/shopimg/20140425/94846037435910.jpg);background-repeat:no-repeat;background-size: 100%; width: 80%;">
                <div class="rel-innder">
                    <p class="rel-tit">TP-link</p>
                    <p class="rel-des">TP-link1111111111111111111111111222222dfgdfgdfgsdsfg</p>
                    <a href="http://www.1ykxm.com/?" target="_blank"><img src="http://www.1ykxm.com/statics/uploads/newbie/Guide_14.jpg" border="0" alt="立即开心购" width="160px" /></a>
                </div>
            </li>
            <li style="background-image: url(//www.1ykxm.com/statics/uploads/shopimg/20140425/85791978439034.jpg);background-repeat:no-repeat;background-size: 100%; width: 80%;">
                <div class="rel-innder">
                    <p class="rel-tit">TP-link</p>
                    <p class="rel-des">TP-link1111111111111111111111111222222dfgdfgdfgsdsfg</p>
                    <a href="http://www.1ykxm.com/?" target="_blank"><img src="http://www.1ykxm.com/statics/uploads/newbie/Guide_14.jpg" border="0" alt="立即开心购" width="160px" /></a>
                </div>
            </li>
            <li style="background-image: url(//www.1ykxm.com/statics/uploads/shopimg/20140425/21335462436542.jpg);background-repeat:no-repeat;background-size: 100%; width: 80%;">
                <div class="rel-innder">
                    <p class="rel-tit">TP-link</p>
                    <p class="rel-des">TP-link1111111111111111111111111222222dfgdfgdfgsdsfg</p>
                    <a href="http://www.1ykxm.com/?" target="_blank"><img src="http://www.1ykxm.com/statics/uploads/newbie/Guide_14.jpg" border="0" alt="立即开心购" width="160px" /></a>
                </div>
            </li>
        </ul>
    </div>
    <div style="clear: both;"></div>
</div>

<script type="text/javascript">
var authnum = 0;
function authOnce(form)
{
	if ( authnum == 0 ){
		authnum++;
		return true;
	}else{
		alert('正在操作中……请不要重复点击，谢谢！');
		return false;
	};
}
</script>

<div class="footer_content">
    <div class="footer_line"></div>
</div>
<!--footercontent end-->
<div class="footer" style="height:auto;">
    <div class="copyright"><?php echo _cfg('web_copyright'); ?></div>
    <div class="footer_icon" style="width:400px;">
        <ul>
            <li class="fi_ectrustchina"><span></span></li>
            <li class="fi_315online"><span></span></li>
            <li class="fi_cnnic"><span></span></li>
            <!-- <li class="fi_anxibao"><span></span></li> -->
            <li class="fi_pingan"><span></span></li>
        </ul>
    </div>
</div>
<!--footer end-->
</body>
</html>
