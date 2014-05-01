<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<meta name="description" content="最新100条开心购记录"><meta name="keywords" content="最新100条开心购记录">
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/Comm.css">
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/ygRecord.css">
   <input name="hidBuyId" type="hidden" id="hidBuyId" value="1948496">
    <!--开心购记录开始-->
    <div class="ygRecord">
        <h3>
            <span>最新开心购记录</span><p>本页显示最新开心购记录<strong>100</strong>条 <a href="<?php echo WEB_PATH; ?>/buyrecord">查看历史开心购记录&gt;&gt;</a></p>
        </h3>
        <ul class="Record_title">
            <li class="time">开心购时间</li>
            <li class="nem">会员账号</li>
            <li class="name">开心购商品名称</li>
            <li class="much">开心购人次<!--开心购人次--></li>
        </ul>
        <div id="recordList">
                <?php $n=1; ?>    
				<?php $ln=1;if(is_array($RecordList)) foreach($RecordList AS $Record): ?>
				<?php 
					$n++;
					$Record['time'] = explode(".",$Record['time']);
					if($n%2==0){$class='Record_content';}else{$class='Record_contents';}
				 ?>            
				<ul class="<?php echo $class; ?>">
					<li class="time"><?php echo date("Y-m-d H:i:s",$Record['time'][0]); ?>.<?php echo $Record['time']['1']; ?></li>
					<li class="nem"><a class="blue" href="<?php echo WEB_PATH; ?>/uname/<?php echo $Record['uid']; ?>" target="_blank"><?php echo $Record['username']; ?></a></li>
					<li class="name"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $Record['shopid']; ?>">（第<?php echo $Record['shopqishu']; ?>期）<?php echo _strcut($Record['shopname'],60,null); ?></a></li>
					<li class="much"><?php echo $Record['gonumber']; ?>人次</li>
				</ul>
				<?php  endforeach; $ln++; unset($ln); ?>   
					
        </div>
        <div class="endpage">本页显示最新开心购记录<strong>100</strong>条 <a href="<?php echo WEB_PATH; ?>/buyrecord" rel="nofollow">查看历史开心购记录&gt;&gt;</a></div>
    </div>
<?php include templates("index","footer");?>