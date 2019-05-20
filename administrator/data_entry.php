<?php
include("includes/config.php"); 
		  $attribute=@mysql_query("select * from products_options_values_to_products_options, products_options_values where products_options_values.products_options_values_id=products_options_values_to_products_options.products_options_values_id and  products_options_values.language_id=1 and products_options_values_to_products_options.products_options_id=1");
			$i=1;
			 if($i%2==1){ $bg="bgcolor='#dbf6f6'"; }
			echo "<table  border='0'".$bg."  width=100% class='mtext'>";
			while($show_option=mysql_fetch_array($attribute)){
		
	echo "<tr ><td height='18'>".$show_option['products_options_values_name']."</td></tr>";		
			
			$i++;}
			echo "</table>";

?>
