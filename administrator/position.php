<?php 
if($_POST['chk']==1){
$title="";
$times="";
 $times=date("j, n, Y");
 $title=$_POST['position'];
 $lv=$_POST['secure'];
 if($title!=""){
@mysql_query("insert into position (title, date_added, security_lv) values('$title', '$times', '$lv')");
}
header("Location: ?content=position");


 
}
$result=@mysql_query("select * from position order by ids desc");
if($_GET['action']=="remove"){
$id=$_GET['id'];
@mysql_query("delete from position where ids='$id'");
header("Location: ?content=position");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo LANG; ?>" />
<title><?php echo TITLE;  ?></title>
<link   href="style_sheet.css" type="text/css"  rel="stylesheet" />
<script type="text/javascript">
function comfirms()
  {
  var r=confirm("<?php echo COMFIRMS;?>")
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
</head>

<body>
<table width="798" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <form name="login" action="?content=position" method="post" enctype="multipart/form-data">
  <input type="hidden" name="chk" value="1" />
  <tr>
    <td width="27" height="20">&nbsp;</td>
    <td width="99">&nbsp;</td>
    <td width="47">&nbsp;</td>
    <td width="104">&nbsp;</td>
    <td width="119">&nbsp;</td>
    <td width="25">&nbsp;</td>
    <td width="13">&nbsp;</td>
    <td width="108">&nbsp;</td>
    <td width="223">&nbsp;</td>
    <td width="33"></td>
  </tr>
  
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="44">&nbsp;</td>
    <td colspan="2" valign="middle" class="text"><?php echo NEW_POSITION;?></td>
    <td colspan="4" valign="middle"><input type="text"  class="text" size="45" name="position" /></td>
    <td valign="middle" class="text"><?php echo SECURITY_LEVEL;?></td>
    <td valign="middle">
    <select name="secure" class="text">
    <option value="1" selected="selected"><?php echo LOW;?></option>
    <option value="2"><?php echo MEDIUM;?></option>
    <option value="3"><?php echo HIGH;?></option>
    </select>    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="63">&nbsp;</td>
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
  <tr>
    <td height="36">&nbsp;</td>
    <td valign="top"><input type="submit" value="<?php echo SUBMIT;?>" class="text" /></td>
    <td colspan="2" valign="top"><input type="reset" value="<?php echo RESET;?>" class="text" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="20" colspan="6" valign="middle" class="bar">&nbsp;&nbsp;<?php echo CURRENT_POSITIION;?></td>
    <td colspan="4" valign="middle" class="bar"><?php echo SECURITY_LEVEL;?></td>
    </tr>
  
  
  
  
  
  <tr>
    <td height="30" colspan="10" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable--><?php while($rows=mysql_fetch_array($result)){ ?>
      <tr>
        <td width="27" height="30">&nbsp;</td>
            <td width="394" valign="middle" class="text"><?php echo $rows['title'];?></td>
            <td width="277" valign="middle" class="text"><?php  
			switch($rows['security_lv']){
			case 1:{
			$secure=LOW;
			break;
			}
			case 2:{
			$secure=MEDIUM;
			break;
			}
			case 3:{
			$secure=HIGH;
			break;
			}default:{
			$secure=LOW;
			}}
			echo $secure; ?></td>
            <td width="100" align="center" valign="middle"><a  href="?content=position&action=remove&id=<?php echo $rows['ids'];?>" target="_self" class="red_link" onclick="return comfirms()"><?php echo REMOVE;?></a></td>
          </tr><?php }?>
    </table></td>
    </tr>
  <tr>
    <td height="42">&nbsp;</td>
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
</body>
</html>
