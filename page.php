<style type="text/css">
body{background:url(<?php echo $domain;?>images/bg1.jpg) no-repeat;
}

</style>
<link rel="stylesheet" href="<?php echo $domain;?>css/lightbox.css" type="text/css" media="screen" />
<script src="<?php echo $domain;?>js/jquery-1.7.2.min.js"></script>
<script src="<?php echo $domain;?>js/jquery-ui-1.8.18.custom.min.js"></script>
<script src="<?php echo $domain;?>js/jquery.smooth-scroll.min.js"></script>
<script src="<?php echo $domain;?>js/lightbox.js"></script>

<script>
  jQuery(document).ready(function($) {
      $('a').smoothScroll({
        speed: 1000,
        easing: 'easeInOutCubic'
      });

      $('.showOlderChanges').on('click', function(e){
        $('.changelog .old').slideDown('slow');
        $(this).fadeOut();
        e.preventDefault();
      })
  });
</script>

<?php 

$page=@mysql_query("select * from categories, categories_description,  products_to_categories, products, products_description where products.products_id=products_description.products_id and products_description.language_id='$lan' and products_to_categories.products_id=products.products_id and products_to_categories.products_id='$id' and categories.categories_id=categories_description.categories_id and categories_description.language_id='$lan'");
$show_=mysql_fetch_array($page);
?>
<div id="bg" style="background:#f9e164;"></div>
<div id="content">
<p></p>

<h1><?php echo $show_['categories_name']." >> ".$show_['products_name'];?></h1>

<?php
$image=$show_['products_image'];
if($image){

//if(!file_exists($image)){		
list($width, $height, $type, $w) = getimagesize($image);
if($width>300){
$p_width=(1-($width-300)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
//$image="../".$image;
//}
}
?>
<img src="<?php echo $domain.$show_['products_image'];?>" height="<?php echo $height;?>" width="350" style="float:right; margin-left:5px; margin-bottom:5px;"><?php }?>
<?php echo $show_['products_description'];?>

<?php if($show_['gallery_']!=""){
$all_pic=@mysql_query("select * from pic where parent_id='".$show_['gallery_']."'");
while($show_pic=mysql_fetch_array($all_pic)){

$image=$show_pic['thumb'];
				  
if(!file_exists($image)){		
list($width, $height, $type, $w) = getimagesize($image);
if($width>120){
$p_width=(1-($width-120)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
}
}

?>
<a href="<?php echo $domain.$show_pic['image']; ?>" rel="lightbox[plants]"><img src="<?php echo $domain.$image; ?>" width="200" height="200" class="gray_box"></a>

<?php } }?>
</div>
