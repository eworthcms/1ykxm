<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>限时 - <?php echo $webname; ?>触屏版</title>
    <meta content="app-id=518966501" name="apple-itunes-app" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <!-- 该标签用于指定是否将网页内容中的手机号码显示为拨号的超链接 -->
     <link href="<?php echo G_TEMPLATES_IMAGE; ?>/mobile/favicon.ico" rel="apple-touch-icon-precomposed" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/comm.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/comm.css" rel="stylesheet" type="text/css" /><link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/AutoLottery.css" rel="stylesheet" type="text/css" /><script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jquery190.js" language="javascript" type="text/javascript"></script><script id="pageJS" data="<?php echo G_TEMPLATES_JS; ?>/mobile/AutoLottery.js" language="javascript" type="text/javascript"></script> 
 

</head>
<body>
    <div class="h5-1yyg-w310">
        
<!-- 栏目页面顶部 -->


<!-- 内页顶部 -->

    <header class="g-header">
        <div class="head-l">
	        <a href="javascript:;" onclick="history.go(-1)" class="z-HReturn"><s></s><b>返回</b></a>
        </div>
        <h2>限时揭晓</h2>
		<?php include templates("mobile/index","headertop");?>
    </header>

        <nav class="limit-nav">
		<ul>
			<li class="limit-navCur" onclick="location.href='<?php echo WEB_PATH; ?>/mobile/autolottery'">今日揭晓</li>
			<li class="" onclick="location.href='<?php echo WEB_PATH; ?>/mobile/autolottery/next'">明日限时</li>
		</ul>
	</nav>
        <!-- 焦点图 -->
        <input name="hdStartAt" type="hidden" id="hdStartAt" value="0" />
        <section class="flexbox clearfix limit-ct">
	
	    <article id="autoLotteryBox" class="clearfix limit-content">
    <ul id="divTimerItems" class="slides">
        <?php if($count>1): ?>
		<div class="loading" style="background:#F4F4F4">
            <b>
            </b>
            正在加载
        </div>
		<?php  else: ?>
		 <?php if(0 == $count ): ?>
		 <div id="divNone" class="haveNot z-minheight" style="display:block"><s></s><p><?php echo $titlets; ?></p>
		</div>
		<?php endif; ?>
		<?php endif; ?>
	  	<?php $ln=1;if(is_array($shoplist)) foreach($shoplist AS $shop): ?>
        <?php 
        $shop['time_H'] = abs(date("H",$shop['xsjx_time']));
	    $sysj=$shop['xsjx_time']-time();
         ?>         
        <?php if($shop['xsjx_time'] < time()): ?> 	
	     <li class="m-xs-li" txt="<?php echo $shop['time_H']; ?>点">
            <div class="m-round limit-bd limit-End">
                <div class="f-limit-time">
                    <span class="f-limit-time-date">已揭晓</span>
                </div>
                <div class="limt-pic">
                    <a href="<?php echo WEB_PATH; ?>/mobile/mobile/item/<?php echo $shop['id']; ?>">
                        <img border="0" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $shop['thumb']; ?>"
                        />
                    </a>
                </div>
                <div class="limit-bd-con">
                    <p class="z-limit-tt">
                        <a href="<?php echo WEB_PATH; ?>/mobile/mobile/item/<?php echo $shop['id']; ?>" class="gray6 z-tt">
                            (第<?php echo $shop['qishu']; ?>期)<?php echo $shop['title']; ?>
                        </a>
                    </p>
                    <p class="z-promo">
                        价值:<em class="gray9">￥<?php echo $shop['money']; ?></em>
                    </p>
                    <div class="Progress-bar">
                        <p class="u-progress" title="已完成<?php echo width($shop['canyurenshu'],$shop['zongrenshu'],100); ?>%">
                            <span class="pgbar" style="width:width:<?php echo width($shop['canyurenshu'],$shop['zongrenshu'],100); ?>%;">
                                <span class="pging">
                                </span>
                            </span>
                        </p>
                        <ul class="Pro-bar-li">
                            <li class="P-bar01">
                                <em><?php echo $shop['canyurenshu']; ?></em>已参与
                            </li>
                            <li class="P-bar02">
                                <em><?php echo $shop['zongrenshu']; ?></em>总需人次
                            </li>
                            <li class="P-bar03">
                                <em><?php echo $shop['zongrenshu']-$shop['canyurenshu']; ?></em>剩余
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix gray9 limit-user">
                    <a class="fl z-Limg" href="location.href='<?php echo WEB_PATH; ?>/uname/<?php echo idjia($shop['q_uid']); ?>">
                        <s></s>
                        <img border="0" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo get_user_key($shop['q_uid'],'img'); ?>">
                    </a>
                    <p>
                        恭喜<span class="z-user blue" onclick="location.href='<?php echo WEB_PATH; ?>/uname/<?php echo idjia($shop['q_uid']); ?>'"><?php echo get_user_name($shop['q_uid']); ?></span>获得
                    </p>
                    <p class="m-limit-Code">幸运开心购码：<em class="orange"><?php echo $shop['q_user_code']; ?></em>
                    </p>
                    <p>
                        开心购人次：<?php echo $user_shop_number[$shop['q_uid']][$shop['id']]; ?>
                    </p>
                </div>
            </div>
        </li>
	    <?php  else: ?>
        <li class="m-xs-li" txt="<?php echo $shop['time_H']; ?>点">
            <div class="m-round limit-bd ">
                <div name="timerItem" class="f-limit-time" time="<?php echo $sysj; ?>">
                    <span class="f-limit-time-date">
                        <b>剩余时间</b><em>00</em>时<em>00</em>分<em>00</em>秒
                    </span>
                </div>
                <div class="limt-pic">
                    <a href="<?php echo WEB_PATH; ?>/mobile/mobile/item/<?php echo $shop['id']; ?>">
                        <img border="0" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $shop['thumb']; ?>"
                        />
                    </a>
                </div>
                <div class="limit-bd-con">
                    <p class="z-limit-tt">
                        <a href="<?php echo WEB_PATH; ?>/mobile/mobile/item/<?php echo $shop['id']; ?>" class="gray6 z-tt">
                            (第<?php echo $shop['qishu']; ?>期)<?php echo $shop['title']; ?>
                        </a>
                    </p>
                    <p class="z-promo">价值:<em class="gray9">￥<?php echo $shop['money']; ?></em>
                    </p>
                    <div class="Progress-bar">
                        <p class="u-progress" title="已完成<?php echo width($shop['canyurenshu'],$shop['zongrenshu'],100); ?>%">
                            <span class="pgbar" style="width:width:<?php echo width($shop['canyurenshu'],$shop['zongrenshu'],100); ?>%;">
                                <span class="pging"></span>
                            </span>
                        </p>
                        <ul class="Pro-bar-li">
                            <li class="P-bar01">
                                <em><?php echo $shop['canyurenshu']; ?></em>已参与
                            </li>
                            <li class="P-bar02"><em><?php echo $shop['zongrenshu']; ?></em>总需人次
                            </li>
                            <li class="P-bar03"><em><?php echo $shop['zongrenshu']-$shop['canyurenshu']; ?></em>剩余
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="u-Btn">
				   <?php if($shop['canyurenshu']==$shop['zongrenshu']): ?>
                    <div class="u-Btn-li">
                        <a class="grayBtn">
                            下手慢了！！ 被抢光啦！！
                        </a>
                    </div>
					<?php  else: ?>
					<div class="u-Btn-li">
						<a href="javascript:;" class="z-ShoppingBtn" id="<?php echo $shop['id']; ?>">立即1元开心购</a>
					</div>
					<div class="u-Btn-li">
						<a href="javascript:void(0);" class="z-cartBtn" id="<?php echo $shop['id']; ?>">加入购物车</a>
					</div>
					<?php endif; ?>
                </div>
            </div>
        </li>
	   <?php endif; ?>
       <?php  endforeach; $ln++; unset($ln); ?>
    </ul>
