<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
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
</script>

<div id="NA" class="newregisterform">
    <form method="post" action="" enctype="application/x-www-form-urlencoded" onSubmit="return authOnce(this);">
    <div class="left">
        <div class="tabs">
            <p class="email cur">
                <a href="<?php echo WEB_PATH; ?>/new_register/&regtype=email" class="ei"><i></i>电子邮箱注册<sub></sub></a>
            </p>
            <p class="phone">
                <a href="<?php echo WEB_PATH; ?>/new_register/&regtype=phone" class="pi"><i></i>手机号注册<sub></sub></a>
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
        </div>
    </div>
    </div>
    </form>
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
<?php include templates("index","footer");?>