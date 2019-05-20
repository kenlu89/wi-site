<?php
$id="";
$id=$_GET['id'];
$edit=@mysql_query("select * from shipping, shipping_description where shipping.shipping_id=shipping_description.shipping_id and shipping_description.language_id=1 and shipping.shipping_id='$id'");
$rows_edit=@mysql_fetch_array($edit);
$en_name=$rows_edit['shipping_name'];
$ch=@mysql_query("select * from shipping_description where language_id=3 and shipping_id=".$rows_edit['shipping_id']);
$row_ch=mysql_fetch_array($ch); 
$ch_name=$row_ch['shipping_name'];
$amount=$rows_edit['shipping_amount'];
$stats=$rows_edit['stats'];
if($_POST['chk']==1){
$en_name=$_POST['en_name'];
$ch_name=$_POST['ch_name'];
$amount=$_POST['amount'];
$stats=$_POST['stats'];
$id=$_POST['id'];
if($en_name=="" || $ch_name=="" || $amount==""){
$error=1;
}else{
$done=@mysql_query("update shipping set shipping_amount='$amount', last_modified=now(), stats='$stats' where shipping_id='$id'");
@mysql_query("update shipping_description set shipping_name='$ch_name' where shipping_id='$id' and language_id=3");
@mysql_query("update shipping_description set shipping_name='$en_name' where shipping_id='$id' and language_id=1");
header("Location: ?content=shipping_methods&msg=2");
}

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
  <!--DWLayoutTable--><form name="form1" action="?content=edit_shipping_method" enctype="multipart/form-data" method="post">
  <input type="hidden" name="chk" value="1" /><input type="hidden" name="id" value="<?php echo $id;?>" />

  <tr>
    <td height="65" colspan="5" align="center" valign="middle"><span class="error"><?php if($_GET['msg']==1){ echo DONE_MSG; }?></span></td>
    </tr>
  <tr>
    <td width="54" height="32">&nbsp;</td>
    <td width="120" valign="middle"><?php echo EN_NAME;?></td>
    <td width="237" valign="middle"><input type="text" name="en_name" class="text" size="25"  value="<?php echo $en_name;?>"/></td>
    <td width="90" valign="middle"><?php echo CH_NAME;?></td>
    <td valign="middle"><input type="text" name="ch_name" class="text" size="25"  value="<?php echo $ch_name;?>"/></td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td width="299">&nbsp;</td>
    </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td colspan="2" valign="middle"><input type="radio" name="stats" value="1" <?php if($stats==1){ echo "checked=\"checked\""; }?>/><?php echo ACTIVE;?> &nbsp; <input type="radio" name="stats" value="0"  <?php if($stats==0){ echo "checked=\"checked\""; }?>/> <?php echo INACTIVE;?></td>
    <td valign="middle"><?php echo AMOUNT;?></td>
    <td valign="middle"><input type="text" name="amount" class="text" size="25" id="amount"  value="<?php echo $amount;?>"/></td>
  </tr>
  <tr>
    <td height="44">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="37">&nbsp;</td>
    <td valign="top"><input type="submit" value="<?php echo SUBMIT;?>" class="text"/></td>
    <td colspan="3" valign="top"><input type="reset" value="<?php echo RESET;?>" /></td>
  </tr>
  <tr>
    <td height="227">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  
  <?php 
  $i=1;
  $ship=@mysql_query("select * from shipping, shipping_description where shipping.shipping_id=shipping_description.shipping_id and shipping_description.language_id=1");
  while($rows_ship=mysql_fetch_array($ship)){
  ?>
  
  <?php 
 $i++;  }
  ?>
  
  
  
  </form>
</table>

