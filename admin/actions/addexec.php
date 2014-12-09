<?php
//Connect to mysql server
	$link = mysql_connect("localhost","diploma1_admin","u9xs13lJU3");
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db("diploma1_hotel", $link);
	if(!$db) {
		die("Unable to select database");
	}
	



	if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);

	
		if ($image_size==FALSE) {
		
			echo "That's not an image!";
			
		}else{
			
			move_uploaded_file($_FILES["image"]["tmp_name"],"../photos/" . $_FILES["image"]["name"]);
			
			$location="photos/" . $_FILES["image"]["name"];
			$type=$_POST['type'];
			$rate=$_POST['rate'];
			$desc=$_POST['desc'];
			$qty=$_POST['qty'];
			

			
			$update=mysql_query("INSERT INTO room (type, rate, description, image, qty)
VALUES
('$type','$rate','$desc','$location','$qty')");
			
			
			header("location: ../rooms.php");
			exit();
		
			}
	}


?>
