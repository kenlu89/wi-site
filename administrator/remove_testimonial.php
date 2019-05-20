<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
$ids=$_GET['id']; 

$done=@mysql_query("delete from testimonial where ids='$ids'");
echo "<script>alert('Testimonial removed');window.location='testimonial.php';</script>";
		
?>