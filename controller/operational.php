<?php
require('db.php');

if(isset($_POST['submit'])){
	$e_id = $_POST['e_id'];

	$set = "UPDATE equipment SET status = 1 WHERE id = '$e_id'";
	$qry = $conn->query($set) or trigger_error(mysqli_error($conn)." ".$set);
	if($qry){
		/*session_start();
		$_SESSION['add'] = "Equipment set to Operational";
		header("location:../equipment.php");**/
		$del = "DELETE FROM equipment_maintenance WHERE equipment_id  ='$e_id'";
		$qry_1 = $conn->query($del) or trigger_error(mysqli_error($conn)." ".$del);
		if($qry_1){
			session_start();
			$_SESSION['add'] = "Equipment set to Operational";
			header("location:../equipment.php");
		}
	}
}