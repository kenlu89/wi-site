<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
$ids=$_GET['id']; 

@mysql_query("delete from vip_user where ids='$ids'");
		echo "<meta http-equiv='Refresh' content='0;url=vip.php'>";		
		
?>