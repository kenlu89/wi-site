<?php
	include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);

$gender=$_POST['gender'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$dob=$_POST['dob'];
$company=$_POST['company'];
$street=$_POST['street'];
$city=$_POST['city'];
$states=$_POST['states'];
$zip=$_POST['zip'];
$country=$_POST['country'];
$phone=$_POST['phone'];
$fax=$_POST['fax'];
$tax=$_POST['tax'];
$jbt=$_POST['jbt'];


$result=@mysql_query("insert into customers(customers_gender, customers_firstname, customers_lastname, customers_dob, customers_email_address, customers_telephone, customers_fax , tax,  jbt) values('$gender', '$fname', '$lname', '$dob', '$email', '$phone', '$fax', '$tax', '$jbt')");
$chk=@mysql_query("select * from customers order by customers_id desc");
$r_chk=mysql_fetch_array($chk);
$new_id=$r_chk['customers_id'];

$r==@mysql_query("insert into address_book (customers_id, entry_company, entry_firstname, entry_lastname,  entry_street_address, entry_city, entry_state, entry_postcode) values('$new_id', '$company', '$fname', '$lname', '$street', '$city', '$states', '$zip')");

if($result){
echo "<script>alert('Customer account has been created£¡');window.location='index.php';</script>";
  
}



?>