</article>
	    
	<article class="clearfix mt10 m-round limit-tips">
		<h3>限时揭晓规则</h3>
		<div class="limit-tips-ct">
			<p><s></s><b>所有限时揭晓商品，不管已参与人次是否达到总需参与人次，都按截止时间准时揭晓。</b></p>
			<p><s></s><b>如果计算出的开心购码未被购买，则取差值最小的开心购码作为幸运开心购码。</b></p>
			<p><s></s><b>如果有2个开心购码最小差值相等，则取大值作为最终幸运开心购码。</b></p>
			<p><s></s><b>限时揭晓商品不参与差价送福分活动且晒单不可再获得1000福分奖励。</b></p>
			<p><s></s><b>限时揭晓的幸运开心购码计算方式：</b></p>
			  <em><span>1)</span><b>限时揭晓商品取截止时间前网站所有商品100条购买时间记录。</b></em>
			  <em><span>2)</span><b>时间按时、分、秒、毫秒依次排列组成一组数值。</b></em>
			  <em><span>3)</span><b>将这100组数值之和除以商品总需参与人次后取余数，余数加上10,000,001即为“幸运开心购码”。</b></em>
		</div>
	</article>
</section>
        
<?php include templates("mobile/index","footer");?>
<script language="javascript" type="text/javascript">
  var Path = new Object();
  Path.Skin="<?php echo G_WEB_PATH; ?>/statics/templates/yungou";  
  Path.Webpath = "<?php echo WEB_PATH; ?>";
  
var Base={head:document.getElementsByTagName("head")[0]||document.documentElement,Myload:function(B,A){this.done=false;B.onload=B.onreadystatechange=function(){if(!this.done&&(!this.readyState||this.readyState==="loaded"||this.readyState==="complete")){this.done=true;A();B.onload=B.onreadystatechange=null;if(this.head&&B.parentNode){this.head.removeChild(B)}}}},getScript:function(A,C){var B=function(){};if(C!=undefined){B=C}var D=document.createElement("script");D.setAttribute("language","javascript");D.setAttribute("type","text/javascript");D.setAttribute("src",A);this.head.appendChild(D);this.Myload(D,B)},getStyle:function(A,B){var B=function(){};if(callBack!=undefined){B=callBack}var C=document.createElement("link");C.setAttribute("type","text/css");C.setAttribute("rel","stylesheet");C.setAttribute("href",A);this.head.appendChild(C);this.Myload(C,B)}}
function GetVerNum(){var D=new Date();return D.getFullYear().toString().substring(2,4)+'.'+(D.getMonth()+1)+'.'+D.getDate()+'.'+D.getHours()+'.'+(D.getMinutes()<10?'0':D.getMinutes().toString().substring(0,1))}
Base.getScript('<?php echo G_TEMPLATES_JS; ?>/mobile/Bottom.js?v='+GetVerNum());
</script>
 

</body>
</html>
