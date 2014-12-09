
<?php
if (!isset($_POST['submit'])) {

	$errmsg_arr = array();
	
	$errflag = false;
	
	$con = mysql_connect("localhost","diploma1_admin","u9xs13lJU3");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("diploma1_hotel", $con);

function createRandomPassword() {



    $chars = "abcdefghijkmnopqrstuvwxyz023456789";

    srand((double)microtime()*1000000);

    $i = 0;

    $pass = '' ;



    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }



    return $pass;



}
$confirmation = createRandomPassword();
	$arival = $_POST['start'];
	$departure = $_POST['end'];
	$adults = $_POST['adult'];
	$child = $_POST['child'];	
	$nroom = $_POST['n_room'];
$stat= 'Active';
	$roomid = $_POST['rm_id'];
	$result = $_POST['result'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$result5 = mysql_query("SELECT * FROM reservation where email='$email' and password='$password'");
while($row2 = mysql_fetch_array($result5))
  {
  $name = $row2['firstname'];
	$last = $row2['lastname'];
	$address = $row2['province'];
	$city = $row2['city'];
	$zip = $row2['zip'];
	$country = $row2['country'];
	$password = $row2['password'];
	$email = $row2['email'];
	$cnumber = $row2['contact'];
  
  }
	$result1 = mysql_query("SELECT * FROM room where room_id='$roomid'");
while($row = mysql_fetch_array($result1))
  {
  $rate=$row['rate'];
  $type=$row['type'];
  
  }
  
    $xchrate = 160.17 ; /// Dollar exchange rate
  
  $payable1= ceil ( $rate*$result*$nroom ) ;
  
  $payable2= ceil ( $rate*$result*$nroom*$xchrate ) ;
	
	
	
	//send the email
		$mail_To = $email;
                $mail_Subject = "Reservation notification From Diplomat Hotels";
                $mail_Body = "First Name: $name\n".
		"Last Name: $last\n".
		"Email: $email \n".
		"City: $city \n".
		"Zip Code: $zip \n".
		"Country: $country \n".
		"Contact Number: $cnumber \n".
		"Password: $password \n".
		"Check In: $arival\n ".
		"Check Out: $departure\n ".
		"Number of Adults: $adults\n ".
		"Number of child: $child\n ".
		"Total nights of stay: $result\n ".
		"Room Type: $type\n ".
		"Number of rooms: $nroom\n ".
		"Payable amount: $payable2\n ".
		"Confirmation Number: $confirmation\n ";
                @mail($mail_To, $mail_Subject, $mail_Body);
	
	$sql="INSERT INTO reservation (arrival, departure, adults, child, result, room_id, no_room, firstname, lastname, city, zip, province, country, email, contact, password, payable, confirmation)
VALUES
('$arival','$departure','$adults','$child','$result','$roomid','$nroom','$name','$last','$city','$zip','$address','$country','$email','$cnumber','$password','$payable2','$confirmation')";
mysql_query("INSERT INTO roominventory (arrival, departure, qty_reserve, room_id, confirmation, status) VALUES ('$arival','$departure','$nroom','$roomid','$confirmation','$stat')");
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

}
mysql_close($con)

	
?>

<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Reservation and Booking - Diplomat Hotels</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta name="description" <meta name="description" content="The Diplomat Hotels offers 70 comfortable and well-equipped, air conditioned guestrooms. Room facilities include climate control, coffee/tea maker, direct-dial telephone, emergency light and in-room safe."/>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/layout.css" rel="stylesheet" type="text/css" />
<script src="js/maxheight.js" type="text/javascript"></script>
<!--[if lt IE 7]>
	<link href="ie_css/style.css" rel="stylesheet" type="text/css" />
   <script type="text/javascript" src="ie_png.js"></script>
   <script type="text/javascript">
	   ie_png.fix('.png, #header .row-2, #header .nav li a, #content, .gallery li');
   </script>
<![endif]-->

<script type="text/javascript">
function validateForm()
{

var y=document.forms["room"]["no_rooms"].value;

if ((y==null || y==""))
  {
  alert("all field are required!");
  return false;
  }

}
</script>
<!--sa minus date-->
<script type="text/javascript">
	// Error checking kept to a minimum for brevity
 
	function setDifference(frm) {
	var dtElem1 = frm.elements['start'];
	var dtElem2 = frm.elements['end'];
	var resultElem = frm.elements['result'];
	 
// Return if no such element exists
	if(!dtElem1 || !dtElem2 || !resultElem) {
return;
	}
	 
	//assuming that the delimiter for dt time picker is a '/'.
	var x = dtElem1.value;
	var y = dtElem2.value;
	var arr1 = x.split('/');
	var arr2 = y.split('/');
	 
// If any problem with input exists, return with an error msg
if(!arr1 || !arr2 || arr1.length != 3 || arr2.length != 3) {
resultElem.value = "Invalid Input";
return;
	}
	 
var dt1 = new Date();
dt1.setFullYear(arr1[2], arr1[1], arr1[0]);
var dt2 = new Date();
dt2.setFullYear(arr2[2], arr2[1], arr2[0]);

resultElem.value = (dt2.getTime() - dt1.getTime()) / (60 * 60 * 24 * 1000);
}
</script>

