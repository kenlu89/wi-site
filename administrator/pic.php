<?php 
include("db.php");	
include("config.php");	
global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
$ids=$_POST['titles'];
$names=$_POST['user']; 

@mysql_query("insert into  vip_ablum(customers_id, names) values('$names', '$ids')");

$r=@mysql_query("select * from vip_user where ids='$names'");
$row=mysql_fetch_array($r);

$v=@mysql_query("select * from vip_ablum where customers_id='$names' and names='$ids'");
$v_row=mysql_fetch_array($v);
$id=$v_row['ids'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo TITLES; ?></title>
<style type="text/css">
<!--
.style2 {font-size: 12px}
-->
</style>
<link  rel="stylesheet" href="../stylesheet.css" type="text/css" />
</head>

<body>
<table width="800" border="0" cellpadding="0" cellspacing="0" align="center" class="images">
  <!--DWLayoutTable-->
  <tr>
    <td width="798" height="88" valign="middle" class="table_nav"><a href="index.php"><img src="../oscommerce.gif" width="400" height="50" border="0" /></a></td>
  </tr>
  <tr>
    <td height="24" valign="middle" class="style2"><span class="style2">
	Please upload pictures for <?php echo $row['names']; ?></span> </td>
  </tr>
  <tr>
    <td height="17">&nbsp;</td>
  </tr>
  
  
  <tr>
    <td height="325" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable--><form  name="form2" action="upload.php" method="post" enctype="multipart/form-data">
	  <input type="hidden" name="id" value="<?php echo $id; ?>" />
      <tr>
        <td width="291" height="30" align="center" valign="middle"><input type="file" name="file" class="style2" /></td>
        <td width="333" align="center" valign="middle"><input  type="file" name="file6" class="style2" /></td>
        <td width="176">&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="center" valign="middle"><input type="file" name="file1" class="style2" /></td>
        <td align="center" valign="middle"><input  type="file" name="file7" class="style2" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="center" valign="middle"><input  type="file" name="file2" class="style2" /></td>
        <td align="center" valign="middle"><input  type="file" name="file8" class="style2" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="center" valign="middle"><input type="file" name="file3" class="style2" /> </td>
        <td align="center" valign="middle"><input  type="file" name="file9" class="style2" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="center" valign="middle"><input type="file" name="file4" class="style2" /></td>
        <td align="center" valign="middle"><input  type="file" name="file10" class="style2" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="center" valign="middle"><input type="file" name="file5" class="style2" /></td>
        <td align="center" valign="middle"><input  type="file" name="file12" class="style2" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="29">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="26" colspan="3" valign="top"><input type="submit"  value="Upload" /></td>
      </tr>
      <tr>
        <td height="90">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      
      
      </form>
      
      
    </table>    </td>
  </tr>
</table>
</body>
</html>
