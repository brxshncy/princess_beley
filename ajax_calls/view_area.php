<?php

require('../controller/db.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];

	$area = "SELECT * FROM area_inspected WHERE id ='$id'";
	$qry = $conn->query($area) or trigger_error(mysqli_error($conn)." ".$area);
	$a = mysqli_fetch_assoc($qry);

	$data['barangay_area'] = ucwords($a['barangay_area']);
	$data['area_address'] = ucwords($a['area_address']);
	$data['commodity'] = $a['commodity'];
	$data['soil_type'] = $a['soil_type'];
	$data['area_platform'] = $a['area_platform'];
	$data['date_inspected'] = date("D M j, Y",strtotime($a['date_inspected']));


	echo json_encode($data);
}
if(isset($_POST['e_id'])){
	$id = $_POST['e_id'];

	$area = "SELECT * FROM area_inspected WHERE id ='$id'";
	$qry = $conn->query($area) or trigger_error(mysqli_error($conn)." ".$area);
	$a = mysqli_fetch_assoc($qry);

	$data['barangay_area'] = ucwords($a['barangay_area']);
	$data['area_address'] = ucwords($a['area_address']);
	$data['commodity'] = $a['commodity'];
	$data['soil_type'] = $a['soil_type'];
	$data['area_platform'] = $a['area_platform'];
	$data['date_inspected'] = $a['date_inspected'];
	$data['id'] = $a['id'];

	echo json_encode($data);
}