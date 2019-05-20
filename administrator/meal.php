<?php 
if($_POST['chk']==1){
$meal1="";
$meal2="";
$meal1=$_POST['meal1'];
$meal2=$_POST['meal2'];
$times=date("Y-m-d");
$sort=$_POST['sort'];
$price=$_POST['price'];
	  

$done=@mysql_query("insert into meal(sort_order, date_added, status, price) values('$sort', '$times',  1, '$price')");
$lastId=mysql_insert_id();
@mysql_query("insert into meal_description(meal_name, language_id, meal_id) values('$meal1', 1, '$lastId')");
@mysql_query("insert into meal_description(meal_name, language_id, meal_id) values('$meal2', 3, '$lastId')");
if($done){
header("Location: ?content=meal&msg=1");
}else{
header("Location: ?content=meal&msg=2");
}



 
}
$result=@mysql_query("select * from meal, meal_description where meal.meal_id=meal_description.meal_id and meal_description.language_id='$lan' order by meal_name asc");
if($_GET['action']=="remove"){
$id=$_GET['id'];
@mysql_query("delete from meal where meal_id='$id'");
@mysql_query("delete from meal_description where meal_id='$id'");
header("Location: ?content=meal");
}

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
  <form name="login" action="?content=meal" method="post" enctype="multipart/form-data">
  
  <input type="hidden" name="chk" value="1" />
<tr>
    <td width="20" rowspan="8" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td height="29" colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td width="205" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td width="30">&nbsp;</td>
    <td width="13"></td>
  </tr>
  <tr>
    <td height="29" colspan="6" valign="middle" class="error"><?php if($error==1){ echo MSG2; } if($error==2){ echo MSG2; }?></td>
    <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td width="124" height="44" valign="middle"><?php echo MEAL_NAME_CHINESE;?></td>
    <td colspan="5" valign="middle"><input type="text"  class="text" size="35" name="meal2" id="meal2" value="<?php echo $meal2;?>" />
      *</td>
    <td colspan="2" align="center" valign="middle"><?php echo PRICE;?></td>
    <td valign="middle"><input type="text"  class="text" size="10" name="price" id="price" value="<?php echo $price;?>"/></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td height="44" valign="middle"><?php echo MEAL_NAME_ENG;?></td>
    <td colspan="5" valign="middle"><input type="text"  class="text" size="35" name="meal1" id="meal1" value="<?php echo $meal1;?>"/>
      *</td>
    <td colspan="2" align="center" valign="middle"><?php echo SORT_ORDER;?></td>
    <td valign="middle"><input type="text"  class="text" size="5" name="sort" id="sort" value="<?php echo $sort;?>"/></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td width="30">&nbsp;</td>
    <td width="44">&nbsp;</td>
    <td width="62">&nbsp;</td>
    <td width="43">&nbsp;</td>
    <td width="112">&nbsp;</td>
    <td width="63">&nbsp;</td>
    <td width="54">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td height="33" colspan="9" valign="top" class="error"><?php if($error==2){ echo MSG3; }?></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td height="36" colspan="2" valign="top"><input type="submit" value="<?php echo SUBMIT;?>" class="text" /></td>
    <td colspan="3" valign="top"><input type="reset" value="<?php echo RESET;?>" class="text" /></td>
    <td colspan="4" align="right" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td height="20" colspan="5" valign="bottom" class="titlebar">&nbsp;&nbsp;      <?PHP echo CURRENT_MEAL;?></td>
    <td colspan="3" align="center" valign="bottom"  class="titlebar"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" valign="bottom" class="titlebar"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td></td>
  </tr>
  
  
  
  
  
  <tr>
    <td height="20" colspan="11" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="text">
      <!--DWLayoutTable--><?php 
	 $i=1;
	  while($rows=mysql_fetch_array($result)){ ?>
      <tr>
        <td width="26" height="20" valign="top"<?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><!--DWLayoutEmptyCell-->&nbsp;</td>
            <td width="254" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><?php echo $rows['meal_name'];?></td>
            <td width="218" align="center" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>>$<?php echo $rows['price']; ?></td>
            <td width="131" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><?php  

			
			?></td>
            <td width="79" align="center" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><a  href="?content=meal_edit&id=<?php echo $rows['meal_id'];?>" target="_self" class="red_link">
            <?php echo EDIT;?></a></td>
            <td width="79" align="center" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><a  href="?content=meal&action=remove&id=<?php echo $rows['meal_id'];?>" target="_self" class="red_link" onclick="return comfirms()">
            <?php echo REMOVE;?></a></td>
    </tr>
      <?php $i++; }?>
    </table></td>
<td></td>
</tr>
  <tr>
    <td height="164">&nbsp;</td>
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
    <td></td>
  </tr>
</form>
</table>

