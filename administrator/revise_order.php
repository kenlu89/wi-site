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

  $r=@mysql_query("select * from orders where orders_id='$ids'");
  $r_1=mysql_fetch_array($r);
$ids_order=$r_1['orders_id']; 

$orders=@mysql_query("select * from orders_products where parent_id='$ids'");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo TITLES; ?></title>
<style type="text/css">
<!--


.style3 {
	font-size: 14px;
	font-weight: bold;
	color:#666666;
}
.dUE {
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
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0" class="images" >
  <!--DWLayoutTable-->
  <form  name="form1" action="new_invoices.php" enctype="multipart/form-data" method="post">

  <tr>
    <td height="127" colspan="10" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="798" height="101" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0"  class="lines">
          <!--DWLayoutTable-->
          <tr>
            <td width="798" height="24" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <!--DWLayoutTable-->
              <tr>
                <td width="9"></td>
                <td width="516" height="24" valign="middle"><span class="style3 style6">INVOICE #: <?php echo $r_1['orders_id']; ?></span></td>
        <td width="148" align="right" valign="middle"><span class="style3">Due Date:  <br />
          </span></td>
        <td width="125" valign="middle" class="dUE"><?php echo $r_1['date_due']; ?></td>
      </tr>
              </table></td>
      </tr>
          <tr>
            <td height="48" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable-->
              <tr>
                <td width="7" height="24">&nbsp;</td>
                <td width="481" rowspan="5" valign="top" class="style3">
                  <address class="style5">
<?php echo ADDRESS; ?>
                  </address>                  </td>
      <td width="142" align="right" valign="middle"><span class="style3">Invoice Date: </span></td>
        <td width="122" valign="middle" class="style5"><?php echo $r_1['date_purchased']; ?></td>
      </tr>
              <tr>
                <td height="24"></td>
                <td align="right" valign="middle" class="style3">Payment Method: </td>
        <td valign="middle" class="style5"><?php echo $r_1['payment_method']; ?></td>
      </tr>
              <tr>
                <td height="24"></td>
                <td align="right" valign="middle" class="style3">Company Name: </td>
                <td valign="middle" class="style5"><?php echo $r_1['company']; ?></td>
              </tr>
              <tr>
                <td height="24"></td>
                <td align="right" valign="middle" class="style3">Customer ID: </td>
              <td valign="middle" class="style5"><?php echo $r_1['parent_id']; ?></td>
              </tr>
              <tr>
                <td height="3"></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td height="0"></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              
              </table></td>
        </tr>
          
            </table></td>
    </tr>
      <tr>
        <td height="26">&nbsp;</td>
      </tr>
    </table>    </td>
    </tr>
  
  

  
  
  <tr>
    <td width="4" height="19">&nbsp;</td>
    <td colspan="3" valign="middle" class="style3" >Bill to: </td>
    <td width="204" >&nbsp;</td>
    <td colspan="2" valign="middle" class="style3" >Ship to: </td>
    <td width="18" >&nbsp;</td>
    <td width="55" >&nbsp;</td>
    <td width="18" >&nbsp;</td>
  </tr>
  <tr>
    <td height="79">&nbsp;</td>
    <td colspan="3" valign="top" class="images" ><address>
	  <span class="style5">
	  <?php echo $r_1['billing_address']; ?></span>
      </address></td>
    <td >&nbsp;</td>
    <td colspan="4" valign="top" class="images" ><address>
	  <span class="style5">
	  <?php echo $r_1['shipping_address']; ?></span>
      </address></td>
  <td >&nbsp;</td>
  </tr>
  
  
  <tr>
    <td height="346" colspan="10" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="748" height="26">&nbsp;</td>
        </tr>
      <tr>
        <td height="26" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0"  class="lines">
          <!--DWLayoutTable-->
          
          <tr>
            <td width="20" height="24" valign="top" bgcolor="#CCCCCC"><!--DWLayoutEmptyCell-->&nbsp;</td>
            <td width="106" valign="middle" bgcolor="#CCCCCC"><span class="style4">Product Model: </span></td>
            <td width="389" align="center" valign="middle" bgcolor="#CCCCCC" class="style4">Product Description </td>
            <td width="68" align="center" valign="middle" bgcolor="#CCCCCC" class="style4">Unit Price </td>
            <td width="52" align="center" valign="middle" bgcolor="#CCCCCC" class="style4">Qty</td>
            <td width="112" align="center" valign="middle" bgcolor="#CCCCCC" class="style4">Price</td>
          </tr>
              </table></td>
    </tr>
      <tr>
        <td height="24" valign="top"><?php 
	while($orders_row=mysql_fetch_array($orders)){
?>
          
              <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <!--DWLayoutTable-->
                <tr>
                  <td width="20" height="24">&nbsp;</td>
              <td width="115" align="left" valign="middle" class="style5">
			  <input type="text" name="pro[]" class="text" value="<?php echo $orders_row['products_model']; ?>" /></td>
          <td width="389" align="center" valign="middle" class="style5"><?php echo $orders_row['products_name']; ?></td>
            <td width="68" align="center" valign="middle" class="text">$ <?php echo number_format($orders_row['products_price'], 2);?></td>
            <td width="52" align="center" valign="middle" class="style5"><input name="qty[]" type="text"  size="5" class="text" value="<?php echo $orders_row['products_quantity'];?>" /></td>
          <td width="117" align="center" valign="middle" class="style5">$<?php echo number_format($orders_row['products_quantity']*$orders_row['products_price'], 2); ?></td>
            </tr>
                </table>	      
              <?php }?></td>
      </tr>
      <tr>
        <td >&nbsp;</td>
      </tr>
    </table></td>
    </tr>
  <tr>
    <td height="15"></td>
    <td width="14"></td>
    <td width="112"></td>
    <td width="135"></td>
    <td></td>
    <td width="144"></td>
    <td width="44"></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  
  
  <tr>
    <td height="126">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="8" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="lines">
      <!--DWLayoutTable-->
      <tr>
        <td width="411" height="24"></td>
            <td width="117">&nbsp;</td>
            <td width="90" align="right" valign="middle" class="style3">SUB-TOTAL:</td>
            <td width="112" align="center" valign="middle" class="style5">$<?php echo number_format($r_1['sub_total']-$r_1['shipping_amount'], 2); ?></td>
          </tr>
      <tr>
        <td height="24"></td>
            <td colspan="2" align="right" valign="middle" class="style3">SHIPPING METHOD </td>
            <td align="center" valign="middle" class="style5"><?php echo $r_1['shipping_method']; ?> </td>
          </tr>
      <tr>
        <td height="24"></td>
            <td colspan="2" align="right" valign="middle" class="style3">SHIPPING &amp;INSURANCE: </td>
            <td align="center" valign="middle" class="style5"><input name="shipping_amount" type="text"  size="10"class="text" value="<?php echo number_format($r_1['shipping_amount'], 2); ?> "  /></td>
          </tr>
      <tr>
        <td height="24">&nbsp;</td>
            <td colspan="2" align="right" valign="middle" class="style3">TOTAL:</td>
            <td align="center" valign="middle" class="style5">$<?php echo number_format($r_1['total'],2); ?></td>
          </tr>
      <tr>
        <td height="28"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
      
    </table></td>
    </tr>
  <tr>
    <td height="19"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="14"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td colspan="4" rowspan="2" align="center" valign="top">

	<input type="submit"  value="create invoice" /></td>
  </tr>
  

  <tr>
    <td height="24"></td>
    <td colspan="2" valign="middle" class="style3">Notes:</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="92"></td>
    <td colspan="7" valign="top" class="style5">If you ordered more merchandise than what has been included with this shippment, there may be additional packages which have shipped separately. Due to the various speeds of shipping, these packages may or may not have arrived yet. If you are conncerned that you have not received your order in its entriety, Please wait an additional business day before contacting us. </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  

  
  
  <input type="hidden" name="ids" value="<?php echo $ids; ?>" />

  </form>
</table>
</body>
</html>
<?php }?>
