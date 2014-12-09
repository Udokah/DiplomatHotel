<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Diplomat Hotels</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta name="description" content="The hotel offers 70 comfortable, and well-equipped, air-conditioned guestrooms.">
<meta name="keywords" content="hotel, accomodation, lodging, lagos, nigeria, booking, reservation">
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


<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="engine1/style.css" media="screen" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->

<!--sa calendar-->	
	<script type="text/javascript" src="js/datepicker.js"></script>


<script type="text/javascript">
//<![CDATA[

/*
        A "Reservation Date" example using two datePickers
        --------------------------------------------------

        * Functionality

        1. When the page loads:
                - We clear the value of the two inputs (to clear any values cached by the browser)
                - We set an "onchange" event handler on the startDate input to call the setReservationDates function
        2. When a Arrival is selected
                - We set the low range of the endDate datePicker to be the Arrival the user has just selected
                - If the endDate input already has a date stipulated and the date falls before the new Arrival then we clear the input's value

        * Caveats (aren't there always)

        - This demo has been written for dates that have NOT been split across three inputs

*/

function makeTwoChars(inp) {
        return String(inp).length < 2 ? "0" + inp : inp;
}

function initialiseInputs() {
        // Clear any old values from the inputs (that might be cached by the browser after a page reload)
        document.getElementById("sd").value = "";
        document.getElementById("ed").value = "";

        // Add the onchange event handler to the Arrival input
        datePickerController.addEvent(document.getElementById("sd"), "change", setReservationDates);
}

var initAttempts = 0;

function setReservationDates(e) {
        // Internet Explorer will not have created the datePickers yet so we poll the datePickerController Object using a setTimeout
        // until they become available (a maximum of ten times in case something has gone horribly wrong)

        try {
                var sd = datePickerController.getDatePicker("sd");
                var ed = datePickerController.getDatePicker("ed");
        } catch (err) {
                if(initAttempts++ < 10) setTimeout("setReservationDates()", 50);
                return;
        }

        // Check the value of the input is a date of the correct format
        var dt = datePickerController.dateFormat(this.value, sd.format.charAt(0) == "m");

        // If the input's value cannot be parsed as a valid date then return
        if(dt == 0) return;

        // At this stage we have a valid YYYYMMDD date

        // Grab the value set within the endDate input and parse it using the dateFormat method
        // N.B: The second parameter to the dateFormat function, if TRUE, tells the function to favour the m-d-y date format
        var edv = datePickerController.dateFormat(document.getElementById("ed").value, ed.format.charAt(0) == "m");

        // Set the low range of the second datePicker to be the date parsed from the first
        ed.setRangeLow( dt );
        
        // If theres a value already present within the Departure input and it's smaller than the Arrival
        // then clear the Departure value
        if(edv < dt) {
                document.getElementById("ed").value = "";
        }
}

function removeInputEvents() {
        // Remove the onchange event handler set within the function initialiseInputs
        datePickerController.removeEvent(document.getElementById("sd"), "change", setReservationDates);
}

datePickerController.addEvent(window, 'load', initialiseInputs);
datePickerController.addEvent(window, 'unload', removeInputEvents);

//]]>
</script>

<!--sa error trapping-->
<script type="text/javascript">
function validateForm()
{
var x=document.forms["index"]["start"].value;
if (x==null || x=="")
  {
  alert("you must enter your Arrival(click the calendar icon)");
  return false;
  }
var y=document.forms["index"]["end"].value;
if (y==null || y=="")
  {
  alert("you must enter your Departure (click the calendar icon)");
  return false;
  }
}

function removeWOW(){
$(document).ready(function(){
$('body a').each(function(){
var link = $(this).html();
if(link == 'WOWSlider.com'){
$(this).hide();
}
}) ;
});
}
</script>

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
    <link href="css/demo.css"       rel="stylesheet" type="text/css" />
        <link href="css/datepicker.css" rel="stylesheet" type="text/css" />
		
		<style>
			input[type=submit] {
	padding:8px 18px;
	cursor:pointer;
	background-image:url(images/nav-bg2.png) ;
	border:1px solid red;
	color:#fff;
	font-weight:bold;
	height:30px !important;
	}
	
	input[type=submit]:hover{
	background-image:none ;
	background-color:red;
	}
		</style>
