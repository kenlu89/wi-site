<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);

@mysql_query("delete from event  where ids=".$_GET['id']);
header("Location: event.php");

?>