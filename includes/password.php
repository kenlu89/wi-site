<?php
function encrypt_pass($email, $pass)
{
$str=substr(md5($salt.$email), 4, 18);
$pass=substr(md5($salt.$pass), 4, 18); 
return $str.$pass;
}
function validate_pass($str, $pass, $db_pass){
$tmp_pass=encrypt_pass($str, $pass);
if($db_pass==$tmp_pass){
return true;
}else{
return false;
}
}
?> 