</head>
<body id="page1" onload="new ElementMaxHeight();">
<div id="main">
<!-- header -->
	<div id="header">
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
<!-- Start WOWSlider.com BODY section id=wowslider-container1 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="data1/images/slide1.jpg" alt="slide1" title="slide1" id="wows1_0"/></li>
<li><img src="data1/images/slide2.jpg" alt="slide2" title="slide2" id="wows1_1"/></li>
<li><img src="data1/images/slide3.jpg" alt="slide3" title="slide3" id="wows1_2"/></li>
<li><img src="data1/images/slide4.jpg" alt="slide4" title="slide4" id="wows1_3"/></li>
<li><img src="data1/images/slide5.jpg" alt="slide5" title="slide5" id="wows1_4"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="slide1"><img src="data1/tooltips/slide1.jpg" alt="slide1"/>1</a>
<a href="#" title="slide2"><img src="data1/tooltips/slide2.jpg" alt="slide2"/>2</a>
<a href="#" title="slide3"><img src="data1/tooltips/slide3.jpg" alt="slide3"/>3</a>
<a href="#" title="slide4"><img src="data1/tooltips/slide4.jpg" alt="slide4"/>4</a>
<a href="#" title="slide5"><img src="data1/tooltips/slide5.jpg" alt="slide5"/>5</a>
</div></div>
	<a href="#" class="ws_frame"></a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
<!-- End WOWSlider.com BODY section -->
</div>
					<div class="inner">
						<ul class="nav">
					 		<li><a href="index.php" class="current">Home</a></li>
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
		<div class="wrapper">
			<div class="aside maxheight">
<!-- box begin -->
				<div class="box maxheight">
					<div class="inner">
						<h3>Reservation:</h3>
<form method="post" id="reservation-form" action="booking.php" name="index" onsubmit="return validateForm()">
							<fieldset>
<div style="margin-top:20px; margin-left:-30px;">
 <table width="250" border="0">
  <tr>
    <td width="69"><div align="right">
      <label>Arrival : </label>
    </div></td>
    <td width="101"><input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="start" id="sd" value="" maxlength="10" readonly="readonly" /></td>
  </tr>
  <tr>
    <td><div align="right">
      <label>Departure : </label>
    </div></td>
    <td><input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="end" id="ed" value="" maxlength="10" readonly="readonly" /></td>

  </tr>
  <tr>
    <td><div align="right">
      <label>Adult : </label>
    </div></td>
    <td><select name="adult" class="ed" >
      <option>1</option>
      <option>2</option>
      <option>3</option>
    </select></td>
  </tr>
  <tr>
    <td><div align="right">
      <div align="right">
        <label>Child : </label>
      </div>
    </div></td>
    <td><select name="child" class="ed">
      <option>0</option>
      <option>1</option>
      <option>2</option>
    </select></td>
  </tr>
  <tr>
    <td><div align="right"></div></td>
    <td></td>
  </tr>
  <tr>
    <td colspan="2">
	<div align="right">
	<div class="button"><span><span><input type="submit" value="Check Availability" /></span></span></div>
	<br />
	<div class="button"><span><span><a rel="facebox" href="ajax/modifyindex.php" >Modify Reservation</a></span></span></div>
	<br />
	<div class="button"><span><span><a rel="facebox"  href="ajax/cancelindex.php" >Cancel Reservation</a></span></span></div>
	</div>
	</td>
    </tr>
</table> 
 </div>    
							</fieldset>
							</form>
					</div>
				</div>
<!-- box end -->
			</div>
			<div class="content">
				<div class="indent">

					<img class="img-indent png frame" alt="" src="images/1page-img1.jpg" />
					<div align=justify class="alt-top">The Diplomat Hotel offers 70 comfortable and wel l- equipped, air conditioned guestrooms. Room facilities include climate control, coffee/tea maker, direct-dial telephone, emergency light and in-room safe. Beds - extra towels and bedding items are provided in the guestrooms. Bathroom amenities include complimentary toiletries, hair dryer, makeup/shaving mirror and shower/tub combination. </div>
<div align=justify><BR></div><BR>
<div align=justify><B>Entertainment</B> - In-room entertainment options at Diplomat Hotel include satellite TV service and Plasma television. Internet connection options. </div>
<div align=justify><BR></div>
<div align=justify><B>Dining facilities</B> at the Diplomat Hotel include a restaurant and a cafeteria, with both local, Indian, Chinese and all continental dishes. Breakfast is available - surcharge apply. There is also room service available. The hotel boasts a 24 hour front desk service. </div>
<div align=justify><BR></div>
<div align=justify><B>Leisure amenities</B> - there is an outdoor swimming pool at the hotel. Guests can also enjoy the following - pedicure, manicure, massage, newspapers in lobby, computer rental, concierge desk, dry cleaning/laundry service, medical assistance available, on-site car rental, porter/bellhop and television in the lobby. </div>
<div align=justify><BR></div>
<div align=justify><B>Business/Internet</B> - Diplomat Hotel features a well-equipped business centre complete with audio-visual equipment and conference/meeting rooms. </div>
<div align=justify><BR></div>
<div align=justify><B>Security</B> of our guests is our main concern, the Diplomat Hotel is placed under the protection of an impressive Security - Surveillance system with Permanent Armed Mobile Policemen.</div>
					<div class="line-hor"></div>
				
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