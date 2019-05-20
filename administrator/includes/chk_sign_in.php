<?php 
 function chk_login(){ 
 $chk_osid=@mysql_query("select count(*) as num from admin_sessions where customers_id='".$_SESSION['username']."' and ip='".$_SERVER['REMOTE_ADDR']."' and  sesskey='".GetCartId()."'");
 $rows_osid=mysql_fetch_array($chk_osid); 
 $num_osid=$rows_osid['num']; 
 if($num_osid<=0){
 return false;
 }else{  
return true; 
}
}
 ?>