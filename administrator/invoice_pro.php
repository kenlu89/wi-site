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
$count=$_POST['count']; 
$total=$_POST['total']; 
$s_total=$_POST['sub_total'];
$company=$_POST['company'];
$pid=$_POST['pid'];
$shipping_m=$_POST['shipping_m'];
$shipping_amount=$_POST['shipping_amount']; 

$done=@mysql_query("insert into orders (company, date_purchased , date_due , payment_method, billing_address , shipping_address, orders_status,  sub_total , tax , total, parent_id, shipping_method, shipping_amount ) values ('$company', now(), '$dates', '$invoice', '$bill', '$ship', '1', '$s_total', '0', '$total', '$pid', '$shipping_m', '$shipping_amount')");
  
 if($done){

 		echo "<script>alert('The Order has been placed!');</script>";
		}
  $r=@mysql_query("select * from orders where date_purchased=now()");
  $r_1=mysql_fetch_array($r);
$ids_order=$r_1['orders_id']; 
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo TITLES; ?></title>
<link href="stylesheet.css" type="text/css"  rel="stylesheet" />
<style type="text/css">
<!--
.style3 {
	font-size: 14px;
	font-weight: bold;
	color:#666666;
}
.Due {
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
    <td height="101" colspan="7" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0"  class="lines">
      <!--DWLayoutTable-->
      <tr>
        <td width="798" height="24" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
          <!--DWLayoutTable-->
          <tr>
            <td width="9"></td>
              <td width="516" height="24" valign="middle"><span class="style3 style6">INVOICE #: <?php echo $r_1['orders_id']; ?></span></td>
      <td width="148" align="right" valign="middle"><span class="style3">Due Date:  <br />
        </span></td>
      <td width="125" valign="middle" class="Due"><?php echo $dates; ?></td>
    </tr>
        </table></td>
    </tr>
      <tr>
        <td height="48" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
          <tr>
            <td width="9"></td>
              <td width="516" rowspan="5" valign="top" class="style3"><address class="style5">
<?PHP echo ADDRESS; ?></address>                </td>
    <td width="148" height="24" align="right" valign="middle"><span class="style3">Invoice Date: </span></td>
      <td width="125" valign="middle" class="style5"><?php echo $times=date('m-d-Y'); ?></td>
    </tr>
          <tr>
            <td height="24"></td>
              <td align="right" valign="middle" class="style3">Payment Method: </td>
      <td valign="middle" class="style5"><?php echo $invoice; ?></td>
    </tr>
          <tr>
            <td height="24"></td>
            <td align="right" valign="middle" class="style3">Customer company: </td>
            <td valign="middle" class="style5"><?php echo $company; ?></td>
          </tr>
          <tr>
            <td height="24"></td>
            <td align="right" valign="middle" class="style3">Customer ID: </td>
            <td valign="middle" class="style5"><?php echo $pid; ?></td>
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
    <td width="110">&nbsp;</td>
    <td width="23">&nbsp;</td>
  </tr>
  

  
  
  <tr>
    <td height="19">&nbsp;</td>
    <td colspan="2" valign="middle" class="style3" >Bill to: </td>
    <td >&nbsp;</td>
    <td colspan="2" valign="middle" class="style3" >Ship to: </td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td height="79">&nbsp;</td>
    <td colspan="2" valign="top" class="images" ><address>
	  <span class="style5">
	  <?php echo $bill; ?></span>
      </address></td>
    <td >&nbsp;</td>
    <td colspan="2" valign="top" class="images" ><address>
	  <span class="style5">
	  <?php echo $ship; ?></span>
      </address></td>
  <td >&nbsp;</td>
  </tr>
  
  
  <tr>
    <td height="433" colspan="7" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="798" height="24">&nbsp;</td>
          </tr>
      <tr>
        <td height="26" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0"  class="lines">
          <!--DWLayoutTable-->
          
          <tr>
            <td width="20" height="24" valign="top" bgcolor="#CCCCCC"><!--DWLayoutEmptyCell-->&nbsp;</td>
            <td width="115" valign="middle" bgcolor="#CCCCCC"><span class="style4">Product Model: </span></td>
            <td width="419" align="center" valign="middle" bgcolor="#CCCCCC" class="style4">Product Description </td>
            <td width="72" align="center" valign="middle" bgcolor="#CCCCCC" class="style4">Unit Price </td>
            <td width="55" align="center" valign="middle" bgcolor="#CCCCCC" class="style4">Qty</td>
            <td width="117" align="center" valign="middle" bgcolor="#CCCCCC" class="style4">Price</td>
          </tr>
              </table></td>
        </tr>
      <tr>
        <td height="24" valign="top">
          <?php for($i=0; $i<$count; $i++)
{
$tmp=$t[$i];
$tmp1=@mysql_query("select * from products, products_description where products.products_model='$tmp' and products_description.products_id=products.products_id");
$r_tmp=mysql_fetch_array($tmp1);
$qty=$r_tmp['products_quantity'];
$ids_products=$r_tmp['products_id'];
$model=$r_tmp['products_model']; 
$names=$r_tmp['products_name']; 
$prices=$r_tmp['products_price']; 
$p_id=$r_tmp['products_id'];

@mysql_query("update products set products_quantity=products_quantity-'$t2[$i]', ordered=ordered+'$t2[$i]' where products_id='$p_id'");
@mysql_query("insert into orders_products (parent_id, products_id, products_model,  products_name, products_price, products_quantity) values('$ids_order', '$ids_products', '$model', '$names', '$prices', '$t2[$i]')");  
?>
          
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <!--DWLayoutTable-->
            <tr>
              <td width="20" height="24">&nbsp;</td>
                <td width="115" align="left" valign="middle" class="style5"><?php echo $t[$i]; ?></td>
            <td width="419" align="center" valign="middle" class="style5"><?php echo $r_tmp['products_name']; ?></td>
              <td width="73" align="center" valign="middle" class="text"><?php echo $r_tmp['products_price']; ?></td>
              <td width="54" align="center" valign="middle" class="style5">
                <?php echo  $t2[$i]; 
		?></td>
            <td width="117" align="center" valign="middle" class="style5">$<?php echo $t2[$i]*$r_tmp['products_price']; ?></td>
              </tr>
            </table>	
          <?php }?> </td>
      </tr>
      <tr>
        <td >&nbsp;</td>
          </tr>
    </table></td>
    </tr>
  <tr>
    <td height="27">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="122" colspan="7" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="lines">
      <!--DWLayoutTable-->
      <tr>
        <td width="440"></td>
            <td width="137" height="24">&nbsp;</td>
            <td width="104" align="right" valign="middle" class="style3">SUB-TOTAL:</td>
            <td width="117" align="center" valign="middle" class="style5">$<?php echo $s_total; ?></td>
          </tr>
      <tr>
        <td height="24"></td>
            <td colspan="2" align="right" valign="middle" class="style3">SHIPPING METHOD: </td>
            <td align="center" valign="middle" class="style5"><?php echo $shipping_m; ?></td>
          </tr>
      <tr>
        <td height="24"></td>
            <td colspan="2" align="right" valign="middle" class="style3">SHIPPING &amp; INSURANCE: </td>
            <td align="center" valign="middle" class="style5">$<?php echo $shipping_amount; ?></td>
          </tr>
      <tr>
        <td height="24"></td>
            <td colspan="2" align="right" valign="middle" class="style3">TOTAL:</td>
            <td align="center" valign="middle" class="style5">$<?php echo $total; ?></td>
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
    <td height="18"></td>
    <td></td>
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
    <td></td>
  </tr>
  <tr>
    <td height="73"></td>
    <td colspan="4" valign="top" class="style5">If you ordered more merchandise than what has been included with this shippment, there may be additional packages which have shipped separately. Due to the various speeds of shipping, these packages may or may not have arrived yet. If you are conncerned that you have not received your order in its entriety, Please wait an additional business day before contacting us. </td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td height="33"></td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
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
<?php }?>