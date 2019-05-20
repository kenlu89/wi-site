<?php 
 function chk_login(){ 
if(!isset($_COOKIE["customers_ID"])){
return false;
 }else{
 //$exist_id=@mysql_query("select * from sessions and ip='".$_SERVER['REMOTE_ADDR']."' 
//echo $_COOKIE["customers_ID"];
$cookie=split('@', $_COOKIE['customers_ID']);
$site=$cookie[0];
$customers_id=$cookie[1];
if($site!=$_SERVER['HTTP_HOST']){
return false; 
}else{

$chk_osid=@mysql_query("select count(*) as num from sessions where customers_id='$customers_id' and  sesskey='".GetCartId()."'");
 $rows_osid=mysql_fetch_array($chk_osid); 
 $num_osid=$rows_osid['num']; 
 if($num_osid<=0){
 return false;
 }else{  
return true; 
}
}
}
}
 ?>