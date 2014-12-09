<?php
session_start();
require_once("../inc/connect.php");
require_once("../inc/lib.php");

// security
if(!isset($_POST['action'])){
exit();
}

$action = clean($_POST['action']);
$username = clean($_POST['username']);
$password = sha1(clean($_POST['password']));

if($action == 'firstLogin'){

$qry="SELECT * FROM user WHERE username='$username' AND password='$password'";
$result=mysql_query($qry);

	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['user_id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['username'];
			session_write_close();
			
			$status = "
			$('#loginform').attr('action','index.php');
			$('#loginform').submit();
			" ;
			
		}else {
			$status = "
			alert('Wrong username or password');
			$('#password').val('');
			" ;
		}
	}else {
		$status = "alert('Query Failed');" ;
	}

	echo $status ;
	
exit();
}



?>