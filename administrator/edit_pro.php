<?php 
include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
$gender=$_POST['gender'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$address2=$_POST['address2'];
$company=$_POST['company'];
$street=$_POST['street'];
$city=$_POST['city'];
$states=$_POST['states'];
$zip=$_POST['zip'];
$country=$_POST['country'];
$phone=$_POST['phone'];
$fax=$_POST['fax'];
$tax=$_POST['tax'];
$bjt=$_POST['jbt'];
$email=$_POST['email']; 
$ids=$_POST['id']; 
$ext=$_POST['ext'];
$mid=$_POST['mname'];
$web=$_POST['web'];
$types=$_POST['types'];

@mysql_query("update customers set customers_gender='$gender', customers_firstname='$fname', customers_lastname='$lname', 
customers_email_address='$email', customers_fax='$fax', tax='$tax', customers_telephone='$phone', ext='$ext', customers_midname='$mid', web='$web', types='$types'  where customers_id='$ids'");

@mysql_query("update address_book set entry_company='$company', entry_gender='$gender', entry_firstname='$fname', entry_lastname='$lname', entry_street_address='$street', entry_city='$city', entry_state='$states', entry_postcode='$zip', entry_country_id='$country', address2='$address2' where customers_id='$ids'");

echo "<script>alert('The profile has been updated!');window.location='Customers.php';</script>";

?>


