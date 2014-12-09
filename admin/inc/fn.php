<?php

function get_rooms_list(){
$q = mysql_query("SELECT type,rate,qty FROM room") ;
$data = '' ;
while($r = mysql_fetch_array($q)){
$type = $r['type'] ;
$qty = $r['qty'] ;
$rate = $r['rate'] ;

$data .= "
<tr>
									<td>$type</td>
									<td>$$rate</td>
									<td>$qty</td>
								</tr>
" ;
}
return $data ;
}

function get_latest_bookings($lim){
$q = mysql_query("SELECT firstname,arrival,departure,room_id FROM reservation WHERE status != 'out' ORDER BY reservation_id LIMIT $lim") ;
$data = '' ;
while($r = mysql_fetch_array($q)){

$arrival = $r['arrival'];
$firstname = $r['firstname'];
$departure = $r['departure'];
$rid=$r['room_id'];

// get roomm type
			$q2 = mysql_query("SELECT * FROM room WHERE room_id = '$rid'");
			$r2 = mysql_fetch_array($q2) ;
			$roomtype =  $r2['type'];
			
			$data .= "
			<tr>
									<td>$firstname</td>
									<td>$arrival</td>
									<td>$departure</td>
									<td>$roomtype</td>
								</tr>
			" ;

}
return $data ;
}

function count_reservations(){
$q = mysql_query("SELECT COUNT(reservation_id) AS cts FROM reservation WHERE status != 'out'") or die (mysql_error());
$r = mysql_fetch_array($q);
$counts = $r['cts'] ;
return $counts ;
}

function count_rooms_booked(){
$q = mysql_query("SELECT SUM(qty_reserve) AS sum FROM roominventory WHERE status != 'out'")or die (mysql_error());
$r = mysql_fetch_array($q);
$sum = $r['sum'] ;
return $sum ;
}

function count_rooms(){
$q = mysql_query("SELECT SUM(qty) AS sum FROM room")or die (mysql_error());
$r = mysql_fetch_array($q);
$sum = $r['sum'] ;
return $sum ;
}

?>
