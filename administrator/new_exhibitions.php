<?php 
include("includes/config.php");
$result=mysql_query("select * from exhibitions");

if($_POST['chk']==1){
$files=$_FILES['file']['name'];
 $title=$_POST['artist'];
 $description=$_POST['description'];
 $times=date("Y-m-d H:i:s"); 
@mysql_query("insert into exhibitions(title, date_added, description) values('$title', '$times', '$description')");
//@mysql_query("insert into artist(artist, date_added, description) values('$artist', '$times', '$description'");
echo "<script>alert('exhibitions has been added.');window.location='exhibitions.php';</script>";


}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo LANG; ?>" />
<title><?php echo TITLES;  ?></title>

<script language="javascript" type="text/javascript"  src="../tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode : "textareas"
});
			function showProducts( )
			{
			var newQty =document.getElementById("cate").value;
			document.location.href = 'new_products.php?pid='+newQty+'&id=<?php echo $_GET['id'];?>';
			}
</script>
<script type="text/javascript">
function comfirms()
  {
  var r=confirm("Warning: Are you sure to delete this category?")
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
<link   href="style_sheet.css" type="text/css"  rel="stylesheet" />
</head>

<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="text">
  <!--DWLayoutTable-->
  <form name="form1" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" method="post">
  <input type="hidden" name="chk" value="1" />
  <tr>
    <td height="81" colspan="3" valign="top" class="left"><?php include("top.php"); ?></td>
  </tr>
  <tr>
    <td height="20" colspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td width="28" height="18">&nbsp;</td>
    <td width="109">&nbsp;</td>
    <td width="663">&nbsp;</td>
  </tr>
  <tr>
    <td height="26">&nbsp;</td>
    <td valign="middle" class="text">Title:</td>
    <td valign="middle"><input type="text"  name="artist" size="55" class="text" /></td>
  </tr>
  <tr>
    <td height="163">&nbsp;</td>
    <td valign="top"> Description</td>
    <td valign="top"><textarea name="description" rows="10" cols="65" class="text"></textarea></td>
  </tr>
  <tr>
    <td height="51">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  
  
  <tr>
    <td height="27">&nbsp;</td>
    <td valign="top"><input type="submit" value="submit" class="text" /></td>
    <td valign="top"><input type="reset" value="reset"  class="text" /></td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  
  
  
  <tr>
    <td height="35" colspan="3" align="center" valign="middle" class="text"> <?php include("bottom.php"); ?></td>
  </tr></form>
</table>
