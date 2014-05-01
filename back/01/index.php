<?php

 /*
 *---------------------------------------------------------------
 * SYSTEM BAN BEN TYPE
 *---------------------------------------------------------------
 */
 
 define('G_BANBEN_TYPE',"9aabCQkBVlQABwcEU1wDD1NWUVcCClBaAwcAC1GK3fvfn5besLlKgbis04z5gr+wSoSF3Nmz09657BTWi+KC263Wu7EV19Pv2Jii0+rt");
 
 /*
 *---------------------------------------------------------------
 * SYSTEM FOLDER NAME
 *---------------------------------------------------------------
 */
$system_path = 'system';

 /*
 *---------------------------------------------------------------
 * STATICS FOLDER NAME
 *---------------------------------------------------------------
 */
$statics_path = 'statics';
$statics_res = 'http://ucloud.1ykxm.com/statics';


 /*
 *---------------------------------------------------------------
 * APP START PATH
 *---------------------------------------------------------------
 */
define('G_APP_PATH',dirname(__FILE__).DIRECTORY_SEPARATOR);


/*
 * ------------------------------------------------------------------------------------
 *  timidavid - js css to OSS
 */
define('G_TEMPLATES_CSS', 'http://ucloud.1ykxm.com/statics/templates/yungou/css');
define('G_TEMPLATES_JS','http://ucloud.1ykxm.com/statics/templates/yungou/js');
define('G_TEMPLATES_STYLE','http://ucloud.1ykxm.com/statics/templates/yungou');
define('G_TEMPLATES_PATH','http://ucloud.1ykxm.com/statics/templates');
//define('G_UPLOAD_PATH','http://ucloud.1ykxm.com/statics/uploads');


/*
 * --------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------
 */
include  G_APP_PATH.$system_path.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'global.php';

/*
 * --------------------------------------------------------------
 * APP START
 * --------------------------------------------------------------
 */

System::CreateApp();

?>
