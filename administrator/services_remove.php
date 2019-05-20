<?php 
session_start();
if(!session_is_registered("username")){
		header('location: login.php');
}

include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
$id=$_GET['id'];
@mysql_query("delete from services where ids='$id'");
echo "<script>window.location='shipping.php'; </script>";

?>