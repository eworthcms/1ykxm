<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html>
<head><meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title><?php echo $key; ?></title>
<meta content="app-id=518966501" name="apple-itunes-app" /><meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" /><meta content="yes" name="apple-mobile-web-app-capable" /><meta content="black" name="apple-mobile-web-app-status-bar-style" /><meta content="telephone=no" name="format-detection" /><link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/comm.css" rel="stylesheet" type="text/css" /><link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/goods.css" rel="stylesheet" type="text/css" /><script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jquery190.js" language="javascript" type="text/javascript"></script><script id="pageJS" data="<?php echo G_TEMPLATES_JS; ?>/mobile/BuyRecord.js" language="javascript" type="text/javascript"></script></head>
<body>
<div class="h5-1yyg-v1" id="loadingPicBlock">
    
<!-- 栏目页面顶部 -->


<!-- 内页顶部 -->

    <header class="g-header">
        <div class="head-l">
	        <a href="javascript:;" onclick="history.go(-1)" class="z-HReturn"><s></s><b>返回</b></a>
        </div>
        <h2><?php echo $key; ?></h2>
        <div class="head-r">
	        <a id="btnSort" href="javascript:;" class="z-sort"><i></i>排序<s class="z-SswOn"></s><s class="z-SswNt"></s></a>
        </div>
    </header>

    <input name="hidCodeID" type="hidden" id="hidCodeID" value="18101" />
    <input name="hidIsEnd" type="hidden" id="hidIsEnd" value="1" />

    <!-- 开心购记录 -->
    <section id="buyRecordPage" class="goodsCon">
        <div id="divRecordList" class="recordCon z-minheight" style="display:block;">
            <?php echo $desc['content']; ?>
        </div>
        
    </section>

    
<?php include templates("mobile/index","footer");?>
<script language="javascript" type="text/javascript">

</script>

</div>
</body>
</html>
