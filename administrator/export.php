<?php 
include("includes/config.php");
if($_POST['chk']==1){
$lname=$_POST['lname'];
$fname=$_POST['fname'];
$clock_in=$_POST['clock_in'];
$clock_out=$_POST['clock_out'];
$salary=$_POST['salary'];
$total=$_POST['total'];
$date=$_POST['date'];
$ids=$_POST['id'];	
$i=0;
$data=array();
foreach($lname as $row) { 		

$data[$i]=array("Last Name" =>$row, "First Name" => $fname[$i], "Clock In" => $clock_in[$i], "Clock Out" => $clock_out[$i], "Hourly Rate" =>$salary[$i], "Total"=>$total[$i], "Date"=>$date[$i]); 
@mysql_query("update shift set stats=1 where ids=".$ids[$i]);		
 $i++;	
	
}


 function cleanData(&$str) { 
 $str = preg_replace("/\t/", "\\t", $str); 
 $str = preg_replace("/\n/", "\\n", $str); 
 }  # filename for download 
 
$filename = "Payroll_data" . date('m-d-Y') . ".xls"; 
header("Content-Disposition: attachment; filename=\"$filename\"");
 header("Content-Type: application/vnd.ms-excel");  
 $flag = false; foreach($data as $row) { 
 if(!$flag) { 
 # display field/column names as first row  
 echo implode("\t", array_keys($row)) . "\n"; 
 $flag = true; } array_walk($row, 'cleanData');
  echo implode("\t", array_values($row)) . "\n"; 
  } 
 exit;

 }else{
 header("Location: salary.php");
 }
 ?>

