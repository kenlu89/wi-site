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
 $show=@mysql_query("select * from testimonial where ids='$ids'"); 
 $rows=mysql_fetch_array($show);
 
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
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="images" >
  <!--DWLayoutTable-->

  <tr>
    <td width="798" height="88" valign="middle" class="table_nav"><a href="index.php"><img src="images/Top.png" width="500" height="80" border="0" /></a></td>
  </tr>
  
  
  <tr>
    <td height="400" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="399" rowspan="2" valign="top"><img src=../"<?php echo $rows['pic']; ?>" class="text"  /></td>
        <td width="399" height="21">&nbsp;</td>
      </tr>
      <tr>
        <td height="379" valign="top" class="text"><?php echo $rows['txt']; ?><br />
          <br>          <?php echo $rows['txt1']; ?></td>
      </tr>
    </table></td>
    </tr>
</table>
</body>
</html>
