<style type="text/css">
body{background:url(<?php echo $domain;?>images/bg1.jpg) no-repeat;
}

</style>
<?php 
$show_=@mysql_query("select * from video , video_description where video.video_id=video_description.video_id and video_description.language_id='$lan'");


?>
<div id="bg" style="background:none;"></div>
<div id="content" >
<h1><?php echo VIDEO;?></h1>


<?php 	
while($rows_show=mysql_fetch_array($show_)){	
$image=$rows_show['cover_image'];
		  
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
<div class="video_box"><a href="<?php echo $rows_show['video_link'];?>" target="_blank"><img src="<?php echo $domain.$image;?>" height="<?php echo $height;?>" width="<?php echo $width;?>"/></a>
<span style="width:220px; height:30px; position:relative; top:10px;"><?php echo $rows_show['video_name'];?></span>
</div>
   <?php }?>       
</div>
