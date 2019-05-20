<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
		echo "<meta http-equiv='Refresh' content='0;url=login.php'>";
}else{	

		$ids=$_GET['id']; 
$r=@mysql_query("select * from vip_user where ids='$ids'");
$row=mysql_fetch_array($r);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link  rel="stylesheet" href="../stylesheet.css" type="text/css" />
<title><?php echo TITLE; ?></title>
<style type="text/css">
<!--
a {
	font-size: 14px;
	color: #336600;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #336600;
}
a:hover {
	text-decoration: none;
	color: #33CC00;
}
a:active {
	text-decoration: none;
	color: #336600;
}
-->
</style></head>

<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  <form name="form1" enctype="multipart/form-data"  method="post" action="show_vip_update.php">
  <input type="hidden" name="id" value="<?php echo $ids; ?>"  />
  <tr>
    <td height="88" colspan="7" valign="middle" class="table_nav"><a href="index.php"><img src="../oscommerce.gif" width="400" height="50" border="0" /></a></td>
  </tr>
  
  
  
  <tr>
    <td height="24" colspan="3" align="center" valign="middle" class="style2"><strong><a href="create.php">New Account </a></strong></td>
    <td width="198" align="center" valign="middle" class="style2"><strong><a href="New_pic.php" target="_blank">New Ablum for customer</a> </strong></td>
    <td width="54">&nbsp;</td>
    <td width="28">&nbsp;</td>
    <td width="350">&nbsp;</td>
  </tr>
  
  <tr>
    <td height="16" colspan="7" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  
  
  <tr>
    <td height="24" colspan="7" align="center" valign="middle" bgcolor="#CCCCCC" class="style2"><strong><?php echo $row['names']; ?>'s Profile</strong></td>
  </tr>
  <tr>
    <td width="105" height="23"></td>
    <td width="11"></td>
    <td width="52">&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="1"></td>
    <td></td>
    <td colspan="3" rowspan="2" valign="middle" class="style2"><input type="text" name="user"  value="<?php echo $row['User']; ?>"  size="45"/></td>
    <td></td>
    <td rowspan="11" valign="top">
	<?php 
	$vip=@mysql_query("select * from vip_ablum where customers_id='$ids' ");

while($r_vip=mysql_fetch_array($vip)){
$tmp=$r_vip['ids']; 	
?>

<a href="gallery.php?id=<?php echo $tmp; ?>" ><?php echo $r_vip['names']; ?></a><br />



<?php 
}

	?>
	
	
	</td>
    </tr>
  
  
  
  <tr>
    <td rowspan="2" align="right" valign="middle" class="style2">Username:</td>
    <td height="23"></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="1"></td>
    <td colspan="3" rowspan="2" valign="middle"><input type="text" name="pass"  value="<?php echo $row['Password']; ?>"  size="45"/></td>
    <td></td>
    </tr>
  
  <tr>
    <td rowspan="2" align="right" valign="middle" class="style2">Password:</td>
    <td height="22"></td>
    <td></td>
    </tr>
  <tr>
    <td height="1"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    </tr>
  
  
  
  <tr>
    <td height="24" align="right" valign="middle" class="style2">Contacts:</td>
    <td>&nbsp;</td>
    <td colspan="3" valign="middle" class="style2"><input type="text" name="contact"  value="<?php echo $row['titles']; ?>"  size="45"/></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="24" align="right" valign="middle" class="style2">Tel:</td>
    <td>&nbsp;</td>
    <td colspan="3" valign="middle" class="style2"><input type="text" name="tel"   value="<?php echo $row['c_tel']; ?>" size="45"/></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="24" align="right" valign="middle" class="style2">Email:</td>
    <td>&nbsp;</td>
    <td colspan="3" valign="middle" class="style2"><input type="text" name="email"  value="<?php echo $row['c_mail']; ?>"   size="45"/></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="23">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="26" align="right" valign="top"><input type="submit"   value="Update"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="37">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr></form>
</table>
</body>
</html>
<?php }?>