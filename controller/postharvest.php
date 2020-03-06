<?php
require('db.php');

if(isset($_POST['submit'])){
	$t_id = $_POST['t_id'];
	$c_id = $_POST['c_id'];
	$volume = $_POST['volume'];
	$unit_measure = $_POST['unit_measure'];


	$arr = array();
	foreach($volume as $t_id => $commodity){
		array_push($arr,$t_id,$commodity);
	}
	foreach($unit_measure as $tt_id => $unit_measure){
		arraY_push($arr,$unit_measure);
	}
	print_r($arr);
}