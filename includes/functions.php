<?php
 /** 
	* 主要函数 functions.php
	* 
	* 一些重要的函数放这里
	* @author				svein joe <sveinjoe@gmail.com>
	* @version			1.0 
	* @time					2018-9-9 17:39:31
	*/
	
/**
 * 显示读取文件的日志
 */
function showLoadLog($type, $filename)
{
	if($type == "include")
	{
		sjinclude($filename);
	}else	if($type == "require")
	{
		sjrequire($filename);
	}
}

/**  
	* 当全局配置中的调试模式开启的时候记录并显示读取的文件
	* 
	* @access public 
	* @param mixed $filename 要包含的文件
	* @return void
	*/
function sjinclude($filename)
{
	//如果在调试模式则显示读取记录
	if(DEBUG_LOADFILES)
	{
		echo "include " . $filename . "<br>\n";
	}
}

/**  
	* 替代系统默认的require，当全局配置中的调试模式开启的时候记录并显示读取的文件
	* 
	* @access public 
	* @param mixed $filename 要包含的文件
	* @return void
	*/
function sjrequire($filename)
{
	//如果在调试模式则显示读取记录
	if(DEBUG_LOADFILES)
	{
		echo "require " . $filename . "<br>\n";
	}
}

/**
 * 找不到
 */
function show404notfound()
{
	notfound();
	die();
}

/**
 * 找不到
 */
function notfound()
{
	ob_end_clean();
	header('HTTP/1.0 404 Not Found');
	die('404 NOT FOUND');
}

/**
 * 取得根域名
 * @param type $domain 域名
 * @return string 返回根域名
 */
function GetMainDomain($domain) {
	$domain = trim(strtolower($domain));
	$strhead = substr($domain, 0, 4);
	$result = "";
	if($strhead == "www."){
		$domain = substr($domain, 4);
	}
	return $domain;
}

/**
 * 取得当前网站的根域名
 * @return string 返回根域名
 */
function MainDomain()
{
	return GetMainDomain(getenv("HTTP_HOST"));
}

/**
 * 自动拉取模板文件
 * @param $filename 要读取的模板文件名
 */
function getTemplate($filename)
{
	if(file_exists(CURRENT_TEMPLATE_DIR . $filename))
	{
		return (CURRENT_TEMPLATE_DIR . $filename);
	}
	else
	{
		return (CURRENT_TEMPLATE_DIR . $filename);
	}
}
?>