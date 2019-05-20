<?php
$year=$_GET['year'];
$month=$_GET['month'];

if($_GET['action']=="reset"){
@mysql_query("update orders set relate_to='' where relate_to=1");
}
if($_GET['action']=="comfirm"){
$delete=mysql_query("select * from orders where relate_to=1");
while($rows_del=mysql_fetch_array($delete)){
@mysql_query("delete from orders_products where parent_id=".$rows_del['orders_id']);
}

@mysql_query("delete from orders where relate_to=1");
header("Location: ?content=orders_report&msg=1");
}

if($_GET['action']=="remove"){
@mysql_query("delete from orders where orders_id=".$_GET['id']);
@mysql_query("delete from orders_products where parent_id=".$_GET['id']);
header("Location: ?content=orders_report&msg=1");
}

if($_GET['action']=="back_up"){


}

$chk_relate=@mysql_query("select * from orders where relate_to=1");
$num_relate=mysql_num_rows($chk_relate);

if($year!="" && $month!=""){
$search="";
 $search=$year."-".$month;
}else{
$year=date("Y");
$month=date("m");
$search="";
$search=$year."-".$month;
}
$r1=@mysql_query("select DISTINCT(date_purchased) from orders where date_purchased like '%$search%' and orders_status=3");

$business=@mysql_query("select * from orders where date_purchased like '%$search%' and orders_status=3");
$total="";
$chk_business=@mysql_query("select * from orders where  date_purchased like '%$search%' and orders_status=3");
$num_business=mysql_num_rows($chk_business);
while($row_business=mysql_fetch_array($business)){
$total=$row_business['paid_amount']-$row_business['change_amount']+$total;

}

$cash=@mysql_query("select * from orders where date_purchased like '%$search%' and orders_status=3 and payment_method='1'");
$cash_total="";
$num_cash=mysql_num_rows($cash);
while($row_cash=mysql_fetch_array($cash)){
$cash_total=$row_cash['paid_amount']-$row_cash['change_amount']+$cash_total;
if($row_cash['credit']>0){
$extra_credit=$row_cash['credit']+$extra_credit;
}}

//$credit_card=@mysql_query("select * from orders, orders_products where orders.orders_id=orders_products.parent_id and orders.date_purchased like '%$search%' and orders.orders_status=3 and payment_method='4'");
$credit_card_total="";
$tips="";
$credit_card=@mysql_query("select * from orders where  date_purchased like '%$search%' and orders_status=3 and payment_method=4");
$num_credit_total=mysql_num_rows($credit_card);
while($row_credit_card=mysql_fetch_array($credit_card)){
$credit_card_total=$row_credit_card['paid_amount']+$credit_card_total;
if($row_credit_card['tips']>0){
$tips=$tips+$row_credit_card['tips'];
}

if($row_credit_card['credit']>0){
$extra_credit=$row_credit_card['credit']+$extra_credit;
}
}

//$gift_card=@mysql_query("select * from orders, orders_products where orders.orders_id=orders_products.parent_id and orders.date_purchased like '%$search%' and orders.orders_status=3 and payment_method='3'");
$gift_card_total="";
$gift_card=@mysql_query("select * from orders  where date_purchased like '%$search%' and orders_status=3 and payment_method=3");
$num_gift_card=mysql_num_rows($gift_card);
while($row_gift_card=mysql_fetch_array($gift_card)){
$gift_card_total=$row_gift_card['paid_amount']-$row_gift_card['change_amount']+$gift_card_total;

}


function get_method($url){
 switch($url){
 case "1":{
 $value=CASH;
 return $value;
 break;
 }
  case "2":{
 $value=DISCOUNNT;
 return $value;
 break;
 }
  case "3":{
 $value=GIFT_CARD;
 return $value;
 break;
 }
 case "4":{
 $value=CREDIT_CARD;
 return $value;
 break;
 }
 
 }
}


