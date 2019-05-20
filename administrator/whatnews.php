<?php 
include("includes/config.php");

if($_POST['chk']==1){
$txt=$_POST['txt'];
$uploaddir = "../tmp_name"; // Where you want the files to upload to - Important: Make sure this folders permissions is 0777!
$allowed_ext = "jpg, gif, png, JPG, GIF, PNG, swf"; // These are the allowed extensions of the files that are uploaded
$max_size = "10000000"; // 50000 is the same as 50kb
$max_height = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$max_width = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$mode=0644;

$ids=$_POST['current'];
$dates=time() + (24 * 60 * 60).'-'.date('Y-m-d');

// Check Entension
$extension = pathinfo($_FILES['file']['name']);
$extension = $extension[extension];
$test1=$uploaddir.'/'."$dates.$extension";
$test='tmp_name'.'/'."$dates.$extension";
rename($_FILES['file']['tmp_name'], $uploaddir.'/'."$dates.$extension");
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
$good=@mysql_query("insert into whatnew(image, txt) values ('$test', '$txt')");
if($good){
echo "<script>alert('Picture has been uploaded.');window.location='whatnews.php';</script>";
}else{
echo "<script>alert('Picture has been uploaded failure.');window.location='whatnews.php';</script>";
}

}else{
echo "<script>alert('Incorrect file extension£¡');window.location='whatnews.php?id=$ids';</script>";
}	
}

?>
<script type="text/javascript">
function p_id(){
var ids=document.getElementById("prodcuts_id").value
document.location.href='size.php?id='+ids;

}
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo LANG;?>" />
<link   href="style_sheet.css" type="text/css"  rel="stylesheet" />
<title><?php echo TITLES; ?></title>
</head>

<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  
 <form name="form1" action="whatnews.php"  enctype="multipart/form-data" method="post">
 <input  type="hidden" name="current" value="<?php echo $ids; ?>" />
 <input type="hidden" name="chk" value="1" />
  <tr>
    <td height="88" colspan="3" valign="top"><?PHP include("top.php");?></td>
  </tr>
  
  
  <tr>
    <td width="10" height="17">&nbsp;</td>
    <td width="738">&nbsp;</td>
    <td width="50">&nbsp;</td>
  </tr>
  <tr>
    <td height="86">&nbsp;</td>
    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="83" height="27">&nbsp;</td>
        <td width="92" valign="middle" class="text">Poster name:</td>
    <td width="563" valign="middle" class="text"><input type="text" name="txt" class="text" size="45" /></td>
    </tr>
      <tr>
        <td height="29">&nbsp;</td>
        <td valign="middle" class="text">Poster</td>
    <td valign="middle"><input type="file" name="file" class="text" /></td>
    </tr>
      <tr>
        <td height="30">&nbsp;</td>
        <td align="center" valign="middle" class="text"><input type="submit"  class="text" value="submit" /></td>
    <td valign="middle" class="text"><input type="reset" class="text" value="reset" /></td>
    </tr>
    </table>    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="93">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  
  <tr>
    <td height="24" colspan="3" valign="top">
	  <table width="100%" border="0" cellpadding="0" cellspacing="0">
	    <!--DWLayoutTable-->
	    <?php $pull_pid=@mysql_query("select * from whatnew ");
	  while($row_pull=mysql_fetch_array($pull_pid)){
	  
	  
	  ?>
	    <tr>
	      <td width="10" height="24">&nbsp;</td>
          <td width="662" valign="middle" class="text">
		  <a  href="../<?php echo $row_pull['image']; ?>" target="_blank" >
		  <?php echo $row_pull['txt']; ?></a></td>
          <td width="126" valign="middle" class="text">
	        <a href="whatnew_remove.php?id=<?php echo $row_pull['ids']; ?>" target="_self" class="left_nav">Remove</a></td>
	      </tr>
  <?php }?>
        </table></td>
  </tr>
  <tr>
    <td height="45">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="34" colspan="3" valign="top"><?php include("bottom.php"); ?></td>
    </tr>
  </form>
</table>
</body>
</html>
