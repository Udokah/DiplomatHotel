<?php

function time_since ($start){
       $start = strtotime($start) ;
        $end = strtotime(date('Y-m-d H:i:s'));
	
    $diff = $end - $start;
    $days = floor ( $diff/86400 ); //calculate the days
    $diff = $diff - ($days*86400); // subtract the days
    $hours = floor ( $diff/3600 ); // calculate the hours
    $diff = $diff - ($hours*3600); // subtract the hours
    $mins = floor ( $diff/60 ); // calculate the minutes
    $diff = $diff - ($mins*60); // subtract the mins
    $secs = $diff; // what's left is the seconds;
	
    if ($secs!=0) 
    {
        $secs .= " seconds";
        if ($secs=="1 seconds") $secs = "1 second"; 
    }
    else $secs = '';
    if ($mins!=0) 
    {
        $mins .= " mins ";
        if ($mins=="1 mins ") $mins = "1 min "; 
        $secs = '';
    }
    else $mins = '';
    if ($hours!=0) 
    {
        $hours .= " hours ";
        if ($hours=="1 hours ") $hours = "1 hour ";             
        $secs = '';
    }
    else $hours = '';
    if ($days!=0) 
    {
        $days .= " days "; 
        if ($days=="1 days ") $days = "1 day ";                 
        $mins = '';
        $secs = '';
        if ($days == "-1 days ") {
            $days = $hours = $mins = '';
            $secs = "less than 10 seconds";
        }
    }
    else $days = '';
	
    $return  = "$days $hours $mins $secs ago";
	
	return $return;
}


// function to upload an image
function Upload_image( $name , $size , $tmp ){   // Set maxsize to 4mb
     $max_size = 4000000  ;
            $path = "../uploaded_images/";
			// Check if input is an image file
       $valid_formats = array("png", "gif", "jpg" , "jpeg" ,"PNG", "GIF", "JPG" , "JPEG" );		
			list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
					{
					if($size < $max_size)
						{
						$actual_name = get_random() ;  // get random name
						$ext = mb_strtolower($ext);   // change all extensgion to lowercase
						$actual_name .= time().".".$ext;
							if(move_uploaded_file($tmp, $path.$actual_name))
								{
						$status = true ;
						$message = $actual_name ; // return the name of the image if successful
						
						// Create thumbnail here
						$size = 100 ;  // thumbnail size
						$dst_dir =  $path ;
						$dst_dir2 =  '../resized_img/' ;  // rewrite uploaded file
						$src_dir = $path ;
						$im_filename = $actual_name ;
						$axis = 2 ;
						$ratio = 500 ;
						$img_src_dir = $path  ;
						$imgfile = $actual_name ;
						$stmp = 'icon.gif' ;
						$stmp_dir = '../img/' ;
					
						
					crop_img($dst_dir2, $dst_dir2, $im_filename, $ratio) ;    // crop image
					
			         watermark($img_src_dir.$imgfile) ;
						
					cr8Thumb($dst_dir, $src_dir, $im_filename, $size, $axis) ;  // create thumbnail
				 
					#add_watermark($dst_dir3 , $img_src_dir , $imgfile , $stmp , $stmp_dir) ; // add watermark
						
								}
							else
								echo "failed";
						}
						else{
						$status = false ;
						$size = $size / 1024 ;
						$size = ceil($size / 1024) ;
						$size .= 'MB';
						$message = "Image $name [size:$size] exceeds file size limit (4MB)" ;
                        }						
						}
						else{
						$status = false ;
						$message = "Invalid file format" ;
						}
						$return['status'] = $status ;
						$return['message'] = $message ;
						
						return $return;
}

function cr8Thumb($dst_dir, $src_dir, $im_filename, $size, $axis ) {
	$img = $src_dir.$im_filename;
	if(file_exists($img)) {
		$file = pathinfo($img);
		
		if ($file['extension'] == 'png') {
			$src = imagecreatefrompng($img);
		}
		elseif ($file['extension'] == 'gif') {
			$src = imagecreatefromgif($img);
		}
		else {
			$src = imagecreatefromjpeg($img);
		}
		#Width and Height calculation
		$src_w = imagesx($src);
		$src_h = imagesy($src);
		if($src_w < $src_h) {
			$n_src_w = $src_w;
			$n_src_h = $src_w;
			$y = (($src_h - $src_w) / $axis); $x = 0;
		}
		else {
			$n_src_w = $src_h; $n_src_h = $src_h;
			$x = (($src_w - $src_h) / $axis); $y = 0;
		}
		#Create and copy part of an image
		$n_src = imagecreatetruecolor($n_src_w, $n_src_h);
		imagecopy($n_src, $src, 0, 0, $x, $y, $n_src_w, $n_src_h);
		#Cteate and resample the copied image/thumb
		$thumb = imagecreatetruecolor($size, $size);
		imagecopyresampled($thumb, $n_src, 0, 0, 0, 0, $size, $size, $n_src_w, $n_src_h);
		#Save resampled thumb to file with their ext
		$filename = $file['filename'];
		$extension = '.'.$file['extension'];
		
	
			imagejpeg($thumb, $dst_dir.$filename.'.jpg');
		
		
		#Destroy image after saved
		imagedestroy($src);
		imagedestroy($n_src);
		imagedestroy($thumb);
	}
	else {
		echo '<b>The image [ '.$img.' ] does not exist in the directory specified' ;
	}
}

