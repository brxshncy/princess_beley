<?php
require('db.php');

if(isset($_POST['submit'])){

	foreach($_POST['commodity'] as $commodity){
		$cc = mysqli_escape_string($conn, $commodity);
		$c = "INSERT INTO commodity (commodity_name) VALUES ('$cc')";
		$qry = $conn->query($c) or trigger_error(mysqli_error($conn)." ".$c);

	}
	$barangay_area = mysqli_escape_string($conn,$_POST['barangay_area']);
	$area_address = mysqli_escape_string($conn,$_POST['area_address']);
	$commodity = implode(",",$_POST['commodity']);
	$soil_type = mysqli_escape_string($conn,$_POST['soil_type']);
	$area_platform = mysqli_escape_string($conn,$_POST['area_platform']);


	$ins = "INSERT INTO area_inspected
	(
		barangay_area,
		area_address,
		commodity,
		soil_type,
		area_platform
	)
	VALUES
	(
		'$barangay_area',
		'$area_address',
		'$commodity',
		'$soil_type',
		'$area_platform'
	)
	";
	$qry = $conn->query($ins) or trigger_error(mysqli_error($conn)." ".$ins);

	if($qry){
		session_start();
		$_SESSION['add'] = "Area information and commodities added to records";
		header("location:../area_inspected.php");
	}

}
