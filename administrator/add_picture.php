<?php 
$id=$_GET['id'];
if($_POST['chk']==1){
$files=$_FILES['file']['name'];


if($files!=""){
$uploaddir = "../tmp_name"; // Where you want the files to upload to - Important: Make sure this folders permissions is 0777!
$allowed_ext = "jpg, gif, png, JPG, GIF, PNG"; // These are the allowed extensions of the files that are uploaded
$max_size = "10000000"; // 50000 is the same as 50kb
$max_height = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$max_width = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$mode=0644;

$id=$_POST['parent'];
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
@mysql_query("insert into pic(parent_id, image) values('$id', '$test')");
$last_id=mysql_insert_id();
}
header("Location: ../test2.php?id=$last_id&parent=$id");
}

}


if($_GET['action']=="remove" && $_GET['id']!=""){
$id=$_GET['id'];
$parent=$_GET['parent'];
@mysql_query("delete from pic where image_id='$id'");
header("Location: ?content=add_picture&id=$parent&msg=51");
}
?>
<script type="text/javascript">
function confirms()
  {
  var r=confirm("<?php echo WARNING;?>")
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
<table width="800" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="800" height="61" valign="middle">
    <form name="fomr1" action="?content=add_picture" enctype="multipart/form-data" method="post">
    <input type="hidden" name="parent" value="<?php echo $id;?>"><input type="hidden" name="chk" value="1">
    <input type="file" name="file" class="text">
    <input type="submit" value="<?php echo SUBMIT;?>">
    </form>    </td>
  </tr>
  <tr>
    <td height="25" valign="middle" class="bar"><?php echo CURRENT_ALBUM;?></td>
  </tr>
  <tr>
    <td height="331" valign="top">
	
	
	<?php 
	
	
	include("show_pic.php");?></td>
  </tr>
</table>
