<?php 
	include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
		header('location: login.php');
}

 $ids=$_GET['id']; 
 $image=@mysql_query("select * from download_list where parent_id='$ids'");
 
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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link  rel="stylesheet" href="stylesheet.css" type="text/css" />
<title><?php echo TITLES; ?></title>
</head>

<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  
 <form name="form1" action="upload_pic.php"  enctype="multipart/form-data" method="post">
 <input  type="hidden" name="current" value="<?php echo $ids; ?>" />
  <tr>
    <td height="88" colspan="3" valign="middle" class="table_nav"><a href="index.php"><img src="images/Top.png" width="500" height="80" border="0" /></a></td>
  </tr>
  
  
  <tr>
    <td width="44" height="60">&nbsp;</td>
    <td width="706">&nbsp;</td>
    <td width="48">&nbsp;</td>
  </tr>
  <tr>
    <td height="48">&nbsp;</td>
    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="images">
      <!--DWLayoutTable-->
      <tr>
        <td width="183" height="24" valign="middle" bgcolor="#3083FD" class="Heading_wh">Date Download</td>
    <td width="523" align="center" valign="middle" bgcolor="#3083FD" class="Heading_wh">Image</td>
    </tr><?php 
	while($row=mysql_fetch_array($image)){
	?>
      <tr>
        <td height="24" valign="middle" class="text"><?php echo $row['download_date']; ?></td>
    <td align="center" valign="middle" class="text"><a href="../<?php echo $row['image']; ?>" target="_blank"  class="left">View</a></td>
    </tr>
    <?php }?>
    </table>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="217">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
</body>
</html>
