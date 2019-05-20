<?php 
include("includes/config.php");
$ids=$_GET['id'];
$parent=$_GET['parent'];

$done=@mysql_query("delete	from products_options_values where products_options_values_id ='$ids'");
header("Location: edit_option.php?id=".$parent);	
		
		?>