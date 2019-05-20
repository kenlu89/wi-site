<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
define('COPYRIGHT', 'Sky Blue Studio');

session_start();
include("includes/chk_sign_in.php");
if(chk_login()==false){
header("Location: login.php");
}

$year=$_GET['year'];
$month=$_GET['month'];
$range=$year."-".$month;

$order_id=array();
$payment_method=array();
$date_purchased =array();	
$table_id=array(); 	
$orders_status=array(); 	
$sub_total=array(); 	
$tax=array(); 	
$total=array(); 	
$sits=array(); 	
$parent_id=array(); 	
$tel=array(); 	
$edit_stats=array(); 	
$checks=array(); 	
$check_out=array();
$check_In=array(); 	
$change_amount=array(); 	
$paid_amount=array(); 	
$discount=array(); 	
$credit=array(); 	
$code=array(); 	
$client=array(); 	
$msg =array();	
$pickup=array(); 	
$msg_on_cake=array(); 	
$cake=array(); 	
$deposit=array(); 	
$order_num=array(); 	
$tips=array(); 	
$receipt=array();

$result=@mysql_query("select * from orders  where date_purchased like '%$range%' and orders_status=3 order by orders_id asc");
while($rows=mysql_fetch_array($result)){
$order_id[]=$rows['orders_id'];
$payment_method[]=$rows['payment_method'];
$date_purchased[]=$rows['date_purchased'];	
$table_id[]=$rows['table_id']; 	
$orders_status[]=$rows['orders_status']; 	
$sub_total[]=$rows['sub_total']; 	
$tax[]=$rows['tax']; 	
$total[]=$rows['total']; 	
$sits[]=$rows['sits']; 	
$parent_id[]=$rows['parent_id']; 	
$tel[]=$rows['tel']; 	
$edit_stats[]=$rows['edit_stats']; 	
$checks[]=$rows['checks']; 	
$check_out[]=$rows['check_out'];
$check_In[]=$rows['check_In']; 	
$change_amount[]=$rows['change_amount']; 	
$paid_amount[]=$rows['paid_amount']; 	
$discount[]=$rows['discount']; 	
$credit[]=$rows['credit']; 	
$code[]=$rows['code']; 	
$client[]=$rows['client']; 	
$msg[]=$rows['msg'];	
$pickup[]=$rows['pickup']; 	
$msg_on_cake[]=$rows['msg_on_cake']; 	
$cake[]=$rows['cake']; 	
$deposit[]=$rows['deposit']; 	
$order_num[]=$rows['order_num']; 	
$tips[]=$rows['tips']; 	
$receipt[]=$rows['receipt'];
}

$i=0;
$data=array();
foreach($order_id as $value) { 		
switch($payment_method[$i]){
case "1":{
$payment="Cash";
break;
}

case "3":{
$payment="Gift Card";
break;
}
case "4":{
$payment="Credit Card";
break;
}
default:{
$payment="Cash";
break;
}
}
$net_sale=$total[$i]-$total[$i]*$discount[$i]-$deposit[$i]-$tips[$i];
$data[$i]=array("Order_num"=> "_".$order_num[$i],  "Payment Method" => $payment, "Date Purchased" => $date_purchased[$i], "Sub Total"=>$sub_total[$i], "Tax"=>$tax[$i], "Total"=>$total[$i], "Discount"=>$discount[$i], "Deposit"=>$deposit[$i], "Credit"=>$credit[$i],"Tips"=>$tips[$i],  "Paid Amount"=>$paid_amount[$i], "Change Amount"=>$change_amount[$i], "Net Sales"=>$net_sale); 
 $i++;	
	
}


 function cleanData(&$str) { 
 $str = preg_replace("/\t/", "\\t", $str); 
 $str = preg_replace("/\n/", "\\n", $str); 
 }  # filename for download 
 
$filename = "Sales Report " . date('m-d-Y') . ".xls"; 
header("Content-Disposition: attachment; filename=\"$filename\"");
 header("Content-Type: application/vnd.ms-excel");  
 $flag = false; foreach($data as $row) { 
 if(!$flag) { 
 # display field/column names as first row  
 echo implode("\t", array_keys($row)) . "\n"; 
 $flag = true; } array_walk($row, 'cleanData');
  echo implode("\t", array_values($row)) . "\n"; 
  } 
 exit;

 ?>

