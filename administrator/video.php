<?php
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName); 
foreach($_FILES as $f)
{

function randomkeys($length)
  {
   $pattern = "QWERTYUIOPLKJHGFDSAZXCVBNM";
   for($i=0;$i<$length;$i++)
   {
     $key .= $pattern{rand(0,35)};
   }
   return $key;
  }
    $tmp_model=randomkeys(10).time();
	//����������
	$extension = pathinfo($f[name]);
	$extension = $extension[extension];
	$uploaddir=$tmp_model.".".$extension;
	if (function_exists("iconv"))  $f[name] = iconv("UTF-8","GB2312",$f[name]);
	//����Ƿ��Ѿ�����ͬ���ļ�
	rename($f[name], $uploaddir);
	if (file_exists($f[name]))  header("HTTP/1.0 403");
	//�����ļ�
	
	$f[name]="../tmp_name/".$uploaddir;
	
//check and delete if upload spam

	if (move_uploaded_file($f["tmp_name"],$f[name])){
	@mysql_query("insert into images(image) values ('tmp_name/".$uploaddir."')");
	}
}
?>