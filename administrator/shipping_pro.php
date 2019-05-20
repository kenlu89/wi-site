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

@mysql_query("insert into shipping (company, address, address1, city, state, zip, subzip, fname, lname, phone, ext) values ('$company', '$adddress', '$address1', '$city', '$state', '$zip', '$subzip', '$fname', '$lname', '$phone', '$ext')");

echo "<script>window.location='shipping.php';</script>";

		
		?>