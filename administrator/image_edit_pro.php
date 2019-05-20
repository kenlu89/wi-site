<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
header("Location: login.php ");
}
$times=date("Y-m-d H:i:s");  
$desc=$_POST['desc'];
$sorts=$_POST['sorts'];
$cate_id=$_POST['cate_id']; 
$cate=$_POST['cate'];
$parent=$_POST['parent']; 
$location=$_POST['location']; 
$taker=$_POST['taker'];
$date=$_POST['date']; 
$price=$_POST['price'];
@mysql_query("update images set description='$desc', location='$location', date='$date', taker='$taker', price='$price' where ids='$cate_id'");

echo "<script>alert('Picture profile has been updated.');window.location='add_image.php?id=$parent';</script>";


?>