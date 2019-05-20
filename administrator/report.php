<?php
$ids=$_GET['id'];
$o_id=$_GET['ids'];
// $time=date("Y-m-d");
if($_GET['search']==""){
$time=date("Y-m-d");
}else{
$time=$_GET['search'];
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
      <input  type="hidden" name="content" value="report" align="absmiddle">
      <input type="text" name="search"   id="search" class="stext" value="<?php echo $time;?>"/>      
      <input type="submit" value="Go"  onclick="Go();"  class="stext"/>
    </form></td>
  </tr>
  <tr>
    <td height="20" colspan="8" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bar">
      <!--DWLayoutTable-->
      <tr>
        <td width="274" height="20" align="left" valign="middle">&nbsp; &nbsp; <?php echo MEAL_NAME;?></td>
        <td width="138" valign="middle" ><?php echo QTY;?></td>
        <td width="162" align="center" valign="middle" ><?php echo TAXABLE;?></td>
        <td width="100" valign="middle" ><?PHP echo UNITE_PRICE;?></td>
      <td width="126" valign="middle" ><?php echo TOTAL;?></td>
      </tr>
    </table></td>
  </tr><?php  $meal=@mysql_query("select DISTINCT(orders_products.products_id) from orders_products, orders where orders.orders_id=orders_products.parent_id and orders.date_purchased like '%$time%' and orders.orders_status=3 "); 
  
  //$products=@mysql_query("select * from orders, orders_products where orders.orders_id=orders_products.parent_id and orders.date_purchased like '%$time%' and orders.orders_status=3");
  
 // $meal=@mysql_query("select * from products order by ordered desc"); 
  $i=1;
  $add="";
  while($rowM=mysql_fetch_array($meal)){
 
 // $products=@mysql_query("select orders_products.products_id, orders_products.products_price, orders_products.products_quantity, products_description.products_description, products_description.products_name from orders_products, products_description where products_description.products_id=orders_products.products_id and products_description.language_id='$lan' and products_description.products_id=".$rowM['products_id']); 
$total_qty=@mysql_query("select SUM(orders_products.products_quantity) as tmp_qty from orders, orders_products where orders_products.products_id='".$rowM['products_id']."' and orders.date_purchased like '%$time%' and orders.orders_status=3 and orders_products.parent_id=orders.orders_id");  
$rowP=mysql_fetch_array($total_qty);
$qty=$rowP['tmp_qty'];

$pname=@mysql_query("select * from orders_products, products_description, products where products.products_id=products_description.products_id and orders_products.products_id=products_description.products_id and products_description.products_id='".$rowM['products_id']."' and products_description.language_id='$lan'");
$row_pname=mysql_fetch_array($pname);
$price=$row_pname['products_price'];
  ?>
  <tr>
    <td width="274" height="20" valign="middle"  class="text" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>>&nbsp; &nbsp; &nbsp; <?php  
	echo $row_pname['products_name'];
	?></td>
    <td valign="middle"  class="text" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><?php 	echo $qty;?></td>
    <td colspan="3" align="center" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><?php if($taxable==1){ $tax=$tax+$price*$qty*$tax_percent; echo TAXABLE_ITEM; }?></td>
    <td colspan="2" valign="middle" class="text" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>>$<?php echo $price;?></td>
    <td width="127" valign="middle" class="text" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>>$<?php echo number_format($price*$qty, 2);  $total=$total+$price*$qty; ?></td>
  </tr>  <?php $i++; }?>
  <tr>
    <td height="16" colspan="8" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td width="138">&nbsp;</td>
    <td width="89">&nbsp;</td>
    <td colspan="4" align="right" valign="middle"  class="b_red"><?php echo SUB_TOTAL;?>&nbsp; </td>
    <td valign="middle" class="text">$<?php echo number_format($total, 2);?></td>
  </tr>
  <tr>
    <td height="21"></td>
    <td></td>
    <td></td>
    <td width="45"></td>
    <td width="27"></td>
    <td width="27">&nbsp;</td>
    <td width="73" align="right" valign="middle" class="b_red"><?php echo TAX;?>&nbsp; </td>
    <td valign="middle" class="text">$<?php echo number_format($tax, 2);?></td>
  </tr>
  
  
  <tr>
    <td height="21">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3" align="right" valign="middle" class="b_red"><?PHP echo TOTAL;?>&nbsp; </td>
  <td valign="middle" class="text">$<?php echo number_format($tax+$total, 2);?></td>
  </tr>
  <tr>
    <td height="57">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

