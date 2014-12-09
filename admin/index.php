<?php 
include("inc/auth.php"); 
if(isset($_POST['ref'])){
$ref = $_POST['ref'] ;
header("location: $ref") ;
}

$adminName = $_SESSION['SESS_FIRST_NAME'] ;

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

$code = get_random() ;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Dashboard :: Admin Panel</title>
		<link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
		<!--[if IE]><![if gte IE 6]><![endif]-->
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/glow/1.7.0/core/core.js" type="text/javascript"></script>
		<script src="js/glow/1.7.0/widgets/widgets.js" type="text/javascript"></script>
		<link href="js/glow/1.7.0/widgets/widgets.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript">
			glow.ready(function(){
				new glow.widgets.Sortable(
					'#content .grid_5, #content .grid_6',
					{
						draggableOptions : {
							handle : 'h2'
						}
					}
				);
			});
			
		    $(document).ready(function(){
			
			$('#paymentform :submit').click(function(e){
			e.preventDefault();
			$('.req').each(function() {
	
	var content = $.trim($(this).val());
	
	if(content == ''){
		alert('some fields are empty')
		$(this).focus();
		exit();
	}
});
$('#paymentform').submit();
			});
			
			});
		</script>
		<!--[if IE]><![endif]><![endif]-->
	</head>
	<body>

		<h1 id="head">Diplomat Hotels :: Administration Panel</h1>
		
		<ul id="navigation">
			<li><a href="index.php" class="active">Dashboard</a></li>
			<li><a href="rooms.php">Manage Rooms</a></li>
			<li><a href="reservations.php">Manage Reservations</a></li>
			<li><a href="settings.php">Settings</a></li>
			<li><a href="actions/logout.php">Logout</a></li>
			<li>Welcome <?php echo $adminName ; ?> !</li>
		</ul>
			<div id="content" class="container_16 clearfix">
				<div class="grid_5">

				<?php require_once("inc/fn.php"); ?> 
				<?php require_once("inc/connect.php"); ?> 
				
					<div class="box">
						<h2>Statistics</h2>
						<table>
							<tbody>
								<tr>
									<td>Total Reservations</td>
									<td><?php echo count_reservations() ; ?></td>
								</tr>
								<tr>
									<td>Total Rooms Booked</td>
									<td><?php echo count_rooms_booked() ; ?></td>
								</tr>
								<tr>
									<td>Total Rooms</td>
									<td><?php echo count_rooms() ; ?></td>
								</tr>
								
							</tbody>
						</table>
					</div>
					
					
					
				</div>
				<div class="grid_6">
					
					<div class="box">
						<h2>Newest Reservations</h2>
						<div class="utils">
							<a href="reservations.php">View More</a>
						</div>
						<table class="date">
							<thead>
								<tr>
									<th>Name</th>
									<th>Arrival</th>
									<th>Departure</th>
									<th>Room Type</th>
								</tr>
							</thead>
							<tbody>
								<?php echo get_latest_bookings(10) ; ?>
								
							</tbody>
						</table>
						
					</div>
					
					<div class="box">
						<h2>E - Pay</h2>
	<form action="https://41.203.113.80/globalpay_demo/paymentgatewaycapture.aspx" method="post" id="paymentform">
						<table>
							<tbody>
							   <tr>
									<td>Name
									<input type="text" class="req" id="name" name="names" /></td>
								</tr>
								<tr>
							<td>Amount
							
							<input type="text" class="req" id="amount" name="amount" /></td>
									<input type="hidden" name="ref" value="" />
								</tr>
								<tr>
									<td>Email
									<input type="text" class="req" id="email_address" name="email_address" /></td>
								</tr>
								<tr>
									<td>Phone
							<input type="text" class="req" id="phone_number" name="phone_number" /></td>
								</tr>
								<tr>
								<tr>
								<input type="hidden" name="merchantid" value="1177" />
							<input type="hidden" name="currency"  value="NGN" />
							<input type="hidden" name="merch_txnref" value="<?php echo $code ; ?>" />
									<td><input type="submit" value="Process Payment" /></td>
								</tr>
							</tbody>
						</table>
						</form>
					</div>

				</div>
				<div class="grid_5">
					<div class="box">
						<h2>Rooms</h2>
						<div class="utils">
							<a href="rooms.php">View More</a>
						</div>
						<table class="date">
							<thead>
								<tr>
									<th>Type</th>
									<th>Rate</th>
									<th>Quantity</th>
								</tr>
							</thead>
							<tbody>
								<?php echo get_rooms_list() ; ?>
							</tbody>
						</table>
						
					</div>
				</div>
			</div>
		<div id="foot">
			<div class="container_16 clearfix">
				<div class="grid_16">
					
				</div>
			</div>
		</div>
	</body>
</html>