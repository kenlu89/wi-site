<?php 
if($_POST['chk']==1){
$meal1="";
$meal2="";
$meal1=$_POST['meal1'];
$meal2=$_POST['meal2'];
$times=date("Y-m-d");
$sort=$_POST['sort'];
$price=$_POST['price'];
$ids=$_POST['id'];
$done=@mysql_query("update meal set sort_order='$sort', last_modified='$times', price='$price' where meal_id='$ids'");
@mysql_query("update meal_description set meal_name='$meal1' where meal_id='$ids' and language_id=1");
@mysql_query("update meal_description set meal_name='$meal2' where meal_id='$ids' and language_id=3");
if($done){
header("Location: ?content=meal&msg=1");
}else{
header("Location: ?content=meal&msg=2");
}



 
}
$id=$_GET['id'];
$result=@mysql_query("select * from meal, meal_description where meal.meal_id='$id' and meal_description.language_id=1 and meal_description.meal_id=meal.meal_id");
$result_ch=@mysql_query("select * from  meal_description where meal_id='$id' and language_id=3");
$row_en=mysql_fetch_array($result);
?>
<script type="text/javascript">
function comfirms()
  {
  var r=confirm("<?php echo CONFIRM;?>")
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
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="text">
  <!--DWLayoutTable-->  
  <form name="login" action="?content=meal_edit" method="post" enctype="multipart/form-data">
  
  <input type="hidden" name="chk" value="1" />
  <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<tr>
    <td width="20" rowspan="8" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td height="29" colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td width="205" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td width="43">&nbsp;</td>
    </tr>
  <tr>
    <td height="29" colspan="5" valign="middle" class="error"><?php if($error==1){ echo MSG2; } if($error==2){ echo MSG2; }?></td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td width="124" height="44" valign="middle"><?php echo MEAL_NAME_CHINESE;?></td>
    <td colspan="4" valign="middle"><input type="text"  class="text" size="35" name="meal2" id="meal2" value="<?php $rowCH=mysql_fetch_array($result_ch); echo $rowCH['meal_name'];?>" />
      *</td>
    <td align="center" valign="middle"><?php echo PRICE;?></td>
    <td valign="middle"><input type="text"  class="text" size="10" name="price" id="price" value="<?php echo $row_en['price'];?>"/></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="44" valign="middle"><?php echo MEAL_NAME_ENG;?></td>
    <td colspan="4" valign="middle"><input type="text"  class="text" size="35" name="meal1" id="meal1" value="<?php   echo $row_en['meal_name']; $sort=$row_en['sort_order'];?>"/>
      *</td>
    <td align="center" valign="middle"><?php echo SORT_ORDER;?></td>
    <td valign="middle"><input type="text"  class="text" size="5" name="sort" id="sort" value="<?php echo $sort;?>"/></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td width="30">&nbsp;</td>
    <td width="44">&nbsp;</td>
    <td width="105">&nbsp;</td>
    <td width="112">&nbsp;</td>
    <td width="117">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="33" colspan="7" valign="top" class="error"><?php if($error==2){ echo MSG3; }?></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="36" colspan="2" valign="top"><input type="submit" value="<?php echo SUBMIT;?>" class="text" /></td>
    <td colspan="2" valign="top"><input type="reset" value="<?php echo RESET;?>" class="text" /></td>
    <td colspan="3" align="right" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="38">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="64">&nbsp;</td>
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

