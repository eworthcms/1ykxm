<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link href="<?php echo G_TEMPLATES_STYLE; ?>/js/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo G_TEMPLATES_STYLE; ?>/js/demo.css" rel="stylesheet" type="text/css" />
<link href="http://www.1ykxm.com/statics/templates/yungou/css/new_register.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/jquery.Validform.min.js"></script>
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/passwordStrength-min.js"></script>
<script type="text/javascript">
$(function(){		
	var demo=$(".login_ConInput").Validform({
		tiptype:2,
		usePlugin:{
			passwordstrength:{
				minLen:6,
				maxLen:20,
				trigger:function(obj,error){
					if(error){
						obj.parent().next().find(".Validform_checktip").show();
						obj.parent().next().find(".passwordStrength").hide();
					}else{
						obj.parent().next().find(".Validform_checktip").hide();
						obj.parent().next().find(".passwordStrength").show();	
					}
				}
			}
		}

	});	
})
</script>

<div id="NA">

    <div class="left">
        <div class="tabs">
            <p class="email <?php if($regtype == 'email'){echo 'cur';} ?>">
                <a href="<?php echo WEB_PATH; ?>/new_register/&regtype=email" class="ei"><i></i>电子邮箱注册<sub></sub></a>
            </p>
            <p class="phone <?php if($regtype == 'phone'){echo 'cur';} ?>">
                <a href="<?php echo WEB_PATH; ?>/new_register/&regtype=phone" class="pi"><i></i>手机号注册<sub></sub></a>
            </p>
        </div>
        <div class="Panel PanelA" id="email">
        <div class="step clear">
            <?php 
            if($regtype == 'email')
            {
            echo '<p>
                <span class="step1 cur"><i>1</i>
                <br>
                填写账户信息</span>
                <span class="step2"><i>2</i>
                <br>
                邮件激活账户</span>
                <span class="step3"><i>3</i>
                <br>
                注册成功</span>
        </p>';
            }
            elseif($regtype == 'phone')
            {
                echo '<p>
                <span class="step1 cur"><i>1</i>
                <br>
                填写手机号码</span>
                <span class="step3"><i>2</i>
                <br>
                注册成功</span>
        </p>';
            }
            else{echo '';}
             ?>

        </div>

        <div class="reg_box ">

            <!--<div class="item msg_zt1">-->
                <!--<label>邮箱：</label>-->
                <!--<input type="text" class="itext1" id="pemail" autocomplete="off" />-->
                <!--<div class="msg_box row1"><em></em><span class="msg">请填写常用邮箱</span></div>-->
            <!--</div>-->
            <!--<div class="item pw msg_zt3">-->
                <!--<label>密码：</label>-->
                <!--<input type="password" class="itext1" id="password" />-->
                <!--<div class="msg_box row1"><em></em><span class="msg">请输入密码</span></div>-->

                <!--<div id="PwdStrength" class="strength">-->
                    <!--<div class="pw-bar" id="pswdLevel">-->
                        <!--<span></span><span></span><span></span>-->
                    <!--</div>-->
                    <!--<div class="pw-letter">-->
                        <!--<span>弱</span><span>中</span><span>强</span>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->
            <!--<div class="item msg_zt2">-->
                <!--<label>确认密码：</label>-->
                <!--<input type="password" class="itext1" id="password2" />-->
            <!--</div>-->
            <!--<div class="item i_code">-->
                <!--<label>验证码：</label>-->
                <!--<input type="text" class="itext2" id="validCode">-->
                <!--<span id="vcode_box"><img src="/simple_captcha?code=32e4244d38f515f4ac9f1d8e312f53d619aca23e&amp;time=1398937880"-->
                                <!--alt="captcha"><input id="captcha_key" name="captcha_key" type="hidden" value="32e4244d38f515f4ac9f1d8e312f53d619aca23e">-->
                <!--</span>-->
                <!--<a id="refresh_vcode" href="javascript:void(0);">换一换</a>-->
            <!--</div>-->

            <div class="item msg_zt3">
                <label>手机号码：</label>
                <input type="text" class="itext1" id="mobil">
            <div class="msg_box row1"><em></em><span class="msg">请填写手机号</span></div></div>
            <div class="item pw msg_zt3">
                <label>密码：</label>
                <input type="password" class="itext1" id="password">
                <div id="PwdStrength" class="strength">
                    <div class="pw-bar" id="pswdLevel">
                        <span></span><span></span><span></span>
                    </div>
                    <div class="pw-letter">
                        <span>弱</span><span>中</span><span>强</span>
                    </div>
                </div>
                <div class="msg_box row1"><em></em><span class="msg">请输入密码</span></div>
            </div>
            <div class="item msg_zt3">
                <label>确认密码：</label>
                <input type="password" class="itext1" id="password2">
                <div class="msg_box row1"><em></em><span class="msg">确认密码不能为空</span></div>
            </div>
            <div class="item i_code msg_zt3">
                <label>手机验证码：</label>
                <input type="text" class="itext2" id="validCodeP">
                <span class="i_codeP"><a href="javascript:void(0);">免费获取手机验证码</a></span>
                <div class="msg_box row1"><em></em><span class="msg">请输入验证码</span></div>
            </div>

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
                <input type="button" class="Mem_orangebut btn" id="reg_submit" value="立即注册">
            </div>
        </div>
    </div>
    </div>
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