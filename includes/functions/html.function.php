<?php
 /** 
	* html相关的函数
	* 
	* 提取html标签，获取域名等和html相关的函数
	* @author				svein joe <sveinjoe@gmail.com>
	* @version			1.0 
	* @time					2018/9/13 21:43:37
	*/
	
/**
 * 面包屑
 */
function BreadCrumbLi()
{
	global $html;
	$li = "\n";
	switch($html->page)
	{
		case 'index':
			$li .= '						<li><a href="/"><i class="fa fa-fw fa-home"></i>' . TPL_HEADER_HOME . '</a></li>' . "\n";
			break;
		default:
			$li .= '						<li><a href="/"><i class="fa fa-fw fa-home"></i>' . TPL_HEADER_HOME . '</a></li>' . "\n";
			$li .= '						<li class="active">' . $html->page . '</li>' . "\n";
			break;
	}
	
	return $li;
}

?>