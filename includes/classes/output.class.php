<?php
 /** 
	* 一些和输出有关系的类
	* 
	* 提取html标签，获取域名等和html相关的函数
	* @author				svein joe <sveinjoe@gmail.com>
	* @version			1.0 
	* @time					2018/9/13 21:50:30
	*/
class html {
	public $url, $title, $meta_keywords, $meta_description, $keyword, $robots;
	public $page = "404";
	public $htmls = array();
	/**
	 * 输出函数
	 */
	function __construct()
	{
		$this->SetPage();
		$this->SetUrl();
		$this->robots = "INDEX,FOLLOW";
  }
  
  /**
   * 获取当前页面的url
   */
  private function SetUrl()
  {
  	if(HTTPS_ON)
  	{
  		$this->url = "https://" . getenv("HTTP_HOST") . getenv("REQUEST_URI");
  	}
  	else
  	{
  		$this->url = "http://" . getenv("HTTP_HOST") . getenv("REQUEST_URI");
  	}
  }
  
  /**
   * 获取当前的页面
   */
  private function SetPage()
  {
  	if(!empty($_GET["main_page"]))
  	{
  		$this->page = $_GET["main_page"];
  	}
  	else
  	{
	  	$arr = explode("?", getenv("REQUEST_URI"));
	  	$page = $arr[0];
	  	if($page == "/")
	  	{
	  		$page = "index";
	  	}
	  	else
	  	{
	  		//$page = trim($page, "/");
	  		$page = "index";
	  	}
	  	$this->page = $page;
  	}
  }
}
?>