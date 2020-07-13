<?php
session_start();
function getIp()
    {
        if (isset ( $_SERVER )){
            if (isset ( $_SERVER ["HTTP_X_FORWARDED_FOR"] )){
                $ip = $_SERVER ["HTTP_X_FORWARDED_FOR"];
            }else if (isset ( $_SERVER ["HTTP_CLIENT_IP"] )){
                $ip = $_SERVER ["HTTP_CLIENT_IP"];
            }else{
                $ip = $_SERVER ["REMOTE_ADDR"];
            }
        }else{
            if (getenv ( "HTTP_X_FORWARDED_FOR" )){
                $ip = getenv ( "HTTP_X_FORWARDED_FOR" );
            }else if (getenv ( "HTTP_CLIENT_IP" )){
                $ip = getenv ( "HTTP_CLIENT_IP" );
            }else{
                $ip = getenv ( "REMOTE_ADDR" );
            }
        }
        $ip = explode ( ",", $ip );
        return $ip[0];
    }
if(!empty($_GET["action"]) == "logout")
{
	unset($_SESSION["ADMIN_FLAG"]);
}
if(!empty($_POST["username"]) && !empty($_POST["password"])){
	if(md5(md5(md5($_POST["username"]))) == "304af3bfbfda3f8326a6b669b7452eaf" && md5(md5(md5($_POST["password"]))) == "1df3fdcb2a4f365212d483ae072399ce"){ //sjadmin|Gd654654.
		$_SESSION["ADMIN_FLAG"] = "admin";
		$_SESSION["ADMIN_IP"] = getIp();
	}
}
$agentKey = " ";
if(empty($_SESSION["ADMIN_FLAG"]) 
|| $_SESSION["ADMIN_FLAG"] !== "admin"
|| $_SESSION["ADMIN_IP"] !== getIp() 
|| strstr(getenv("HTTP_USER_AGENT"), $agentKey) == false){
	//未登录
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Page</title>

    <!-- Bootstrap core CSS -->
    <link href="//cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="//cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">
      <h2 class="form-signin-heading">登录框</h2>
      <form class="form-horizontal" role="form" method="POST">
      	<div class="form-group">
	        <label for="inputEmail">用户名:</label>
	        <input type="text" name="username" id="inputEmail" class="form-control" placeholder="用户名" required autofocus>
      	</div>
      	<div class="form-group">
	        <label for="inputPassword">密码:</label>
	        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="密码" required>
      	</div>
      	<div class="form-group">
	        <button class="btn btn-primary" type="submit">登录</button>
      	</div>
      </form>

    </div> <!-- /container -->
  </body>
</html>
<?php
}else
{
	header("Location: index.php");
}
?>