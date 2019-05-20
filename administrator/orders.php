<?php
$ids=$_GET['id'];
$search_by=$_GET['search'];
$parent=$_GET['parent'];

if($ids=="" && $parent==""){
$r1=@mysql_query("select * from orders");

} else if($ids==1){
$r1=@mysql_query("select * from orders where orders_status=1 order by company asc");
}else if($ids==2){
$r1=@mysql_query("select * from orders where orders_status=2 order by company asc");
} else if($ids==3){
$r1=@mysql_query("select * from orders where orders_status=3 order by company asc");
} else if($o_id==1){
$r1=@mysql_query("select * from orders where orders_id='$ids' order by company asc");
} else{
$r1=@mysql_query("select * from orders where parent_id='$parent' order by company asc");
}


if($_GET['action']=="remove" && $_GET['id']!==""){

$done=@mysql_query("delete from orders where orders_id=".$_GET['id']);

if($done){
header("Location: ?content=orders&msg=1");
}else{
header("Location: ?content=orders&msg=1");
}
}
?>

<script type="text/javascript">
			function orders( )
			{
				var or_id =document.getElementById("sorts").value;				
				document.location.href = '?content=orders&id='+or_id+'&ids=1';
			}	
			function Go( )
			{
			 var oid=document.getElementById("order_id").value;	
			 document.location.href='?content=orders&search=order_id&id='+oid;
			}
</script>
<script type="text/javascript">
function comfirms()
  {
  var r=confirm("<?Php echo WARNNING;?>")
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
<link   href="style_sheet.css" type="text/css"  rel="stylesheet" />
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
<table width="800" border="0" cellpadding="0" cellspacing="0" align="center">
  <!--DWLayoutTable-->
  <tr>
    <td width="800" height="80" valign="top" ><!--DWLayoutTable-->&nbsp;</td>
  </tr>
  <tr>
    <td height="21" align="right" valign="middle"><span class="red_text"><?php echo ORDER_ID;?> </span>
      <input type="text" name="order_id"   id="order_id" class="stext"/>      
      <input type="button" value="<?php echo GO;?>"  onclick="Go();"  class="stext"/></td>
  </tr>
  <tr>
    <td height="20" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bar">
      <!--DWLayoutTable-->
      <tr>
        <td width="35" height="20">&nbsp;</td>
        <td width="279" align="left" valign="middle"><?php echo CONTACT_PERSON;?></td>
        <td width="130" align="center" valign="middle" ><?php echo TOTAL;?></td>
        <td width="150" align="center" valign="middle"><?php echo DATE_PURCHASED;?> </td>
        <td width="206" align="right" valign="middle">
            <select name="sorts" class="stext"  id="sorts"onchange="orders(this)">
              <option value="" <?php if($ids==""){ echo "selected='selected'"; }?> ><?php echo ALL;?></option>
              <option value="1" <?php if($ids==1){ echo "selected='selected'"; }?> ><?php echo PENDING;?></option>
              <option value="2" <?php if($ids==2){ echo "selected='selected'"; }?> ><?php echo PROCESSING;?></option>
              <option value="3" <?php if($ids==3){ echo "selected='selected'"; }?> ><?php echo DELIVERED;?></option>
              </select>	&nbsp;&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="60" valign="top">
	<?php 
	$i=1;
	while($row=mysql_fetch_array($r1)){
	
	?>
	
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="mtext" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?> >
	  <!--DWLayoutTable-->
	  <tr>
	    <td width="35" height="24" align="center" valign="middle" class="left">		  <img src="images/folder.gif" width="16" height="16" border="0" /></td>
          <td width="279" align="left" valign="middle" class="left"><?php if($row['company']!=""){ echo $row['company']; }else{  $clients=@mysql_query("select * from customers where customers_id=".$row['parent_id']);  $row_client=mysql_fetch_array($clients); echo $row_client['customers_lastname']." ".$row_client['customers_firstname']; }?></td>
          <td width="131" align="center" valign="middle" class="left">$<?php echo $row['total']; ?></td>
          <td width="150" align="center" valign="middle" class="left"><?php echo $row['date_purchased']; ?></td>
          <td width="57" valign="middle" class="left"><a href="?content=orders&action=remove&id=<?php echo $row['orders_id']; ?>&parent=<?php echo $_GET['parent'];?>" target="_self" class="left_nav" onclick="return comfirms()"><?php echo REMOVE;?></a></td>
          <td width="84" align="center" valign="middle" class="left ">
            <a href="view_orders.php?id=<?php echo $row['orders_id']; ?>" target="_blank" class="left_nav">
          <?php echo VIEW_PRINT;?></a></td>
          <td width="62" align="center" valign="middle" class="left"><a href="?content=update_order&id=<?php echo $row['orders_id']; ?>&parent=<?php echo $_GET['parent'];?>" target="_self" class="left_nav"><?php echo UPDATE;?></a></td>
        </tr>      
    </table>	
	<?php $i++;}?>	</td>
  </tr>
  <tr>
    <td height="95">&nbsp;</td>
  </tr>
</table>