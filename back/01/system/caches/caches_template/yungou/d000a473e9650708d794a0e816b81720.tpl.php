<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<div class="main-content clearfix">
<?php include templates("member","left");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/layout-topic.css"/>
<div class="R-content">
	<div class="subMenu">
		<a class="current">已晒单</a>
		<a >未晒单</a>
	</div>
	<div class="list-tab topic" style="display: block;">
		<ul class="listTitle">
			<li style="text-align:center;" class="w100">晒单图片</li>
			<li class="w400">晒单信息</li>
			<li class="w130">晒单状态</li>
			<li class="w85 fr">操作</li>
		</ul>
		<?php if($shaidan==null): ?>
		<div class="tips-con"><i></i>暂无记录！</div>
		<?php  else: ?>
		<?php $ln=1;if(is_array($shaidan)) foreach($shaidan AS $sd): ?>
		<ul class="listCon">			
			<li class="w100" style="text-align:center;"><a href="<?php echo WEB_PATH; ?>/go/shaidan/detail/<?php echo $sd['sd_id']; ?>" target="_blank" class="blue"><img width="50" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $sd['sd_thumbs']; ?>"/></a></li>
			<li class="w400"><a href="<?php echo WEB_PATH; ?>/go/shaidan/detail/<?php echo $sd['sd_id']; ?>" target="_blank" class="gray01"><?php echo $sd['sd_title']; ?></a></li>
			<li class="w85 fr">
			<font color="#666">不可修改</font>
			</li>
		</ul>
		<?php  endforeach; $ln++; unset($ln); ?>
		<?php endif; ?>
	</div>
	<div class="list-tab topic" style="display: none;">
		<ul class="listTitle">
			<li style="text-align:center;" class="w100">商品图片</li>
			<li class="w630">商品信息</li>
			<li class="w85 fr">操作</li>
		</ul>
		<?php if($record==null): ?>
		<div class="tips-con"><i></i>暂无记录！</div>
		<?php  else: ?>
		<?php $ln=1;if(is_array($record)) foreach($record AS $sd): ?>
		<ul class="listCon">
			<li style="text-align:center;" class="w100"><div class="listConT"><img width="50" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo shoplisext($sd['shopid'],'thumb'); ?>"/></div></li>
			<li style="text-indent:1em;" class="w400"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $sd['shopid']; ?>" target="_blank"><?php echo shoplisext($sd['shopid'],'title'); ?></a></li>
			<li class="w50 fr"><a name="delete" href="<?php echo WEB_PATH; ?>/member/home/singleinsert/<?php echo $sd['id']; ?>" class="blue">添加晒单</a></li>
		</ul>
		<?php  endforeach; $ln++; unset($ln); ?>
		<?php endif; ?>
	</div>
</div>
<style>
#foucs_big{background:#999; filter:alpha(opacity=30); position:absolute; top:0px; left:0px; width:100%; height:100%; z-index:100; display:none;}
#foucs_min{background:#999; filter:alpha(opacity=50); position:absolute; top:0px; left:0px; width:100%; height:100%; z-index:100; display:none;}

