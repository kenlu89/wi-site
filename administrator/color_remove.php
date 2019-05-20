<?php 
include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
		header('location: login.php');
}


$parent=$_GET['parent_id'];
$ids=$_GET['id'];

$done=@mysql_query("delete	from color where ids='$ids'");

echo "<meta http-equiv='Refresh' content='0;url=Color.php?id=$parent'>";		
		
		?>