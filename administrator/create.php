<?php
	include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");

session_start();
if(session_is_registered("username"))
{

}

else
{
echo "<meta http-equiv='Refresh' content='0;url=login.php'>";
}

	
	?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<script language="javascript">
function submitit()
{
	
	var p1=document.getElementById("pass").value
	var p2=document.getElementById("pass1").value
	var ac=document.getElementById("acc").value
	
	submitOK="true";
	if(ac=="")
	{
	alert("Please enter your account ID you want to create.")
	document.form1.acc.focus()
	return false;
	}
	if(p1==""){
	alert("Please enter the password.")
	document.form1.pass.focus()
	return false;
	}
	if(p2==""){
	alert("Please re-enter the password.")
	document.form1.pass1.focus()
	return false;
	}
	if(p1!=p2){
	alert("The password doesn't match.")
	document.form1.pass.focus()
	return false;
	}


}
</script>
<title><?php echo TITLE; ?></title>
<style type="text/css">
<!--
.style1 {
	color: #666666;
	font-weight: bold;
	font-family: "Times New Roman", Times, serif;
	font-size: 16px;
}
.style2 {
	font-size: 14px;
	font-family: "Times New Roman", Times, serif;
	color: #333333;
}
-->
</style>
<link  rel="stylesheet" href="../stylesheet.css" type="text/css" />
</head>

<body>
<table width="800" border="0"  align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  <tr>
    <td height="88" colspan="3" valign="middle" class="table_nav"><a href="index.php"></a><a href="index.php"><img src="images/oscommerce.gif" width="500" height="80" border="0" /></a></td>
  </tr>
  <tr>
    <td width="220" height="41">&nbsp;</td>
    <td width="403">&nbsp;</td>
    <td width="175">&nbsp;</td>
  </tr>
  
  
  <tr>
    <td height="323">&nbsp;</td>
    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <form action="create_pro.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="return submitit();">
        <tr>
          <td height="24" colspan="4" valign="top" bgcolor="#FFFFFF" class="style2"><span class="style2">Create a account for your customer</span> </td>
        </tr>
        <tr>
          <td width="126" height="24" valign="middle" class="style2">Account:</td>
          <td colspan="2" valign="top"><input type="text" name="acc" id="acc" /></td>
          <td width="62">&nbsp;</td>
        </tr>
        <tr>
          <td height="25" valign="middle" class="style2">Password:</td>
          <td colspan="2" valign="middle"><input type="password" name="pass" id="pass" /></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="24" valign="middle"><span class="style2">Comfirm Password:</span> </td>
          <td colspan="2" valign="middle"><input type="password" name="pass1" id="pass1"></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="24" valign="middle" class="style2">Company Name: </td>
          <td colspan="2" valign="middle"><input type="text"  name="c_name"  /></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="24" valign="middle" class="style2">Contact Person: </td>
          <td colspan="2" valign="middle"><input type="text" name="titles" /></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="24" valign="middle" class="style2">Tel:</td>
          <td colspan="2" valign="middle"><input type="text" name="tel" /></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="24" valign="middle" class="style2">Email:</td>
          <td colspan="2" valign="middle"><input type="text" name="mail" /></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="24">&nbsp;</td>
          <td width="71">&nbsp;</td>
          <td width="139">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="24" valign="middle"><input type="submit" value="Create account" /></td>
          <td valign="middle"><input type="reset" value="reset" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="82">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        </form>   
        
  </table>    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="155">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
