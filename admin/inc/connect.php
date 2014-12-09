<?php
$host="localhost";
$databaseuser="diploma1_admin";
$databasepassword="u9xs13lJU3";
$database="diploma1_hotel";
$connect = mysql_connect($host,$databaseuser,$databasepassword) or die ("unable to connect to server");
$db = mysql_select_db($database,$connect) or die ("unable to select database.");
?>
