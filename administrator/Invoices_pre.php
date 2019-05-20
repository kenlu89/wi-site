<?php 
session_start();
if(!session_is_registered("username")){
		echo "<meta http-equiv='Refresh' content='0;url=login.php'>";
}else{	
include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
		include("config.php");
$dates=$_POST['dates'];
$invoice=$_POST['payment']; 
$bill=$_POST['bill']; 
$ship=$_POST['ship']; 
$t=array();
$t2=array();
$t=$_POST['pro']; 
$t2=$_POST['qty'];
$company=$_POST['company'];
$count=$_POST['count']; 
$pid=$_POST['ids'];
$shipping_amount=$_POST['shipping'];
$shipping_m=$_POST['shipping_m'];
$shipping_mehotd=$_POST['shipping_method'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?PHP echo TITLES; ?></title>
<link href="stylesheet.css" type="text/css"  rel="stylesheet" />
<style type="text/css">
<!--

.style3 {
	font-size: 14px;
	font-weight: bold;
	color:#666666;
}
.DUE {
	font-size: 16px;
	font-weight: bold;
	color:#666666;
}
.style4 {
	color: #666666;
	font-size: 12px;
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
}
.style5 {
	color: #666666;
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>
		<script language="JavaScript">
		
			function ad_pre( )
			{
							var newQty =document.getElementById("ad").value;
			var blank=document.getElementById("blank").value;
				
				document.location.href = 'Invoices.php?ids='+newQty+'&blank='+blank;
			}
			function bl( )
			{
							var newQty =document.getElementById("ad").value;
			var blank=document.getElementById("blank").value;
				
				document.location.href = 'Invoices.php?ids='+newQty+'&blank='+blank;
				}			
function printpage()
{
window.print()
}

		
		</script>
<link href="stylesheet.css" type="text/css" rel="stylesheet" />
<style type="text/css">
<!--
.style6 {color: #666666}
-->
</style>
</head>

<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="images" >
  <!--DWLayoutTable-->
  <form  name="form1" action="invoice_pro.php" enctype="multipart/form-data" method="post">

  <tr>
    <td height="74" colspan="8" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0"  class="lines">
      <!--DWLayoutTable-->
      <tr>
        <td width="798" height="24" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
          <!--DWLayoutTable-->
          <tr>
            <td width="9"></td>
              <td width="516" height="24" valign="middle"><span class="style3 style6">INVOICE #: </span></td>
      <td width="148" align="right" valign="middle"><span class="style3">Due Date:  <br />
        </span></td>
      <td width="125" valign="middle" class="DUE"><?php echo $dates; ?></td>
    </tr>
        </table></td>
    </tr>
      <tr>
        <td height="48" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
          <tr>
            <td width="9"></td>
              <td width="516" rowspan="5" valign="top" class="style3">
			  <address class="style5">
			  <?php echo ADDRESS; ?>
              </address>                </td>
    <td width="148" height="24" align="right" valign="middle"><span class="style3">Issued Date: </span></td>
      <td width="125" valign="middle" class="style5"><?php echo $times=date('Y-m-d'); ?></td>
    </tr>
          <tr>
            <td height="24"></td>
              <td align="right" valign="middle" class="style3">Payment Method: </td>
      <td valign="middle" class="style5"><?php echo $invoice; ?></td>
    </tr>
          <tr>
            <td height="24"></td>
            <td align="right" valign="middle" class="style3">Company Name: </td>
            <td valign="middle" class="style5"><?php echo $company; ?></td>
          </tr>
          <tr>
            <td height="24"></td>
            <td align="right" valign="middle" class="style3">Customer ID: </td>
            <td valign="middle" class="text"><?php echo $pid; ?></td>
          </tr>
          <tr>
            <td height="3"></td>
            <td></td>
            <td></td>
          </tr>
        </table></td>
      </tr>
      
    </table>    </td>
    </tr>
  <tr>
    <td width="9" height="26">&nbsp;</td>
    <td width="86">&nbsp;</td>
    <td width="164">&nbsp;</td>
    <td width="266">&nbsp;</td>
    <td width="140">&nbsp;</td>
    <td width="18">&nbsp;</td>
    <td width="92">&nbsp;</td>
    <td width="23">&nbsp;</td>
  </tr>
  

  
  
  <tr>
    <td height="19">&nbsp;</td>
    <td colspan="2" valign="middle" class="style3" >Bill to: </td>
    <td >&nbsp;</td>
    <td colspan="3" valign="middle" class="style3" >Ship to: </td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td height="79">&nbsp;</td>
    <td colspan="2" valign="top" class="images" ><address>
	  <span class="style5">
	  <?php echo $bill; ?></span>
      </address></td>
    <td >&nbsp;</td>
    <td colspan="3" valign="top" class="images" ><address>
	  <span class="style5">
	  <?php echo $ship; ?></span>
      </address></td>
  <td >&nbsp;</td>
  </tr>
  
  
  <tr>
    <td height="24">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="26" colspan="8" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0"  class="lines">
      <!--DWLayoutTable-->
      
      <tr>
        <td width="20" height="24" valign="top" bgcolor="#CCCCCC"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td width="115" valign="middle" bgcolor="#CCCCCC"><span class="style4">Product Model: </span></td>
      <td width="404" align="center" valign="middle" bgcolor="#CCCCCC" class="style4">Product Description </td>
      <td width="83" align="center" valign="middle" bgcolor="#CCCCCC" class="style4">Unit Price </td>
      <td width="59" align="center" valign="middle" bgcolor="#CCCCCC" class="style4">Qty</td>
      <td width="117" align="center" valign="middle" bgcolor="#CCCCCC" class="style4">Price</td>
    </tr>
    </table></td>
    </tr>
  
  <tr>
    <td height="24" colspan="8" valign="top">
	<?php for($i=0; $i<$count; $i++)
{
$tmp=$t[$i];
$tmp1=@mysql_query("select * from products, products_description where products.products_model='$tmp' and products_description.products_id=products.products_id");
$r_tmp=mysql_fetch_array($tmp1);
$total=$t2[$i]*$r_tmp['products_price']+$total;
$qty=$r_tmp['products_quantity'];
?>
	
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	  <!--DWLayoutTable-->
	  <tr>
	    <td width="20" height="24">&nbsp;</td>
          <td width="115" align="left" valign="middle" class="style5"><?php echo $t[$i]; ?></td>
		    <input type="hidden" name="pro[]" value="<?php echo $t[$i]; ?>"  />
			  <input  type="hidden" name="qty[]" value="<?php echo $t2[$i]; ?>"  />
      <td width="406" align="center" valign="middle" class="style5"><?php echo $r_tmp['products_name']; ?></td>
        <td width="81" align="center" valign="middle" class="text"><?php echo $r_tmp['products_price']; ?></td>
        <td width="59" align="center" valign="middle" class="style5">
		  <?php if($t2[$i]<=$qty){ echo $t2[$i]; 
		}else{
		echo "<script>alert('Inventory Quantity is not enough!');window.location='Invoices.php';</script>";
		 }?></td>
      <td width="117" align="center" valign="middle" class="style5">$<?php echo $t2[$i]*$r_tmp['products_price']; ?></td>
        </tr>
	  </table>	
	<?php }?> </td>
  </tr>
  <tr>
    <td height="74">&nbsp;</td>
    <td></td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="126" colspan="8" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="lines">
      <!--DWLayoutTable-->
      <tr>
        <td width="440" height="24"></td>
            <td width="137">&nbsp;</td>
            <td width="104" align="right" valign="middle" class="style3">SUB-TOTAL:</td>
          <td width="117" align="center" valign="middle" class="style5">$<?php echo $sub_total=$total; ?></td>
          </tr>
      <tr>
        <td height="28"></td>
            <td colspan="2" align="right" valign="middle" class="style3">SHIPPING METHOD: </td>
            <td align="center" valign="middle" class="style5">
			<?php 
			$ship1=@mysql_query("select * from shipping where ids='$shipping_m'");
			$row_ship=@mysql_fetch_array($ship1);
			echo $ship_info=$row_ship['company']."-".$shipping_method;  ?></td>
          </tr>
      
      <tr>
        <td height="24"></td>
        <td colspan="2" align="right" valign="middle" class="style3">SHIPPING &amp;INSURANCE: </td>
          <td align="center" valign="middle" class="style5">$<?php echo $shipping_amount; ?></td>
          </tr>
      
      <tr>
        <td height="24"></td>
        <td colspan="2" align="right" valign="middle" class="style3">TOTAL:</td>
          <td align="center" valign="middle" class="style5">$<?php echo $total=$total+$shipping_amount; ?></td>
          </tr>
      
      
      
      
      
      <tr>
        <td height="24"></td>
        <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          </tr>
      
      
      
      
    </table></td>
  </tr>
  
  <tr>
    <td height="24"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  
  
  
  
  
  
  <tr>
    <td height="24"></td>
    <td valign="middle" class="style3">Notes:</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td colspan="2" rowspan="2" valign="top"><input type="submit" name="submit" value="Insert" /></td>
  </tr>
  <tr>
    <td height="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="73"></td>
    <td colspan="4" valign="top" class="style5">If you ordered more merchandise than what has been included with this shippment, there may be additional packages which have shipped separately. Due to the various speeds of shipping, these packages may or may not have arrived yet. If you are conncerned that you have not received your order in its entriety, Please wait an additional business day before contacting us. </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="38"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <input type="hidden" name="shipping_m" value="<?php echo $ship_info; ?>" />
  <input type="hidden" name="shipping_amount" value="<?php echo $shipping_amount; ?>" />
  <input type="hidden" name="sub_total" value="<?php echo $sub_total; ?>" />
  <input type="hidden" name="ship" value="<?php echo $ship; ?>" />
  <input type="hidden" name="bill" value="<?php echo $bill; ?>" />
  <input type="hidden" name="payment" value="<?php echo $invoice; ?>"/>
  <input type="hidden"  name="dates" value="<?php echo $dates; ?>" />
<input type="hidden" name="total" value="<?php echo $total; ?>" />
<input type="hidden" name="company" value="<?php echo $company; ?>" />
  <input type="hidden" name="count" value="<?php echo $count; ?>"  />
  <input type="hidden" name="pid" value="<?php echo $pid; ?>" />
  </form>
</table>
</body>
</html>
<?php }?>