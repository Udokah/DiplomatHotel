<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Accomodations - Diplomat Hotels</title>
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
<a class="wsl" href="http://wowslider.com">Image Slider Plugin by WOWSlider.com v3.4</a>
	<a href="#" class="ws_frame"></a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
<!-- End WOWSlider.com BODY section -->
</div>
					<div class="inner">
						<ul class="nav">
					 		<li><a href="index.php">Home</a></li>
							<li><a href="accomodations.php">Accomodations</a></li>
							<li><a href="gallery.php">Gallery</a></li>
								<li><a href="events.php">Meetings & Events</a></li>
								<li><a href="reservation.php">Reservation</a></li>
								<li><a href="contact.php" class="current">Contact</a></li>
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
		<div class="gallery">
			<ul>
		  <?php
		  //path to directory to scan
		  $directory = "dhimg/";
 		  //get all image files with a .jpg extension.
		  $images = glob($directory . "*.jpg");
 		  //print each file name
		  $i = 6 ;
		  foreach($images as $image){
		  if($i !== 0 ){
		  echo "<li><a href='#'><img alt='' src='$image' /></a></li>" ;
		  $i-- ;
		  }
		  }
		  ?>
			</ul>
		</div>
		<div class="wrapper">
			<div class="aside maxheight">
<!-- box begin -->
<!-- box end -->
			</div>
			<div class="content">
				<div class="indent">
					<div class="container">
					
<p>
<dl class="contacts-list">
								<dd>1 Shonny Way</dd>
								<dd>Shonibare Estate, Maryland</dd>
								<dd>Lagos</dd>
								<dd>Telephone: 234 803-713-7196</dd>
								<dd>Fax: 234 803-713-7196</dd>
							</dl>
</p>

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