<?php 
session_start();
			unset($_SESSION['SESS_MEMBER_ID']);
			unset($_SESSION['SESS_FIRST_NAME']);
			header("location: ../login.php");
?>