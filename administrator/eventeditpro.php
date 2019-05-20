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
$year=$_POST['year'];
@mysql_query("update event set year='$year', txt='$txt' where ids='$ids'");

header("Location: event.php");

?>