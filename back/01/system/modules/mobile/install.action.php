<?php 



class install extends SystemAction {



	public function init(){
	
		$db = System::load_sys_class("model");
		$sql = "CREATE TABLE `wap` (
				  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
				  `img` varchar(50) default NULL COMMENT '幻灯片',
				  `title` varchar(30) default NULL,
				  `color` varchar(30) default NULL,
				  `link` varchar(255) default NULL,
				  PRIMARY KEY  (`id`),
				  KEY `img` (`img`)
			  ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='幻灯片表';
		";
		
		$ret = $db->Query($sql);
		
		if($ret)
			unlink(__FILE__);
	
	}

	


}