<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
session_start();
include("sessions.php");
$domain_name="";
$domain_name=$_SERVER['HTTP_HOST'];

global $domain_name;
$auth="";
$cookie=split('@', $_COOKIE['customers_ID']);
$customers_id=$cookie[1];


$_SESSION['customers_id']=$customers_id;

/*
echo $_COOKIE['customers_ID'];

if($domain_name=="njchinafirst.com" || $domain_name=="www.njchinafirst.com"){
$auth=1;
}
if($auth!=1){
header("Location: http://skyblue-studio.com/");
}


if($content!="login" && $content!="contacts" && $content!="shoppingcart" && $content!="register"){
session_start();
if(!session_is_registered("last_screen")){
session_register("last_screen");
session_register("current_screen");
$_SESSION['last_screen']=$_SESSION['current_screen'];
$_SESSION['current_screen']=$_SERVER['HTTP_REFERER'];
$last_screen=$_SESSION['last_screen'];
 $current_screen=$_SESSION['current_screen'];
}else{

if($_SESSION['current_screen']!=$_SERVER['HTTP_REFERER']){
$_SESSION['last_screen']=$_SESSION['current_screen'];
$_SESSION['current_screen']=$_SERVER['HTTP_REFERER'];

  $last_screen=$_SESSION['last_screen'];
$current_screen=$_SESSION['current_screen'];
}
}
}

//echo $_SERVER['HTTP_REFERER']."test";
*/
if(!session_is_registered("lang") ||  $content=="lan"){
session_register("lang");
session_register("txt");
if($id=="" || $id=="3"){
$_SESSION['lang']="ch";
$_SESSION['txt']="3";
}else if($id==1){
$_SESSION['lang']="en";
$_SESSION['txt']="1";
}else{
$_SESSION['lang']="ch";
$_SESSION['txt']="3";
}
header("Location: ".$_SERVER['HTTP_REFERER']);
}
$lan=$_SESSION['txt'];
$lang=$_SESSION['lang'];
global $lan;
global $lang;


if(!file_exists($content.".php")){
$content="home";
}

if($content=="account"  || $content=="order" || $content=="edit_profile" || $content=="show_order" || $content=="orders" ){

include("includes/chk_sign_in.php");
if(chk_login()==false){
header("Location: ".$domain."index.php/login");
}

}

$get_info=@mysql_query("select * from sessions where sesskey='".GetCartId()."'");
$row_get_info=mysql_fetch_array($get_info); 

/*
echo $row_get_info['sesskey'];
$check=@mysql_query("select customers_basket.customers_basket_id, products.products_price, customers_basket.customers_basket_quantity from customers_basket, products, products_description where customers_basket.itemId = products.products_id  and customers_basket.cookieId = '" . GetCartId() . "'  and products.products_id=products_description.products_id ");

$num_item=mysql_num_rows($check);
$total_item=0;
while($rows_check=mysql_fetch_array($check)){
$total_price="";
$total_item=$total_item+$rows_check['products_price']*$rows_check["customers_basket_quantity"];
if($row_get_info['zipcode']!=""){ 
$add_price=@mysql_query("select * from  state_cost where state='".$row_get_info['state_']."'");
$rows_add=mysql_fetch_array($add_price);
if($rows_add['stats']==1){
 	$total_price=$rows_check['products_price']-$rows_add['rate']*$rows_check['products_price'];	
}else{
 	$total_price=$rows_add['rate']+$rows_check['products_price'];
}
//$total_price=$total_price*$rows_check["customers_basket_quantity"];
@mysql_query("update customers_basket set final_price='$total_price' where customers_basket_id=".$rows_check['customers_basket_id']);
}
}
$total_item=number_format($total_item, 2);

$temp=$_SESSION['customers_id'];

if($content==""){
$content="home";
}

define('SERVER_ADDRESS', 'http://www.ups.com/using/services/rave/qcostcgi.cgi?accept_UPS_license_agreement=yes&10_action=4&13_product=3DS&14_origCountry=US&15_origPostal=11354&');
if($row_get_info['zipcode']=="" && $content!="home"){
header("Location: ".$domain."index.php/home/msg/1");
}

if($row_get_info['zipcode']!="" && $content=="shopping-cart"){
header("Location: ".$domain."index.php/login/msg/2");
}
if($row_get_info['zipcode']=="" && ($content=="detail" || $content=="show-item" )){
header("Location: ".$domain."index.php/login/msg/2");
}*/

define('SERVER_ADDRESS', 'http://www.ups.com/using/services/rave/qcostcgi.cgi?accept_UPS_license_agreement=yes&10_action=4&13_product=3DS&14_origCountry=US&15_origPostal=11354&');	
?>
