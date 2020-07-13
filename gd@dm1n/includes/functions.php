<?php
/**
 * function 函数集合
 */
 
/**
 * 把域名里的www.前缀去掉
 */
function MainDomain()
{
	$maindomain = getRootDomain(getenv("HTTP_HOST"));
	return $maindomain;
}

function getMainDomain()
{
	$maindomain = getRootDomain(getenv("HTTP_HOST"));
	return $maindomain;
}

/**
 * 取得根域名
 * @param type $domain 域名
 * @return string 返回根域名
 */
function getRootDomain($domain) {
    $re_domain = '';
    if(empty($domain))
    {
    	return "";
    }
    $domain_postfix_cn_array = array("com", "net", "org", "gov", "edu", "com.cn", "cn");
    $array_domain = explode(".", $domain);
    $array_num = count($array_domain) - 1;
    if ($array_domain[$array_num] == 'cn') {
        if (in_array($array_domain[$array_num - 1], $domain_postfix_cn_array)) {
            $re_domain = $array_domain[$array_num - 2] . "." . $array_domain[$array_num - 1] . "." . $array_domain[$array_num];
        } else {
            $re_domain = $array_domain[$array_num - 1] . "." . $array_domain[$array_num];
        }
    } else {
        $re_domain = $array_domain[$array_num - 1] . "." . $array_domain[$array_num];
    }
    return $re_domain;
}

/**
 * 安全地写入文件
 * $dir必须以/结尾,否则会出问题
 */
function sj_file_put_contents($filename, $content, $dir, $fileappend = false)
{
  //检查文件名是否在指定目录
  if(strstr($filename, $dir) == false)
  {
    return false;
  }
  else
  {
    $shortfilename = str_replace($dir, "", $filename);
    if(validfilename($shortfilename) == false)
    {
      return false;
    }
  }
  if($fileappend)
  {
  	file_put_contents($filename, $content, FILE_APPEND);
  }
  else
  {
  	file_put_contents($filename, $content);
  }
  return true;
}

/**
 * 验证文件名是否非法
 */
function validfilename($filename)
{
  $arrDeniedStr = array(
  	"..",
  	"\\",
  	"/",
  	":",
  	"*",
  	"?",
  	"\"",
  	"|",
  	".php",
  );
  foreach($arrDeniedStr as $str)
  {
  	if(stristr($filename, $str))
  	{
  		return false;
  	}
  }
  return true;
}
?>