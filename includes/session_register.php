<?php 
session_start();

 $tmp_ID=$_SERVER['HTTP_HOST']."@".$row_db_pass['customers_id'];
 $stats=$row_db_pass['stats']; 
 session_register("customers_id");
// session_register("customesr_stat");
 $_SESSION['customers_id']=$row_db_pass['customers_id']; 
// $_SESSION['customers_stat']=$stats;
 $ip = $_SERVER['REMOTE_ADDR'];
 $expiry=time()+(24 * 60 * 60);
 $address=@mysql_query("select * from address_book where customers_id='".$row_db_pass['customers_id']."'");
 $row_address=mysql_fetch_array($address);
 $tmp_zip=$row_address['entry_postcode'];
 $tmp_state=$row_address['entry_state'];
 setcookie("customers_ID", $tmp_ID, time()+60*60*24*100); 
 $times=date('l dS \of F Y h:i:s A');
 @mysql_query("update customers set last_login=tmp_login, tmp_login='$times', login_ip='$ip' where customers_id='$tmp_ID'");

$session=@mysql_query("select * from  sessions where sesskey='".GetCartId()."' and ip='$ip'");
if(mysql_num_rows($session)<=0){
 @mysql_query("insert into sessions (sesskey, expiry, customers_id, ip, value, zipcode, state_)values('".GetCartId()."', '$expiry', '".$row_db_pass['customers_id']."', '$ip', now(), '$tmp_zip', '$tmp_state')");
}else{
 @mysql_query("update sessions set customers_id='".$row_db_pass['customers_id']."', expiry='$expiry', ip='$ip', value='$times', state_='$tmp_state', zipcode='$tmp_zip' where sesskey='".GetCartId()."'");
 
}
