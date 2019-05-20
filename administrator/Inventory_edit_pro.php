<?php 
session_start();
if(!session_is_registered("username")){
		echo "<meta http-equiv='Refresh' content='0;url=login.php'>";
}else{	
include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
 $ids=$_POST['ids']; 
 $qty=$_POST['qty'];
 $price=$_POST['price'];
 $chk=$_POST['wholesales'];
 $stats=$_POST['status'];


	
		
@mysql_query("update products set products_quantity='$qty', products_price='$price', wholesales='$chk' , products_status='$stats' where products_id='$ids'");
	echo "<meta http-equiv='Refresh' content='0;url=Inventory.php'>";
	}
	?>