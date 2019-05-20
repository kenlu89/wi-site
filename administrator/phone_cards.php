<script language="javascript" type="text/javascript">
			function showProducts( )
			{
			var newQty =document.getElementById("cate").value;
			document.location.href = '?content=phone_cards&pid='+newQty;
			}
</script>

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
<?php 
$ip=$_SERVER['REMOTE_ADDR'];
//if($ip=="129.44.51.83" || $ip=="127.0.0.1"){
if($_POST['chk']==1){
$error=array();
$file=$_FILES['file']['name'];
$extension = pathinfo($_FILES['file']['name']);
$extension = $extension[extension];
$uploaddir= "tmp_xls";
if($file!="" && $extension=="xls"){
require_once 'Excel/reader.php';
$data = new Spreadsheet_Excel_Reader();
$mode=0644;
$cate=$_POST['cate'];

function randomkeys($length)
  {
   $pattern = "QWERTYUIOPLKJHGFDSAZXCVBNM1234567890";
   for($i=0;$i<$length;$i++)
   {
     $key .= $pattern{rand(0,35)};
   }
   return $key;
  }
  
if($tmp_==""){
$tmp_=randomkeys(8);
}
$test1=$uploaddir.'/'.$tmp_.".xls";
rename($_FILES['file']['tmp_name'], $uploaddir.'/'."$tmp_.$extension");	

if(is_uploaded_file($_FILES['file']['tmp_name']))
{
move_uploaded_file($_FILES['file']['name'],$uploaddir.'/'.$_FILES['file']['name']);
@chmod($test1, $mode); 

}

//$data->read($file);
$data->read($test1);
error_reporting(E_ALL ^ E_NOTICE);




for ($j = 1; $j <= $data->sheets[0]['numRows']; $j++){
	 
$tel=$data->sheets[0]['cells'][$j+1][2];
$pin=$data->sheets[0]['cells'][$j+1][1];
$parent_id=$data->sheets[0]['cells'][$j+1][3];
if($parent_id){
@mysql_query("insert into  phone_cards(serial_num, txt, date_added, parent_id) values('$tel', '$pin', now(), '$cate')");
}
}
unlink($test1);

}
}


$id="";
$id=$_GET['id'];
$card=@mysql_query("select * from phone_cards where ids='$id'");
$row_card=mysql_fetch_array($card);

if($_POST['chk']==1){
$cardnum=$_POST['cardnum'];
$pin_num=$_POST['pin_num'];
$stats=$_POST['stats'];
$id=$_POST['id'];
$client=$_POST['client'];
if($stats==0){
@mysql_query("update phone_cards set sold_to='' where ids='$id'");
}
$done=@mysql_query("update  phone_cards set txt='$cardnum', serial_num='$pin_num', stats='$stats' where ids='$id'");
if($done){
header("Location: ?content=phone_cards&msg=1");
}else{
header("Location: ?content=phone_cards&msg=2");
}
}

if($_GET['action']=="remove"){
$id=$_GET['id'];
$chk_=@mysql_query("select stats  from phone_cards where ids='$id'");
$row_chk=mysql_fetch_array($chk_);

if($row_chk['stats']==1){
header("Location: ?content=phone_cards&msg=51&pid=".$_GET['pid']);
}else{
@mysql_query("delete from phone_cards where ids='$id'");
header("Location: ?content=phone_cards&msg=1&pid=".$_GET['pid']);
}
}
?>
<table width="798" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <form name="form1"  action="?content=phone_cards" enctype="multipart/form-data" method="post">
  <input type="hidden"  name="chk" value="1" />
<?php if($_GET['action']=="edit"){?>
  <tr>
    <td height="46" colspan="8" align="center" valign="bottom">
	<?php include("card_update.php");?></td>
    <td width="14">&nbsp;</td>
  </tr><?php }?>
  <tr>
    <td width="36" height="20">&nbsp;</td>
    <td colspan="7" valign="top"><a href="?content=quick_update" target="_self" class="red_link"><?php echo QUICK_UPDATE;?></a> | <a href="?content=view_inventory" target="_self" class="red_link"><?php echo VIEW_INVENTORY;?></a><div class="error" style="text-align:center;">
    <?php 
	if($_GET['msg']==1){
	echo "<br>".DONE_MSG;
	}else if($_GET['msg']==51){
	echo "<br>".ERROR_MSG;
	}
	?></div>    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="26">&nbsp;</td>
    <td colspan="7" align="right" valign="bottom"><select  name="cate" class="text"  id="cate" onchange="showProducts()">
      <option value="" <?php if($_GET['pid']==""){ echo "selected=\"selected\""; }?>><?php echo ALL_PRODUCTS;?></option>
      <?php 
