<?php 

	include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
		echo "<meta http-equiv='Refresh' content='0;url=login.php'>";
}else{	


$ids=$_GET['id'];

$result=mysql_query("select * from temp where customers_id='$ids' ");

$row=mysql_fetch_array($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?PHP echo TITLES; ?></title>

<style type="text/css">
<!--
.style2 {
	color: #666666;
	font-weight: bold;
	font-size: 14px;
}
.style3 {
	font-size: 12px;
	color: #666666;
}
.style10 {font-size: 12px}
.style11 {color: #666666; font-weight: bold; font-size: 12px; }
.style12 {color: #880011}

-->
</style>
<script type="text/javascript">
function submitt(){
var tax=document.getElementById("tax").value
var pass1=document.getElementById("pass1").value
var pass=document.getElementById("pass").value
var email=document.getElementById("email").value
	
	
	

	
	
	submitOK="true";
	if(email==""){
	alert("Please enter email address")
	document.form2.email.focus()
	return false;
	}
if(tax==""){
	alert("Please enter the tax ID")
	document.form2.tax.focus()
	return false;
	}
	if(pass==""){
	alert("Please enter password")
	document.form2.pass.focus()
	return false;
	}
	if(pass1==""){
	alert("Please re-enter password")
	document.form2.pass1.focus()
	return false;
	}
	if(pass!=pass1){
	alert("Password Does Not match!")
	document.form2.pass.focus()
	return false;
	}


}
</script>
</head>
<link  rel="stylesheet" href="stylesheet.css" type="text/css" />
<body >
<table width="800" border="0"  align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  <tr>
    <td width="800" height="88" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="800" height="88" valign="middle" class="table_nav"><a href="index.php"><img src="images/Top.png" width="500" height="80" border="0" /></a></td>
        </tr>
      
      
      
    </table></td>
  </tr>
  <tr>
    <td height="28">&nbsp;</td>
  </tr>
  <tr>
    <td height="847" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      
      
      <tr>
        <td width="104" height="812">&nbsp;</td>
          <td width="587" valign="top">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <!--DWLayoutTable-->
                  <tr>
                    <td width="7" height="24">&nbsp;</td>
                    <td width="580" valign="middle" class="style2">Wholesale or Resller Account Edit Form </td>
                  </tr>
                  <tr>
                    <td height="24">&nbsp;</td>
                    <td valign="bottom" class="style11">Customers Information Detail </td>
                  </tr>
                  <tr>
                    <td height="173">&nbsp;</td>
                    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="images">
                      <!--DWLayoutTable-->
                      <tr>
                        <td width="8" height="35">&nbsp;</td>
                        <td width="121" valign="middle" class="style11">ContactFirst Name:</td>
                        <td width="449" valign="middle" class="style3">
                         <?php echo $row['customers_firstname']; ?>                      </tr>
                          
                      <tr>
                        <td height="35"></td>
                        <td valign="middle" class="style11">Contact Last Name: </td>
                        <td valign="middle" class="style3">
                          <?php echo $row['customers_lastname']; ?></td>
                      </tr>
                      
                      <tr>
                        <td height="35"></td>
                        <td valign="middle" class="style11">ContactMid</td>
                        <td valign="middle" class="style3"> <?php echo $row['mid']; ?></td>
                      </tr>
                          
                      <tr>
                        <td height="35"></td>
                        <td valign="middle" class="style11">Contact Email: </td>
                        <td valign="middle" class="style3">
                        <?php echo $row['customers_email_address']; ?></td>
                      </tr>
                          
                      <tr>
                        <td height="31"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      
                      
                          
                          
                          
                          
                          
                          
                          
                          
                          
                    </table></td>
                  </tr>
                  
                  <tr>
                    <td height="30"></td>
                    <td valign="bottom" class="style11">Company Information </td>
                  </tr>
                  
                  
                  <tr>
                    <td height="218">&nbsp;</td>
                    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="images">
                      <!--DWLayoutTable-->
                      <tr>
                        <td width="8" height="38">&nbsp;</td>
                        <td width="122" valign="middle" class="style11">Company Name:</td>
                        <td width="448" valign="middle" class="style3">
                          <?php echo $row['entry_company']; ?></td>
                      </tr>
                      <tr>
                        <td height="38">&nbsp;</td>
                        <td valign="middle" class="style11">Business Type: </td>
                        <td valign="middle" class="style3"><?php echo $row['types']; ?></td>
                      </tr>
                      <tr>
                        <td height="38">&nbsp;</td>
                        <td valign="middle" class="style11">Company Web Site: </td>
                        <td valign="middle" class="style3"><?php echo $row['web']; ?></td>
                      </tr>
                          
                          
                      <tr>
                        <td height="35">&nbsp;</td>
                        <td valign="middle" class="style11">Company Address1:</td>
                        <td valign="middle" class="style3">
                          <?php echo $row['entry_street_address']; ?></td>
                      </tr>
                      <tr>
                        <td height="35">&nbsp;</td>
                        <td valign="middle" class="style11">Company Address2:</td>
                        <td valign="middle" class="style3">
						 <?php echo $row['address2']; ?></td>
                      </tr>
                          
                      <tr>
                        <td height="35">&nbsp;</td>
                        <td valign="middle" class="style11">Company City:</td>
                        <td valign="middle" class="style3">
                          <?php echo $row['entry_city']; ?></td>
                      </tr>
                          
                      <tr>
                        <td height="38">&nbsp;</td>
                        <td valign="middle" class="style11">Company State:</td>
                        <td valign="middle" class="style3">
                          <?php echo $row['entry_state']; ?></td>
                      </tr>
                          
                      <tr>
                        <td height="35">&nbsp;</td>
                        <td valign="middle" class="style11">Company Zip: </td>
                        <td valign="middle" class="style3">
                         <?php echo $row['entry_postcode']; ?></td>
                      </tr>
                          
                      <tr>
                        <td height="35">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                      </table></td>
                  </tr>
                  <tr>
                    <td height="30">&nbsp;</td>
                    <td valign="bottom" class="style11">Customer Contact Information </td>
                  </tr>
                  <tr>
                    <td height="161">&nbsp;</td>
                    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="images">
                      <!--DWLayoutTable-->
                      <tr>
                        <td width="8" height="35">&nbsp;</td>
                        <td width="122" valign="middle" class="style11">Contact Phone #: </td>
                        <td width="448" valign="middle" class="style3">
                          <?php echo $row['customers_telephone']; ?>
                          Ex-<?php echo $row['ext']; ?></td>
                      </tr>
                          
                      <tr>
                        <td height="35">&nbsp;</td>
                        <td valign="middle" class="style11">Contact Fax #: </td>
                        <td valign="middle" class="style3">
                          <?php echo $row['customers_fax']; ?></td>
                      </tr>
                      <tr>
                        <td height="35">&nbsp;</td>
                        <td valign="middle" class="style11">Contact Tax ID: </td>
                        <td valign="middle" class="style3">
                          <?php echo $row['tax']; ?></td>
                      </tr>
                      <tr>
                        <td height="30"></td>
                        <td valign="middle" class="style11">Discount:</td>
                        <td valign="middle">
						  <?php echo $row['jbt']; ?></td>
                      </tr>
                      <tr>
                        <td height="24"></td>
                        <td>&nbsp;</td>
                        <td></td>
                      </tr>
                      
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                    </table></td>
                  </tr>
                  <tr>
                    <td height="150">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
              </table>
            </form></td>
          <td width="109">&nbsp;</td>
        </tr>
      
      
      
      
      </table></td>
  </tr>
  <tr>
    <td height="104">&nbsp;</td>
  </tr>
  
  
  <tr>
    <td height="40" valign="top"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="800" height="40">
        <param name="movie" value="Bottom.swf" />
        <param name="quality" value="high" />
        <embed src="Bottom.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="800" height="40"></embed>
    </object></td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php }?>