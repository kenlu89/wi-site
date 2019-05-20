<?php
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);

$product_detail=@mysql_query("select * from products where products_model='".$_GET['q']."'");
$num=mysql_num_rows($product_detail);

if($num>=1){
$result="<img src='images/warning.gif' height='10' width='10'> Warning: The Product model can't be duplicated. it's existed in database already.";
}else{
$result="";
}

//output the response
echo $result;
?>