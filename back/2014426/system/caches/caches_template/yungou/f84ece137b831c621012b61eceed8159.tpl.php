<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php $mysql_model=System::load_sys_class('model'); ?><?php $fund_data=$this->DB()->GetOne("select * from `@#_fund` where 1 limit 1",array("cache"=>0)); ?>
<?php if(!$fund_data['fund_off']): ?>
<?php echo _message("基金未开启！"); ?>
<?php endif; ?>
<?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>
<?php include templates("index","header");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/fund.css"/>
<div class="fundCon">
	<div class="fImg">
		<img src="<?php echo G_TEMPLATES_STYLE; ?>/images/welfare_03.jpg" alt="">
		<img src="<?php echo G_TEMPLATES_STYLE; ?>/images/welfare_05.jpg" alt="">
		<img src="<?php echo G_TEMPLATES_STYLE; ?>/images/welfare_07.jpg" alt="">
	</div>
	<div class="fInfo">
		<div class="tit1">
			<s class="welfare"></s>
		</div>
		<div class="step">
			<ul>
				<li class="sTop"></li>
				<li class="scen">
					<s class="welfare s1"></s>
					<dl><p>开心购基金是<?php echo _cfg("web_name"); ?>创始人发起成立的以公益事业为主要方向的爱心基金。开心购基金本着“我为人人，人人为我”的社会责任，向需要帮助的困难人们提供爱心捐助。</p></dl>
				</li>
				<li class="sBottom"></li>
			</ul>
			<ul>
				<li class="sTop"></li>
				<li class="scen">
					<s class="welfare s2"></s>
					<dl><p>每位在<?php echo _cfg("web_name"); ?>进行分享购物的朋友，您的每次参与都将是为我们的公益事业做出一份贡献。当您每参与1人次开心购，将由1元开心购出资为开心购基金筹款0.01元，所筹款项将全部用于开心购基金。</p></dl>
				</li>
				<li class="sBottom"></li>
			</ul>
			<ul>
				<li class="sTop"></li>
				<li class="scen">
					<s class="welfare s3"></s>
					<dl>开心购基金将会以第1种途径或第2种途径进行使用：<br>
					1、<?php echo _cfg("web_name"); ?>全体员工将组织向身边的公益事业进行捐赠与关怀活动。活动内容包括：资金、所需用品以及探望与协助等，每次捐赠与关怀活动结束后开心购基金将公布活动详情以及基金详细使用报告。<br>
					2、开心购基金通过腾讯公益或壹基金等公益组织进行爱心捐赠。</dl>
				</li>
				<li class="sBottom"></li>
			</ul>
			<ul>
				<li class="sTop"></li>
				<li class="scen">
					<s class="welfare s4"></s>
					<dl><p>包括开心购基金的捐赠活动，我们不定期开展内部全体员工对身边更多公益事业或实时公益事业进行爱心捐赠的社会活动。</p>
					<p>我们还将不定期邀请幸运者参与并见证我们的基金社会活动，共同为我们的社会责任付出一份爱心与力量。当活动启动前我们会将活动进行公告，您可自愿或自行组织参与，组成开心购网大家庭，共同开启活动之行。凡参与社会活动的幸运者均能获得开心购网为您精心准备的公益爱心礼品一份。</p></dl>
				</li>
				<li class="sBottom"></li>
			</ul>
		</div>
	</div>

	<div class="fAccount">
		<div class="tit2">
			<s class="welfare"></s>
		</div>
		<div class="value">
			<dt><?php echo _cfg("web_name"); ?>公益账户累计总额：</dt>
			<dl>( 其中100万元为开心购网预先注入启动资金 )</dl>
			<p><b id="pFundMoney"><?php echo $fund_data['fund_count_money']; ?></b><span>元</span></p>
		</div>
		<dl><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/welfare_15.gif" alt=""></dl>
		<div class="fCon">
		<div class="funding" id="divFundList">						
						<?php $get_go = System::load_app_model('get_go','go');$data = $get_go->get_record("10","return:data"); ?>				
			<?php $ln=1;if(is_array($data)) foreach($data AS $record): ?>			
			<ul>
				<li><a href="<?php echo WEB_PATH; ?>/uname/<?php echo $record['uid']+1000000000; ?>" target="_blank">
				<?php if($record['img']==null): ?>
				<img src="<?php echo G_TEMPLATES_STYLE; ?>/images/prmimg.jpg" width="160" height="160" />
				<?php  else: ?>
				<img id="imgUserPhoto" src="<?php echo G_UPLOAD_PATH; ?>/touimg/<?php echo $record['img']; ?>" border="0"/>
				<?php endif; ?>
				</a></li>
				<li><a href="<?php echo WEB_PATH; ?>/uname/<?php echo $record['uid']+1000000000; ?>" target="_blank">
				<?php if($record['username']!=null): ?>
				<?php echo _strcut($record['username'],7); ?>
				<?php elseif ($record['mobile']!=null): ?>
				<?php echo _strcut($record['mobile'],7); ?>
				<?php  else: ?>
				<?php echo _strcut($record['email'],7); ?>
				<?php endif; ?>
				</a>刚刚开心购<?php echo $record['gonumber']; ?>人次，贡献{wc:$record['gonumber']份爱心</li>
			</ul>
			<?php  endforeach; $ln++; unset($ln); ?>
			
		</div>	
		<div class="btn"><a href="<?php echo WEB_PATH; ?>" title="立即参与开心购 贡献爱心"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/btn_41.gif" border="0" alt=""></a></div>
	</div>
</div>
</div>
<script>
//开心购基金
$(function(){
	$.ajax({
		url:"<?php echo WEB_PATH; ?>/api/fund/get",
		success:function(msg){
			$("#pFundMoney").text(msg);
		}
	})
})
</script>
<?php include templates("index","footer");?>