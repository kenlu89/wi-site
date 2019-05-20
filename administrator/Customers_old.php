<?php 
$r1=@mysql_query("select * from customers, address_book where customers.customers_id=address_book.customers_id  order by address_book.entry_company asc");
if($_GET['action']=="remove"){
$id=$_GET['id'];
@mysql_query("delete from address_book where customers_id='$id'");
@mysql_query("delete from customers where customers_id='$id'");
$orders=@mysql_query("select * from  orders where parent_id='$id'");
while($del_row=mysql_fetch_array($orders)){
@mysql_query("delete from orders_products where parent_id=".$del_row['orders_id']);
}
@mysql_query("delete from orders where parent_id='$id'");
header("Location: ?content=Customers&msg=1");
}
?>
<style type="text/css">
<!--
.style1 {
	font-size: 14px;
	color: #ffffff;
	font-weight: bold;
}
a {
	font-size: 14px;
	color: #006600;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #006600;
}
a:hover {
	text-decoration: none;
	color: #00CC00;
}
a:active {
	text-decoration: none;
	color: #006600;
}
.style3 {color: #006600}
-->
</style>
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
<table width="800" border="0" cellpadding="0" cellspacing="0" align="center">
  <!--DWLayoutTable-->
  <tr>
    <td height="20" valign="middle" align="center"><span class="error"><?php if($_GET['msg']==1){ echo DONE_MSG; }?></span></td>
  </tr>
  <tr>
    <td height="21" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bar">
      <!--DWLayoutTable-->
      <form name="search" action="edit.php" enctype="multipart/form-data" method="get">
        <tr>
          <td width="344" height="21" valign="middle"><span class="style1">&nbsp; &nbsp; <?php echo CUSTOMER;?> </span></td>
          <td width="150" align="center" valign="middle" class="style1"><?php echo CONTACT;?></td>
          <td width="92" valign="middle" class="style1">
            <select name="id" class="mtext">
              <option value="company"><?php echo COMPANY;?></option>
              <option value="customer"><?php echo CUSTOMER_ID;?></option>
            </select>	</td>
        <td width="170" align="center" valign="middle"><input type="text" class="mtext" name="search" /></td>
            <td width="44" align="center" valign="middle"><input type="submit" class="stext" value="Go"  height="15" /></td>
          </tr>
        
          </form>
    </table></td>
  </tr>
  <tr>
    <td height="17">&nbsp;</td>
  </tr><?php 
  $i=1;
  while($row=mysql_fetch_array($r1)){
	
	?>
  <tr>
    <td height="24" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="mtext" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>>
      <!--DWLayoutTable-->
      <tr>
        <td width="35" height="24" align="center" valign="middle" class="left">		  <img src="images/green_folder.png" width="20" height="20" border="0" /></td>
          <td width="310" align="left" valign="middle" class="left"><?php echo $row['entry_company']; echo " ("; echo $row['entry_lastname'];echo " , "; echo $row['entry_firstname'];  echo ")"; ?></td>
          <td width="150" align="center" valign="middle" class="left"><?php echo $row['customers_telephone']; ?></td>
          <td width="69" valign="middle" class="left"><a href="?content=edit&id=<?php echo $row['customers_id']; ?>" target="_self" class="left_nav"><?php echo EDIT;?></a></td>
          <td width="67" valign="middle" class="left"><a href="?content=Customers&action=remove&id=<?php echo $row['customers_id']; ?>" target="_self" class="left_nav" onclick="return comfirms()"><?php echo REMOVE;?></a></td>
          <td width="84" align="center" valign="middle" class="left ">
            <a href="?content=orders&parent=<?php echo $row['customers_id']; ?>" target="_self" class="left_nav">
          <?php echo ORDERS;?></a></td>
          <td width="83" align="center" valign="middle" class="left"><?php echo $row['stats']; ?></td>
        </tr>     
    </table></td>
  </tr><?php $i++; }?> 
  <tr>
    <td height="84">&nbsp;</td>
  </tr>

</table>

