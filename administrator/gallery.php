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
$r=@mysql_query("select * from pic where parent_id='$ids' ");

$vip=@mysql_query("select * from vip_ablum where ids='$ids' ");

$vip_r=mysql_fetch_array($vip);
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
    <td width="798" height="88" valign="middle" class="table_nav"><a href="index.php"><img src="../oscommerce.gif" width="400" height="50" border="0" /></a></td>
  </tr>
  
  
  
  <tr>
    <td height="16" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td height="24" align="center" valign="middle" bgcolor="#CCCCCC" class="style2"><strong><?php echo $vip_r['names']; ?></strong></td>
  </tr>
  <tr>
    <td height="18">&nbsp;</td>
    </tr>
  <tr>
    <td height="135" valign="top">
	<?php while($row=mysql_fetch_array($r)){?>
	
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="11" height="135">&nbsp;</td>
        <td width="185" valign="top">
		<a href="../<?php echo $row['image']; ?>" target="_blank">
		<img src="../<?php echo $row['image']; ?> " height="135" width="185" /></a></td>
    <td width="14">&nbsp;</td>
      <td width="185" valign="top">
	  <?php $row=mysql_fetch_array($r);?>
		<a href="../<?php echo $row['image']; ?>" target="_blank">
		<img src="../<?php echo $row['image']; ?> " height="135" width="185" /></a>	  </td>
    <td width="12">&nbsp;</td>
      <td width="185" valign="top">	  <?php $row=mysql_fetch_array($r);?>
		<a href="../<?php echo $row['image']; ?>" target="_blank">
		<img src="../<?php echo $row['image']; ?> " height="135" width="185" /></a></td>
    <td width="11">&nbsp;</td>
      <td width="185" valign="top"> <?php $row=mysql_fetch_array($r);?>
		<a href="../<?php echo $row['image']; ?>" target="_blank">
		<img src="../<?php echo $row['image']; ?> " height="135" width="185" /></a></td>
    <td width="10">&nbsp;</td>
      </tr>
      <tr>
        <td height="13"></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>
	<?php }?>
    </td>
  </tr>
  <tr>
    <td height="100">&nbsp;</td>
  </tr>
  </form>
</table>
</body>
</html>
<?php }?>