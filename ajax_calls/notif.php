<?php
require('../controller/db.php');
if(isset($_POST['view'])){

	$notif ="SELECT * FROM transaction WHERE status = 0 ORDER BY id DESC";
	$r = $conn->query($notif) or trigger_error(mysqli_error($conn)." ".$notif);
	$count = mysqli_num_rows($r);

	$data = array(
		'notification' => $count
	);

	echo json_encode($data);
}
else if(isset($_POST['read'])){
	$read = "UPDATE transaction SET status = 1";
	$z = $conn->query($read) or trigger_error(mysqli_error($conn)." ".$read);
	if($z){
		echo "success";
	}
	else{
		echo "err";
	}
}