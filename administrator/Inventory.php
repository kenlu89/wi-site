<?php
switch($_GET['assort']){
case 1:
{ $assort="order by products.products_model asc";
break;}
case 2:
{ $assort="order by products.wholesales desc";
break;}
case 3:
{ $assort="order by products.products_price asc";
break;}
case 4:
{ $assort="order by products.ordered desc";
break;}
case 5:
{ $assort="order by products.products_quantity asc";
break;}
default: 
{ $assort="order by products.sort_order asc";
break;}
}

$r=@mysql_query("select * from  products, products_description where products.products_id=products_description.products_id and products_description.language_id=1 ".$assort);

if($_GET['action']=="remove"){
$id=$_GET['id'];
@mysql_query("delete from products where products_id='$id'");
@mysql_query("delete from products_description where products_id='$id'");
@mysql_query("delete from products_to_categories where products_id='$id'");
header("location: ?content=Inventory&msg=2");
}
?>

<script type="text/javascript">
function comfirms()
  {
  var r=confirm("Warning: Are you sure to delete this ?")
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
<style type="text/css">
<!--
.style2 {
	color: #333333;
	font-size: 12px;
}
a {
	font-size: 12px;
	color: #0033FF;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #0033FF;
}
a:hover {
	text-decoration: none;
	color: #0099FF;
}
a:active {
	text-decoration: none;
	color: #0033FF;
}
-->
</style>

<table width="800" border="0" cellpadding="0" cellspacing="0" align="center">
  <!--DWLayoutTable-->
  
  <tr>
    <td height="16" align="center" valign="middle" class="error"><?php if($_GET['msg']==1){ echo MSG1; }else if($_GET['msg']==2){ echo MSG2;}?></td>
  </tr>
  <tr>
    <td height="20" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bar">
      <!--DWLayoutTable-->
      <tr>
        <td width="100" height="20" align="center" valign="middle">
        <a  href="?content=Inventory&assort=1" target="_self" class="white_link">
       <?php echo ITEM_NUM;?></a></td>
      <td width="109" >&nbsp;</td>
      <td width="126" align="center" valign="middle" ><?PHP echo STATS;?></td>
      <td width="85" valign="middle" ><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td width="100" valign="middle" >
      <a  href="?content=Inventory&assort=3" target="_self" class="white_link">
      <?php echo PRICE;?></a></td>
      <td width="74" align="center" valign="middle" >
      <a  href="?content=Inventory&assort=4" target="_self" class="white_link">
      <?php echo ORDERED;?></a></td>
      <td width="80" align="center" valign="middle" >
      <a  href="?content=Inventory&assort=5" target="_self" class="white_link">
      <?php echo QTY;?></a></td>
    <td width="39" >&nbsp;</td>
      <td width="87" valign="top" ><!--DWLayoutEmptyCell-->&nbsp;</td>
    </tr>
      
    </table></td>
  </tr>
  <tr>
    <td height="4"></td>
  </tr>
  <tr>
    <td height="24" valign="top">
	<?php $i=1; while($row=mysql_fetch_array($r)){ ?>
	<table width="100%" border="0" cellpadding="0" cellspacing="0" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>>
      <!--DWLayoutTable-->
      <tr>
        <td width="209" height="24" align="left" valign="middle" class="style2">&nbsp;&nbsp;&nbsp;<?php echo $row['products_model']; ?></td>
        <td width="20" valign="middle" class="text">
		  <input type="radio"  disabled="disabled"name="<?php echo $row['products_id']; ?>" <?php if($row['products_status']==1){ echo "checked='checked'"; } ?>value="1"  class="text" /></td>
        <td width="27" valign="middle"><span class="text">In </span></td>
        <td width="20" valign="middle" class="text" >
		  <input type="radio"   disabled="disabled" name="<?php echo $row['products_id']; ?>"  <?php if($row['products_status']==0){ echo "checked='checked'"; } ?>value="0" class="text" /></td>
        <td width="59" valign="middle" class="text" >Out</td>
        <td width="85" valign="middle" ><input type="checkbox"  disabled="disabled"name="wholesale" value="1" <?php if($row['wholesales']==1){ echo "checked='checked'"; } ?> /></td>
        <td width="100" valign="middle" class="style2" >$<?php echo $row['products_price']; ?></td>
        <td width="74" align="center" valign="middle" class="text" ><?php echo $row['ordered']; ?></td>
        <td width="80" align="center" valign="middle" class="style2" ><?php echo $row['products_quantity']; ?></td>
      <td width="46" align="left" valign="middle" ><a href="?content=Inventory_edit&id=<?php echo $row['products_id']; ?>" target="_self" class="left_nav"><?php echo EIDT;?></a></td>
      <td width="34" align="center" valign="middle" ><a href="?content=Inventory&action=remove&id=<?php echo $row['products_id']; ?>" target="_self" class="left_nav" onclick="return comfirms();"><?php echo DEL;?></a></td>
      <td width="46" >&nbsp;</td>
      </tr>
    </table>
	<?php $i++; }?>	</td>
  </tr>
  <tr>
    <td height="47">&nbsp;</td>
  </tr>

</table>
