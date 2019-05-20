<?php 
include("config.php");
session_start();
if(!session_is_registered("username")){
		header('location: login.php');
}
	include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
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
  
 <form name="form1" action="testimonial_pro.php"  enctype="multipart/form-data" method="post">
 <input  type="hidden" name="current" value="<?php echo $ids; ?>" />
  <tr>
    <td height="88" colspan="6" valign="middle" class="table_nav"><a href="index.php"><img src="images/Top.png" width="500" height="80" border="0" /></a></td>
  </tr>
  
  
  <tr>
    <td width="10" height="24">&nbsp;</td>
    <td colspan="4" valign="bottom" class="Heading">English:</td>
    <td width="346">&nbsp;</td>
  </tr>
  <tr>
    <td height="90">&nbsp;</td>
    <td colspan="4" valign="top"><textarea class="text" cols="60" rows="5" name="txt"> </textarea></td>
    <td rowspan="5" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <?php 
	$show_testimonial=@mysql_query("select * from testimonial");
	while($row_testimonial=mysql_fetch_array($show_testimonial)){
	$i=1;
	?>
      
      
      
      
      
      <tr>
        <td width="175" height="24" valign="top">
          <a href="view_testimonial.php?id=<?php echo $row_testimonial['ids']; ?>" target="_parent" class="H_link">
            Testimonial <?php echo $i; ?>	</a>		</td>
      <td width="171" valign="top"><a href="remove_testimonial.php?id=<?php echo $row_testimonial['ids']; ?>" target="_self" class="H_link">Remove</a></td>
          </tr>
      <?php $i++;  }?>	 
      
      <tr>
        <td >&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
      
      
    </table></td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td colspan="4" valign="bottom" class="Heading">中文：</td>
    </tr>
  <tr>
    <td height="92">&nbsp;</td>
    <td colspan="4" valign="top"><textarea class="text" cols="60" rows="5" name="txt1"> </textarea></td>
    </tr>
  
  
  
  
  
  <tr>
    <td height="33"></td>
    <td width="87"></td>
    <td width="127" valign="middle" class="Heading">Upload Picture: </td>
    <td width="192" valign="middle"><input name="file" type="file" class="text"  /></td>
    <td width="36">&nbsp;</td>
    </tr>
  <tr>
    <td height="24"></td>
    <td></td>
    <td colspan="2" rowspan="2" valign="bottom"><input type="submit" name="submit" value="Submit" /></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="16"></td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
</body>
</html>
