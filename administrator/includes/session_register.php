<?php 
session_start();
 $ip = $_SERVER['REMOTE_ADDR'];
 $expiry=time()+60*60*24*100;

		session_unregister("username");
        session_unregister("sessionid");
		session_register("username");
		session_register("sessionid");
		$_SESSION['username']="$username";
		$_SESSION['sessionid']=GetCartId();
		

 $times=date('l dS \of F Y h:i:s A');

 $chk_osid=@mysql_query("select count(*) as num from admin_sessions where customers_id='$username' or  sesskey='".GetCartId()."'");
 $rows_osid=mysql_fetch_array($chk_osid); 
 $num_osid=$rows_osid['num']; 
 if($num_osid<=0){
 @mysql_query("insert into admin_sessions values('".GetCartId()."', '$expiry', '$username', '$ip', '$times')");
}else{
@mysql_query("delete from admin_sessions where customers_id='$username' or  sesskey='".GetCartId()."' or ip='$ip'");
@mysql_query("insert into admin_sessions values('".GetCartId()."', '$expiry', '$username', '$ip', '$times')");
 }
 ?>