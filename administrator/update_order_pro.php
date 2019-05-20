<?php 
include("includes/config.php");	
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
$headers="sales@$domain\n";
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
$msg="Dear $lastname, $firstname <br><br>
Thank you for shopping on $domain<br><br>";
$msg.="Order number: $num<br>";
$msg.="Date purchased: $dates<br>";
$msg.="Shipping Method: $shipping_method<br>";

$msg.="<hr><br>";
$msg.="<table border=0 ><tr align='center'><td>Model &nbsp <td>&nbsp Description &nbsp<td>&nbsp Unit Price <td> &nbsp Qty <td>&nbsp  Amount  </td></tr>";

$order=@mysql_query("select * from orders_products where parent_id='$ids'");
while($r_orders=mysql_fetch_array($order)){
$model=$r_orders['products_model'];
$names=$r_orders['products_name'];
$qty=$r_orders['products_quantity'];
$price=number_format($r_orders['products_price'], 2);
$amount=number_format($price*$qty, 2);
$sub_total=number_format($row['sub_total'], 2);
$total=number_format($row['total'], 2);
$msg.="<tr align='center'><td>$model&nbsp <td>&nbsp $names &nbsp<td>&nbsp $ $price<td> &nbsp $qty <td>&nbsp $ $amount<td></td></tr>";
}
$msg.="</table><br>";
$msg.="<hr><br>";
$msg.="Sub_total: $ $sub_total<br>";
$msg.="Shipping Amount: $ $shipping_amount<br>";
$msg.="Total Amount: $ $total<br><br><br><br>";

$msg.="Billing Address:<br> $billing<br><br>";
$msg.="Shipping Address:<br> $shipping<br><br>";
$msg.="$comment";
$email=$row['customers_email_address'];
$msg=stripslashes($msg);
		$ADDR =$email;
		mail($ADDR,"$subject", "$msg", "From: $headers");

header("Location: ?content=orders&id=$parent&msg=1");

}
}
?>