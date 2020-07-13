<?php
 /** 
	* 全局设置的参数都放在同一个文件，方便检查
	* 
	* 全局配置在这里设置
	* @author				svein joe <sveinjoe@gmail.com>
	* @version			1.0 
	* @time					2018-9-9 17:38:11
	*/
//全局调试开关
if(strstr($_SERVER["HTTP_USER_AGENT"], "IMGADMIN")){
	define("DEBUG", true);
}else{
	define("DEBUG", false);
}
define("DEBUG_LOADFILES", false);
define("HTTPS_ON", false);
define("TEMPLATES_DIR", "includes/templates/");
define("TEMPLATE_DEFAULT", "default");
define("CURRENT_TEMPLATE", "default");
define("CURRENT_LANGUAGE", "japanese");
define("CURRENT_TEMPLATE_DIR", TEMPLATES_DIR . CURRENT_TEMPLATE . "/");
define("DEFAULT_TEMPLATE_DIR", TEMPLATES_DIR . TEMPLATE_DEFAULT . "/");

if(DEBUG)
{
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
}
else
{
	error_reporting(0);
}

//语言文件
$languagefile = "includes/languages/" . CURRENT_LANGUAGE . ".php";
if(file_exists($languagefile)){
	include $languagefile;
}else{
	include 'includes/languages/default.php';
}
?>