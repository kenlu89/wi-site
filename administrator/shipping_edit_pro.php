<?php 
session_start();
if(!session_is_registered("username")){
		header('location: login.php');
}

include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
$company=$_POST['company'];
$address=$_POST['address'];
$address1=$_POST['address1'];
$city=$_POST['city'];
$state=$_POST['states'];
$zip=$_POST['zip'];
$subzip=$_POST['subzip'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$phone=$_POST['phone'];
$ext=$_POST['ext'];
$ids=$_POST['id'];

@mysql_query("update shipping set company='$company', address='$address', address1='$address1', city='$city', state='$state', zip='$zip', subzip='$subzip', fname='$fname', lname='$lname', phone='$phone', ext='$ext' where ids='$ids'");

echo "<script>window.location='shipping.php';</script>";

		
		?>