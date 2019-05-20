<?php 
include("config.php");
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
  <!--DWLayoutTable--><form name="form1" action="pic.php" method="post" enctype="multipart/form-data">
  <tr>
    <td height="88" colspan="2" valign="middle" class="table_nav"><a href="index.php"><img src="images/oscommerce.gif" width="500" height="80" border="0" /></a></td>
  </tr>
  
  
  
  <tr>
    <td height="24" colspan="2" valign="top" class="style4"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td width="388" height="24" align="center" valign="middle" bgcolor="#CCCCCC" class="style2">Description For Photo Ablum </td>
    <td width="410" align="center" valign="middle" bgcolor="#CCCCCC" class="style2">Select the user you want to create ablum for </td>
  </tr>
  <tr>
    <td height="113" align="center" valign="middle"><input name="titles" type="text" class="style4" size="35"  /></td>
    <td align="center" valign="middle">

	  <select name="user" class="style4">
	    <?php $r=@mysql_query("select * from vip_user");
	while($r1=mysql_fetch_array($r)){
	?>
	    <option value="<?php echo $r1['ids']; ?>">
  <?php echo $r1['names']; echo " "; echo "::::";  echo " ";echo $r1['titles']; echo " "; echo "::::";  echo " ";echo $r1['c_tel'];?></option>
	    <?php }?>
        </select>	</td>
  </tr>
  
  
  <tr>
    <td height="32" colspan="2" align="center" valign="middle">
	  <input type="submit" name="submit" value="Submit" />	</td>
    </tr>
  <tr>
    <td height="100">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  </form>
</table>
</body>
</html>
