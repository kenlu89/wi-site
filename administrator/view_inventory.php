<script language="javascript" type="text/javascript">
			function showProducts( )
			{
			var newQty =document.getElementById("cate").value;
			document.location.href = '?content=phone_cards&pid='+newQty;
			}
</script>

<script type="text/javascript">
function comfirms()
  {
  var r=confirm("<?php echo WARNNING;?>")
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
<?php 
$result=@mysql_query("select * from  products, products_description, products_to_categories where products.products_id=products_description.products_id and products_description.language_id='$lan' and products_to_categories.categories_id=2 and products_to_categories.products_id=products.products_id");
?>
<table width="798" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td height="20">&nbsp;</td>
    <td colspan="5" valign="top"><a href="?content=quick_update" target="_self" class="red_link"><?php echo QUICK_UPDATE;?></a> | <a href="?content=phone_cards" target="_self" class="red_link"><?php echo PHONE_CARD;?></a>
      <div class="error" style="text-align:center;">
        <?php 
	if($_GET['msg']==1){
	echo "<br>".DONE_MSG;
	}else if($_GET['msg']==51){
	echo "<br>".ERROR_MSG;
	}
	?>
    </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="36" height="20">&nbsp;</td>
    <td colspan="5" valign="top"><div class="error" style="text-align:center;"></div>    </td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td height="25">&nbsp;</td>
    <td colspan="5" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="1">
      <!--DWLayoutTable-->
      <tr>
        <td width="255" height="23" align="center" valign="middle"  class="bar_gray"><?php echo PROUDCTS_NAME;?></td>
      <td width="120" align="center" valign="middle"   class="bar_gray"><?php echo QTY;?></td>
        <td width="120" align="center" valign="middle"  class="bar_gray"><?php echo CARD_QTY;?></td>
      <td width="120" align="center" valign="middle"  class="bar_gray"><?php echo SOLD_TO;?></td>
      <td width="128" align="center" valign="middle"  class="bar_gray"><?php echo AVAIlABLE;?></td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr><?Php 
  $i=1;
  while($rows=mysql_fetch_array($result)){
$total_cards="";
$sold_cards="";
$available_cards="";

$total_cards=@mysql_query("select count(*) as total from phone_cards where parent_id='".$rows['products_id']."'");
$row_total_cards=mysql_fetch_array($total_cards);

$sold_cards=@mysql_query("select count(*) as sold from phone_cards where parent_id='".$rows['products_id']."' and stats=1");
$row_sold_cards=mysql_fetch_array($sold_cards);

$available_cards=@mysql_query("select count(*) as available from phone_cards where parent_id='".$rows['products_id']."' and stats=0");
$row_available_cards=mysql_fetch_array($available_cards);
  ?>
  <tr >
    <td height="24">&nbsp;</td>
    <td width="257" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>>&nbsp; &nbsp; <?php echo $rows['products_name'];?></td>
    <td width="121" align="center" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>>&nbsp; &nbsp; <?php echo $rows['ordered'];?></td>
    <td width="120" align="center" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><?php echo $row_total_cards['total'];?></td>
    <td width="122" align="center" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><?php echo $row_sold_cards['sold'];?></td>
    <td width="129" align="center" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><?php echo $row_available_cards['available'];?></td>
    <td>&nbsp;</td>
  </tr>
  <?php 
 $i++;  }
  ?><div id="txt"></div>
  <tr>
    <td height="105">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
<tr><td height="19"></form>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</table>

<div id="backgroundPopup"></div>
<?php
/*
}else{
echo PRIVILEGE_MSG;
 }*/?>

