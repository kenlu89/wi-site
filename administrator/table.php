<?php 
if($_POST['chk']==1){
$name="";
$min_expense="";
$sits="";
$stats="";

$name=$_POST['table_name'];
$min_expense=$_POST['min_expense'];
$sits=$_POST['sits'];
$stats=$_POST['stats'];
 $times=date("n - j - Y");
 if($sits=="" || $name==""){
 $error=1;
 }else{
 if($name!=""){
 $chk=@mysql_query("select * from tables where table_name='$name'");
 $chk_row=mysql_num_rows($chk);
 if($chk_row<=0){

$done=@mysql_query("insert into tables(table_name, num_sits, min_expense, stats, date_added) values('$name', '$sits',  '$min_expense', '$stats', '$times')");
if($done){
header("Location: ?content=table&msg=1");
}else{
header("Location: ?content=table&msg=2");
}
}else{
 $error=2; 
 global $error;
}
}
}



 
}
$result=@mysql_query("select * from tables order by table_name asc");
if($_GET['action']=="remove"){
$id=$_GET['id'];
@mysql_query("delete from tables where ids='$id'");
header("Location: ?content=table");
}
if($_GET['action']=="reset"){
$done=@mysql_query("update tables set stats=1");
if($done){
header("Location: ?content=table");
}
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
  <form name="login" action="?content=table" method="post" enctype="multipart/form-data">
  
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
    <td width="124" height="44" valign="middle"><?php echo TABLE_NAME;?></td>
    <td colspan="5" valign="middle"><input type="text"  class="text" size="35" name="table_name" id="table_name" value="<?php echo $table_name;?>" />
      *</td>
    <td colspan="2" align="center" valign="middle"><?php echo STATS;?></td>
    <td valign="middle"><select name="stats" class="text">
    <option value="1"><?php echo OPEN;?></option>
    <option value="2"><?php echo CLOSED;?></option>
    <option value="3"><?php echo IN_USING;?></option>
    </select>    </td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td height="44" valign="middle"><?php echo NUM_SITS;?></td>
    <td colspan="5" valign="middle"><input type="text"  class="text" size="20" name="sits" id="sits" value="<?php echo $model;?>"/>
      *</td>
    <td colspan="2" align="center" valign="middle"><?PHP echo MIN_EXPENSE;?></td>
    <td valign="middle"><input type="text"  class="text" size="20" name="min_expense" id="min_expense" value="<?php echo $model;?>"/></td>
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
    <td colspan="4" align="right" valign="top"><input type="button" value="<?php echo DEFAULT_; ?>" class="text" ONCLICK="window.location.href='?content=table&action=reset'"/></td>
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
    <td height="20" colspan="5" valign="bottom" class="titlebar">&nbsp;&nbsp;      <?PHP echo CURRENT_TABLES;?></td>
    <td colspan="3" align="center" valign="bottom"  class="titlebar"><?php echo STATS;?></td>
    <td colspan="3" valign="bottom" class="titlebar"><?php echo LIMIT;?></td>
    <td></td>
  </tr>
  
  
  
  
  
  <tr>
    <td height="30" colspan="11" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="text">
      <!--DWLayoutTable--><?php 
	 
	  while($rows=mysql_fetch_array($result)){ ?>
      <tr>
        <td width="26" height="30">&nbsp;</td>
            <td width="254" valign="middle"><?php echo $rows['table_name'];?></td>
            <td width="218" align="center" valign="middle"><?php if($rows['stats']=1){ echo OPEN; }else if($rows['stats']==2){ echo CLOSED; }else{ echo IN_USING;}?></td>
            <td width="131" valign="middle"><?php  
			echo $rows['num_sits'];
			
			?></td>
            <td width="79" align="center" valign="middle"><a  href="?content=table_edit&id=<?php echo $rows['ids'];?>" target="_self" class="red_link">
      <?php echo EDIT;?></a></td>
            <td width="79" align="center" valign="middle"><a  href="?content=table&action=remove&id=<?php echo $rows['ids'];?>" target="_self" class="red_link" onclick="return comfirms()">
      <?php echo REMOVE;?></a></td>
  </tr>
  <?php }?>
</table></td>
<td></td>
</tr>
<tr>
  <td height="154">&nbsp;</td>
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

