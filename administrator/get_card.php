<?php 
function randomkeys($length)
  {
   $pattern = "1234567890";
   for($i=0;$i<$length;$i++)
   {
     $key .= $pattern{rand(0,9)};
   }
   return $key;
  }


if($_POST['chk']==1){

$code=randomkeys(16);
$num_card=$_POST['num_card'];
if($num_card!=""){

for($i=0; $i<$num_card; $i++){
do{

$chk=@mysql_query("select code from cards_history where code='$code'");

if(mysql_num_rows($chk)>=1){
$code=randomkeys(16);

}else{
$times=date("Y-m-d");
@mysql_query("insert into cards_history(date_added, code) values('$times', '$code')");
}
}while(mysql_num_rows($chk)<=0);

}
}
header("location: ?content=get_card&msg=1");
}

if($_GET['action']=="remove"){
$id=$_GET['id'];
if($id!=""){
@mysql_query("delete from products where products_id='$id'");
@mysql_query("delete from products_description where products_id='$id'");
@mysql_query("delete from products_to_categories where products_id='$id'");
}
}
?>
<script type="text/javascript">
function down(num){
var num1=document.getElementById(num+1).value
var num2=document.getElementById(num).value
document.location.href="?content=categories&id=<?php echo $cate; ?>&ori="+num2+"&swap="+num1
}
function up(num){
var num1=document.getElementById(num-1).value
var num2=document.getElementById(num).value
document.location.href="?content=categories&id=<?php echo $cate; ?>&ori="+num2+"&swap="+num1
}
</script>
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
</script><link   href="includes/style_sheet.css" type="text/css"  rel="stylesheet" />
<table width="800" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable--><form name="form1" action="get_card_export.php" enctype="multipart/form-data" method="post">
  <input type="hidden" name="chk" value="1" />
  <tr>
    <td width="43" height="39">&nbsp;</td>
    <td width="100">&nbsp;</td>
    <td width="100">&nbsp;</td>
    <td width="141">&nbsp;</td>
    <td width="144">&nbsp;</td>
    <td width="33">&nbsp;</td>
    <td width="239">&nbsp;</td>
    </tr>
  <tr>
    <td height="25" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle"><?php echo NUM_CARDS;?></td>
    <td colspan="2" valign="middle"><input type="text" name="num_card" class="text" size="20" /></td>
    <td valign="middle"><input type="submit" value="<?php echo GO;?>" class="text" /></td>
    <td colspan="2" align="right" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td height="25" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td height="25" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td height="25" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td height="25" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr class="bar">
    <td height="20" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="2" valign="middle"><?php echo DATE_ADDED;?></td>
    <td colspan="3" valign="middle"><?php echo CARD_NUM;?></td>
    <td valign="middle"><?php echo USE_STATS;?></td>
  </tr><?php 
  $result=@mysql_query("select * from cards_history order by ids desc");
  $i=1;
  while($rows=mysql_fetch_array($result)){
  ?>
  <tr <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>>
    <td height="25" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="2" valign="middle"><?php echo $rows['date_added'];?></td>
    <td colspan="3" valign="middle"><?php echo $rows['code'];?></td>
  <td valign="middle"><?php if($rows['stats']==1){ echo "Y"; }else{ echo "N";}?></td>
  </tr><?php $i++; }?>
  <tr>
    <td height="69"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    </tr></form>
</table>