#w3foucs{position:absolute;width:200px; overflow:hidden; left:50%; top:50%; height:auto; z-index:100;background-color:#fff; border:1px #999 solid; padding:1px;}
#w3foucs #foucs_close{
	width:22px;
	height:22px;
	position:absolute;
	z-index:100;
	right:10px;
	top:10px;
	background: url(http://skin.1yyg.com/Images/message.png) -80px -70px no-repeat;
	display: block;
	cursor: pointer;
}
#w3foucs #page_close{
	width:30px;
	height:30px;
	position:absolute;
	z-index:100;
	right:-15px;
	top:-15px;
	display: block;
	cursor: pointer;
	background:url(fancy_close.png) no-repeat;
}
#w3foucs #foucs_main{}
#w3foucs #foucs_main div.title{
    background-color: #F2F2F2;
    color: #666666;
    font-size: 14px;
    font-weight: bold;
    height: 30px;
    line-height: 30px;
    padding-left: 10px;
    padding-top: 3px;
}
#w3foucs #foucs_main div.content{
    padding: 5px;overflow:hidden;z-index:100;
}
#w3foucs #foucs_main .content img{
    z-index:200;
}
.PopMsgC {
    color: #999999;
    font-size: 14px;
    padding: 15px 0;
    text-align: center;
}
.PopMsgC s {
	background:url(http://skin.1yyg.com/Member/images/new-admin.png) -57px -96px no-repeat;
    display: inline-block;
    height: 21px;
    margin-right: 5px;
    vertical-align: top;
    width: 21px;
}
.PopMsgbtn {
    height: 30px;
    text-align: center;
}
.orangebut {
    background: none repeat scroll 0 0 #FF6600;
    border: 1px solid #F65802;
    color: #FFFFFF;
	height: 23px;
    line-height: 23px;
}
.cancelBtn {
    background: none repeat scroll 0 0 #F4F4F4;
    border: 1px solid #DDDDDD;
    color: #747474;
	height: 23px;
    line-height: 23px;
}
.orangebut, .bluebut, .graybut, .cancelBtn, .greenbut {
    border-radius: 2px 2px 2px 2px;
    cursor: pointer;
    display: inline-block;
    font-size: 12px;
    padding: 0 19px;
    text-align: center;
}
#foucs_big,#foucs_min,#w3foucs,#foucs_close,#page_close,#foucs_main{display:block;}
</style>
<script>
$(function(){
	$(".subMenu a").click(function(){
		var id=$(".subMenu a").index(this);
		$(".subMenu a").removeClass().eq(id).addClass("current");
		$(".R-content .topic").hide().eq(id).show();
	});
})
function shaidan(id){
	if(confirm("您确认要删除该条信息吗？")){
		window.location.href="<?php echo WEB_PATH; ?>/member/home/shaidandel/"+id;
	}
	//FixedConfirm('你确定要删除？',240);
}
/*$("#btnShow6").click(function(){
		FixedConfirm('你确定要删除？',240);
});*/
function FixedConfirm(content,minwidth){
	var div=FixedStar();
		div+='<div id="foucs_close"></div>';
		div+='<div id="foucs_main">';
		div+='<div class="title" style="display:black">提示</div>';
		div+='<div class="content"><div class="PopMsgC"  style="display:black"><s></s>'+content+'</div>';
		div+='<div class="PopMsgbtn" style="display:black">';
		div+='<a class="orangebut" id="btnMsgOK" href="javascript:;">确认</a>&nbsp;&nbsp;';
		div+='<a class="cancelBtn" id="btnMsgCancel" href="javascript:;">取消</a>';
		div+='</div></div></div>';
		div+='</div>';	
	$("body").append(div);
	Fixed(minwidth);
	FixedClose();
}
$(function(){
	$(window).resize(function(){
		Fixed();
	})
})
//关闭弹窗
function FixedClose(){
	$("#foucs_close,#page_close,#btnMsgCancel").click(function(){		
		$("#foucs_big,#foucs_min,#w3foucs").fadeOut(200,function(){
			$("#foucs_big,#foucs_min,#w3foucs").remove();
		});		
	})
};
function FixedStar(){
	var div='<div id="foucs_big"></div>';
		div+='<div id="foucs_min"></div>';
		div+='<div id="w3foucs">';
	return div;
}
function Fixed(w,h){
	var bigheight=document.body.clientHeight,
	    bigwidth=document.body.clientWidth;
	var big=$("#foucs_big"),	
	    min=$("#foucs_min");
	var w3foucs=$("#w3foucs");
	if(w==null){
		if(w3foucs.text()!=null){
			w = w3foucs.width();
		}else{
			w = 200;
		}
	}	
	if(h==null){
		var h = w3foucs.height();
	}   
	big.height(bigheight);	
    big.width(bigwidth); 
    big.fadeTo(500,0.5);
	min.width(w+14); 
    min.height(h+14); 
    min.fadeTo(500,0.5);
	
	w3foucs.css("height",h);
	w3foucs.width(w);
    var t = ($(window).height()/2) - (h/2);
    if(t < 0) t = 0;
    $("#w3foucs,#foucs_min").css({display:"block",position:"fixed"});
	$("#foucs_close").css({display:"block"});
    var l = ($(window).width()/2) - (w/2);
    if(l < 0) l = 0;   
    $("#foucs_min").css({left: l-5+'px', top: t-5+'px'});
    w3foucs.css({left: l+'px', top: t+'px'});
}
</script>
</div>
<?php include templates("index","footer");?>