<?php 
$r1=@mysql_query("select * from products_description, products where  products_description.products_id=products.products_id  and products_description.language_id='$lan' order by products.products_id desc");
if($_POST['chk']==1){
@mysql_query("update products set best='' "); 
$cate=array();
$cate=$_POST['pid'];
foreach ($cate as $products=>$value){
@mysql_query("update products set best=1 where products_id='$value' ");
echo "<script>alert('feature has been updated.');window.location='index.php'; </script>";

}

}
?>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
<tr>
    <td width="800" height="40" align="center" valign="middle" class="error"><?php if($_GET['msg']==1){ echo UPDATED_MSG; }?></td>
  </tr>
  <tr>
    <td height="30" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable--><?php $i=1;  $result=@mysql_query("select * from categories, categories_description where categories.categories_id=categories_description.categories_id and categories_description.language_id='$lan' order by categories.sort_order asc");
     	  while($row=mysql_fetch_array($result)){?>
      <tr <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>>
        <td width="25" height="30" valign="middle"><img src="images/folder.gif" width="16" height="16" /></td>
          <td width="472" valign="middle" class="text"><?php echo $row['categories_name']; ?></td>
          <td width="141" valign="middle" class="text"><a href="?content=product_management&id=<?php echo $row['categories_id']; ?>" target="_self"  class="left_nav"><?php echo PRODUCTS_MANAGMENT;?></a></td>
          <td width="161" valign="middle" class="text">
            <a href="?content=category_management&id=<?php echo $row['categories_id']; ?>" target="_self" class="left_nav">
          <?php echo CATEGORIES_MANAGEMENT;?></a></td>
        </tr><?php $i++; }?>
    </table></td>
  </tr>
  <tr>
    <td height="144">&nbsp;</td>
  </tr>
</table>

