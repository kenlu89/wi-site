<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
header("Location: login.php ");
}
$ids=$_GET['id'];
@mysql_query("delete from newsletter where ids='$ids'");
header("Location: newsletter.php ");

?>