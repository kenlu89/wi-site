<?php
if($_GET['action']="reload"){
$page = $_SERVER['PHP_SELF'];
 
$sec = "5";
 
header("Refresh: $sec; url=$page");
 
echo "Watch the page reload itself!";
 }
?>