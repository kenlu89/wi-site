<?php 
include("includes/config.php");
$id=$_GET['id'];
$parent=$_GET['parent'];
if($parent==""){
$parent=$id;
}
if($id!=""){
$cate=@mysql_query("select * from products_to_categories where categories_id=".$_GET['id']);
while($all_cate=mysql_fetch_array($cate)){
@mysql_query("delete from products where products_id=".$all_cate['products_id']);
@mysql_query("delete from products_description where products_id=".$all_cate['products_id']);
}
@mysql_query("delete * from products_to_categories where categories_id='$id'");
$good=@mysql_query("delete from categories where categories_id='$id'");
$good1=@mysql_query("delete from categories_description where categories_id='$id'");
echo "<script>alert('category has been deleted.');window.location='http://localhost/administrator/?content=categories&id=$parent';</script>";
}else{
echo "<script>alert('category can not delete!');window.location='http://localhost/administrator/?content=categories&id=$parent';</script>";
}

?>