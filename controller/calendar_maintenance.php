<?php
require('db.php');

$data=array();

$s = "SELECT * FROM equipment_maintenance em left join equipment e on em.equipment_id = e.id";
$qry = $conn->query($s) or trigger_error(mysqli_error($conn)." ".$s);
while($a = mysqli_fetch_assoc($qry)){
	$data[] = array(
		'id' => $a['id'],
		'title' => 'Equipment Name :'.ucwords($a['equipment_name']),
		'start' => 'Schedule:'.$a['date_sched']
	);
}
echo json_encode($data);