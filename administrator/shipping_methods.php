<?php
if($_POST['chk']==1){
$en_name=$_POST['en_name'];
$ch_name=$_POST['ch_name'];
$amount=$_POST['amount'];
$stats=$_POST['stats'];

if($en_name=="" || $ch_name=="" || $amount==""){
$error=1;
}else{
$done=@mysql_query("insert into shipping(date_added, stats, shipping_amount) values(now(), '$stats', '$amount')");
$shipping_id=mysql_insert_id();
@mysql_query("insert into shipping_description(shipping_id, language_id, shipping_name) values('$shipping_id', 1, '$en_name')");
@mysql_query("insert into shipping_description(shipping_id, language_id, shipping_name) values('$shipping_id', 3, '$ch_name')");
header("Location: ?content=shipping_methods&msg=1");
}

}

if($_GET['action']=="remove"){
$id=$_GET['id'];
@mysql_query("delete from shipping where shipping_id='$id'");
@mysql_query("delete from shipping_description where shipping_id='$id'");
header("Location: ?content=shipping_methods&msg=2");
}
?>
<script type="text/javascript">
function confirms()
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
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable--><form name="form1" action="?content=shipping_methods" enctype="multipart/form-data" method="post">
  <input type="hidden" name="chk" value="1" />

  <tr>
    <td height="65" colspan="10" align="center" valign="middle"><span class="error"><?php if($_GET['msg']==1){ echo DONE_MSG; }else if($_GET['msg']==2){ echo UPDATE_MSG; }?></span></td>
    </tr>
  <tr>
    <td width="54" height="32">&nbsp;</td>
    <td width="120" valign="middle"><?php echo EN_NAME;?></td>
    <td colspan="2" valign="middle"><input type="text" name="en_name" class="text" size="25" /></td>
    <td width="90" valign="middle"><?php echo CH_NAME;?></td>
    <td colspan="5" valign="middle"><input type="text" name="ch_name" class="text" size="25" /></td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td width="33">&nbsp;</td>
    <td width="80">&nbsp;</td>
    <td width="65">&nbsp;</td>
    <td width="65">&nbsp;</td>
    <td width="56">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td colspan="3" valign="middle"><input type="radio" name="stats" value="1"  checked="checked"/><?php echo ACTIVE;?> &nbsp; <input type="radio" name="stats" value="0" /> <?php echo INACTIVE;?></td>
    <td valign="middle"><?php echo AMOUNT;?></td>
    <td colspan="5" valign="middle"><input type="text" name="amount" class="text" size="25" id="amount" /></td>
  </tr>
  <tr>
    <td height="44">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="230">&nbsp;</td>
    <td width="7">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="37">&nbsp;</td>
    <td valign="top"><input type="submit" value="<?php echo SUBMIT;?>" class="text"/></td>
    <td colspan="8" valign="top"><input type="reset" value="<?php echo RESET;?>" class="text" /></td>
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td>&nbsp;</td>
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
    <td height="26">&nbsp;</td>
    <td colspan="8" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="1">
      <!--DWLayoutTable-->
      <tr>
        <td width="349" height="24" align="center" valign="middle" class="bar_gray"><?Php echo SHIPPING_METHOD;?></td>
    <td width="129" align="center" valign="middle" class="bar_gray"><?php echo STATS;?></td>
    <td width="80" align="center" valign="middle" class="bar_gray"><?php echo AMOUNT;?></td>
    <td width="127" align="center" valign="middle" class="bar_gray"><?php echo ACTION;?></td>
    </tr>
    </table>    </td>
    <td>&nbsp;</td>
  </tr>
  <?php 
  $i=1;
  $ship=@mysql_query("select * from shipping, shipping_description where shipping.shipping_id=shipping_description.shipping_id and shipping_description.language_id=1");
  while($rows_ship=mysql_fetch_array($ship)){
  ?>
  <tr>
    <td height="24">&nbsp;</td>
    <td colspan="2" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>>&nbsp; <?php echo $rows_ship['shipping_name']; $ch=@mysql_query("select * from shipping_description where language_id=3 and shipping_id=".$rows_ship['shipping_id']); $row_ch=mysql_fetch_array($ch); echo "/".$row_ch['shipping_name'];?></td>
    <td colspan="3" align="center" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><?php if($rows_ship['stats']==1){ ?>
      <img src="images/radiobox.png"  height="18" width="18"/>
      <?php  }else{ ?>
      <img src="images/radiobox_sold.png"  height="18" width="18"/>      <?php } ?></td>
    <td align="center" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><?php echo $rows_ship['shipping_amount'];?></td>
    <td align="center" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><a href="?content=edit_shipping_method&id=<?php echo $rows_ship['shipping_id'];?>" target="_self" class="red_link"><?php echo EDIT;?></a></td>
    <td align="left" valign="middle"  <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><a href="?content=shipping_methods&action=remove&id=<?php echo $rows_ship['shipping_id'];?>" target="_self" class="red_link" onclick="return confirms();"><?php echo REMOVE;?></a></td>
    <td>&nbsp;</td>
  </tr>
  <?php 
 $i++;  }
  ?>
  <tr>
    <td height="146">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  
  </form>
</table>

