<?php 
$ids=$_GET['id'];
$r=@mysql_query("select * from orders where orders_id='$ids'");
$r_1=mysql_fetch_array($r);
$ids_order=$r_1['orders_id']; 
$orders=@mysql_query("select * from orders_products where parent_id='$ids'");


if($_POST['chk']==1){

$ids=$_POST['ids'];
$stats=$_POST['stats'];
$comment=$_POST['comment'];
$date_due=$_POST['date_due']; 
$parent=$_POST['parent'];
$result=@mysql_query("UPDATE orders set comments='$comment', orders_status='$stats' where orders_id='$ids'");

if($result){
$r=mysql_query("select * from customers, orders where customers.customers_id=orders.parent_id and orders.orders_id='$ids'");
$row=mysql_fetch_array($r); 
$domain=$_SERVER['SERVER_NAME'];
$headers="sales@".$domain."\n";
$headers.= "Content-type: text/html; charset=utf-8\r\n";
$headers=stripslashes($headers);
$subject=$_POST['subject'];
$lastname=$row['customers_lastname'];
$firstname=$row['customers_firstname'];
$dates=$row['date_purchased'];
$num=$row['orders_id'];
$billing=$row['billing_address'];
$shipping=$row['shipping_address'];
$shipping_amount=number_format($row['shipping_amount'], 2);
$shipping_method=$row['shipping_method'];
$msg=DEAR." $lastname, $firstname <br><br>
".THANKYOU." $domain<br><br>";
$msg.=INVOICE." $num<br>";
$msg.=PURCHASE_DATE." $dates<br>";
$msg.=SHIPPING_METHOD."$shipping_method<br>";

$msg.="<hr><br>";
$msg.="<table border=0 ><tr align='center'><td>".MODEL." <td> ".DESCRIPTION." <td> ".UNIT_PRICE."<td> ".QTY." <td>  ".AMOUNT."  </td></tr>";

$order=@mysql_query("select * from orders_products where parent_id='$ids'");
while($r_orders=mysql_fetch_array($order)){
$model=$r_orders['products_model'];
$names=$r_orders['products_name'];
$qty=$r_orders['products_quantity'];
$price=number_format($r_orders['products_price'], 2);
$amount=number_format($price*$qty, 2);
$sub_total=number_format($row['sub_total'], 2);
$total=number_format($row['total'], 2);
$msg.="<tr align='center'><td> $model <td> $names <td> $".$price."<td>  $qty <td> $".$amount."<td></td></tr>";
}
$msg.="</table><br>";
$msg.="<hr><br>";
$msg.=SUB_TOTAL." $sub_total<br>";
$msg.=SHIPPING_AMOUNT." $shipping_amount<br>";
$msg.=TOTAL." $total<br><br><br><br>";

$msg.=BILLING_ADDRESS."<br> $billing<br><br>";
$msg.=SHIPPING_ADDRESS."<br> $shipping<br><br>";
$msg.="$comment";
$email=$row['customers_email_address'];
$msg=stripslashes($msg);
		$ADDR =$email;
		mail($ADDR,"$subject", "$msg", "From: $headers");

header("Location: ?content=orders&parent=$parent&msg=1");

}
}

?>

