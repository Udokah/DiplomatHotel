<?php
				  if (isset($_GET['id']))
	{
	$con = mysql_connect("localhost","diploma1_admin","u9xs13lJU3");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("diploma1_hotel", $con);
		
		$id=$_GET['id'];
		$result = mysql_query("SELECT * FROM room WHERE room_id = $id");

while($row = mysql_fetch_array($result))
  {
  echo "<img width=200 height=180 alt='Unable to View' src='" . $row["image"] . "'>";
  }
	echo '<form action="actions/editpicexec.php" method="post" enctype="multipart/form-data">';
	
	//echo "<img width=200 height=180 alt='Unable to View' src='" . $row1["image"] . "'>";
	echo '<br>';
			echo '<input type="hidden" name="firstname" value="'. $_GET['id'] .'">';
			echo 'Select Image';
			echo '<br>';
			echo '<input type="file" name="image">'.'<br>';
			echo '<input type="submit" value="Upload">';
	echo '</form>';
			}
			?>
			