<!--sa input that accept number only-->
<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>

<!--end sa nivo slider--><?php
	
	$arival = $_POST['start'];
	$departure = $_POST['end'];
	$adults = $_POST['adult'];
	$child = $_POST['child'];	
	
?>

<style>
         
		 table{
		 background-color: ;
		 color: #000 ;
		 }
		 
		 table tr td{
		 padding:5px;
		 background-color:#fff ;
		 font-size:16px;
		 box-shadow:1px 1px 1px #ddd inset;
		 letter-spacing:1px;
		 font-family: 'PT Sans Narrow',Calibri,'Myriad Pro',Tahoma,Arial;
		 border-radius:0px 5px 5px 0px;
		 }
		 
		 table tr td:first-child{
		 background-color:#eee;
		 text-transform:uppercase;
		 border:none;
		 font-size:12px;
		 font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;
		 padding:8px;
		 text-shadow:1px 1px 1px #333 ;
		 border-radius:5px 0px 0px 5px;
		 text-align:left !important;
		 }
		 
		  	input[type=submit] {
	padding:8px 18px;
	cursor:pointer;
	background-image:url(images/nav-bg2.png) ;
	border:1px solid red;
	color:#fff;
	font-weight:bold;
	}
	
	input[type=submit]:hover{
	background-image:none ;
	background-color:red;
	}


</style>
</head>
<body id="page2" onload="new ElementMaxHeight();">
<div id="main">
<!-- header -->
	<div id="header" class="small">
		<div class="row-1">
	 		<div class="wrapper">
				<div class="logo">
					<h1><a href="index.php"><img src="images/logo.jpg" /></a></h1>
					 
					 
				</div>
				<div class="phones">
					Telephone: 234 803-713-7196<br />
					Fax: 234 803-713-7196
				</div>
			</div>
		</div>
		<div class="row-2">
	 		<div class="indent">
<!-- header-box begin -->
				<div class="header-box">
<div class="slider">
<img src="data1/images/slide1.jpg" alt="slide1" title="slide1" id="wows1_0"/>
</div>
					<div class="inner">
						<ul class="nav">
					 		<li><a href="index.php">Home</a></li>
							<li><a href="accomodations.php">Accomodations</a></li>
							<li><a href="gallery.php">Gallery</a></li>
								<li><a href="events.php">Meetings & Events</a></li>
								<li><a href="reservation.php">Reservation</a></li>
								<li><a href="contact.php">Contact</a></li>
						</ul>
					</div>
				</div>
<!-- header-box end -->
			</div>
		</div>
	</div><div class="ic"></div>
<!-- content -->
	<div id="content">
	<br /><br /><br /><br /><br /><br />
		
		<div class="wrapper">
			<div class="aside maxheight">
<!-- box begin -->
				<div class="box maxheight">
					<div class="inner">
					<h3>Reservation Details</h3>
					
					 <ul>
      Arrival :<?php echo $arival; ?><br />
      Departure :<?php echo $departure; ?>  <br />
	  Adults : <?php echo $adults; ?><br />
	  Child :<?php echo $child; ?><br />
	  
 </ul>
					
					</div>
				</div>
