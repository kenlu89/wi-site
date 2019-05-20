<?php 
if($_GET['action']=="all"){
@mysql_query("delete from orders");
@mysql_query("delete from orders_products");
header("Location: ?content=clean_orders&msg=1");
}
if($_POST['chk']=="1" && $_POST['search']!=""){
$time=$_POST['search'];
$show=@mysql_query("select * from orders where date_purchased like '%$time%'");

while($rows=mysql_fetch_array($show)){
$parent=$rows['orders_id'];
@mysql_query("delete from orders_products where parent_id='$parent'");
@mysql_query("delete from orders where orders_id='$parent'");
}
}
?>
<script type="text/javascript">
function comfirms()
  {
  var r=confirm("<?php echo CONFIRM;?>")
  if (r==true)
    {
	window.location.href='?content=clean_orders&action=all';
return true;
    }
  else
    {
return false;
    }
  }
</script>
<table width="757" border="0" align="center" cellpadding="0" cellspacing="0" class="text">
  <!--DWLayoutTable-->  
  <form name="login" action="?content=clean_orders" method="post" enctype="multipart/form-data">
  
  <input type="hidden" name="chk" value="1" />
<tr>
    <td width="19" rowspan="5" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td height="29" colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td width="198" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td width="174" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    </tr>
  <tr>
    <td width="226" height="33" valign="top">
      <input type="button" value="<?php echo CLEAN_ALL_ORDERS;?>" class="text" onclick="return comfirms()"/></td>
    <td width="8">&nbsp;</td>
    <td colspan="4" valign="top" class="error"><?php if($_GET['msg']==1){ echo MSG; }?></td>
    </tr>
  <tr>
    <td height="41">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="4" valign="bottom" class="text"><?php echo SEARCH_MSG;?></td>
    </tr>
  <tr>
    <td height="28">&nbsp;</td>
    <td colspan="3" valign="top"><input type="text" class="text" size="35" name="search" /></td>
    <td width="124" valign="top"><input  type="submit" class="text" value="<?php echo GO;?>" /></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="152">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
</form>
</table>

