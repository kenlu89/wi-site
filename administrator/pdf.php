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
?>
<script type="text/javascript">
function p_id(){
var ids=document.getElementById("prodcuts_id").value
document.location.href='pdf.php?id='+ids;

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
  
 <form name="form1" action="pdf_pro.php"  enctype="multipart/form-data" method="post">
 <input  type="hidden" name="current" value="<?php echo $ids; ?>" />
  <tr>
    <td height="88" colspan="4" valign="middle" class="table_nav"><a href="index.php"><img src="images/Top.png" width="500" height="80" border="0" /></a></td>
  </tr>
  
  
  <tr>
    <td width="97" height="17">&nbsp;</td>
    <td width="127">&nbsp;</td>
    <td width="192">&nbsp;</td>
    <td width="382">&nbsp;</td>
    </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td valign="middle" class="Heading">Item Model: </td>
    <td valign="middle" class="style4">
	  <select  name="products_id"  class="text" id="prodcuts_id" onChange="p_id();">
	    <option value="">-----------</option>
	    <?php 
	$all=@mysql_query("select * from categories, categories_description where  categories.categories_id=categories_description.categories_id");
	while($all_row=mysql_fetch_array($all)){
	?>
	    <option value="<?php echo $all_row['categories_id']; ?>" <?php if($ids==$all_row['categories_id']){ echo "selected='selected'"; }?>><?php echo $all_row['categories_name']; ?></option>
	    <?php 
	}
	?>
        </select>	</td>
    <td>&nbsp;</td>
    </tr>
  
  <tr>
    <td height="30"></td>
    <td valign="middle" class="Heading">Title:</td>
    <td valign="middle"><input type="text" name="title" class="text" size="30" /></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="32"></td>
    <td valign="middle" class="Heading">PDF Upload </td>
    <td valign="middle"><input type="file"  name="file" class="text" /></td>
    <td>&nbsp;</td>
    </tr>
  
  <tr>
    <td height="30"></td>
    <td valign="middle" class="Heading">Limit PDF : </td>
    <td valign="middle" class="text"><input type="checkbox" name="stats" class="text" value="1" /></td>
    <td valign="middle" class="text">Only show up, if customers login their account. </td>
  </tr>
  <tr>
    <td height="4"></td>
    <td></td>
    <td></td>
    <td></td>
    </tr>
  
  
  <tr>
    <td height="40"></td>
    <td colspan="3" valign="bottom"><input type="submit" name="submit" value="Submit" /></td>
    </tr>
  <tr>
    <td height="16"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  
  <tr>
    <td height="25">&nbsp;</td>
    <td valign="top"><span class="Heading">Existing PDF:</span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  
  <tr>
    <td height="24" colspan="4" valign="top">
	  <table width="100%" border="0" cellpadding="0" cellspacing="0">
	    <!--DWLayoutTable-->
	    <?php $pull_pid=@mysql_query("select * from pdf where parent_id='$ids' order by ids asc");
	  while($row_pull=mysql_fetch_array($pull_pid)){
	  
	  
	  ?>
	    <tr>
	      <td width="100" height="24">&nbsp;</td>
            <td width="522" valign="middle" class="text"><?php echo $row_pull['title']; ?></td>
            <td width="69" valign="middle" class="text">
		         <a href="pdf_edit.php?id=<?php echo $row_pull['ids']; ?>&parent_id=<?php echo $row_pull['parent_id']; ?>" target="_self" class="left_nav">Edit</a>
			</td>
            <td width="69" valign="middle" class="text">
              <a href="pdf_remove.php?id=<?php echo $row_pull['ids']; ?>&parent_id=<?php echo $row_pull['parent_id']; ?>" target="_self" class="left_nav">Remove</a></td>
	        <td width="38">&nbsp;</td>
	    </tr>
	    <?php }?>
      </table></td>
  </tr>
  <tr>
    <td height="55">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  </form>
</table>
</body>
</html>
