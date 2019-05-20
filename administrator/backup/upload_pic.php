<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);

$uploaddir = "../middium"; // Where you want the files to upload to - Important: Make sure this folders permissions is 0777!
$allowed_ext = "jpg, gif, png, JPG, GIF, PNG"; // These are the allowed extensions of the files that are uploaded
$max_size = "10000000"; // 50000 is the same as 50kb
$max_height = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$max_width = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$mode=0644;

$ids=$_POST['current'];
$parent=$_POST['parent'];
$dates=time() + (24 * 60 * 60).'-'.date('Y-m-d');
$test1=$uploaddir.'/'."$dates.jpg";
$test='middium'.'/'."$dates.jpg";
rename($_FILES['file']['tmp_name'], $uploaddir.'/'."$dates.jpg");
// Check Entension
$extension = pathinfo($_FILES['file']['name']);
$extension = $extension[extension];
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

$good=@mysql_query("update images set middium='$test' where ids='$ids'");
if($good){
echo "<script>alert('Picture has been uploaded.');window.location='../generate.php?id=$ids&parent=$parent';</script>";
}else{
echo "<script>alert('Picture has been uploaded failure.');window.location='add_image.php?id=$ids';</script>";
}


}else{
echo "<script>alert('Incorrect file extension£¡');window.location='Front.php?id=$ids';</script>";
}



?>