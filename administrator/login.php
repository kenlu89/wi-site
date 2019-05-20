<?php 
define('TITLES', 'Sky Blue Studio CMS');
define('COPYRIGHT', 'Sky Blue Studio CMS');
define('LANG', 'UTF-8');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo LANG; ?>" />
<title><?php echo TITLES; ?></title>
<style type="text/css">
<!--
.style1 {
	font-size: 14px;
	font-weight: bold;
	font-family: "Times New Roman", Times, serif;
	color: #333333;
}
-->
</style>
</head>

<body >
<table width="649" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td height="98" colspan="3" align="center" valign="top"><img src="images/Front.png" width="480" height="360" /></td>
  </tr>
  <tr>
    <td width="187" height="210">&nbsp;</td>
    <td width="321" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
      <!--DWLayoutTable-->
      
      <form action="login_process.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="return submitit();"><input type="hidden" name="chk" value="1">
        <tr>
          <td width="63" height="48">&nbsp;</td>
            <td width="61">&nbsp;</td>
            <td width="197">&nbsp;</td>
          </tr>
        <tr>
          <td height="24" colspan="2" valign="middle" class="style1"><span class="style2">User Name: </span></td>
            <td valign="middle"><input name="username" type="text"  id="username"  size="20"/></td>
          </tr>
        
        <tr>
          <td height="24" colspan="2" valign="middle" class="style1">Password:</td>
            <td valign="middle"><input name="pass"   type="password" id="pass"  size="20"/></td>
          </tr>
        <tr>
          <td height="5"></td>
            <td></td>
            <td></td>
          </tr>
        <tr>
          <td height="29" valign="middle" class="style2"><input type="submit" value="Login" /></td>
            <td valign="middle"><input type="reset" value="Reset" /></td>
          <td></td>
        </tr>
        <tr>
          <td height="80">&nbsp;</td>
          <td></td>
          <td></td>
        </tr>
        </form>
    </table></td>
    <td width="141">&nbsp;</td>
  </tr>
  <tr>
    <td height="93">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
