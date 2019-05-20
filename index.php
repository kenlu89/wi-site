<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
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
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<title>www.ewsi.co</title>
<link rel="stylesheet" type="text/css" href="<?php echo $domain;?>css/style.css"/>
<script type="text/javascript" src="<?php echo $domain;?>js/jquery-1.91.js"></script>
<script type="text/javascript">

// Speed of the automatic slideshow
var slideshowSpeed = 6000;

// Variable to store the images we need to set as background
// which also includes some text and url's.
<?php
  $banners=@mysql_query("select * from banners where status=1 and language_id='$lan' order by sort_order asc");
 echo  $count=mysql_num_rows($banners);

  $i=1;
  ?>

var photos = [ 
<?php   while($rows_banner=mysql_fetch_array($banners)){?>
    {
		"title" : "<?php echo $rows_banner['banners_title'];?>",
		"image" : "<?php echo $rows_banner['banners_image'];?>",
		"url" : "<?php echo $rows_banner['banners_url'];?>",
		"firstline" : "<?php echo $rows_banner['line_1'];?>",
		"secondline" : "<?php echo $rows_banner['line_2'];?>"
	}
	<?php if($count!==$i){?>
	,
	<?php } $i++;
	}
	?>
	
];
</script>
<script type="text/javascript" src="<?php echo $domain;?>js/script.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $domain;?>css/ddsmoothmenu.css" />
<script type="text/javascript" src="<?php echo $domain;?>js/ddsmoothmenu.js"></script>
<script type="text/javascript">
ddsmoothmenu.init({
	mainmenuid: "smoothmenu1", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})
			function search_products()
			{
			var newQty =document.getElementById("search").value;
			document.location.href = '<?php echo $domain."search/";?>'+newQty;
			}
