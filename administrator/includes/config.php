<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
define('COPYRIGHT', 'Sky Blue Studio');

session_start();
include("chk_sign_in.php");
if(chk_login()==false){
header("Location: login.php");
}

$domain_name="";
$domain_name=$_SERVER['HTTP_HOST'];

$auth="";

/*
if($domain_name=="njchinafirst.com" || $domain_name=="www.njchinafirst.com"){
$auth=1;
}
if($auth!=1){
header("Location: http://skyblue-studio.com/");
}
*/

if($_GET['content']=="" || $_GET['content']=="home"){
$content="home.php";
}else{
$content=$_GET['content'].".php";
}

if(!file_exists($content)){
$content="home.php";
}


if(!session_is_registered("lang") ||  $_GET['lan']!=""){
session_register("lang");
session_register("txt");
if($_GET['lan']=="" || $_GET['lan']=="en"){
$_SESSION['lang']="en";
$_SESSION['txt']="1";
}else{
$_SESSION['lang']="ch";
$_SESSION['txt']="3";

}

}
$lan=$_SESSION['txt'];
$lang=$_SESSION['lang'];
global $lan;
global $lang;

$tax_percent=.0875;
?>
