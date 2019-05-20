<?php 
session_start();
if(!session_is_registered("username")){
		echo "<meta http-equiv='Refresh' content='0;url=login.php'>";
}else{	
include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
        $ids=$_GET['id']; 
		@mysql_query("delete from orders where orders_id='$ids'");

				echo "<meta http-equiv='Refresh' content='0;url=orders.php'>";
}		
?>