</script>
</head>
<body>
<div id="header">
	<!-- jQuery handles to place the header background images -->

	<!-- Top navigation on top of the images -->
	<div id="nav-outer">
		<div id="navigation">
			<div id="search">
			<a href="<?php echo $domain;?>index.php/lan/1" target="_self">English</a> | <a href="<?php echo $domain;?>index.php/lan/3" target="_self">中文</a>
		  </div>
			<div id="menu">
				<div id="smoothmenu1" class="ddsmoothmenu">
  <ul>
    <li><a href="<?php echo $domain;?>"><?php echo HOME;?></a></li>
    <?php $categories=@mysql_query("select * from categories, categories_description where categories.categories_id=categories_description.categories_id and categories_description.language_id='$lan' and categories.parent_id=0 and categories.status=1 order by categories.sort_order asc"); 
	while($menu=mysql_fetch_array($categories)){
?>
    <li><a href="#"><?php echo $menu['categories_name'];?></a>
    
    <?php
	$chk_cate=@mysql_query("select * from categories where parent_id='".$menu['categories_id']."'");
	if(mysql_num_rows($chk_cate)<=0){
	
	 $sub=@mysql_query("select * from categories, products_to_categories, products, products_description where products.products_id=products_description.products_id and products_description.language_id='$lan' and products_to_categories.products_id=products.products_id and products_to_categories.categories_id=categories.categories_id and categories.categories_id='".$menu['categories_id']."' order by categories.sort_order asc"); 
	 $ok=1;
	}else{
	$sub=@mysql_query("select * from categories, categories_description where categories.categories_id=categories_description.categories_id and categories_description.language_id='$lan' and categories.parent_id='".$menu['categories_id']."' and categories.status=1 order by categories.sort_order asc"); $ok=2;
	}
	
	if(mysql_num_rows($sub)>=1){
	
	?>
    <ul style="background:url(<?php echo $domain;?>images/dot.png) repeat;">
    <?php 
	while($sub_menu=mysql_fetch_array($sub)){
		
		if($ok==1){
			$products_id=$sub_menu['products_id'];
			$products_name=$sub_menu['products_name'];
			$cate_name=$sub_menu['products_name'];
			
		}
		$show_sub=@mysql_query("select * from categories, products_to_categories, products, products_description where products.products_id=products_description.products_id and products_description.language_id='$lan' and products_to_categories.products_id=products.products_id and products_to_categories.categories_id=categories.categories_id and categories.categories_id='".$sub_menu['categories_id']."'");
		$row_show_sub=mysql_fetch_array($show_sub);	
		if($ok!=1){
					$products_id=$row_show_sub['products_id'];
			$products_name=$row_show_sub['products_name'];
			$cate_name=$sub_menu['categories_name'];
		}
	?>
    <li style="border-color:#fff;border-style:double; border-width: 0px 0px 1px 0px; padding:5px 0 0 25px; text-align:left; min-width:500px;"><?Php if(mysql_num_rows($show_sub)>=1){ ?><a href="<?php echo $domain;?>index.php/page/<?php echo $products_id;?>/<?php echo $products_name;?>"><?php  echo $cate_name; ?></a><?php }else{?>
    <a href="#"><?php  echo $cate_name; ?></a><?php }?>
    
    <?php
	$sub_sub=@mysql_query("select * from categories, categories_description where categories.categories_id=categories_description.categories_id and categories_description.language_id='$lan' and categories.parent_id='".$sub_menu['categories_id']."' and categories.status=1 order by categories.sort_order asc"); 
	if(mysql_num_rows($sub_sub)>=1){ 
	?>    
    <ul style="background:url(<?php echo $domain;?>images/dot.png) repeat;">
    <?php while($rows_sub_sub=mysql_fetch_array($sub_sub)){
		$show_sub_sub=@mysql_query("select * from categories, products_to_categories, products, products_description where products.products_id=products_description.products_id and products_description.language_id='$lan' and products_to_categories.products_id=products.products_id and products_to_categories.categories_id=categories.categories_id and categories.categories_id='".$rows_sub_sub['categories_id']."'");
		$row_show_sub_sub=mysql_fetch_array($show_sub_sub);
		?>
    <li style="border-color:#fff;border-style:double; border-width: 0px 0px 1px 0px; padding:5px 0 0 25px; text-align:left; min-width:240px; margin-left:1px;"><a href="<?php echo $domain;?>index.php/page/<?php echo $row_show_sub_sub['products_id'];?>/<?php echo $row_show_sub_sub['products_name'];?>"><?php  echo $rows_sub_sub['categories_name']; ?></a></li><br>

    <?php }?>
    </ul>
    <?php }?>
    </li>
     <?php }?>
    
    </ul> 
    
     <?php }?> 
    </li>   
    <?php }?>  
    <li><a href="<?php echo $domain;?>index.php/contacts/12"><?php echo CONTACTS;?></a></li>
    <li><a href="<?php echo $domain;?>index.php/video"><?php echo VIDEO_MENU;?></a></li>
    <li><a href="<?php echo $domain;?>index.php/testimonial"><?php echo TESTIMONIAL;?></a></li>
   </ul>
   </div>
   </div>
   
    </div>  
</div>
  	<div id="headerimgs">
		<div id="headerimg1" class="headerimg"></div>
		<div id="headerimg2" class="headerimg"></div>
	</div>
    <?php 
	if($content=="home"){
	?>
 	<!-- Slideshow controls -->
	<div id="headertxt"><div id="promote">
    		<p class="pictured">
			<a href="#" id="pictureduri"></a>
		</p>
		<p class="caption">
			<span id="firstline"></span>
            <span id="secondline"></span>
            
           
		</p>
        
</div>
	</div>
<?php }?>

<?Php include($content.".php");?>



<div id="bottom"><div id="content_box">

<div class="info-1"><h2><?php echo CONTACTS;?></h2>
<p>info@ewsi.co</p>
<p>718-709-8101</p>
</div>

<div class="info-2"><h2><?Php echo LOCATION;?></h2>
<p>45 Wall Street, Suite 1118</p>
<p>New York, NY 10005</p>
</div>

<div class="info-3"><h2><?php echo FOLLOW;?></h2>
<p><?php $social=@mysql_query("select * from social_meida where language_id='$lan' "); while($rows_social=mysql_fetch_array($social)){ ?><a href="<?php echo $rows_social['meida_url'];?>" title="<?php echo $rows_social['media_name'];?>"><img src="<?php echo $domain.$rows_social['meida_image'];?>" height="34" width="50"></a><?php }?></p>

</div>

</div><div id="copyrights">
<p align="center">&copy; <?php echo COPYRIGHT;?></p></div>
</div>
</body>
</html>