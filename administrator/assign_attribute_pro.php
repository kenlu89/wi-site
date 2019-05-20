<?php 
include("includes/config.php");

$pid=$_POST['pid'];
$opt_value=array();
$opt_value=$_POST['attribute'];
$opt=$_POST['options'];

@mysql_query("delete from products_attributes where products_id=$pid and options_id='$opt'");
foreach($opt_value as $key=>$value){

@mysql_query("insert into products_attributes(options_id, products_id, options_values_id) values('$opt', '$pid', '$value') ");


}	
	
header("Location: assign_option.php?id=$pid");
		?>