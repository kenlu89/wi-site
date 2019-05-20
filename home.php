<?php  //order by rand() limit 2
$featured=@mysql_query("select * from  products, products_description where products.products_id=products_description.products_id and products_description.language_id='$lan' and products.featured=1");
$row_featured=mysql_fetch_array($featured);
$image=$row_featured['products_image'];
if(!file_exists($image)){		
list($width, $height, $type, $w) = getimagesize($image);
if($width>290){
$p_width=(1-($width-290)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
//$image="../".$image;
}
}
?>
	<!-- Slideshow controls -->
	<div id="headernav-outer">
	  <div id="headernav_l"><div id="back" class="btn"></div></div>
      <div id="headernav_r"><div id="next" class="btn"></div></div>
	</div></div>



<div id="content"><div class="info_box-1"><h1><?php echo $row_featured['products_name'];?></h1>
 <?php if($lan==1){ for($i=0; $i<600; $i++){ echo $row_featured['products_description']{$i}; }}else{  for($i=0; $i<395; $i++){ echo $row_featured['products_description']{$i}; } }?><a href="<?php echo $domain;?>.index.php/page/<?php echo $row_featured['products_id'];?>/<?php echo $row_featured['products_name'];?>"> &nbsp; <?Php echo MORE;?>..... </a> 
    </div>
    <div class="info_box-2">
    <?php 
	$row_featured=mysql_fetch_array($featured);
	if($row_featured){
$image=$row_featured['products_image'];
if(!file_exists($image)){		
list($width, $height, $type, $w) = getimagesize($image);
if($width>290){
$p_width=(1-($width-290)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
//$image="../".$image;
}
}

?>
<h1><?php echo $row_featured['products_name'];?></h1>
 <?php if($lan==1){ for($i=0; $i<600; $i++){ echo $row_featured['products_description']{$i}; }}else{  for($i=0; $i<465; $i++){ if($row_featured['products_description']{$i}!=""){ echo $row_featured['products_description']{$i}; } }}?><a href="<?php echo $domain;?>.index.php/page/<?php echo $row_featured['products_id'];?>/<?php echo $row_featured['products_name'];?>"> &nbsp; <?Php echo MORE;?> ..... </a><?php }?></div>
 <?php $events=@mysql_query("select * from products_to_categories, products, products_description where products.products_id=products_description.products_id and products_description.language_id='$lan' and products_to_categories.categories_id='3' and products_to_categories.products_id=products.products_id order by products.products_id asc");
 
$rows_event=mysql_fetch_array($events);
 ?>
 
    <div class="info_box-3"><div class="title_"><?php echo NEWS_EVENT;?></div>
    <?php 
	 for($i=1; $i<=5; $i++){
	 
	 if($rows_event){
	 ?>
     <li><a href="<?php echo $domain;?>index.php/page/<?php echo $rows_event['products_id'];?>/<?php echo $rows_event['products_name'];?>"><?php echo $rows_event['products_name'];?></a></li>
     
     <?php }
	 $rows_event=mysql_fetch_array($events);
	 }?>
     
     <?php $video=@mysql_query("select * from video , video_description where video.video_id=video_description.video_id and video_description.language_id='$lan' and promote=1");
	 $row_video=mysql_fetch_array($video);
	 $image=$row_video['cover_image'];
		  
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
<div class="video_box" style="top:20px;"><a href="<?php echo $domian;?>index.php/show_video/<?php echo $row_video['video_id'];?>" target="_blank"><img src="<?php echo $domain.$image;?>" height="<?php echo $height;?>" width="<?php echo $width;?>"/></a><br />

<span style="width:220px; height:30px; position:relative; top:10px;"><?php echo $row_video['video_name'];?></span>
</div>
</div></div>
