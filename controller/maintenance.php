<?php
require('db.php');
if(isset($_POST['set'])){
	$eqp_id = $_POST['eqp_id'];
	$m_date = $_POST['m_date'];

	$insrt = "INSERT INTO equipment_maintenance (equipment_id,date_sched) VALUES ('$eqp_id','$m_date')";
	$qry = $conn->query($insrt) or trigger_error(mysqli_error($conn)." ".$insrt);

	if($insrt){
		$up = "UPDATE equipment SET status =  3 WHERE id ='$eqp_id'";
		$qry_1 =$conn->query($up) or trigger_error(mysqli_error($conn)." ".$up);
		if($qry_1){
			session_start();
			$_SESSION['aa'] = "Maintenance schedule set";
			header("location../equipment.php");
		}
		else{
			echo "error";
		}
	}
	else{
		echo "error";
	}
}