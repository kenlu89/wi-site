<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
header("Location: login.php ");
}
$ids=$_POST['id']; 
$txt=$_POST['txt'];
$title=$_POST['title'];
$year=$_POST['year'];
$month=$_POST['month'];
@mysql_query("update news set title='$title', year='$year', month='$month', txt='$txt' where ids='$ids'");

header("Location: news.php");

?>