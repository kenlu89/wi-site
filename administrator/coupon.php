<?php 
if($_POST['chk']==1){
 $start=$_POST['startdate'];
 $end=$_POST['enddate']; 
 $code=$_POST['code'];
 $product=$_POST['model']; 
 $amount=$_POST['amount'];
 $min_amount=$_POST['min_amount'];
if($code!="" && $start!="" && $end!="" && $amount!=""){

$chk=@mysql_query("select code from coupon where code='$code'");
if(mysql_num_rows($chk)>=1){
$error=1;
}else{
@mysql_query("insert into coupon (startdate, enddate, code, products, amount, min_amount) values('$start', '$end', '$code', '$model', '$amount', '$min_amount')"); 

echo "<script>alert('coupon has been created£¡');window.location='?content=coupon';</script>";	
}
}
}

if($_GET['action']=="remove" && $_GET['id']!=""){
@mysql_query("delete from coupon where ids=".$_GET['id']);
header("Location: ?content=coupon");
}
?>
<script type="text/javascript">
function p_id(){
var ids=document.getElementById("prodcuts_id").value
document.location.href='size.php?id='+ids;

}
</script>

<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  
 <form name="form1" action="?content=coupon"  enctype="multipart/form-data" method="post">
 <input type="hidden" name="chk" value="1" />
 
  <tr>
    <td height="32" colspan="11" align="center" valign="middle" class="error"><?php  if($error==1){ echo ERROR_MSG; }?></td>
    </tr>
  <tr>
    <td width="9" height="24">&nbsp;</td>
    <td width="89">&nbsp;</td>
    <td width="123" valign="middle" class="Heading"><?php echo MODEL;?></td>
    <td colspan="2" valign="middle" class="text"><select name="model" class="text">
	<option value="" ><?php echo ALL_PRODUCTS;?></option><?php 

	$products=@mysql_query("select * from  products order by products_id desc");
	while($row_products=@mysql_fetch_array($products)){?>
	<option value="<?php echo $row_products['products_model']; ?>"><?php echo $row_products['products_model'];?></option>
	
	<?php 
	}

	?>
	</select>	</td>
    <td colspan="3" valign="middle" class="Heading"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  
  
  
  <tr>
    <td height="30"></td>
    <td></td>
    <td valign="middle" class="Heading"><?php echo COUPON_CODE;?></td>
    <td colspan="8" valign="middle"><input name="code" type="text" class="text" id="code" size="60" /></td>
    </tr>
  
  <tr>
    <td height="28"></td>
    <td></td>
    <td valign="middle" class="Heading"><?php echo START_DATE;?></td>
    <td colspan="2" valign="middle" class="text"><input type="text" name="startdate" class="text" />
      MM-DD-YY</td>
    <td colspan="2" align="right" valign="middle" class="Heading"><?php echo END_DATE;?></td>
    <td colspan="4" valign="middle"><input type="text" name="enddate" class="text" />      <span class="text">MM-DD-YY</span></td>
  </tr>
  <tr>
    <td height="28"></td>
    <td></td>
    <td valign="middle" class="Heading"><?php echo AMOUNT;?></td>
    <td colspan="2" valign="middle" class="text"><input type="text" name="amount" class="text" /></td>
    <td colspan="2" align="right" valign="middle" class="Heading"><?php echo MIN_AMOUNT;?></td>
    <td colspan="4" valign="middle"><input name="min_amount" type="text" class="text" id="min_amount" /></td>
  </tr>
  
  
  <tr>
    <td height="40"></td>
    <td></td>
    <td colspan="9" valign="bottom"><input type="submit" name="submit" value="<?php echo SUBMIT;?>" /></td>
    </tr>
  <tr>
    <td height="17">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="147">&nbsp;</td>
    <td width="57">&nbsp;</td>
    <td width="92">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="13">&nbsp;</td>
    <td width="74">&nbsp;</td>
    <td width="124">&nbsp;</td>
    <td width="63">&nbsp;</td>
  </tr>
  <tr class="bar">
    <td height="25">&nbsp;</td>
    <td colspan="2" valign="middle"><span class="Heading"><?php echo EXISTING_COUPON;?></span></td>
    <td valign="middle" class="Heading"><?php echo START_DATE;?></td>
    <td colspan="2" valign="middle" class="Heading"><?php echo END_DATE;?></td>
    <td colspan="3" align="center" valign="middle" class="Heading"><?php echo TO;?></td>
    <td align="center" valign="middle" class="Heading"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td height="24" colspan="11" valign="top">
	  <table width="100%" border="0" cellpadding="0" cellspacing="0">
	    <!--DWLayoutTable-->
	    <?php $pull_pid=@mysql_query("select * from coupon");
	  while($row_pull=mysql_fetch_array($pull_pid)){
	  
	  
	  ?>
	    <tr>
	      <td width="10" height="24">&nbsp;</td>
          <td width="217" valign="middle" class="text"><?php echo $row_pull['code']; echo "---- $".$row_pull['amount'];?></td>
          <td width="140" valign="middle" class="text"><?php echo $row_pull['startdate']; ?></td>
            <td width="150" valign="middle" class="text"><?php echo $row_pull['enddate']; ?></td>
            <td width="256" align="center" valign="middle" class="text"><?php if($row_pull['products']==""){ echo ALL_PRODUCTS; }else{ $product=@mysql_query("select * from products_description where products_id=".$row_pull['products']); $row_item=mysql_fetch_array($product); if($row_item){ echo $row_item['products_name'];  }} ?></td>
            <td width="49" valign="middle" class="text">
	        <a href="?content=coupon&action=remove&id=<?php echo $row_pull['ids']; ?>&parent_id=<?php echo $row_pull['parent_id']; ?>" target="_self" class="left_nav">Remove</a></td>
	      </tr>
  <?php }?>
        </table></td>
  </tr>
  <tr>
    <td height="79">&nbsp;</td>
    <td>&nbsp;</td>
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
