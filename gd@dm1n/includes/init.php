<?php
header("Content-type: text/html; charset=utf-8");
session_start();
date_default_timezone_set("PRC");
error_reporting(0);
if(empty($_SESSION["ADMIN_FLAG"])
|| $_SESSION["ADMIN_FLAG"] !== "admin"
|| $_SESSION["ADMIN_IP"] !== getIp() ){
	unset($_SESSION["ADMIN_FLAG"]);
	unset($_SESSION["ADMIN_IP"]);
	header("Location: login.php");
	die("Permission denied");
}
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
include 'templates/html_header.php';
include 'includes/functions.php';
define("CATEGORIES_DIR", "../cache/" . MainDomain() . "/");
?>