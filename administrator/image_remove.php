<?php 
include("includes/config.php");
$parent=$_GET['parent_id'];
$ids=$_GET['id'];

$done=@mysql_query("delete	from images where ids='$ids'");

echo "<meta http-equiv='Refresh' content='0;url=add_image.php?id=$parent'>";		
		
		?>