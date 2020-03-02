<?php
require('../controller/db.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];

	$z = "SELECT *, e.equipment_name as equipment_name,t.area_id as area_id,b.benefeciaries as benefeciaries FROM transaction t LEFT JOIN equipment e ON t.eqp_id = e.id LEFT JOIN benefeciaries b ON b.id = t.bfcry_id WHERE t.id ='$id'";
	$qry = $conn->query($z) or trigger_error(mysqli_error($conn)." ".$z);
	$a = mysqli_fetch_assoc($qry);?>
<div class="row">
	<div class="col">
		<div class="form-group">
			<label>Equipment</label>
			<input type="text" class="form-control" value="<?php echo $a['equipment_name'] ?>" readonly>
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label>Beneficiary</label>
			<input type="text" class="form-control" value="<?php echo $a['benefeciaries'] ?>" readonly>
		</div>
	</div>
</div>

<div class="row">
	<?php 
		$i = $a['area_id'];
		$x = "SELECT * FROM area_inspected a LEFT JOIN barangay b ON a.barangay_area = b.id WHERE a.id ='$i'";
		$qr = $conn->query($x) or trigger_error(mysqli_error($conn)." ".$x);
		$b = mysqli_fetch_assoc($qr);
	?>
	<div class="col">
		<div class="form-group">
			<label>Location</label>
			<input type="text" class="form-control" value="<?php echo ucwords($b['baranggay_name']." ".$b['area_address']); ?>" readonly>
		</div>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="form-group">
			<label>Soil Type</label>
			<input type="text" class="form-control" value="<?php echo $b['soil_type']; ?>" readonly>
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label>Area Platform</label>
			<input type="text" class="form-control" value="<?php echo $b['area_platform']; ?>" readonly>
		</div>
	</div>
</div>
<div class="row">
	<div class="col">
			<label>Commodities in the area:</label>
			<ul>
			<?php
				$comms = explode(",",$b['commodity']);
				foreach($comms as $comm){ ?>
					<li><?php echo $comm ?></li>
			<?php } ?>	
		</ul>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="form-group">
			<label>Date Borrow</label>
			<input type="date" class="form-control" value="<?php echo $a['date_borrowed'] ?>" readonly>
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label>Date Return</label>
			<input type="date" class="form-control" value="<?php echo $a['date_return'] ?>" readonly>
		</div>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="form-group">
			<label>Reason</label>
			<textarea class="form-control" rows="3" readonly><?php echo $a['reason'] ?></textarea>
		</div>
	</div>
</div>



<?php } ?> 