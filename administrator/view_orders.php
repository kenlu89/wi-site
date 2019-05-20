<?php 
include("includes/config.php");
if($lang=="ch"){
include("language/chinese/view_orders.php");
$lan=3;
}else{
include("language/english/view_orders.php");
$lan=1;
}

$ids=$_GET['id'];
$r=@mysql_query("select * from orders where orders_id='$ids'");
$r_1=mysql_fetch_array($r);
$ids_order=$r_1['orders_id']; 
$orders=@mysql_query("select * from orders_products where parent_id='$ids'");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-08" />
<title><?php echo TITLE; ?></title>
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
<link   href="style_sheet.css" type="text/css"  rel="stylesheet" />
<style type="text/css">
<!--
.style6 {color: #666666}
-->
</style>
</head>

<body>
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0" >
  <!--DWLayoutTable-->
  <form  name="form1" action="invoice_pro.php" enctype="multipart/form-data" method="post">

  <tr>
    <td height="24" colspan="7" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bar">
              <!--DWLayoutTable-->
              <tr>
                <td width="8" height="24">&nbsp;</td>
                  <td width="371" valign="middle" ><?php echo INVOICE;?> <?php echo $r_1['orders_id']; ?></td>
          <td width="372" align="right" valign="middle" ><?php echo  PURCHASE_DATE; echo $r_1['date_purchased']; ?>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  <tr>
    <td height="20" colspan="7" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    </tr>
  <tr>
    <td height="100" colspan="4" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="box">
      <!--DWLayoutTable-->
      
      <tr>
        <td height="19" colspan="2" valign="middle" class="bar" >&nbsp;&nbsp;<?php echo BILLING_INFO;?></td>
          </tr>
      <tr>
        <td width="6" height="79" >&nbsp;</td>
            <td width="265" valign="top" ><address class="text"> 
              
              <?php echo $r_1['billing_address']; ?>
              </address></td>
          </tr>
    </table></td>
    <td width="208">&nbsp;</td>
    <td colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="box">
      <!--DWLayoutTable-->
      <tr>
        <td height="19" colspan="2" valign="middle" class="bar" >&nbsp;&nbsp;<?php echo SHIPPING_INFO;?></td>
          </tr>
      <tr>
        <td width="6" height="79" >&nbsp;</td>
          <td width="265" valign="top" ><address class="text">
            
            <?php echo $r_1['shipping_address']; ?>
              </address></td>
        </tr>
      
    </table></td>
    </tr>
  
  <tr>
    <td width="3" height="9"></td>
    <td width="15"></td>
    <td width="119"></td>
    <td width="134"></td>
    <td></td>
    <td width="262"></td>
    <td width="9"></td>
  </tr>
  <tr>
    <td height="436" colspan="7" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="750" height="26">&nbsp;</td>
          </tr>
      <tr>
        <td height="18" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0"  class="bar">
          <!--DWLayoutTable-->
          
          <tr>
            <td width="20" height="18" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                  <td width="106" valign="middle"><?php echo MODEL;?> </td>
                  <td width="390" align="center" valign="middle"><?php echo DESCRIPTION;?></td>
                  <td width="68" align="center" valign="middle"><?php echo UNIT_PRICE;?></td>
                  <td width="52" align="center" valign="middle"><?php echo QTY;?></td>
                  <td width="114" align="center" valign="middle"><?php echo PRICE;?></td>
                </tr>
          
          </table></td>
        </tr>
      <tr>
        <td height="371" valign="top"><?php include("order_txt.php");?></td>
          </tr>
      <tr>
        <td height="15" valign="top" class="bar"><!--DWLayoutEmptyCell-->&nbsp;</td>
      </tr>
      <tr>
        <td height="6"></td>
      </tr>
      
      
      
    </table></td>
    </tr>
  

  

  <tr>
    <td height="126">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="5" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="lines">
      <!--DWLayoutTable-->
      <tr>
        <td height="24" valign="middle" class="mtext"><?php echo PAYMENT_METHOD;?> <?php echo $r_1['payment_method']; echo $r_1['cardnum'];?></td>
            <td width="207" align="right" valign="middle" class="mtext"><?php echo SUB_TOTAL;?></td>
            <td width="112" align="center" valign="middle" class="mtext">$<?php echo number_format($r_1['sub_total'], 2); ?></td>
          </tr>
      <tr>
        <td height="24">&nbsp;</td>
        <td align="right" valign="middle" class="mtext"><?php echo TAX;?></td>
        <td align="center" valign="middle" class="mtext">$<?php echo $r_1['tax'];?></td>
      </tr>
      <tr>
        <td width="411" height="24">&nbsp;</td>
            <td align="right" valign="middle" class="mtext"><?php echo SHIPPING_METHOD;?> </td>
            <td align="center" valign="middle" class="mtext"><?php 
			$carrier=@mysql_query("select * from shipping_description where shipping_id='".$r_1['shipping_method']."' and language_id='$lan'");
$row_carrier=mysql_fetch_array($carrier);
			echo $row_carrier['shipping_name']; ?> </td>
          </tr>
      <tr>
        <td height="24"></td>
            <td align="right" valign="middle" class="mtext"><?php echo SHIPPING_HANDLING; ?></td>
            <td align="center" valign="middle" class="mtext">$<?php echo number_format($r_1['shipping_amount'], 2); ?> </td>
          </tr>
      <tr>
        <td height="24">&nbsp;</td>
            <td align="right" valign="middle" class="mtext"><?php echo TOTAL;?></td>
            <td align="center" valign="middle" class="mtext">$<?php echo number_format($r_1['total'],2); ?></td>
          </tr>
      <tr>
        <td height="28"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
      
    </table></td>
    </tr>
  <tr>
    <td height="33"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    </tr>
  
  

  <tr>
    <td height="24"></td>
    <td colspan="2" valign="middle" class="style3">Notes:</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="92"></td>
    <td colspan="5" valign="top" class="style5">If you ordered more merchandise than what has been included with this shippment, there may be additional packages which have shipped separately. Due to the various speeds of shipping, these packages may or may not have arrived yet. If you are conncerned that you have not received your order in its entriety, Please wait an additional business day before contacting us. </td>
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
    </tr>
  
  
  
  

  
  
  <input type="hidden" name="ship" value="<?php echo $ship; ?>" />
  <input type="hidden" name="bill" value="<?php echo $bill; ?>" />
  <input type="hidden" name="payment" value="<?php echo $invoice; ?>"/>
  <input type="hidden"  name="dates" value="<?php echo $dates; ?>" />
  <input type="hidden" name="pro" value="<?php echo $t; ?>"  />
  <input  type="hidden" name="qty" value="<?php echo $t2; ?>"  />
  <input type="hidden" name="count" value="<?php echo $count; ?>"  />
  </form>
</table>
</body>
</html>

