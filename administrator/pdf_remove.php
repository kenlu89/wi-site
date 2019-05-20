<?php 
session_start();
if(!session_is_registered("username")){
		header('location: login.php');
}

include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
		include("config.php");
$parent=$_GET['parent_id'];
$ids=$_GET['id'];

$done=@mysql_query("delete	from pdf where ids='$ids'");

echo "<meta http-equiv='Refresh' content='0;url=pdf.php?id=$parent'>";		
		
		?>