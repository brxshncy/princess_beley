<?php
require('db.php');

if(isset($_POST['area_id'])){
	$id = $_POST['area_id'];
	$barangay_area = $_POST['barangay_area'];
	$date_inspected = $_POST['date_inspected'];
	$e_comms = implode(",",$_POST['e_comms']);
	$area_address = $_POST['area_address'];
	$soil_type = $_POST['soil_type'];
	$area_platform = $_POST['area_platform'];


	$update = "UPDATE area_inspected SET
		date_inspected = '$date_inspected',
		barangay_area = '$barangay_area',
		area_address = '$area_address',
		commodity = '$e_comms',
		soil_type = '$soil_type',
		area_platform = '$area_platform'
		WHERE id ='$id';
	";
	$qry = $conn->query($update) or trigger_error(mysqli_error($conn)." ".$update);
	if($update){
		session_start();
		$_SESSION['update'] = "Details updated";
		header("location:../area_inspected.php");
	}
}