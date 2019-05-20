<?PHP
error_reporting(0);
include("includes/config.php");
if($lang=="ch"){
include("language/chinese/top.php");
include("language/chinese/input.php");
}else{
include("language/english/top.php");
include("language/english/input.php");
}
$oid=$_GET['id'];

function get_sugar($id){
switch($id){
case 1:{
$taste=LESS_SUGAR;
return $taste;
break;
}
case 2:{
$taste=MORE_SUGAR;
return $taste;
break;
}
case 3:{
$taste=NO_SUGAR;
return $taste;
break;
}
default:{
$taste=NORMAL_SUGAR;
break;
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
break;
}
default:{
$taste=NORMAL_SALT;
break;
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
break;
}
default:{
$taste=NORMAL_SPICY;
break;
}
return $taste;
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
break;
}
default:{
$taste=NORMAL_VINGAR;
break;
}
return $taste;
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
break;
}
default:{
$taste=NORMAL_SESAME;
break;
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
break;
}
default:{
$taste=NORMAL_SCALLION;
break;
}
return $taste;
}
}
// scroll=no
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo TITLE;?></title>
<link   href="style_sheet.css" type="text/css"  rel="stylesheet" />
<script language="javascript" type="text/javascript">
    focus();

          var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
          document.body.insertAdjacentHTML('beforeEnd', WebBrowser);

          WebBrowser1.ExecWB(6, 2);//Use a 1 vs. a 2 for a prompting dialog box    WebBrowser1.outerHTML = "";
      }
<!--
function input_num(url) {
var tmp=url;
if(tmp=="cancel"){
document.getElementById("txt").value="";
}else{
var p=document.getElementById("txt").value;
document.getElementById("txt").value=p+url;
}
} 

// -->
function EnterIt() {
window.opener.document.qty_.sits.value=document.input_.txt.value;
window.close();

}


</script>
<style type="text/css">
<!--
.inpu{
font-family:Arial, Helvetica, sans-serif;
font-size:16px;
color:#999900;
}
-->
</style>
</head>

<body>
<table width="272" border="0" cellpadding="0" cellspacing="1" class="text">
  <!--DWLayoutTable-->
  <tr>
    <td height="25" colspan="4" valign="middle" class="heading1">Juan Lin Chinese Restauant</td>
  </tr>
  <tr>
    <td height="45" colspan="2" valign="top">565 Water St. <br />
    Allegan, MI 49010
      <br />
    Tel: 269-673-8899</td>
  <td colspan="2" align="right" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  
  
  <tr>
    <td height="30" colspan="4" valign="middle" class="text">Time:
    <?php  $times=date('Y-m-d h:i A'); echo $times;?></td>
  </tr>
  <tr>
    <td height="30" colspan="4" valign="middle" class="heading"><?php 
	$showtable=@mysql_query("select * from tables where ids=".$_GET['tid']); 
	$rowtable=mysql_fetch_array($showtable); 
	echo $rowtable['table_name']; ?></td>
  </tr><?php 
  $show=@mysql_query("select * from orders_products, products_description  where orders_products.parent_id='$oid' and orders_products.products_id=products_description.products_id and  orders_products.order_stats=1 and products_description.language_id='1'");
$i=1;
$txt="";
$total="";
$tax=@mysql_query("select * from  config where ids=4");
$taxrow=mysql_fetch_array($tax);

for($r=0; $r<21; $r++){
$info=mysql_fetch_array($show);
$unit_price=$info['products_price'];
if($info['type']==1){
$eat=EAT_IN;
}else{
 $eat=EAT_OUT;
}
$qty=$info['products_quantity'];

?><?php if($info['products_id']){ ?>
  <tr>
    <td width="39" height="24" valign="top" class="text" ><?php echo $qty;?></td>
  <td colspan="2" valign="top" class="text" >
      <?php echo $info['products_name'];?>
      <?php  if($info['sugar']!=0 || $info['salt']!=0 || $info['spicy']!=0 || $info['vingar']!=0 || $info['scallion']!=0 || $info['sesame_oil']!=0){ 
	  echo "<br>---";
	  if($info['sugar']!=0){ $sugar=get_sugar($info['sugar']); echo $sugar; } if($info['salt']!=0){ $salt=get_salt($info['salt']); echo $salt; } if($info['spicy']!=0){ $spicy=get_spicy($info['spicy']); echo $spicy; } if($info['vingar']!=0){ $vinegar=get_vinegar($vingar); echo $vinegar; } if($info['scallion']!=0){ $scallion=get_scallion($info['scallion']); echo $scallion; } if($info['sesame_oil']!=0){ $sesame=get_sesame($info['sesame_oil']); echo $sesame; }
	  }
	 $ch=@mysql_query("select * from products_description where products_id='".$info['products_id']."' and language_id=3");
	 $chrow=mysql_fetch_array($ch);
	 echo "<br>".$chrow['products_name'];
	  ?>    </td>
    <td width="63" valign="top" >&nbsp; $<?php   $subtotal=$qty*$unit_price; echo $subtotal=number_format($subtotal, 2); ?></td>
  </tr>
<?php

 $i++;

$total=number_format($total+$subtotal,2);

$tax_=number_format($taxrow['tax']*$total, 2);

$amount=number_format($tax_+$total, 2);
}
}
?>
  <tr>
    <td height="30" colspan="3" align="right" valign="middle">Sub-total:</td>
    <td valign="middle">&nbsp; $<?php echo $total; ?></td>
  </tr>
  <tr>
    <td height="29" colspan="3" align="right" valign="middle">Tax:</td>
    <td valign="middle">&nbsp; $<?php echo $tax_;?></td>
  </tr>
  <tr>
    <td height="30" colspan="3" align="right" valign="middle">Total:</td>
    <td valign="middle">&nbsp; $<?php echo $amount;?></td>
  </tr>
  <tr>
    <td height="1"></td>
    <td width="105"></td>
    <td width="60"></td>
    <td></td>
  </tr>
  </table>
</table>
</body>
</html>