<?php 
function verify_email($email){
$chk_email=@mysql_query("select count(*) as num from customers where customers_email_address='$email'");
$chk_num_email=mysql_fetch_array($chk_email);
$chk_email1=@mysql_query("select count(*) as num from temp where customers_email_address='$email'");
$chk_num_email1=mysql_fetch_array($chk_email1);
if($chk_num_email['num']>=1 || $chk_num_email1['num']>=1){
return false;
}else{
return true;
}
}
?>