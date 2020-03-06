<?php
require('../controller/db.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];

	$transac = "SELECT *,t.bfcry_id as b_id,t.id as t_id FROM transaction t left join equipment e on e.id  = t.eqp_id where t.id = '$id'";
	$qry = $conn->query($transac) or trigger_error(mysqli_error($conn)." ".$transac);
	$a = mysqli_fetch_assoc($qry);?>
<div class="row">
	<div class="col">
		<b>Equipment Name:</b> <?php echo $a['equipment_name'] ?>
		<input type="hidden" value="<?php echo $a['t_id'] ?>" name="t_id">
	</div>
	<div class="col">
		<b>Date:</b> <?php echo date("M j, Y",strtotime($a['date_borrowed']))." - ".date("M j, Y",strtotime($a['date_return'])) ?>
	</div>
</div>
<hr>
<?php
 	$a_id = $a['b_id'];
	$comms = "SELECT ai.commodity as comm from benefeciaries b left join area_inspected ai on b.specific_area = ai.id where b.id = '$a_id' ";
	$qr = $conn->query($comms) or trigger_error(mysqli_error($conn)." ".$comms);
	$c = mysqli_fetch_assoc($qr);
	$c_id = explode(",",$c['comm']);
	foreach($c_id as $cc){
		$har = "SELECT * from commodity where id = '$cc'";
		$qr_1 = $conn->query($har);
		$p = mysqli_fetch_assoc($qr_1);?>
<div class="row">
	<div class="col">
		<b><?php echo $p['commodity_name'] ?></b>
	</div>
</div>
<div class="row mt-2">
	<div class="col col-md-8">
		<input type="hidden" value="<?php echo $p['id'] ?>" name="c_id[]">
		<input type="text" name="volume[<?php echo $p['id'] ?>]" class="form-control" placeholder="Number of Volume">
	</div>
</div>

<?php	}
?>
<?php }
?>


