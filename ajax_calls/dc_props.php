<?php
require('../controller/db.php');

if(isset($_POST['idd'])){
	$id = $_POST['idd'];

	$ai = "SELECT * FROM district_coordinator WHERE id ='$id'";
	$qry = $conn->query($ai) or trigger_error(myslqi_error($conn)." ".$ai);
	$a = mysqli_fetch_assoc($qry);

	echo json_encode($a);
}