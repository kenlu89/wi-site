<?php 
session_start();
if(!session_is_registered("username")){
		echo "<meta http-equiv='Refresh' content='0;url=login.php'>";
}else{	
include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
$ids=$_GET['id'];

  $r=@mysql_query("select * from invoices where orders_id='$ids'");
  $r_1=mysql_fetch_array($r);
$ids_order=$r_1['orders_id']; 

$orders=@mysql_query("select * from invoices_products where parent_id='$ids'");

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
  <form  name="form1" action="update_order_pro.php" enctype="multipart/form-data" method="post">

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
        <td width="125" valign="middle" class="style3"><input type="text" name="date_due" value="<?php echo $r_1['date_due']; ?>" size="15" /></td>
      </tr>
          </table></td>
      </tr>
      <tr>
        <td height="48" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
          <tr>
            <td width="9"></td>
                <td width="516" rowspan="4" valign="top" class="style3"><address class="style5">
                <?php echo ADDRESS; ?>
                  </address></td>
      <td width="148" height="24" align="right" valign="middle"><span class="style3">Invoice Date: </span></td>
        <td width="125" valign="middle" class="style5"><?php echo $r_1['date_purchased']; ?></td>
      </tr>
          <tr>
            <td height="24"></td>
                <td align="right" valign="middle" class="Heading">Company Name: </td>
        <td valign="middle" class="text"><?php echo $r_1['company']; ?></td>
      </tr>
          <tr>
            <td height="24"></td>
            <td align="right" valign="middle" class="style3">Payment Method: </td>
        <td valign="middle" class="style5"><?php echo $r_1['payment_method']; ?></td>
      </tr>
          <tr>
            <td height="3"></td>
            <td></td>
            <td></td>
          </tr>
          </table></td>
        </tr>
      
    </table></td>
    </tr>
  <tr>
    <td width="9" height="27">&nbsp;</td>
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
	  <?php echo $r_1['billing_address']; ?></span>
      </address></td>
    <td >&nbsp;</td>
    <td colspan="2" valign="top" class="images" ><address>
	  <span class="style5">
	  <?php echo $r_1['shipping_address']; ?></span>
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
  </tr>
  <tr>
    <td height="26" colspan="7" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0"  class="lines">
      <!--DWLayoutTable-->
      
      <tr>
        <td width="20" height="24" valign="top" bgcolor="#CCCCCC"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td width="115" valign="middle" bgcolor="#CCCCCC"><span class="style4">Product Model: </span></td>
      <td width="418" align="center" valign="middle" bgcolor="#CCCCCC" class="style4">Product Description </td>
      <td width="73" align="center" valign="middle" bgcolor="#CCCCCC" class="style4">Unit Price </td>
      <td width="55" align="center" valign="middle" bgcolor="#CCCCCC" class="style4">Qty</td>
      <td width="117" align="center" valign="middle" bgcolor="#CCCCCC" class="style4">Price</td>
    </tr>
    </table></td>
    </tr>
  
  <tr>
    <td height="24" colspan="7" valign="top">
	<?php 
	while($orders_row=mysql_fetch_array($orders)){
?>
	
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	  <!--DWLayoutTable-->
	  <tr>
	    <td width="20" height="24">&nbsp;</td>
          <td width="115" align="left" valign="middle" class="style5"><?php echo $orders_row['products_model']; ?></td>
      <td width="419" align="center" valign="middle" class="style5"><?php echo $orders_row['products_name']; ?></td>
        <td width="72" valign="middle" class="text"><?php echo $orders_row['products_price']; ?></td>
        <td width="55" align="center" valign="middle" class="style5">
		  <?php echo $orders_row['products_quantity'];
		?></td>
      <td width="117" align="center" valign="middle" class="style5">$<?php echo $orders_row['products_quantity']*$orders_row['products_price']; ?></td>
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
  </tr>
  <tr>
    <td height="158" colspan="7" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="lines">
      <!--DWLayoutTable-->
      <tr>
        <td width="102" height="24" align="right" valign="middle" class="Heading"> Order Status:</td>
            <td width="9">&nbsp;</td>
            <td colspan="2" valign="middle">
              <select name="stats" class="text">
                <option value="1"<?php if($r_1['orders_status']==1){echo "selected='selected'";}?> >Pending</option>
                <option value="2" <?php if($r_1['orders_status']==2){echo "selected='selected'";}?>>Processing</option>
                <option value="3"<?php if($r_1['orders_status']==3){echo "selected='selected'";}?>>Delivered</option>
              </select>		  </td>
            <td width="176" align="right" valign="middle" class="style3">SUB-TOTAL:</td>
            <td width="117" align="center" valign="middle" class="style5">$<?php echo $r_1['sub_total']; ?></td>
          </tr>
      <tr>
        <td rowspan="2" align="right" valign="middle" class="Heading">Subject:</td>
            <td height="24"></td>
            <td colspan="2" rowspan="2" valign="middle"><input name="subject" type="text" class="style5" size="45" /></td>
            <td align="right" valign="middle" class="style3">SHIPPING &amp;HANDLING: </td>
            <td align="center" valign="middle" class="style5"><?php echo $r_1['shipping_method']; ?></td>
          </tr>
      <tr>
        <td height="6"></td>
            <td rowspan="2" align="right" valign="middle" class="style3">TAX:</td>
            <td rowspan="2" align="center" valign="middle" class="style5">$0</td>
          </tr>
      <tr>
        <td rowspan="4" align="right" valign="middle" class="Heading">comments:</td>
            <td height="18"></td>
        <td width="325" rowspan="4" valign="middle">
              <textarea name="comment" cols="40" rows="3" class="text"><?php echo $r_1['comments']; ?></textarea>		  </td>
            <td width="69"></td>
      </tr>
      <tr>
        <td height="24"></td>
            <td>&nbsp;</td>
            <td align="right" valign="middle" class="style3">TOTAL:</td>
            <td align="center" valign="middle" class="style5">$<?php echo $r_1['total']; ?></td>
          </tr>
      <tr>
        <td height="6"></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
      <tr>
        <td height="24"></td>
        <td valign="top"><input type="submit" value="update" /></td>
            <td>&nbsp;</td>
            <td></td>
      </tr>
      <tr>
        <td height="30"></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      
    </table></td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td valign="middle" class="style3">Notes:</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="73">&nbsp;</td>
    <td colspan="4" valign="top" class="style5">If you ordered more merchandise than what has been included with this shippment, there may be additional packages which have shipped separately. Due to the various speeds of shipping, these packages may or may not have arrived yet. If you are conncerned that you have not received your order in its entriety, Please wait an additional business day before contacting us. </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
  
  
  
  <input type="hidden" name="ids" value="<?php echo $ids; ?>" />
  </form>
</table>
</body>
</html>
<?php }?>