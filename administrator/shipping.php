<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
header("Location: login.php ");
}else{	

$r=@mysql_query("select * from shipping");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo TITLES;  ?></title>
<link href="stylesheet.css" type="text/css"  rel="stylesheet" />

</head>

<body>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  <tr>
    <td width="598" height="81" valign="top" class="left"><a href="index.php"><img src="images/Top.png" width="500" height="80" border="0" /></a></td>
  </tr>
  <tr>
    <td height="16" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td height="444" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="11" height="21">&nbsp;</td>
        <td width="564">&nbsp;</td>
        <td width="23">&nbsp;</td>
      </tr>
      <tr>
        <td height="68">&nbsp;</td>
        <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="images">
          <!--DWLayoutTable-->
          <tr>
            <td width="24" height="20" valign="top" bgcolor="#710808"><!--DWLayoutEmptyCell-->&nbsp;</td>
              <td width="160" valign="middle" bgcolor="#710808" class="Heading_wh">Shipping Company </td>
            <td width="151" align="center" valign="middle" bgcolor="#710808" class="Heading_wh">Contact person  </td>
            <td width="126" align="center" valign="middle" bgcolor="#710808" class="Heading_wh">Phone # </td>
            <td width="101" valign="top" bgcolor="#710808"><!--DWLayoutEmptyCell-->&nbsp;</td>
            </tr>
          <tr>
            <td height="6"></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          <tr>
            <td height="24" colspan="5" valign="top">
              <?php while($row=mysql_fetch_array($r)){?>
              <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <!--DWLayoutTable-->
                <tr>
                  <td width="25" height="24" valign="middle">
                    <a href="services.php?id=<?php echo $row['ids']; ?>&company=<?php echo $row['company']; ?>" target="_self">
                      <img src="images/folder.gif" width="16" height="16" /></a></td>
                      <td width="160" valign="middle" class="left"><?php echo $row['company']; ?></td>
                      <td width="152" valign="middle" class="left"><?php echo $row['fname']; ?>, <?php echo $row['lname']; ?></td>
                      <td width="146" valign="top" class="left"><?php echo $row['phone']; ?> - <?php echo $row['phone']; ?></td>
                      <td width="29" align="right" valign="middle">
                        <a href="shipping_edit.php?id=<?php echo  $row['ids']; ?>" target="_self" class="left_nav">
                      Edit</a></td>
                      <td width="52" align="right" valign="middle">
                        <a  href="shipping_remove.php?id=<?php echo $row['ids']; ?>" target="_self" class="left_nav">
                      Remove</a></td>
                    </tr>
                </table>
                <?php }?>	
             		  </td>
            </tr>
          <tr>
            <td height="16">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          
          
          
          
          
          
          
        </table></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="19">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="324">&nbsp;</td>
        <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable--><form name="form1" action="shipping_pro.php" enctype="multipart/form-data"  method="post">
          <tr>
            <td width="143" height="27" valign="middle" class="Heading">Company:</td>
        <td width="421" valign="middle" class="text"><input  name="company" type="text" class="text" id="company" size="45" /></td>
        </tr>
          <tr>
            <td height="27" valign="middle" class="Heading">Address1:</td>
        <td valign="middle" class="text"><input  name="address" type="text" class="text" id="address" size="45" /></td>
        </tr>
          <tr>
            <td height="27" valign="middle"><span class="Heading">Address2:</span></td>
        <td valign="middle" class="text"><input  name="address1" type="text" class="text" id="address1" size="45" /></td>
        </tr>
          <tr>
            <td height="27" valign="middle" class="Heading">City:</td>
        <td valign="middle" class="text"><input  name="city" type="text" class="text" id="city" size="45" /></td>
        </tr>
          <tr>
            <td height="27" valign="middle" class="Heading">State:</td>
        <td valign="middle" class="text"><input  name="states" type="text" class="text" id="states" size="45" /></td>
        </tr>
          <tr>
            <td height="27" valign="middle" class="Heading">Zip:</td>
        <td valign="middle" class="text"><input  name="zip" type="text" class="text" id="zip" size="30" />
          -<input  name="subzip" type="text" class="text" id="zip" size="10" /></td>
        </tr>
          <tr>
            <td height="27">&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
          <tr>
            <td height="32" valign="middle" class="Heading">Contact first name: </td>
        <td valign="middle" class="text"><input  name="fname" type="text" class="text" id="fname" size="45" /></td>
        </tr>
          <tr>
            <td height="27" valign="middle" class="Heading">Contact last name: </td>
        <td valign="middle" class="text"><input  name="lname" type="text" class="text" id="lname" size="45" /></td>
        </tr>
          <tr>
            <td height="27" valign="middle" class="Heading">Contact Phone: </td>
        <td valign="middle" class="text"><input type="text"  name="phone" size="30" class="text" /> 
          ext 
            <input type="text" name="ext" class="text" size="10" /></td>
        </tr>
          <tr>
            <td height="18">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="31" valign="top"><input  type="submit" name="submit" value="submit" /></td>
        <td valign="top"><input type="reset" name="reset" value="reset" /></td>
        </tr></form>
        </table>
        </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="48">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      
      
      
      
      
      
      
      
      
      
      
      
      


      
      
    </table>    </td>
  </tr>
  
  

  <tr>
    <td height="35" align="center" valign="middle" class="text"> CopyRight &copy; 
      <?php  echo date('Y');  echo " "; echo $show_con['store']; echo " ";  ?> 
    All Right Reserved.	</td>
  </tr>
</table>
</body>
</html>
<?php }?>