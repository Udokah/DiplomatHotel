<?php
				  if (isset($_GET['id']))
	{
	
	echo '<form action="actions/editroomexec.php" method="post">';
	
	//echo "<img width=200 height=180 alt='Unable to View' src='" . $row1["image"] . "'>";
	echo '<br>';
	echo '<input type="hidden" name="firstname" value="'. $_GET['id'] .'">';
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
			echo '<input type="hidden" name="roomid" value="'. $row['room_id'] .'">'; 
  			echo'room type: '.'<input type="text" name="roomtype" value="'. $row['type'] .'">'; 
			   echo '<br>';
			  echo'room rate: '.'<input type="text" name="roomrate" value="'. $row['rate'] .'">';
			  echo '<br>';
			  echo'room description: '.'<input type="text" name="description" value="'. $row['description'] .'">'; 
			   echo '<br>';
			  echo'Quantity: '.'<input type="text" name="qty" value="'. $row['qty'] .'">';
			   echo '<br>';
			  echo '<input name="" type="submit" value="Save" />';
  			}
	echo '</form>';
			}
			?>
			
			
