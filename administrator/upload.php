 <?php
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);

$temp=$_POST['id'];
$tmp0=$_FILES['file']['name'];
$tmp1=$_FILES['file1']['name'];
$tmp2=$_FILES['file2']['name'];
$tmp3=$_FILES['file3']['name'];
$tmp4=$_FILES['file4']['name'];
$tmp5=$_FILES['file5']['name'];
$tmp6=$_FILES['file6']['name'];
$tmp7=$_FILES['file7']['name'];
$tmp8=$_FILES['file8']['name'];
$tmp9=$_FILES['file9']['name'];
$tmp10=$_FILES['file10']['name'];
$tmp11=$_FILES['file11']['name'];
$tmp12=$_FILES['file12']['name'];

function randomkeys($length)
  {
   $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
   for($i=0;$i<$length;$i++)
   {
     $key .= $pattern{rand(0,35)};
   }
   return $key;
  }


if($tmp0!=""){

// ==============
// Configuration
// ==============
$uploaddir = "../tmp_name"; // Where you want the files to upload to - Important: Make sure this folders permissions is 0777!
$allowed_ext = "jpg, gif, png, JPG, GIF, PNG"; // These are the allowed extensions of the files that are uploaded
$max_size = "10000000"; // 50000 is the same as 50kb
$max_height = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$max_width = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$mode=0644;
$tmp_pass=randomkeys(16);
$dates=time() + (24 * 60 * 60).'-'.date('Y-m-d').'-'.$tmp_pass;
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
$test1=$uploaddir.'/'."$dates.jpg";
$test2="tmp_name".'/'."$dates.jpg";
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
@mysql_query("insert into pic(image, parent_id) values('$test2', '$temp')");
}

}else{
echo "<script>alert('Incorrect file extension£¡');window.location='My_pictures_edit.php';</script>";
}

}

if($tmp1!=""){

// ==============
// Configuration
// ==============
$uploaddir = "../tmp_name"; // Where you want the files to upload to - Important: Make sure this folders permissions is 0777!
$allowed_ext = "jpg, gif, png, JPG, GIF, PNG"; // These are the allowed extensions of the files that are uploaded
$max_size = "10000000"; // 50000 is the same as 50kb
$max_height = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$max_width = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$mode=0644;
$tmp_pass=randomkeys(16);
$dates=time() + (24 * 60 * 60).'-'.date('Y-m-d').'-'.$tmp_pass;
rename($_FILES['file1']['tmp_name'], $uploaddir.'/'."$dates.jpg");
// Check Entension
$extension = pathinfo($_FILES['file1']['name']);
$extension = $extension[extension];
$allowed_paths = explode(", ", $allowed_ext);
for($i = 0; $i < count($allowed_paths); $i++) {
 if ($allowed_paths[$i] == "$extension") {
 $ok = "1";
 }}			
// Check File Size
if ($ok == "1") {
$test1=$uploaddir.'/'."$dates.jpg";
$test2="tmp_name".'/'."$dates.jpg";
if($_FILES['file1']['size'] > $max_size )
{
print "File size is too big!";
exit;
}

// The Upload Part
if(is_uploaded_file($_FILES['file1']['tmp_name']))
{
move_uploaded_file($_FILES['file1']['name'],$uploaddir.'/'.$_FILES['file1']['name']);
@chmod($test1, $mode); 
@mysql_query("insert into pic(image, parent_id) values('$test2', '$temp')");
}

}else{
echo "<script>alert('Incorrect file extension£¡');window.location='My_pictures_edit.php';</script>";
}
}

if($tmp2!=""){
// ==============
// Configuration
// ==============
$uploaddir = "../tmp_name"; // Where you want the files to upload to - Important: Make sure this folders permissions is 0777!
$allowed_ext = "jpg, gif, png, JPG, GIF, PNG"; // These are the allowed extensions of the files that are uploaded
$max_size = "10000000"; // 50000 is the same as 50kb
$max_height = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$max_width = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$mode=0644;
$tmp_pass=randomkeys(16);
$dates=time() + (24 * 60 * 60).'-'.date('Y-m-d').'-'.$tmp_pass;
rename($_FILES['file2']['tmp_name'], $uploaddir.'/'."$dates.jpg");
// Check Entension
$extension = pathinfo($_FILES['file2']['name']);
$extension = $extension[extension];
$allowed_paths = explode(", ", $allowed_ext);
for($i = 0; $i < count($allowed_paths); $i++) {
 if ($allowed_paths[$i] == "$extension") {
 $ok = "1";
 }}			
// Check File Size
if ($ok == "1") {
$test1=$uploaddir.'/'."$dates.jpg";
$test2="tmp_name".'/'."$dates.jpg";
if($_FILES['file2']['size'] > $max_size )
{
print "File size is too big!";
exit;
}

// The Upload Part
if(is_uploaded_file($_FILES['file2']['tmp_name']))
{
move_uploaded_file($_FILES['file2']['name'],$uploaddir.'/'.$_FILES['file2']['name']);
@chmod($test1, $mode); 
@mysql_query("insert into pic(image, parent_id) values('$test2', '$temp')");
}

}else{
echo "<script>alert('Incorrect file extension£¡');window.location='My_pictures_edit.php';</script>";
}
}

