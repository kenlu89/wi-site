<?php 
$show_=@mysql_query("select * from article_description, article where article_description.products_id=18 and  language_id='$lan' and article.products_id=article_description.products_id  order by article.products_id desc");
$row_page=mysql_fetch_array($show_);

?>
<div id="bg" style="background:url(<?php echo $domain;?>images/bg.jpg) no-repeat top center;"></div>
<div id="content" >
<p></p>

<h1><?php echo $row_page['products_name'];?></h1>
<?php 
$image=$domain.$row_page['products_image'];
if($row_page['products_image']!=""){		

list($width, $height, $type, $w) = getimagesize($row_page['products_image']);
if($width>250){
$p_width=(1-($width-250)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
//$image="../".$image;
}
?>
<img src="<?php echo $domain.$row_page['products_image'];?>" height="<?php echo $height;?>" width="<?php echo $width;?>" style="margin-right:10px; margin-left:10px; float:right;"/>
<?php }?>
<?php
 echo $row_page['products_description']; ?>

</div>
