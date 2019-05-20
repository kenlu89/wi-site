<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
include("get_content.php");
include("includes/config.php");

session_start();
$temp=$_SESSION['customers_id'];
/*
if($content=="" || $content=="home"){
include("meta.php");
}else{
$meta_data=$content."_meta.php";
include($meta_data);
}
*/

if($lan==1){ 
include("language/english/top.php");
include("language/english/".$content.".php");
}else if($lan==3){
include("language/chinese/top.php");
include("language/chinese/".$content.".php");
}else{
include("language/chinese/top.php");
include("language/chinese/".$content.".php");
$lan=3;
}

if($content=="categories"){
$title_cate=@mysql_query("select * from categories_description where language_id='$lan' and categories_id='$id'");
$row_title_cate=mysql_fetch_array($title_cate);
define("TITLE", $row_title_cate['categories_name']);
$description="Super Market.com - ".$row_title_cate['categories_name'];
}
if($content=="show_product"){
$title_cate=@mysql_query("select * from categories_description where language_id='$lan' and categories_id='$id'");
$row_title_cate=mysql_fetch_array($title_cate);

$article_title=@mysql_query("select * from products_description where language_id='$lan' and products_id='$cate'");
$row_article_title=mysql_fetch_array($article_title);
define("TITLE", $row_title_cate['categories_name']." - ".$row_article_title['products_name']);
$description="Super Market.com - ".$row_title_cate['categories_name']." | ".$row_article_title['products_name'];
}

if($content=="home" || $content==""){
define("TITLE", "Super Market  - Coat, T-shirt, Casual Pants, Render pants, shorts, Leidure Suit, fashion, Jewelry Accessories");
$description="Super Market.com is an online retailer on Super Market , such as Ring, Necklace, Bracelet, Earrings, Bangle and watch.";
$keywords="Coat, T-shirt, Casual Pants, Render pants, shorts, Leidure Suit, fashion, Jewelry Accessories";
}else if($content=="about"){
define("TITLE", "About Super Market.com");
$description="About Super Market.com -an online retailer on Super Market .";
}else if($content=="customer_service"){
define("TITLE", "Customer Service of  Super Market.com");
$description="Customer service of Super Market.com is extremely like and good reputation  to the customers. ";
}else if($content=="contacts"){
define("TITLE", "Contact Super Market.com");
$description="Contact Super Market.com to get more detail information if you have anyquestion to our products and services. ";
}else if($content=="search"){
define("TITLE", "Search Super Market.com");
}else if($content=="activation"){
define("TITLE", "Activation account of Super Market.com");
}else if($content=="register"){
define("TITLE", "register an account with Super Market.com");
}else if($content=="login"){
define("TITLE", "Customer login page in Super Market.com");
}else if($content=="account"){
define("TITLE", "Account page in Super Market.com");
}else if($content=="checkout"){
define("TITLE", "Checkout with Super Market.com");
}else{
define("TITLE", "Super Market.com | Super Market  - Coat, T-shirt, Casual Pants, Render pants, shorts, Leidure Suit, fashion, Jewelry Accessories");
}

$num_item="";
$total_item="";

$check=@mysql_query("select * from customers_basket, products, products_description where customers_basket.itemId = products.products_id and products_description.language_id='$lan' and customers_basket.cookieId = '" . GetCartId() . "'  and products.products_id=products_description.products_id ");

$num_qty=@mysql_query("select SUM(customers_basket_quantity) as qtys  from customers_basket where cookieId = '" . GetCartId() . "' ");
$row_num_qty=mysql_fetch_array($num_qty);

$num_item=$row_num_qty['qtys'];

$total_item=0;
while($rows_check=mysql_fetch_array($check)){
$total_item=$total_item+$rows_check['final_price']*$rows_check["customers_basket_quantity"];

}
$total_item=number_format($total_item, 2);?>

<title><?php echo TITLE;?></title>
<meta name="description" content="<?php echo $description;?>" />
<?php if($content=="" || $content=="home"){?>
<meta name="keywords" content="<?php echo $keywords;?>" />
<?php }?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="en" />
<script src="<?php echo $domain;?>js/jquery-1.91.js"></script>
<link href="<?php echo $domain;?>css/style_sheet.css"  type="text/css" rel="stylesheet"/>


