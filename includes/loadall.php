<?php
/**
 * loadall.php
 * 自动读取functions文件夹的函数，classes文件夹的类，init目录的配置文件
 */
//读取函数
$functionDir = "includes/functions/";
$arrFunctionsFiles = scandir($functionDir);
foreach($arrFunctionsFiles as $file)
{
	if(strstr($file, ".function.php"))
	{
		sjinclude($functionDir . $file);
		include($functionDir . $file);
	}
}

//读取类
$classDir = "includes/classes/";
$arrClassesFiles = scandir($classDir);
foreach($arrClassesFiles as $file)
{
	if(strstr($file, ".class.php"))
	{
		sjinclude($classDir . $file);
		include($classDir . $file);
	}
}

$html = new html;
//读取默认参数
$initDir = "includes/init/";
$arrInitFiles = scandir($initDir);
foreach($arrInitFiles as $file)
{
	if(strstr($file, ".init.php"))
	{
		sjinclude($initDir . $file);
		include($initDir . $file);
	}
}

//读取制定页面参数
$loadDir = $initDir . MAIN_PAGE . "/";
if(!is_dir($loadDir)){
	show404notfound();
}

$arrLoadFiles = scandir($loadDir);
foreach($arrLoadFiles as $file)
{
	if(strstr($file, ".php"))
	{
		$loadDir . $file;
		sjinclude($loadDir . $file);
		include($loadDir . $file);
	}
}
?>