<?php 
$r1=@mysql_query("select * from products_description, products where  products_description.products_id=products.products_id and products_description.language_id='$lan' order by products.products_id desc");


if($_POST['chk']==1){ 
@mysql_query("update products set featured='' "); 
$cate=array();
$cate=$_POST['pid'];
foreach ($cate as $products=>$value){
@mysql_query("update products set featured=1 where products_id='$value' ");
echo "<script>alert('feature has been updated.');window.location='index.php'; </script>";

}
}
?>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  
 <form name="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>"  enctype="multipart/form-data" method="post">
 <input  type="hidden" name="chk" value="1" />
 
  <tr>
    <td width="68" height="19">&nbsp;</td>
    <td width="316">&nbsp;</td>
    <td width="319">&nbsp;</td>
    <td width="45">&nbsp;</td>
    <td width="52">&nbsp;</td>
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td colspan="3" valign="middle" class="mtext"><?php echo SPECIAL_MSG;?></td>
    <td>&nbsp;</td>
  </tr>
  
  
  
  <tr>
    <td height="116">&nbsp;</td>
    <td colspan="2" valign="top"><table width="635" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <?php while($rows=mysql_fetch_array($r1)){?>
      <tr>
        <td width="115" height="106" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable--><?php if($rows['products_id']){?>
          <tr>
            <td width="115" height="76" align="center" valign="top">
              <?php
            
			$image="../".$rows['products_image']; 
if(file_exists($image)){		
list($width, $height, $type, $w) = getimagesize($image);
if($width>115){
$p_width=(1-($width-115)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
}
}else{
$image="images/no-image.png";
}
			
			?><img src="<?php echo $image;?>" width="<?php echo $width;?>" height="<?php echo $height;?>" />            </td>
            </tr>
          <tr>
            <td height="30" align="center" valign="middle" class="text">
              <input type="checkbox" name="pid[]" value="<?php echo $rows['products_id']; ?>"<?php if($rows['featured']==1){ echo  "checked='checked'"; } ?> /><?php echo $rows['products_name'];?><br />
<br /></td>
            </tr><?php }?>
          </table>        </td>
            <td width="15" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable-->
              <tr>
                <td width="15" height="106">&nbsp;</td>
                </tr>
            </table></td>
            <td width="115" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable--><?php  $rows=mysql_fetch_array($r1); if($rows['products_id']){?>
              <tr>
                <td width="115" height="76" align="center" valign="top">
                  <?php
           
			$image="../".$rows['products_image']; 
if(file_exists($image)){		
list($width, $height, $type, $w) = getimagesize($image);
if($width>115){
$p_width=(1-($width-115)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
}
}else{
$image="images/no-image.png";
}
			
			?><img src="<?php echo $image;?>" width="<?php echo $width;?>" height="<?php echo $height;?>" />            </td>
            </tr>
              <tr>
                <td height="30" align="center" valign="middle" class="text">
                  <input type="checkbox" name="pid[]" value="<?php echo $rows['products_id']; ?>"<?php if($rows['featured']==1){ echo  "checked='checked'"; } ?> />
                  <?php echo $rows['products_name'];?><br />
<br /></td>
            </tr><?php }?>
            </table></td>
            <td width="15" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable-->
              <tr>
                <td width="15" height="106">&nbsp;</td>
                </tr>
            </table></td>
            <td width="115" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable--><?php  $rows=mysql_fetch_array($r1); if($rows['products_id']){?>
              <tr>
                <td width="115" height="76" align="center" valign="top">
                  <?php
			$image="../".$rows['products_image']; 
if(file_exists($image)){		
list($width, $height, $type, $w) = getimagesize($image);
if($width>115){
$p_width=(1-($width-115)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
}
}else{
$image="images/no-image.png";
}
			
			?><img src="<?php echo $image;?>" width="<?php echo $width;?>" height="<?php echo $height;?>" />            </td>
            </tr>
              <tr>
                <td height="30" align="center" valign="middle" class="text">
                  <input type="checkbox" name="pid[]" value="<?php echo $rows['products_id']; ?>"<?php if($rows['featured']==1){ echo  "checked='checked'"; } ?> />
                  <?php echo $rows['products_name'];?><br />
<br /></td>
            </tr><?php }?>
            </table></td>
            <td width="15" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable-->
              <tr>
                <td width="15" height="106">&nbsp;</td>
                </tr>
            </table></td>
            <td width="115" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable--><?php  $rows=mysql_fetch_array($r1); if($rows['products_id']){?>
              <tr>
                <td width="115" height="76" align="center" valign="top">
                  <?php
			$image="../".$rows['products_image']; 
if(file_exists($image)){		
list($width, $height, $type, $w) = getimagesize($image);
if($width>115){
$p_width=(1-($width-115)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
}
}else{
$image="images/no-image.png";
}
			
			?><img src="<?php echo $image;?>" width="<?php echo $width;?>" height="<?php echo $height;?>" />            </td>
            </tr>
              <tr>
                <td height="30" align="center" valign="middle" class="text">
                  <input type="checkbox" name="pid[]" value="<?php echo $rows['products_id']; ?>"<?php if($rows['featured']==1){ echo  "checked='checked'"; } ?> />
                  <?php echo $rows['products_name'];?><br />
<br /></td>
            </tr><?php }?>
            </table></td>
            <td width="15">&nbsp;</td>
            <td width="115" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable--><?php     $rows=mysql_fetch_array($r1); if($rows['products_id']){?>
              <tr>
                <td width="115" height="76" align="center" valign="top">
                  <?php
         
			 $image="../".$rows['products_image']; 
if(file_exists($image)){		
list($width, $height, $type, $w) = getimagesize($image);
if($width>115){
$p_width=(1-($width-115)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
}
}else{
$image="";
}
			
			?><img src="<?php echo $image;?>" width="<?php echo $width;?>" height="<?php echo $height;?>" />            </td>
            </tr>
              <tr>
                <td height="30" align="center" valign="middle" class="text">
                  <input type="checkbox" name="pid[]" value="<?php echo $rows['products_id']; ?>"<?php if($rows['featured']==1){ echo  "checked='checked'"; } ?> />
                  <?php echo $rows['products_name'];?><br />
<br /></td>
            </tr><?php }?>
            </table></td>
          </tr>
      
      
      <?php }?>
    </table></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="42">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  
  <tr>
    <td height="40"></td>
    <td valign="bottom"><input name="submit" type="submit" class="stext" value="<?php echo UPDATE;?>" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="112">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
