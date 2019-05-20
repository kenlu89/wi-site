<?PHP 
$all_pic=@mysql_query("select * from pic where parent_id='$id'");


while($show_pic=mysql_fetch_array($all_pic)){
?>
<table width="120" border="0" cellpadding="0" cellspacing="0"  style="float:left; margin-left:10px;">
  <!--DWLayoutTable-->
  <tr>
    <td height="106" valign="top"><?php 
$image="../".$show_pic['thumb'];
				  
if(!file_exists($image)){		
$image=DEFAULT_;
$height=120;
$width=120;
}else{
list($width, $height, $type, $w) = getimagesize($image);
if($width>120){
$p_width=(1-($width-120)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
}

}


?>      <img src="<?php echo $image; ?>" width="<?php echo $width; ?>" height="<?php echo $height;?>" class="gray_box">	</td>
  </tr>
  <tr>
    <td height="30" align="center" valign="middle"><a href="?content=add_picture&action=remove&id=<?php echo $show_pic['image_id'];?>&parent=<?php echo $_GET['id'];?>" target="_self" onClick="return confirms();" class="red_link"><?php echo REMOVE;?></a></td>
  </tr>
  <tr>
    <td height="19" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr></table>
  <?Php }?>