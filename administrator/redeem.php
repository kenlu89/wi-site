<?php 
if($_GET['action']=="txt_input"){



}else{
$page ="?".$_SERVER['QUERY_STRING']; 
$sec = "25";
include("page_reload.php");
}
if($_POST['chk']==1){

}

?>
<script type="text/javascript">
function search_(){
var ids=document.getElementById("search").value
document.location.href='?content=show_redeem&id='+ids;

}
</script>

<link   href="style_sheet.css" type="text/css"  rel="stylesheet" />
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  
 <form name="form1" action="?content=coupon"  enctype="multipart/form-data" method="post">
 <input type="hidden" name="chk" value="1" />
 
  <tr>
    <td height="32" colspan="7" align="center" valign="middle" class="error"><?php  if($error==1){ echo ERROR_MSG; }?></td>
    </tr>
  <tr>
    <td height="36" colspan="5" align="right" valign="middle"><?php echo REFERENCE_MSG; ?> &nbsp; <input type="text" name="search" id="search" size="35"  class="text"/> &nbsp; &nbsp; </td>
    <td colspan="2" valign="middle"><input type="button" value="<?php echo SEARCH;?>"  onclick="search_()" class="text"/></td>
    </tr>
  <tr>
    <td height="25" colspan="2" valign="middle" class="bar_gray">&nbsp; <?php echo NAME;?></td>
    <td width="108" valign="middle" class="bar_gray"><?php echo TEL;?></td>
    <td width="135" valign="middle" class="bar_gray"><?php echo CARD;?></td>
    <td width="135" valign="middle" class="bar_gray"><?php echo PIN;?></td>
    <td width="108" valign="middle" class="bar_gray"><?php echo IP;?></td>
  <td width="115" valign="middle" class="bar_gray"><?php echo DATE_PURCHASED;?></td>
  </tr><?php $result=@mysql_query("select * from redeem where stats=1 order by code_id asc");
  
  while($rows=mysql_fetch_array($result)){
  ?>
  <tr>
    <td width="30" height="25" valign="middle"><?php if($_GET['id']==$rows['code_id']){?><img src="images/folder_opened.png"  height="25" width="25"/><?php }else{?>
    <a href="?content=redeem&action=txt_input&id=<?php echo $rows['code_id'];?>" target="_self" ><img src="images/green_folder.png" width="25" height="25" /></a><?php }?></td>
    <td width="100" valign="middle"><?php echo $rows['lastname'].", ".$rows['firstname'];?></td>
    <td valign="middle"><?php echo $rows['tel'];?></td>
    <td valign="middle"><?php echo $rows['code'];?></td>
    <td valign="middle"><?php echo $rows['serial'];?></td>
    <td valign="middle"><?php echo $rows['ip'];?></td>
  <td valign="middle"><?php echo $rows['date_added'];?></td>
  </tr><?php if($_GET['id']==$rows['code_id']){?>
  <tr>
    <td height="25" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="5" valign="middle"><input type="radio" name="stats" value="1"  <?php if($rows['stats']==1){ echo "checked=\"checked\""; }?>/> <?php echo PENDING;?> &nbsp; <input type="radio" name="stats" value="2" <?php if($rows['stats']==2){ echo "checked=\"checked\""; }?>/> <?php echo PROCESSING;?> &nbsp; <input type="radio" name="stats" value="3" <?php if($rows['stats']==3){ echo "checked=\"checked\""; }?>/> <?php echo PROCESSED;?> &nbsp; <input type="radio" name="stats"  value="4" <?php if($rows['stats']==4){ echo "checked=\"checked\""; }?>/> <?php echo VOID;?></td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr><?php }?>
  <?php }?>
  <tr>
    <td height="216">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  </form>
</table>
