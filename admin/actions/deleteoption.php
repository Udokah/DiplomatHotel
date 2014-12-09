<?php
				  if (isset($_POST['yes']))
	{
			$con = mysql_connect("localhost","diploma1_admin","u9xs13lJU3");
			if (!$con)
			  {
			  die('Could not connect: ' . mysql_error());
			  }
			
			mysql_select_db("diploma1_hotel", $con);
			$messages_id = $_POST['id'];
			//$result = mysql_query("SELECT * FROM friendlist WHERE friends_id = $member_id");
			mysql_query("DELETE FROM room WHERE room_id='$messages_id'");
			header("location: ../rooms.php");
			exit();
			
			mysql_close($con);
			}
			 if (isset($_POST['no']))
	{
			
			header("location: ../rooms.php");
			exit();
		
			}
			?>