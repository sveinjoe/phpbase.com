<?php
require 'includes/init.php';
require_once 'includes/image.function.php';
if(!empty($_GET["domain"]))
{
	$delDomain = getRootDomain($_GET["domain"]);
	$delDir = "../cache/" . $delDomain . "/";
	if(is_dir($delDir)){
		$filename = getFirstFile($delDir);
		if($filename == false){
			$arrFiles = scandir($delDir);
			if(sizeof($arrFiles) == 2){ //只剩两个.和..就是空文件夹
				rmdir($delDir);
				echo $delDomain . "全部数据删除成功！";
			}else{
				echo $delDomain . "删除不成功，请检查！";
			}
		}else{
			$content = file_get_contents($filename);
			$arrContent = explode("\n", $content);
			$deleted = false; //是否执行过删除操作
			foreach($arrContent as $line){
				$arrLine = explode("\t", $line);
				if(!empty($arrLine[4]) && substr($arrLine[4], 0, 4) == "http"){
					$fromurl = $arrLine[4];
					$cachefile =  "../" . newImageName(tryAmazonBigImg($fromurl), false);
					if(file_exists($cachefile)){
						$deleted = true; //标记为已删除过
						unlink($cachefile);
						echo '删除缓存文件:' . ($cachefile) . "<br>\n";
					}
				}
			}
			if(!$deleted){ //如果没有执行过删除操作，那么直接删除这个文件，因为已经没有缓存了
				unlink($filename);
				echo '删除数据文件:' . substr($filename, 9) . "<br>\n";
			}
			echo '<meta http-equiv="refresh" content="0">';
		}
	}else{
		echo ("该域名不存在！ -- " . $delDomain);
	}
}

function getFirstFile($dir){
	$arrFiles = scandir($dir);
	foreach($arrFiles as $file){
		if($file == "." || $file == ".."){
			continue;
		}
		$filename = $dir . $file;
		if(!is_dir($filename)){
			return $filename;
		}else {
			//如果子目录为空，就删除
			$arrSubFiles = scandir(($filename));
			if(empty($arrSubFiles)){ //文件夹存在但是没有读取到文件
				$newfilename = $dir . "del" . date('YmdHis');
				rename($filename, $newfilename);
				$filename = $newfilename;
				$arrSubFiles = scandir(($filename));
			}
			if(sizeof($arrSubFiles) == 2){
				//只有两个那么就是.和..，代表空文件夹
				rmdir($filename);
				echo '删除文件夹:' . substr($filename, 9) . "<br>\n";
				continue;
			}
			//如果是文件夹，就遍历
		 	return getFirstFile($filename . "/");
		}
	}
	return false;
}
?>
		<div class="container">
			<div class="col-md-12">
				<form action="" method="GET" class="form-horizontal" onsubmit="return checkform();">
					<fieldset>
						<div id="legend" class="">
							<legend class="">表单名</legend>
						</div>
						<div class="control-group">
							<!-- Text input-->
							<label class="control-label" for="input01">请输入要删除的域名</label>
							<div class="controls">
								<input type="text" name="domain" placeholder="请输入要删除的域名" class="input-xlarge" required>
								<p class="help-block">请输入要删除的域名</p>
							</div>
						</div>
						<div class="control-group">
							<!-- Button -->
							<div class="controls">
								<button class="btn btn-success">提交</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>

<script>
function checkform()
{
	if((confirm('确定要删除这个网站的全部数据吗？'))) return true;
	return false;
}
</script>