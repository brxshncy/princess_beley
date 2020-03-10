<?php
require('db.php');

$data=array();

$s = "SELECT * FROM equipment_maintenance em left join equipment e on em.equipment_id = e.id";
$qry = $conn->query($s) or trigger_error(mysqli_error($conn)." ".$s);
while($a = mysqli_fetch_assoc($qry)){
	$d=array();
	$d['title'] = '';
	$d['id'] = $a['id'];
	$d['backgroundColor'] = '#ffbf00';
	$d['start'] = $a['date_sched'];
	$d['equipment_name'] = ucwords($a['equipment_name']);
	$d['end'] = '';

	$data[] = $d;
}
echo json_encode($data);