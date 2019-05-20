<script type="text/javascript" src="gethint.js"></script>
<?php 
$ids=$_GET['id'];
$c_name=$_GET['c_name'];
if($lang=="ch"){
include("language/chinese/country.php");
}else{
include("language/english/country.php");
}


if($ids=="" && $c_name!=""){
$result=mysql_query("select * from customers, address_book where  address_book.entry_company  like '%$c_name%' and address_book.customers_id=customers.customers_id");
}else{
$result=mysql_query("select * from customers, address_book where customers.customers_id='$ids' and address_book.customers_id='$ids'");
}
$row=mysql_fetch_array($result);
$fname=$row['customers_firstname'];
$lname=$row['customers_lastname'];
$dob=$row['customers_dob'];
$company=$row['enrty_company'];
$street=$row['entry_street_address'];
$city=$row['entry_city'];
$state=$row['entry_state'];
$zip=$row['entry_postcode'];
$row['entry_country_id'];
$country=$row['entry_country_id'];
$shipping_street=$row['shipping_street'];
$shipping_city=$row['shipping_city'];
$shipping_state=$row['shipping_state'];
$shipping_zip=$row['shipping_postcode'];
$shipping_country=$row['shipping_country_id'];
$phone=$row['customers_telephone'];
$fax=$row['customers_fax'];
$email=$row['customers_email_address'];
 	
