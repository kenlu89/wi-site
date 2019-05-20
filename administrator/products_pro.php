<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
header("Location: login.php ");
}
$id=$_POST['id'];
$files=$_FILES['file']['name'];
$stats=$_POST['stats']; 
$names=$_POST['names'];
$price=$_POST['price']; 
$description=$_POST['description'];
$qty=$_POST['qty'];
$model=$_POST['model'];
$weight=$_POST['weight']; 
$whole=$_POST['wholesale'];


if($files=="" || $files==NULL){
$times=date("Y-m-d H:i:s");  

@mysql_query("insert into products(products_quantity ,products_model, products_price, products_date_added,  products_weight, products_status, wholesales) values('$qty', '$model', '$price', '$times', '$weight', '$stats', '$whole')");
@mysql_query("insert into products_description(products_description, products_name) values ('$description', '$names')");
$chk=@mysql_query("select * from products order by products_id  desc");
$row=mysql_fetch_array($chk);
$pid=$row['products_id'];
@mysql_query("insert into products_to_categories values('$pid', '$id')");
echo "<script>alert('product has been uploaded!');window.location='categories.php?id=$id';</script>";
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
$times=date("Y-m-d H:i:s");  
$sorts=$_POST['sorts'];
$cate_id=$_POST['cate_id']; 
$cate=$_POST['cate'];
@mysql_query("insert into products(products_quantity ,products_model, products_price, products_date_added,  products_weight, products_status, products_image, wholesales) values('$qty', '$model', '$price', '$times', '$weight', '$stats', '$test', '$whole')");
@mysql_query("insert into products_description(products_description, products_name) values ('$description', '$names')");
$chk=@mysql_query("select * from products order by products_id  desc");
$row=mysql_fetch_array($chk);
$pid=$row['products_id'];
@mysql_query("insert into products_to_categories values('$pid', '$id')");
echo "<script>alert('Product has been uploaded!');window.location='categories.php?id=$cate_id';</script>";

}else{
echo "<script>alert('Incorrect file extension£¡');window.location='Front.php?id=$ids';</script>";
}

}

?>