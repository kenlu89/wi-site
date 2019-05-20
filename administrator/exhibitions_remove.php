<?php 
include("includes/config.php");
$id=$_GET['id'];
$good=@mysql_query("delete from exhibitions where ids='$id'");

echo "<script>alert('exhibitions has been delete!');window.location='exhibitions.php';</script>";


?>