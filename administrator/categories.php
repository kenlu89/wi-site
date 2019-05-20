<?php 
//@mysql_query("update products set sort_order=products_id");
$cate=$_GET['id'];



$ori=$_GET['ori'];
$swap=$_GET['swap'];
$swap_id=$_GET['swap_id'];
$parent_=$_GET['parent'];if($_GET['chk']==1){
if($ori!="" && $swap!="" && $id!="" && $swap_id!=""){
@mysql_query("update products set sort_order='$ori' where products_id='$swap_id'");
@mysql_query("update products set sort_order='$swap' where products_id='$id'");
header("Location: categories.php?id=$parent_");
}else{
header("Location: categories.php?id=$parent_");
}
}


if($cate!=""){
$r=@mysql_query("select * from categories, categories_description where categories.parent_id='$cate' and categories.categories_id=categories_description.categories_id and categories_description.language_id='$lan' order by categories.sort_order asc");
$r1=@mysql_query("select * from products_to_categories, products_description, products where products_to_categories.categories_id='$cate' and  products_description.products_id=products_to_categories.products_id and products_description.products_id=products.products_id and products_description.language_id='$lan' order by products.sort_order asc");

}else{
$r=@mysql_query("select * from categories, categories_description where categories.parent_id=0 and categories.categories_id=categories_description.categories_id and categories_description.language_id='$lan' order by categories.sort_order asc");
$r1=@mysql_query("select * from products_to_categories, products_description, products where products_to_categories.categories_id=0 and  products_description.products_id=products_to_categories.products_id and products_description.products_id=products.products_id and products_description.language_id='$lan' order by products.sort_order asc");
}
if($_GET['action']=="remove"){
$id=$_GET['id'];
if($id!=""){
@mysql_query("delete from products where products_id='$id'");
@mysql_query("delete from products_description where products_id='$id'");
@mysql_query("delete from products_to_categories where products_id='$id'");
header("location: ?content=categories&id=".$_GET['parent']);
}
}
?>
<script type="text/javascript">
function down(num){
var num1=document.getElementById(num+1).value
var num2=document.getElementById(num).value
document.location.href="?content=categories&id=<?php echo $cate; ?>&ori="+num2+"&swap="+num1
}
function up(num){
var num1=document.getElementById(num-1).value
var num2=document.getElementById(num).value
document.location.href="?content=categories&id=<?php echo $cate; ?>&ori="+num2+"&swap="+num1
}
</script>
<script type="text/javascript">
function comfirms()
  {
  var r=confirm("<?php echo WARNING;?>")
  if (r==true)
    {
return true;
    }
  else
    {
return false;
    }
  }
