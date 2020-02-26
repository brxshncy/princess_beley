<?php
require('db.php');

if(isset($_POST['submit'])){
	$equipment_name  = mysqli_escape_string($conn,$_POST['equipment_name']);
	$description = mysqli_escape_string($conn,$_POST['description']);
	$commodity = mysqli_escape_string($conn,implode(",",$_POST['commodity']));
	$capacity = mysqli_escape_string($conn,$_POST['capacity']);
	$unit = mysqli_escape_string($conn,$_POST['unit']);
	$status = $_POST['status'];

	$insert = "INSERT INTO equipment 
	(equipment_name,
	description,
	commodity,
	capacity,
	unit,
	status) 
	VALUES 
	('$equipment_name',
	'$description',
	'$commodity',
	'$capacity',
	'$unit',
	'$status')
	";
	$qry = $conn->query($insert) or trigger_error(mysqli_error($conn)." ".$insert);
	if($qry){
		session_start();
		$_SESSION['add'] = "Equipment added successfully";
		header("location:../equipment.php");
	}

}