<?php 

$cate=$_GET['id'];
$r1=@mysql_query("select * from categories, categories_description where categories.parent_id='$cate' and categories.categories_id=categories_description.categories_id order by categories.sort_order asc");
if($_POST['chk']==1){
$parent=$_POST['parent'];
@mysql_query("delete  from categories where categories_id='$parent'"); 
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
  
 <form name="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>"  enctype="multipart/form-data" method="post">
 <input  type="hidden" name="chk" value="1" />
 <input   type="hidden" name="parent" value="<?php echo $_GET['id']; ?>" />
  <tr>
    <td width="68" height="19">&nbsp;</td>
    <td width="316">&nbsp;</td>
    <td width="364">&nbsp;</td>
    <td width="52">&nbsp;</td>
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td colspan="2" valign="middle" class="mtext"><?php echo EDIT_MSG;?></td>
    <td>&nbsp;</td>
  </tr>
  
  
  
  <tr>
    <td height="24">&nbsp;</td>
    <td colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="mtext">
      <!--DWLayoutTable-->
      <?php while($rows=mysql_fetch_array($r1)){ ?>
      <tr>
        <td width="170" height="24" valign="middle"><?php if($rows['categories_id']){ ?>
            <input type="checkbox" class="text" name="pid[]"<?php if($rows['categories_id']==$cate){ echo  "checked='checked'"; } ?>  value="<?php echo $rows['products_id']; ?>" />
          <?php echo $rows['categories_name']; $rows=mysql_fetch_array($r1);?>          <?php }?></td>
      <td width="170" valign="middle"><?php if($rows['categories_id']){ ?>
          <input type="checkbox" class="text" name="pid[]"<?php if($rows['categories_id']==$cate){ echo  "checked='checked'"; } ?> value="<?php echo $rows['products_id']; ?>" />        <?php echo $rows['categories_name']; $rows=mysql_fetch_array($r1); }?></td>
      <td width="170" valign="middle"><?php if($rows['categories_id']){ ?>
          <input type="checkbox" class="text" name="pid[]" <?php if($rows['categories_id']==$cate){ echo  "checked='checked'"; } ?> value="<?php echo $rows['products_id']; ?>"/>        <?php echo $rows['categories_name']; $rows=mysql_fetch_array($r1); }?></td>
      <td width="170" valign="middle"><?php if($rows['categories_id']){ ?>
          <input type="checkbox" class="text" name="pid[]" <?php if($rows['categories_id']==$cate){ echo  "checked='checked'"; } ?> value="<?php echo $rows['products_id']; ?>"/>        <?php echo $rows['categories_name']; $rows=mysql_fetch_array($r1); }?></td>
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
    <td valign="bottom"><input name="submit" type="submit" class="mtext" value="Submit" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="119">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