if($_POST['chk']==1){
$ids=$_POST['id'];
$email=$_POST['email']; 
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$dob=$_POST['dob'];
$company=$_POST['company'];
$street=$_POST['street'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip=$_POST['zip'];
$country=$_POST['country'];
$shipping_company=$_POST['shipping_company'];
$shipping_street=$_POST['shipping_street'];
$shipping_city=$_POST['shipping_city'];
$shipping_state=$_POST['shipping_state'];
$shipping_zip=$_POST['shipping_zip'];
$shipping_country=$_POST['ship_country'];
$phone=$_POST['phone'];
$fax=$_POST['fax'];

if($street=="" || $state=="" || $city=="" || $zip=="" || $country=="" || $shipping_street=="" || $shipping_city=="" || $shipping_state=="" || $shipping_zip=="" || $shipping_country=="" || $phone==""){
$error=1;
}else{
$done=@mysql_query("update customers set customers_dob='$dob', customers_firstname='$fname', customers_lastname='$lname', customers_email_address='$email', customers_fax='$fax', customers_telephone='$phone' where customers_id='$ids'");

@mysql_query("update address_book set entry_company='$company', entry_gender='$gender', entry_street_address='$street', entry_city='$city', entry_state='$state', entry_postcode='$zip', entry_country_id='$country', shipping_company='$shipping_company', shipping_street='$shipping_street', shipping_city='$shipping_city', shipping_state='$shipping_state', shipping_postcode='$shipping_zip', shipping_country_id='$shipping_country'  where customers_id='$ids'");

if($done){
//@mysql_query("insert into customers_change_logs(parent_id, history, ip, time, by) values('$ids', '$change_log', '$ip', now(), '$temp')");
header("Location: ?content=Customers&msg=1");
}
}
}
?>

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>

<table width="800" border="0"  align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="800" height="28">&nbsp;</td>
  </tr>
  <tr>
    <td height="882" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      
      
      <tr>
        <td width="104" height="812">&nbsp;</td>
          <td width="587" valign="top">
            <form name="form2" action="?content=edit" enctype="multipart/form-data" method="post">
              <input type="hidden" name="id" value="<?php echo $ids; ?>"  /><input type="hidden" name="chk" value="1" />
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <!--DWLayoutTable-->
                  <tr>
                    <td height="24" colspan="2" valign="bottom" class="mtext"><strong><?php echo CUSTOMERS_INFO_DETAIL;?></strong></td>
                  </tr>
                  
                  <tr>
                    <td height="15" colspan="2" valign="top"><img src="images/dot.png" width="580" height="1" /></td>
                  </tr>
                  
                  <tr>
                    <td width="7" height="134"></td>
                    <td width="580" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="mtext">
                      <!--DWLayoutTable-->

                      <tr>
                        <td width="8" height="35">&nbsp;</td>
                        <td width="109" valign="middle" class="mtext"><?php echo FIRST_NAME;?></td>
                        <td width="463" valign="middle"><input   type="text" name="fname" id="fname" size="45" value="<?php echo $fname; ?>" /></td>
                      </tr>
                        
                        
                      <tr>
                        <td height="29">&nbsp;</td>
                        <td valign="middle"><?php echo LAST_NAME;?></td>
                        <td valign="middle">                          <input   type="text" name="lname"  id="lname" size="45"  value="<?php echo $lname; ?>"/></td>
                      </tr>
                        
                        
                        
                      <tr>
                        <td height="35">&nbsp;</td>
                        <td valign="middle"><?php echo DOB;?></td>
                        <td valign="middle">                          <input type="text" name="dob" id="dob" size="45"  value="<?php echo $dob; ?>"/></td>
                      </tr>
                       
                      <tr>
                        <td height="35">&nbsp;</td>
                        <td valign="middle"><?php echo EMAIL;?></td>
                        <td valign="middle">                          <input   type="text" name="email"  id="email"size="45" value="<?php echo $email; ?>" /></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="24"></td>
                    <td valign="bottom"><strong class="mtext"><?php echo ADDRESS_BOOK;?></strong></td>
                  </tr>
                  <tr>
                    <td height="15"></td>
                    <td valign="top"><img src="images/dot.png" width="580" height="1" /></td>
                  </tr>
                  <tr>
                    <td height="218"></td>
                    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="mtext">
                      <!--DWLayoutTable-->
                      <tr>
                        <td width="8" height="38">&nbsp;</td>
                        <td width="109" valign="middle"><?php echo COMPANY;?></td>
                        <td width="460" valign="middle">                          <input   type="text" name="company"  id="company"size="45" value="<?php echo $company; ?>" /></td>
                      </tr>
                        
                        
                      <tr>
                        <td height="35">&nbsp;</td>
                        <td valign="middle"><?php echo STREET;?></td>
                        <td valign="middle">                          <input   type="text" name="street"  id="street"size="45" value="<?php echo $street; ?>"/></td>
                      </tr>
                        
                      <tr>
                        <td height="35">&nbsp;</td>
                        <td valign="middle"><?php echo CITY;?></td>
                        <td valign="middle">                          <input   type="text" name="city"  id="city"size="45"  value="<?php echo $city; ?>"/></td>
                      </tr>
                        
                      <tr>
                        <td height="38">&nbsp;</td>
                        <td valign="middle"><?php echo STATE;?></td>
                        <td valign="middle">                          <input   type="text" name="state"  id="state"size="45" value="<?php echo $state; ?>" /></td>
                      </tr>
                        
                      <tr>
                        <td height="35">&nbsp;</td>
                        <td valign="middle"><?php echo ZIP;?></td>
                        <td valign="middle">                          <input   type="text" name="zip"  id="zip"size="45" value="<?php echo $zip; ?>" /></td>
                      </tr>
                        
                      <tr>
                        <td height="35">&nbsp;</td>
                        <td valign="middle"><?php echo COUNTRY; ?></td>
                        <td valign="middle"><?php include("country.php"); ?></td>
                      </tr>
                      <tr>
                        <td height="0"></td>
                        <td></td>
                        <td></td>
                      </tr>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </table></td>
                  </tr>
                  <tr>
                    <td height="24" colspan="2" valign="bottom" class="mtext"><strong><?php echo CUSTOMERS_INFO_DETAIL;?></strong></td>
                  </tr>
                                        <tr>
                    <td height="15" colspan="2" valign="top"><img src="images/dot.png" width="580" height="1" /></td>
                  </tr>              <tr>
                    <td height="218"></td>
                    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="mtext">
                      <!--DWLayoutTable-->
                      <tr>
                        <td width="8" height="38">&nbsp;</td>
                        <td width="109" valign="middle"><?php echo COMPANY;?></td>
                        <td width="460" valign="middle">                          <input   type="text" name="shipping_company"  id="shipping_company"size="45" value="<?php echo $shipping_company; ?>" /></td>
                      </tr>
                        
                        
                      <tr>
                        <td height="35">&nbsp;</td>
                        <td valign="middle"><?php echo STREET;?></td>
                        <td valign="middle">                          <input   type="text" name="shipping_street"  id="shipping_street"size="45" value="<?php echo $shipping_street; ?>"/></td>
                      </tr>
                        
                      <tr>
                        <td height="35">&nbsp;</td>
                        <td valign="middle"><?php echo CITY;?></td>
                        <td valign="middle">                          <input   type="text" name="shipping_city"  id="shipping_city"size="45"  value="<?php echo $shipping_city; ?>"/></td>
                      </tr>
                        
                      <tr>
                        <td height="38">&nbsp;</td>
                        <td valign="middle"><?php echo STATE;?></td>
                        <td valign="middle">                          <input   type="text" name="shipping_state"  id="shipping_state"size="45" value="<?php echo $shipping_state; ?>" /></td>
                      </tr>
                        
                      <tr>
                        <td height="35">&nbsp;</td>
                        <td valign="middle"><?php echo ZIP;?></td>
                        <td valign="middle">                          <input   type="text" name="shipping_zip"  id="shipping_zip"size="45" value="<?php echo $shipping_zip; ?>" /></td>
                      </tr>
                        
                      <tr>
                        <td height="35">&nbsp;</td>
                        <td valign="middle"><?php echo COUNTRY; ?></td>
                        <td valign="middle"><?php include("shipping_country.php"); ?></td>
                      </tr>
                      <tr>
                        <td height="0"></td>
                        <td></td>
                        <td></td>
                      </tr>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </table></td>
                  </tr>
                  <tr>
                    <td height="24" colspan="2" valign="bottom" class="mtext"><strong><?php echo CONTACT_INFO;?></strong></td>
                  </tr>
                  <tr>
                    <td height="15" colspan="2" valign="top"><img src="images/dot.png" width="587" height="1" /></td>
                  </tr>
                  <tr>
                    <td height="70">&nbsp;</td>
                    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="mtext">
                      <!--DWLayoutTable-->
                      <tr>
                        <td width="8" height="35">&nbsp;</td>
                        <td width="109" valign="middle"><?php echo TEL;?></td>
                        <td width="463" valign="middle">                          <input   type="text" name="phone"  id="phone"size="45"  value="<?php echo $row['customers_telephone']; ?>"/></td>
                      </tr>
                        
                      <tr>
                        <td height="35">&nbsp;</td>
                        <td valign="middle"><?php echo FAX;?></td>
                        <td valign="middle">                          <input   type="text" name="fax"  id="fax"size="45"  value="<?php echo $row['customers_fax']; ?>"/></td>
                      </tr>
                      
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </table></td>
                  </tr>
                  <tr>
                    <td height="24" colspan="2" valign="bottom" class="mtext"><strong><?php echo CUSTOMERS_STATUS;?></strong></td>
                  </tr>
                  <tr>
                    <td height="15" colspan="2" valign="top"><img src="images/dot.png" width="587" height="1" /></td>
                  </tr>

                  <tr>
                    <td height="35">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="20">&nbsp;</td>
                    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="25">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="34" colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="box">
                      <!--DWLayoutTable-->
                      <tr>
                        <td width="7" height="30">&nbsp;</td>
                        <td width="580" valign="middle"><input type="submit" value="<?php echo SUBMIT;?>" class="text" /></td>
                      </tr>
                      <tr>
                        <td height="2"></td>
                        <td></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="36">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
            </form></td>
          <td width="109">&nbsp;</td>
        </tr>
      
      
      
      
      
    </table></td>
  </tr>
</table>