if($tmp3!=""){
// ==============
// Configuration
// ==============
$uploaddir = "../tmp_name"; // Where you want the files to upload to - Important: Make sure this folders permissions is 0777!
$allowed_ext = "jpg, gif, png, JPG, GIF, PNG"; // These are the allowed extensions of the files that are uploaded
$max_size = "10000000"; // 50000 is the same as 50kb
$max_height = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$max_width = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$mode=0644;
$tmp_pass=randomkeys(16);
$dates=time() + (24 * 60 * 60).'-'.date('Y-m-d').'-'.$tmp_pass;
rename($_FILES['file3']['tmp_name'], $uploaddir.'/'."$dates.jpg");
// Check Entension
$extension = pathinfo($_FILES['file3']['name']);
$extension = $extension[extension];
$allowed_paths = explode(", ", $allowed_ext);
for($i = 0; $i < count($allowed_paths); $i++) {
 if ($allowed_paths[$i] == "$extension") {
 $ok = "1";
 }}			
// Check File Size
if ($ok == "1") {
$test1=$uploaddir.'/'."$dates.jpg";
$test2="tmp_name".'/'."$dates.jpg";
if($_FILES['file3']['size'] > $max_size )
{
print "File size is too big!";
exit;
}

// The Upload Part
if(is_uploaded_file($_FILES['file3']['tmp_name']))
{
move_uploaded_file($_FILES['file3']['name'],$uploaddir.'/'.$_FILES['file3']['name']);
@chmod($test1, $mode); 
@mysql_query("insert into pic(image, parent_id) values('$test2', '$temp')");
}

}else{
echo "<script>alert('Incorrect file extension£¡');window.location='My_pictures_edit.php';</script>";
}
}

if($tmp4!=""){
// ==============
// Configuration
// ==============
$uploaddir = "../tmp_name"; // Where you want the files to upload to - Important: Make sure this folders permissions is 0777!
$allowed_ext = "jpg, gif, png, JPG, GIF, PNG"; // These are the allowed extensions of the files that are uploaded
$max_size = "10000000"; // 50000 is the same as 50kb
$max_height = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$max_width = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$mode=0644;
$tmp_pass=randomkeys(16);
$dates=time() + (24 * 60 * 60).'-'.date('Y-m-d').'-'.$tmp_pass;
rename($_FILES['file4']['tmp_name'], $uploaddir.'/'."$dates.jpg");
// Check Entension
$extension = pathinfo($_FILES['file4']['name']);
$extension = $extension[extension];
$allowed_paths = explode(", ", $allowed_ext);
for($i = 0; $i < count($allowed_paths); $i++) {
 if ($allowed_paths[$i] == "$extension") {
 $ok = "1";
 }}			
// Check File Size
if ($ok == "1") {
$test1=$uploaddir.'/'."$dates.jpg";
$test2="tmp_name".'/'."$dates.jpg";
if($_FILES['file4']['size'] > $max_size )
{
print "File size is too big!";
exit;
}

// The Upload Part
if(is_uploaded_file($_FILES['file4']['tmp_name']))
{
move_uploaded_file($_FILES['file4']['name'],$uploaddir.'/'.$_FILES['file4']['name']);
@chmod($test1, $mode); 
@mysql_query("insert into pic(image, parent_id) values('$test2', '$temp')");
}

}else{
echo "<script>alert('Incorrect file extension£¡');window.location='My_pictures_edit.php';</script>";
}
}

