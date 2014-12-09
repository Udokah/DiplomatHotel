<?php
session_start();
require_once("../inc/connect.php");
require_once("../inc/lib.php");

// security
if(!isset($_POST['action'])){
exit();
}

$action = clean($_POST['action']);

if($action == 'changePass'){

$oldpass = sha1(clean($_POST['oldpass']));
$newpass = sha1(clean($_POST['newpass']));

$qry="SELECT * FROM user WHERE password = '$oldpass'";
$result=mysql_query($qry);

	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) > 0) {
		// change password
			if(mysql_query("UPDATE user SET password = '$newpass'")){
			$status = "
			$('#oldpassword').val('');
			$('#newpassword1').val('');
			$('#newpassword2').val('');
			alert('Password has been changed');
			" ;
			}
			else{
			$status = "
			alert('Unable to change password !');
			" ;
			}
			
		}else {
			$status = "
			alert('wrong old password, password was not changed'); " ;
		}
	}else {
		$status = "alert('Query Failed');" ;
	}

	echo $status ;
	
exit();
}



?>