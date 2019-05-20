<?php 

$r=@mysql_query("select * from categories_description, categories where categories.categories_id=".$_GET['id']." and categories.categories_id=categories_description.categories_id and categories_description.language_id=1");
$row=mysql_fetch_array($r);

?>
<table width="800" border="0" cellpadding="0" cellspacing="0" class="text">
            <!--DWLayoutTable-->
            <form action="cate_edit_pro.php" enctype="multipart/form-data"  method="post">
              <input type="hidden"  name="cate_id" value="<?php echo $_GET['id']; ?>" />
              <tr>
                <td height="24" colspan="4" align="center" valign="middle" class="Heading_wh"><?php echo EDIT_CATEGORY;?></td>
              </tr>
              <tr>
                <td width="29" height="24"></td>
                  <td colspan="2" align="center" valign="middle" class="text"><?php echo CATEGORY_MSG;?></td>
                  <td width="22"></td>
              </tr>
              <tr>
                <td height="300"></td>
                  <td width="364" rowspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="text">
                      <!--DWLayoutTable-->
                      <tr>
                        <td width="10" height="16">&nbsp;</td>
                        <td width="140">&nbsp;</td>
                        <td width="36">&nbsp;</td>
                        <td width="219">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="24">&nbsp;</td>
                        <td colspan="3" valign="middle" class="Heading"><?php echo NEW_CATEGORY;?></td>
                      </tr>
                      <tr>
                        <td height="24">&nbsp;</td>
                        <td colspan="3" valign="middle"><input name="cate" type="text" class="text" size="35"  value="<?php echo $row['categories_name']; ?>"/></td>
                      </tr>
                      <tr>
                        <td height="12"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>

                      <tr>
                        <td height="24"></td>
                        <td colspan="3" valign="middle" class="Heading"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="24"></td>
                        <td colspan="3" valign="middle" class="Heading"><?php echo CHINESE_CATE_NAME;?></td>
                      </tr>
                      
                      
                      <tr>
                        <td height="24">&nbsp;</td>
    <?php 
#load categories description in Chinese 
$lang2=@mysql_query("select * from categories_description where categories_id=".$_GET['id']." and language_id=3");
$row_lang=mysql_fetch_array($lang2);

?>		
                        <td colspan="3" valign="middle"><input name="cate2" type="text" class="text" size="35"  value="<?php echo $row_lang['categories_name']; ?>"/></td>
                      </tr>
                      
                      
                      <tr>
                        <td height="16">&nbsp;</td>
                        <td colspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      </tr>
                      
                      <tr>
                        <td height="24">&nbsp;</td>
                        <td colspan="3" valign="middle" class="Heading"><?php echo IMAGE;?></td>
                      </tr>
                      
                      <tr>
                        <td height="24">&nbsp;</td>
                        <td colspan="3" valign="middle"><input  type="file" name="file" class="text" /></td>
                      </tr>
                      
                      <tr>
                        <td height="24">&nbsp;</td>
                        <td colspan="3" valign="middle" class="Heading"><?php echo SORT_ORDER;?></td>
                      </tr>
                      <tr>
                        <td height="24">&nbsp;</td>
                        <td colspan="3" valign="middle"><input type="text" name="sorts" class="text"  size="10"  value="<?php echo $row['sort_order']; ?>"/></td>
                      </tr>
                      <tr>
                        <td height="16">&nbsp;</td>
                        <td colspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="27">&nbsp;</td>
                        <td colspan="3" valign="middle"><input type="radio" name="cate_type" value="1" <?php if($row['status']==1){ echo "checked='checked'"; }?>/><?php echo ACTIVE;?> &nbsp; <input type="radio" name="cate_type" value="2" <?php if($row['status']==2){ echo "checked='checked'"; }?>/><?php echo INACTIVE;?>  
                        
                        <input type="checkbox" name="promote" class="text" <?php if($row['promote']==1){ echo "checked=\"checked\"";  }?>  value="1"/> <?php echo PROMOTE; 	?> &nbsp; &nbsp; &nbsp; <input type="checkbox" name="special" class="text" <?php if($row['special']==1){ echo "checked=\"checked\"";  }?>  value="1"/> <?php echo SPECIAL; 	?>                        </td>
                      </tr>
                      <tr>
                        <td height="27">&nbsp;</td>
                        <td colspan="3" valign="middle" class="Heading">
                        <select name="gallery_" class="text" id="gallery_">
                        <option value="">--- <?Php echo SELECT;?> ---</option>
                        <?php 
						$album=@mysql_query("select * from album_description where language_id='$lan' order by album_id desc");
						while($row_album=mysql_fetch_array($album)){
						?>
                        <option value="<?php echo $row_album['album_id'];?>"><?php echo $row_album['album_name'];?></option>
                        <?php 
						
						}
						?>
                        </select>
                        </td>
                    </tr>
                      <tr>
                        <td height="27">&nbsp;</td>
                        <td valign="middle" class="Heading"><!--DWLayoutEmptyCell-->&nbsp;</td>
                        <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="30">&nbsp;</td>
                        <td colspan="2" valign="top"><input type="submit" value="<?php echo UPDATE;?>"  class="text"/></td>
                        <td valign="top"><input type="reset" value="<?php echo RESET;?>"  class="text"/></td>
                      </tr>
                      <tr>
                        <td height="15">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      

                      
                </table></td>
                  <td width="304" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <!--DWLayoutTable-->
                      <tr>
                        <td width="338" height="16">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="24" valign="middle" class="Heading"><?Php echo CURRENT_IMAGE;?></td>
                      </tr>
                      
                      <?php 
$image="../".$row['categories_image'];
				  
if(!file_exists($row['categories_image'])){		
$image=DEFAULT_;
$height=280;
$width=280;
}else{
list($width, $height, $type, $w) = getimagesize($image);
if($width>300){
$p_width=(1-($width-300)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
}

}
?>
                 
                      <tr>
                        <td height="259" align="right" valign="top"> <img src="<?php echo $image; ?>" width="<?php echo $width; ?>" height="<?php echo $height;?>"  alt="<?php echo $rows['categories_name'];?>" class="gray_box"></td>
                      </tr>
                      
                </table></td>
                  <td></td>
              </tr>
              <tr>
                <td height="24"></td>
                  <td></td>
                  <td></td>
              </tr>
              
              
              
              
              
              
              
              
              
              
              
              
              
  </form>
                              
          
</table>

