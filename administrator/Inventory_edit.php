<?php 
$ids=$_GET['id']; 
$r=@mysql_query("select * from products, products_description where products.products_id='$ids' and products.products_id=products_description.products_id");
$row=mysql_fetch_array($r);

if($_POST['chk']==1){
 $ids=$_POST['ids']; 
 $qty=$_POST['qty'];
 $price=$_POST['price'];
 $chk=$_POST['wholesales'];
 $stats=$_POST['status'];		
@mysql_query("update products set products_quantity='$qty', products_price='$price', wholesales='$chk' , products_status='$stats' where products_id='$ids'");
header("Location: ?content=Inventory&msg=1");
}
?>
<link   href="style_sheet.css" type="text/css"  rel="stylesheet" />
<style type="text/css">
<!--
.style1 {
	font-size: 12px;
	font-weight: bold;
	color: #FFFFFF;
}
.style2 {
	color: #333333;
	font-size: 12px;
	font-weight: bold;
}
-->
</style>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <form action="?content=Inventory_edit" method="post" enctype="multipart/form-data" name="form1">
  <input type="hidden" name="chk" value="1">
  <input type="hidden" name="ids" value="<?php echo $ids; ?>" />

  <tr>
    <td width="800" height="18"></td>
    </tr>
  <tr>
    <td height="20" align="center" valign="middle" class="bar"><?php echo $row['products_name']; ?></td>
  </tr>
  
  
  <tr>
    <td height="171" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="box">
      <!--DWLayoutTable-->
      <tr>
        <td width="17" height="19">&nbsp;</td>
            <td width="248">&nbsp;</td>
        <td width="204">&nbsp;</td>
        <td width="20">&nbsp;</td>
        <td width="58">&nbsp;</td>
        <td width="20">&nbsp;</td>
        <td width="74">&nbsp;</td>
        <td width="138">&nbsp;</td>
        <td width="19">&nbsp;</td>
          </tr>
      <tr>
        <td height="18"></td>
            <td colspan="7" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bar_gray">
              <!--DWLayoutTable-->
              <tr>
                <td width="248" height="18" valign="middle"><?php echo QTY;?></td>
            <td width="204" valign="middle"><?php echo PRICE;?></td>
            <td width="172" align="center" valign="middle"><?php echo STATS;?></td>
            <td width="138" align="center" valign="middle"><?php echo DISCONTINUE;?></td>
          </tr>
              
            </table></td>
          <td></td>
          </tr>
      <tr>
        <td height="6"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
      
      
      
      
      
      
      
      <tr>
        <td height="24">&nbsp;</td>
            <td valign="middle"><input type="text"  name="qty" value="<?php echo $row['products_quantity']; ?>" /></td>
        <td valign="middle"><input type="text"  name="price" value="<?php echo $row['products_price']; ?>" /></td>
        <td valign="middle"><input type="radio"  name="status" <?php if($row['products_status']==1){ echo "checked='checked'"; } ?>value="1"  class="text" /></td>
        <td valign="middle" class="text"><?Php echo INSTOCK; ?></td>
        <td valign="middle" class="text"><input type="radio"  name="status" <?php if($row['products_status']==0){ echo "checked='checked'"; } ?>value="0"  class="text" /></td>
        <td valign="middle" class="text"><?php echo OUTSTOCK; ?></td>
        <td colspan="2" align="center" valign="middle"><input type="checkbox" name="wholesales" value="1" <?php if($row['wholesales']==1){ echo "checked='checked'"; } ?> /></td>
      </tr>
      <tr>
        <td height="24">&nbsp;</td>
            <td>&nbsp;</td>
        <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
      <tr>
        <td height="24">&nbsp;</td>
            <td valign="top"><input type="submit" value="<?php echo UPDATE;?>"  /></td>
        <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
      <tr>
        <td height="54">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
      
      
    </table></td>
    </tr>
  </form>
</table>

