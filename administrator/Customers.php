<?php 
if($_GET['action']=="search"){
$id=$_GET['id'];
$search=$_GET['search'];
 	 	
if($search==""){
$error=1;
}else{
switch($id){
case 1:
$assort=" and customers.customers_email_address='$search' order by customers.customers_id asc";
break;

case 2:
$name=split(" ", $search);
if($name[2]!=""){
$tmp_firstname=$name[1]." ".$name[2];
}else{
$tmp_firstname=$name[1];
}

$assort=" and customers.customers_lastname='".$name[0]."' and customers.customers_firstname='$tmp_firstname' order by customers.customers_id asc";
break;

case 3:
$assort=" and customers.customers_telephone='$search' order by customers.customers_id asc";
break;

case 4:
$assort=" and customers.customersID='$search' order by customers.customers_id asc";
break;

default: 
$assort="";
break;

}

}
}else{
$assort=" order by customers.customers_id asc";
  }

$r1=@mysql_query("select * from customers, address_book where customers.customers_id=address_book.customers_id ".$assort);


if($_GET['action']=="remove"){
$id=$_GET['id'];
$chk_parent=@mysql_query("select * from customer_parent where parent_id='$id'");
if(mysql_num_rows($chk_parent)>=1){
header("Location: ?content=Customers&msg=2");

}else{
$orders=@mysql_query("select * from  orders where parent_id='$id'");
while($del_row=mysql_fetch_array($orders)){
@mysql_query("delete from orders_products where parent_id=".$del_row['orders_id']);
@mysql_query("delete from bonus where orders_id=".$del_row['orders_id']);
}
@mysql_query("delete from address_book where customers_id='$id'");
@mysql_query("delete from customers where customers_id='$id'");
@mysql_query("delete from bonus_to_customer where customers_id='$id'");
@mysql_query("delete from orders where parent_id='$id'");
@mysql_query("delete from customer_parent where customers_id='$id'");
header("Location: ?content=Customers&msg=1");
}}


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
<table width="800" border="0" cellpadding="0" cellspacing="0" align="center">
  <!--DWLayoutTable-->
  <tr>
    <td height="20" align="center" valign="middle" class="error"><?php if($_GET['msg']==1){ echo DELETED_MSG; }else if($_GET['msg']==2){  echo UNABLE_DELETE;}?></td>
  </tr>
  <tr>
    <td height="21" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bar">
      <!--DWLayoutTable-->
      <form name="search" action="?content=Customers" enctype="multipart/form-data" method="get"><input type="hidden" name="content" value="Customers" />
      <input type="hidden" name="action" value="search" />
        <tr>
          <td width="344" height="24" valign="middle">&nbsp; &nbsp; <a href="?content=Customers" target="_self" class="white_link"><?php echo CUSTOMER;?></a> </td>
          <td width="242" align="right" valign="middle" class="style1">
            <select name="id" class="mtext">
              <option value="1"><?php echo EMAIL;?></option>
              <option value="2"><?php echo CUSTOMER_NAME;?></option>
              <option value="3"><?php echo TEL;?></option>
              <option value="4"><?php echo CUSTOMER_ID;?></option>
            </select>	</td>
        <td width="170" align="center" valign="middle"><input type="text" class="mtext" name="search" /></td>
            <td width="44" align="center" valign="middle"><input type="submit" class="stext" value="<?php echo GO;?>"  height="15" /></td>
          </tr>
          </form>
    </table></td>
  </tr>
  <tr>
    <td height="17">&nbsp;</td>
  </tr><?php 
  $i=1;
  if(mysql_num_rows($r1)>=1){
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
          <td width="84" align="center" valign="middle" class="left">
            <a href="?content=orders&parent=<?php echo $row['customers_id']; ?>" target="_self" class="left_nav">
          <?php echo ORDERS;?></a></td>
          <td width="83" align="center" valign="middle" class="left">
		  <?php switch($row['stats']){
		  case 1: 
		  $msg=REGULAR;
		  break;
		  case 2:
		  $msg=VIP;
		  break;
		  case 3:
		  $msg=SUPPER;
		  break;
		  
		  } 
		  echo $msg;
		  ?></td>
        </tr>     
    </table></td>
  </tr><?php $i++; } }?> 
  <tr>
    <td height="84">&nbsp;</td>
  </tr>

</table>