if($tmp5!=""){
// ==============
// Configuration
// ==============
$uploaddir = "../tmp_name"; // Where you want the files to upload to - Important: Make sure this folders permissions is 0777!
$allowed_ext = "jpg, gif, png, JPG, GIF, PNG"; // These are the allowed extensions of the files that are uploaded
$max_size = "10000000"; // 50000 is the same as 50kb
$max_height = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$max_width = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$mode=0644;
$tmp_pass=randomkeys(16);
$dates=time() + (24 * 60 * 60).'-'.date('Y-m-d').'-'.$tmp_pass;
rename($_FILES['file5']['tmp_name'], $uploaddir.'/'."$dates.jpg");
// Check Entension
$extension = pathinfo($_FILES['file5']['name']);
$extension = $extension[extension];
$allowed_paths = explode(", ", $allowed_ext);
for($i = 0; $i < count($allowed_paths); $i++) {
 if ($allowed_paths[$i] == "$extension") {
 $ok = "1";
 }}			
// Check File Size
if ($ok == "1") {
$test1=$uploaddir.'/'."$dates.jpg";
$test2="tmp_name".'/'."$dates.jpg";
if($_FILES['file5']['size'] > $max_size )
{
print "File size is too big!";
exit;
}

// The Upload Part
if(is_uploaded_file($_FILES['file5']['tmp_name']))
{
move_uploaded_file($_FILES['file5']['name'],$uploaddir.'/'.$_FILES['file5']['name']);
@chmod($test1, $mode); 
@mysql_query("insert into pic(image, parent_id) values('$test2', '$temp')");
}

}else{
echo "<script>alert('Incorrect file extension£¡');window.location='My_pictures_edit.php';</script>";
}
}

if($tmp6!=""){
// ==============
// Configuration
// ==============
$uploaddir = "../tmp_name"; // Where you want the files to upload to - Important: Make sure this folders permissions is 0777!
$allowed_ext = "jpg, gif, png, JPG, GIF, PNG"; // These are the allowed extensions of the files that are uploaded
$max_size = "10000000"; // 50000 is the same as 50kb
$max_height = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$max_width = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$mode=0644;
$tmp_pass=randomkeys(16);
$dates=time() + (24 * 60 * 60).'-'.date('Y-m-d').'-'.$tmp_pass;
rename($_FILES['file6']['tmp_name'], $uploaddir.'/'."$dates.jpg");
// Check Entension
$extension = pathinfo($_FILES['file5']['name']);
$extension = $extension[extension];
$allowed_paths = explode(", ", $allowed_ext);
for($i = 0; $i < count($allowed_paths); $i++) {
 if ($allowed_paths[$i] == "$extension") {
 $ok = "1";
 }}			
// Check File Size
if ($ok == "1") {
$test6=$uploaddir.'/'."$dates.jpg";
if($_FILES['file6']['size'] > $max_size )
{
print "File size is too big!";
exit;
}

// The Upload Part
if(is_uploaded_file($_FILES['file6']['tmp_name']))
{
move_uploaded_file($_FILES['file6']['name'],$uploaddir.'/'.$_FILES['file6']['name']);
@chmod($test1, $mode); 
@mysql_query("insert into pic(image, parent_id) values('$test2', '$temp')");
}

}else{
echo "<script>alert('Incorrect file extension£¡');window.location='My_pictures_edit.php';</script>";
}
}

if($tmp7!=""){
// ==============
// Configuration
// ==============
$uploaddir = "../tmp_name"; // Where you want the files to upload to - Important: Make sure this folders permissions is 0777!
$allowed_ext = "jpg, gif, png, JPG, GIF, PNG"; // These are the allowed extensions of the files that are uploaded
$max_size = "10000000"; // 50000 is the same as 50kb
$max_height = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$max_width = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$mode=0644;
$tmp_pass=randomkeys(16);
$dates=time() + (24 * 60 * 60).'-'.date('Y-m-d').'-'.$tmp_pass;
rename($_FILES['file7']['tmp_name'], $uploaddir.'/'."$dates.jpg");
// Check Entension
$extension = pathinfo($_FILES['file7']['name']);
$extension = $extension[extension];
$allowed_paths = explode(", ", $allowed_ext);
for($i = 0; $i < count($allowed_paths); $i++) {
 if ($allowed_paths[$i] == "$extension") {
 $ok = "1";
 }}			
// Check File Size
if ($ok == "1") {
$test1=$uploaddir.'/'."$dates.jpg";
$test2="tmp_name".'/'."$dates.jpg";
if($_FILES['file7']['size'] > $max_size )
{
print "File size is too big!";
exit;
}

// The Upload Part
if(is_uploaded_file($_FILES['file7']['tmp_name']))
{
move_uploaded_file($_FILES['file7']['name'],$uploaddir.'/'.$_FILES['file7']['name']);
@chmod($test1, $mode); 
@mysql_query("insert into pic(image, parent_id) values('$test2', '$temp')");
}

}else{
echo "<script>alert('Incorrect file extension£¡');window.location='My_pictures_edit.php';</script>";
}
}


