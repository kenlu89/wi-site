<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<?php 
include("includes/config.php");
if($lan=="3"){
include("language/chinese/top.php");
include("language/chinese/cate_edit_pro.php");
}else{
include("language/english/top.php");
include("language/english/cate_edit_pro.php");
}
$files=$_FILES['file']['name'];
$cate_id=$_POST['cate_id']; 
if($cate_id!=""){
$parent=$cate_id;
}else{
$parent=0;
}


if($files=="" || $files==NULL){
$times=date("Y-m-d H:i:s");  
$sorts=$_POST['sorts'];
 $cate_id=$_POST['cate_id']; 
 $special=$_POST['special'];
 $cate=$_POST['cate'];
 $cate2=$_POST['cate2'];
  $cate3=$_POST['cate3'];
 $gallery=$_POST['gallery_'];
$stats=$_POST['status'];
$cate_type=$_POST['cate_type']; 
$promote=$_POST['promote'];
if($stats==""){
$stats=0;
}


$chk_lan=@mysql_query("select * from categories_description where  categories_id='$cate_id' and language_id=3");
$row_lan=mysql_num_rows($chk_lan);
if($row_lan<=0){
@mysql_query("insert into categories_description(categories_id, categories_name, language_id) values('$cate_id', '$cate2', 3)");
}else{
@mysql_query("update categories_description set categories_name='$cate2' where categories_id='$cate_id' and language_id=3");
}
@mysql_query("update categories set sort_order='$sorts', last_modified='$times',  status='$cate_type' where categories_id='$cate_id'");

@mysql_query("update categories_description set categories_name='$cate' where categories_id='$cate_id' and language_id=1");

echo "<script>alert('".UPDATE_DONE."');window.location='index.php?content=categories&id=$cate_id';</script>";
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
$times=date("Y-m-d H:i:s");  
$sorts=$_POST['sorts'];
$cate_id=$_POST['cate_id']; 
$stats=$_POST['status']; 
 $gallery=$_POST['gallery_'];
if($stats==""){
$stats=0;
}
$promote=$_POST['promote'];
$cate=$_POST['cate'];
$description=$_POST['description'];
@mysql_query("update categories set sort_order='$sorts', last_modified='$times', categories_image='$test', status='$stats' where categories_id='$cate_id'");
@mysql_query("update categories_description set categories_name='$cate' where categories_id='$cate_id' and language_id=1");
$chk_lan=@mysql_query("select * from categories_description where  categories_id='$cate_id' and language_id=3");
$row_lan=mysql_num_rows($chk_lan);
if($rowlan<=0){
@mysql_query("insert into categories_description(categories_id, categories_name, language_id) values('$cate_id', '$cate_id', '$cate2', 3)");
}else{
@mysql_query("update categories_description set categories_name='$cate2' where categories_id='$cate_id' and language_id=3");
}
echo "<script>alert('".UPDATE_DONE."');window.location='index.php??content=categories&id=$cate_id';</script>";

}else{
echo "<script>alert('".ERROR_EXTENTSION."');window.location='index.php??content=categories';</script>";
}

}

?>