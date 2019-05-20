<?php 
session_start();
if(!session_is_registered("username")){
		header('location: login.php');
}

include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
$ids=$_GET['id'];

$done=@mysql_query("delete	from interviews where ids='$ids'");

echo "<meta http-equiv='Refresh' content='0;url=interview.php'>";		
		
		?>