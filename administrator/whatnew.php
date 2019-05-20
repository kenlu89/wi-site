<?php 
	include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
		header('location: login.php');
}


$r1=@mysql_query("select * from products_description, products where  products_description.products_id=products.products_id  and products_description.language_id=1 order by products.products_id desc");
if($_POST['chk']==1){
@mysql_query("update products set news=''"); 
$cate=array();
$cate=$_POST['pid'];
foreach ($cate as $products=>$value){
@mysql_query("update products set news=1 where products_id='$value' ");
echo "<script>alert('feature has been updated.');window.location='index.php'; </script>";

}

}
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
  
 <form name="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>"  enctype="multipart/form-data" method="post">
 <input  type="hidden" name="chk" value="1" />
  <tr>
    <td height="88" colspan="5" valign="middle" class="table_nav"><a href="index.php"><img src="images/Top.png" width="500" height="80" border="0" /></a></td>
  </tr>
  
  
  <tr>
    <td width="68" height="17">&nbsp;</td>
    <td width="127">&nbsp;</td>
    <td width="189">&nbsp;</td>
    <td width="364">&nbsp;</td>
    <td width="50">&nbsp;</td>
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td valign="middle" class="Heading">Item Model: </td>
    <td colspan="2" valign="middle" class="text">Add/Edit your week special</td>
    <td>&nbsp;</td>
  </tr>
  
  
  <tr>
    <td height="24">&nbsp;</td>
    <td colspan="3" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="text">
      <!--DWLayoutTable-->
      <?php while($rows=mysql_fetch_array($r1)){ ?>
      <tr>
        <td width="170" height="24" valign="middle">
        <input type="checkbox" class="text" name="pid[]"<?php if($rows['news']==1){ echo  "checked='checked'"; } ?>  value="<?php echo $rows['products_id']; ?>" /><?php echo $rows['products_model']; $rows=mysql_fetch_array($r1);?></td>
    <td width="170" valign="middle">
    <input type="checkbox" class="text" name="pid[]"<?php if($rows['news']==1){ echo  "checked='checked'"; } ?> value="<?php echo $rows['products_id']; ?>" /><?php echo $rows['products_model']; $rows=mysql_fetch_array($r1);?></td>
    <td width="170" valign="middle">
    <input type="checkbox" class="text" name="pid[]" <?php if($rows['news']==1){ echo  "checked='checked'"; } ?> value="<?php echo $rows['products_id']; ?>"/><?php echo $rows['products_model']; $rows=mysql_fetch_array($r1);?></td>
    <td width="170" valign="middle">
    <input type="checkbox" class="text" name="pid[]" <?php if($rows['news']==1){ echo  "checked='checked'"; } ?> value="<?php echo $rows['products_id']; ?>"/><?php echo $rows['products_model']; $rows=mysql_fetch_array($r1);?></td>
    </tr><?php }?>
    </table>    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="42">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td height="40"></td>
    <td colspan="2" valign="bottom"><input type="submit" name="submit" value="Submit" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="145"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
</body>
</html>
