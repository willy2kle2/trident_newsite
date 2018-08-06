<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_trident = "localhost";
$database_trident = "trident8_skilltrain";
$username_trident = "trident8_triden2";
$password_trident = "&??;]brc.I(T";
$trident = mysql_pconnect($hostname_trident, $username_trident, $password_trident) or trigger_error(mysql_error(),E_USER_ERROR); 
?>