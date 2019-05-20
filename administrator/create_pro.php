<?php
$accc=$_POST['acc'];
$pass=$_POST['pass'];
$stat=$_POST['stat'];
$c_name=$_POST['c_name'];
$tel=$_POST['tel'];
$titles=$_POST['titles'];
$mail=$_POST['mail'];
include("db.php");	
	
global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
		
		
$r=@mysql_query("select count(*) as num from vip_user where User='$accc'");
$row=mysql_fetch_array($r);
if($row['num']>=1) {
echo "<script>alert('The Account has already existed£¡');window.location='create.php';</script>";
}else{
		// Check if this item already exists in the users cart table
		@mysql_query("insert into vip_user(User, Password , names, titles, c_tel, c_mail  ) values('$acc', '$pass',  '$c_name', '$titles', '$tel', '$mail' )");
	    echo "<meta http-equiv='Refresh' content='0;url=index.php'>";
}		
?>