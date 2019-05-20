<?php
$ids=$_GET['id'];
$o_id=$_GET['ids'];

// $time=date("Y-m-d");
if($_GET['search']==""){
$time=date("Y-m-d");
}else{
$time=$_GET['search'];
}
$order=@mysql_query("select * from orders where date_purchased like '%$time%' andpayment_method=1 and receipt!=1 and orders_status=3");

$cash=@mysql_query("select * from orders, orders_products where orders.orders_id=orders_products.parent_id and orders.date_purchased like '%$time%' and orders.payment_method=1 and orders.receipt!=1 and orders.orders_status=3");


if($_POST['chk']==1){


}
?>
<script type="text/javascript">

			function orders( )
			{
				var or_id =document.getElementById("sorts").value;				
				document.location.href = '?content=orders&id='+or_id+'&ids=1';
			}
			
			function Go( )
			{
			 var oid=document.getElementById("order_id").value;	
			 document.location.href='?content=orders&id='+oid;
			}

</script>
<script type="text/javascript">
function comfirms()
  {
  var r=confirm("Warning: Are you sure to delete this?")
  if (r==true)
    {
return true;
    }
  else
    {
return false;
    }
  }
  function popCheck(url) {
	newwindow=window.open(url,'name','height=800,width=272,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no');
	if (window.focus) {newwindow.focus()}
	return false;
}
</script>
<link   href="style_sheet.css" type="text/css"  rel="stylesheet" />
<style type="text/css">
<!--
.style1 {
	font-size: 14px;
	color: #ffffff;
	font-weight: bold;
}
a {
	font-size: 14px;
	color: #006600;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #006600;
}
a:hover {
	text-decoration: none;
	color: #00CC00;
}
a:active {
	text-decoration: none;
	color: #006600;
}
.style3 {color: #006600}
-->
</style>
<table width="800" border="0" cellpadding="0" cellspacing="0" align="center">
  <!--DWLayoutTable-->
  <tr>
    <td height="21" colspan="5" align="right" valign="middle" class="mtext"><?php echo SEARCH_MSG;?></td>
    <td colspan="3" align="right" valign="middle" class="text"><form name="search" action="?" method="get" enctype="multipart/form-data">
      <input  type="hidden" name="content" value="orders_mange" align="absmiddle">
      <input type="text" name="search"   id="search" class="stext"/>      
      <input type="submit" value="Go"  onclick="Go();"  class="stext"/>
    </form></td>
  </tr>
  <tr>
    <td height="20" colspan="8" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bar">
      <!--DWLayoutTable-->
      <tr>
        <td width="127" height="20" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
        <td width="150" align="left" valign="middle"><?php echo ORDER_NUM;?></td>
        <td width="100" valign="middle" ><?php echo SUB_TOTAL;?></td>
        <td width="100" valign="middle" ><?php echo TAX;?></td>
        <td width="100" valign="middle" ><?php echo TOTAL;?></td>
        <td width="97" valign="middle" ><?PHP echo PAYMENT;?></td>
      <td width="126" valign="middle"><?php echo SALES;?></td>
        </tr>
    </table></td>
  </tr><?php $meal=@mysql_query("select * from orders where date_purchased like '%$time%' and orders_status=3 order by orders_id asc"); 
  $i=1;
  $tmp_date="";
  $subtotal="";
  $total="";
  $tax="";
  while($rowM=mysql_fetch_array($meal)){
  ?>
  <tr>
    <td width="127" height="25" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><?php if($tmp_date!=$rowM['date_purchased']){ $tmp_date=$rowM['date_purchased']; echo $rowM['date_purchased']; }
	?></td>
    <td width="150" valign="middle"  class="text" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><?php echo $rowM['order_num'];
	?></td>
    <td width="100" valign="middle"<?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>>$<?php $subtotal=$subtotal+$rowM['sub_total'];  echo $rowM['sub_total'];?></td>
    <td width="100" valign="middle"  class="text" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><?php $tax=$tax+$rowM['tax']; if($rowM['tax']>0){ echo "$".$rowM['tax']; }?></td>
    <td colspan="2" valign="middle"  class="text" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>>$<?php $total=$total+$rowM['total']; echo $rowM['total'];?></td>
    <td width="99" valign="middle"  class="text" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><?php if($rowM['payment_method']==1){ echo CASH; }else if($rowM['payment_method']==2){ echo DISCOUNT;}else if($rowM['payment_method']==3){ echo GIFT_CARD; }else if($rowM['payment_method']==4){ echo CREDIT_CARD;}?></td>
    <td width="124" valign="middle"  class="text" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><?php $sales=@mysql_query("select * from customers where customers_id=".$rowM['checks']);
	$rows_sales=mysql_fetch_array($sales);
	echo $rows_sales['customers_firstname']; 
	?></td>
  </tr>  <?php $i++; }?>
  
  <tr>
    <td height="26" colspan="8" valign="middle" class="lines"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td height="26">&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="middle"><?php if($subtotal>0){  echo "$".$subtotal; }?></td>
    <td valign="middle"><?php if($tax>0){ echo "$".$tax; }?></td>
    <td colspan="2" valign="middle"><?php if($total>0){ echo "$".$total; }?></td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td height="26">&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="middle"><?php echo SUB_TOTAL;?></td>
    <td valign="middle"><?php echo TAX;?></td>
    <td colspan="2" valign="middle"><?php echo TOTAL;?></td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
    <td width="96"></td>
    <td width="4"></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="74" colspan="8" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable--><form name="form1" action="?content=orders_mange" enctype="multipart/form-data" method="post"><input  type="hidden" name="chk" value="1" />
      <tr>
        <td width="127" height="30" align="center" valign="middle"><?php echo AMOUNT;?></td>
    <td width="250" valign="middle"><input type="text" name="amount" class="text" size="25" /></td>
    <td width="423">&nbsp;</td>
      </tr>
      <tr>
        <td height="29" align="center" valign="middle"><input type="submit" value="Submit" class="text" /></td>
    <td valign="middle"><input type="reset" value="Reset"  class="text" /></td>
    <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="15">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr></form>
    </table>
    </td>
  </tr>
</table>

