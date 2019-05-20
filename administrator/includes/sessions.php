<?php 
@mysql_query("delete from sessions where expiry<=".date());

?>