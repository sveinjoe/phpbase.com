<?php

/**
 * 尝试显示大图amazon的
 */
function tryAmazonBigImg($src)
{
	$partten = "|(\._AC_.*)\.|i";
	$src = preg_replace($partten, "._UL800_.", $src);
	return $src;
}

/**
 * 根据url获取新的固定的文件名
 * 当图片还未下载的时候执行下载操作关打水印
 */
function newImageName($fromurl, $mkdir = true)
{
	$arrUrl = parse_url($fromurl);
	$fromurl = str_replace(" ", "%20", $fromurl);
	$md5 = md5(MainDomain() . $fromurl);
	$md5b = md5(MainDomain());
	$md5b = substr($md5b, 0, 16);
	$arrPath = pathinfo($arrUrl["path"]);
	$extension = empty($arrPath["extension"]) ? "jpg" : $arrPath["extension"];
	$dirName = "images/" . $md5b . "/" . $md5[8] . "/" . $md5[9] . "/" . $md5[10] . "/" . $md5[11] . "/";
	if(!is_dir($dirName))
	{
		if($mkdir){
			mkdir($dirName, 0777, true);
		}
	}
	$newFileName = $dirName . urldecode($arrPath["filename"]) . ".jpg";
	$newFileName = str_replace(" ", "-", $newFileName);
	return $newFileName; //伪静态之后有一些图片不加/ 会显示不出来
}

/**
 * 根据url获取新的固定的文件名
 * 当图片还未下载的时候执行下载操作关打水印
 */
function newImageNameDownload($fromurl)
{
	$newFileName = newImageName($fromurl);
	if(!file_exists($newFileName)) //图片不存在 ，则开始下载图片并打水印
	{
		include 'includes/Gregwar/Image/autoload.php';
		$GregwarImage = new Gregwar\Image\Image;
		copy($fromurl, $newFileName);
		if(file_exists($newFileName))
		{
			$GregwarImage::open($newFileName)
						->write('./includes/Gregwar/Image/Fonts/CaviarDreams.ttf', MainDomain(), 250, 50, 20, 0, 'red', 'center')
						->save($newFileName);
		}
		unset($GregwarImage);
	}
	return $newFileName; //伪静态之后有一些图片不加/ 会显示不出来
}

?>