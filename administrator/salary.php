<?php 
$time=date('m-d-Y');
$sort="";
$sort=" and  shift.stats=0";
if($_POST['chk']==1){
$sort="";
$worker="";
$stats="";
$date_from="";
$date_to="";

$worker=$_POST['employee'];
$stats=$_POST['stats'];
 $date_from=$_POST['date_from'];
 $date_to=$_POST['date_to'];

if($worker!=""){
$sort=" and customers.customers_id=".$worker;
}
if($stats!=""){
$sort.=" and shift.stats=".$stats;
}
if($date_from!=""){
$day_from="";
$month_from="";
$year_from="";
$tmp="";
$tmp=split("/", $date_from);
 $day_from=$tmp[1];
 $month_from=$tmp[0];
 $year_from=$tmp[2];
$sort.=" and shift.date>=".$day_from." and shift.month>=".$month_from." and shift.year>=".$year_from;
}
if($date_to!=""){

$day_to="";
$month_to="";
$year_to="";
$tmp1="";
$tmp1=split("/", $date_to);
 $day_to=$tmp1[1];
 $month_to=$tmp1[0];
 $year_to=$tmp1[2];
$sort.=" and shift.date<=".$day_to." and shift.month<=".$month_to." and shift.year<=".$year_to;
}
}
?>
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
 document.location.href = 'logs.php?sort=ip&id='+ips;			
 }
 
 function show_employee( )
{
 var ips=document.getElementById("employee").value;
 document.location.href = 'logs.php?sort=employee&id='+ips;			
 }
  function show_date( )
{
 var ips=document.getElementById("dates").value;
 document.location.href = 'logs.php?sort=dates&id='+ips;			
 }
</script>



<?php $result=@mysql_query("select * from customers, shift where customers.customers_id=shift.parent_id and shift.clock_out!='' ".$sort);?>

<table width="798" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="36" height="20">&nbsp;</td>
    <td width="214">&nbsp;</td>
    <td width="264">&nbsp;</td>
    <td width="280">&nbsp;</td>
    <td width="4">&nbsp;</td>
  </tr>  
  <tr>
    <td height="29">&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle" class="text"><?php echo DATE_FORMAT;?>mm/dd/yyyy</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td height="29" colspan="5" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="text">
      <!--DWLayoutTable-->
<form action="?content=salary" enctype="multipart/form-data"  method="post">
<input type="hidden" name="chk" value="1" />
      <tr>
        <td width="117" height="29" valign="middle"><select name="employee" id="employee" class="text" >
          <option value=""><?php echo ALL_EMPLOYEE;?></option>
          <?php 
	$all_employee=@mysql_query("select customers_id, customers_firstname, customers_lastname from customers order by customers_id desc");
	while($row_employee=mysql_fetch_array($all_employee)){  
		?>
          <option value="<?php echo $row_employee['customers_id'];?>" ><?php echo $row_employee['customers_lastname'].", ".$row_employee['customers_firstname'];?></option>
          <?php }
	?>
        </select></td>
      <td width="216" valign="middle"><input type="radio" name="stats" value="1" />
        <?PHP echo PAID;?> &nbsp; 
        <input type="radio" name="stats" value="0" />
        <?php echo NOT_PAID;?>&nbsp; 
        <input type="radio" name="stats" value="" />
        <?php echo ALL;?></td>
      <td width="346" valign="middle"><?php echo FROM_DATE;?>
        <input  type="text" size="15" name="date_from" class="text" /> 
        <?php echo TO;?> 
        <input  type="text" size="15" name="date_to" class="text" id="date_to" /></td>
      <td width="66" valign="middle"><input type="submit" class="stext" value="<?PHP echo QUOTE;?>" /> </td>
    </tr></form>
    </table></td>
  </tr>
  <tr>
    <td height="9"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="114" colspan="5" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="text">
      <!--DWLayoutTable-->
      <form name="export_excel" action="export.php" method="post" enctype="multipart/form-data"> 
      <input type="hidden" name="chk" value="1" />
      <tr>
        <td height="20" colspan="2" align="center" valign="middle" class="bar"><?php echo EMPLOYEE;?></td>
          <td width="100" valign="middle" class="bar"><?php echo CLOCK_IN;?></td>
          <td width="100" valign="middle" class="bar"><?php echo CLOCK_OUT;?></td>
          <td width="100" valign="middle" class="bar"><?php echo HOUR_RATE;?></td>
          <td width="122" valign="middle" class="bar"><?php echo STATS;?></td>
          <td width="107" valign="middle" class="bar"><?php echo TOTAL_AMOUNT;?></td>
        <td width="96" valign="middle" class="bar"><?php echo DATE;?></td>
        </tr>
      
      <!--DWLayoutTable--><?php while($rows=mysql_fetch_array($result)){ 
	  
	  
	  ?>
      <tr>
        <td width="27" height="30">&nbsp;</td>
            <td width="146" valign="middle" class="text"><?php  
			 
			echo $rows['customers_lastname'].", ".$rows['customers_firstname']; ?></td>
            <td valign="middle" class="text"><?php echo $rows['clock_in'];?></td>
            <td valign="middle" class="text"><?php echo $rows['clock_out'];?></td>
            <td valign="middle">$<?php echo number_format($rows['salary'], 2);?></td>
            <td valign="middle"><?php if($rows['stats']==1){ echo "Paid"; }else{ echo "Not Paid Yet"; }?></td>
            <td valign="middle">$<?php echo $rows['total'];?></td>
        <td valign="middle"><?php $time1=""; $time1=$rows['month']."-".$rows['date']."-".$rows['year']; echo $time1;?>
          <input type="hidden" name="fname[]" value="<?php echo $rows['customers_firstname'];?>" />
          <input  type="hidden" name="lname[]" value="<?php echo $rows['customers_lastname'];?>" />
          <input  type="hidden" name="id[]" value="<?php echo $rows['ids'];?>" />
          <input type="hidden" name="clock_out[]" value="<?php echo $rows['clock_out'];?>" />
          <input type="hidden" name="clock_in[]" value="<?php echo $rows['clock_in'];?>" />
          <input type="hidden" name="salary[]" value="<?php echo $rows['salary'];?>" />
          <input type="hidden" name="total[]" value="<?php echo $rows['total'];?>" /> 
          <input type="hidden" name="date[]" value="<?php echo $time1;?>" />              </td>
        </tr><?php  }?>
      <tr>
        <td height="58" colspan="6" align="center" valign="middle" class="redtext"><?php echo NOTE;?></td>
          <td colspan="2" valign="middle">

          <input type="submit" value="<?php echo EXPORT;?>" class="text" /></td>
        </tr>
      </form>
    </table></td>
  </tr>
  <tr>
    <td height="176">&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>

