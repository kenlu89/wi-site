<?php 
include("includes/config.php");
$ids=$_GET['id']; 

@mysql_query("delete from customers where customers_id='$ids'");
@mysql_query("delete from address_book where customers_id='$ids'");
		
header("Location: Customers.php");
?>