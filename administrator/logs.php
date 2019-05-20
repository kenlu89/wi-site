<?php 
$time=date('m-d-Y');

switch($_GET['sort']){
case "ip":{
$sort="where ip='".$_GET['id']."'"; 
break;
}
case "employee":{
$sort="where parent_id='".$_GET['id']."'"; 
break;
}
case "dates":{
$sort="where time='".$_GET['id']."'"; 
break;
}
default:{
$sort="where time='$time'"; 
}
}

if($_GET['action']=="remove"){
@mysql_query("delete from logs where ids=".$_GET['id']);
header("Location: ?content=logs");
}
?>
<?php if($_GET['sort']=="" || $_GET['id']==""){?>
<meta http-equiv="refresh" content="10;url=?content=logs">
<?php }?>
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
  
function show_ip( )
{
 var ips=document.getElementById("ip").value;
 document.location.href = '?content=logs&sort=ip&id='+ips;			
 }
 
 function show_employee( )
{
 var ips=document.getElementById("employee").value;
 document.location.href = '?content=logs&sort=employee&id='+ips;			
 }
  function show_date( )
{
 var ips=document.getElementById("dates").value;
 document.location.href = '?content=logs&sort=dates&id='+ips;			
 }
</script>



<?php $result=@mysql_query("select * from logs  ".$sort);?>
<table width="798" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->

  <tr>
    <td width="36" height="20">&nbsp;</td>
    <td width="194">&nbsp;</td>
    <td width="263">&nbsp;</td>
    <td width="33">&nbsp;</td>
    <td width="194">&nbsp;</td>
    <td width="74">&nbsp;</td>
    <td width="4">&nbsp;</td>
  </tr>  
  <tr>
    <td height="29">&nbsp;</td>
    <td valign="middle"><?php 
	$all_ip=@mysql_query("select DISTINCT  ip from logs");?>
    <select  name="ip" id="ip" class="text"  onchange="show_ip(this)">
    <option value=""><?php echo QUOTE_BY_IP;?></option>
<?php 	while($row_ip=mysql_fetch_array($all_ip)){?>
	 <option value="<?php echo $row_ip['ip'];?>" <?php if($row_ip['ip']==$_GET['id']){ echo "selected='selected'"; }?>><?php echo $row_ip['ip'];?></option>
	<?php }
	?></select></td>
    <td align="center" valign="middle">
	  <select name="employee" id="employee" class="text" onchange="show_employee(this)">
	    <option value=""><?php echo QUOTE_BY_EMPLOYEE;?></option>
	    <?php 
	$all_employee=@mysql_query("select DISTINCT parent_id  from logs");
	while($row_employee=mysql_fetch_array($all_employee)){  
	$parent="";
	$parent=$row_employee['parent_id'];
	$em=@mysql_query("select * from customers where customers_id='$parent'");
	$em_row=mysql_fetch_array($em);
	?>
	    <option value="<?php echo $em_row['customers_id'];?>" <?php if($em_row['customers_id']==$_GET['id']){ echo "selected='selected'"; }?>><?php echo $em_row['customers_lastname'].", ".$em_row['customers_firstname'];?></option>
	    <?php }
	?>
      </select></td>
    <td colspan="2" align="center" valign="middle"><select name="dates" id="dates"  class="text" onchange="show_date(this)">
      <option value=""><?php echo QUOTE_BY_DATE;?></option>
      <?php $all_date=@mysql_query("select DISTINCT time  from logs");while($row_date=mysql_fetch_array($all_date)){?>
      <option value="<?php echo $row_date['time'];?>"  <?php if($row_date['time']==$_GET['id']){ echo "selected='selected'"; }?>><?php echo $row_date['time'];?></option>
      <?php }?>
    </select></td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="30" colspan="7" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable--><?php while($rows=mysql_fetch_array($result)){ ?>
      <tr>
        <td width="27" height="30">&nbsp;</td>
            <td width="194" valign="middle" class="text"><?php  
			 $parent=$rows['parent_id']; 
			 
			$employee=@mysql_query("select * from customers where customers_id='$parent'"); 
			$e=mysql_fetch_array($employee); 
			echo $e['customers_lastname'].", ".$e['customers_firstname']; ?></td>
            <td width="171" valign="middle" class="text"><?php echo $rows['ip'];?></td>
            <td width="306" valign="middle" class="text"><?php echo $rows['history'];?></td>
            <td width="100">&nbsp;</td>
        </tr><?php }?>
    </table></td>
  </tr>
  <tr>
    <td height="234">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr></form>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</table>

