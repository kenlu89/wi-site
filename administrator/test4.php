<?php 
error_reporting(0);
include("includes/config.php");
if($lang=="ch"){
include("language/chinese/top.php");
include("language/chinese/taste_input.php");
}else{
include("language/english/top.php");
include("language/english/taste_input.php");
}
$oid=$_GET['id'];

function get_sugar($id){
switch($id){
case 1:{
$taste=LESS_SUGAR;
break;
}
case 2:{
$taste=MORE_SUGAR;
break;
}
case 3:{
$taste=NO_SUGAR;
}
default:{
$taste=NORMAL_SUGAR;
}
return $taste;
}
}
function get_salt($id){
switch($id){
case 1:{
$taste=LESS_SALT;
break;
}
case 2:{
$taste=MORE_SALT;
break;
}
case 3:{
$taste=NO_SALT;
}
default:{
$taste=NORMAL_SALT;
}
return $taste;
}
}
function get_spicy($id){
switch($id){
case 1:{
$taste=LESS_SPICY;
break;
}
case 2:{
$taste=MORE_SPICY;
break;
}
case 3:{
$taste=NO_SPICY;
}
default:{
$taste=NORMAL_SPICY;
}
return "sdfsd";
}
}
function get_vinegar($id){
switch($id){
case 1:{
$taste=LESS_VINGAR;
break;
}
case 2:{
$taste=MORE_VINGAR;
break;
}
case 3:{
$taste=NO_VINGAR;
}
default:{
$taste=NORMAL_VINGAR;
}
return "taste";
}
}
function get_sesame($id){
switch($id){
case 1:{
$taste=LESS_SESAME;
break;
}
case 2:{
$taste=MORE_SESAME;
break;
}
case 3:{
$taste=NO_SESAME;
}
default:{
$taste=NORMAL_SESAME;
}
return $taste;
}
}
function get_scallion($id){
switch($id){
case 1:{
$taste=LESS_SCALLION;
break;
}
case 2:{
$taste=MORE_SCALLION;
break;
}
case 3:{
$taste=NO_SCALLION;
}
default:{
$taste=NORMAL_SCALLION;
}
return $taste;
}
}

  $show=@mysql_query("select * from orders_products, products_description  where orders_products.parent_id='$oid' and orders_products.products_id=products_description.products_id and  orders_products.order_stats=1 and products_description.language_id='1'");


$info=mysql_fetch_array($show);
//echo $info['orders_products_id']."<br>";
//echo $info['vingar'];
$spicy=get_spicy(2);
echo $spicy;



?>