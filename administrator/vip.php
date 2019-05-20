<?php 
include("config.php");
session_start();
if(!session_is_registered("username")){
		echo "<meta http-equiv='Refresh' content='0;url=login.php'>";
}else{	
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
$r=@mysql_query("select * from vip_user");



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link  rel="stylesheet" href="../stylesheet.css" type="text/css" />
<title><?php echo TITLES; ?></title>
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
  <tr>
    <td height="88" colspan="7" valign="middle" class="table_nav"><a href="index.php"><img src="../oscommerce.gif" width="400" height="50" border="0" /></a></td>
  </tr>
  
  
  
  <tr>
    <td height="24" colspan="2" align="center" valign="middle" class="style2"><strong><a href="create.php">New Account </a></strong></td>
    <td colspan="2" align="center" valign="middle" class="style2"><strong><a href="New_pic.php" target="_blank">New Ablum for customer</a> </strong></td>
    <td width="93">&nbsp;</td>
    <td width="218"></td>
    <td width="121"></td>
  </tr>
  
  <tr>
    <td height="16" colspan="7" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  
  
  <tr>
    <td width="31" height="24" align="center" valign="middle" bgcolor="#CCCCCC"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="2" align="center" valign="middle" bgcolor="#CCCCCC" class="style2"><strong>Company</strong></td>
  <td colspan="2" align="center" valign="middle" bgcolor="#CCCCCC" class="style2"><strong>Last Name </strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC" class="style2"><strong>Email Address </strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC" class="style2"><strong>Remove</strong></td>
  </tr>
  <tr>
    <td height="30" colspan="7" valign="top">
	<?php while($row=mysql_fetch_array($r)){?>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="31" height="30" align="center" valign="middle">
		
		<a href="show_vip.php?id=<?php echo $row['ids']; ?>" class="left_nav" >
		<img src="folder.gif" width="16" height="16" /></a></td>
    <td width="244" align="center" valign="middle" class="style4"><?php echo $row['names'];  ?></td>
    <td width="184" align="center" valign="middle" class="style4"><?php echo $row['titles']; ?></td>
    <td width="218" align="center" valign="middle" class="style4"><?php echo $row['c_mail']; ?></td>
    <td width="121" align="center" valign="middle" class="style4">
	<a href="remove.php?id=<?php echo $row['ids']; ?>" target="_self">Remove</a></td>
  </tr>
    </table><?php }?>
    </td>
  </tr>
  <tr>
    <td height="199">&nbsp;</td>
    <td width="137">&nbsp;</td>
    <td width="107">&nbsp;</td>
    <td width="91">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php }?>