if($tmp8!=""){
// ==============
// Configuration
// ==============
$uploaddir = "../tmp_name"; // Where you want the files to upload to - Important: Make sure this folders permissions is 0777!
$allowed_ext = "jpg, gif, png, JPG, GIF, PNG"; // These are the allowed extensions of the files that are uploaded
$max_size = "10000000"; // 50000 is the same as 50kb
$max_height = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$max_width = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$mode=0644;
$tmp_pass=randomkeys(16);
$dates=time() + (24 * 60 * 60).'-'.date('Y-m-d').'-'.$tmp_pass;
rename($_FILES['file8']['tmp_name'], $uploaddir.'/'."$dates.jpg");
// Check Entension
$extension = pathinfo($_FILES['file8']['name']);
$extension = $extension[extension];
$allowed_paths = explode(", ", $allowed_ext);
for($i = 0; $i < count($allowed_paths); $i++) {
 if ($allowed_paths[$i] == "$extension") {
 $ok = "1";
 }}			
// Check File Size
if ($ok == "1") {
$test1=$uploaddir.'/'."$dates.jpg";
$test2="tmp_name".'/'."$dates.jpg";
if($_FILES['file8']['size'] > $max_size )
{
print "File size is too big!";
exit;
}

// The Upload Part
if(is_uploaded_file($_FILES['file8']['tmp_name']))
{
move_uploaded_file($_FILES['file8']['name'],$uploaddir.'/'.$_FILES['file8']['name']);
@chmod($test1, $mode); 
@mysql_query("insert into pic(image, parent_id) values('$test2', '$temp')");
}

}else{
echo "<script>alert('Incorrect file extension£¡');window.location='My_pictures_edit.php';</script>";
}
}



if($tmp9!=""){
// ==============
// Configuration
// ==============
$uploaddir = "../tmp_name"; // Where you want the files to upload to - Important: Make sure this folders permissions is 0777!
$allowed_ext = "jpg, gif, png, JPG, GIF, PNG"; // These are the allowed extensions of the files that are uploaded
$max_size = "10000000"; // 50000 is the same as 50kb
$max_height = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$max_width = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$mode=0644;
$tmp_pass=randomkeys(16);
$dates=time() + (24 * 60 * 60).'-'.date('Y-m-d').'-'.$tmp_pass;
rename($_FILES['file9']['tmp_name'], $uploaddir.'/'."$dates.jpg");
// Check Entension
$extension = pathinfo($_FILES['file9']['name']);
$extension = $extension[extension];
$allowed_paths = explode(", ", $allowed_ext);
for($i = 0; $i < count($allowed_paths); $i++) {
 if ($allowed_paths[$i] == "$extension") {
 $ok = "1";
 }}			
// Check File Size
if ($ok == "1") {
$test6=$uploaddir.'/'."$dates.jpg";
if($_FILES['file9']['size'] > $max_size )
{
print "File size is too big!";
exit;
}

// The Upload Part
if(is_uploaded_file($_FILES['file9']['tmp_name']))
{
move_uploaded_file($_FILES['file9']['name'],$uploaddir.'/'.$_FILES['file9']['name']);
@chmod($test1, $mode); 
@mysql_query("insert into pic(image, parent_id) values('$test2', '$temp')");
}

}else{
echo "<script>alert('Incorrect file extension£¡');window.location='My_pictures_edit.php';</script>";
}
}


