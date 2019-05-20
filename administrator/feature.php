<?php 
$id=$_GET['id'];
if($id==""){
$id=$_POST['id'];
}

$r1=@mysql_query("select * from products_description, products, products_to_categories where  products_to_categories.products_id=products_description.products_id and   products_description.products_id=products.products_id  and products_description.language_id='$lan'  order by products.products_id desc");

if($_POST['chk']==1){ 
@mysql_query("update products set featured=''"); 
$cate=array();

$cate=$_POST['pid'];
foreach ($cate as $products=>$value){
@mysql_query("update products set featured=1 where products_id='$value'");

}
header("location: ?content=feature&id=$id&msg=1");
}
 
if($lan=3){
$default="images/default_ch.png";
}else{
$default="images/default_en.png";
}
?>

<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  
 <form name="form1" action="?content=feature"  enctype="multipart/form-data" method="post">
 <input  type="hidden" name="chk" value="1" /><input type="hidden" name="id" value="<?php echo $id;?>" />
  <tr>
    <td width="43" height="18"></td>
    <td width="360"></td>
    <td width="358"></td>
    <td width="39"></td>
  </tr>
  <tr>
    <td height="36"></td>
    <td colspan="2" valign="middle" class="Heading"><?php echo MSG1;?><br />
<span class="error"><?php if($_GET['msg']==1){ echo DONE_MSG; }?></span></td>
    <td></td>
  </tr>
  

  
  <tr>
    <td height="25">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr> <?php while($rows=mysql_fetch_array($r1)){?>
  <tr>
    <td height="24">&nbsp;</td>
    <td valign="middle"><input type="checkbox" name="pid[]" value="<?php echo $rows['products_id']; ?>"<?php if($rows['featured']==1){ echo  "checked='checked'"; } ?> />      <?php echo $rows['products_name'];?></td>
    <td valign="middle"><?php $rows=mysql_fetch_array($r1); if($rows){ ?><input type="checkbox" name="pid[]" value="<?php echo $rows['products_id']; ?>"<?php if($rows['featured']==1){ echo  "checked='checked'"; } ?> />      <?php echo $rows['products_name']; }?></td>
    <td>&nbsp;</td>
  </tr><?php }?>
  <tr>
    <td height="57">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>  
 
  
  
  
  
  

  <tr>
    <td height="40">&nbsp;</td>
    <td colspan="3" valign="bottom"><input name="submit" type="submit" class="text" value="update" /></td>
    </tr>
  <tr>
    <td height="105">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
