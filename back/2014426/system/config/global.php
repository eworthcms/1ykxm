<?php
global $_cfg;
define('G_IN_SYSTEM', TRUE);
define('G_START_TIME', microtime());
define('G_HTTP_HOST', (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ''));
define('G_HTTP_REFERER', isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '');
define('G_HTTP', isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://');
if (!defined('G_APP_PATH')) {
    define('G_APP_PATH', dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR);
}
define('G_SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
define("G_SYSTEM", G_APP_PATH . $system_path . DIRECTORY_SEPARATOR);
$_cfg['system_dir'] = $system_path;
define("G_STATICS", G_APP_PATH . $statics_path . DIRECTORY_SEPARATOR);
$_cfg['sstatics_dir'] = $statics_path;
define("G_UPLOAD", G_STATICS . 'uploads' . DIRECTORY_SEPARATOR);
define("G_CONFIG", G_SYSTEM . 'config' . DIRECTORY_SEPARATOR);
define("G_CACHES", G_SYSTEM . 'caches' . DIRECTORY_SEPARATOR);
define("G_PLUGIN", G_SYSTEM . 'plugin' . DIRECTORY_SEPARATOR);
define("G_TEMPLATES", G_STATICS . 'templates' . DIRECTORY_SEPARATOR);
define("G_WEB_PATH", dirname(G_HTTP . G_HTTP_HOST . $_SERVER['SCRIPT_NAME']));
require G_SYSTEM . 'libs/system.class.php';
if (System::load_sys_config('system', 'index_name') == NULL) {
    define("WEB_PATH", G_WEB_PATH);
} else {
    define("WEB_PATH", G_WEB_PATH . '/' . System::load_sys_config('system', 'index_name'));
}
define("G_UPLOAD_PATH", G_WEB_PATH . '/' . $statics_path . '/uploads');
define("G_PLUGIN_PATH", G_WEB_PATH . '/' . $statics_path . '/plugin');
define("G_PLUGIN_APP", G_SYSTEM . 'plugin' . DIRECTORY_SEPARATOR);
$templates = System::load_sys_config('templates', System::load_sys_config('system', 'templates_name'));
define("G_STYLE", $templates['dir']);
define("G_STYLE_HTML", $templates['html']);

//define('G_GLOBAL_STYLE', G_PLUGIN_PATH . '/style');
//define("G_TEMPLATES_PATH", G_WEB_PATH . '/' . $statics_path . '/templates');
//define("G_TEMPLATES_STYLE", G_TEMPLATES_PATH . '/' . G_STYLE);
//define("G_TEMPLATES_CSS", G_TEMPLATES_PATH . '/' . G_STYLE . '/css');
//define("G_TEMPLATES_JS", G_TEMPLATES_PATH . '/' . G_STYLE . '/js');
/*
 * ------------------------------------------------------------------------------------
 *  timidavid - js css to OSS
 */
define('G_TEMPLATES_CSS', 'http://ucloud.1ykxm.com/statics/templates/yungou/css');
define('G_TEMPLATES_JS','http://ucloud.1ykxm.com/statics/templates/yungou/js');
define('G_TEMPLATES_STYLE','http://ucloud.1ykxm.com/statics/templates/yungou');
define('G_TEMPLATES_PATH','http://ucloud.1ykxm.com/statics/templates');
define('G_GLOBAL_STYLE','http://ucloud.1ykxm.com/statics/plugin/style');
//define('G_UPLOAD_PATH','http://ucloud.1ykxm.com/statics/uploads');


define("G_TEMPLATES_IMAGE", G_TEMPLATES_PATH . '/' . G_STYLE . '/images');
System::load_sys_fun('global');
if (System::load_sys_config('system', 'error')) {
    _error_handler();
}
function_exists('date_default_timezone_set') && date_default_timezone_set(System::load_sys_config('system', 'timezone'));
$_cfg = System::load_sys_config("system");
define('G_ADMIN_DIR', System::load_sys_config("system", 'admindir'));
define('WC_VERSION', System::load_sys_config("version", 'version'));
if (!is_php('5.3')) {
    set_magic_quotes_runtime(0);
}
$code   = strtolower(System::load_sys_config("code", 'code'));
$jstime = '';
$yuming = '';
$codes  = strrev(substr($code, 0, 42));
for ($i = 3; $i <= 42; $i += 4) {
    $jstime .= substr($codes, $i, 1);
}
for ($i = 0; $i <= 40; $i += 4) {
    $yuming .= substr($codes, $i, 3);
}
if ("421aa90e079fa326b6494f812ad13e79" == $yuming) {
    define('G_BANBEN_NUMBER', 4);
    define('G_BANBEN_ERROR', "PHNjcmlwdD52YXIgUndyc3RaMSA9IDEyMDtzZXRJbnRlcnZhbChmdW5jdGlvbigpe2lmKFJ3cnN0WjE+MCl7Undyc3RaMT1Sd3JzdFoxLTE7fWVsc2V7d2luZG93WyJhbGVydCJdKCdcdTZiNjRcdTdhZDlcdTcwYjlcdTRlM2FcdTZkNGJcdThiZDVcdTcyNDhcdTc1MjhcdTYyMzcsXHU2NzJhXHU4M2I3XHU1Zjk3XHU1NTQ2XHU0ZTFhXHU2Mzg4XHU2NzQzISxcdThkMmRcdTRlNzBcdTYzODhcdTY3NDNcdThiZjdcdTUyNGRcdTVmODA6IGh0dHA6Ly93d3cueXVuZ291Y21zLmNvbS8nKTtSd3JzdFoxPTEyMDt9fSwxMDAwKTs8L3NjcmlwdD4=");
} else {
    preg_match('/[\w][\w-]*\.(?:com\.cn|net\.cn|org\.cn|com|cn|co|net|org|name|cc|mobi|so|biz|info|it|tv|me|)(\/|$)/isU', WEB_PATH, $domain);
    if ($domain) {
        $u = trim($domain[0], '/');
    } else {
        define('G_BANBEN_NUMBER', -1);
        define('G_BANBEN_ERROR', "PHNjcmlwdD52YXIgTGhlX1RZWG4xID0gMTIwO3NldEludGVydmFsKGZ1bmN0aW9uKCl7aWYoTGhlX1RZWG4xPjApe0xoZV9UWVhuMT1MaGVfVFlYbjEtMTt9ZWxzZXt3aW5kb3dbImFsZXJ0Il0oJ1x1OGJlNVx1N2FkOVx1NzBiOVx1NGUzYVx1NjcyYVx1NjM4OFx1Njc0M1x1NzUyOFx1NjIzNyxcdTY3MmFcdTgzYjdcdTVmOTdcdTU1NDZcdTRlMWFcdTYzODhcdTY3NDMhLFx1OGQyZFx1NGU3MFx1NjM4OFx1Njc0M1x1OGJmN1x1NTI0ZFx1NWY4MDogaHR0cDovL3d3dy55dW5nb3VjbXMuY29tLycpO0xoZV9UWVhuMT0xMjA7fX0sMTAwMCk7PC9zY3JpcHQ+");
    }
    if (md5($u) == $yuming) {
        $time = time();
        if (md5($jstime) != '196b3ac0665000ca927d177427b75fdc' && $jstime < $time) {
            define('G_BANBEN_NUMBER', -2);
            define('G_BANBEN_ERROR', "PHNjcmlwdD52YXIgWlhZV29EUkEkMSA9IDEyMDtzZXRJbnRlcnZhbChmdW5jdGlvbigpe2lmKFpYWVdvRFJBJDE+MCl7WlhZV29EUkEkMT1aWFlXb0RSQSQxLTE7fWVsc2V7d2luZG93WyJhbGVydCJdKCdcdTYzODhcdTY3NDNcdTY1ZjZcdTk1ZjRcdTVkZjJcdTdlY2ZcdTUyMzBcdTY3MWYhLFx1OGQyZFx1NGU3MFx1NjM4OFx1Njc0M1x1OGJmN1x1NTI0ZFx1NWY4MDogaHR0cDovL3d3dy55dW5nb3VjbXMuY29tLycpO1pYWVdvRFJBJDE9MTIwO319LDEwMDApOzwvc2NyaXB0Pg==");
        } else {
            if (md5($jstime) == '196b3ac0665000ca927d177427b75fdc' && substr(substr($code, 42, 2), 0, 1) == 3) {
                define('G_BANBEN_NUMBER', 3);
            } elseif (substr(substr($code, 42, 2), 0, 1) == 2) {
                define('G_BANBEN_NUMBER', 2);
            } elseif (substr(substr($code, 42, 2), 0, 1) == 1) {
                define('G_BANBEN_NUMBER', 1);
            } else {
                define('G_BANBEN_NUMBER', -1);
                define('G_BANBEN_ERROR', "PHNjcmlwdD52YXIgTGhlX1RZWG4xID0gMTIwO3NldEludGVydmFsKGZ1bmN0aW9uKCl7aWYoTGhlX1RZWG4xPjApe0xoZV9UWVhuMT1MaGVfVFlYbjEtMTt9ZWxzZXt3aW5kb3dbImFsZXJ0Il0oJ1x1OGJlNVx1N2FkOVx1NzBiOVx1NGUzYVx1NjcyYVx1NjM4OFx1Njc0M1x1NzUyOFx1NjIzNyxcdTY3MmFcdTgzYjdcdTVmOTdcdTU1NDZcdTRlMWFcdTYzODhcdTY3NDMhLFx1OGQyZFx1NGU3MFx1NjM4OFx1Njc0M1x1OGJmN1x1NTI0ZFx1NWY4MDogaHR0cDovL3d3dy55dW5nb3VjbXMuY29tLycpO0xoZV9UWVhuMT0xMjA7fX0sMTAwMCk7PC9zY3JpcHQ+");
            }
        }
    } else {
        define('G_BANBEN_NUMBER', -1);
        define('G_BANBEN_ERROR', "PHNjcmlwdD52YXIgTGhlX1RZWG4xID0gMTIwO3NldEludGVydmFsKGZ1bmN0aW9uKCl7aWYoTGhlX1RZWG4xPjApe0xoZV9UWVhuMT1MaGVfVFlYbjEtMTt9ZWxzZXt3aW5kb3dbImFsZXJ0Il0oJ1x1OGJlNVx1N2FkOVx1NzBiOVx1NGUzYVx1NjcyYVx1NjM4OFx1Njc0M1x1NzUyOFx1NjIzNyxcdTY3MmFcdTgzYjdcdTVmOTdcdTU1NDZcdTRlMWFcdTYzODhcdTY3NDMhLFx1OGQyZFx1NGU3MFx1NjM4OFx1Njc0M1x1OGJmN1x1NTI0ZFx1NWY4MDogaHR0cDovL3d3dy55dW5nb3VjbXMuY29tLycpO0xoZV9UWVhuMT0xMjA7fX0sMTAwMCk7PC9zY3JpcHQ+");
    }
}
if (function_exists("set_time_limit") == TRUE AND @ini_get("safe_mode") == 0) {
    set_time_limit(100);
}
define('G_CHARSET', System::load_sys_config('system', 'charset'));
header('Content-type: text/html; charset=' . G_CHARSET);
unset($templates);
if (System::load_sys_config('system', 'gzip') && function_exists('ob_gzhandler')) {
    ob_start('ob_gzhandler');
} else {
    ob_start();
}
?>