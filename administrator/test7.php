<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Untitled Document</title>
</head>
<body>
<?php 
include("includes/config.php");
$tmp_hr="2010-07-04 09:49:16";
$tmp_time=split(" ", $tmp_hr);
$hrs=split(':', $tmp_time[1]);
$tmp_time[0]." ".$hrs[0];


$hr_07=$daily_purchased." 20";
$time_07=@mysql_query("select * from orders where check_out like '%$hr_07%' and orders_status=3");

$num_07=mysql_num_rows($time_07);
?>
<?php
//To Pull 7 Unique Random Values Out Of AlphaNumeric

//removed number 0, capital o, number 1 and small L
//Total: keys = 32, elements = 33
$characters[] ="A";
$characters[] ="B";
$characters[] ="C";

//make an "empty container" or array for our keys

$x = mt_rand(0, count($characters)-1);
$characters[$x];
?>

</body>
</html>
