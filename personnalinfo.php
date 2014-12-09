
<?php
$con = mysql_connect("localhost","diploma1_admin","u9xs13lJU3");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("diploma1_hotel", $con);
	
	$arival = $_POST['start'];
	$departure = $_POST['end'];
	$adults = $_POST['adult'];
	$child = $_POST['child'];	
	$no_rooms = $_POST['no_rooms'];
	$roomid = $_POST['roomid'];
	$results = floor ( $_POST['result'] ) ;

$result = mysql_query("SELECT * FROM room WHERE room_id='$roomid'") or die(mysql_error());

while($row1 = mysql_fetch_array($result))
  {
  $roomtype=$row1['type'];
  }
	
?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Personal Information - Diplomat Hotels</title>
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

<!--sa poip up-->
 <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
 
  <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
<!--sa error trapping-->

<script type="text/javascript">
function validateForm()
{

var y=document.forms["personal"]["name"].value;
var a=document.forms["personal"]["last"].value;
// var b=document.forms["personal"]["address"].value;
// var c=document.forms["personal"]["city"].value;
// var d=document.forms["personal"]["zip"].value;
// var e=document.forms["personal"]["country"].value;
var f=document.forms["personal"]["email"].value;
var g=document.forms["personal"]["cemail"].value;
// var x=document.forms["personal"]["cnumber"].value;
var i=document.forms["personal"]["password"].value;

var code=document.forms["personal"]["codetype"].value;
var codetype=document.forms["personal"]["codetypecopy"].value;

var atpos=f.indexOf("@");
var dotpos=f.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=f.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }

if( codetype != code ) {
alert("Invalid Code Pls. try again........ thank you");
  return false;
}



if( f != g ) {
alert("email does not match");
  return false;
} 
if ((a=="Lastname" || a=="") || (f=="Email" || f=="") || (g=="Confirm Email" || g=="") || (y=="Firstname" || y=="") || (i=="Password" || i==""))
  {
  alert("all field are required!");
  return false;
  }
 
if (document.personal.condition.checked == false)
{
alert ('pls. agree the term and condition of this hotel');
return false;
}
else
{
return true;
}
}
</script>
<script type="text/javascript">
function validateForm1()
{
var r=document.forms["log"]["email"].value;
var g=document.forms["log"]["password"].value;
var atpos=r.indexOf("@");
var dotpos=r.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=r.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }  

if ((a==null || a==""))
  {
  alert("pls.enter your password");
  return false;
  }
}
</script>

<!--sa input that accept number only-->
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
  </script>

