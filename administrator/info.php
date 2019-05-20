<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
		header('location: login.php');
}

 $flavor=$_POST['flavor'];
 $flavor1=$_POST['flavor1'];
 $pid=$_POST['products_id']; 
 $current=$_POST['current']; 
 $ids=$_GET['id']; 
if($flavor!="" || $flavor1!="" ){

@mysql_query("insert into options (parent_id, options, language_id) values('$pid', '$flavor', 1)"); 

@mysql_query("insert into options (parent_id, options, language_id) values('$pid', '$flavor1', 3)"); 
echo "<script>alert('Products Info has been updated£¡');window.location='Relate.php?id=$current';</script>";	
}

?>
<script type="text/javascript">
function p_id(){
var ids=document.getElementById("prodcuts_id").value
document.location.href='Relate.php?id='+ids;

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
  
 <form name="form1" action="Relate.php"  enctype="multipart/form-data" method="post">
 <input  type="hidden" name="current" value="<?php echo $ids; ?>" />
  <tr>
    <td height="88" colspan="5" valign="middle" class="table_nav"><a href="index.php"><img src="images/Top.png" width="500" height="80" border="0" /></a></td>
  </tr>
  
  
  <tr>
    <td width="100" height="64">&nbsp;</td>
    <td width="127">&nbsp;</td>
    <td width="189">&nbsp;</td>
    <td width="259">&nbsp;</td>
    <td width="123">&nbsp;</td>
  </tr>
  
  
  <tr>
    <td height="30"></td>
    <td valign="middle" class="Heading">Flavor:</td>
    <td valign="middle"><input name="flavor" type="text" class="text" /></td>
    <td valign="middle"><input name="flavor1" type="text" class="text" /></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td height="20"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="40"></td>
    <td colspan="4" valign="bottom"><input type="submit" name="submit" value="Submit" /></td>
    </tr>
  <tr>
    <td height="145">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
</body>
</html>
