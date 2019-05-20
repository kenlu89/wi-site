<?php
$product_detail=@mysql_query("select * from products_description, products where  products_description.products_id=products.products_id and products.products._id='".$_GET['pid']."'order by products.products_id desc");

$detail=mysql_fetch_array($product_detail);

echo "<?xml version='1.0' encoding='utf-8'?>";
echo "<SHOW_PRODUCTS>";
echo "<names>".$detail['products_id']."</names>";

echo "</SHOW_PRODUCTS>";

?>