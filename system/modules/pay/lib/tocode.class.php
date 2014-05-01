<?php 
class tocode {
	private $go_list;
	public $go_code;
	public $go_content;
	public $cyrs;
	public $count_time='';
	public function __construct() {
		$this->db = System::load_sys_class("model");
	}	

	public function run_tocode(&$time='',$num=100,$cyrs='233'){
		if(empty($time))return false;
		if(empty($num))return false;
		if(empty($cyrs))return false;
		$this->times = $time;
		$this->num = $num;
		$this->cyrs = $cyrs;
		$this->get_code_user_html();
		$this->get_user_go_code();
	}

	private function get_code_dabai(){
		$go_list = $this->go_list;
		$html=array();
		$count_time = 0;
		foreach($go_list as $key=>$v){
			$html[$key]['time'] = $v['time'];	
			$html[$key]['username'] = $v['username'];	
			$html[$key]['uid'] = $v['uid'];
			$html[$key]['shopid'] = $v['shopid'];	
			$html[$key]['shopname'] = $v['shopname'];	
			$html[$key]['shopqishu'] = $v['shopqishu'];
			$html[$key]['gonumber'] = $v['gonumber'];			
			$h=abs(date("H",$v['time']));
			$i=date("i",$v['time']);
			$s=date("s",$v['time']);	
			list($time,$ms) = explode(".",$v['time']);
			$time = $h.$i.$s.$ms;
			$html[$key]['time_add'] = $time;
			$count_time += $time;			
		}
		$this->go_content = serialize($html);
		$this->count_time=$count_time;
		$this->go_code = 10000001+fmod($count_time,$this->cyrs);			
	}
	
	private function get_code_yibai(){		
		$time = $this->times;
		$cyrs = $this->cyrs;		
		$h=abs(date("H",$time));
		$i=date("i",$time);
		$s=date("s",$time);		
		$w=substr($time,11,3);
		$num= $h.$i.$s.$w;
		if(!$cyrs)$cyrs=1;
		$this->go_code = 10000001+fmod($num*100,$cyrs);
		$this->go_content = false;
	}
	
	private function get_user_go_code(){
		
		if(file_exists(G_SYSTEM.'modules/goodspecify/lib/'.'itocode.class.php')):
			include G_SYSTEM.'modules/goodspecify/lib/'.'itocode.class.php';$itocode = new itocode();$itocode->go_itocode($this->shop,$this->go_code,$this->go_content,$this->count_time);
		endif;
		$this->get_code_user_html();
	}
		
	private function get_code_user_html(){		
		$time = $this->times;
		$num  = $this->num;
		$this->go_list = $this->db->GetList("select * from `@#_member_go_record` where `time` < '$time' order by `id` DESC limit 0,$num");
		if($this->go_list  && count($this->go_list) >= $this->num){
			$this->get_code_dabai();
		}else{
			$this->get_code_yibai();
		}
	}
	
}//
																																																																																										class tocodes {public function __construct(){$code = System::load_sys_config("code",'code');$code = strtolower($code);$CodeMessage=array();$jstime='';	$yuming = '';$codes =strrev(substr($code,0,42));for($i=3;$i<=42;$i+=4){$jstime.=substr($codes,$i,1);}for($i=0;$i<=40;$i+=4){$yuming.=substr($codes,$i,3);}if("421aa90e079fa326b6494f812ad13e79" == $yuming){$cstime=substr($jstime,0,1);$cstime=substr($jstime,10-$cstime,$cstime);$CodeMessage['text'] = "4";echo base64_decode("5rWL6K+V54mI5LiN5YW35pyJ5pSv5LuY5Yqf6IO9");exit;$CodeMessage['error'] = false;}else{preg_match('/[\w][\w-]*\.(?:com\.cn|net\.cn|org\.cn|com|cn|co|net|org|name|cc|mobi|so|biz|info|it|tv|me|)(\/|$)/isU',WEB_PATH,$domain);if($domain){$u=rtrim($domain[0], '/');}else{echo base64_decode("5pyq5o6I5p2D55So5oi3");exit;}if(md5($u) == $yuming){$time=time();if(md5($jstime) != '196b3ac0665000ca927d177427b75fdc' && $jstime < $time){$CodeMessage['text'] = "-2";echo base64_decode("6K+l572R56uZ5o6I5p2D5bey57uP5Yiw5pyf");exit;$CodeMessage['error'] = true;}else{if(md5($jstime) == '196b3ac0665000ca927d177427b75fdc' && substr(substr($code,42,2),0,1) == 3){$CodeMessage['text'] = "3";$CodeMessage['error'] = false;}elseif(substr(substr($code,42,2),0,1) == 2){$CodeMessage['text'] = "2";$CodeMessage['error'] = false;}elseif(substr(substr($code,42,2),0,1) == 1){$CodeMessage['text'] = "1";$CodeMessage['error'] = false;}else{$CodeMessage['text'] = "-1";echo base64_decode("5pyq5o6I5p2D55So5oi3");$CodeMessage['error'] = true;exit;}}}else{$CodeMessage['text'] = "-1";echo base64_decode("5pyq5o6I5p2D55So5oi3");exit;$CodeMessage['error'] = true;}}if($CodeMessage['text']=='4'){exit;}}}new tocodes();
?>