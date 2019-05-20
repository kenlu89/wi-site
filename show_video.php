<?php 
$show_=@mysql_query("select * from video , video_description where video.video_id=video_description.video_id and video_description.language_id='$lan' and video.video_id='$id'");

$row_video=mysql_fetch_array($show_);
?>

<div id="bg" style="background:url(<?php echo $domain;?>images/bg.jpg) no-repeat top center;"></div>
<div id="content" >
<h1><?php echo $row_video['video_name'];?></h1><center>
<iframe width="640" height="500" src="<?php echo $row_video['video_link'];?>" frameborder="0" allowfullscreen align="middle"></iframe></center>
</div>