$products=@mysql_query("select * from products_description, products, products_to_categories where products.products_id=products_description.products_id and products.products_id=products_to_categories.products_id and products_to_categories.categories_id=2 and products_description.language_id='$lan' ");

while($row_products=mysql_fetch_array($products)){
$total_cards="";
$sold_cards="";
$available_cards="";

$total_cards=@mysql_query("select count(*) as total from phone_cards where parent_id='".$row_products['products_id']."'");
$row_total_cards=mysql_fetch_array($total_cards);

$sold_cards=@mysql_query("select count(*) as sold from phone_cards where parent_id='".$row_products['products_id']."' and stats=1");
$row_sold_cards=mysql_fetch_array($sold_cards);

$available_cards=@mysql_query("select count(*) as available from phone_cards where parent_id='".$row_products['products_id']."' and stats=0");
$row_available_cards=mysql_fetch_array($available_cards);
?>
      <option value="<?php echo $row_products['products_id']; ?>" <?php if($_GET['pid']==$row_products['products_id']){ echo "selected=\"selected\""; }?>><?php echo "[".$row_products['products_id']."]"; echo $row_products['products_name']; echo " [ ".TOTAL.$row_total_cards['total']." ] "; echo " [ ".SOLD.$row_sold_cards['sold']." ] "; echo " [ ".AVAILABLE.$row_available_cards['available']." ]";?></option>
      <?php 
  }
  ?>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td colspan="7" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="1">
      <!--DWLayoutTable-->
      <tr>
        <td width="180" height="23" align="center" valign="middle"  class="bar_gray"><?php echo CARD_NUM;?></td>
      <td width="120" align="center" valign="middle"  class="bar_gray"><?php echo PIN_NUM;?></td>
      <td width="125" align="center" valign="middle"  class="bar_gray"><?php echo DATE_ADDED;?></td>
      <td width="68" align="center" valign="middle" class="bar_gray"><?php echo STATS;?></td>
      <td width="120" align="center" valign="middle"  class="bar_gray"><?php echo SOLD_TO;?></td>
      <td width="128" align="center" valign="middle"  class="bar_gray"><?php echo ACTION;?></td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr><?Php 
  $i=1;
    if($_GET['pid']!=""){
 $asort=" where parent_id=".$_GET['pid'];
  }
  $cards=@mysql_query("select * from phone_cards ".$asort);
  while($row_cards=mysql_fetch_array($cards)){
  ?>
  <tr >
    <td height="24">&nbsp;</td>
    <td width="179" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>>&nbsp; &nbsp; <?php echo $row_cards['txt'];?></td>
    <td width="120" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>>&nbsp; &nbsp; <?php echo $row_cards['serial_num'];?></td>
    <td width="128" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>>&nbsp; &nbsp; <?php echo $date_added=$row_cards['date_added'];?></td>
    <td width="70" align="center" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><?php if($row_cards['stats']==1){ ?><img src="images/radiobox_sold.png"  height="18" width="18" /><?php  }else if($row_cards['stats']==0){ ?><img src="images/radiobox.png"  height="18" width="18"/><?php }?></td>
    <td width="120" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>>&nbsp; &nbsp; <?php if($row_cards['sold_to']!=""){ $sold_to=@mysql_query("select * from customers where customers_id=".$row_cards['sold_to']); if(mysql_num_rows($sold_to)>=1){ $row_sold=mysql_fetch_array($sold_to); echo $client=$row_sold['customers_lastname']." ".$row_sold['customers_firstname'];}else{ echo UNKNOWN; }}?></td>
    <td width="63" align="center" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><a href="?content=phone_cards&action=edit&id=<?php echo $row_cards['ids'];?>" target="_self" class="red_link"><?php echo EDIT;?></a></td>
    <td width="68" align="center" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><a href="?content=phone_cards&action=remove&id=<?php echo $row_cards['ids'];?>" target="_self" class="red_link"  onclick="return comfirms();"><?php echo REMOVE;?></a></td>
    <td>&nbsp;</td>
  </tr>
  <?php 
 $i++;  }
  ?><div id="txt"></div>
  <tr>
    <td height="105">&nbsp;</td>
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

<div id="backgroundPopup"></div>
<?php
/*
}else{
echo PRIVILEGE_MSG;
 }*/?>

