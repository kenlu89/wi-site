<?Php $photos=@mysql_query("select * from categories, categories_description where categories.categories_id=categories_description.categories_id");

?>
<table width="900" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td height="150" colspan="3" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="900" height="150" valign="top"><?php include("top.php"); ?></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td width="150" rowspan="3" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="150" height="521" valign="top"><?php include("left.php"); ?></td>
        </tr>
      <tr>
        <td height="264"></td>
        </tr>
    </table></td>
    <td width="10" height="304" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="10" height="304">&nbsp;</td>
        </tr>
    </table></td>
    <td width="740" rowspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="740" height="22" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
          <tr>
            <td width="740" height="22">&nbsp;</td>
              </tr>
        </table></td>
        </tr>
      <tr>
        <td height="30" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
          <tr>
            <td width="740" height="30">&nbsp;</td>
              </tr>
        </table></td>
        </tr>
      <tr>
        <td height="549" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
          <tr>
            <td width="175" height="250" valign="top">
			<?Php $row_photos=mysql_fetch_array($photos);
			$spec=@mysql_query("select * from i");
			$tmp="APPLE-RD.jpg";
			function createthumb($name,$filename,$new_w,$new_h){
			$system=explode('.',$name);
			if (preg_match('/jpg|jpeg/',$system[1])){
			$src_img=imagecreatefromjpeg($name);
			}
			if (preg_match('/png/',$system[1])){
			$src_img=imagecreatefrompng($name);
			}				
			$old_x=imageSX($src_img);
			$old_y=imageSY($src_img);
			if ($old_x > $old_y) {
			$thumb_w=$new_w;
			$thumb_h=$old_y*($new_h/$old_x);
			}
			if ($old_x < $old_y) {
			$thumb_w=$old_x*($new_w/$old_y);
			$thumb_h=$new_h;
			}
			if ($old_x == $old_y) {
			$thumb_w=$new_w;
			$thumb_h=$new_h;
			}
			$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
			imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 
			if (preg_match("/png/",$system[1]))
			{
			imagepng($dst_img,$filename); 
			} else {
			imagejpeg($dst_img,$filename); 
			}
			imagedestroy($dst_img); 
			imagedestroy($src_img); 
			}
			createthumb('tmp_name/1171945495-2007-02-18.jpg','thumbnail/tn_apple.jpg',100,100);
			?>
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable-->
              <tr>
                <td width="175" height="250">&nbsp;</td>
                    </tr>
            </table></td>
              <td width="565">&nbsp;</td>
          </tr>
          <tr>
            <td height="299">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          
          
          
        </table></td>
        </tr>
      <tr>
        <td height="50">&nbsp;</td>
        </tr>
      
      
      
    </table></td>
  </tr>
  <tr>
    <td height="347">&nbsp;</td>
  </tr>
  <tr>
    <td height="134">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  
  <tr>
    <td height="28">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="37" colspan="3" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="900" height="37">&nbsp;</td>
      </tr>
    </table>    </td>
  </tr>
  <tr>
    <td height="400"></td>
    <td></td>
    <td></td>
  </tr>
  

  
  
</table>