</script>
<table width="800" border="0" cellpadding="0" cellspacing="0" class="box">
          <!--DWLayoutTable-->
          <tr>
            <td height="20" colspan="3" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bar">
              <!--DWLayoutTable-->
              <tr>
                <td width="24" height="20" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      <td width="230" valign="middle" class="Heading_wh">
                      <?php if($cate!=""){
				$show_cate=@mysql_query("select * from categories_description where categories_id='$cate' and language_id='$lan'");
				$r_show_cate=mysql_fetch_array($show_cate);
				echo $r_show_cate['categories_name']; 
				}?>				</td>
                      <td width="141" align="center" valign="middle" class="Heading_wh"><?php echo DATE_ADDED;?></td>
                      <td width="126" align="center" valign="middle" class="Heading_wh"><?php echo DATE_EDITED;?></td>
                      <td width="98" align="center" valign="middle" class="Heading_wh"><?php echo DISCONTINUE;?></td>
                      <td width="89" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      <td width="86" align="center" valign="middle" class="Heading_wh"><?php echo SORT;?></td>
                    </tr>
              </table>            </td>
              </tr>
          <tr>
            <td height="102" colspan="3" valign="top">              <?php 
			$i=0;
			while($row=mysql_fetch_array($r)){
			
			?>
              <table width="100%" border="0" cellpadding="0" cellspacing="0" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>>
                <!--DWLayoutTable-->
                <tr>
                  <td width="23" height="24" valign="middle">
                    <a href="?content=categories&id=<?php echo $row['categories_id']; ?>" target="_self">
                      <img src="images/folder.gif" width="16" height="16" /></a></td>
                      <td width="231" valign="middle" class="text"><?php echo $row['categories_name']; ?></td>
                      <td width="141" valign="middle" class="text"><?php echo $row['date_added']; ?></td>
                      <td width="126" valign="middle"><?php echo $row['last_modified '];?></td>
                      <td width="102" align="center" valign="middle"> <!--DWLayoutTable-->&nbsp;</td>
                      <td width="31" valign="middle"><a href="?content=categories_edit&id=<?php echo  $row['categories_id']; ?>" target="_self" class="left_nav"><?php echo EDIT;?></a></td>
                      <td width="55" align="right" valign="middle"><a  href="categories_remove.php?id=<?php echo $row['categories_id']; ?>&parent=<?php echo $_GET['id'];?>" target="_self" class="left_nav" onclick="return comfirms()"><?PHP echo REMOVE;?></a></td>
                      <td width="85" align="center" valign="middle" class="text"><?php echo $row['sort_order']; ?></td>
                    </tr>
                </table>
              <?php $i++; }?>    
              <?php $i=1; while($row1=mysql_fetch_array($r1)){ ?>
              <table width="100%" border="0" cellpadding="0" cellspacing="0" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?> class="text">
                <!--DWLayoutTable-->
                <input type="hidden" name="<?php echo $i; ?>" value="<?php echo $row1['sort_order']; ?>"  id="<?php echo $i; ?>"/>
                <tr>
                  <td width="23" height="24" valign="middle">
                    <img src="images/preview.gif" width="16" height="16" /></td>
                      <td width="231" valign="middle" class="text"  ><?php echo $row1['products_name']; ?></td>
                      <td width="141" valign="middle" ><?php echo $row1['products_date_added']; ?></td>
                      <td width="126" valign="middle"  ><!--DWLayoutEmptyCell-->&nbsp;</td>
                      <td width="102" align="center" valign="middle"  ><input  disabled="disabled" type="checkbox" name="status" class="text" id="status" value="1"  <?php if($row1['wholesales']==1){ echo " checked='checked'"; }?> /></td>
                      <td width="31" valign="middle">
                        <a href="?content=products_edit&id=<?php echo $row1['products_id']; ?>&parent=<?php echo $_GET['id'];?>" target="_self" class="left_nav">
                      <?php echo EDIT;?></a></td>
                      <td width="55" align="right" valign="middle">
                        <a  href="?content=categories&action=remove&id=<?php echo $row1['products_id']; ?>&parent=<?php echo $_GET['id'];?>" target="_self" class="left_nav" onclick="return comfirms()">
                      <?PHP echo REMOVE;?></a></td>
                      <td width="85" align="center" valign="middle">
                       <a href="categories.php?id=<?php echo $row1['products_id'];?>&ori=<?php echo $row1['sort_order']; ?>&swap=<?php $down=@mysql_query("select * from  products_to_categories, products where products.sort_order>".$row1['sort_order']." and products_to_categories.categories_id='$cate' and products_to_categories.products_id=products.products_id order by products.sort_order asc");  $row_down=mysql_fetch_array($down); echo $row_down['sort_order']; ?>&swap_id=<?php echo $row_down['products_id'];?>&parent=<?php echo $cate; ?>&chk=1"  target="_self"><img src="images/down_arraow.png" width="10" height="10" /></a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="categories.php?id=<?php echo $row1['products_id'];?>&ori=<?php echo $row1['sort_order']; ?>&swap=<?php $down=@mysql_query("select * from  products_to_categories, products where products.sort_order>".$row1['sort_order']." and products_to_categories.categories_id='$cate' and products_to_categories.products_id=products.products_id order by sort_order desc");  $row_down=mysql_fetch_array($down); echo $row_down['sort_order']; ?>&swap_id=<?php echo $row_down['products_id'];?>&parent=<?php echo $cate; ?>&chk=1"  target="_self"><img src="images/up_arrow.png" width="10" height="10" /></a></td>
                    </tr>
                </table>
                <?php $i++; }?>		        </td>
              </tr>
          <tr>
            <td width="548" height="113">&nbsp;</td>
                <td width="130" valign="middle"><input type="button" class="text" value="<?php echo NEW_CATEGORY;?>"  onclick="window.location='?content=new_cate&id=<?php echo $_GET['id']; ?>'"/></td>
                <td width="120" align="center" valign="middle"><input type="button" class="text" value="<?php echo NEW_MEAL;?>"  onclick="window.location='?content=new_products&id=<?php echo $_GET['id']; ?>'"/></td>
  </tr>
          
          
          
          
          
          
          
          
          
        </table>
