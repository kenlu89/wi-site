<?php 
include("includes/config.php");
$lang=$_SESSION['lang'];
global $lang;

if($lang=="ch"){
include("language/chinese/top.php");
include("language/chinese/new_cate_pro.php");
}else{
include("language/english/top.php");
include("language/english/new_cate_pro.php");
}

if($_POST['chk']==1){

$files=$_FILES['file']['name'];
$cate_id=$_POST['cate_id']; 
if($cate_id!=""){
$parent=$cate_id;
}else{
$parent=0;
}



if($files=="" || $files==NULL){
$times=date("Y-m-d H:i:s");
$cate_type=$_POST['cate_type'];
$sorts=$_POST['sorts'];
$cate_id=$_POST['cate_id']; 
$cate=$_POST['cate'];
$cate_ch=$_POST['cate_ch'];
 $cate_tra=$_POST['cate_tra'];
@mysql_query("insert into categories (sort_order, date_added, parent_id, status) values('$sorts', '$times', '$parent', '$cate_type')");
$ids=mysql_insert_id(); 
@mysql_query("insert into categories_description (categories_id,language_id, categories_name) values(LAST_INSERT_ID(), 1, '$cate')");

@mysql_query("insert into categories_description (categories_id, language_id, categories_name) values(LAST_INSERT_ID(), 3,  '$cate_ch')");
echo "<script>alert('".UPLOAD_MSG."');window.location='index.php?content=categories&id=$cate_id';</script>";
}else{

$uploaddir = "../tmp_name"; // Where you want the files to upload to - Important: Make sure this folders permissions is 0777!
$allowed_ext = "jpg, gif, png, JPG, GIF, PNG"; // These are the allowed extensions of the files that are uploaded
$max_size = "10000000"; // 50000 is the same as 50kb
$max_height = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$max_width = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$mode=0644;

$ids=$_POST['current'];
$dates=time() + (24 * 60 * 60).'-'.date('Y-m-d');
$test1=$uploaddir.'/'."$dates.jpg";
$test='tmp_name'.'/'."$dates.jpg";
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
$times=date("Y-m-d H:i:s");  
@mysql_query("insert into categories (sort_order, date_added, parent_id, categories_image) values('$sorts', '$times', '$parent', '$test')");
$cate=@mysql_query("select * from categories order by categories_id desc");
$cate_id=mysql_fetch_array($cate);
$ids=$cate_id['categories_id']; 
$sorts=$_POST['sorts'];
$cate_id=$_POST['cate_id']; 
$cate=$_POST['cate'];
$cate_ch=$_POST['cate_ch'];
@mysql_query("insert into categories_description (categories_id,language_id, categories_name) values(LAST_INSERT_ID(), 1, '$cate')");
@mysql_query("insert into categories_description (categories_id, language_id, categories_name) values(LAST_INSERT_ID(), 3,  '$cate_ch')");
echo "<script>alert('".UPLOAD_MSG."');window.location='index.php?content=categories&id=$cate_id';</script>";

}else{
echo "<script>alert('".ERROR_EXTENTSION."');window.location='index.php?content=categories&id=$ids';</script>";
}

}
}else{
header("Location: ?content=categories"); 
}
?>