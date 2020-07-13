<?php
require 'includes/init.php';
if(!empty($_POST["domain"]))
{
	$newDomain = getRootDomain($_POST["domain"]);
	$newDir = "../cache/" . $newDomain . "/";
	$oldDir = CATEGORIES_DIR;
	if(!is_dir($oldDir))
	{
		die("原域名不存在，请先上传原域名数据！");
	}
	if(is_dir($newDir))
	{
		die($newDomain . "已存在，转移失败!");
	}
	rename($oldDir, $newDir);
	echo "转移成功！";
	echo '<meta http-equiv="refresh" content="3; url=http://www.' . $newDomain . '">';
	die();
}
?>
		<div class="container">
			<div class="col-md-12">
			  <form action="" method="POST" class="form-horizontal" onsubmit="return checkform();">
			    <fieldset>
			      <div id="legend" class="">
			        <legend class="">表单名</legend>
			      </div>
			    <div class="control-group">
			
			          <!-- Text input-->
			          <label class="control-label" for="input01">新域名</label>
			          <div class="controls">
			            <input type="text" name="domain" placeholder="请输入新的域名" class="input-xlarge" required>
			            <p class="help-block">请输入新的域名</p>
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