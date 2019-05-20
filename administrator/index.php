<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
include("includes/config.php");
$lang=$_SESSION['lang'];
global $lang;

if($lang=="ch"){
include("language/chinese/top.php");
include("language/chinese/".$content);
define('LANG', 'gb2312');
$lan=3;
}else{
include("language/english/top.php");
include("language/english/".$content);
$lan=1;
define('LANG', 'utf-8');
}

global $lan;
$r=@mysql_query("select count(*) as pending from orders where orders_status=1");
$r1=@mysql_query("select count(*) as processing from orders where orders_status=2");
$r2=@mysql_query("select count(*) as delivered from orders where orders_status=3");
$r3=@mysql_query("select count(*) as customers_num from customers");
$r4=@mysql_query("select count(*) as products_num from products");
$r5=@mysql_query("select count(*) as tmp_num from temp");


$row_pending=mysql_fetch_array($r);
$row_processing=mysql_fetch_array($r1);
$row_delivered=mysql_fetch_array($r2);
$row_customers=mysql_fetch_array($r3);
$row_products=mysql_fetch_array($r4);
$row_temp=mysql_fetch_array($r5);


?>
<title><?php echo TITLE;  ?></title>
<link   href="style_sheet.css" type="text/css"  rel="stylesheet" />
<link   href="includes/style_sheet.css" type="text/css"  rel="stylesheet" />

</head>

<body>
<table width="798" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="798" height="81" valign="top" class="left"><?PHP include("top.php"); ?></td>
  </tr>
  <tr>
    <td height="324" valign="top"><?php include($content);?></td>
  </tr>
  
  
  <tr>
    <td height="40" align="center" valign="top" class="text"><?php include("bottom.php");  ?></td>
  </tr>
</table>
</body>
</html>
