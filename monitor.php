<?php
header("Content-type: text/html; charset=utf-8");
if(!empty($_GET["testserver"]) AND $_GET["testserver"]=="yes")
{
	echo getenv("SERVER_ADDR");
}else if(!empty($_GET["testserver"]) AND $_GET["testserver"]=="detail")
{
	print_r($_SERVER);
}else if(!empty($_GET["testserver"]) AND $_GET["testserver"]=="diskusage")
{
	$total = disk_total_space("/");
	$free = disk_free_space("/");
	echo "总的大小：" . $total . "<br>\n";
	echo "剩余大小：" . $free . "<br>\n";
	echo "使用率：" . 100*(($total - $free) / $total) . "%<br>\n";
}
else
{
	echo getenv("HTTP_HOST");
}
?>