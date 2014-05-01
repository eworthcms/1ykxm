<?php 



class up_file_140425 extends SystemAction{



	function init(){
		$db = System::load_sys_class("model");
		
		/* member 表*/
		$q1 = $db->Query("ALTER TABLE `@#_member` ADD `login_time` int(10) unsigned DEFAULT '0'");	
		$q5 = $db->Query("ALTER TABLE `@#_member_del` ADD `login_time` int(10) unsigned DEFAULT '0'");	
		
		/* brand 表*/
		$q2 = $db->Query("ALTER TABLE `@#_brand` ADD `thumb` varchar(255) DEFAULT NULL");
		$q3 = $db->Query("ALTER TABLE `@#_brand` ADD `url` varchar(255) DEFAULT NULL");
		
		$q4 = $db->Query("ALTER TABLE `@#_brand` MODIFY COLUMN `cateid` varchar(255)");
		
		if($q1 && $q2 && $q3 && $q4 && $q5){
			unlink(__FILE__);
			_message("数据库更新成功!");			
		}else{
			_message("数据库更新失败!");
		}
		
	}


}