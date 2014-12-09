<?php 
include("inc/auth.php"); 
$adminName = $_SESSION['SESS_FIRST_NAME'] ;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Reservations :: Admin Panel</title>
		<link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
		<!--<link rel="stylesheet" href="css/fluid.css" type="text/css" media="screen" charset="utf-8" />-->
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
	</head>
	<body>
		
				<h1 id="head">Administration Panel :: Manage Reservations</h1>
		
		<ul id="navigation">
			<li><a href="index.php">Dashboard</a></li>
			<li><a href="rooms.php">Manage Rooms</a></li>
			<li><a href="reservations.php" class="active">Manage Reservations</a></li>
			<li><a href="settings.php">Settings</a></li>
			<li><a href="actions/logout.php">Logout</a></li>
				<li>Welcome <?php echo $adminName ; ?></li>
		</ul>
		
			<div id="content" class="container_16 clearfix">
			<?php require_once("inc/connect.php"); ?> 
				<div class="grid_16">
					<table style="width:100%;">
						<thead>
							<tr>
								<th>Name</th>
								<th>Arrival</th>
								<th>Departure</th>
								<th>Room Type</th>
								<th>No of Nights</th>
								<th>Qty Reserved</th>
								<th>Confirmation N<u>o</u></th>
								<th colspan="2" width="15%">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
								
								$result2 = mysql_query("SELECT * FROM reservation where status != 'out'");
								
								
								while($row = mysql_fetch_array($result2))
								  {
								  
								  /// Get Room Inventory
							$ro = $row['room_id'] ;
                                $result4 = mysql_query("SELECT qty FROM room where room_id='$ro'");
								$row4 = mysql_fetch_array($result4) ;
								$qty = $row4['qty'];
								  /////////////////////////
								  
								 echo '<tr>';
    								echo '<td class="contacts">'.$row['firstname'].' ' .$row['lastname'].'</td>';
    								echo '<td class="contacts">'.$row['arrival'].'</td>';
									echo '<td class="contacts">'.$row['departure'].'</td>';
									echo '<td class="contacts">';
									$r=$row['room_id'];
									$result1 = mysql_query("SELECT * FROM room WHERE room_id = '$r'");
			while($row1 = mysql_fetch_array($result1))
			{
			echo $row1['type'];
			}
									echo '</td>';
									echo '<td class="contacts">'.$row['result'].'</td>';
									echo '<td class="contacts">'.$qty.'</td>';
									echo '<td class="contacts">'.$row['confirmation'].'</td>';
		echo '<td class="contacts">'.'<a href=actions/out.php?id=' . $row["reservation_id"] . " title='check customer out'>".'Check Out'.'</a>'."<br> <a title='View reservation report' href=preview.php?id=" . $row["reservation_id"] . '>'.'VIEW'.'</a>'.'</td>';
  								echo '</tr>';
							
								  }
			  
			  ?>
						</tbody>
					</table>
				</div>
			</div>
		
		<div id="foot">
		</div>
	</body>
</html>