<?php 
$filename = basename($_SERVER['SCRIPT_NAME']);if (strtolower($filename) == "index.php") {
if (!empty($_GET[id])) {
$id = $_GET['id'];
$content =$_GET['content'];
$cate=$_GET['cate'];
$pid=$_GET['pid'];
$sort=$_GET['sort'];
}
else {
$nav = $_SERVER['REQUEST_URI'];
$script = $_SERVER["SCRIPT_NAME"];
$nav = ereg_replace("^$script", "", urldecode($nav));
$vars = explode("/", $nav);
$content =$vars[1];
$id = $vars[2];
$cate = $vars[3];
$pid=$vars[4];
$sort=$vars[5];
$sort1=$vars[6];
$sort2=$vars[7];
}
}
//$domain="http://valuevials.com/";
//$domain="http://goodbuyer168.com/";
//$domain="http://".$_SERVER['HTTP_HOST']."/";

$domain="http://ewsi.co/";

$action=$content;
$get_language=$content;
$language=$id;
?>