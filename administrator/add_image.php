<?php
//include("includes/config.php");

 $color=$_POST['color'];
 $current=$_POST['current']; 
 $ids=$_GET['id']; 

$assort=$_GET['assort'];
if($assort!=""){
if($assort=="asc"){
$assort=" order by products_id asc ";	
}else{
$assort=" order by products_id desc ";		
}
}

?>
<script type="text/javascript">
function p_id(){
var ids=document.getElementById("prodcuts_id").value
document.location.href='?content=add_image&id='+ids;

}
</script>

<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  
 <form name="form1" action="add_image_pro.php"  enctype="multipart/form-data" method="post">
 <input  type="hidden" name="current" value="<?php echo $ids; ?>" />

  
  
  <tr>
    <td width="76" height="17">&nbsp;</td>
    <td width="107">&nbsp;</td>
    <td width="447">&nbsp;</td>
    <td width="110">&nbsp;</td>
    </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td colspan="3" valign="middle" class="red_bold"><?php echo TXT_1;?></td>
    </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td valign="middle" class="text"><?php echo ITEM_NUM;?></td>
    <td valign="middle" class="style4">
	  <select  name="products_id"  class="stext" id="prodcuts_id" onChange="p_id();">
	    <option value="">-----------</option>
	    <?php 
	$all=@mysql_query("select * from products_description where language_id='$lan' ".$assort);
	while($all_row=mysql_fetch_array($all)){
	?>
	    <option value="<?php echo $all_row['products_id']; ?>" <?php if($ids==$all_row['products_id']){ echo "selected='selected'"; }?>><?php echo $all_row['products_name']; ?></option>
	    <?php 
	}
	?>
        </select>	&nbsp; &nbsp; <a href="?content=add_image&id=<?php echo $id;?>&assort=asc" class="red_link"><?php echo ASCENDING;?></a>  &nbsp; | &nbsp;  <a href="?content=add_image&id=<?php echo $id;?>&assort=desc" class="red_link"><?php echo DESCENDING;?></a></td>
    <td>&nbsp;</td>
    </tr>
  
  <tr>
    <td height="16"></td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>

  <tr>
    <td height="30"></td>
    <td valign="middle" class="text"><?php echo OPTIONAL_IMAGE;?></td>
    <td valign="middle"><input  type="file" name="file" class="text" /></td>
    <td>&nbsp;</td>
    </tr>
  
  <tr>
    <td height="20"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="40"></td>
    <td colspan="3" valign="bottom"><input type="submit" name="submit" value="<?php echo SUBMIT;?>" /></td>
    </tr>
  <tr>
    <td height="17">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="20"></td>
    <td colspan="3" valign="middle" class="bar"><span class="Heading">&nbsp; <?php echo EXISTING_IMAGE;?></span></td>
    </tr>
  <tr>
    <td height="5"></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  
  
  <tr>
    <td height="24" colspan="4" valign="top">
	  <table width="100%" border="0" cellpadding="0" cellspacing="0">
	    <!--DWLayoutTable-->
	    <?php $pull_pid=@mysql_query("select * from images where parent_id='$ids' order by ids asc");
	  while($row_pull=mysql_fetch_array($pull_pid)){
	  
	  
	  ?>
	    <tr>
	      <td width="100" height="24">&nbsp;</td>
            <td width="191" valign="middle" class="text">
            <?php 
$image="../".$row_pull['thumbnail'];
if(file_exists($image)){		
list($width, $height, $type, $w) = getimagesize($image);
if($width>120){
$p_width=(1-($width-120)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
}
}
			?>
		<a href="../<?php echo $row_pull['image']; ?> " target="_blank">
			<img src="../<?php echo $row_pull['thumbnail']; ?>"  style="margin-bottom:5px;" width="<?php echo $width;?>" height="<?php echo $height;?>" / ></a></td>
          <td width="134" valign="middle" class="text">
		    <a href="image_remove.php?id=<?php echo $row_pull['ids']; ?>&parent_id=<?php echo $row_pull['parent_id']; ?>" target="_self" class="left_nav"><?php echo REMOVE;?></a></td>
	      <td width="373">&nbsp;</td>
	    </tr>
  <?php }?>
        </table></td>
  </tr>
  <tr>
    <td height="68">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>

  </form>
</table>

