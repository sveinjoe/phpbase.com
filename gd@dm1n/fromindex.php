<?php
require 'includes/init.php';
$dirname = "../cache/" . MainDomain() . "/";
if(!is_dir($dirname)){
    mkdir($dirname, 0777, true);
}
$fromindexset = $dirname . "fromindex.set";
if(!empty($_POST["fromindex"]))
{
	if(!preg_match("|^https?://.*/$|", $_POST["fromindex"])){
		echo "格式错误！";
	}else{
		file_put_contents($fromindexset, $_POST["fromindex"]);
		echo "设置成功成功！";
	}
	echo '<meta http-equiv="refresh" content="3">';
	die();
}
$fromindex = "";
if(file_exists($fromindexset)){
	$fromindex = file_get_contents($fromindexset);
}
?>
		<div class="container">
			<div class="col-md-12">
			  <form action="" method="POST" class="form-horizontal" onsubmit="return checkform();">
			    <fieldset>
			      <div id="legend" class="">
			        <legend class="">设置镜像</legend>
			      </div>
			    <div class="control-group">
			
			          <!-- Text input-->
			          <label class="control-label" for="input01">镜像网站设置</label>
			          <div class="controls">
			            <input type="text" name="fromindex" placeholder="https://www.domain.com/" value="<?php echo $fromindex; ?>" class="input-xlarge" size="60" required>
			            <p class="help-block">请输入新的镜像网站首页(注意格式)</p>
			          </div>
			        </div>
			
			    <div class="control-group">
			          <label class="control-label">提交</label>
			
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
	if((confirm('确定要提交吗？'))) return true;
	return false;
}
</script>