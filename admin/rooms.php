<?php 
include("inc/auth.php"); 
$adminName = $_SESSION['SESS_FIRST_NAME'] ;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Rooms :: Admin Panel</title>
		<link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
		<!--<link rel="stylesheet" href="css/fluid.css" type="text/css" media="screen" charset="utf-8" />-->
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
		 <script src="js/jquery.js" type="text/javascript"></script>
		<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
	</head>
	<body>
		
				<h1 id="head">Administration Panel :: Manage Rooms</h1>
		
		<ul id="navigation">
			<li><a href="index.php">Dashboard</a></li>
			<li><a href="rooms.php" class="active">Manage Rooms</a></li>
			<li><a href="reservations.php">Manage Reservations</a></li>
			<li><a href="settings.php">Settings</a></li>
			<li><a href="actions/logout.php">Logout</a></li>
				<li>Welcome <?php echo $adminName ; ?></li>
		</ul>
		
			<div id="content" class="container_16 clearfix">
				
		<div class="grid_2">
					<p>
						<label>&nbsp;</label>
				<a rel="facebox" href="ajax/addroom.php">Add Room</a>
					</p>
				</div>
				<div class="grid_16">
					<table>
						<thead>
							<tr>
								<th>Type</th>
								<th>Rate</th>
								<th>Description</th>
								<th>Image</th>
								<th>Quantity</th>
								<th colspan="2" width="10%">Actions</th>
							</tr>
						</thead>
						<tbody>
						<?php require_once("inc/connect.php"); ?> 
						<?php
							$result3 = mysql_query("SELECT * FROM room");
								while($row3 = mysql_fetch_array($result3))
								  {
								 echo '<tr>';
									echo '<td>'.$row3['type'].'</td>';
									echo '<td>$'.$row3['rate'].'</td>';
									echo '<td>'.$row3['description'].'</td>';
									echo '<td>';
									echo'<a rel="facebox" href=ajax/editpic.php?id=' . $row3["room_id"] . '>' . '<img width=72 height=52 alt="Unable to View" src=' . $row3["image"] . '>' . '</a>';
								
									echo '</td>';
									echo '<td>'.$row3['qty'].'</td>';
									echo '<td>';
									echo'<a rel="facebox" href=ajax/editroom.php?id=' . $row3["room_id"] . '>' . 'Edit' . '</a>';
									echo ' | ';
									echo'<a rel="facebox" href=ajax/deleteroom.php?id=' . $row3["room_id"] . '>' . 'Delete' . '</a>';
									echo '</td>';
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