<?php 
include("includes/config.php");
$result=mysql_query("select * from artist");

if($_POST['chk']==1){
$files=$_FILES['file']['name'];
 $artist=$_POST['artist'];
 $description=$_POST['description'];
 $times=date("Y-m-d H:i:s"); 



if($files=="" || $files==NULL){
 
@mysql_query("insert into artist(artist, date_added, description) values('$artist', '$times', '$description')");
//@mysql_query("insert into artist(artist, date_added, description) values('$artist', '$times', '$description'");
echo "<script>alert('artist has been added.');window.location='artist.php';</script>";
}else{

$uploaddir = "../tmp_name"; // Where you want the files to upload to - Important: Make sure this folders permissions is 0777!
$allowed_ext = "jpg, gif, png, JPG, GIF, PNG"; // These are the allowed extensions of the files that are uploaded
$max_size = "10000000"; // 50000 is the same as 50kb
$max_height = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$max_width = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$mode=0644;

$ids=$_POST['current'];
$dates=time() + (24 * 60 * 60).'-'.date('Y-m-d');

// Check Entension
$extension = pathinfo($_FILES['file']['name']);
$extension = $extension[extension];
$test1=$uploaddir.'/'."$dates.".$extension;
$test='tmp_name'.'/'."$dates.".$extension;
rename($_FILES['file']['tmp_name'], $uploaddir.'/'."$dates.".$extension);
$allowed_paths = explode(", ", $allowed_ext);
for($i = 0; $i < count($allowed_paths); $i++) {
 if ($allowed_paths[$i] == "$extension") {
 $ok = "1";
 }}			
// Check File Size
if ($ok == "1") {

if($_FILES['file']['size'] > $max_size )
{
print "File size is too big!";
exit;
}
// Check Height & Width

// The Upload Part
if(is_uploaded_file($_FILES['file']['tmp_name']))
{
move_uploaded_file($_FILES['file']['name'],$uploaddir.'/'.$_FILES['file']['name']);
@chmod($test1, $mode); 
}
@mysql_query("insert into artist(artist, date_added, description, image) values('$artist', '$times', '$description', '$test')");
}else{
echo "<script>alert('Incorrect file extension!');window.location='new_artist.php';</script>";
}

}
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
    <td valign="middle" class="text">Artist Name:</td>
    <td valign="middle"><input type="text"  name="artist" size="55" class="text" /></td>
  </tr>
  <tr>
    <td height="163">&nbsp;</td>
    <td valign="top">Artist Description</td>
    <td valign="top"><textarea name="description" rows="10" cols="65" class="text"></textarea></td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td valign="top">Artist's Photo</td>
    <td valign="top"><input  type="file" name="file" class="text" /></td>
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
