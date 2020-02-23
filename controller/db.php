<?php
$server = "localhost";
$user = "root";
$pw = "";
$db = "agriculture";

$conn = mysqli_connect($server,$user,$pw,$db);

if($conn){
	/*echo "connected";*/
}
else{
	 echo "Failed to connect to MySQL: " .mysqli_connect_error();
 	 exit();
}
?>