<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);

$uploaddir = "../pdf"; // Where you want the files to upload to - Important: Make sure this folders permissions is 0777!
$mode=0644;

$ids=$_POST['current'];
$title=$_POST['title']; 
$status=$_POST['stats']; 
$dates=time() + (24 * 60 * 60).'-'.date('Y-m-d');
$test1=$uploaddir.'/'."$dates.pdf";
$test='pdf'.'/'."$dates.pdf";
rename($_FILES['file']['tmp_name'], $uploaddir.'/'."$dates.pdf");
// Check Entension

if(is_uploaded_file($_FILES['file']['tmp_name']))
{
move_uploaded_file($_FILES['file']['name'],$uploaddir.'/'.$_FILES['file']['name']);
@chmod($test1, $mode); 
}
$good=@mysql_query("insert into pdf(files, parent_id, title, status ) values('$test', '$ids', '$title', '$status')");
if($good){
echo "<script>alert('Pdf file has been uploaded');window.location='pdf.php?id=$ids';</script>";
}else{
echo "<script>alert('Pdf file has been uploaded');window.location='pdf.php?id=$ids';</script>";
}




?>