function crop_img($dst_dir, $src_dir, $im_filename, $size) {
	$img = $src_dir.$im_filename;
	if(file_exists($img)) {
		$file = pathinfo($img);
		
		if ($file['extension'] == 'png') {
			$src = imagecreatefrompng($img);
		}
		elseif ($file['extension'] == 'gif') {
			$src = imagecreatefromgif($img);
		}
		else {
			$src = imagecreatefromjpeg($img);
		}
		#Width and Height calculation
		$src_w = imagesx($src);
		$src_h = imagesy($src);
		/*var real_width = $(this).width();
            var real_height = $(this).height();
			var size_total = real_width + real_height ;
			var ration = 250 ;
			var width_ration = real_width/size_total * 100;
			var height_ration = real_height/size_total * 100;
			var resize_width = width_ration/100 * ration ;
			var resize_height = height_ration/100 * ration ;*/
		$t_src_l = $src_w + $src_h;
		$r_src_w = ($src_w/$t_src_l)* 100;
		$r_src_h = ($src_h/$t_src_l) * 100;
		
		$n_src_w = ($r_src_w / 100)* $size;
		$n_src_h = ($r_src_h / 100)* $size;
		
		/*if($src_w < $src_h) {
			$n_src_w = $src_w;
			$n_src_h = $src_w;
			$y = (($src_h - $src_w) / $axis); $x = 0;
		}
		else {
			$n_src_w = $src_h; $n_src_h = $src_h;
			$x = (($src_w - $src_h) / $axis); $y = 0;
		}*/
		#Create and copy part of an image
		$n_src = imagecreatetruecolor($n_src_w, $n_src_h);
	#	imagecopy($n_src, $src, 0, 0, $x, $y, $n_src_w, $n_src_h);
	#	imagecopy($n_src, $src, 0, 0, 0, 0, $src_w, $src_h);
		#Cteate and resample the copied image/thumb
	#	$thumb = imagecreatetruecolor($size, $size);
		imagecopyresampled($n_src, $src, 0, 0, 0, 0, $n_src_w, $n_src_h, $src_w, $src_h);
		#Save resampled thumb to file with their ext
		$filename = $file['filename'];
		$extension = '.'.$file['extension'];

		
			imagejpeg($n_src, $dst_dir.$filename.'.jpg');
	
		
		#Destroy image after saved
		imagedestroy($src);
		imagedestroy($n_src);
	}
	else {
		echo '<b>The image [ '.$img.' ] does not exist in the directory specified!</b>' ;
	}
}

// function to generate random numbers
function get_random(){
/// get unique code 
//To Pull 8 Unique Random Values Out Of AlphaNumeric

//removed number 0, capital o, number 1 and small L
//Total: keys = 32, elements = 33
$characters = array(
"A","B","C","D","E","F","G","H","J","K","L","M",
"N","P","Q","R","S","T","U","V","W","X","Y","Z",
"1","2","3","4","5","6","7","8","9","0");

//make an "empty container" or array for our keys
$keys = array();

//first count of $keys is empty so "1", remaining count is 1-7 = total 8 times
while(count($keys) < 8) {
    //"0" because we use this to FIND ARRAY KEYS which has a 0 value
    //"-1" because were only concerned of number of keys which is 32 not 33
    //count($characters) = 33
    $x = mt_rand(0, count($characters));
    if(!in_array($x, $keys)) {
       $keys[] = $x ;
    }
}
@$random_chars = '' ;
foreach($keys as $key){
   @$random_chars .= $characters[$key];
}
return $random_chars;
}

// clean user input
function clean($data){

if(!empty($data)) {
$data = mysql_real_escape_string(htmlspecialchars(strip_tags(trim($data)))) ;
$data = preg_replace('/\s+/', ' ',$data);
}
return $data ;
}

function mail_user($email,$subject,$message){
// compose headers
$mailheaders = "MIME-Version:1.0\r\n";
$mailheaders .= "Content-type:text/html; charset=ISO-8859-1\r\n";
$mailheaders .= "From: theStudybox :: theStudybox <hello@thestudybox.com>\r\n";
$mailheaders .= "Reply-To: theStudybox :: theStudybox <hello@thestudybox.com>\r\n";
// send message
if(@mail($email,$subject,$message,$mailheaders)){
$status = true ;
}
else{
$status = false ;
}
return $status ;
}


?>