</script>


 <script type="text/javascript">

   //Created / Generates the captcha function    
    function DrawCaptcha()
    {
        var a = Math.ceil(Math.random() * 10)+ '';
        var b = Math.ceil(Math.random() * 10)+ '';       
        var c = Math.ceil(Math.random() * 10)+ '';  
        var d = Math.ceil(Math.random() * 10)+ '';  
        var e = Math.ceil(Math.random() * 10)+ '';  
        var f = Math.ceil(Math.random() * 10)+ '';  
        var g = Math.ceil(Math.random() * 10)+ '';  
        var code = a + b +  c +  d +  e +  f +  g;
        document.getElementById("txtCaptcha").value = code
    }

    
 
    </script>
	
	<style>
	input[type=text] , input[type=password] {
	width:200px !important;
	border:1px solid #000 ;
	padding:5px;
	border-radius:5px;
	}
	
	table td{
	padding:5px;
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
<body id="page2"  onload="DrawCaptcha()">
<div id="main">
<div style="display:none;">
<?php

	
	$arival = $_POST['start'];
	$departure = $_POST['end'];
	$adults = $_POST['adult'];
	$child = $_POST['child'];	
	$no_rooms = $_POST['no_rooms'];
	$roomid = $_POST['roomid'];
	$result = $_POST['result'];
	
?>
</div>
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
      Arrival :<?php echo $arival; ?><br />
      Departure  :<?php echo $departure; ?>  <br />
	  Adults : <?php echo $adults; ?><br />
	  Child :<?php echo $child; ?><br />
	  Number of Rooms : <?php echo $no_rooms; ?><br />
	  Room Type : <?php echo $roomtype; ?><br />
      Number Of Nights : <?php echo $results; ?><br />
					</div>
				</div>
<!-- box end -->
			</div>
			<div class="content">
				<div class="indent">
					<h2>Reservation And Booking</h2>
					<div class="container">
						
		 <form action="old_user_payment.php" method="post"  onsubmit="return validateForm1()" name="log">
  <input name="start" type="hidden" value="<?php echo $arival; ?>" />
  <input name="end" type="hidden" value="<?php echo $departure; ?>" />
  <input name="adult" type="hidden" value="<?php echo $adults; ?>" />
  <input name="child" type="hidden" value="<?php echo $child; ?>" />
  <input name="n_room" type="hidden" value="<?php echo $no_rooms; ?>" />
  <input name="rm_id" type="hidden" value="<?php echo $roomid; ?>" />
<input name="rm_type" type="hidden" value="<?php echo $roomtype; ?>" />
  <input name="result" type="hidden" value="<?php echo $results; ?>" />
  <table border="0">
  <tr>
  <td>Email</td>
  <td><input name="email" type="text" class="ed" id="last" size="35" /></td>
  </tr>
  <tr>
  <td>Password</td>
  <td><input name="password" type="password" class="ed" id="address" size="35" /></td>
  <input name="login" type="hidden" value="login" />
  </tr>
	<tr>
	<td></td>
  <td><input name="login" type="submit" value="login" /></td>
    </tr>
	</table> 
 </form>
 
<div> 
<form action="new_user_payment.php" method="post" onsubmit="return validateForm()" name="personal">
   
     <input name="start" type="hidden" value="<?php echo $arival; ?>" />
     <input name="end" type="hidden" value="<?php echo $departure; ?>" />
     <input name="adult" type="hidden" value="<?php echo $adults; ?>" />
     <input name="child" type="hidden" value="<?php echo $child; ?>" />
     <input name="n_room" type="hidden" value="<?php echo $no_rooms; ?>" />
<input name="rm_type" type="hidden" value="<?php echo $roomtype; ?>" />
     <input name="rm_id" type="hidden" value="<?php echo $roomid; ?>" />
     <input name="result" type="hidden" value="<?php echo $results; ?>" />
      </div>
     <br />
      <div align="center"><span class="style1"> All field mark with this symbol (<span class="style3">*</span>) are required to be fill up</span></div>
     
   <table border="0" style="width:650px;">
    <tr>
      <td width="133"><div align="right" class="style1">First Name:</div></td>
      <td width="262"><input name="name" type="text" class="ed" id="name" size="35" />
        <span class="style3">*</span></td>
      <td width="93">&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right" class="style1">Last Name:</div></td>
      <td><input name="last" type="text" class="ed" id="last" size="35" />
      <span class="style3">*</span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right" class="style1">Address:</div></td>
      <td><input name="address" type="text" style="width:350px !important" class="ed" id="address" />*
     </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right" class="style1">City:</div></td>
      <td><input name="city" type="text" class="ed" id="city" size="35" />
      <span class="style3">*</span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right" class="style1">Country:</div></td>
      <td><input name="country" type="text" class="ed" id="country" size="35" />
      <span class="style3">*</span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right" class="style1">Zip Code:</div></td>
      <td><input name="zip" type="text" class="ed" id="zip" size="25" />
      <span id="errmsg"></span> <span class="style3">*</span> </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right" class="style1">Email:</div></td>
      <td><input name="email" type="text" class="ed" id="email" size="35" />
      <span class="style3">*</span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right" class="style1">Retype Email:</div></td>
      <td><input name="cemail" type="text" class="ed" id="cemail" size="35" />
      <span class="style3">*</span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right" class="style1">Password:</div></td>
      <td><input name="password" type="password" class="ed" id="password" size="35" />
      <span class="style3">*</span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right" class="style1">Contact Number:</div></td>
      <td><input name="cnumber" type="text" class="ed" id="cnumber" size="25" />
      <span id="errmsg1"></span><span class="style3">*</span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right"></div></td>
      <td colspan="2"><label>
      <input type="checkbox" name="condition" value="checkbox" />
      <span class="style1"><small>i agree the <a rel="facebox" href="terms.php">terms and condition</a> of this hotel</small></span></label></td>
      </tr>
    <tr>
      <td><div align="right"></div></td>
      <td><div id="Layer1">
        <input type="text" name="codetypecopy" id="txtCaptcha" 
style="text-align:center; border:none; font-weight:bold; font-family:Modern; font-size:20px; font-size: 20px; width: 230px;" />
        <img src="images/captcha.png" width="230" height="30" style="margin-top:-30px;" /></div></td>
      <td style="overflow:hidden;"><a href="#" onclick="DrawCaptcha();"><img src="images/refresh.png" alt="refresh" border="0" style="margin-top:5px; margin-left:5px;" /></a></td>
    </tr>
    <tr>
      <td><div align="right" class="style1">Enter the Code here: </div></td>
      <td><input name="codetype" type="text" class="ed" id="code" size="35" /><span class="style3">*</span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right"></div></td>
      <td><input name="but" type="submit" value="Confirm" /></td>
      <td>&nbsp;</td>
    </tr>
  </table>

 </form>
 
 
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