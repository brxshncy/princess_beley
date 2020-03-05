<?php
require('../controller/db.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];

	$transac = "SELECT *,t.bfcry_id as b_id,t.area_id as a_id FROM transaction t left join equipment e on e.id  = t.eqp_id where t.id = '$id'";
	$qry = $conn->query($transac) or trigger(mysqli_error($conn)." ".$transac);
	$a = mysqli_fetch_assoc($qry);?>
<div class="row">
	<div class="col">
		<b>Equipment Name:</b> <?php echo $a['equipment_name'] ?>
	</div>
	<div class="col">
		<b>Date:</b> <?php echo date("M j, Y",strtotime($a['date_borrowed']))." - ".date("M j, Y",strtotime($a['date_return'])) ?>
	</div>
</div>
<hr>
<?php
	$a_id = $a['a_id'];
	$comms = "SELECT * FROM commodity c LEFT JOIN";
	$qry_1 = $conn->query($comms) or trigger_error(mysqli_error($conn)." ".$comms);
	while($b = mysqli_fetch_assoc($qry_1)){?>
<div class="row mt-2">
	<div class="col">
		<input type="text" name="comm[]" value="<?php echo $b['commodity_name'] ?>" class="form-control">
	</div>
	<div class="col">
		<input type="number" name="number[<?php echo $b['id'] ?>]" class="form-control">
	</div>
</div>
<?php }
?>


<?php }  ?>