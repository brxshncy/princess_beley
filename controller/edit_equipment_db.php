<?php
require('db.php');

if(isset($_POST['e_id'])){
	$id = $_POST['e_id'];
	$equipment_name = mysqli_escape_string($conn,$_POST['equipment_name']);
	$description = mysqli_escape_string($conn,$_POST['description']);
	$commodity = mysqli_escape_string($conn,implode(",",$_POST['commodity']));
	$capacity = mysqli_escape_string($conn,$_POST['capacity']);
	$unit = mysqli_escape_string($conn,$_POST['unit']);
	$status =mysqli_escape_string($conn,$_POST['status']);
	$date_sched = date("Y-m-d",strtotime($_POST['date_sched']));




	$update ="UPDATE equipment 
	SET
	equipment_name = '$equipment_name',
	description =  '$description',
	commodity =  '$commodity',
	capacity = '$capacity',
	unit = '$unit',
	status = '$status'
	WHERE id = '$id'
	";
	$qry = $conn->query($update) or trigger_error(mysqli_error($conn)." ".$update);

	if($qry){
		$x = "UPDATE equipment_maintenance SET date_sched = '$date_sched' WHERE equipment_id ='$id'";
		$qry1 = $conn->query($x) or trigger_error(mysqli_error($conn)." ".$x);
		if($qry1){
			session_start();
			$_SESSION['update'] = "Updated successfully";
			header("location:../equipment.php");
		}
	}
}