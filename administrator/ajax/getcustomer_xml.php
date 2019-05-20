<?php
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);

$product_detail=@mysql_query("select * from products_description, products where  products_description.products_id=products.products_id order by products.products_id desc");

$detail=mysql_fetch_array($product_detail);
echo "<?xml version='1.0' encoding='ISO-8859-1'?>";
echo "<company>";
echo "<compname>".$detail['products_id']."</compname>";
echo "<contname>".$detail['products_name']."</contname>";
echo "<address>".$detail['products_model']."</address>";
echo "<city>".$detail['products_price']."</city>";
echo "<country>".$detail['products_date_added']."</country>";
echo "</company>";

?>