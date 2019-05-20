<?php 
	include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
		header('location: login.php');
}

 $flavor=$_POST['flavor'];
 $flavor1=$_POST['flavor1'];
 $pid=$_POST['products_id']; 
 $current=$_POST['current']; 
 $ids=$_GET['id']; 
?>
<script type="text/javascript">
function p_id(){
var ids=document.getElementById("prodcuts_id").value
document.location.href='Front.php?id='+ids;

}
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link  rel="stylesheet" href="stylesheet.css" type="text/css" />
<title><?php echo TITLES; ?></title>
</head>

<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  
 <form name="form1" action="upload_pic.php"  enctype="multipart/form-data" method="post">
 <input  type="hidden" name="current" value="<?php echo $ids; ?>" />
  <tr>
    <td height="88" colspan="5" valign="middle" class="table_nav"><a href="index.php"><img src="images/Top.png" width="500" height="80" border="0" /></a></td>
  </tr>
  
  
  <tr>
    <td width="100" height="17">&nbsp;</td>
    <td width="127">&nbsp;</td>
    <td width="189">&nbsp;</td>
    <td width="36">&nbsp;</td>
    <td width="346" rowspan="7" valign="top">
	<?php $img=@mysql_query("select * from products where products_id='$ids'");
	$row_img=mysql_fetch_array($img);
	?>
	
	<img src="../<?php echo $row_img['products_image1'];?>"  /></td>
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td valign="middle" class="Heading">Item Model: </td>
    <td valign="middle" class="style4">
	  <select  name="products_id"  class="text" id="prodcuts_id" onChange="p_id();">
	    <option value="">-----------</option>
	    <?php 
	$all=@mysql_query("select * from products");
	while($all_row=mysql_fetch_array($all)){
	?>
	    <option value="<?php echo $all_row['products_id']; ?>" <?php if($ids==$all_row['products_id']){ echo "selected='selected'"; }?>><?php echo $all_row['products_model']; ?></option>
	    <?php 
	}
	?>
        </select>	</td>
    <td>&nbsp;</td>
    </tr>
  
  <tr>
    <td height="16"></td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  
  <tr>
    <td height="30"></td>
    <td valign="middle" class="Heading">Front Picture: </td>
    <td valign="middle"><input name="file" type="file" class="text"  /></td>
    <td>&nbsp;</td>
    </tr>
  
  <tr>
    <td height="20"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="40"></td>
    <td colspan="2" valign="bottom"><input type="submit" name="submit" value="Submit" /></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="145"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  </form>
</table>
</body>
</html>
