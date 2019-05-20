<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
header("Location: login.php ");
}
$txt=$_POST['txt'];
$year=$_POST['year'];
@mysql_query("insert into event (year, txt) values('$year','$txt')");
$chk=@mysql_query("select * from news order by ids desc");
$row_chk=mysql_fetch_array($chk);
$num=$row_chk['ids'];
@mysql_query("update event set sort_order='$num' where ids='$num'");
header("Location: event.php");

?>