<script language="javascript" type="text/javascript">

			function search_products()
			{
			var newQty =document.getElementById("search").value;
			document.location.href = '<?php echo $domain."index.php/search/";?>'+newQty;
			}

</script>
<script>
$(document).ready(function(){
  $("#show_btn1").click(function(){
    $("#txt_box2").fadeOut();
    $("#txt_box3").fadeOut();
    $("#txt_box4").fadeOut();
    $("#txt_box5").fadeOut();
	$("#txt_box1").fadeIn();
  });

  $("#show_btn2").click(function(){
    $("#txt_box1").fadeOut();
    $("#txt_box3").fadeOut();
    $("#txt_box4").fadeOut();
    $("#txt_box5").fadeOut();
	$("#txt_box2").fadeIn();
  });
  
  $("#show_btn3").click(function(){
    $("#txt_box2").fadeOut();
    $("#txt_box1").fadeOut();
    $("#txt_box4").fadeOut();
    $("#txt_box5").fadeOut();
	$("#txt_box3").fadeIn();
  });
  
  $("#show_btn4").click(function(){
    $("#txt_box2").fadeOut();
    $("#txt_box3").fadeOut();
    $("#txt_box1").fadeOut();
    $("#txt_box5").fadeOut();
	$("#txt_box4").fadeIn();
  });
  
  $("#show_btn5").click(function(){
    $("#txt_box2").fadeOut();
    $("#txt_box3").fadeOut();
    $("#txt_box4").fadeOut();
    $("#txt_box1").fadeOut();
	$("#txt_box5").fadeIn();
  });
});


</script>
<style type="text/css">
#nav{
	list-style:none;
	font-weight:100;
	font-size:14px;
		margin:0;
	/* Clear floats */
	float:left;
	width:100%;
	position:relative;
	z-index:3;
	top:55px;
	left:200px;
}
#nav ul li{
margin:0;
}
#nav li{
	float:left;
	position:relative;
	margin:0;
}
#nav a{

	display:block;
	padding-left:20px;
	padding-right:20px;
	padding-top:5px;
	padding-bottom:10px;
	line-height:24px;
	color:#fff;
	text-decoration:none;
}
#nav a:hover{
	color:fff;
	line-height:24px;
padding-top:5px;
	text-decoration:underline;
}

/*--- DROPDOWN ---*/
#nav ul{
/* Adding a background makes the dropdown work properly in IE7+. Make this as close to your page's background as possible (i.e. white page == white background). */
	background:rgba(255,255,255,0); /* But! Let's make the background fully transparent where we can, we don't actually want to see it if we can help it... */
	list-style:none;
	position:absolute;
	
		margin:0;
	left:-9999px; /* Hide off-screen when not needed (this is more accessible than display:none;) */
}
#nav ul li{
		margin:0;
	float:none;
	
}
#nav ul a{
font-weight:100;
	white-space:nowrap; /* Stop text wrapping and creating multi-line dropdown items */
}
#nav li:hover ul{ /* Display the dropdown on hover */
	left:0; /* Bring back on-screen when needed */
	background:none;
}
#nav li:hover a{ /* These create persistent hover states, meaning the top-most link stays 'hovered' even when your cursor has moved down the list. */
	text-decoration:underline;

	


}
#nav li:hover ul a{ /* The persistent hover state does however create a global style for links even before they're hovered. Here we undo these effects. */
	text-decoration:none;	margin:0;
	border-color:#fff;
border-style:double; 
border-width: 0px 0px 1px 0px;	background:#bb1b36;
}
#nav li:hover ul li a:hover{ /* Here we define the most explicit hover states--what happens when you hover each individual link. */

