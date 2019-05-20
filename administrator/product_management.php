<?php 
$cate=$_GET['id'];
$r1=@mysql_query("select * from  products_description, products where products_description.products_id=products.products_id and products_description.language_id='$lan' order by products.products_id desc");

if($_POST['chk']==1){
$parent=$_POST['parent'];
@mysql_query("delete  from products_to_categories where categories_id='$parent'"); 
$cate1=array();
$cate1=$_POST['pid'];
foreach ($cate1 as $products=>$value){
@mysql_query("insert into  products_to_categories(categories_id, products_id) values('$parent', '$value')");
header("Location: ?content=categories_management&msg=1");

}
}
?>

<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  
 <form name="form1" action="?content=product_management"  enctype="multipart/form-data" method="post">
 <input  type="hidden" name="chk" value="1" />
 <input   type="hidden" name="parent" value="<?php echo $_GET['id']; ?>" />
 
  <tr>
    <td width="68" height="17">&nbsp;</td>
    <td width="316">&nbsp;</td>
    <td width="364">&nbsp;</td>
    <td width="52">&nbsp;</td>
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td colspan="2" valign="middle" class="text"><?php echo ADD_EDIT;?></td>
    <td>&nbsp;</td>
  </tr>
  
  
  
  <tr>
    <td height="24">&nbsp;</td>
    <td colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="text">
      <!--DWLayoutTable-->
      <?php while($rows=mysql_fetch_array($r1)){ ?>
      <tr>
        <td width="170" height="62" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
          <tr>
            <td width="170" height="24" valign="middle"><?php if($rows['products_id']){ ?>
              
              <?php
		$image="../".$rows['products_image'];
				  
if(!file_exists($image) || $rows['products_image']==""){		
$image=DEFAULT_;
$height=160;
$width=160;
}else{
list($width, $height, $type, $w) = getimagesize($image);
if($width>160){
$p_width=(1-($width-160)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
//$image="../".$image;
}

}

?> <img src="<?php echo $image;?>" height="<?php echo $height;?>" width="<?php echo $width;?>" /></td>
        </tr>
          <tr>
            <td height="38" valign="middle">
<input type="checkbox" class="text" name="pid[]"<?php  $chk_cate=""; $chk_cate=@mysql_query("select * from products_to_categories where products_id=".$rows['products_id']); $row_cate=mysql_fetch_array($chk_cate); if($row_cate['categories_id']==$cate){ echo  "checked='checked'"; } ?>  value="<?php echo $rows['products_id']; ?>" />
             
              <?php 
		
		 echo $rows['products_name']; $rows=mysql_fetch_array($r1);?>              <?php }?></td>
    </tr>
          <tr>
            <td height="38" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
          </tr>
        </table>        </td>
        <td width="170" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
          <tr>
            <td width="170" height="24" valign="middle"><?php if($rows['products_id']){ ?>
              
              <?php
		$image="../".$rows['products_image'];
				  
if(!file_exists($image) || $rows['products_image']==""){	
$image=DEFAULT_;
$height=160;
$width=160;
}else{
list($width, $height, $type, $w) = getimagesize($image);
if($width>160){
$p_width=(1-($width-160)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
//$image="../".$image;
}

}
?> <img src="<?php echo $image;?>" height="<?php echo $height;?>" width="<?php echo $width;?>" /></td>
        </tr>
          <tr>
            <td height="38" valign="middle">
<input type="checkbox" class="text" name="pid[]"<?php  $chk_cate=""; $chk_cate=@mysql_query("select * from products_to_categories where products_id=".$rows['products_id']); $row_cate=mysql_fetch_array($chk_cate); if($row_cate['categories_id']==$cate){ echo  "checked='checked'"; } ?>  value="<?php echo $rows['products_id']; ?>" />
             
              <?php 
		
		 echo $rows['products_name']; $rows=mysql_fetch_array($r1);?>              <?php }?></td>
    </tr>
          <tr>
            <td height="38" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
          </tr>
        </table>        </td>
        <td width="170" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
          <tr>
            <td width="170" height="24" valign="middle"><?php if($rows['products_id']){ ?>
              
              <?php
		$image="../".$rows['products_image'];
				  
if(!file_exists($image) || $rows['products_image']==""){
$image=DEFAULT_;
$height=160;
$width=160;
}else{
list($width, $height, $type, $w) = getimagesize($image);
if($width>160){
$p_width=(1-($width-160)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
//$image="../".$image;
}

}
?> <img src="<?php echo $image;?>" height="<?php echo $height;?>" width="<?php echo $width;?>" /></td>
        </tr>
          <tr>
            <td height="38" valign="middle">
<input type="checkbox" class="text" name="pid[]"<?php  $chk_cate=""; $chk_cate=@mysql_query("select * from products_to_categories where products_id=".$rows['products_id']); $row_cate=mysql_fetch_array($chk_cate); if($row_cate['categories_id']==$cate){ echo  "checked='checked'"; } ?>  value="<?php echo $rows['products_id']; ?>" />
             
              <?php 
		
		 echo $rows['products_name']; $rows=mysql_fetch_array($r1);?>              <?php }?></td>
    </tr>
          <tr>
            <td height="38" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
          </tr>
        </table>        </td>
        <td width="170" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
          <tr>
            <td width="170" height="24" valign="middle"><?php if($rows['products_id']){ ?>
              
              <?php
		$image="../".$rows['products_image'];
				  
if(!file_exists($image) || $rows['products_image']==""){	
$image=DEFAULT_;
$height=160;
$width=160;
}else{
list($width, $height, $type, $w) = getimagesize($image);
if($width>160){
$p_width=(1-($width-160)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
//$image="../".$image;
}

}
?> <img src="<?php echo $image;?>" height="<?php echo $height;?>" width="<?php echo $width;?>" /></td>
        </tr>
          <tr>
            <td height="38" valign="middle">
<input type="checkbox" class="text" name="pid[]"<?php  $chk_cate=""; $chk_cate=@mysql_query("select * from products_to_categories where products_id=".$rows['products_id']); $row_cate=mysql_fetch_array($chk_cate); if($row_cate['categories_id']==$cate){ echo  "checked='checked'"; } ?>  value="<?php echo $rows['products_id']; ?>" />
             
              <?php 
		
		 echo $rows['products_name']; $rows=mysql_fetch_array($r1);?>              <?php }?></td>
    </tr>
          <tr>
            <td height="38" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
          </tr>
        </table>
        </td>
      </tr>
      <?php }?>
    </table>    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="42">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td height="40"></td>
    <td valign="bottom"><input name="submit" type="submit" class="mtext" value="<?php echo SUBMIT;?>" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="102">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
