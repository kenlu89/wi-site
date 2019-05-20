<?php 
 $ip = $_SERVER['REMOTE_ADDR'];
 $expiry=time()+(24 * 60 * 60);

if($content!="home" && $content!=""){
//@mysql_query("delete from sessions where expiry<".date());
$chk_sessions=@mysql_query("select * from  sessions where sesskey='".GetCartId()."' and  ip='$ip'");
if(mysql_num_rows($chk_sessions)<=0){
 @mysql_query("insert into sessions (sesskey, expiry, ip, value)values('".GetCartId()."', '$expiry', '$ip', now())");
}

//@mysql_query("delete from sessions where expiry<='$expiry'");
//echo GetCartId();

}
?>