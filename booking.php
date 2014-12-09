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
      Departure  :<?php echo $departure; ?>  <br />
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
					<div id="featured"><br />
 <div>
 <form action="personnalinfo.php" method="post" onsubmit="return validateForm()" name="room">
  <input name="start" type="hidden" value="<?php echo $arival; ?>" />
  <input name="end" type="hidden" value="<?php echo $departure; ?>" />
  <input name="adult" type="hidden" value="<?php echo $adults; ?>" />
  <input name="child" type="hidden" value="<?php echo $child; ?>" />
  <span class="style2">NUMBER OF ROOM/ROOMS:</span> 
  <INPUT id="txtChar" onkeypress="return isNumberKey(event)" type="text" name="no_rooms" class="ed">
 </div><br />
 <?php
$con = mysql_connect("localhost","diploma1_admin","u9xs13lJU3");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("diploma1_hotel", $con);
function formatMoney($number, $fractional=false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}				
$result = mysql_query("SELECT * FROM room");

while($row = mysql_fetch_array($result))
  {
  $a=$row['room_id'];
  $query = mysql_query("SELECT sum(qty_reserve) FROM roominventory where arrival <= '$arival' and departure >= '$departure' and room_id='$a'");
while($rows = mysql_fetch_array($query))
  {
  $inogbuwin=$rows['sum(qty_reserve)'];
  }
  $angavil = $row['qty'] - $inogbuwin;
  
  
echo '<table width="490" border="0">';
  echo '<tr>';
    echo '<td colspan="2">&nbsp;<span class="style2">'.$row['type'].'</span></td>';
  echo '</tr>';
  echo '<tr>';
    echo '<td width="150" rowspan="5">'. '<img width=150 height=105 alt="Unable to View" src="admin/' . $row["image"] . '"/>'.'</td>';
    echo '<td width="340">';
	$rt=$row['rate'];
	echo '$ ';
	echo formatMoney($rt, true);
	echo '</td>';
  echo '</tr>';
  echo '<tr>';
    echo '<td>'.'Room Description: '.$row['description'].'</td>';
  echo '</tr>';
  echo '<tr>';
    echo '<td>'.'Maximum Child Capacity: '.$row['max_child'].'</td>';
  echo '</tr>';
  echo '<tr>';
    echo '<td>'.'Maximum Adult Capacity: '.$row['max_adult'].'</td>';
  echo '</tr>';
  echo '<tr>';
    echo '<td>';
	
	$roomID = $row["room_id"] ;
	
	if ($angavil > 0){

	echo '<input name="reserveImg" type="image" src="images/reseve.jpg" alt="Reserve" align="middle" width="60" height="30" onclick="setDifference(this.form);" />';
	
	echo "<input type='hidden' name='roomid' value = '$roomID'" ;
					}
  if ($angavil <= 0){
	echo '<span class="style5">'.'Not Available'.'</span>';
				    }
	
	
	echo '</td>';
  echo '</tr>';
echo '</table>';
  
  
  
  
  
  
}

mysql_close($con);
?> 
  <input type="hidden" name="result" id="result" />
</form>
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
			<div class="fright">Developed by <a href="http://www.udonline.net/" target="_blank">UDCreate</a></div>
		</div>
	</div>
</div>
</body>
</html>