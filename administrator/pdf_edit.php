<?php 
	include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
		header('location: login.php');
}
 $ids=$_GET['id']; 
?>
<script type="text/javascript">
function p_id(){
var ids=document.getElementById("prodcuts_id").value
document.location.href='pdf.php?id='+ids;

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
  
 <form name="form1" action="pdf_pro.php"  enctype="multipart/form-data" method="post">
 <input  type="hidden" name="current" value="<?php echo $ids; ?>" />
  <tr>
    <td height="88" colspan="4" valign="middle" class="table_nav"><a href="index.php"><img src="images/Top.png" width="500" height="80" border="0" /></a></td>
  </tr>
  
  
  <tr>
    <td width="97" height="48">&nbsp;</td>
    <td width="127">&nbsp;</td>
    <td width="192">&nbsp;</td>
    <td width="382">&nbsp;</td>
    </tr>
  
  
  <tr>
    <td height="30"></td>
    <td valign="middle" class="Heading">Title:</td>
    <td valign="middle"><input type="text" name="title" class="text" size="30" /></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="32"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  
  <tr>
    <td height="30"></td>
    <td valign="middle" class="Heading">Limit PDF : </td>
    <td valign="middle" class="text"><input type="checkbox" name="stats" class="text" value="1" /></td>
    <td valign="middle" class="text">Only show up, if customers login their account. </td>
  </tr>
  <tr>
    <td height="4"></td>
    <td></td>
    <td></td>
    <td></td>
    </tr>
  
  
  <tr>
    <td height="40"></td>
    <td colspan="3" valign="bottom"><input type="submit" name="submit" value="Submit" /></td>
    </tr>
  <tr>
    <td height="120"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  </form>
</table>
</body>
</html>
