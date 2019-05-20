<?php 
$result=@mysql_query("select * from tel_records order by ids desc");

$result_db="";
if($_POST['chk']==1){
$tel="";
$tel=$_POST['tel'];

$chk_tel=@mysql_query("select * from tel_records where tel='$tel'");
$rowT=mysql_fetch_array($chk_tel);

if($rowT['ids']!=""){
$result_db=1;
}else{
$$result_db=0;
header("Location: ?content=tel&msg=1");
}
}

if($tel==""){
 $tel=$_GET['id']; 
}
if($tel!="" && $result_db==""){
$chk_tel=@mysql_query("select * from tel_records where tel='$tel'");
$rowT=mysql_fetch_array($chk_tel);
$result_db=1;
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
  <form name="login" action="?content=tel" method="post" enctype="multipart/form-data">
  
  <input type="hidden" name="chk" value="1" />
<tr>
    <td width="20" rowspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td height="29" colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td width="30">&nbsp;</td>
    <td width="13"></td>
  </tr>
  <tr>
    <td height="29" colspan="5" valign="middle" class="error"><?php if($error==1){ echo MSG2; } if($error==2){ echo MSG2; }?></td>
    <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td width="124" height="44" valign="middle" class="text"><?php echo TEL_SEARCH;?></td>
    <td colspan="4" valign="middle"><input type="text"  class="text" size="35" name="tel" id="tel" />
      *</td>
    <td colspan="4" align="center" valign="middle"><input type="submit" value="<?php echo SUBMIT;?>" class="text"  /></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td height="58">&nbsp;</td>
    <td colspan="10" valign="top"><?php if($result_db==1){ include("tel_box.php"); }?></td>
    <td></td>
  </tr>
  
  <tr>
    <td height="20" colspan="2" valign="bottom" class="titlebar">&nbsp;&nbsp;      <?PHP echo CLIENT_TEL;?></td>
    <td colspan="2" valign="bottom" class="titlebar"><?php echo DATE_ADDED;?></td>
    <td width="129" valign="bottom" class="titlebar"><?php echo CREATED_BY;?></td>
    <td colspan="2" valign="bottom" class="titlebar"><?php echo LAST_EDIT;?></td>
    <td colspan="2" valign="bottom" class="titlebar"><?php echo LAST_EDIT_BY;?></td>
    <td colspan="2" valign="middle" class="titlebar"><?Php echo CLIENT_STATS;?></td>
    <td></td>
  </tr>
  
  
  <tr>
    <td height="20" colspan="11" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="text">
      <!--DWLayoutTable--><?php 
	 $i=1;
	  while($rows=mysql_fetch_array($result)){ ?>
      <tr>
        <td width="11" height="20">&nbsp;</td>
            <td width="130" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><a href="?content=tel&id=<?php echo $rows['tel'];?>" target="_self"><?php echo $rows['tel'];?></a></td>
            <td width="130" align="center" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><?php echo $rows['date_added'];?></td>
            <td width="130" align="center" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><?php  echo $rows['sales'];?></td>
            <td width="130" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><?php  echo $rows['last_edited'];?></td>
            <td width="120" align="center" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><?php $rows['last_edited_sales'];?></td>
          <td width="136" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><?PHP if($rows['stats']==1){ echo GOOD; }else{ echo BAD; }?></td>
      </tr>
      <?php $i++; }?>
    </table></td>
<td></td>
  </tr>
  <tr>
    <td height="140">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="74">&nbsp;</td>
    <td width="54">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="34">&nbsp;</td>
    <td width="96">&nbsp;</td>
    <td width="21">&nbsp;</td>
    <td width="99">&nbsp;</td>
    <td width="106">&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
</form>
</table>

