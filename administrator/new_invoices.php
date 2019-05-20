<?php 
include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
		echo "<meta http-equiv='Refresh' content='0;url=login.php'>";
}else{	


$ids=$_POST['ids'];
$pro=array();
$Qty=array();
$pro=$_POST['pro'];
$Qty=$_POST['qty'];
$shipping_amount=$_POST['shipping_amount'];
$r2=@mysql_query("select * from orders_products where parent_id='$ids'");
  $r=@mysql_query("select * from orders where orders_id='$ids'");
  $num=mysql_num_rows($r2);
  $r_1=mysql_fetch_array($r);
$ids_order=$r_1['orders_id']; 
$billing=$r_1['billing_address'];
$shipping=$r_1['shipping_address'];
$payment=$r_1['payment_method'];
$date_purchased=$r_1['date_purchased'];
$date_due=$r_1['date_due'];
$shipping_method=$r_1['shipping_method'];
$company=$r_1['company'];
$parent_id=$r_1['parent_id'];
$times=date('M-d-Y');
$invoice=@mysql_query("insert into invoices(billing_address, shipping_address, payment_method, date_purchased, date_due, shipping_method, sub_total, total, company, parent_id, shipping_amount, last_modified) values('$billing', '$shipping', '$payment', '$date_purchased', '$date_due', '$shipping_method', '$sub_total', '$total', '$company', '$parent_id', '$shipping_amount', '$times')"); 

$in_id=@mysql_query("select * from  invoices order by orders_id desc");
$row_in=mysql_fetch_array($in_id);
$invoices_id=$row_in['orders_id'];

for($i=0; $i<$num; $i++){
if($Qty[$i]!=0){
 $tmp=$pro[$i];
$tmp1=@mysql_query("select * from products, products_description where products.products_model='$tmp' and products_description.products_id=products.products_id");
$r_tmp=mysql_fetch_array($tmp1);
$ids_products=$r_tmp['products_id'];
$model=$r_tmp['products_model']; 
$names=$r_tmp['products_name']; 
$prices=$r_tmp['products_price']; 
$p_id=$r_tmp['products_id'];
$sub_total=$prices*$Qty[$i]+$sub_total;
@mysql_query("insert into invoices_products (parent_id, products_id, products_model,  products_name, products_price, products_quantity) values('$invoices_id', '$ids_products', '$model', '$names', '$prices', '$Qty[$i]')");  

}}
$total=$shipping_amount+$sub_total; 
@mysql_query("update invoices set sub_total='$sub_total', total='$total' where orders_id='$invoices_id'"); 
header("Location: view_invoice.php?id=$invoices_id");
}
?>