if($tmp10!=""){
// ==============
// Configuration
// ==============
$uploaddir = "../tmp_name"; // Where you want the files to upload to - Important: Make sure this folders permissions is 0777!
$allowed_ext = "jpg, gif, png, JPG, GIF, PNG"; // These are the allowed extensions of the files that are uploaded
$max_size = "10000000"; // 50000 is the same as 50kb
$max_height = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$max_width = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$mode=0644;
$tmp_pass=randomkeys(16);
$dates=time() + (24 * 60 * 60).'-'.date('Y-m-d').'-'.$tmp_pass;
rename($_FILES['file10']['tmp_name'], $uploaddir.'/'."$dates.jpg");
// Check Entension
$extension = pathinfo($_FILES['file10']['name']);
$extension = $extension[extension];
$allowed_paths = explode(", ", $allowed_ext);
for($i = 0; $i < count($allowed_paths); $i++) {
 if ($allowed_paths[$i] == "$extension") {
 $ok = "1";
 }}			
// Check File Size
if ($ok == "1") {
$test1=$uploaddir.'/'."$dates.jpg";
$test2="tmp_name".'/'."$dates.jpg";
if($_FILES['file10']['size'] > $max_size )
{
print "File size is too big!";
exit;
}

// The Upload Part
if(is_uploaded_file($_FILES['file10']['tmp_name']))
{
move_uploaded_file($_FILES['file10']['name'],$uploaddir.'/'.$_FILES['file10']['name']);
@chmod($test1, $mode); 
@mysql_query("insert into pic(image, parent_id) values('$test2', '$temp')");
}

}else{
echo "<script>alert('Incorrect file extension£¡');window.location='My_pictures_edit.php';</script>";
}
}


if($tmp11!=""){
// ==============
// Configuration
// ==============
$uploaddir = "../tmp_name"; // Where you want the files to upload to - Important: Make sure this folders permissions is 0777!
$allowed_ext = "jpg, gif, png, JPG, GIF, PNG"; // These are the allowed extensions of the files that are uploaded
$max_size = "10000000"; // 50000 is the same as 50kb
$max_height = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$max_width = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$mode=0644;
$tmp_pass=randomkeys(16);
$dates=time() + (24 * 60 * 60).'-'.date('Y-m-d').'-'.$tmp_pass;
rename($_FILES['file11']['tmp_name'], $uploaddir.'/'."$dates.jpg");
// Check Entension
$extension = pathinfo($_FILES['file11']['name']);
$extension = $extension[extension];
$allowed_paths = explode(", ", $allowed_ext);
for($i = 0; $i < count($allowed_paths); $i++) {
 if ($allowed_paths[$i] == "$extension") {
 $ok = "1";
 }}			
// Check File Size
if ($ok == "1") {
$test1=$uploaddir.'/'."$dates.jpg";
$test2="tmp_name".'/'."$dates.jpg";
if($_FILES['file11']['size'] > $max_size )
{
print "File size is too big!";
exit;
}

// The Upload Part
if(is_uploaded_file($_FILES['file11']['tmp_name']))
{
move_uploaded_file($_FILES['file11']['name'],$uploaddir.'/'.$_FILES['file11']['name']);
@chmod($test1, $mode); 
@mysql_query("insert into pic(image, parent_id) values('$test2', '$temp')");
}

}else{
echo "<script>alert('Incorrect file extension£¡');window.location='My_pictures_edit.php';</script>";
}
}


if($tmp12!=""){
// ==============
// Configuration
// ==============
$uploaddir = "../tmp_name"; // Where you want the files to upload to - Important: Make sure this folders permissions is 0777!
$allowed_ext = "jpg, gif, png, JPG, GIF, PNG"; // These are the allowed extensions of the files that are uploaded
$max_size = "10000000"; // 50000 is the same as 50kb
$max_height = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$max_width = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$mode=0644;
$tmp_pass=randomkeys(16);
$dates=time() + (24 * 60 * 60).'-'.date('Y-m-d').'-'.$tmp_pass;
rename($_FILES['file12']['tmp_name'], $uploaddir.'/'."$dates.jpg");
// Check Entension
$extension = pathinfo($_FILES['file12']['name']);
$extension = $extension[extension];
$allowed_paths = explode(", ", $allowed_ext);
for($i = 0; $i < count($allowed_paths); $i++) {
 if ($allowed_paths[$i] == "$extension") {
 $ok = "1";
 }}			
// Check File Size
if ($ok == "1") {
$test1=$uploaddir.'/'."$dates.jpg";
$test2="tmp_name".'/'."$dates.jpg";
if($_FILES['file12']['size'] > $max_size )
{
print "File size is too big!";
exit;
}

// The Upload Part
if(is_uploaded_file($_FILES['file12']['tmp_name']))
{
move_uploaded_file($_FILES['file12']['name'],$uploaddir.'/'.$_FILES['file12']['name']);
@chmod($test1, $mode); 
@mysql_query("insert into pic(image, parent_id) values('$test2', '$temp')");
}

}else{
echo "<script>alert('Incorrect file extension£¡');window.location='My_pictures_edit.php';</script>";
}
}

echo "<script>alert('The Picture is updated£¡');window.location='index.php';</script>";


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Onlineidols | welcome to Onlineidols</title>
</head>

<body>
</body>
</html>