<!-- box end -->
			</div>
			<div class="content">
				<div class="indent">
					<h2>Reservation And Booking</h2>
			<div id="featured">
					<table>
  <tr>
    <td width="140"><div align="right">Arrival </div></td>
    <td width="304"><?php echo $arival ;  ?></td>
  </tr>
  <tr>
    <td><div align="right">Departure</div></td>
    <td><?php  echo $departure ;  ?></td>
  </tr>
  <tr>
    <td><div align="right">Adults</div></td>
    <td><?php  echo $adults ;  ?></td>
  </tr>
  <tr>
    <td><div align="right">Child</div></td>
    <td><?php echo  $child ;  ?></td>
  </tr>
  <tr>
    <td><div align="right">Number of Rooms</div></td>
    <td><?php echo $nroom ;  ?></td>
  </tr>
  <tr>
    <td><div align="right">Room Type</div></td>
    <td><?php echo   $type ;  ?></td>
  </tr>
  <tr>
    <td><div align="right">Number of nights</div></td>
    <td><?php echo  $result ;  ?></td>
  </tr>
  <tr>
    <td><div align="right">Firstname</div></td>
    <td><?php  echo $name ;  ?></td>
  </tr>
  <tr>
    <td><div align="right">Lastname</div></td>
    <td><?php echo  $last ;  ?></td>
  </tr>
  <tr>
    <td><div align="right">Address</div></td>
    <td><?php  echo $address ;  ?></td>
  </tr>
  <tr>
    <td><div align="right">City</div></td>
    <td><?php  echo $city ;  ?></td>
  </tr>
  <tr>
    <td><div align="right">ZIP Code</div></td>
    <td><?php  echo $zip ;  ?></td>
  </tr>
  <tr>
    <td><div align="right">Country</div></td>
    <td><?php  echo $country ;  ?></td>
  </tr>
  <tr>
    <td><div align="right">Email</div></td>
    <td><?php echo  $email ;  ?></td>
  </tr>
  <tr>
    <td><div align="right">Contact Number</div></td>
    <td><?php  echo $cnumber ;  ?></td>
  </tr>
   <tr>
    <td><div align="right">Amount Due USD</div></td>
    <td>$<?php echo $payable1; ?></td>
  </tr>
  <tr>
    <td><div align="right">USD Exchange Rate</div></td>
    <td><?php echo $xchrate; ?></td>
  </tr>
  <tr>
    <td><div align="right">Amount Due NGN</div></td>
    <td>₦<?php echo $payable2; ?></td>
  </tr>
   <tr>
    <td><div align="right">Payment Status</div></td>
    <td>UNPAID </td>
  </tr>
  <tr>
  <td colspan=2 style="text-align:center!important;">
     <form action="https://41.203.113.80/globalpay_demo/paymentgatewaycapture.aspx" method="post" name="paymentform">
	<input type="hidden" name="merchantid" value="1177" />
	<input type="hidden" name="names" value="<?php echo $name.' '.$last ; ?>" />
	<input type="hidden" name="amount"  value="<?php echo $payable2 ; ?>" />
	<input type="hidden" name="currency"  value="NGN" />
	<input type="hidden" name="email_address" value="<?php echo $email ; ?>" />
	<input type="hidden" name="phone_number" value="<?php echo $cnumber ; ?>" />
	<input type="hidden" name="merch_txnref" value="<?php echo $confirmation ; ?>" />
	<input type="submit" value="PAY" /> 
	</form>
	</td>
  </tr>
</table>
</div>	
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- footer -->
	<div id="footer">
  		  
		<div class="wrapper">
			<div class="fleft">Copyright (c) <?php echo date('Y') ; ?> Diplomat Hotels</div>
		</div>
	</div>
</div>
</body>
</html>
<?php
if (!isset($_POST['submit'])) {

	$errmsg_arr = array();
	
	$errflag = false;
	
	$con = mysql_connect("localhost","diploma1_admin","u9xs13lJU3");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("diploma1_hotel", $con);

$confirmation = createRandomPassword();
	$arival = $_POST['start'];
	$departure = $_POST['end'];
	$adults = $_POST['adult'];
	$child = $_POST['child'];	
	$nroom = $_POST['n_room'];
$stat= 'Active';
	$roomid = $_POST['rm_id'];
	$result = $_POST['result'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$result5 = mysql_query("SELECT * FROM reservation where email='$email' and password='$password'");
while($row2 = mysql_fetch_array($result5))
  {
  $name = $row2['firstname'];
	$last = $row2['lastname'];
	$address = $row2['province'];
	$city = $row2['city'];
	$zip = $row2['zip'];
	$country = $row2['country'];
	$password = $row2['password'];
	$email = $row2['email'];
	$cnumber = $row2['contact'];
  
  }
	$result1 = mysql_query("SELECT * FROM room where room_id='$roomid'");
while($row = mysql_fetch_array($result1))
  {
  $rate=$row['rate'];
  $type=$row['type'];
  
  }
  $payable= $rate*$result*$nroom;
	
	
	
	//send the email
		$mail_To = $email;
                $mail_Subject = "Reservation notification From Diplomat Hotels";
                $mail_Body = "First Name: $name\n".
		"Last Name: $last\n".
		"Email: $email \n".
		"City: $city \n".
		"Zip Code: $zip \n".
		"Country: $country \n".
		"Contact Number: $cnumber \n".
		"Password: $password \n".
		"Check In: $arival\n ".
		"Check Out: $departure\n ".
		"Number of Adults: $adults\n ".
		"Number of child: $child\n ".
		"Total nights of stay: $result\n ".
		"Room Type: $type\n ".
		"Number of rooms: $nroom\n ".
		"Payable amount: $payable\n ".
		"Confirmation Number: $confirmation\n ";
                @mail($mail_To, $mail_Subject, $mail_Body);
	
	$sql="INSERT INTO reservation (arrival, departure, adults, child, result, room_id, no_room, firstname, lastname, city, zip, province, country, email, contact, password, payable, confirmation)
VALUES
('$arival','$departure','$adults','$child','$result','$roomid','$nroom','$name','$last','$city','$zip','$address','$country','$email','$cnumber','$password','$payable','$confirmation')";
mysql_query("INSERT INTO roominventory (arrival, departure, qty_reserve, room_id, confirmation, status) VALUES ('$arival','$departure','$nroom','$roomid','$confirmation','$stat')");
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

}
mysql_close($con)

	
?>