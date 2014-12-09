<?php
session_start();
if(!isset($_SESSION['SESS_FIRST_NAME'])){
$ref = $_SERVER['HTTP_REFERER'] ;
header("location: login.php?ref=$ref");
}
?>
