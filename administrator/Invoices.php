<?php 
include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
		echo "<meta http-equiv='Refresh' content='0;url=login.php'>";
}else{	


		$ids=$_GET['ids'];
		$blank=$_GET['blank'];
		$shipping=$_GET['shipping'];
		$r=@mysql_query("select * from customers, address_book where customers.customers_id=address_book.customers_id order by address_book.entry_company asc");
		$r1=@mysql_query("select * from customers, address_book where customers.customers_id=address_book.customers_id and customers.customers_id='$ids' order by address_book.entry_company asc");
		$row1=mysql_fetch_array($r1); 
		$r2=@mysql_query("select * from services where parent_id='$shipping'");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?PHP echo TITLES; ?></title>
<style type="text/css">
<!--
.style3 {
	font-size: 14px;
	font-weight: bold;
	color:#666666;
}
.style4 {
	color: #FFFFFF;
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
			var shippings=document.getElementById("shipping_m").value;				
				document.location.href = 'Invoices.php?ids='+newQty+'&blank='+blank+'&shipping='+shippings;
				}			
function  shipping_method( )
{
			var newQty =document.getElementById("ad").value;
			var blank=document.getElementById("blank").value;
			var shippings=document.getElementById("shipping_m").value;
			document.location.href = 'Invoices.php?ids='+newQty+'&blank='+blank+'&shipping='+shippings;

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
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  <form  name="form1" action="Invoices_pre.php" enctype="multipart/form-data" method="post">
  <input type="hidden" name="ids" value="<?php echo $ids; ?>" />
  <tr>
    <td width="7" height="24" valign="top" bgcolor="#CCCCCC"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="5" valign="middle" bgcolor="#CCCCCC"><span class="style3 style6">INVOICE #: </span></td>
    <td colspan="4" align="right" valign="middle" bgcolor="#CCCCCC"><span class="style3">Due Date:  <br />
    </span></td>
  <td width="6" valign="top" bgcolor="#CCCCCC"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="2" valign="middle" bgcolor="#CCCCCC"><input name="dates" type="text" class="style5" /></td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td colspan="5" rowspan="5" valign="top"><address class="style5">
	<?php echo ADDRESS; ?>
</address></td>
  <td colspan="4" align="right" valign="middle"><span class="style3">Invoice Date: </span></td>
    <td>&nbsp;</td>
    <td colspan="2" valign="middle" class="style5"><?php echo $times=date('M-d-Y'); ?></td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td colspan="4" align="right" valign="middle" class="style3">Payment Method: </td>
    <td>&nbsp;</td>
    <td colspan="2" valign="middle" class="style5">
	  <select name="payment" class="style5">
	    <option value="Credit Card">Credit Card</option>
	    <option value="Business Check">Business Check</option>
	    <option value="COD" >COD</option>
	    <option value="Cash">Cash</option>
	    <option value="Net 30 Days" selected="selected">Net 30 Days </option>
	    <option value="Net 45 Days">Net 45 Days</option>
	    <option value="Net 60 Days">Net 60 Days</option>
		<option value="Net 30/60 Days">Net 30/60 Days</option>
		<option value="Net 30/60/90 Days">Net 30/60/90 Days</option>
    </select>	</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td colspan="4" align="right" valign="middle" class="Heading">Company Name: </td>
    <td>&nbsp;</td>
    <td colspan="2" valign="middle" class="text"><?php echo $row1['entry_company']; ?></td>
    </tr>
  <tr>
    <td height="24"></td>
    <td colspan="4" align="right" valign="middle" class="style3">Customer ID: </td>
    <td></td>
    <td colspan="2" valign="middle" class="text"><?php echo $ids; ?></td>
    </tr>
  <tr>
    <td height="3"></td>
    <td width="15"></td>
    <td width="24"></td>
    <td width="34"></td>
    <td width="86"></td>
    <td></td>
    <td width="9"></td>
    <td width="139"></td>
  </tr>
  
  
  <tr>
    <td height="24"></td>
    <td colspan="3" rowspan="3" valign="top" class="style3">Bill to: <br />
	  <address>
	  <textarea  name="bill"cols="30" rows="5" class="style5">
<?php echo $row1['entry_company']; ?><br />
<?php echo $row1['entry_street_address']; ?> <br />
<?php echo $row1['entry_city']; echo ", "; echo $row1['entry_state']; echo " "; echo $row1['entry_postcode']; ?><br />
<?php echo $row1['customers_telephone']; ?>
</textarea>
      </address></td>
    <td colspan="4" valign="middle">
	  <select name="ad" class="style5"  id="ad" onchange="ad_pre(this)">
	    <option value="">Please choose company</option>
	    <?php while($row=mysql_fetch_array($r)){?>
	    <option value="<?php echo $row['customers_id'];  ?>" <?php if($row['customers_id']==$ids){ echo "selected='selected'"; }?>>
	      <?php echo $row['entry_company']; ?></option>
	    <?php }?>
      </select>	</td>
    <td colspan="5" rowspan="3" valign="top" class="style3">Ship to: <br />
	  <address>
	  <textarea  name="ship"cols="30" rows="5" class="style5">
<?php echo $row1['entry_company']; ?><br />
<?php echo $row1['entry_street_address']; ?> <br />
<?php echo $row1['entry_city']; echo ", "; echo $row1['entry_state']; echo " "; echo $row1['entry_postcode']; ?> <br />
<?php echo $row1['customers_telephone']; ?></textarea>
      </address></td>
  </tr>
  <tr>
    <td height="69"></td>
    <td width="98">&nbsp;</td>
    <td width="148">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="29"></td>
    <td colspan="4" valign="middle">
	  <select name="blank" class="style5"  id="blank" onchange="bl(this)">
	    <?php for($i=1; $i<=20; $i++){ ?> 
	    <option value="<?php echo $i; ?>" <?php if($i==$blank){ echo "selected='selected'"; }?> ><?php echo $i; ?></option>
	    <?php }?>
      </select>	</td>
    </tr>
  

  <tr>
    <td height="24" colspan="2" valign="top" bgcolor="#006600"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td width="113" valign="middle" bgcolor="#006600"><span class="style4">Product Model: </span></td>
    <td colspan="6" align="center" valign="middle" bgcolor="#006600" class="style4"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" align="center" valign="middle" bgcolor="#006600" class="style4">Qty</td>
    <td align="center" valign="middle" bgcolor="#006600" class="style4"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td height="61" colspan="13" valign="top">
	<input type="hidden" name="count" value="<?php echo $blank; ?>" />
	<input type="hidden" name="company" value="<? echo $row1['entry_company']; ?>" />
	<?php 
	if($blank!=""){
	for($i=1; $i<=$blank; $i++){?>
	
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	  <!--DWLayoutTable-->
	  <tr>
	    <td width="20" height="24">&nbsp;</td>
            <td width="115" valign="middle" class="style5"><input type="text" name="pro[]"  size="10" /></td>
        <td width="442">&nbsp;</td>
          <td width="104" valign="middle" class="style5"><input type="text" name="qty[]" size="10" /></td>
        <td width="117">&nbsp;</td>
          </tr>
	  </table>	<?php }}?>	  </td>
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td width="10">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="109">&nbsp;</td>
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
  <tr>
    <td height="29"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td colspan="2" align="right" valign="middle" class="Heading">Shipping Company: </td>
    <td colspan="5" rowspan="2" align="center" valign="middle">
	<select name="shipping_m" class="style5"  id="shipping_m" onchange="shipping_method(this)">
	<option value="">shipping company</option>
	<?php $shipping=@mysql_query("select * from shipping ");
while($show_shipping=mysql_fetch_array($shipping)){
	?>
	<option value="<?php echo $show_shipping['ids']; ?>"  <?php if($_GET['shipping']==$show_shipping['ids']) { echo "selected='selected'"; }?>><?php  echo $show_shipping['company']; ?></option>
<?php }?>
	</select>	</td>
    <td rowspan="2" align="center" valign="middle"><input type="text"   name="shipping" size="15" /> </td>
  </tr>
  <tr>
    <td height="3"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td colspan="2" rowspan="2" align="right" valign="middle" class="style3">Shipping method: </td>
    </tr>
  
  <tr>
    <td height="29">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3" align="right" valign="middle"><select name="shipping_method" class="text" id="shipping_method">
	<?php while($ship_m=@mysql_fetch_array($r2)){
?>
	<option value="<?php echo $ship_m['service']; ?>"><?php echo $ship_m['service']; ?></option><?php }?>	
</select>
	</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top"><input type="submit" name="submit" value="Preview" /></td>
  </tr>
  <tr>
    <td height="27">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
  </form>
</table>
</body>
</html>
<?php }?>