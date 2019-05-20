<?php session_start();
session_unregister("username");
session_unregister("password");
session_unregister("stats"); 

echo "<meta http-equiv='Refresh' content='0;url=login.php'>";
?>

