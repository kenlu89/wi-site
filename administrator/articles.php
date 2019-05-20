<?php 
if($_GET['action']=="remove"){
$id=$_GET['id'];

if($id!=""){

@mysql_query("delete from article where products_id='$id'");
@mysql_query("delete from article_description where products_id='$id'");
header("?content=show_article&msg=1");
}
}
?>
<table width="800" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="788" height="31" align="right" valign="top"><a href="?content=new_article" target="_self" class="red_link"><?php echo NEW_PAGE;?></a></td>
  <td width="12">&nbsp;</td>
  </tr>
  <tr>
    <td height="22">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td height="24" colspan="2" valign="top">   
              <?php 
			  $r1=@mysql_query("select * from article, article_description where article.products_id=article_description.products_id and article_description.language_id='$lan'");
			  //echo mysql_num_rows($r1);
			  $i=1; while($row1=mysql_fetch_array($r1)){ ?>
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
                        <a href="?content=article_edit&id=<?php echo $row1['products_id']; ?>&parent=<?php echo $_GET['id'];?>" target="_self" class="left_nav">
                      <?php echo EDIT;?></a></td>
                      <td width="55" align="right" valign="middle">
                        <a  href="?content=articles&action=remove&id=<?php echo $row1['products_id']; ?>&parent=<?php echo $_GET['id'];?>" target="_self" class="left_nav" onclick="return comfirms()"><?php echo REMOVE;?></a></td>
                      <td width="85" align="center" valign="middle">
                        <a href="?content=show_article&id=<?php echo $_GET['id'];?>&ori=<?php echo $row1['products_id']; ?>&swap=<?php $down=@mysql_query("select * from products_to_categories, products where products.sort_order>".$row1['sort_order']." and products_to_categories.categories_id=".$_GET['id']." and products_to_categories.products_id=products.products_id order by products.products_id asc");  $row_down=mysql_fetch_array($down); echo $row_down['products_id']; ?>"  target="_self"><img src="images/down_arraow.png" width="10" height="10" /></a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="?content=show_article&id=<?php echo $_GET['id'];?>&ori=<?php echo $row1['products_id']; ?>&swap=<?php $down=@mysql_query("select * from products_to_categories, products where products.sort_order<".$row1['sort_order']." and products_to_categories.categories_id=".$_GET['id']." and products_to_categories.products_id=products.products_id order by products.products_id asc");  $row_down=mysql_fetch_array($down); echo $row_down['products_id']; ?>"  target="_self"><img src="images/up_arrow.png" width="10" height="10" /></a></td>
                    </tr>
                </table>
                <?php $i++; }?>	</td>
  </tr>
  <tr>
    <td height="323">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
</table>