<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" >
  <!--DWLayoutTable-->
  <form  name="form1" action="?content=update_order" enctype="multipart/form-data" method="post">
  <input type="hidden"  name="chk" value="1" /><input type="hidden" name="parent" value="<?php echo $_GET['parent'];?>" />

  <tr>
    <td height="25" colspan="5" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0"  class="lines">
      <!--DWLayoutTable-->
      <tr>
        <td width="798" height="24" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bar">
          <!--DWLayoutTable-->
          <tr>
            <td width="9" height="24">&nbsp;</td>
                  <td width="436" valign="middle" ><?php echo INVOICE;?> <?php echo $r_1['orders_id']; ?></td>
          <td width="355" align="right" valign="middle" ><?php echo PURCHASE_DATE;?> <?php echo $r_1['date_purchased']; ?></td>
        </tr>
          </table></td>
        </tr>
      
    </table></td>
    </tr>
  <tr>
    <td width="6" height="36">&nbsp;</td>
    <td width="265">&nbsp;</td>
    <td width="284">&nbsp;</td>
    <td width="226">&nbsp;</td>
    <td width="19">&nbsp;</td>
    </tr>
  <tr>
    <td height="19">&nbsp;</td>
    <td valign="middle"><?php echo BILLING_INFO;?></td>
    <td>&nbsp;</td>
    <td valign="middle"><?php echo SHIPPING_INFO;?></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="79">&nbsp;</td>
    <td valign="top" class="box" ><address class="text">
	 
	  <?php echo $r_1['billing_address']; ?>
      </address></td>
    <td>&nbsp;</td>
    <td valign="top" class="box" ><address class="text">
	 
	  <?php echo $r_1['shipping_address']; ?>
      </address></td>
  <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td height="26">&nbsp;</td>
    <td >&nbsp;</td>
    <td ></td>
    <td ></td>
    <td ></td>
    </tr>
  <tr>
    <td height="26" colspan="5" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" >
      <!--DWLayoutTable-->
      
      <tr  class="bar">
        <td width="20" height="24" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
        <td width="115" valign="middle" class="bar"><?php echo MODEL;?> </td>
        <td width="418" align="center" valign="middle" class="bar"><?php echo DESCRIPTION;?></td>
        <td width="73" align="center" valign="middle" class="bar"><?php echo UNIT_PRICE;?></td>
        <td width="55" align="center" valign="middle" class="bar"><?php echo QTY;?></td>
        <td width="117" align="center" valign="middle" class="bar"><?php echo PRICE;?></td>
      </tr>
    </table></td>
    </tr>
  <tr>
    <td height="60" colspan="5" valign="top">
	<?php $i=1;
	while($orders_row=mysql_fetch_array($orders)){
?>
	
	<table width="100%" border="0" cellpadding="0" cellspacing="0" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>>
	  <!--DWLayoutTable-->
	  <tr>
	    <td width="20" height="24">&nbsp;</td>
            <td width="115" align="left" valign="middle" class="text"><?php echo $orders_row['products_model']; ?></td>
          <td width="419" align="center" valign="middle" class="text"><?php echo $orders_row['products_name']; ?></td>
            <td width="72" valign="middle" class="text"><?php echo $orders_row['products_price']; ?></td>
            <td width="55" align="center" valign="middle" class="text">
            <?php echo $orders_row['products_quantity'];
		?></td>
          <td width="117" align="center" valign="middle" class="text">$<?php echo $orders_row['products_quantity']*$orders_row['products_price']; ?></td>
          </tr>
	  </table>	<?php $i++; }?> </td>
  </tr>
  <tr>
    <td height="34" colspan="5" valign="top" class="lines"><!--DWLayoutEmptyCell-->&nbsp;</td>
    </tr>
  <tr>
    <td height="166" colspan="5" valign="top"><table width="100%" border="0"   cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="109" height="19"></td>
            <td width="394"></td>
            <td width="176"></td>
            <td width="107"></td>
            <td width="12"></td>
            <td width="2"></td>
          </tr>
      <!--DWLayoutTable-->
      <tr>
        <td height="24" align="right" valign="middle" class="Heading"><?php echo ORDER_STATUS;?></td>
            <td valign="middle">
              <select name="stats" class="text">
                <option value="1"<?php if($r_1['orders_status']==1){echo "selected='selected'";}?> ><?php echo PENDING;?></option>
                <option value="2" <?php if($r_1['orders_status']==2){echo "selected='selected'";}?>><?php echo PROCESSING;?></option>
                <option value="3"<?php if($r_1['orders_status']==3){echo "selected='selected'";}?>><?php echo DELIVERED;?></option>
              </select>		  </td>
            <td align="right" valign="middle" class="text"><?php echo SUB_TOTAL;?></td>
            <td colspan="2" align="center" valign="middle" class="text">$<?php echo $r_1['sub_total']; ?></td>
            <td></td>
          </tr>
      <tr>
        <td rowspan="2" align="right" valign="middle" class="Heading"><?php echo SUBJECT;?></td>
            <td rowspan="2" valign="middle"><input name="subject" type="text" class="text" size="45"  value="<?php echo SUBJECT_MSG;?>"/></td>
            <td height="24" align="right" valign="middle" class="text"><?php echo SHIPPING_HANDLING;
			$carrier=@mysql_query("select * from shipping_description where shipping_id='".$r_1['shipping_method']."' and language_id='$lan'");
$row_carrier=mysql_fetch_array($carrier);
			echo $row_carrier['shipping_name']; ?></td>
            <td colspan="2" align="center" valign="middle" class="text">$<?php echo $r_1['shipping_amount'];?></td>
            <td></td>
          </tr>
      <tr>
        <td rowspan="2" align="right" valign="middle" class="text"><?php echo TAX;?></td>
            <td colspan="2" rowspan="2" align="center" valign="middle" class="text">$<?php echo $r_1['tax'];?></td>
            <td height="6"></td>
          </tr>
      <tr>
        <td rowspan="3" align="right" valign="middle" class="Heading"><?php echo COMMENT;?></td>
            <td rowspan="3" valign="middle">
            <textarea name="comment" cols="40" rows="3" class="text"><?php echo $r_1['comments']; ?></textarea>		  </td>
            <td height="18"></td>
          </tr>
      <tr>
        <td height="24" align="right" valign="middle" class="text"><?php echo TOTAL;?></td>
            <td colspan="2" align="center" valign="middle" class="text">$<?php echo $r_1['total']; ?></td>
            <td></td>
          </tr>
      <tr>
        <td height="30" colspan="2" align="right" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
            <td>&nbsp;</td>
            <td></td>
          </tr>
      <tr>
        <td height="20"></td>
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
    <td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
  </tr>
  <tr>
    <td height="49" colspan="5" align="right" valign="middle"><input type="submit" value="<?php echo UPDATE;?>" /></td>
  </tr>
  <tr>
    <td height="168">&nbsp;</td>
    <td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
  </tr>
  
  
  

  
  
  <input type="hidden" name="ids" value="<?php echo $ids; ?>" />
  </form>
</table>

