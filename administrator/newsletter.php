<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
		header('location: login.php');
}
$title=$_POST['title']; 
$txt=$_POST['eng'];
$domain=$_SERVER['SERVER_NAME'];
if($title!="" || $txt!="" ){
$headers="info@ $domain\n";
$headers.= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers=stripslashes($headers);

$msg="Dear value customers: <br><br>
Thank you for signed up our newsletter. You will automatically be emailed whenever any new product or major change is made to our website.
<br><br>
Please follow this link <a href='http://www.$domain' target='_blank'>$domain</a>  to go to our
website.<br><br>

$txt <br><br>
----------------------------------------------------------------------------------------------------------------------<br><br>

If you do not wish to receive that these updates or
you received this e-mail in error, please e-mail
newsletter@$domain.com  entitled 'Unsubscribe'.
<br><br>



Ace International LLC.
"; 
$msg=stripslashes($msg);
$chk_mail=@mysql_query("select * from newsletter");
while($row_mail=mysql_fetch_array($chk_mail)){
$email=$row_mail['email'];
		$ADDR =$email;
		mail($ADDR,"$title", "$msg", "From: $headers");

}
echo "<script>alert('newsletter has been sent'); window.location='index.php'; </script>";
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
  

  <tr>
    <td height="88" colspan="4" valign="middle" class="table_nav"><a href="index.php"><img src="images/Top.png" width="500" height="80" border="0" /></a></td>
  </tr>
  
  
  <tr>
    <td width="33" height="16">&nbsp;</td>
    <td width="397">&nbsp;</td>
    <td width="16">&nbsp;</td>
    <td width="352">&nbsp;</td>
  </tr>
  <tr>
    <td height="389">&nbsp;</td>
    <td colspan="3" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable--> <form name="form1" action="newsletter.php"  enctype="multipart/form-data" method="post">
 <input  type="hidden" name="current" value="<?php echo $ids; ?>" />
      <tr>
        <td height="41" colspan="2" valign="middle" class="text">Please enter the message to customers </td>
  </tr>
      <tr>
        <td height="45" colspan="2" valign="middle" class="text"><input type="text" class="text" name="title" size="65" /> 
      (Subject ) </td>
    </tr>
      <tr>
        <td height="263" colspan="2" valign="top"><textarea name="eng" cols="70" rows="15" class="text"></textarea></td>
    </tr>
      <tr>
        <td width="75" height="40" valign="bottom"><input type="submit" name="submit" value="Submit" /></td>
    <td width="690" valign="bottom"><input type="reset"   name="reset" /></td>
  </tr></form>
    </table>
    </td>
  </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td height="30">&nbsp;</td>
    <td valign="top">	<?php $all=@mysql_query("select * from  newsletter order by ids desc");
	while($row_m=mysql_fetch_array($all)){?>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="307" height="30" valign="middle" class="text"><?php echo $row_m['email']; ?></td>
          <td width="96" align="center" valign="middle"><a href="removenew.php?id=<?php echo $row_m['ids']; ?>"  target="_self" class="left">Remove</a></td>
          </tr>
    </table>
	<?php }?></td>
    <td>&nbsp;</td>
    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable--> <form name="form1" action="addnew.php"  enctype="multipart/form-data" method="post">
      <tr>
        <td width="266" height="30" valign="top"><input name="mail" type="text" class="text" size="40" /></td>
        <td width="86" valign="top"><input type="submit" value="add" /></td>
      </tr></form>
    </table>    </td>
  </tr>
  <tr>
    <td height="74">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

</table>
</body>
</html>
