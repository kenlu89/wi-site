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
if($flavor!="" || $flavor1!="" ){

@mysql_query("insert into options (parent_id, options, language_id) values('$pid', '$flavor', 1)"); 

@mysql_query("insert into options (parent_id, options, language_id) values('$pid', '$flavor1', 3)"); 
echo "<script>alert('Products Info has been updated£¡');window.location='Relate.php?id=$current';</script>";	
}

?>
<script type="text/javascript">
function p_id(){
var ids=document.getElementById("prodcuts_id").value
document.location.href='Relate.php?id='+ids;

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
  
 <form name="form1" action="Relate.php"  enctype="multipart/form-data" method="post">
 <input  type="hidden" name="current" value="<?php echo $ids; ?>" />
  <tr>
    <td height="88" colspan="4" valign="middle" class="table_nav"><a href="index.php"><img src="images/Top.png" width="500" height="80" border="0" /></a></td>
  </tr>
  
  
  <tr>
    <td width="100" height="17">&nbsp;</td>
    <td width="127">&nbsp;</td>
    <td width="189">&nbsp;</td>
    <td width="382">&nbsp;</td>
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
    <td valign="middle" class="Heading">Color:</td>
    <td valign="middle"><input name="color" type="text" class="text" id="color" /></td>
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
    <td colspan="3" valign="bottom"><input type="submit" name="submit" value="Submit" /></td>
    </tr>
  <tr>
    <td height="17">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td valign="top"><span class="Heading">Existing Flavor:</span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="24" colspan="4" valign="top">
	  <table width="100%" border="0" cellpadding="0" cellspacing="0">
	    <!--DWLayoutTable-->
	    <?php $pull_pid=@mysql_query("select * from color where parent_id='$ids' order by ids asc");
	  while($row_pull=mysql_fetch_array($pull_pid)){
	  
	  
	  ?>
	    <tr>
	      <td width="100" height="24">&nbsp;</td>
            <td width="127" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
            <td width="191" valign="middle" class="text"><?php echo $row_pull['options']; ?></td>
          <td width="134" valign="middle" class="text">
		  <a href="options_remove.php?id=<?php echo $row_pull['ids']; ?>&parent_id=<?php echo $row_pull['parent_id']; ?>" target="_self" class="left_nav">Remove</a></td>
	      <td width="246">&nbsp;</td>
	    </tr>
  <?php }?>
        </table></td>
  </tr>
  <tr>
    <td height="79">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  </form>
</table>
</body>
</html>
