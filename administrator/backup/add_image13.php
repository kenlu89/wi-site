<?php
	include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName); 
include("config.php");
session_start();
if(!session_is_registered("username")){
		header('location: login.php');
}

 $color=$_POST['color'];
 $current=$_POST['current']; 
 $ids=$_GET['id']; 
session_start();
?>
<script type="text/javascript">
function p_id(){
var ids=document.getElementById("prodcuts_id").value
document.location.href='add_image.php?id='+ids;

}
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link  rel="stylesheet" href="stylesheet.css" type="text/css" />
<title><?php echo TITLES; ?></title>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  
 <form name="form1" action="upload_pic.php"  enctype="multipart/form-data" method="post">
 <input  type="hidden" name="current" value="<?php echo $ids; ?>" />
  <tr>
    <td height="88" colspan="7" valign="middle" class="table_nav"><a href="index.php"><img src="images/Top.png" width="500" height="80" border="0" /></a></td>
    </tr>
  <tr>
    <td width="93" height="18"></td>
    <td width="90"></td>
    <td width="63"></td>
    <td width="192"></td>
    <td width="143"></td>
    <td width="213"></td>
    <td width="4"></td>
  </tr>
  
  <tr>
    <td height="31">&nbsp;</td>
    <td colspan="2" valign="middle" class="Heading">Item Model: </td>
    <td valign="middle" class="style4">
	  <select  name="categories_id"  class="text" id="prodcuts_id" onChange="p_id();">
	    <option value="">-----------</option>
	    <?php 
	$all=@mysql_query("select * from categories, categories_description where categories.parent_id=0 and categories.categories_id=categories_description.categories_id order by categories.categories_id desc");
	while($all_row=mysql_fetch_array($all)){
	?>
	    <option value="<?php echo $all_row['categories_id']; ?>" <?php if($ids==$all_row['categories_id']){ echo "selected='selected'"; }?>><?php echo $all_row['categories_name']; ?></option>
	    <?php 
	}
	?>
      </select>	</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td height="32"></td>
    <td colspan="2" valign="middle" class="Heading">Optional Image :</td>
    <td colspan="3" valign="middle"><embed src="videosen.swf?savefile=video.php&maxsize=51200&limit=jpg|jpeg&bgcolor=4499EE" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="450" height="30"></embed>
      <param name="movie" value="videosen.swf" /></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td height="24"></td>
    <td colspan="5" valign="middle" class="Heading">Description</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="108"></td>
    <td colspan="5" valign="top" class="text"><textarea  name="desc" class="text"   cols="60" rows="6"><?php echo $_SESSION['desc']; ?></textarea></td>
  <td></td>
    </tr>
  
  
  <tr>
    <td height="31"></td>
    <td valign="middle" class="Heading">Location:</td>
    <td colspan="2" valign="middle"><input name="location" type="text" class="text" size="30"  value="<?php echo $_SESSION['location']; ?>"/></td>
    <td valign="middle" class="Heading">Date Issued: </td>
    <td valign="middle"><input type="text" name="date"  class="text" value="<?php echo $_SESSION['date']; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="31"></td>
    <td valign="middle" class="Heading">By:</td>
    <td colspan="2" valign="middle"><input name="taker" type="text" class="text"  value="HotNYCNews/Luiz Rampelotto" size="30" /></td>
    <td valign="middle" class="Heading">Price:</td>
    <td valign="middle"><input name="price" type="text"  class="text" id="price"  value="<?php echo $_SESSION['price']; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="40"></td>
    <td colspan="5" valign="bottom" class="text"><input type="file" name="file" class="text" /> 
      Mediun Picture </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="40"></td>
    <td colspan="5" valign="bottom"><input type="submit" name="submit" value="Submit" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="29"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="25"></td>
    <td colspan="5" valign="top"><span class="Heading">Existing Images:</span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="94"></td>
    <td colspan="5" valign="top">
	  <table width="100%" border="0" cellpadding="0" cellspacing="0">
	    <!--DWLayoutTable-->
	    <?php $pull_pid=@mysql_query("select * from images where parent_id='$ids' order by ids desc");
	  while($row_pull=mysql_fetch_array($pull_pid)){
	  
	  
	  ?>
	    <tr>
	      <td width="115" height="80" valign="top" class="text">
	        <?php 
						  $tmp="../".$row_pull['thumb'];
						  list($width, $height, $type, $w) = getimagesize($tmp);
			if($width>100){

$p_width=(1-($width-100)/$width);
$width=$width*$p_width;
$height=$height*$p_width;
}
if($row_pull['thumb']){
?>
<a href="../<?php echo $row_pull['middium']; ?> " target="_blank">	            
<img src="../<?php echo $row_pull['thumb']; ?>"  width="<?php echo $width; ?>" height="<?php echo $height; ?>" /></a>
<?php }else{?>
<a href="Font.php?id=<?php echo $row_pull['ids']; ?>" target="_self" class="text"><img src="images/thumbnail.jpg" height="120" width="100" /></a>
			<?php }?>			</td>
            <td width="460" valign="top" class="text"><?php echo $row_pull['description']; ?></td>
            <td width="47" align="center" valign="top" class="text">
              <a href="image_edit.php?id=<?php echo $row_pull['ids']; ?>&parent_id=<?php echo $row_pull['parent_id']; ?>"  target="_self" class="left_nav">
            Edit</a></td>
            <td width="79" align="center" valign="top" class="text">
              <a href="image_remove.php?id=<?php echo $row_pull['ids']; ?>&parent_id=<?php echo $row_pull['parent_id']; ?>" target="_self" class="left_nav">Remove</a></td>
          </tr>
	    <tr>
	      <td height="14"></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
	    <?php }?>
      </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="81"></td>
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
