<?php
if(isset($_GET['ref'])){
$ref = $_GET['ref'] ;
}
else{
$ref = '' ;
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Login :: Admin Panel</title>
		<link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
		<!--[if IE]><![if gte IE 6]><![endif]-->
		<script src="js/glow/1.7.0/core/core.js" type="text/javascript"></script>
		<script src="js/jquery.js" type="text/javascript"></script>
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
			
			$('#loginform :submit').click(function(e){
			e.preventDefault();
			
			var username = $('#username').val() ;
			var password = $('#password').val() ;
			
			if(username == ''){
			alert('enter a username');
			}
			else if(password == ''){
			alert('enter a password');
			}
			else{
			$.post('ajax/login.php',{ action: 'firstLogin' , username : username , password : password },
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

		<h1 id="head">Diplomat Hotels :: Administration Panel</h1>
	

			<div id="content" class="container_16 clearfix">
				<div class="grid_6">
				
				
					<div style="margin:5px 300px;" class="box">
						<h2>Login</h2>
						<form action="#" id="loginform" method="post">
						<table>
							<tbody>
							   <tr>
									<td>username
									<input type="text" id="username" name="username" required/></td>
								</tr>
								<tr>
							<td>password
						
							<input type="password" id="password" name="password" required /></td>
									<input type="hidden" name="ref" value="<?php echo $ref ; ?>" />
								</tr>
								<tr>
									<td><input type="submit" value="sign in" /></td>
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