<?php
require('db.php');

$data = array();

$s = "SELECT * FROM transaction t left join equipment e on e.id = t.eqp_id left join benefeciaries b on b.id = t.bfcry_id left join area_inspected ai on ai.id = b.specific_area  ORDER BY t.id";
$qry = $conn->query($s) or trigger_error(mysqli_error($conn)." ".$s);
while($a = mysqli_fetch_assoc($qry)){
	$d = array();
	$d['title'] = '';
	$dc_id = $a['dc_id'];
	$dc = "SELECT *, concat(fname,' ',lname) as dc_name from district_coordinator where id = '$dc_id'";
	$qry_1 = $conn->query($dc) or trigger_error(mysqli_error($conn)." ".$qry_1);
	$z = mysqli_fetch_assoc($qry_1);

	$d['id'] = $a['id'];
	$d['equipment_name'] = ucwords($a['equipment_name']);
	$d['start'] = $a['date_borrowed'];
	$d['end'] = $a['date_return'];
	$d['benefeciaries'] = ucwords($a['benefeciaries']);
	$d['reason'] = $a['reason'];
	$d['address'] = $a['area_address'];
	$d['dc'] = ucwords($z['dc_name']);
	$d['backgroundColor'] = '#bd4e5e';
	$d['borderColor'] = '#cc0000';


	$data[] = $d;
}
echo json_encode($data);