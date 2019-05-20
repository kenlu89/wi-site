<?php 
include("includes/config.php");
if($_GET['id']==""){
$ids=$_POST['parent'];
}else{
$ids=$_GET['id'];
}
$r1=@mysql_query("select * from products_options where language_id=1 ");
if($_POST['chk']==1){
$opt=$_POST['opt'];
@mysql_query("update products_options set products_options_name='$opt' where products_options_id='$ids'");
echo "<script>alert('Option has been updated.');window.location='edit_option.php?id=$ids';</script>";
}
if($_POST['chk']==2){
$opt=$_POST['option'];
$done=@mysql_query("insert into products_options_values(language_id, products_options_values_name) values('1', '$opt')");
@mysql_query("insert into products_options_values_to_products_options (products_options_id, products_options_values_id) values('$ids', LAST_INSERT_ID())");   
header("Location: edit_option.php?id=".$ids);
}
$option=@mysql_query("select * from  products_options where language_id=1 and  products_options_id=".$ids);
$result=mysql_fetch_array($option);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo LANG; ?>" />
<title><?php echo TITLES;  ?></title>
<link   href="style_sheet.css" type="text/css"  rel="stylesheet" />
<script type="text/javascript">
function comfirms()
  {
  var r=confirm("Warning: Are you sure to delete this?")
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
<script src="dataentry.js"></script>
<script type="text/javascript">
function comfirms()
  {
  var r=confirm("Warning: Are you sure to delete this?")
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
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  <tr>
    <td width="800" height="81" valign="top" class="left"><?php include("top.php"); ?></td>
  </tr>
  <tr>
    <td height="15">&nbsp;</td>
  </tr>
  <tr>
    <td height="234" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="800" height="237" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="box">
          <!--DWLayoutTable-->
          <tr>
            <td height="20" colspan="5" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bar">
              <!--DWLayoutTable-->
              <tr>
                <td width="24" height="20" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      <td width="774" valign="middle" class="Heading_wh"><strong>Manage Option Group</strong></td>
                    </tr>
              </table>            </td>
              </tr><form name="rename" action="<?php echo $_SERVER['PHP_SELF'];?>"  enctype="multipart/form-data"  method="post">
              <input  type="hidden" name="chk" value="1" />
              <input type="hidden" name="parent" value="<?php echo $_GET['id'];?>" />
          <tr>
            <td width="24" height="60">&nbsp;</td>
              <td colspan="4" valign="middle" class="mtext">Option Group: 
                <input type="text" name="opt" class="text" size="35"  value="<?php echo $result['products_options_name'];?>"/></td>
          </tr>
          
          <tr>
            <td height="30"></td>
            <td width="78" align="center" valign="middle"><input type="submit" value="rename" class="mtext" /></td>
            <td width="74" align="center" valign="middle"><input type="button" name="back" value="back" class="mtext" /></td>
            <td width="493"></td>
            <td width="129"></td>
          </tr></form>
          <tr>
            <td height="15"></td>
            <td>&nbsp;</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td height="18"></td>
            <td colspan="4" valign="middle" class="bar">&nbsp;&nbsp;Attributes for this Option Group</td>
          </tr><?php 
		  $attribute=@mysql_query("select * from products_options_values_to_products_options, products_options_values where products_options_values.products_options_values_id=products_options_values_to_products_options.products_options_values_id and  products_options_values.language_id=1 and products_options_values_to_products_options.products_options_id=".$ids);
			$i=1;
			while($show_option=mysql_fetch_array($attribute)){
			?>
          <tr>
            <td height="20"></td>
            <td colspan="3" valign="middle" class="mtext" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?> >&nbsp;&nbsp;&nbsp;&nbsp;              <?php 
			
			echo $show_option['products_options_values_name']."<br>";

			?>            </td>
          <td align="center" valign="middle"   <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>>
          <a href="opt_remove.php?id=<?php echo $show_option['products_options_values_id'];?>&parent=<?php echo $_GET['id'];?>"  target="_self" class="left_nav" onclick="return comfirms()">remove</a></td>
          </tr><?php  $i++;}?>
          <tr>
            <td height="49"></td>
            <td colspan="4" valign="middle" class="mtext"><br />
            Add attribute<br /><form name="add_opt" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" method="post">
           <input type="hidden" name="chk" value="2" />
           <input type="hidden" name="parent" value="<?php echo $_GET['id'];?>" />
            <input type="text" name="option"    class="mtext" size="35" /> <input type="submit" value="add" class="mtext"  onclick="data_entered(this.value)"/> <span id="txtHint"></span>
            </form>            </td>
            </tr>
          <tr>
            <td height="72"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          

          
          
          
          
          
          
        </table></td>
        </tr>
      
      
      
      
      
      
    </table></td>
  </tr>
  <tr>
    <td height="35" align="center" valign="middle" class="text"> <?php include("bottom.php"); ?></td>
  </tr>
</table>
</body>
</html>
