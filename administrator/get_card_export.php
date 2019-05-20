<?php 
include("includes/config.php");
function randomkeys($length)
  {
   $pattern = "1234567890";
   for($i=0;$i<$length;$i++)
   {
     $key .= $pattern{rand(0,9)};
   }
   return $key;
  }


if($_POST['chk']==1){

$code=randomkeys(16);
$num_card=$_POST['num_card'];
if($num_card!=""){

for($i=0; $i<$num_card; $i++){
do{

$chk=@mysql_query("select code from cards_history where code='$code'");

if(mysql_num_rows($chk)>=1){
$code=randomkeys(16);

}else{
$times=date("Y-m-d");
@mysql_query("insert into cards_history(date_added, code) values('$times', '$code')");
}
}while(mysql_num_rows($chk)<=0);

}
$data=array();
$times=date("Y-m-d");
$show=mysql_query("select * from cards_history ");
$i=0;
while($info=mysql_fetch_array($show)){
$data[$i]=array("Card Num" => "~".$info['code']); 
$i++;
}
 function cleanData(&$str) { 
 $str = preg_replace("/\t/", "\\t", $str); 
 $str = preg_replace("/\n/", "\\n", $str); 
 }  # filename for download 
 
$filename = "card records" . date('m-d-Y') . ".xls"; 
header("Content-Disposition: attachment; filename=\"$filename\"");
 header("Content-Type: application/vnd.ms-excel");  
 $flag = false; foreach($data as $row) { 
 if(!$flag) { 
 # display field/column names as first row  
 echo implode("\t", array_keys($row)) . "\n"; 
 $flag = true; } array_walk($row, 'cleanData');
  echo implode("\t", array_values($row)) . "\n"; 
  }

}
//header("location: ?content=get_card&msg=1");
}
 ?>

