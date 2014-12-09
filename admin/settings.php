<?php 
include("inc/auth.php"); 
$adminName = $_SESSION['SESS_FIRST_NAME'] ;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Settings :: Admin Panel</title>
		<link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
		<!--[if IE]><![if gte IE 6]><![endif]-->
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/glow/1.7.0/core/core.js" type="text/javascript"></script>
		<script src="js/glow/1.7.0/widgets/widgets.js" type="text/javascript"></script>
		<link href="js/glow/1.7.0/widgets/widgets.css" type="text/css" rel="stylesheet" />
		
		<script type="text/javascript">
			glow.ready(function(){
				new glow.widgets.Sortable(
					'#content .grid_5, #content .grid_6',
					{
						draggableOptions : {
							handle : 'h2'
						}
					}
				);
			});
			
			$(document).ready(function(){
			
			$('#save').click(function(e){
			
			e.preventDefault();
			
			var oldpass = $.trim($('#oldpassword').val());
			var newpas1 = $.trim($('#newpassword1').val());
			var newpas2 = $.trim($('#newpassword2').val());
			
			if(oldpass == ''){
			alert('Enter your old password');
			}
			else if(newpas1 == ''){
			alert('enter new password');
			}
			else if(newpas2 == ''){
			alert('confirm new password');
			}
			else if(newpas1 != newpas2){
			alert('New passwords do not match');
			}
			else{
			$.post('ajax/settings.php',{ action: 'changePass' , oldpass : oldpass , newpass : newpas2 },
			function(RespData){
			eval(RespData) ;
			});
			}
			});
			
			});
		</script>
		<!--[if IE]><![endif]><![endif]-->
	</head>
	<body>

		<h1 id="head">Security Settings :: Administration Panel</h1>
		
		<ul id="navigation">
			<li><a href="index.php">Dashboard</a></li>
			<li><a href="rooms.php">Manage Rooms</a></li>
			<li><a href="reservations.php">Manage Reservations</a></li>
			<li><a href="settings.php" class="active">Settings</a></li>
			<li><a href="actions/logout.php">Logout</a></li>
			<li>Welcome <?php echo $adminName ; ?> !</li>
		</ul>

			<div id="content" class="container_16 clearfix">
				<div class="grid_5">
				
					<div class="box">
						<h2>Change Password</h2>
						   <form action="#" id="setForm">
						<table>
							<tbody>
							   <tr>
						
									<td>Old Password
									<input type="password" id="oldpassword" /></td>
								</tr>
								<tr>
									<td>New Password
									<input type="password" id="newpassword1" /></td>
								</tr>
								<tr>
									<td>Confirm New Password
									<input type="password" id="newpassword2" /></td>
								</tr>
								<tr>
									<td><input id="save" type="submit" value="save" /></td>
								</tr>
							</tbody>
						</table>
						</form>
					</div>
					
					
					
				</div>
				<div class="grid_6">
				

				</div>
			</div>
		<div id="foot">
			<div class="container_16 clearfix">
				<div class="grid_16">
					
				</div>
			</div>
		</div>
	</body>
</html>