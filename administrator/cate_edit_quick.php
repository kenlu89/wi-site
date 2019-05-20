<?php 
	include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
		header('location: login.php');
}


$result=@mysql_query("select * from categories, categories_description where categories.categories_id=categories_description.categories_id");

?>
<script type="text/javascript">
function p_id(){
var ids=document.getElementById("prodcuts_id").value
document.location.href='Front.php?id='+ids;

}
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link  rel="stylesheet" href="stylesheet.css" type="text/css" />
<title><?php echo TITLES; ?></title>
</head>

<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  
 <form name="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>"  enctype="multipart/form-data" method="post">
 <input  type="hidden" name="chk" value="1" />
  <tr>
    <td height="88" colspan="4" valign="middle" class="table_nav"><a href="index.php"><img src="images/Top.png" width="500" height="80" border="0" /></a></td>
  </tr>
  
  
  <tr>
    <td width="68" height="17">&nbsp;</td>
    <td width="127">&nbsp;</td>
    <td width="553">&nbsp;</td>
    <td width="50">&nbsp;</td>
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td valign="middle" class="Heading">Item Model: </td>
    <td valign="middle" class="text">Add/Edit products to categories</td>
    <td>&nbsp;</td>
  </tr>
  
  
  <tr>
    <td height="30">&nbsp;</td>
    <td colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable--><?php while($rows=mysql_fetch_array($result)){
	  
	  ?>
      <tr>
        <td width="30" height="30" valign="middle"><img src="images/folder.gif" width="16" height="16" /></td>
        <td width="451" valign="middle" class="text"><?php echo $rows['categories_name']; ?></td>
        <td width="93" valign="middle">Edit Categories</td>
        <td width="106" valign="middle">Edit Products</td>
      </tr><?php }?>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="221">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
</body>
</html>
