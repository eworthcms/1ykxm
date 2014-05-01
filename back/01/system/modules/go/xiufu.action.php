<?php


	class xiufu extends SystemAction {
	
		
	public function init(){
		$db = System::load_sys_class("model");
		$glist = $db->GetList("select username,shopid,uid,gonumber FROM `@#_member_go_record` where `shopid` != '1'");
		echo "<pre>";
		print_r($glist);
	
	
	}	
	
	public function scode(){
		$id = $this->segment(4);
		$db = System::load_sys_class("model");
		$info = $db->GetOne("select * from `@#_shopcodes_1` where `id` = '$id'");
		$info['s_codes'] = unserialize($info['s_codes']);
		$info['s_codes_tmp'] = unserialize($info['s_codes_tmp']);
		$s_codes1 = implode(',',$info['s_codes']);
		$s_codes2 = implode(',',$info['s_codes_tmp']);
		
		echo $s_codes1;
		echo "<hr>";
		echo $s_codes2;
		echo "<br>";
		
		echo str_replace($s_codes1,"",$s_codes2); //取出不重复的部分。
		
	}

	public function upcodes(){
		
			$db = System::load_sys_class("model");
			
			$glist = $db->GetList("select username,shopid,uid,gonumber FROM `@#_member_go_record` where `shopid` = '1'");
			
			$codes=array();
			for($i=1;$i<=102;$i++){
				$codes[$i]=10000000+$i;
			}
			shuffle($codes);
			$this->codes=$codes;
			
			echo "数组长度是:".count($glist)."<br>";
			foreach($glist as $k=>$v){		
				$code = $this->echo_codes(intval($v['gonumber']));
				$q = $db->Query("UPDATE `@#_member_go_record` SET `goucode` = '$code' where `shopid` = '1' and `uid` = '$v[uid]'");
				if($q){
					echo $v['username']." 的订单更新成功! code={$code}<br>";
				}else{
					echo $v['username']." 的订单更新失败! code={$code}<br>";
				}
			
			}
		
		}
		
		private function echo_codes($len=1){
			$codes=$this->codes;			
			
			$a='';
			for($i=1;$i<=$len;$i++){
				$a.=array_pop($codes);	
				$a.=',';
			}
			$a = trim($a,",");
			
			$this->codes=$codes;	
			return $a;
		}
	
	}

?>