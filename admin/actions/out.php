<?php
				  if (isset($_GET['id']))
	{
			$con = mysql_connect("localhost","diploma1_admin","u9xs13lJU3");
			if (!$con)
			  {
			  die('Could not connect: ' . mysql_error());
			  }
			
			mysql_select_db("diploma1_hotel", $con);
			$messages_id = $_GET['id'];
                                                                 $result3 = mysql_query("SELECT * FROM reservation where reservation_id ='$messages_id'");
								
								
								while($row3 = mysql_fetch_array($result3))
								  {
$res=$row3['confirmation'];
                                                                   }
			$update1=mysql_query("UPDATE reservation SET status ='out' WHERE reservation_id ='$messages_id'");
                        $update2=mysql_query("UPDATE roominventory SET status ='out' WHERE confirmation = '$res'");
header("location: ../reservations.php");
			
			exit();
			
			mysql_close($con);
			}
			?>