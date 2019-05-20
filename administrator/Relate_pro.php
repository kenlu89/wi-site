<?php 
	include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
    $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
	
	 $it=$_POST['it'];
	 $it_1=$_POST['it_1'];
	 $it_2=$_POST['it_2'];
	 $it_3=$_POST['it_3'];

if($it!=""){
$r1=@mysql_query("select * from products where products_model='$it'");
}
if($it_1!=""){
$r2=@mysql_query("select * from products where products_model='$it_1'");
}
if($it_2!=""){
$r3=@mysql_query("select * from products where products_model='$it_2'");
}
if($it_3!=""){
$r4=@mysql_query("select * from products where products_model='$it_3'");
}
$row1=mysql_fetch_array($r1);
$row2=mysql_fetch_array($r2);
$row3=mysql_fetch_array($r3);
$row4=mysql_fetch_array($r4);


 $item_1=$row1['products_id'];

 $item_2=$row2['products_id'];

 $item_3=$row3['products_id'];

 $item_4=$row4['products_id'];

$result=@mysql_query("update products set m_pro1='$item_2', m_pro2='$item_3', m_pro3='$item_4' where products_id='$item_1'");

if($result){
echo "<script>alert('Info has been updated£¡');window.location='Relate.php';</script>";
}	
		
?>