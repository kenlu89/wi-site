<?php 
session_start();
if(!session_is_registered("username")){
		echo "<meta http-equiv='Refresh' content='0;url=login.php'>";
}else{	

	include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
$tmp=$_GET['id']; 
@mysql_query("delete from temp where customers_id='$tmp'");
echo "<script>alert('Customer info has been deleted£¡');window.location='application.php';</script>";
}
?>
