<?php 
include("inc/auth.php"); 
$adminName = $_SESSION['SESS_FIRST_NAME'] ;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Detailed Billing Report :: Diplomat Hotels</title>
		<link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/printelement.js" type="text/javascript"></script>
		
	<script>
	function DoPrint(){
	  $('.tools').hide();
	  $('#content').printElement();
	   $('.tools').show();
	  }
	</script>
		
	</head>
	<body>

			<h1 id="head">Detailed Billing Report</h1>
		
		<ul id="navigation">
			<li><a href="index.php">Dashboard</a></li>
			<li><a href="rooms.php">Manage Rooms</a></li>
			<li><a href="reservations.php" class="active">Manage Reservations</a></li>
			<li><a href="settings.php">Settings</a></li>
			<li><a href="actions/logout.php">Logout</a></li>
				<li>Welcome <?php echo $adminName ; ?></li>
		</ul>
		
		<div id="content" class="container_16 clearfix">
		<link rel="stylesheet" href="css/960.css" type="text/css" media="print" charset="utf-8" />
		<link rel="stylesheet" href="css/template.css" type="text/css" media="print" charset="utf-8" />
		<link rel="stylesheet" href="css/colour.css" type="text/css" media="print" charset="utf-8" />
		<style>
		.image{
		display:inline-block;
		background-image:url(src/logo.png);
		width:172px;
		height:75px;
		margin-left:10px;
		float:left;
		}
		
		.address{
		float:right;
		font-family: 'PT Sans Narrow',Calibri,'Myriad Pro',Tahoma,Arial;
		font-size:15px;
		}
		
		.leftinof{
		font-family: 'PT Sans Narrow',Calibri,'Myriad Pro',Tahoma,Arial;
		font-size:15px;
		}
		</style>
		<?php
		include("inc/connect.php");
		include("inc/lib.php");
		
		$member_id = clean($_GET['id']);
		
			$result = mysql_query("SELECT * FROM reservation WHERE reservation_id = '$member_id'");
            $row = mysql_fetch_array($result) ;
		?>
			<div class="grid_11">
				<h2>Billing Information</h2>
				<p>
					<dl class="image">
						<img src="src/logo.png" alt="Diplomat Hotels" />
							</dl>
							
				<dl class="address">
								<dd>1 Shonny Way</dd>
								<dd>Shonibare Estate, Maryland</dd>
								<dd>Lagos</dd>
								<dd>Telephone: 234 803-713-7196</dd>
								<dd>Fax: 234 803-713-7196</dd>
							</dl>
							
	
				</p>
				
				<div class="clear"></div>
				<div class="leftinof">
					<h2>Customer Personnal Information</h2>
					<table>
				<tr><td>Fullname:</td><td><?php echo $row['firstname'].' '.$row['lastname'] ; ?></td></tr>
					<tr><td>Address</td><td><?php echo $row['province'] ; ?></td></tr>
					<tr><td>City</td><td><?php echo $row['city'] ; ?></td></tr>
					<tr><td>Country</td><td><?php echo $row['zip'] ; ?></td></tr>
					<tr><td>Email</td><td><?php echo $row['country'] ; ?></td></tr>
					<tr><td>Phone Number</td><td><?php echo $row['email'] ; ?></td></tr>
					</table>
				</div>
				
				<div class="leftinof" style="float:left; width:300px;">
					<h2>Reservation Details</h2>
					<table>
					<tr><td>Arrival Date:</td><td><?php echo $row['arrival'] ; ?></td></tr>
					<tr><td>Departure Date</td><td><?php echo $row['departure'] ; ?></td></tr>
					<tr><td>Confirmation Code</td><td><?php echo $row['confirmation'] ; ?></td></tr>
					<tr><td>Number of night stay</td><td><?php echo $row['result'] ; ?></td></tr>
					</table>
				</div>
				<?php 
				  $q=$row['room_id'];
				  $result1 = mysql_query("SELECT * FROM room WHERE room_id = '$q'");
				  $row1 = mysql_fetch_array($result1) ;
				?>
				<div class="leftinof" style="float:right;">
					<h2>Payment Information</h2>
					<table>
					<tr><td>Room Type:</td><td><?php echo $row1['type'] ; ?></td></tr>
					<tr><td>Room Type:</td><td><?php echo $row1['rate'] ; ?></td></tr>
					<tr><td>Total Payable amount:</td><td>$<?php echo $row['payable'] ; ?></td></tr>
					</table>
				</div>
				
				
			</div>
			<div class="grid_5">
				<h2 style="visibility:hidden">Mock Examples</h2>
				<input type="submit" class="tools" onclick="history.go(-1)" value="&laquo; Go Back">
				<br /><br /><br />
				<input type="submit" class="tools" onclick="DoPrint()" value="Print This Document">
			</div>
		</div>

		
	</body>
</html>