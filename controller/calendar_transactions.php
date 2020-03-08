<?php
require('db.php');

$data = array();

$s = "SELECT * FROM transaction t left join equipment e on e.id = t.eqp_id left join benefeciaries b on b.id = t.bfcry_id left join area_inspected ai on ai.id = b.specific_area ORDER BY t.id";
$qry = $conn->query($s) or trigger_error(mysqli_error($conn)." ".$s);
while($a = mysqli_fetch_assoc($qry)){
	$data[] = array(
		'id' => $a['id'],
		'start' => $a['date_borrowed'],
		'title'=> "Equipment Name: ".ucwords($a['equipment_name'])." borrowed by: ".ucwords($a['benefeciaries'])." Area Used".ucwords($a['area_address']),
		'end' => $a['date_return'],
		'backgroundColor' => '#f56954',
		'borderColor' => '#f56954'

	);
}
echo json_encode($data);