<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
		header('location: login.php');
}

 $item1=$_POST['ch'];
 $item2=$_POST['eng'];
if($item1!="" || $item2!="" ){

@mysql_query("insert into new (txt, language_id) values('$item1', '3')"); 

@mysql_query("insert into new (txt, language_id) values('$item2', '1')"); 
echo "<script>alert('Products Info has been updated！');window.location='new.php?id=$current';</script>";	
}

?>
<script type="text/javascript">
function p_id(){
var ids=document.getElementById("prodcuts_id").value
document.location.href='size.php?id='+ids;

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
  
 <form name="form1" action="new.php"  enctype="multipart/form-data" method="post">
 <input  type="hidden" name="current" value="<?php echo $ids; ?>" />
  <tr>
    <td height="88" colspan="4" valign="middle" class="table_nav"><a href="index.php"><img src="images/Top.png" width="500" height="80" border="0" /></a></td>
  </tr>
  
  
  <tr>
    <td width="33" height="34">&nbsp;</td>
    <td colspan="2" valign="bottom" class="Heading">English</td>
    <td width="379" valign="bottom" class="Heading">中文</td>
  </tr>
  <tr>
    <td height="168">&nbsp;</td>
    <td colspan="2" valign="top"><textarea name="eng" cols="40" rows="5" class="text"><a href= "http://samswellness.com/Detail.php?language=en&id=21&sub=25&pid=28">ShapeWorks QuickStart</a><br> 
<a href="">txt here</a> </textarea></td>
    <td valign="top"><textarea name="ch" cols="40" rows="5" class="text"> </textarea></td>
  </tr>
  <tr>
    <td height="46">&nbsp;</td>
    <td width="67">&nbsp;</td>
    <td width="319">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  

  <tr>
    <td height="40"></td>
    <td></td>
    <td colspan="2" valign="bottom"><input type="submit" name="submit" value="Submit" /></td>
    </tr>
  <tr>
    <td height="36"></td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
</body>
</html>