background:#ee1580;
}
</style>
</head>
<body>
<div id="header"><div class="right_bar"> <a href="<?php echo $domain;?>index.php/register/" target="_self"><?php echo REGISTER;?></a> |  <?php if($temp!="" || $row_get_info['customers_id']!=""){ ?><a href="<?php echo $domain;?>index.php/logoff" target="_self"><?Php echo LOGOFF;?></a> <?php }else{?><a href="<?php echo $domain;?>index.php/login/" target="_self"><?php echo LOGIN;?></a><?php }?> |  <a href="<?php echo $domain;?>index.php/account/" target="_self"><?php echo MY_ACCOUNT;?></a> &nbsp; <a href="<?php echo $domain;?>index.php/lan/1" target="_self">English</a> | <a href="<?php echo $domain;?>index.php/lan/3" target="_self">中文</a> &nbsp;</div>
<div class="logo"><a href="<?php echo $domain;?>" target="_self"><img src="<?php echo $domain;?>images/logo.jpg" height="58" width="206" alt="Wan Mei's logo"/></a></div>
<div class="checkout"><a href="<?php echo $domain;?>index.php/shoppingcart/" target="_self"> <img src="<?php echo $domain;?>images/shopping_cart.png"  height="20" width="20" alt="shopping cart" align="absmiddle"/><?php echo $num_item;?> <?php echo ITEM;?></a> <a href="<?php echo $domain;?>index.php/checkout/" target="_self"><span class="price">$<?php  if($total_item>0){ echo $total_item; }else{ echo "0.00"; }?></span> <?php echo CHECKOUT;?></a>&nbsp;</div>
<?php // Menu bar************************************************************************** ?>
<ul id="nav">
<?php $categories=@mysql_query("select * from categories, categories_description where categories.categories_id=categories_description.categories_id and categories_description.language_id='$lan' and categories.parent_id=0 and categories.status=1 order by categories.sort_order asc"); 
?>
<li><a href="<?php echo $domain;?>" class="left_link"><?php echo HOME;?></a></li>
<?php 
while($show_cate=mysql_fetch_array($categories)){
if($id==$show_cate['categories_id']){
$links_choice="left_link_chosen";
}else{
$links_choice="left_link";
}
$chk_parent=@mysql_query("select categories_id from categories where parent_id='".$show_cate['categories_id']."' order by categories_id desc");
$row_chk_parent=mysql_fetch_array($chk_parent);
?>
<li><a href="<?php echo $domain;?>index.php/categories/<?php echo $show_cate['categories_id'];?>/<?php echo $row_chk_parent['categories_id'];?>" target="_self" class="<?php echo $links_choice;?>"><?php echo $show_cate['categories_name'];?></a> 
<?php
$chk=@mysql_query("select * from categories, categories_description where categories.categories_id=categories_description.categories_id and categories_description.language_id='$lan' and categories.parent_id='".$show_cate['categories_id']."' order by categories.sort_order asc"); 
if(mysql_num_rows($chk)>=1){
?><ul>
 <?php
 while($sub_menu=mysql_fetch_array($chk)){
 ?>
 <li><a href="<?php echo $domain;?>index.php/categories/<?php echo $show_cate['categories_id'];?>/<?php echo $sub_menu['categories_id'];?>" target="_self" ><?php echo $sub_menu['categories_name'];?></a> </li>
 <?php  } ?>
</ul>     
<?php }?> 
</li>
<?Php }?>

</ul>

<div class="menu_nav_right"><input type="text" name="search" class="text" size="30" align="middle" id="search" height="30" style="margin-top:5px;"/><input type="submit" class="text" value="<?php echo GO;?>"  onclick="search_products()" /> &nbsp;</div>
<?php // Menu bar==============================================================================?>

</div>

<div id="content"><?php include($content.".php");?>

</div>
<div id="bottom">
<div class="p_body">
<p align="center">
<?php
$bottom=@mysql_query("select * from article, article_description where article.products_id=article_description.products_id and article_description.language_id='$lan' and article.products_id!=12");
while($rows_bottom=mysql_fetch_array($bottom)){
?>
<a href="<?php echo $domain;?>index.php/show_info/<?php echo $rows_bottom['products_id'];?>/<?php echo $rows_bottom['products_name'];?>/" target="_self"><?php echo $rows_bottom['products_name'];?></a> |<?php }?>
<a href="<?php echo $domain;?>index.php/contacts" target="_self"><?php echo CONTACT;?></a>
</p><p align="center">  &copy; <?php echo date("Y"); ?> <?php echo COPYRIGHT;?> <a href="http://skyblue-studio.com">Sky Blue Studio</a></p>


</div></div>
</body>
</html>
