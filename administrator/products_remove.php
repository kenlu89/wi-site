<?php 
include("includes/config.php");
$id=$_GET['id'];
$parent=$_GET['parent']; 
$times=date("Y-m-d H:i:s");  
if($id!=""){
@mysql_query("delete from products where products_id='$id'");
@mysql_query("delete from products_description where products_id='$id'");
@mysql_query("delete from products_to_categories where products_id='$id'");

header("Location: categories.php?id=$parent");
}else{
header("Location: login.php");
}
?>