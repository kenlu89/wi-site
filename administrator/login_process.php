<?php 
if($_POST['chk']==1){
include("includes/db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
$username="";
$pass="";
$num="";

$username=$_POST['username'];
$pass=$_POST['pass'];
$num=$_POST['num'];


session_start(); 
if($username=="" || $pass==""){
header("Location: login.php?msg=53");
}else{
//$result_db=@mysql_query("select * from admin where User='$username'");
$result_db=mysql_query("select * from admin where user='$username'");
//echo mysql_num_rows($result_db);
if(mysql_num_rows($result_db)<=0){
header("Location: login.php?msg=54");
}else{
include("includes/password.php");
$row_db_pass=@mysql_fetch_array($result_db);
$db_pass=$row_db_pass['password'];

$admin_id=$row_db_pass['ids'];
$chk_login=validate_pass($username, $pass, $db_pass);
if($chk_login==true){
//$message = stripslashes($_POST['message']);
/*
$headers="SkyBlue Backend Logs";
$subject="Back End Login";
$ip=$_SERVER['REMOTE_ADDR'];
$message.=$ip;
$message.=$username;
$formatted_number ="9179168802@tmomail.net";
mail($formatted_number, $subject, $message, 'From: '.$headers);
*/
include("includes/session_register.php");
header("Location: index.php?content=home");
}else{
header("Location: login.php?msg=55");
}

}}
}else{
header("Location: login.php?msg=56");
}

?>