<?php 
session_start();
if(!session_is_registered("username")){
		echo "<meta http-equiv='Refresh' content='0;url=login.php'>";
}else{	
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
 $user=$_POST['user'];
 $pass=$_POST['pass'];
 $contacts=$_POST['contact'];
 $tel=$_POST['tel']; 
 $email=$_POST['email'];
 $ids=$_POST['id'];

$ok=@mysql_query("update vip_user set User='$user', Password='$pass', titles='$contacts', c_tel='$tel', c_mail='$email' where ids='$ids'"); 
		
if($ok){
echo "<script>alert('Info has been updated£¡');window.location='vip.php';</script>";
}else{
echo "<script>alert('Info has been failured£¡');window.location='vip.php';</script>";
}
}
?>
