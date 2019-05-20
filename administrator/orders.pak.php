<?php
$ids=$_GET['id'];
$o_id=$_GET['ids'];


switch($_GET['sort']){
case "3":{
$extend="where date_purchased='".$_GET['search']."' order by date_purchased desc";
break;
}
case "2":{
$name=$_GET['search'];
$t1=@mysql_query("select * from tables where table_name='$name'");
$rowst=mysql_fetch_array($t1);

$extend="where table_id='".$rowst['ids']."' order by date_purchased desc";
break;
}
case "1":{
$extend="where tel='".$_GET['search']."' order by date_purchased desc";
break;
}
default:{
$extend="where date_purchased='".date("Y-m-d")."' order by date_purchased desc";
break;
}
}

$r1=@mysql_query("select * from orders ".$extend);
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
			 document.location.href='?content=orders&id='+oid;
			}

</script>
<script type="text/javascript">
function comfirms()
  {
  var r=confirm("Warning: Are you sure to delete this?")
  if (r==true)
    {
return true;
    }
  else
    {
return false;
    }
  }
  function popCheck(url) {
	newwindow=window.open(url,'name','height=800,width=272,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no');
	if (window.focus) {newwindow.focus()}
	return false;
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
    <td width="573" height="21" align="right" valign="middle" class="mtext"><?php echo SEARCH_MSG;?></td>
    <td width="227" align="right" valign="middle" class="text"><form name="search" action="?" method="get" enctype="multipart/form-data">
      <input  type="hidden" name="content" value="orders" align="absmiddle">
      <select name="sort" class="stext">
        <option value="1"><?php echo TEL;?></option> 
        <option value="2"><?php echo TABLE;?></option>
        <option value="3" selected><?php echo DATE;?></option>
        </select>
      <input type="text" name="search"   id="search" class="stext"/>      
      <input type="submit" value="Go"  onclick="Go();"  class="stext"/>
    </form></td>
  </tr>
  <tr>
    <td height="20" colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bar">
      <!--DWLayoutTable-->
      <tr>
        <td width="35" height="20">&nbsp;</td>
        <td width="139" align="left" valign="middle"><?php echo TEL;?></td>
        <td width="100" align="center" valign="middle" ><?php echo TOTAL;?></td>
        <td width="150" align="center" valign="middle" ><?php echo DATE_PURCHASED;?></td>
        <td width="120" valign="middle" ><?php echo CREATED_BY;?></td>
        <td width="130" valign="middle" ><?php echo CHECK_OUT_TIME;?></td>
        <td width="126" valign="middle" ><?PHP echo CHECK_OUT_PERSON;?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="60" colspan="2" valign="top">
	<?php 
	$i=1;
	while($row=mysql_fetch_array($r1)){
	
	?>
	
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="mtext" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?> >
	  <!--DWLayoutTable-->
	  <tr>
	    <td width="35" height="24" align="center" valign="middle" ><a href="?content=view_order&id=<?php echo $row['orders_id'];?>" target="_blank" ><img src="images/folder.gif" width="16" height="16" border="0" /></a></td>
          <td width="139" align="left" valign="middle"><a href="" class="red_link" onclick="popCheck('kitchen.php?tid=<?php echo $row['table_id'];?>&id=<?php echo $row['orders_id'];?>')"><?php if($row['tel']!=""){echo $row['tel']; } if($row['table_id']!=0){ $table=@mysql_query("select * from tables where ids=".$row['table_id']); $row_T=mysql_fetch_array($table); echo $row_T['table_name']; }?></a></td>
          <td width="100" valign="middle" >$<?php echo $row['total']; ?></td>
          <td width="150" align="center" valign="middle" class="left"><?php echo $row['date_purchased']; ?></td>
          <td width="120" valign="middle"><?php $person=@mysql_query("select customers_firstname from customers where customers_id=".$row['parent_id']); $row_P=mysql_fetch_array($person); echo $row_P['customers_firstname']; ?></td>
          <td width="130" valign="middle"><?php echo $row['check_out'];?></td>
	  <td width="126" align="center" valign="middle"><?php if($row['checks']!=""){  $chk_sales=@mysql_query("select * from customers where customers_id=".$row['checks']); $num_sales=mysql_num_rows($chk_sales);  if($num_sales>=1){ $sales_rows=mysql_fetch_array($chk_sales); echo $sales_rows['customers_firstname']; }}?></td>
	  </tr>      
    </table>	
	<?php $i++;}?>	</td>
  </tr>
  <tr>
    <td height="95">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

