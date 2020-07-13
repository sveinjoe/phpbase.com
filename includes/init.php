<?php
 /** 
	* 分析需要调用哪些文件，比如：函数、类
	* 
	* 包含需要的文件进来
	* @author				svein joe <sveinjoe@gmail.com>
	* @version			1.0 
	* @time					2018-9-9 17:36:36
	*/
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set("Etc/GMT-9");
require "includes/config.php";
session_start();

//读取主要函数
require "includes/functions.php";

//如果网站不存在直接返回404
$catdir = "cache/" . MainDomain() . "/";
if(!is_dir($catdir)){
  show404notfound();
}

//自动读取所有函数
require 'includes/loadall.php';
if(DomainExists() == false)
{
	notfound();
}
$tplfile_html_header = getTemplate("html_header.php");
$tplfile_main_page = getTemplate("tpl_" . MAIN_PAGE . ".php");
$tplfile_html_footer = getTemplate("html_footer.php");
sjinclude($tplfile_html_header);
include($tplfile_html_header);
sjinclude($tplfile_main_page);
include($tplfile_main_page);
sjinclude($tplfile_html_footer);
include($tplfile_html_footer);

?>