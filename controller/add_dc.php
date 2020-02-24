<?php
require('db.php');

if(isset($_POST['submit'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$bday = $_POST['bday'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$assigned_area = $_POST['assigned_area'];

	$insert = "INSERT INTO district_coordinator
	(
		fname,
		lname,
		bday,
		contact,
		address,
		username,
		password,
		area_id
	)
	VALUES
	(
		'$fname',
		'$lname',
		'$bday',
		'$contact',
		'$address',
		'$username',
		'$password',
		'$assigned_area'
	)
	";
	$qry = $conn->query($insert) or trigger_error(mysqli_error($conn)." ".$insert);

	if($qry){
		session_start();
		$_SESSION['suc'] = "District Coordinator Added";
		header("location:../add_coordinator.php");
	}
}

if(isset($_POST['edit'])){
	$e_id = $_POST['e_id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$bday = $_POST['bday'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$area_id = $_POST['assigned_area'];
	$status = $_POST['status'];

	$update = "UPDATE district_coordinator SET
	fname = '$fname',
	lname = '$lname',
	bday = '$bday',
	contact = '$contact',
	address = '$address',
	username = '$username',
	password = '$password',
	area_id = '$area_id',
	status = '$status'
	WHERE id ='$e_id' 
	";
	$qry = $conn->query($update) or trigger_error(mysqli_error($conn)." ".$update);
	if($qry){
		session_start();
		$_SESSION['suc'] = "Updated successfully";
		header("location:../add_coordinator.php");
		
	}
	else{
		echo "dada";
	}

}