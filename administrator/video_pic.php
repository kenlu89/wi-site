<table width="180" border="0" cellpadding="0" cellspacing="0"  style="float:left; margin-left:10px;">
  <!--DWLayoutTable-->
  <tr>
    <td width="180" height="30" align="center" valign="middle" class="bar"><?php echo $rows_show['video_name'];?> </td>
  </tr>
  <tr>
    <td height="106" valign="top"><?php 
$image="../".$rows_show['cover_image'];
				  
if(!file_exists($image)){		
$image=DEFAULT_;
$height=180;
$width=180;
}else{
list($width, $height, $type, $w) = getimagesize($image);
if($width>180){
$p_width=(1-($width-180)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
//$image="../".$image;
}

}
?>
          
          <img src="<?php echo $image;?>" height="<?php echo $height;?>" width="<?php echo $width;?>" class="box" />
    </td>
  </tr>
  <tr>
    <td height="30" align="center" valign="middle">
    <a href="?content=show_video&action=remove&id=<?php echo $rows_show['video_id'];?>" target="_self" onClick="return confirms();" class="red_link"><?php echo REMOVE;?></a>   |   
    <a href="?content=edit_video&action=remove&id=<?php echo $rows_show['video_id'];?>" target="_self" class="red_link"><?php echo EDIT;?></a> |
    
    <?php if($rows_show['promote']==1){ ?>
    <a href="?content=show_video&action=cancel&id=<?php echo $rows_show['video_id'];?>" target="_self" class="red_link"><?php echo PROMOTE_CANCEL;?></a> 
<?php }else{?>
     <a href="?content=show_video&action=promot&id=<?php echo $rows_show['video_id'];?>" target="_self" class="red_link"><?php echo PROMOTE;?></a> 
     <?php }?>
    </td>
  </tr>
  <tr>
    <td height="19" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr></table>