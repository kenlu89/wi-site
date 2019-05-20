<?php 
if($_POST['chk']==1){
$name="";
$min_expense="";
$sits="";
$stats="";

$ids=$_POST['id'];
 $name=$_POST['table_name'];
 $min_expense=$_POST['min_expense'];
 $sits=$_POST['sits'];
 $stats=$_POST['stats'];
 $times=date("n - j - Y");
 if($sits=="" || $name==""){
  $error=1;
 }else{
 

$done=@mysql_query("update tables set table_name='$name', num_sits='$sits', min_expense='$min_expense', stats='$stats' where ids='$ids'");
if($done){
header("Location: ?content=table&msg=3");
}else{
header("Location: ?content=table&msg=2");
}

}

}
$ids=$_GET['id'];
if($ids==""){
$ids=$_POST['id'];
}

$result=@mysql_query("select * from tables where ids='$ids'");
$name="";
$min_expense="";
$sits="";
$stats="";
$rows=mysql_fetch_array($result);

$name=$rows['table_name'];
$min_expense=$rows['min_expense'];
$sits=$rows['num_sits'];
$stats=$rows['stats'];
if($_GET['action']=="remove"){
$id=$_GET['id'];
@mysql_query("delete from tables where ids='$id'");
header("Location: ?content=table");
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
  <form name="login" action="?content=table_edit" method="post" enctype="multipart/form-data">
  <input type="hidden"  name="id" value="<?php echo $ids;?>" />
  <input type="hidden" name="chk" value="1" />
<tr>
    <td width="20" rowspan="8" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td height="29" colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td width="117" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
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
    <td width="124" height="44" valign="middle"><?php echo TABLE_NAME;?></td>
    <td colspan="4" valign="middle"><input type="text"  class="text" size="35" name="table_name" id="table_name" value="<?php echo $name;?>" />
      *</td>
    <td align="center" valign="middle"><?php echo STATS;?></td>
    <td valign="middle"><select name="stats" class="text">
    <option value="1" <?php if($stats==1){ echo "selected='selected'"; }?>><?php echo OPEN;?></option>
    <option value="2" <?php if($stats==2){ echo "selected='selected'";}?>><?php echo CLOSED;?></option>
    <option value="3" <?php if($stats==3){ echo "selected='selected'";}?>><?php echo IN_USING;?></option>
    </select>    </td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="44" valign="middle"><?php echo NUM_SITS;?></td>
    <td colspan="4" valign="middle"><input type="text"  class="text" size="20" name="sits" id="sits" value="<?php echo $sits;?>"/>
      *</td>
    <td align="center" valign="middle"><?PHP echo MIN_EXPENSE;?></td>
    <td valign="middle"><input type="text"  class="text" size="20" name="min_expense" id="min_expense" value="<?php echo $min_expense;?>"/></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td width="30">&nbsp;</td>
    <td width="44">&nbsp;</td>
    <td width="105">&nbsp;</td>
    <td width="112">&nbsp;</td>
    <td>&nbsp;</td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
    <td height="91">&nbsp;</td>
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

