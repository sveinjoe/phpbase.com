<?php
require 'includes/init.php';
?>
		<div class="container">
<?php

if(!empty($_POST["domains"]))
{
	$arrDomains = explode("\n", $_POST["domains"]);
	if(sizeof($arrDomains) > 0){
		echo '<ul class="list-group">';
		foreach($arrDomains as $domain){
			echo '<li class="list-group-item"><a target="_blank" href="deletesite.php?domain=' . trim($domain) . '">删除' . trim($domain) . '</a></li>';
		}
		echo '</ul>';
	}
}
?>
			<div class="col-md-12">
				<form action="" method="POST" class="form-horizontal">
					<fieldset>
						<div id="legend" class="">
							<legend class="">批量删除域名</legend>
						</div>
						<div class="control-group">
							<!-- Text input-->
							<label class="control-label" for="input01">请输入要删除的域名列表</label>
							<div class="controls">
								<textarea name="domains" cols="80" rows="10"></textarea>
								<p class="help-block">请输入要删除的域名列表</p>
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