<?php 
session_start();
if(!session_is_registered("username")){
		echo "<meta http-equiv='Refresh' content='0;url=login.php'>";
}else{	


	include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
		$r=@mysql_query("select * from address_book, customers where customers.customers_id=address_book.customers_id");
		
		
		
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link href="stylesheet.css" type="text/css"  rel="stylesheet" />
</head>

<body>
<table width="700" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <?php while($row_r=mysql_fetch_array($r)){
  ?>
  <tr>
    <td width="700" height="136" valign="top" class="Heading">
	<?php 
	echo "<address>";
	echo $row_r['entry_company']; echo "<br>"; 
	echo $row_r['entry_street_address']; echo "<br>";
	echo $row_r['entry_city']; echo " , "; echo $row_r['entry_state']; echo " "; echo $row_r['entry_postcode'];
	echo "</address>";
	
	?></td>
  </tr>
  <?php }?>
  <tr>
    <td height="252">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php  }?>