if($_POST['chk']==1){
$search=$_POST['search'];
$month_total=$_POST['total'];
$total_deduct=$_POST['deduct'];
$r=@mysql_query("select DISTINCT(date_purchased) from orders where date_purchased like '%$search%' and orders_status=3");

while($r_row=mysql_fetch_array($r)){
$daily_purchased=$r_row['date_purchased'];
$daily=@mysql_query("select * from orders where date_purchased like '%$daily_purchased%' and orders_status=3");
@mysql_query("delete from hours");
while($daily_rows=mysql_fetch_array($daily)){
$daily_sales=$daily_sales+$daily_rows['paid_amount']-$daily_rows['change_amount']+$daily_rows['credit']-$daily_rows['tips'];
//====== unique hour

$tmp_hr=$daily_rows['check_out'];
$tmp_time=split(" ", $tmp_hr);
$hrs=split(':', $tmp_time[1]);
$hrs[0];

$chk_hrs=@mysql_query("select * from hours where txt=".$hrs[0]);
if(mysql_num_rows($chk_hrs)<1){
@mysql_query("insert into hours(txt) values('".$hrs[0]."')");
}
//======
}
$daily_percent=$daily_sales/$month_total;
$daily_deduct=$daily_percent*$total_deduct;
$all_hrs=@mysql_query("select * from hours");
while($rows_hr=mysql_fetch_array($all_hrs)){

$hr_07=$daily_purchased." ".$rows_hr['txt'];
$time_07=@mysql_query("select * from orders where check_out like '%$hr_07%' and orders_status=3");
$num_07=mysql_num_rows($time_07);
if($num_07>=1){
while($rows_07=mysql_fetch_array($time_07)){
$hr_sales=$hr_sales+$rows_07['paid_amount']-$rows_07['change_amount']+$rows_07['credit']-$rows_07['tips'];

//$fit_orders=@mysql_query("select * from orders where date_purchased like '%$hr_07%' and orders_status=3 and receipt!=1 and payment_method=1");
if($rows_07['receipt']!=1 && $rows_07['payment_method']==1){
$characters[]=$rows_07['orders_id'];
}

}
$hr_deduct=number_format($hr_sales/$daily_sales*$daily_deduct, 2);
do{
if($hr_deduct>=0){
$x = mt_rand(0, count($characters)-1);
$random_chars= $characters[$x];

@mysql_query("update orders set relate_to=1 where orders_id='$random_chars'");
$t=@mysql_query("select * from orders where orders_id='$random_chars'");
$row_t=mysql_fetch_array($t);

$deduct_value=$row_t['paid_amount']-$row_t['change_amount']+$row_t['credit']-$row_t['tips'];
$hr_deduct=$hr_deduct-$deduct_value;

$chk_07=@mysql_query("select * from orders where check_out like '%$hr_07%' and orders_status=3 and receipt!=1 and payment_method=1 and relate_to!=1");
$num_chk_07=mysql_num_rows($chk_07);
while($rows_chk_=mysql_fetch_array($chk_07)){
$characters[]=$rows_chk_['orders_id'];
}
}

}while($num_chk_07>0 && $hr_deduct>0 );
}

}
//echo number_format($hr_deduct, 2);

}

header("Location: ?content=orders_report");
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
    <td width="440" height="24" valign="middle" class="error"><?php if($_GET['msg']==1){ echo MSG1; }?></td>
    <td width="360" align="right" valign="middle" class="text"><form name="search" action="?" method="get" enctype="multipart/form-data">
      <?php echo YEAR;?>&nbsp;  <input  type="hidden" name="content" value="orders_report" align="absmiddle">
      <select name="year" class="stext">
        <?php for($i=$staring_year; $i<=date("Y"); $i++){ ?> 
        <option value="<?php echo $i;?>" <?php if($i==date("Y")){ echo "selected='selected'"; }?>><?php echo $i;?></option> 
        <?php }?>
        </select> &nbsp; &nbsp; &nbsp; &nbsp; <?php echo MONTH;?>
      <select name="month" class="stext">
        <option value="01"<?php if(date("m")=='01'){ echo "selected='selected'"; }?>><?php echo JAN;?></option>
        <option value="02"<?php if(date("m")=='02'){ echo "selected='selected'"; }?>><?php echo FEB;?></option>
        <option value="03"<?php if(date("m")=='03'){ echo "selected='selected'"; }?>><?php echo MAR;?></option>
        <option value="04"<?php if(date("m")=='04'){ echo "selected='selected'"; }?>><?php echo APRIL;?></option>
        <option value="05"<?php if(date("m")=='05'){ echo "selected='selected'"; }?>><?php echo MAY;?></option>
        <option value="06"<?php if(date("m")=='06'){ echo "selected='selected'"; }?>><?php echo JUN;?></option>
        <option value="07"<?php if(date("m")=='07'){ echo "selected='selected'"; }?>><?php echo JULY;?></option>
        <option value="08"<?php if(date("m")=='08'){ echo "selected='selected'"; }?>><?php echo AUG;?></option>
        <option value="09"<?php if(date("m")=='09'){ echo "selected='selected'"; }?>><?php echo SEP;?></option>
        <option value="10"<?php if(date("m")=='10'){ echo "selected='selected'"; }?>><?php echo OCT;?></option>
        <option value="11"<?php if(date("m")=='11'){ echo "selected='selected'"; }?>><?php echo NOV;?></option>
        <option value="12"<?php if(date("m")=='12'){ echo "selected='selected'"; }?>><?php echo DEC;?></option>
        </select>
      
      <input type="submit" value="Go"  onclick="Go();"  class="stext"/>
    </form></td>
</tr><form name="form2" action="?content=orders_report" enctype="multipart/form-data" method="post">
      <input type="hidden" name="chk" value="1" />
      <input type="hidden" name="year" value="<?php echo $year;?>" />
      <input type="hidden" name="month" value="<?php echo $month;?>" />
      <input type="hidden" name="search" value="<?php echo $search;?>" />
  <tr>
    <td height="20" colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bar">
      <!--DWLayoutTable-->
      <tr>
        <td width="35" height="20">&nbsp;</td>
        <td width="139" align="left" valign="middle"><?php echo DATE_PURCHASED;?></td>        
        <td width="150" valign="middle" ><?php echo ORDER_NUM;?></td>
        <td width="100" valign="middle" ><?php echo TOTAL;?></td>
        <td width="120" valign="middle" ><?php echo PAYMENT_METHOD;?></td>
        <td width="130" valign="middle" ><?php echo CHECK_OUT_TIME;?></td>
        <td width="126" valign="middle" ><?PHP echo RECEIPT;?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="60" colspan="2" valign="top">
	<?php 
	$i=1;
	while($row=mysql_fetch_array($r1)){
	$purchased=$row['date_purchased'];
	$chk_date="";
	$tmp_sub_total="";
	$t=1;
	$prev_hr="";
	$result=@mysql_query("select * from orders where date_purchased='$purchased' and orders_status=3");
	$num_result=mysql_num_rows($result);
	while($info=mysql_fetch_array($result)){
	
	$tmp_sub_total=$tmp_sub_total+$info['paid_amount']-$info['change_amount']+$info['credit']-$info['tips'];
	?>
	
	<table width="100%" border="0" cellpadding="0" cellspacing="0" <?php if($info['relate_to']==1){ echo "class='error'"; }else{ echo "class='text'";}?>  <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?> >
	  <!--DWLayoutTable-->
	  <tr>
	    <td width="35" height="24" align="center" valign="middle" ><a href="?content=view_order&id=<?php echo $row['orders_id'];?>" target="_blank" ><img src="images/folder.gif" width="16" height="16" border="0" /></a></td>
          <td width="139" align="left" valign="middle"><?php if($chk_date==""){ echo $info['date_purchased']; $chk_date=1;}?></td>          
          <td width="150" valign="middle" class="left"><?php echo $info['order_num']; ?></td>
          <td width="100" valign="middle" >$<?php echo number_format($info['paid_amount']-$info['change_amount']+$info['credit']-$info['tips'], 2); ?></td>
          <td width="120" valign="middle" ><?php echo  get_method($info['payment_method']);?></td>
          <td width="130" valign="middle"><?php echo $info['check_out'];?></td>
	  <td width="99" valign="middle"><?php  if($info['receipt']==1){ echo "Y"; }else{ echo "N"; }?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($num_result==$t){ echo "$".number_format($tmp_sub_total, 2); }?> </td>
	  <td width="27" valign="middle"><a href="?content=orders_report&action=remove&id=<?php echo $info['orders_id'];?>" target="_self" ><img src="images/delete.png"  height="24" width="24" border="0" align="absmiddle"/></a></td>
	  </tr>      
    </table>	
	<?php $i++; $t++;
	
	}}?>	</td>
  </tr>
  <tr>
    <td height="34">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="61" colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
        <tr>
    <td width="140" height="30" align="center" valign="middle" class="text"><?php echo TIPS;?></td>
    <td width="140" align="center" valign="middle" class="text"><?php echo GIFT_CARD;?></td>
    <td width="140" align="center" valign="middle" class="text"><?php echo CREDIT_CARD;?></td>
    <td width="140" align="center" valign="middle" class="text"><?php echo CASH; ?></td>
    <td colspan="3" align="center" valign="middle" class="text"><?php echo TOTAL;?></td>
  </tr>
  <tr>
    <td height="33" align="center" valign="middle" class="text">$<?php echo $tips;?></td>
    <td align="center" valign="middle" class="text">$<?php echo $gift_card_total=number_format($gift_card_total+$extra_credit, 2);?>&nbsp; (<?php echo $num_gift_card;?>)</td>
    <td align="center" valign="middle" class="text">$<?php echo $credit_card_total=number_format($credit_card_total, 2);?>&nbsp; (<?php echo $num_credit_total;?>)</td>
    <td align="center" valign="middle" class="text">$<?php echo $cash_total=number_format($cash_total-$tips, 2);?>&nbsp; (<?php echo $num_cash;?>)</td>
    <td colspan="3" align="center" valign="middle" class="text">$<?php echo $total=number_format($total-$tips+$extra_credit, 2);?>&nbsp; (<?php echo $num_business;?>)</td><input type="hidden" name="total" value="<?php echo $total;?>" />
  </tr>
  <tr>
    <td height="33" align="center" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td align="center" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td align="center" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td align="center" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" align="center" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td height="33" align="right" valign="middle" class="text"><?php if($num_relate>=1){ echo DELETE_PREVIEW; } ?>:  &nbsp; </td>
    <td valign="middle" class="text"><?php  if($num_relate>=1){
		$d_amount=@mysql_query("select * from orders where relate_to=1 and date_purchased like '%$search%'");
	while($row_d_amount=mysql_fetch_array($d_amount)){
	$devalue=$devalue+$row_d_amount['paid_amount']-$row_d_amount['change_amount']+$row_d_amount['credit']-$row_d_amount['tips'];
	
	}
	echo "$".$devalue;
	
	}
	?></td>
    <td align="right" valign="middle" class="text"><?php  echo DEDUCT_AMOUNT;?> : </td>
    <td valign="middle" class="text"><input type="text" size="5"  name="deduct" class="text" /></td>
    <td colspan="3" align="center" valign="middle" class="text"><input type="submit" value="<?php echo DEDUCT;?>" class="text" /></td>
  </tr>
  
  <tr>
    <td height="33" align="center" valign="middle" class="text"><?php if($num_relate>=1){ ?><input type="button" class="text" onclick="window.location='?content=orders_report&action=reset'"  value="<?php echo RESET;?>"/><?php }?></td>
    <td align="center" valign="middle" class="text"><?php if($num_relate>=1){?>
    <input type="button" class="text" onclick="window.location='?content=orders_report&action=comfirm'" value="<?php echo COMFIRM;?>"/><?php }?></td>
    <td align="center" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td align="center" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" align="right" valign="middle" class="text"><input type="button" class="text"  name="back_up" value="<?php echo BACK_UP;?>"  onclick="window.location='?content=orders_report&action=back_up'"/></td>
  </tr>
    </table>
    </td>
  </tr>
    <tr>
    <td height="33" align="center" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td align="center" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td align="center" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td align="center" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" align="center" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
    <tr>
    <td height="33" align="center" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td align="center" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td align="center" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td align="center" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" align="center" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  </form>
</table>

