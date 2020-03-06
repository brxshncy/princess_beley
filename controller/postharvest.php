<?php
require('db.php');

if(isset($_POST['submit'])){
	$t_id = $_POST['t_id'];
	$c_id = $_POST['c_id'];
	$volume = $_POST['volume'];


	foreach($volume as $comm => $volume){
		$insert = "INSERT INTO post_harvest (transac_id,crops_id,volume) VALUES ('$t_id','$comm','$volume')";
		$qry = $conn->query($insert) or trigger_error(mysqli_error($conn)." ".$insert);
		if($qry){
			session_start();
			$_SESSION['add'] = "Recorded successfully!";
			header("location:../equipment_status.php");
		}
	}
	/*for($i = 0; $i<count($c_id); $i++){
		array_push($arr,['crop_id'=> $c_id[$i],'volume'=>$volume[$i],'measure'=>$unit_measure[$i]]);
	}
	echo "<pre>";
	print_r($arr);
	$arr = [];
	$keys = array_keys($arr);
	for($x = 0; $x<count($arr); $x++){
		foreach($arr[$keys[$x]] as $ins){
			echo "crop id: ".$ins;
		}
	}


	/*$arr =[];*/
	/*for($i = 0; $i<count($c_id); $i++){
		array_push($arr,[$c_id[$i] => [$volume[$i],$unit_measure[$i]] ]);
	}

	echo "<pre>";
	print_r($arr);

	$keys = array_keys($arr);
	for($x = 0; $x<count($arr); $x++){
		foreach($arr[$keys[$x]] as $volume => $measure){
			echo $volume." => ";
				foreach($measure as $vol){
				echo $vol."<br>";
			}
		}
	}*/


}