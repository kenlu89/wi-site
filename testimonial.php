<style type="text/css">
body{background:url(<?php echo $domain;?>images/bg1.jpg) no-repeat;
}

</style>
<?php 

$show_=@mysql_query("select * from categories, products_to_categories, products, products_description where products.products_id=products_description.products_id and products_description.language_id='$lan' and products_to_categories.products_id=products.products_id and products_to_categories.categories_id=categories.categories_id and categories.categories_id='17' order by categories.sort_order asc"); 

?>
<div id="bg" style="background:none;"></div>
<div id="content" >
<h1><?php echo TESTIMONIAL;?></h1>


<?php 	
while($rows_show=mysql_fetch_array($show_)){	
$image=$rows_show['products_image'];
		  
if(!file_exists($image)){		
$image=DEFAULT_;
$height=180;
$width=180;
}else{
list($width, $height, $type, $w) = getimagesize($image);
if($width>220){
$p_width=(1-($width-220)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
//$image="../".$image;
}

}
?>
<div class="video_box"><a href="<?php echo $domain;?>index.php/page/<?php echo $rows_show['products_id'];?>" target="_blank"><img src="<?php echo $domain.$image;?>" height="<?php echo $height;?>" width="<?php echo $width;?>"/></a>
<span style="width:220px; height:30px; position:relative; top:10px;"><?php echo $rows_show['products_name'];?></span>
</div>
   <?php }?>       
</div>
